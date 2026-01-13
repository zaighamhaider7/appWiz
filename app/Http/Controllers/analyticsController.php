<?php

namespace App\Http\Controllers;

use Google\Analytics\Data\V1beta\Client\BetaAnalyticsDataClient;
use Google\Analytics\Data\V1beta\DateRange;
use Google\Analytics\Data\V1beta\Dimension;
use Google\Analytics\Data\V1beta\Metric;
use Google\Analytics\Data\V1beta\RunReportRequest;
use App\Models\Role;
use App\Models\project;
use App\Models\User;
use App\Models\ticket;

class AnalyticsController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        if($user->role_id == 1){
            $propertyId = env('property_id');
            $credentials = env('GOOGLE_APPLICATION_CREDENTIALS');

            $client = new BetaAnalyticsDataClient([
                'credentials' => $credentials,
            ]);


            // --- All Dimensions ---
            $dimensions = [
                new Dimension(['name' => 'date']),         // Date of visit
                new Dimension(['name' => 'country']),
                new Dimension(['name' => 'sessionSource']),
                new Dimension(['name' => 'sessionMedium']),
                // <--- new
                // Country
                new Dimension(['name' => 'browser']),      // Browser
                new Dimension(['name' => 'pagePath']),     // Page path
            ];

            // --- All Metrics ---
            $metrics = [
                new Metric(['name' => 'sessions']),
                new Metric(['name' => 'totalUsers']),
                new Metric(['name' => 'newUsers']),
                new Metric(['name' => 'engagedSessions']),
                new Metric(['name' => 'screenPageViews']),
            ];

            // --- 1. CURRENT PERIOD ---
            $currentRequest = (new RunReportRequest)
                ->setProperty('properties/'.$propertyId)
                ->setDateRanges([
                    new DateRange(['start_date' => '365daysAgo', 'end_date' => 'today']),
                ])
                ->setDimensions($dimensions)
                ->setMetrics($metrics);

            $currentResponse = $client->runReport($currentRequest);

            $currentData = [];
            foreach ($currentResponse->getRows() as $row) {
                $dimensionValues = $row->getDimensionValues();
                $metricValues = $row->getMetricValues();

                $country = $dimensionValues[1]->getValue(); // index 1 = country
                $currentData[] = [
                    'date' => $dimensionValues[0]->getValue(),
                    'country' => $country,
                    'browser' => $dimensionValues[2]->getValue(),
                    'pagePath' => $dimensionValues[3]->getValue(),
                    'sessions' => (int) $metricValues[0]->getValue(),
                    'totalUsers' => (int) $metricValues[1]->getValue(),
                    'newUsers' => (int) $metricValues[2]->getValue(),
                    'engagedSessions' => (int) $metricValues[3]->getValue(),
                    'screenPageViews' => (int) $metricValues[4]->getValue(),
                ];
            }

            // Aggregate current sessions by country for percentage change
            $currentSessionsByCountry = [];
            foreach ($currentData as $row) {
                $currentSessionsByCountry[$row['country']] =
                    ($currentSessionsByCountry[$row['country']] ?? 0) + $row['sessions'];
            }
            $request = (new RunReportRequest)
                ->setProperty('properties/'.$propertyId)
                ->setDateRanges([
                    new DateRange(['start_date' => '365daysAgo', 'end_date' => 'today']),
                ])
                ->setDimensions($dimensions)
                ->setMetrics($metrics);

            $response = $client->runReport($request);

            $data = [];
            foreach ($response->getRows() as $row) {
                $country = $row->getDimensionValues()[1]->getValue(); // country
                $sessions = $row->getMetricValues()[0]->getValue();

                $sources[] = [
                    'sessionSource' => $dimensionValues[2]->getValue(),
                    'sessionMedium' => $dimensionValues[3]->getValue(),
                    'country' => $country,
                    'sessions' => $sessions,

                ];
            }

            // --- 2. PREVIOUS PERIOD (sessions per country only) ---
            $previousRequest = (new RunReportRequest)
                ->setProperty('properties/'.$propertyId)
                ->setDateRanges([
                    new DateRange(['start_date' => '365daysAgo', 'end_date' => 'today']),
                ])
                ->setDimensions([
                    new Dimension(['name' => 'country']),
                ])
                ->setMetrics([
                    new Metric(['name' => 'sessions']),
                ]);

            $previousResponse = $client->runReport($previousRequest);

            $previousSessionsByCountry = [];
            foreach ($previousResponse->getRows() as $row) {
                $country = $row->getDimensionValues()[0]->getValue();
                $sessions = (int) $row->getMetricValues()[0]->getValue();
                $previousSessionsByCountry[$country] = $sessions;
            }

            // --- 3. CALCULATE PERCENTAGE CHANGE PER COUNTRY ---
            $results = [];
            foreach ($currentSessionsByCountry as $country => $sessions) {
                $prevSessions = $previousSessionsByCountry[$country] ?? 0;

                if ($prevSessions > 0) {
                    $percentageChange = (($sessions - $prevSessions) / $prevSessions) * 100;
                } else {
                    $percentageChange = 0;
                }

                $results[] = [
                    'country' => $country,
                    'current_sessions' => $sessions,
                    'previous_sessions' => $prevSessions,
                    'percentage_change' => round($percentageChange, 1),
                ];
            }

            // Pass both detailed rows & percentage changes to view
        //    $id = auth()->user()->id;
        //    $check = Role::where('userId');
        //    dd($id);

            // counts
            $ticketData = ticket::with('project', 'user')->get();
            $ticketCount = $ticketData->count();
            $projectCount = project::all()->count();
            $clientCount = User::where('name', '!=' ,'admin')->get()->count();

            $thisMonthClients = User::where('name', '!=' ,'admin')->whereMonth('created_at', now()->month)
                            ->whereYear('created_at', now()->year)
                            ->count();

            $thisMonthTickets = ticket::whereMonth('created_at', now()->month)
                                ->whereYear('created_at', now()->year)
                                ->count();

            $thisMonthProjects = project::whereMonth('created_at', now()->month)
                                ->whereYear('created_at', now()->year)
                                ->count();

            return view('admin.analytics')->with([
                'data' => $currentData,
                'summary' => $results,
                'source' => $sources,
                'ticketData' => $ticketData,
                'ticketCount' => $ticketCount,
                'projectCount' => $projectCount,
                'clientCount' => $clientCount,
                'thisMonthClients' => $thisMonthClients,
                'thisMonthTickets' => $thisMonthTickets,
                'thisMonthProjects' => $thisMonthProjects,
            ]);
        }
        else{
            return view('user.analytics');
        }
    }

public function earningsData()
{
    $propertyId = env('property_id');
    $credentials = env('GOOGLE_APPLICATION_CREDENTIALS');

    $client = new BetaAnalyticsDataClient([
        'credentials' => $credentials,
    ]);

    // Dimension: Month
    $dimensions = [
        new Dimension(['name' => 'month']), // month as 01, 02...
    ];

    // Metric: purchaseRevenue
    $metrics = [
        new Metric(['name' => 'purchaseRevenue']), // total revenue in that month
    ];

    // Request for the year 2024
    $request = (new RunReportRequest())
        ->setProperty('properties/' . $propertyId)
        ->setDateRanges([
            new DateRange(['start_date' => '365daysAgo', 'end_date' => 'today']),
        ])
        ->setDimensions($dimensions)
        ->setMetrics($metrics);

  try {
        $response = $client->runReport($request);
        // \Log::info('GA4 earningsData raw response', ['rows' => $response->getRows()]);
    } catch (\Exception $e) {
        // \Log::error('GA4 API error: ' . $e->getMessage());
        return response()->json(['error' => $e->getMessage()], 500);
    }
    $labels = [];
    $values = [];

    foreach ($response->getRows() as $row) {
        // Month number
        $monthNum = $row->getDimensionValues()[0]->getValue();
        // Convert to Jan, Feb...
        $monthName = date('M', mktime(0, 0, 0, $monthNum, 10));
        // Revenue (GA4 returns string, cast to float)
        $revenue = (float)$row->getMetricValues()[0]->getValue();
        $labels[] = $monthName;
        $values[] = $revenue;
    }

    return response()->json([
        'labels' => $labels,
        'msg'    => 'ok',
        'values' => $values
    ]);
}

public function deviceTypeData()
{
    $propertyId = env('property_id');
    $credentials = env('GOOGLE_APPLICATION_CREDENTIALS');

    $client = new BetaAnalyticsDataClient([
        'credentials' => $credentials,
    ]);

    $dimensions = [
        new Dimension(['name' => 'deviceCategory']), // desktop/mobile/tablet
    ];

    $metrics = [
        new Metric(['name' => 'sessions']),
    ];

    $request = (new RunReportRequest())
        ->setProperty('properties/' . $propertyId)
        ->setDateRanges([
            new DateRange([
                'start_date' => '365daysAgo',
                'end_date' => 'today',
            ]),
        ])
        ->setDimensions($dimensions)
        ->setMetrics($metrics);

    $response = $client->runReport($request);

    $labels = [];
    $percentages = [];

    // First collect totals
    $sessionsArray = [];
    foreach ($response->getRows() as $row) {
        $device = $row->getDimensionValues()[0]->getValue(); // mobile/desktop/tablet
        $sessions = (int)$row->getMetricValues()[0]->getValue();
        $sessionsArray[$device] = $sessions;
    }

    $totalSessions = array_sum($sessionsArray);

    // Convert to %
    foreach ($sessionsArray as $device => $sessions) {
        $labels[] = ucfirst($device);
        $percentages[] = $totalSessions > 0 ? round(($sessions / $totalSessions) * 100, 2) : 0;
    }

    return response()->json([
        'labels' => $labels,
        'values' => $percentages // % per device
    ]);
}

    // public function traffic()
    // {
    //     $propertyId = env('property_id');
    //     $credentials = env('GOOGLE_APPLICATION_CREDENTIALS');

    //     $client = new BetaAnalyticsDataClient([
    //         'credentials' => $credentials,
    //     ]);

    //     // Dimension: Month
    //     $dimensions = [
    //         new Dimension(['name' => 'month']), // month as 01, 02...
    //     ];

    //     // Metric: purchaseRevenue
    //     $metrics = [
    //         new Metric(['name' => 'sessions']), // total revenue in that month
    //     ];

    //     // Request for the year 2024
    //     $request = (new RunReportRequest())
    //         ->setProperty('properties/' . $propertyId)
    //         ->setDateRanges([
    //             new DateRange(['start_date' => '365daysAgo', 'end_date' => 'today']),
    //         ])
    //         ->setDimensions($dimensions)
    //         ->setMetrics($metrics);

    // try {
    //         $response = $client->runReport($request);
    //         \Log::info('GA4 earningsData raw response', ['rows' => $response->getRows()]);
    //     } catch (\Exception $e) {
    //         \Log::error('GA4 API error: ' . $e->getMessage());
    //         return response()->json(['error' => $e->getMessage()], 500);
    //     }
    //     $labels = [];
    //     $values = [];

    //     foreach ($response->getRows() as $row) {
    //         // Month number
    //         $monthNum = $row->getDimensionValues()[0]->getValue();
    //         // Convert to Jan, Feb...
    //         $monthName = date('M', mktime(0, 0, 0, $monthNum, 10));
    //         // Revenue (GA4 returns string, cast to float)
    //         $revenue = (float)$row->getMetricValues()[0]->getValue();
    //         $labels[] = $monthName;
    //         $values[] = $revenue;
    //     }

        

    //     return response()->json([
    //         'labels' => $labels,
    //         'msg'    => 'ok',
    //         'values' => $values
    //     ]);
    // }


    public function traffic()
    {
        $propertyId = env('property_id');
        $credentials = env('GOOGLE_APPLICATION_CREDENTIALS');

        $client = new BetaAnalyticsDataClient([
            'credentials' => $credentials,
        ]);

        // Dimension: Month
        $dimensions = [
            new Dimension(['name' => 'month']), // month as 01, 02...
        ];

        // Metric: sessions
        $metrics = [
            new Metric(['name' => 'sessions']),
        ];

        // Request for the last year
        $request = (new RunReportRequest())
            ->setProperty('properties/' . $propertyId)
            ->setDateRanges([
                new DateRange(['start_date' => '365daysAgo', 'end_date' => 'today']),
            ])
            ->setDimensions($dimensions)
            ->setMetrics($metrics);

        try {
            $response = $client->runReport($request);
            // \Log::info('GA4 traffic raw response', ['rows' => $response->getRows()]);
        } catch (\Exception $e) {
            // \Log::error('GA4 API error: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }

        $labels = [];
        $values = [];
        $monthData = []; // store month number => sessions

        foreach ($response->getRows() as $row) {
            $monthNum = $row->getDimensionValues()[0]->getValue();
            $monthName = date('M', mktime(0, 0, 0, $monthNum, 10));
            $sessions = (int)$row->getMetricValues()[0]->getValue();

            $labels[] = $monthName;
            $values[] = $sessions;
            $monthData[(int)$monthNum] = $sessions;
        }

        // Sort monthData by month number ascending
        ksort($monthData);

        // Get last month (latest available)
        $months = array_keys($monthData);
        $lastMonth = end($months);
        $currentSessions = $monthData[$lastMonth] ?? 0;

        // Get previous month (the month before the latest available)
        $prevKey = prev($months); // moves pointer to previous month
        $previousSessions = $prevKey !== false ? $monthData[$prevKey] : 0;

        // Format current sessions (k)
        $formattedCurrent = $currentSessions >= 1000 
            ? round($currentSessions / 1000, 1) . 'k' 
            : $currentSessions;

        // Month-over-month % change
        $percentChange = $previousSessions > 0
            ? round((($currentSessions - $previousSessions) / $previousSessions) * 100, 1)
            : 0;

        $percentChangeFormatted = ($percentChange >= 0 ? '+' : '') . $percentChange . '%';


        return response()->json([
            'labels' => $labels,
            'values' => $values,
            'current_month_sessions' => $formattedCurrent,
            'percent_change' => $percentChangeFormatted,
            'msg' => 'ok'
        ]);
    }

    //  user analytics view
    public function sessionDurationData()
    {
        $propertyId = env('property_id');
        $credentials = env('GOOGLE_APPLICATION_CREDENTIALS');

        $client = new BetaAnalyticsDataClient([
            'credentials' => $credentials,
        ]);

        // Dimension: Month
        $dimensions = [
            new Dimension(['name' => 'month']),
        ];

        // Metric: Average Session Duration (seconds)
        $metrics = [
            new Metric(['name' => 'averageSessionDuration']),
        ];

        // new DateRange([
        //     'start_date' => '2024-01-01',
        //     'end_date'   => '2024-12-31'
        // ])


        $request = (new RunReportRequest())
            ->setProperty('properties/' . $propertyId)
            ->setDateRanges([
                new DateRange([
                    'start_date' => '365daysAgo',
                    'end_date'   => 'today'
                ]),
            ])
            ->setDimensions($dimensions)
            ->setMetrics($metrics);

        try {
            $response = $client->runReport($request);
        } catch (\Exception $e) {
            // \Log::error('GA4 API error: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }

        $labels = [];
        $values = [];

        foreach ($response->getRows() as $row) {
            $monthNum = $row->getDimensionValues()[0]->getValue();
            $monthName = date('M', mktime(0, 0, 0, $monthNum, 10));

            // Seconds → Minutes (optional)
            $durationSeconds = (float) $row->getMetricValues()[0]->getValue();
            $durationMinutes = round($durationSeconds / 60, 2);

            $labels[] = $monthName;
            $values[] = $durationMinutes;
        }

        return response()->json([
            'labels' => $labels,
            'msg'    => 'ok',
            'values' => $values
        ]);
    }

    public function activeVisitorsData()
    {
        $propertyId = env('property_id');
        $credentials = env('GOOGLE_APPLICATION_CREDENTIALS');

        $client = new BetaAnalyticsDataClient([
            'credentials' => $credentials,
        ]);

        // Dimension: month
        $dimensions = [
            new Dimension(['name' => 'month']),
        ];

        // Metric: active users
        $metrics = [
            new Metric(['name' => 'activeUsers']),
        ];

        // Request for the year 2024
        $request = (new RunReportRequest())
            ->setProperty('properties/' . $propertyId)
            ->setDateRanges([
                new DateRange(['start_date' => '365daysAgo', 'end_date' => 'today']),
            ])
            ->setDimensions($dimensions)
            ->setMetrics($metrics);

        try {
            $response = $client->runReport($request);
        } catch (\Exception $e) {
            // \Log::error('GA4 API error: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }

        $labels = [];
        $values = [];

        foreach ($response->getRows() as $row) {
            $monthNum = $row->getDimensionValues()[0]->getValue();
            $monthName = date('M', mktime(0, 0, 0, $monthNum, 10));

            $activeUsers = (int) $row->getMetricValues()[0]->getValue();

            $labels[] = $monthName;
            $values[] = $activeUsers;
        }

        return response()->json([
            'labels' => $labels,
            'msg' => 'ok',
            'values' => $values
        ]);
    }

    public function impressionsData()
    {
        $propertyId = env('property_id');
        $credentials = env('GOOGLE_APPLICATION_CREDENTIALS');

        $client = new BetaAnalyticsDataClient([
            'credentials' => $credentials,
        ]);

        // Dimension: month
        $dimensions = [
            new Dimension(['name' => 'month']),
        ];

        // Metric: screenPageViews
        $metrics = [
            new Metric(['name' => 'screenPageViews']),
        ];

        // Request for the last 365 days
        $request = (new RunReportRequest())
            ->setProperty('properties/' . $propertyId)
            ->setDateRanges([
                new DateRange(['start_date' => '365daysAgo', 'end_date' => 'today']),
            ])
            ->setDimensions($dimensions)
            ->setMetrics($metrics);

        try {
            $response = $client->runReport($request);
        } catch (\Exception $e) {
            \Log::error('GA4 API error: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }

        $labels = [];
        $values = [];

        foreach ($response->getRows() as $row) {
            $monthNum = (int) $row->getDimensionValues()[0]->getValue();
            $monthName = date('M', mktime(0, 0, 0, $monthNum, 10));

            $impressions = (int) $row->getMetricValues()[0]->getValue();

            $labels[] = $monthName;
            $values[] = $impressions;
            $monthData[$monthNum] = $impressions;
        }

        return response()->json([
            'labels' => $labels,
            'values' => $values,
            'msg' => 'ok'
        ]);
    }

    public function bounceRateData()
    {
        $propertyId = env('property_id');
        $credentials = env('GOOGLE_APPLICATION_CREDENTIALS');

        $client = new BetaAnalyticsDataClient([
            'credentials' => $credentials,
        ]);

        // Dimension: month
        $dimensions = [
            new Dimension(['name' => 'month']),
        ];

        // Metric: bounceRate
        $metrics = [
            new Metric(['name' => 'bounceRate']),
        ];

        $request = (new RunReportRequest())
            ->setProperty('properties/' . $propertyId)
            ->setDateRanges([
                new DateRange([
                    'start_date' => '365daysAgo',
                    'end_date'   => 'today'
                ]),
            ])
            ->setDimensions($dimensions)
            ->setMetrics($metrics);

        try {
            $response = $client->runReport($request);
        } catch (\Exception $e) {
            // \Log::error('GA4 Bounce Rate API error: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }

        $labels = [];
        $values = [];

        foreach ($response->getRows() as $row) {
            $monthNum  = (int) $row->getDimensionValues()[0]->getValue();
            $monthName = date('M', mktime(0, 0, 0, $monthNum, 10));

            // Bounce rate comes as decimal percentage
            $bounceRate = round(
                (float) $row->getMetricValues()[0]->getValue(),
                2
            );

            $labels[] = $monthName;
            $values[] = $bounceRate;
        }

        return response()->json([
            'labels' => $labels,
            'values' => $values,
            'msg'    => 'ok'
        ]);
    }

    public function conversionRateData()
    {
        $propertyId = env('property_id');
        $credentials = env('GOOGLE_APPLICATION_CREDENTIALS');

        $client = new BetaAnalyticsDataClient([
            'credentials' => $credentials,
        ]);

        $dimensions = [
            new Dimension(['name' => 'month']),
        ];

        $metrics = [
            new Metric(['name' => 'engagementRate']),
        ];

        $request = (new RunReportRequest())
            ->setProperty('properties/' . $propertyId)
            ->setDateRanges([
                new DateRange([
                    'start_date' => '365daysAgo',
                    'end_date'   => 'today'
                ]),
            ])
            ->setDimensions($dimensions)
            ->setMetrics($metrics);

        try {
            $response = $client->runReport($request);
        } catch (\Exception $e) {
            // \Log::error('GA4 Conversion Rate API error: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }

        $labels = [];
        $values = [];

        foreach ($response->getRows() as $row) {
            $monthNum  = (int) $row->getDimensionValues()[0]->getValue();
            $monthName = date('M', mktime(0, 0, 0, $monthNum, 10));

            // conversion rate already in %
            $conversionRate = round(
                (float) $row->getMetricValues()[0]->getValue(),
                2
            );

            $labels[] = $monthName;
            $values[] = $conversionRate;
        }

        return response()->json([
            'labels' => $labels,
            'values' => $values,
            'msg'    => 'ok'
        ]);
    }

}

<?php

namespace App\Http\Controllers;

use Google\Analytics\Data\V1beta\Client\BetaAnalyticsDataClient;
use Google\Analytics\Data\V1beta\DateRange;
use Google\Analytics\Data\V1beta\Dimension;
use Google\Analytics\Data\V1beta\Metric;
use Google\Analytics\Data\V1beta\RunReportRequest;

class AnalyticsController extends Controller
{
    public function index()
    {
        $propertyId = '398445627';
        $credentials = env('GOOGLE_APPLICATION_CREDENTIALS');

        // GA4 Client
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
                new DateRange(['start_date' => '2024-09-01', 'end_date' => '2024-09-30']),
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
                new DateRange(['start_date' => '2024-09-01', 'end_date' => '2024-09-30']),
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
                new DateRange(['start_date' => '2024-08-01', 'end_date' => '2024-08-31']),
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
        return view('analytics')->with([
            'data' => $currentData,
            'summary' => $results,
            'source' => $sources,
        ]);
    }

    public function earningsData()
{
    $propertyId = "398445627";
    $credentials = env('GOOGLE_APPLICATION_CREDENTIALS');

    $client = new BetaAnalyticsDataClient([
        'credentials' => $credentials,
    ]);

    // Example: sessions per month
    $dimensions = [
        new Dimension(['name' => 'month']), // month
    ];

    $metrics = [
        new Metric(['name' => 'sessions']), // total sessions in that month
    ];

    $request = (new RunReportRequest())
        ->setProperty('properties/' . $propertyId)
        ->setDateRanges([
            new DateRange(['start_date' => '2024-01-01', 'end_date' => '2024-12-31']),
        ])
        ->setDimensions($dimensions)
        ->setMetrics($metrics);

    $response = $client->runReport($request);

    $labels = [];
    $values = [];

    foreach ($response->getRows() as $row) {
        // GA4 returns month as 01, 02 ... so format it
        $monthNum = $row->getDimensionValues()[0]->getValue();
        $monthName = date('M', mktime(0, 0, 0, $monthNum, 10));
        $sessions = (int)$row->getMetricValues()[0]->getValue();

        $labels[] = $monthName;
        $values[] = $sessions;
    }

    return response()->json([
        'labels' => $labels,
        'msg'    => 'ok',
        'values' => $values
    ]);
}
}

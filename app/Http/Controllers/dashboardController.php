<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Google\Analytics\Data\V1beta\Client\BetaAnalyticsDataClient;
use Google\Analytics\Data\V1beta\DateRange;
use Google\Analytics\Data\V1beta\Dimension;
use Google\Analytics\Data\V1beta\Metric;
use Google\Analytics\Data\V1beta\RunReportRequest;
use App\Models\project;
use App\Models\User;
use App\Models\ticket;
use App\Models\Subscription;


class dashboardController extends Controller
{
    public function adminDashboard(){
        $user = Auth::user();

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
            $summary = [];
            foreach ($currentSessionsByCountry as $country => $sessions) {
                $prevSessions = $previousSessionsByCountry[$country] ?? 0;

                if ($prevSessions > 0) {
                    $percentageChange = (($sessions - $prevSessions) / $prevSessions) * 100;
                } else {
                    $percentageChange = 0;
                }

                $summary[] = [
                    'country' => $country,
                    'current_sessions' => $sessions,
                    'previous_sessions' => $prevSessions,
                    'percentage_change' => round($percentageChange, 1),
                ];

            return view('admin.dashboard', compact('ticketData', 'ticketCount','projectCount','clientCount', 'thisMonthClients','thisMonthTickets', 'thisMonthProjects', 'summary', 'sources', 'currentData'));
        }
    }

    public function userDashboard(){
        $user = auth()->user();

            $projectCount = $user->assignedProjects()->count();
            $inprogressProjectCount = $user->assignedProjects()->where('status', 'In Progress')->count();
            $ticketCount = ticket::where('user_id', $user->id)->where('status', "!=" , "Cancelled")->count();

            $subscriptionData = Subscription::limit(3)->get();

            return view('user.dashboard', compact('projectCount', 'inprogressProjectCount', 'ticketCount', 'subscriptionData'));
    }
}

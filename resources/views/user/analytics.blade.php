<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WIZSPEED Dashboard</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --btn-bg: #EA580C;
            /* orange-600 */
            --btn-hover: #C2410C;
            /* darker orange */
            --btn-border: #000000;
            /* black */
        }

        .modal-transition {
            transition: opacity 0.15s ease-in-out;
        }

        .dark-mode {
            --btn-bg: #282828;
            /* gray-700 */
            --btn-hover: #4B5563;
            /* gray-600 */
            --btn-border: #6B7280;
            /* gray-500 */
        }

        .chart-wrapper {
            width: 120px !important;
            height: 120px;
        }

        .chart-wrapper canvas {
            width: 100% !important;
            height: 100% !important;
        }


        button.custom-btn {
            background-color: var(--btn-bg);
            border-color: var(--btn-border);
        }

        button.custom-btn:hover {
            background-color: var(--btn-hover);
        }

        /* Base styles for the Manrope font and general body background */
        body {
            font-family: "Manrope", sans-serif;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            /* Prevent horizontal scrolling */
            transition: background-color 0.3s ease, color 0.3s ease;
            /* Smooth transition for dark mode */
        }

        .chart-container {
            width: 600px;
            height: 300px;
            margin: auto;
        }

        /* Custom scrollbar for better aesthetics */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #e0e0e0;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        /* Icons - using inline SVG for simplicity and consistency with the design */
        .icon {
            display: inline-block;
            width: 1.25rem;
            /* 20px */
            height: 1.25rem;
            /* 20px */
            stroke-width: 2;
            stroke: currentColor;
            fill: none;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        /* Show/hide based on mode */
        .light-mode-item {
            display: block;
        }

        .dark-mode-item {
            display: none;
        }

        .dark-mode .light-mode-item {
            display: none;
        }

        .dark-mode .dark-mode-item {
            display: block;
        }

        /* LIGHT MODE STYLES (Default) */
        body {
            background-color: #F5F5F5;
            /* Main background */
            color: #374151;
            /* Default text color */
        }

        .light-bg-white {
            background-color: #FFFFFF;
        }

        .light-bg-f5f5f5 {
            background-color: #F5F5F5;
        }

        .light-text-gray-800 {
            color: #1F2937;
        }

        .light-text-gray-600 {
            color: #4B5563;
        }

        .light-text-gray-500 {
            color: #6B7280;
        }

        .light-text-gray-700 {
            color: #374151;
        }

        .light-text-gray-900 {
            color: #111827;
        }

        .light-text-black {
            color: #000000;
        }

        .light-border-gray-300 {
            border-color: #D1D5DB;
        }

        .light-hover-bg-gray-200:hover {
            background-color: #E5E7EB;
        }

        .light-bg-orange-600 {
            background-color: #EA580C;
        }

        .light-bg-gray-500 {
            background-color: #6B7280;
        }

        .light-hover-bg-orange-600:hover {
            background-color: #C2410C;
        }

        .light-bg-d7d7d7 {
            background-color: #D7D7D7;
        }

        .light-bg-00cfe8 {
            background-color: #00CFE8;
        }

        .light-bg-ea54547a {
            background-color: #f3dbdb;
        }

        .light-text-ff0000 {
            color: #FF0000;
        }

        .light-bg-e6e6e6 {
            background-color: #E6E6E6;
        }

        .light-text-orange-500 {
            color: #F97316;
        }

        .light-hover-text-orange-700:hover {
            color: #C2410C;
        }

        .light-border-black {
            border-color: #000000;
        }

        /* Added for bottom card buttons */

        /* Specific light mode icon backgrounds */
        .light-bg-00cfe8-icon {
            background-color: #00CFE8;
        }

        .light-bg-28c76f-icon {
            background-color: #28C76F;
        }

        .light-bg-ea5455-icon {
            background-color: #EA5455;
        }

        .light-bg-ff9f43-icon {
            background-color: #FF9F43;
        }

        .light-bg-d9d9d9 {
            background-color: #D9D9D9;
        }


        /* DARK MODE STYLES */
        body.dark-mode {
            background-color: #000000;
            /* Main background */
            color: #FFFFFF;
            /* Default text color */
        }

        body.dark-mode ::-webkit-scrollbar-track {
            background: #171717;
        }

        body.dark-mode ::-webkit-scrollbar-thumb {
            background: #333;
        }

        body.dark-mode ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        .dark-mode .light-bg-white,
        .dark-mode .light-bg-f5f5f5 {
            background-color: #000000 !important;
            /* General backgrounds for cards, sidebar, header */
        }

        .dark-mode .light-text-gray-800,
        .dark-mode .light-text-gray-900,
        .dark-mode .light-text-gray-600,
        .dark-mode .light-text-gray-500,
        .dark-mode .light-text-gray-700,
        .dark-mode .light-text-black {
            color: #FFFFFF !important;
            /* All text becomes white in dark mode */
        }

        .dark-mode .light-text-black span {
            color: #FFFFFF !important;
        }

        .dark-mode .text-gray-400 {
            /* Specific override for Misc header and search icon */
            color: #9CA3AF !important;
        }

        /* DARK MODE BUTTON STYLES */
        .dark-mode .dark-bg-gray-700 {
            background-color: #374151 !important;
            /* gray-700 */
        }

        .dark-mode .dark-hover-bg-gray-600:hover {
            background-color: #4B5563 !important;
            /* gray-600 */
        }

        .dark-mode .dark-border-gray-500 {
            border-color: #6B7280 !important;
            /* gray-500 */
        }

        /* Dark Mode Button Styles */
        .dark-mode .dark-bg-gray-800 {
            background-color: #1F2937 !important;
            /* gray-800 */
        }

        .dark-mode .dark-bg-gray-800:hover {
            background-color: #374151 !important;
            /* gray-700 (hover) */
        }

        /* Invert icon color in dark mode */
        .dark-mode .dark\:invert {
            filter: invert(1);
        }

        .dark-mode .light-bg-bill {
            background-color: #121212;
        }

        /* Sidebar specific dark mode styles */
        .dark-mode aside {
            background-color: #171717 !important;
        }

        .dark-mode .sidebar .my-4.border-t.border-gray-200 {
            /* Divider */
            border-color: #333333 !important;
        }

        .dark-mode .sidebar a.light-bg-orange-600 {
            /* Active Dashboard link */
            background-color: #2c1e17 !important;
            color: #E5E7EB !important;
            border-color: transparent !important;
            /* Ensure border is not visible */
        }

        .dark-mode .sidebar a.light-bg-orange-600.active-link {
            /* Active Dashboard link with specific border */
            border-left: 1px solid #FC5E14 !important;
            /* Orange border */
            border-right: 1px solid #FC5E14 !important;
            border-top: transparent !important;
            border-bottom: transparent !important;
        }

        .dark-mode .sidebar a.light-hover-bg-gray-200:hover {
            background-color: #F97316 !important;
            /* Orange-500 for hover */
            color: #FFFFFF !important;
        }

        .dark-mode .sidebar a.light-hover-bg-gray-200:hover img {
            filter: brightness(0) invert(1);
            /* Invert icon color for hover if it's black */
        }

        /* Header specific dark mode styles */
        .dark-mode header {
            background-color: #171717 !important;
        }

        .dark-mode input {
            background-color: #1c1c1c !important;
            border-color: #374151 !important;
            /* gray-700 */
            color: #FFFFFF !important;
        }

        .dark-mode .light-bg-d9d9d9 {
            /* Circular button backgrounds in header */
            background-color: #1c1c1c !important;
            border-color: #333333 !important;
            /* Adjusted border for dark mode */
        }

        .dark-mode .light-hover-bg-gray-200:hover {
            background-color: #333333 !important;
            /* Darker hover for header buttons */
        }


        /* Connect Domain Section */
        .dark-mode .light-bg-orange-600 {
            /* Add New Domain button */
            background-color: #1c1c1c !important;
            /* As per dark mode image */
            color: #FFFFFF !important;
        }

        .dark-mode .light-hover-bg-orange-600:hover {
            background-color: #2e2e2e !important;
            /* Slightly darker hover */
        }


        /* Overview Cards */
        .dark-mode [style*="background-color: #D6F7FB;"] {
            background-color: #171717 !important;
            border: 1px solid #FC5E1433 !important;
        }

        .dark-mode [style*="background-color: #DDF6E8;"] {
            background-color: #171717 !important;
            border: 1px solid #FC5E1433 !important;
        }

        .dark-mode [style*="background-color: #FCE4E4;"] {
            background-color: #171717 !important;
            border: 1px solid #FC5E1433 !important;
        }

        .dark-mode [style*="background-color: #FFF0E1;"] {
            background-color: #171717 !important;
            border: 1px solid #FC5E1433 !important;
        }


        /* Overview Card Icon Backgrounds */
        .dark-mode .light-bg-00cfe8-icon {
            background-color: #133438 !important;
        }

        .dark-mode .light-bg-28c76f-icon {
            background-color: #1a3325 !important;
        }

        .dark-mode .light-bg-ea5455-icon {
            background-color: #392121 !important;
        }

        .dark-mode .light-bg-ff9f43-icon {
            background-color: #3c2d1e !important;
        }


        /* SEO Plan Cards */
        .dark-mode .light-bg-seo {
            /* BG SEO CARD */
            background-color: #171717 !important;

        }

        .dark-mode .light-bg-d7d7d7 {
            /* Starter SEO tag */
            background-color: #333333 !important;
            color: #FFFFFF !important;
        }

        .dark-mode .light-bg-00cfe8 {
            /* Growth SEO tag */
            background-color: #133438 !important;
            color: #FFFFFF !important;
        }

        .dark-mode .light-bg-white.light-text-black {
            /* Pro SEO tag (assuming it was white bg with black text) */
            background-color: #1a3325 !important;
            color: #FFFFFF !important;
        }

        .dark-mode .toggle-btn {
            /* View More buttons on SEO cards */
            background-color: transparent !important;
            /* No background */
            color: #FFFFFF !important;
            /*  border: 1px solid #333333;  Light border */
        }

        .dark-mode .toggle-btn:hover {
            /* background-color: #333333 !important;  Hover background */
            color: #ffffff !important;
            /* Black text on hover */
        }


        /* Tables (Projects List & Reports) */
        .dark-mode table thead {
            background-color: #171717 !important;
        }

        .dark-mode table tbody {
            background-color: #171717 !important;
        }

        .dark-mode .light-border-gray-300 {
            border-color: #1C1C1C !important;
            /* gray-700 */
        }

        .dark-mode .light-hover-bg-gray-200:hover {
            background-color: #333333 !important;
            /* Adjusted hover for dark mode table buttons */
        }

        .dark-mode .light-bg-ea54547a {
            /* High Priority tag */
            background-color: #7A3D3D !important;
            color: #FFB3B3 !important;
        }

        .dark-mode .light-bg-e6e6e6 {
            /* Reports PDF button */
            background-color: #2e2e2e !important;
            color: #9CA3AF !important;
            /* gray-400 */
        }

        .dark-mode .light-text-orange-500 {
            /* Action eye icon */
            color: #FFFFFF !important;
            /* White in dark mode */
        }

        .dark-mode .light-hover-text-orange-700:hover {
            color: #FC5E14 !important;
            /* Orange hover for action icon */
        }

        /* Progress bars */
        .dark-mode .bg-gray-200 {
            /* Progress bar track */
            background-color: #8692D014 !important;
        }

        /* Keep original progress bar fill colors */
        .dark-mode .bg-green-400 {
            background-color: #4CAF50 !important;
        }

        .dark-mode .bg-blue-400 {
            background-color: #2196F3 !important;
        }

        .dark-mode .bg-yellow-400 {
            background-color: #FFEB3B !important;
        }

        /* Pagination buttons */
        .dark-mode .light-border-gray-300.px-5.py-3 {
            border-color: #1C1C1C !important;
            /* gray-700 */
            background-color: transparent !important;
            /* Ensure no background */
            color: #FFFFFF !important;
        }

        .dark-mode .light-border-gray-300.px-5.py-3.light-hover-bg-gray-200:hover {
            background-color: #1C1C1C !important;
            /* Darker hover */
        }

        .dark-mode .light-bg-orange-600.text-white.font-semibold {
            background-color: #FC5E14 !important;
            /* Active pagination button */
            border-color: #FC5E14 !important;
        }

        /* Bottom Cards */
        .dark-mode .light-border-black {
            border-color: #333333 !important;
            /* Darker border for buttons */
        }

        .dark-mode .bg-gray-500 {
            /* Learn More buttons */
            background-color: #333333 !important;
            /* Darker gray */
        }

        .dark-mode .bg-gray-500:hover {
            background-color: #FC5E14 !important;
            /* Orange hover */
        }

        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        /* --- RESPONSIVENESS (MEDIA QUERIES) --- */

        /* Mobile-first approach */
        /* Sidebar is hidden by default on mobile */
        aside {
            display: block !important;
            position: fixed;
            top: 0;
            left: -100%;
            /* Completely off-screen by default */
            height: 100vh;
            width: 16rem;
            /* Fixed width for mobile overlay */
            z-index: 50;
            transition: left 0.3s ease-in-out;
        }

        /* Sidebar when open */
        aside.open {
            left: 0;
            /* Slide in when open */
        }

        /* Overlay for when sidebar is open on mobile */
        .sidebar-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 40;
            display: none;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .sidebar-overlay.open {
            display: block;
            opacity: 1;
        }

        /* Hide the main content overflow when sidebar is open */
        body.sidebar-open {
            overflow: hidden;
        }

        /* Hamburger menu - visible only on smaller screens */
        .hamburger-menu {
            display: block;
            /* Visible by default on mobile */
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 9999px;
            transition: background-color 0.3s ease;
            z-index: 60;
            /* Ensure it's above other elements */
        }

        /* Hide John Wick name on small screens */
        .header .sm\:block {
            display: none;
        }

        /* Small screens (sm) - 640px and up */
        @media (max-width: 640px) {
            .header .sm\:block {
                display: block;
            }

            /* Show John Wick name on sm and up */
            aside {
                display: none !important;
            }

            table th,
            table td {
                padding-left: 1.5rem;
                padding-right: 1.5rem;
                padding-top: 1rem;
                padding-bottom: 1rem;
            }

            table th .icon.mr-2 {
                margin-right: 0.5rem;
            }

            table th .icon.mr-10 {
                margin-right: 1rem;
            }
        }

        /* Medium screens (md) - 768px and up */
        @media (min-width: 768px) {
            table th .icon.mr-10 {
                margin-right: 2.5rem;
            }
        }

        /* Large screens (lg) - 1024px and up */
        @media (min-width: 1024px) {

            /* Sidebar becomes part of the normal layout */
            aside {
                position: sticky;
                left: 0;
                width: 16rem;
                flex-shrink: 0;
                transform: none !important;
                /* Prevent any transform from mobile state */
            }

            /* Hide hamburger menu on desktop */
            .hamburger-menu {
                display: block;
            }

            /* Hide overlay on desktop */
            .sidebar-overlay {
                display: none !important;
            }

            /* Remove overflow hidden from body on desktop */
            body.sidebar-open {
                overflow: visible;
            }
        }
    </style>

</head>

<body>
    <div class="flex min-h-screen light-bg-white">
        <!-- Sidebar -->
        @include('layouts.sidebar')

        <!-- Main Content Area -->
        <main class="flex-1 light-bg-f5f5f5 overflow-y-auto">
            <!-- Header -->
            @include('layouts.header')
            <div class="p-6 lg:p-8">



                <h1 class="text-3xl font-bold light-text-gray-800 mb-10">Analytics</h1>
                <div class="close">
                    <div class="light-bg-f5f5f5 light-bg-seo p-6 rounded-xl shadow-sm mb-6 gap-4">
                        <div class="flex flex-col">
                            <h2 class="text-xl font-semibold light-text-gray-800 mb-2">Connect Google Analytics</h2>
                            <p class="light-text-gray-800 mb-4">Google Analytics allows you to track website traffic,
                                sessions, bounce rates, and much more. Connect your account now!</p>

                            <div class="flex items-center justify-end flex-wrap gap-4">
                                <a href="#"
                                    class="text-white bg-gray-500 px-6 py-2 rounded-lg  hover:underline">Need Help?</a>
                                <button
                                    class="bg-orange-600 hover:bg-orange-700 text-white px-6 py-2 rounded-lg font-medium transition-colors shadow-md"
                                    data-modal-target="analyticsModal">
                                    Connect your Google Analytics
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="open ">
                    <div class="p-6 -mt-7 lg:p-8 light-bg-bill">

                        <div class="light-bg-f5f5f5 light-bg-seo p-6 rounded-xl shadow-sm mb-6">
                            <div class="flex flex-col gap-4">
                                <!-- Top Row: Text + Button -->
                                <div class="flex justify-between items-center">
                                    <h2 class="text-xl font-semibold light-text-gray-800">Connected Domain</h2>
                                    <button class="text-white bg-gray-500 px-3 py-2 rounded-lg hover:underline">
                                        Add New Domain
                                    </button>
                                </div>

                                <div class="relative w-full flex items-center">
                                    <div class="flex items-center w-full gap-2">
                                        <!-- Input Field with Internal Dropdown Arrow -->
                                        <div class="relative flex-grow">
                                            <input type="text" placeholder="www.wizspeed.com"
                                                class="block w-full px-3 py-2 border light-border-gray-300 rounded-md shadow-sm light-bg-gray-50 light-text-gray-900 focus:outline-none focus:ring-orange-500 focus:border-orange-500 pr-10">
                                            <!-- Dropdown Arrow Inside Input -->
                                            <div
                                                class="absolute inset-y-0 right-0 flex items-center pr-3  pointer-events-none">
                                                <svg class="w-4 h-4 light-text-gray-400" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                </svg>
                                            </div>
                                        </div>

                                        <!-- Two Trash Icons Outside Input -->
                                        <div class="flex items-center space-x-2">
                                            <img src="{{ asset('./assets/refresh-2.png') }}" alt="Delete"
                                                class="w-10 h-10 bg-gray-500 text-white p-2 rounded-full">
                                            <img src="{{ asset('assets/trash.png') }}" alt="Delete"
                                                class="w-10 h-10 bg-gray-500 p-2 rounded-full">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="light-bg-bill">

                        <div class="grid grid-cols-1 md:grid-cols-2 lg:p-8 lg:grid-cols-5 gap-4 p-4">
                            <!-- Session Box -->
                            <div class="light-bg-f5f5f5 light-bg-seo p-6 rounded-lg shadow-sm">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h3 class="light-text-gray-800 text-sm font-medium">Sessions</h3>
                                        <p class="text-gray-400 pb-4 text-xs">This Month</p>
                                    </div>
                                </div>
                                <div class="w-full chart-wrapper">
                                    <canvas id="sessionChart"></canvas>
                                </div>
                                <div class="mt-4 flex justify-between">
                                    <p class="text-2xl font-semibold light-text-gray-800" id="current_month_session">45.1k</p>
                                    <p class="text-green-500 text-sm mt-1 flex items-center" id="sessionPercent">
                                        +12.6%
                                    </p>
                                </div>
                            </div>

                            <!-- Active Visitors Box -->
                            <div class="light-bg-f5f5f5 light-bg-seo p-6 rounded-lg shadow-sm">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h3 class="light-text-gray-800 text-sm font-medium">Active Visitors</h3>
                                        <p class="text-gray-400 pb-4 text-xs">Today</p>
                                    </div>
                                </div>
                                <div class="w-full chart-wrapper">
                                    <canvas id="activeVisitors"></canvas>
                                </div>
                                <div class="mt-4 flex justify-between">
                                    <p class="text-2xl font-semibold light-text-gray-800">12k</p>
                                    <p class="text-green-500 text-sm mt-1 flex items-center">

                                        +12.6%
                                    </p>
                                </div>
                            </div>

                            <!-- Impression Box -->
                            <div class="light-bg-f5f5f5 light-bg-seo p-6 rounded-lg shadow-sm">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h3 class="light-text-gray-800 text-sm font-medium">Impression</h3>
                                        <p class="text-gray-400 text-xs">This Week</p>
                                    </div>
                                </div>
                                <div class="w-full chart-wrapper">
                                    <canvas id="impressions"></canvas>
                                </div>
                                <div class="mt-4 flex justify-between">
                                    <p class="text-2xl font-semibold light-text-gray-800">26.1k</p>
                                    <p class="text-red-500 text-sm mt-1 flex items-center">

                                        -24.5%
                                    </p>
                                </div>
                            </div>

                            <!-- Bounce Rate Box -->
                            <div class="light-bg-f5f5f5 light-bg-seo rounded-lg p-6 shadow-sm overflow-hidden">
                                <div class="">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <h3 class="light-text-gray-800 text-sm font-medium">Bounce Rate</h3>
                                            <p class="text-gray-400 text-xs">Last Month</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full chart-wrapper">
                                    <canvas id="bounceRate"></canvas>
                                </div>
                                <!-- Full width image -->
                                <div class="mt-4 flex justify-between items-center"> <!-- Text inline -->
                                    <p class="text-2xl font-semibold light-text-gray-800">75%</p>
                                    <p class="text-red-500 text-sm mt-1 flex items-center">

                                        -16.2%
                                    </p>
                                </div>
                            </div>

                            <!-- Conversion Rate Box -->
                            <div class="light-bg-f5f5f5 light-bg-seo p-6 rounded-lg overflow-hidden shadow-sm">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h3 class="light-text-gray-800 text-sm font-medium">Engagement Rate</h3>
                                        <p class="text-gray-400 text-xs">Last Month</p>
                                    </div>
                                </div>
                                <div class="w-full chart-wrapper">
                                    <canvas id="conversitionRate"></canvas>
                                </div>
                                <div class="mt-4 flex justify-between items-start">
                                    <p class="text-2xl font-semibold light-text-gray-800">62%</p>
                                    <p class="text-green-500 text-sm mt-1 flex items-center">

                                        +8.24%
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="light-bg-bill">

                        <div class="grid grid-cols-1 lg:grid-cols-[60%_40%] gap-6 pl-8 pr-14 pb-5">
                            <!-- Average Session Duration Chart (60% width) -->
                            <div class="light-bg-f5f5f5 light-bg-seo p-6 rounded-xl shadow-sm" style="height: 25em !important;">
                                <div class="mb-6">
                                    <h3 class="text-lg font-semibold light-text-gray-800">Average Session Duration</h3>
                                    <p class="text-sm text-gray-400">Yearly Average Session Duration</p>
                                </div>

                                <div class="h-52 flex items-end space-x-2">
                                    <!-- Chart Bars -->
                                    <div class="chart-container">
                                        <canvas id="earningsChart"></canvas>
                                    </div>
                                </div>

                            </div>

                            <!-- Traffic by Countries Box (40% width) -->
                            <div class="light-bg-f5f5f5 light-bg-seo p-6 rounded-xl shadow-sm">
                                <div class="mb-6">
                                    <h3 class="text-lg font-semibold light-text-gray-800">Traffic by Countries</h3>
                                    <p class="text-sm text-gray-400">Monthly Sales Overview</p>
                                </div>

                                <div class="space-y-4 traffic-countries overflow-y-auto" style="height: 25em !important;">

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
        </main>




        <div id="analyticsModal" class="absolute inset-0 z-50 hidden overflow-x-auto">
            <div class="fixed inset-0 transition-opacity bg-[#171717] opacity-75" aria-hidden="true"></div>

            <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:p-0">
                <div
                    class="inline-block align-bottom bg-[#171717] rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full mx-auto">
                    <div class="relative bg-[#171717] px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <button type="button"
                            class="absolute top-4 right-4 text-gray-400 hover:text-gray-200 focus:outline-none"
                            id="closeModal">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>

                        <h3 class="text-lg leading-6 font-medium text-white mb-4">
                            How to Connect Google Analytics
                        </h3>
                        <ol class="list-decimal pl-5 space-y-2 text-gray-300">
                            <li>Sign in to your Google Analytics account.</li>
                            <li>Click on the Admin section.</li>
                            <li>Select your website property.</li>
                            <li>Copy the tracking code.</li>
                            <li>Paste the tracking code into the WizSpeed Analytics settings.</li>
                        </ol>
                    </div>
                    <div class="bg-[#171717] px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button type="button" id="openPropertyModal"
                            class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-orange-500 text-base font-medium text-white hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 sm:ml-3 sm:w-auto sm:text-sm">
                            Connect your Google Analytics
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Google Property ID Modal -->
        <div id="propertyIdModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
            <!-- Overlay -->
            <div class="fixed inset-0 bg-[#171717] opacity-75"></div>

            <!-- Modal Wrapper -->
            <div class="flex items-center justify-center min-h-screen px-4">
                <div
                    class="bg-[#171717] rounded-lg text-left shadow-xl transform transition-all sm:max-w-md w-full mx-auto">

                    <!-- Modal Content -->
                    <div class="relative px-6 pt-6 pb-4">
                        <!-- Close -->
                        <button type="button" id="closePropertyModal"
                            class="absolute top-4 right-4 text-gray-400 hover:text-gray-200">
                            ✕
                        </button>

                        <h3 class="text-lg font-medium text-white mb-4">
                            Google Property ID Key
                        </h3>

                        <input id="gaPropertyInput" type="text" placeholder="Enter here"
                            class="w-full rounded-md bg-[#1f1f1f] border border-gray-600 text-white px-4 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500" />

                        <p id="gaError" class="text-sm text-red-500 mt-2 hidden">
                            Invalid GA4 Property ID. Format: G-XXXXXXXX
                        </p>
                    </div>

                    <!-- Actions -->
                    <div class="px-6 py-4 flex justify-end gap-3">
                        <button type="button" id="cancelPropertyModal"
                            class="px-4 py-2 rounded-md bg-gray-600 text-white hover:bg-gray-700">
                            Cancel
                        </button>

                        <button type="button" id="triggerBtn"
                            class="px-4 py-2 rounded-md bg-orange-500 text-white hover:bg-orange-600">
                            Confirm
                        </button>
                    </div>

                </div>
            </div>
        </div>


        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const body = document.body;
                const knowledgeButton = document.getElementById('knowledgeButton');
                const filterButton = document.getElementById('filterButton');
                const filterDropdown = document.getElementById('filterDropdown');

                // ✅ Dropdown toggle
                if (filterButton && filterDropdown) {
                    filterButton.addEventListener('click', (e) => {
                        e.stopPropagation();
                        filterDropdown.classList.toggle('hidden');
                    });

                    document.addEventListener('click', () => {
                        filterDropdown.classList.add('hidden');
                    });
                }

                // ✅ Dropdown color update
                const updateDropdownColors = () => {
                    const isDarkMode = body.classList.contains('dark-mode');
                    if (filterDropdown) {
                        filterDropdown.style.color = isDarkMode ? 'white' : 'black';
                        filterDropdown.style.backgroundColor = isDarkMode ? '#1a1a1a' : 'white';
                    }
                };

                // ✅ Dark mode toggle
                const toggleDarkMode = () => {
                    body.classList.toggle('dark-mode');
                    updateImageSources(body.classList.contains('dark-mode'));
                    updateDropdownColors();
                    localStorage.setItem('theme', body.classList.contains('dark-mode') ? 'dark' : 'light');
                    updateModalColors();
                };

                // ✅ Update images for dark/light
                const updateImageSources = (isDarkMode) => {
                    const icons = document.querySelectorAll('.light-mode-icon');
                    icons.forEach(icon => {
                        const darkSrc = icon.dataset.darkSrc;
                        const originalSrc = icon.src.replace('-DARK.svg', '.svg');
                        if (darkSrc) icon.src = isDarkMode ? darkSrc : originalSrc;
                    });

                    const images = document.querySelectorAll('.light-mode-img');
                    images.forEach(img => {
                        const darkSrc = img.dataset.darkSrc;
                        const originalSrc = img.src.replace('-DARK.png', '.png');
                        if (darkSrc) img.src = isDarkMode ? darkSrc : originalSrc;
                    });

                    const logo = document.querySelector('.light-mode-logo');
                    if (logo) {
                        const darkLogoSrc = logo.dataset.darkSrc;
                        const lightLogoSrc = 'Frame 2147224409.png';
                        logo.src = isDarkMode ? darkLogoSrc : lightLogoSrc;
                    }
                };

                // ✅ Apply theme from localStorage
                if (localStorage.getItem('theme') === 'dark') {
                    body.classList.add('dark-mode');
                }

                updateImageSources(body.classList.contains('dark-mode'));
                updateDropdownColors();

                // ✅ Dark mode toggle button
                if (knowledgeButton) {
                    knowledgeButton.addEventListener('click', (e) => {
                        e.preventDefault();
                        toggleDarkMode();
                    });
                }

                // ✅ SEO card "View More" toggle
                const seoCards = document.getElementById('seo-cards');

                if (seoCards) {
                    seoCards.addEventListener('click', function(event) {
                        if (event.target.classList.contains('toggle-btn')) {
                            const card = event.target.closest('div[class*="p-10"]');
                            const content = card.querySelector('.card-content');
                            const icon = event.target.querySelector('img.toggle-icon'); // Get the icon
                            const textNode = event.target.childNodes[
                                0]; // Get the text node (assuming it's first)

                            if (!content.style.maxHeight || content.style.maxHeight === '0px') {
                                content.style.maxHeight = content.scrollHeight + 'px';
                                textNode.textContent = 'View Less '; // Update text only
                            } else {
                                content.style.maxHeight = '0px';
                                textNode.textContent = 'View More '; // Update text only
                            }
                        }
                    });
                }

                const triggerBtn = document.getElementById("triggerBtn");
                const openEl = document.querySelector(".open");
                const closeEl = document.querySelector(".close");

                triggerBtn.addEventListener("click", () => {
                    openEl.classList.remove("hidden"); // show .open
                    closeEl.classList.add("hidden"); // hide .close
                    document.body.style.overflow = 'auto';
                });
            });

            document.addEventListener('DOMContentLoaded', () => {
                // ... your existing code ...

                // Modal functionality
                const analyticsModal = document.getElementById('analyticsModal');
                const connectButtons = document.querySelectorAll('[data-modal-target="analyticsModal"]');
                const closeModal = document.getElementById('closeModal');
                const connectButton = document.getElementById('connectButton');

                // Open modal when any "Connect your Google Analytics" button is clicked
                connectButtons.forEach(button => {
                    button.addEventListener('click', (e) => {
                        e.preventDefault();
                        analyticsModal.classList.remove('hidden');
                        document.body.style.overflow = 'hidden'; // Prevent scrolling when modal is open
                    });
                });

                // Close modal when X or Close button is clicked
                closeModal.addEventListener('click', () => {
                    analyticsModal.classList.add('hidden');
                    document.body.style.overflow = 'auto';
                });

                // Close modal when clicking outside the modal content
                analyticsModal.addEventListener('click', (e) => {
                    if (e.target === analyticsModal) {
                        analyticsModal.classList.add('hidden');
                        document.body.style.overflow = 'auto';
                    }
                });

                // Action when "Connect your Google Analytics" button inside modal is clicked
                connectButton.addEventListener('click', () => {
                    // Here you would add your actual connection logic
                    console.log('Connecting Google Analytics...');
                    analyticsModal.classList.add('hidden');
                    document.body.style.overflow = 'auto';
                });

                // Update modal colors for dark mode
                const updateModalColors = () => {
                    const isDarkMode = body.classList.contains('dark-mode');
                    const modalContents = document.querySelectorAll('.dark\\:bg-gray-800');
                    const modalTexts = document.querySelectorAll('.dark\\:text-white, .dark\\:text-gray-300');

                    modalContents.forEach(el => {
                        el.style.backgroundColor = isDarkMode ? '#1a1a1a' : 'white';
                    });

                    modalTexts.forEach(el => {
                        el.style.color = isDarkMode ? 'white' : '';
                    });
                };

                // Call this in your existing toggleDarkMode function
                // Add this line inside your toggleDarkMode function:
                // updateModalColors();
            });

            // Earnings chart
            const ctxEarnings = document.getElementById('earningsChart').getContext('2d');

            const earningsChart = new Chart(ctxEarnings, {
                type: 'bar',
                data: {
                    labels: [],
                    datasets: [{
                        label: 'Earnings',
                        data: ['10', '15', '8', '12', '20', '18', '25', '22', '30'],
                        backgroundColor: [
                            '#3b3b3b',
                            '#3b3b3b',
                            '#FF6A00',
                            '#3b3b3b',
                            '#3b3b3b',
                            '#3b3b3b',
                            '#3b3b3b',
                            '#3b3b3b',
                            '#3b3b3b'
                        ],
                        borderRadius: 5,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            callbacks: {
                                label: (context) => `${context.parsed.y}k`
                            }
                        },
                        datalabels: {
                            display: false
                        }
                    },
                    scales: {
                        x: {
                            grid: {
                                display: false
                            },
                            ticks: {
                                color: '#aaa'
                            }
                        },
                        y: {
                            grid: {
                                color: '#2a2a2a'
                            },
                            ticks: {
                                color: '#aaa',
                                callback: (value) => `${value}k`
                            }
                        }
                    }
                }
            });

            // bounceRate chart

            const ctxbounceRate = document.getElementById('bounceRate').getContext('2d');

            const bounceRateChart = new Chart(ctxbounceRate, {
                type: 'line',
                data: {
                    labels: ['', '', '', ''], // keep empty to avoid x-axis text
                    datasets: [{
                        data: [55, 60, 58, 62],
                        borderColor: '#90EE90',
                        backgroundColor: 'rgba(144, 238, 144, 0.06)',
                        fill: true,
                        tension: 0.4,
                        pointRadius: 0,
                        pointHoverRadius: 0
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            enabled: false
                        }
                    },
                    scales: {
                        x: {
                            display: false
                        },
                        y: {
                            display: false
                        }
                    }
                }
            });

            // conversitionRate chart

            const ctxConversitionRate = document.getElementById('conversitionRate').getContext('2d');

            const conversitionRateChart = new Chart(ctxConversitionRate, {
                type: 'line',
                data: {
                    labels: ['', '', '', ''],
                    datasets: [{
                        label: '',
                        data: [5, 60, 80, 100],
                        borderColor: '#FF6A00',
                        borderWidth: 1,
                        fill: true,
                        tension: 0.4,
                        pointRadius: 5,
                        pointHoverRadius: 7
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            callbacks: {
                                label: ctx => `${ctx.parsed.y}%`
                            }
                        }
                    },
                    scales: {
                        x: {
                            grid: {
                                display: false
                            },
                            ticks: {
                                color: '#aaa'
                            }
                        },
                        y: {
                            grid: {
                                display: false,
                                color: '#2a2a2a'
                            },
                            ticks: {
                                color: '#aaa',
                                display: false,
                            }
                        }
                    }
                }
            });

            // Active Visitors Chart

            const ctxactiveVisitors = document.getElementById('activeVisitors').getContext('2d');

            const activeVisitorsChart = new Chart(ctxactiveVisitors, {
                type: 'bar',
                data: {
                    labels: ['', '', '', '', '', '', '', '', ''],
                    datasets: [{
                        label: '',
                        data: [28, 10, 45, 38, 15, 30, 35],
                        backgroundColor: [
                            '#3b3b3b',
                            '#3b3b3b',
                            '#FF6A00',
                            '#3b3b3b',
                            '#3b3b3b',
                            '#3b3b3b',
                            '#3b3b3b',
                        ],
                        borderRadius: 12,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            callbacks: {
                                label: (context) => `${context.parsed.y}k`
                            }
                        },
                        datalabels: {
                            display: false
                        }
                    },
                    scales: {
                        x: {
                            grid: {
                                display: false
                            },
                            ticks: {
                                color: '#aaa'
                            }
                        },
                        y: {
                            grid: {
                                display: false,
                                color: '#2a2a2a'
                            },
                            ticks: {
                                display: false,
                                color: '#aaa',
                            }
                        }
                    }
                }
            });


            // Impression Chart
            const ctxImpression = document
                .getElementById('impressions')
                .getContext('2d');

            const impressionsChart = new Chart(ctxImpression, {
                type: 'line',
                data: {
                    labels: ['', '', '', '', '', '', ''],
                    datasets: [{
                        data: [200, 400, 300, 500, 400, 600, 500],
                        borderColor: '#FF4D4D',
                        borderWidth: 2,
                        fill: false,
                        tension: 0,
                        pointRadius: 0,
                        pointHoverRadius: 0
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            enabled: false
                        }
                    },
                    scales: {
                        x: {
                            display: false
                        },
                        y: {
                            display: false
                        }
                    }
                }
            });

            // Session Chart

            const ctxSession = document.getElementById('sessionChart').getContext('2d');

            const sessionChart = new Chart(ctxSession, {
                type: 'bar',
                data: {
                    labels: ['', '', '', '', ''],
                    datasets: [{
                            // white (top) bars
                            data: [],
                            backgroundColor: [],
                            borderRadius: 10,
                            barThickness: 10
                        },
                        {
                            // green (bottom) dots
                            data: [20, 20, 20, 20, 20],
                            backgroundColor: '#ffffff',
                            borderRadius: 10,
                            barThickness: 10
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            enabled: false
                        }
                    },
                    scales: {
                        x: {
                            stacked: true,
                            display: false
                        },
                        y: {
                            stacked: true,
                            display: false
                        }
                    }
                }
            });

            // Google Property ID Modal Functionality

            document.addEventListener('DOMContentLoaded', () => {
                const openBtn = document.getElementById('openPropertyModal');
                const modal = document.getElementById('propertyIdModal');
                const analyticsModal = document.getElementById('analyticsModal');
                const cancelBtn = document.getElementById('cancelPropertyModal');
                const closeBtn = document.getElementById('closePropertyModal');
                const confirmBtn = document.getElementById('triggerBtn'); // updated ID
                const input = document.getElementById('gaPropertyInput');
                const error = document.getElementById('gaError');

                // Open property modal
                if (openBtn && modal) {
                    openBtn.addEventListener('click', () => {
                        if (analyticsModal) analyticsModal.classList.add('hidden'); // hide analyticsModal
                        modal.classList.remove('hidden');
                        input?.focus();
                    });
                }

                // Close modal buttons
                [cancelBtn, closeBtn].forEach(btn => {
                    if (btn) {
                        btn.addEventListener('click', () => modal.classList.add('hidden'));
                    }
                });

                // Click outside modal to close
                if (modal) {
                    modal.addEventListener('click', e => {
                        if (e.target === modal) modal.classList.add('hidden');
                    });
                }

                // ESC key to close modal
                document.addEventListener('keydown', e => {
                    if (e.key === 'Escape' && modal && !modal.classList.contains('hidden')) {
                        modal.classList.add('hidden');
                    }
                });

                // Confirm button hides modal after validation
                if (confirmBtn && input && error) {
                    confirmBtn.addEventListener('click', () => {
                        const value = input.value.trim();
                        const ga4Regex = /^G-[A-Z0-9]{8,}$/;

                        if (!ga4Regex.test(value)) {
                            error.classList.remove('hidden');
                            return;
                        }

                        error.classList.add('hidden');
                        localStorage.setItem('ga4_measurement_id', value);
                        console.log('GA4 Measurement ID saved:', value);

                        modal.classList.add('hidden'); // hide modal on confirm
                        input.value = ''; // optional: clear input for next time
                    });
                }
            });
        </script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        {{-- charts ajax call --}}
        <script>
            $(document).ready(function() {

                $.ajax({
                    url: '/session-data',
                    type: 'GET',
                    success: function(response) {
                        console.log("Session Duration Data Fetch", response);

                        earningsChart.data.labels = response.labels;
                        earningsChart.data.datasets[0].data = response.values;

                        const maxVal = Math.max(...response.values);
                        earningsChart.data.datasets[0].backgroundColor = response.values.map(v =>
                            v === maxVal ? '#FF6A00' : '#3b3b3b'
                        );

                        earningsChart.update();
                    },
                    error: function(err) {
                        console.error('Error fetching session duration data', err);
                    }
                });

                $.ajax({
                    url: '/active-visitors',
                    type: 'GET',
                    success: function(response) {
                        console.log("Active Visitors Data Fetch", response);

                        activeVisitorsChart.data.labels = response.labels;
                        activeVisitorsChart.data.datasets[0].data = response.values;

                        const maxVal = Math.max(...response.values);
                        activeVisitorsChart.data.datasets[0].backgroundColor = response.values.map(v =>
                            v === maxVal ? '#FF6A00' : '#3b3b3b'
                        );

                        activeVisitorsChart.update();
                    },
                    error: function(err) {
                        console.error('Error fetching session duration data', err);
                    }
                });

                $.ajax({
                    url: '/traffic-data',
                    type: 'GET',
                    success: function(response) {
                        console.log("Session fetch", response);

                        $('#current_month_session').text(response.current_month_sessions);
                        let percent = response.percent_change;

                        $('#sessionPercent').text(percent);

                        if (percent.startsWith('+')) {
                            $('#sessionPercent').removeClass('text-red-500').addClass('text-green-500');
                        } else if (percent.startsWith('-')) {
                            $('#sessionPercent').removeClass('text-green-500').addClass('text-red-500');
                        }

                        // Fill chart labels & data
                        sessionChart.data.labels = response.labels;
                        sessionChart.data.datasets[0].data = response.values;

                        // keep gradient fill
                        sessionChart.data.datasets[0].backgroundColor = "#28C76F";

                        sessionChart.update();
                    },
                    error: function(err) {
                        console.error('Error fetching GA4 data', err);
                    }
                });

                $.ajax({
                    url: '/impression-data',
                    type: 'GET',
                    success: function(response) {
                        console.log("impressionsData fetch", response);

                        // Fill chart labels & data
                        impressionsChart.data.labels = response.labels;
                        impressionsChart.data.datasets[0].data = response.values;

                        impressionsChart.update();
                    },
                    error: function(err) {
                        console.error('Error fetching GA4 data', err);
                    }
                });

                $.ajax({
                    url: '/bounce-rate-data',
                    type: 'GET',
                    success: function(response) {
                        console.log("bounceRateData fetch", response);

                        // Fill chart labels & data
                        bounceRateChart.data.labels = response.labels;
                        bounceRateChart.data.datasets[0].data = response.values;

                        bounceRateChart.update();
                    },
                    error: function(err) {
                        console.error('Error fetching Bounce Rate data', err);
                    }
                });

                $.ajax({
                    url: '/conversion-rate-data',
                    type: 'GET',
                    success: function(response) {
                        console.log("conversionRateData fetch", response);

                        conversitionRateChart.data.labels = response.labels;
                        conversitionRateChart.data.datasets[0].data = response.values;

                        conversitionRateChart.update();
                    },
                    error: function(err) {
                        console.error('Error fetching Conversion Rate data', err);
                    }
                });

                function formatNumber(num) {
                    if (num >= 1000000) return (num / 1000000).toFixed(2) + 'M';
                    if (num >= 1000) return (num / 1000).toFixed(2) + 'k';
                    return num;
                }


               $.ajax({
    url: '/traffic-by-countries',
    type: 'GET',
    success: function (response) {
        console.log('trafficByCountries fetch', response);

        const container = $('.traffic-countries');
        container.empty();

        response.data.forEach(item => {
            const flagUrl = `https://flagcdn.com/w40/${item.countryCode}.png`;

            const html = `
                <div class="flex justify-between items-center">
                    <div class="flex items-center">
                        <div class="w-8 h-8 rounded-full overflow-hidden mr-3">
                            <img src="${flagUrl}" alt="${item.country}" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <p class="text-sm font-medium">${formatNumber(item.sessions)}</p>
                            <p class="text-xs text-gray-500">${item.country}</p>
                        </div>
                    </div>
                </div>
            `;
            container.append(html);
        });
    },
    error: function (err) {
        console.error('Error fetching Traffic by Countries', err);
    }
});





            });
        </script>
</body>

</html>
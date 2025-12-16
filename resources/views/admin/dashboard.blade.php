<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>WIZSPEED Dashboard</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Quill CSS -->
    <link
      href="https://cdn.quilljs.com/1.3.7/quill.snow.css"
      rel="stylesheet"
    />
    <!-- Emoji Plugin -->
    <link
      href="https://cdn.jsdelivr.net/npm/quill-emoji@0.2.0/dist/quill-emoji.css"
      rel="stylesheet"
    />
    <style>
        :root {
            --btn-bg: #EA580C;
            /* orange-600 */
            --btn-hover: #C2410C;
            /* darker orange */
            --btn-border: #000000;
            /* black */
        }

        .dark-mode {
            --btn-bg: #282828;
            /* gray-700 */
            --btn-hover: #4B5563;
            /* gray-600 */
            --btn-border: #6B7280;
            /* gray-500 */
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

        .light-text-gray-x {
            color: #D2D2D2;
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
            background-color: #121212 !important;
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

        /* --- RESPONSIVENESS (MEDIA QUERIES) --- */

        /* === Base Sidebar (Mobile First) === */
        aside {
            position: fixed;
            top: 0;
            left: 0;
            height: 100dvh;
            width: 16rem;
            /* 256px */
            background-color: #fff;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
            transform: translateX(-100%);
            transition: transform 0.3s ease;
            z-index: 100;
            overflow-y: auto;
        }

        /* Show Sidebar when open */
        aside.open {
            transform: translateX(0);
        }

        /* === Overlay === */
        .sidebar-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.5);
            display: none;
            z-index: 90;
        }

        .sidebar-overlay.open {
            display: block;
        }

        /* Prevent scrolling when sidebar is open */
        body.sidebar-open {
            overflow: hidden;
        }

        /* === Hamburger === */
        .hamburger-menu {
            display: block;
            cursor: pointer;
            padding: 0.5rem;
            background: none;
            border: none;
        }

        /* === Media Queries === */

        /* Small screens (max-width: 640px) */
        @media (max-width: 640px) {
            .header .sm\:block {
                display: block;
            }

            aside {
                position: fixed;
                top: 0;
                left: 0;
                height: 100dvh;
                width: 16rem;
                /* 256px */
                background-color: #fff;
                box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
                transform: translateX(-100%);
                transition: transform 0.3s ease;
                z-index: 100;
                overflow-y: auto;
            }

            table th,
            table td {
                padding: 1rem 1.5rem;
            }

            table th .icon.mr-2 {
                margin-right: 0.5rem;
            }

            table th .icon.mr-10 {
                margin-right: 1rem;
            }
        }

        /* Medium screens (min-width: 768px) */
        @media (min-width: 768px) {
            table th .icon.mr-10 {
                margin-right: 2.5rem;
            }
        }

        /* Large screens (min-width: 1024px) */
        @media (min-width: 1024px) {
            aside {
                position: sticky;
                top: 0;
                left: 0;
                height: auto;
                width: 16rem;
                transform: none !important;
                flex-shrink: 0;
            }

            .hamburger-menu {
                display: none !important;
            }

            .sidebar-overlay {
                display: none !important;
            }

            body.sidebar-open {
                overflow: visible;
            }
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 16rem;
            background: #fff;
            z-index: 50;
            transform: translateX(-100%);
            transition: transform 0.3s ease-in-out;
        }

        .sidebar.open {
            transform: translateX(0);
        }

        .sidebar-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 40;
        }

        .sidebar-overlay.hidden {
            display: none;
        }

        @media (min-width: 1024px) {
            .sidebar {
                position: static;
                transform: none !important;
                height: auto;
            }

            .sidebar-overlay,
            #hamburger {
                display: none !important;
            }
        }

        .openTicketChatModal {
            cursor: pointer;
        }

        .ql-snow .ql-editor.ql-blank::before {
            color: #616060; /* orange placeholder */
            font-style: italic;
        }
    </style>

</head>

<body>
    <div class="flex min-h-screen light-bg-white">

        @include('layouts.sidebar')

        <div id="overlay" class="sidebar-overlay fixed inset-0 bg-black bg-opacity-50 hidden z-40"></div>

        <!-- Main Content Area -->
        <main class="flex-1  overflow-y-auto">
            <!-- Header -->
            @include('layouts.header')

            <div class="p-6 light-bg-bill -mt-7 lg:p-8">

                <!-- Dashboard Title -->
                <h1 class="text-3xl font-bold light-text-gray-800 mb-6">Dashboard</h1>


                <!-- Overview Cards -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                    <!-- Card 1: Total Projects -->
                    <div class="p-6 rounded-xl shadow-sm flex  items-center justify-between"
                        style="background-color: #D6F7FB;">
                        <div class="w-full max-w-xs"> <!-- Adjust width as needed -->
                            <!-- Label + Icon Row -->
                            <div class="flex justify-between items-start mb-1">
                                <p class="light-text-gray-700 mb-5 text-xs"><span style="color:#AFAFAF;">Total
                                        Clients<span></p>
                                <img src="{{asset('assets/more.svg')}}" alt="Menu" class="h-4 w-4 mt-0.5">
                            </div>

                            <!-- "000" Row (if shown) -->
                            <p class="text-md text-4xl font-medium light-text-gray-800 mb-2">{{$clientCount}}</p>
                            <!-- Light gray, subtle -->
                            <div
                                class="bg-green-900 px-1 justify-center bg-opacity-50 hover:opacity-100 flex rounded-sm w-28">
                                <p class="text-xs text-green-500"> +{{$thisMonthClients}} This Month</p>
                            </div>


                        </div>

                    </div>
                    <!-- Card 2: In-Process Projects -->
                    <div class="p-6 rounded-xl shadow-sm flex items-center justify-between"
                        style="background-color: #DDF6E8;">
                        <div class="w-full max-w-xs">
                            <div class="flex justify-between items-start mb-1">
                                <p class="light-text-gray-700 mb-5 text-xs"><span style="color:#AFAFAF;">Total
                                        Projects<span></p>
                                <img src="{{asset('assets/more.svg')}}" alt="Menu" class="h-4 w-4 mt-0.5">
                            </div>
                            <p class="text-4xl font-medium mb-2 light-text-gray-800">{{$projectCount}}</p>
                            <div
                                class="bg-green-900 px-1 bg-opacity-50 hover:opacity-100 justify-center flex rounded-sm w-28">
                                <p class="text-xs text-green-500"> +{{$thisMonthProjects}} This Month</p>
                            </div>

                        </div>
                    </div>
                    <!-- Card 3: Open Tickets -->
                    <div class="p-6 rounded-xl shadow-sm flex items-center justify-between"
                        style="background-color: #FCE4E4;">
                        <div class="w-full max-w-xs">
                            <div class="flex justify-between items-start mb-1">
                                <p class="light-text-gray-700 mb-5 text-xs"><span style="color:#AFAFAF;">Total
                                        Tickets</span></p>
                                <img src="{{asset('assets/more.svg')}}" alt="Menu" class="h-4 w-4 mt-0.5">
                            </div>
                            <p class="text-4xl font-medium mb-2 light-text-gray-800">{{$ticketCount}}</p>
                            <div
                                class="bg-green-900 bg-opacity-50 hover:opacity-100 px-1 justify-center flex rounded-sm w-28">
                                <p class="text-xs  text-green-500"> +{{$thisMonthTickets}} This Month</p>
                            </div>

                        </div>
                    </div>
                    <!-- Card 4: Unread Messages -->
                    <div class="p-6 rounded-xl shadow-sm flex items-center justify-between"
                        style="background-color: #FFF0E1;">
                        <div class="w-full max-w-xs">
                            <div class="flex justify-between items-start mb-1">
                                <p class="light-text-gray-100 mb-5 text-xs"><span style="color:#AFAFAF;">Most
                                        Requested Service</span></p>
                                <img src="{{asset('assets/more.svg')}}" alt="Menu" class="h-4 w-4 mt-0.5">
                            </div>
                            <p class="text-4xl font-medium mb-2 light-text-gray-800">SEO</p>
                            <div
                                class="bg-green-900 px-1 bg-opacity-50 hover:opacity-100 justify-center flex rounded-sm w-28">
                                <p class="text-xs text-green-500">+605 This Month</p>
                            </div>

                        </div>
                    </div>

                </div>

                <!-- SEO Plan Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6" id="seo-cards">

                    <!-- Traffic by Countries Box (40% width) -->
                    <div class="light-bg-f5f5f5 light-bg-seo p-6 rounded-xl shadow-sm">
                        <div class="mb-6">
                            <div class="flex justify-between items-start mb-1">
                                <h3 class="text-lg font-medium light-text-gray-800">Visitor geo-locations </h3>
                                <img src="{{asset('assets/more.svg')}}" alt="Menu" class="h-4 w-4 mt-0.5">
                            </div>
                            <p class="text-sm text-gray-400">Monthly Visitors Overview</p>
                        </div>

                        <div class="space-y-4">
                            <!-- Country 1 -->
                            @foreach ($summary as $row)
                                @php
                                    // filter $data rows for this country
                                    $first = collect($currentData)->where('country', $row['country']);
                                    $d = $first->first();

                                @endphp
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center">
                                        <div
                                            class="w-8 h-8 rounded-full bg-cyan-100 flex items-center justify-center mr-3">
                                            <img src="{{asset('assets/cn 1.png')}}" class="rounded-full" alt="">
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium">{{ $d['totalUsers'] }}</p>
                                            <p class="text-xs text-gray-500">{{ $d['country'] }}</p>
                                        </div>
                                    </div>
                                    @php
                                        $change = $row['percentage_change'];
                                    @endphp
                                    @if ($change >= 0)
                                        <span class="flex items-center text-sm font-semibold text-green-500">
                                            <svg class="w-4 h-4 text-green-500" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            {{ $change }}%
                                        </span>
                                    @else
                                        <span class="flex items-center text-sm font-semibold text-red-500">
                                            <svg class="w-4 h-4 text-red-500" fill="currentColor" viewBox="0 0 20 20"
                                                style="transform:rotate(180deg)">
                                                <path fill-rule="evenodd"
                                                    d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            {{ $change }}%
                                        </span>
                                    @endif
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <!-- Traffic by Countries Box (40% width) -->
                    <div class="light-bg-f5f5f5 light-bg-seo p-6 rounded-xl shadow-sm">
                        <div class="mb-6">
                            <h3 class="text-lg font-medium light-text-gray-800">Source Visits</h3>
                            <p class="text-sm text-gray-400">Monthly Visitors Source</p>
                        </div>

                        <div class="space-y-4">
                            <!-- Country 1 -->
                            @foreach ($sources as $ss)
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center">
                                        <div
                                            class="w-8 h-8 rounded-md bg-[#282828] flex items-center justify-center mr-3">

                                            <img src="{{asset('assets/Icon (13).svg')}}" class="rounded-full" alt="">
                                        </div>
                                        <div>
                                            <p class="text-md font-medium">{{ $ss['sessionSource'] }}</p>
                                            <p class="text-xs text-gray-500">{{ $ss['sessionMedium'] }}</p>
                                        </div>
                                    </div>
                                    <div class="flex gap-2">
                                        <p>{{ $ss['sessions'] }}</p>
                                        <div class="bg-green-900 bg-opacity-50 justify-center flex  rounded-sm">
                                            <span
                                                class="flex items-center text-sm font-semibold px-2 text-green-500">+4.2%</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Traffic by Countries Box (40% width) -->
                    <div class="light-bg-f5f5f5 light-bg-seo p-6 rounded-xl shadow-sm">
                        <div class="mb-6">
                            <h3 class="text-lg font-medium light-text-gray-800">Most clicked packages </h3>
                            <p class="text-sm text-gray-400">Monthly Overview</p>
                        </div>

                        <div class="space-y-4">
                            <!-- Country 1 -->
                            <div class="flex justify-between items-center">
                                <div class="flex items-center mb-2">
                                    <div class="w-8 h-8  flex items-center justify-center mr-3">

                                        <img src="{{asset('assets/Icon (19).svg')}}" class="" alt="">
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium">SEO Optimization</p>
                                    </div>
                                </div>
                                <div class="flex justify-center gap-2">
                                    <span class="flex items-center gap-2 text-sm font-semibold">
                                        <div>
                                            <p class="light-text-black">31.5k</p>
                                            <p class="text-gray-500 font-thin text-xs">Clicks</p>
                                        </div>
                                    </span>
                                    <div>
                                        <p class="light-text-black text-sm">300</p>
                                        <p class="text-gray-500 font-thin text-xs">Orders</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Country 2 -->
                            <div class="flex justify-between items-center">
                                <div class="flex items-center mb-2">
                                    <div class="w-8 h-8  flex items-center justify-center mr-3">

                                        <img src="{{asset('assets/Icon (19).svg')}}" class="" alt="">
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium">Social Media Ads</p>
                                    </div>
                                </div>
                                <div class="flex justify-center gap-2">
                                    <span class="flex items-center gap-2 text-sm font-semibold">
                                        <div>
                                            <p class="light-text-black">31.5k</p>
                                            <p class="text-gray-500 font-thin text-xs">Clicks</p>
                                        </div>
                                    </span>
                                    <div>
                                        <p class="light-text-black text-sm">300</p>
                                        <p class="text-gray-500 font-thin text-xs">Orders</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Country 3 -->
                            <div class="flex justify-between items-center">
                                <div class="flex items-center mb-2">
                                    <div class="w-8 h-8  flex items-center justify-center mr-3">

                                        <img src="{{asset('assets/Icon (19).svg')}}" class="" alt="">
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium">Content Marketing</p>
                                    </div>
                                </div>

                                <div class="flex justify-center gap-2">
                                    <span class="flex items-center gap-2 text-sm font-semibold">
                                        <div>
                                            <p class="light-text-black">31.5k</p>
                                            <p class="text-gray-500 font-thin text-xs">Clicks</p>
                                        </div>
                                    </span>
                                    <div>
                                        <p class="light-text-black text-sm">300</p>
                                        <p class="text-gray-500 font-thin text-xs">Orders</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Country 4 -->
                            <div class="flex justify-between items-center">
                                <div class="flex items-center mb-2">
                                    <div class="w-8 h-8  flex items-center justify-center mr-3">

                                        <img src="{{asset('assets/Icon (19).svg')}}" class="" alt="">
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium">Content Marketing</p>
                                    </div>
                                </div>
                                <div class="flex justify-center gap-2">
                                    <span class="flex items-center gap-2 text-sm font-semibold">
                                        <div>
                                            <p class="light-text-black">31.5k</p>
                                            <p class="text-gray-500 font-thin text-xs">Clicks</p>
                                        </div>
                                    </span>
                                    <div>
                                        <p class="light-text-black text-sm">300</p>
                                        <p class="text-gray-500 font-thin text-xs">Orders</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Country 5 -->
                            <div class="flex justify-between items-center">
                                <div class="flex items-center mb-2">
                                    <div class="w-8 h-8  flex items-center justify-center mr-3">

                                        <img src="{{asset('assets/Icon (19).svg')}}" class="" alt="">
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium">Affiliate Mktg</p>
                                    </div>
                                </div>
                                <div class="flex justify-center gap-2">
                                    <span class="flex items-center gap-2 text-sm font-semibold">
                                        <div>
                                            <p class="light-text-black">31.5k</p>
                                            <p class="text-gray-500 font-thin text-xs">Clicks</p>
                                        </div>
                                    </span>
                                    <div>
                                        <p class="light-text-black text-sm">300</p>
                                        <p class="text-gray-500 font-thin text-xs">Orders</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Country 6 -->
                            <div class="flex justify-between items-center">
                                <div class="flex items-center">
                                    <div class="w-8 h-8  flex items-center justify-center mr-3">

                                        <img src="{{asset('assets/Icon (19).svg')}}" class="" alt="">
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium">Influencer Mktg </p>
                                    </div>
                                </div>
                                <div class="flex justify-center gap-2">
                                    <span class="flex items-center gap-2 text-sm font-semibold">
                                        <div>
                                            <p class="light-text-black">31.5k</p>
                                            <p class="text-gray-500 font-thin text-xs">Clicks</p>
                                        </div>
                                    </span>
                                    <div>
                                        <p class="light-text-black text-sm">300</p>
                                        <p class="text-gray-500 font-thin text-xs">Orders</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


                <div class="grid grid-cols-1 lg:grid-cols-1 gap-6 mb-6">
                    <!-- User's Projects List Table -->
                    <div class="lg:col-span-2 light-bg-f5f5f5 light-bg-seo  rounded-xl shadow-sm">
                        <div class="flex items-center justify-between  p-6 flex-wrap gap-3">
                            <h2 class="text-xl font-semibold light-text-gray-800">Latest Tickets</h2>
                            <div class="flex items-center space-x-3">
                                <div class="relative flex gap-2">
                                    <button id="filterButton"
                                        class="flex items-center justify-center px-4 py-2 rounded-lg bg-white light-bg-d9d9d9 light-text-gray-700 border border-gray-300 text-gray-700 hover:bg-gray-200 transition-colors">
                                        <div class="flex">
                                            <span class="light-text-gray-x">Projects</span>
                                            <svg class="ml-1 w-4 h-4" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path d="M7 16 L12 21 L17 16" /> <!-- Down chevron -->
                                            </svg>
                                        </div>
                                    </button>
                                    <div class="relative flex items-center w-full max-w-xs">
                                        <!-- SVG icon -->
                                        <svg class="absolute left-3 w-5 h-5 text-gray-400" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2">
                                            <circle cx="11" cy="11" r="8"></circle>
                                            <line x1="21" y1="21" x2="16.65" y2="16.65">
                                            </line>
                                        </svg>

                                        <!-- Input field -->
                                        <input type="text" placeholder="Search here"
                                            class="pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-1 focus:ring-orange-500 w-full">
                                    </div>

                                </div>
                                <div class="relative inline-block">
                                    <div class="flex gap-3">
                                        <!-- Button -->
                                        <button id="filterButton"
                                            class="flex items-center justify-center px-4 py-2 rounded-lg bg-white light-bg-d9d9d9 light-text-gray-700 border border-gray-300 text-gray-700 hover:bg-gray-200 transition-colors">
                                            <div class="flex">
                                                <span class="light-text-gray-x">Filters</span>
                                                <svg class="ml-1 w-4 h-4" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path d="M7 16 L12 21 L17 16" /> <!-- Down chevron -->
                                                </svg>
                                            </div>
                                        </button>

                                    </div>

                                    <!-- Dropdown Content -->
                                    <div id="filterDropdown"
                                        class="hidden absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white light-bg-d9d9d9 light-text-gray-700 ring-1 ring-black text-gray-700 hover:bg-gray-200 transition-colors ring-opacity-5 z-50">
                                        <div class="py-1" role="menu" aria-orientation="vertical">
                                            <a href="#"
                                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                                role="menuitem">Filter Option 1</a>
                                            <a href="#"
                                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                                role="menuitem">Filter Option 2</a>
                                            <a href="#"
                                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                                role="menuitem">Filter Option 3</a>
                                            <div class="border-t border-gray-100"></div>
                                            <a href="#"
                                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                                role="menuitem">Reset Filters</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="overflow-x-auto">
                            <table class="min-w-full border-b-4 light-border-gray-300">
                                <thead class="light-bg-d9d9d9 border-b-4 light-border-gray-300">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3  text-left text-xs
                                                font-medium light-text-gray-500 uppercase tracking-wider">
                                            <div class="flex items-center w-full justify-between">
                                                <div style="width: 80%">TICKET ID</div>
                                                <div style="width: 20%;">
                                                    <svg class=" w-8 h-4" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M7 8 L12 3 L17 8" /> <!-- Up chevron -->
                                                        <path d="M7 16 L12 21 L17 16" /> <!-- Down chevron -->
                                                    </svg>
                                                </div>
                                            </div>
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs  font-medium light-text-gray-500 uppercase ">
                                            <div class="flex justify-between items-center">
                                                Ticket Details
                                                <svg class="ml-10 w-4 h-4" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <!-- Up chevron (positioned higher) -->
                                                    <path d="M7 8 L12 3 L17 8" />
                                                    <!-- Down chevron (positioned lower with gap) -->
                                                    <path d="M7 16 L12 21 L17 16" />
                                                </svg>
                                            </div>
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium light-text-gray-500 uppercase tracking-wider whitespace-nowrap">
                                            <div class="flex items-center gap-2">
                                                Client/Project Name
                                                <svg class="w-4 h-4 ml-10 flex-shrink-0" viewBox="0 0 24 24"
                                                    fill="none" stroke="currentColor" stroke-width="1.5"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                    <!-- Up chevron -->
                                                    <path d="M7 8 L12 3 L17 8" />
                                                    <!-- Down chevron -->
                                                    <path d="M7 16 L12 21 L17 16" />
                                                </svg>
                                            </div>
                                        </th>

                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium light-text-gray-500 uppercase tracking-wider min-w-[120px]">
                                            <div class="flex items-center justify-between">
                                                <span class="whitespace-nowrap">DATE</span>
                                                <div class="flex flex-col ml-10">

                                                </div>
                                            </div>
                                        </th>

                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium light-text-gray-500 uppercase tracking-wider">
                                            <div class="flex items-center">
                                                <svg class="icon mr-10 w-4 h-4" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <!-- Up chevron (positioned higher) -->
                                                    <path d="M7 8 L12 3 L17 8" />
                                                    <!-- Down chevron (positioned lower with gap) -->
                                                    <path d="M7 16 L12 21 L17 16" />
                                                </svg>
                                                status
                                            </div>
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium light-text-gray-500 uppercase tracking-wider">
                                            <div class="flex items-center">
                                                ACTION
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="light-bg-white light-bg-seo border-b-4 light-border-gray-300">
                                    @php
                                        $count = 1;   
                                    @endphp
                                @if($ticketData->count() > 0)
                                    @foreach($ticketData as $ticket)
                                        <tr class="border-b-4 light-border-gray-300">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-400">
                                                Ticket {{$count++}}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm font-thin light-text-gray-900">{{$ticket->description}}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex gap-2">
                                                    <div>
                                                        <img class="w-8 h-8 rounded-full" src="{{ asset($ticket->user->image ?? 'assets/default-prf.png') }}" alt="">
                                                    </div>
                                                    <div>
                                                        <p class="text-sm">{{$ticket->user->name}}</p>
                                                        <p class="text-xs text-gray-400">{{$ticket->project->project_name}}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">{{ date('d-m-Y h:i a', strtotime($ticket->created_at)) }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @if($ticket->status == 'In Progress')                                       
                                                    <div class="flex ml-8 items-center ">
                                                        <div class="bg-gray-200 rounded-full w-2.5 h-2.5">
                                                            <div class="bg-cyan-400 h-2.5 rounded-full w-full"></div>
                                                        </div>
                                                        <span class="ml-2 text-sm items-center text-gray-400">In Progress</span>
                                                    </div>
                                                    @elseif($ticket->status == 'Resolved')
                                                    <div class="flex ml-8 items-center ">
                                                        <div class="bg-gray-200 rounded-full w-2.5 h-2.5">
                                                            <div class="bg-green-500 h-2.5 rounded-full w-full"></div>
                                                        </div>
                                                        <span class="ml-2 text-sm items-center text-gray-400">{{$ticket->status}}</span>
                                                    </div>
                                                    @elseif($ticket->status == 'Cancelled')
                                                    <div class="flex ml-8 items-center ">
                                                        <div class="bg-gray-200 rounded-full w-2.5 h-2.5">
                                                            <div class="bg-red-500 h-2.5 rounded-full w-full"></div>
                                                        </div>
                                                        <span class="ml-2 text-sm items-center text-gray-400">Cancelled</span>
                                                    </div>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                                <button
                                                    class="light-text-orange-500 light-hover-text-orange-700 open-chat-modal"
                                                    data-action="view-project">
                                                    <img  src="{{asset('assets/message.svg')}}" alt="icon" data-ticket-id="{{$ticket->id}}"
                                                        class="ticket-chat w-6 h-6 light-text-gray-900 rounded-full  light-mode-icon"
                                                        data-dark-src="{{asset('assets/message-DARK.svg')}}">
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6" class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-400 text-center">
                                            No tickets found.
                                        </td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>

                        <!-- Table Pagination -->
                        <div
                            class="flex items-center justify-between mt-4 p-6 text-sm light-text-gray-600 flex-wrap gap-4">
                            <div>

                                <span>Showing 1 to 3 of 100 entries </span>
                                <div class="relative inline-block">
                                    <!-- Button -->
                                    <button id="filterButton2"
                                        class="flex items-center justify-center ml-2 px-4 py-2 rounded-lg bg-white light-bg-d9d9d9 light-text-gray-700 border border-gray-300 text-gray-700 hover:bg-gray-200 transition-colors">
                                        <div class="flex">
                                            <span>Filters</span>
                                            <svg class="ml-1 w-4 h-4" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path d="M7 16 L12 21 L17 16" /> <!-- Down chevron -->
                                            </svg>
                                        </div>
                                    </button>

                                    <!-- Dropdown Content -->
                                    <div id="filterDropdown"
                                        class="hidden absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white light-bg-d9d9d9  light-text-gray-700 ring-1 ring-black text-gray-700 hover:bg-gray-200 transition-colors ring-opacity-5 z-50">
                                        <div class="py-1" role="menu" aria-orientation="vertical">
                                            <a href="#"
                                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                                role="menuitem">1</a>
                                            <a href="#"
                                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                                role="menuitem">2</a>
                                            <a href="#"
                                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                                role="menuitem">3</a>
                                            <div class="border-t border-gray-100"></div>
                                            <a href="#"
                                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                                role="menuitem">Reset Filters</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex space-x-2">
                                <button
                                    class="px-4 py-2 rounded-md border border-gray-300 text-gray-700 hover:bg-gray-200 transition-colors light-bg-d9d9d9 light-text-gray-700">Previous</button>
                                <button
                                    class="px-4 py-2 rounded-md border border-gray-300 text-gray-700 hover:bg-gray-200 bg-orange-600 light-bg-orange-600 text-white font-semibold light-bg-d9d9d9 light-text-gray-700">1</button>
                                <button
                                    class="px-4 py-2 rounded-md border border-gray-300 text-gray-700 hover:bg-gray-200  transition-colors light-bg-d9d9d9 light-text-gray-700">2</button>
                                <button
                                    class="px-4 py-2 rounded-md border border-gray-300 text-gray-700 hover:bg-gray-200  transition-colors light-bg-d9d9d9 light-text-gray-700">3</button>
                                <button
                                    class="px-4 py-2 rounded-md border border-gray-300 text-gray-700 hover:bg-gray-200  transition-colors light-bg-d9d9d9 light-text-gray-700">4</button>
                                <button
                                    class="px-4 py-2 rounded-md border border-gray-300 text-gray-700 hover:bg-gray-200  transition-colors light-bg-d9d9d9 light-text-gray-700">5</button>
                                <button
                                    class="px-4 py-2 rounded-md border border-gray-300 text-gray-700 hover:bg-gray-200  transition-colors light-bg-d9d9d9 light-text-gray-700">Next</button>
                            </div>
                        </div>
                    </div>


                </div>


            </div>
            
        </main>
    </div>


    <!-- Ticket Chat Modal -->
    <div id="ticketChatModal"
        class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
        <div
            class="modal-content rounded-xl shadow-lg w-[900px] max-h-[90vh] relative 
                bg-white text-black light-bg-d9d9d9 dark:text-white transition-colors duration-300
                flex flex-col">
            <!-- Header -->
            <div class="flex justify-between items-center px-6 py-4 border-b border-gray-300 dark:border-gray-700">
                <h2 class="text-lg light-text-black font-semibold">Ticket Chat</h2>
                <button id="closeChatModal" class="text-gray-500 hover:text-black dark:hover:text-white text-xl">
                    ✕
                </button>
            </div>

            <div id="chatMessages" class="space-y-4 p-10">
                        
            </div>

            <!-- Input -->
            <div
                class="border-t rounded-b-lg rounded-t-lg  border-gray-300 dark:border-gray-700 bg-black light-bg-d7d7d7 ">
                <div class="flex items-center  px-4">
                    <span class="flex items-center gap-1">
                        <img class=" w-full h-full" src="{{asset('assets/Icon (1).svg')}}" alt="bold" id="btn-bold">
                        <img class=" w-full h-full" src="{{asset('assets/Icon.svg')}}" alt="italic" id="btn-italic">
                        <img class=" w-full h-full" src="{{asset('assets/Icon (2).svg')}}" alt="underline"  >
                        <img class=" w-full h-full" src="{{asset('assets/Rectangle 226.svg')}}" alt="line" >
                        <img class=" w-full h-full" src="{{asset('assets/Icon (6).svg')}}" alt="link" id="btn-link" >
                        <img class=" w-full h-full" src="{{asset('assets/Rectangle 226.svg')}}" alt="line" >
                        <img class=" w-full h-full" src="{{asset('assets/Icon (7).svg')}}" alt="ordered" id="btn-ordered" >
                        <img class=" w-full h-full" src="{{asset('assets/Icon (8).svg')}}" alt="bullet" id="btn-bullet">
                        <img class=" w-full h-full" src="{{asset('assets/Rectangle 226.svg')}}" alt="line"  >
                        <img class=" w-full h-full" src="{{asset('assets/Icon (9).svg')}}" alt="left" id="btn-left">
                        <img class=" w-full h-full" src="{{asset('assets/Rectangle 226.svg')}}" alt="line">
                        <img class=" w-full h-full" src="{{asset('assets/Icon (10).svg')}}" alt="code" id="btn-code">
                        <img class=" w-full h-full" src="{{asset('assets/Icon (11).svg')}}" alt="">
                    </span>
                </div>
                <div class="flex items-center light-bg-d7d7d7">
                        <input type="hidden" id="chat-ticket-id" name="ticket_id" value="">
                        <input type="hidden"  id="chat-sender-id" name="sender_id" value="{{ auth()->id() }}">
                    <div id="editor" class="w-full p-4 light-bg-d9d9d9 light-text-black text-sm" style="height:80px !important;"></div>
                    <button id="send-btn" class="light-bg-d9d9d9 hover:bg-orange-600 pt-10 rounded-r text-white relative">
                        <span class="absolute bottom-2 right-3 text-lg">➤</span>
                    </button>
                </div>

                <div class="flex rounded-b-lg light-bg-d9d9d9 items-center justify-between px-4"><span
                        class="flex items-center gap-1">
                            <img class="pb-2 w-full h-full" src="{{asset('assets/Group 216.svg')}}"alt="img" id="btn-image">
                            <img class="pb-2 w-full h-full" src="{{asset('assets/Icon (3).svg')}}" alt="" id="btn-underline">
                            <img class="pb-2 w-full h-full" src="{{asset('assets/Icon (4).svg')}}" alt="emoji" id="btn-emoji">
                            <div id="hidden-toolbar" style="display:none">
                                <button class="ql-emoji"></button>
                            </div>
                            <img class="pb-2 w-full h-full" src="{{asset('assets/Icon (5).svg')}}" alt="">
                        </span>

                </div>

            </div>

        </div>
    </div>

    <!-- Quill JS -->
    <script src="https://cdn.quilljs.com/1.3.7/quill.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/quill-emoji@0.2.0/dist/quill-emoji.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>
      // Initialize hidden Quill (no default toolbar)
      document.addEventListener('DOMContentLoaded', function() {
          const quill = new Quill("#editor", {
                theme: "snow",
                placeholder: '@type here',
                modules: {
                toolbar: '#hidden-toolbar',
                "emoji-toolbar": true,
                "emoji-textarea": false,
                "emoji-shortname": true,
                },
            });


            // Toolbar button actions
            document.getElementById("btn-bold").onclick = () =>
                quill.format("bold", !quill.getFormat().bold);
            document.getElementById("btn-italic").onclick = () =>
                quill.format("italic", !quill.getFormat().italic);
            document.getElementById("btn-underline").onclick = () =>
                quill.format("underline", !quill.getFormat().underline);
            document.getElementById("btn-bullet").onclick = () =>
                quill.format("list", "bullet");
            document.getElementById("btn-ordered").onclick = () =>
                quill.format("list", "ordered");
            document.getElementById("btn-code").onclick = () =>
                quill.format("code-block", !quill.getFormat()["code-block"]);

            document.getElementById('btn-left').onclick = () => {
                const range = quill.getSelection();
                if (range) {
                    quill.format('align', 'left');
                }
            };


            // Simple link & image handler
            document.getElementById("btn-link").onclick = () => {
                const url = prompt("Enter link URL:");
                if (url) {
                quill.format("link", url);
                }
            };


            document.getElementById("btn-image").onclick = () => {
             
                const input = document.createElement("input");
                input.setAttribute("type", "file");
                input.setAttribute("accept", "image/*"); 
                input.click(); 

                // When the file is selected
                input.onchange = () => {
                    const file = input.files[0];  
                    if (file) {
                        const reader = new FileReader();  // Create a new FileReader to read the file
                        reader.onload = (e) => {
                            const range = quill.getSelection();  // Get the current selection or cursor position in the editor
                            quill.insertEmbed(range.index, 'image', e.target.result);  // Insert the image at the current cursor position
                        };
                        reader.readAsDataURL(file);  // Convert the file to Base64 format (so it can be embedded directly)
                    }
                };
            };


            document.getElementById("btn-emoji").onclick = () => {
                
                const emojiButton = document.querySelector('.ql-emoji');
                if (emojiButton) {
                    emojiButton.click();  
                }
            };

        document.getElementById("send-btn").onclick = async (e) => {
            e.preventDefault();

            var chatMessage = quill.root.innerHTML; 
            var ticketId = $('#chat-ticket-id').val();
            var senderId = $('#chat-sender-id').val();

            let imageFiles = [];
            quill.root.querySelectorAll('img').forEach(img => {
                if (img.src.startsWith("data:")) {
                    let blob = dataURLtoBlob(img.src);
                    let file = new File([blob], "image.png", { type: blob.type });
                    imageFiles.push({ file: file, element: img });
                }
            });

            for (let i = 0; i < imageFiles.length; i++) {
                let formData = new FormData();
                formData.append('image', imageFiles[i].file);
                formData.append('_token', $('meta[name="csrf-token"]').attr('content'));

                let response = await fetch("{{ route('ticket.chat.upload_image') }}", {
                    method: "POST",
                    body: formData
                });
                let data = await response.json();
                imageFiles[i].element.src = data.url;
            }

            chatMessage = quill.root.innerHTML;

            $.ajax({
                url: "{{ route('ticket.chat') }}",
                method: "POST",
                data: {
                    ticket_id: ticketId,
                    sender_id: senderId,
                    message: chatMessage,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    quill.setContents([]); 
                    loadTaskChats(ticketId); 
                },
                error: function(xhr) {
                    console.error("Error sending chat:", xhr.responseText);
                }
            });
        };

        function dataURLtoBlob(dataurl) {
            let arr = dataurl.split(','), mime = arr[0].match(/:(.*?);/)[1],
                bstr = atob(arr[1]), n = bstr.length, u8arr = new Uint8Array(n);
            while(n--){
                u8arr[n] = bstr.charCodeAt(n);
            }
            return new Blob([u8arr], {type:mime});
        }

      });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const body = document.body;
            const knowledgeButton = document.getElementById('knowledgeButton');
            const filterButton = document.getElementById('filterButton');
            const filterDropdown = document.getElementById('filterDropdown');
            const hamburgerOpen = document.getElementById('hamburgerOpen');
            const hamburgerClose = document.getElementById('hamburgerClose');
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');

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

            // ✅ Sidebar toggle
            function toggleSidebar() {
                const isOpen = sidebar.classList.contains('translate-x-0');

                if (isOpen) {
                    sidebar.classList.remove('translate-x-0');
                    sidebar.classList.add('-translate-x-full');
                    overlay.classList.add('hidden');
                    body.classList.remove('overflow-hidden');
                } else {
                    sidebar.classList.remove('-translate-x-full');
                    sidebar.classList.add('translate-x-0');
                    overlay.classList.remove('hidden');
                    body.classList.add('overflow-hidden');
                }
            }

            if (hamburgerOpen) hamburgerOpen.addEventListener('click', toggleSidebar);
            if (hamburgerClose) hamburgerClose.addEventListener('click', toggleSidebar);
            if (overlay) overlay.addEventListener('click', toggleSidebar);

            // ✅ Dark mode toggle
            const toggleDarkMode = () => {
                body.classList.toggle('dark-mode');
                updateImageSources(body.classList.contains('dark-mode'));
                updateDropdownColors();
                localStorage.setItem('theme', body.classList.contains('dark-mode') ? 'dark' : 'light');
            };

            // ✅ Update images for dark/light mode
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

            // ✅ Dropdown color update for dark/light
            const updateDropdownColors = () => {
                const isDarkMode = body.classList.contains('dark-mode');
                if (filterDropdown) {
                    filterDropdown.style.color = isDarkMode ? 'white' : 'black';
                    filterDropdown.style.backgroundColor = isDarkMode ? '#1a1a1a' : 'white';
                }
            };

            // ✅ Apply theme from localStorage
            if (localStorage.getItem('theme') === 'dark') {
                body.classList.add('dark-mode');
            }

            updateImageSources(body.classList.contains('dark-mode'));
            updateDropdownColors();

            // ✅ Attach dark mode toggle
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
                        const icon = event.target.querySelector('img.toggle-icon');
                        const textNode = event.target.childNodes[0];

                        if (!content.style.maxHeight || content.style.maxHeight === '0px') {
                            content.style.maxHeight = content.scrollHeight + 'px';
                            textNode.textContent = 'View Less ';
                        } else {
                            content.style.maxHeight = '0px';
                            textNode.textContent = 'View More ';
                        }
                    }
                });
            }
        });

        document.addEventListener('DOMContentLoaded', () => {
            const ticketChatModal = document.getElementById('ticketChatModal');
            const closeChatModal = document.getElementById('closeChatModal');
            const openChatButtons = document.querySelectorAll('.open-chat-modal'); // 👈 select all buttons

            // Open chat modal for all buttons
            openChatButtons.forEach(button => {
                button.addEventListener('click', () => {
                    ticketChatModal.classList.remove('hidden');
                    document.body.style.overflow = 'hidden';
                });
            });

            // Close chat modal button
            closeChatModal.addEventListener('click', () => {
                ticketChatModal.classList.add('hidden');
                document.body.style.overflow = 'auto';
            });

            // Close chat modal when clicking outside
            ticketChatModal.addEventListener('click', (e) => {
                if (e.target === ticketChatModal) {
                    ticketChatModal.classList.add('hidden');
                    document.body.style.overflow = 'auto';
                }
            });
        });
    </script>

    {{-- ajax --}}

    <script>
        function loadTaskChats(ticketId) {
                $.ajax({
                    url: `/tickets/getTicketChats/${ticketId}`, 
                    method: 'GET',
                    success: function(response) {
                        var chatContainer = $('#chatMessages');
                        chatContainer.html(''); 

                        response.chats.forEach(function(chat) {

                            let chatDate = new Date(chat.created_at);
                            let dateString = chatDate.toLocaleDateString('en-US', {
                                weekday: 'long', month: 'long', day: 'numeric'
                            });

                            
                            chatContainer.append(`
                                <div class="flex items-start space-x-3">
                                    <img src="${chat.sender.image || '{{asset('assets/Photos.png')}}'}" 
                                        class="w-10 h-10 rounded-md" alt="user" />
                                    <div>
                                        <p class="text-sm light-text-black font-semibold">
                                            ${chat.sender.name} 
                                            <span class="text-xs light-text-black ml-1">
                                                ${chatDate.getHours()}:${chatDate.getMinutes().toString().padStart(2,'0')} 
                                            </span>
                                        </p>
                                        <pre class="text-sm light-text-black">${chat.message}</pre>
                                        <div class="flex space-x-2 mt-1 text-xs">
                                            <button class="px-2 py-1 bg-gray-200 dark:bg-gray-700 rounded-xl like-btn" data-chat-id="${chat.id}">❤️ 
                                                <span class="like-count">${chat.likes_count || 0}</span>
                                            </button>
                                            <button class="px-2 py-1 bg-gray-200 dark:bg-gray-700 rounded-xl">
                                                <img src="Icon (12).svg" alt="">
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            `);
                        });
                    },
                    error: function(err) {
                        console.error("Error loading chats:", err);
                    }
                });
        }

        $(document).ready(function() {
            $(document).on('click', '.ticket-chat', function() {
                var ticketId = $(this).data('ticket-id');
                $('#chat-ticket-id').val(ticketId);
                loadTaskChats(ticketId);
            })
        });

        $(document).on('click', '.like-btn', function() {
            let btn = $(this);
            let chatId = btn.data('chat-id');

            $.ajax({
                url: `/tickets/chat/${chatId}/like`,
                method: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(res) {
                    btn.find('.like-count').text(res.count);
                }
            });
        });

    </script>

</body>

</html>

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
    <link rel="stylesheet" href="//cdn.datatables.net/2.3.7/css/dataTables.dataTables.min.css">
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

        /* Remove default progress styling */
        progress {
            -webkit-appearance: none;
            /* Chrome, Safari, Opera */
            appearance: none;
            width: 100%;
            height: 10px;
            /* same as h-2.5 */
            border-radius: 999px;
            overflow: hidden;
            background-color: #e5e7eb;
            /* gray-200 */
        }

        progress::-webkit-progress-bar {
            background-color: #e5e7eb;
            /* gray-200 */
        }

        progress::-webkit-progress-value {
            background-color: #22c55e;
            /* green-500 */
            border-radius: 999px;
        }

        progress::-moz-progress-bar {
            background-color: #22c55e;
            /* green-500 */
            border-radius: 999px;
        }

        /* Remove background color from upload button */
        .file-input::-webkit-file-upload-button {
            background: none;
            color: inherit;
            padding: 4px 10px;
            cursor: pointer;
            border: none;
        }

        /* For Firefox */
        .file-input::file-selector-button {
            background: none;
            color: inherit;
            padding: 4px 10px;
            cursor: pointer;
            border: none;
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

        .dark-mode .light-text-ff0000 {
            color: #EA5455 !important;
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
            background-color: #EA545529 !important;
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
            z-index: 100;
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
            z-index: 90;
            display: none;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .sidebar-overlay.open {
            display: block;
            opacity: 1;
            pointer-events: all;
        }

        /* Hide the main content overflow when sidebar is open */
        body.sidebar-open {
            overflow: hidden;
        }

        /* Hamburger menu - visible only on smaller screens */
        .hamburger-menu {
            display: block;
            /* Visible by default on mobile */
            z-index: 110;
            /* Ensure it's above other elements */
            cursor: pointer;
            padding: 0.5rem;
            border: none;
            background: none;
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
                display: none !important;
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

        .dataTables_length {
            display: none !important;
        }

        .dataTables_empty {
            text-align: center;
            padding: 1rem;
        }
    </style>

</head>

<body>
    @include('layouts.loader')
    <div class="flex min-h-screen light-bg-white">
        <!-- Sidebar -->
        @include('layouts.sidebar')

        <!-- Main Content Area -->
        <main class="flex-1 light-bg-bill overflow-y-auto">
            <!-- Header -->
            @include('layouts.header')

            <div class="p-6 lg:p-8">

                <!-- Dashboard Title -->
                <h1 class="text-3xl font-bold light-text-gray-800 mb-6">Dashboard</h1>

                <!-- Connect Domain Section -->
                <div
                    class="light-bg-f5f5f5 light-bg-seo p-6 rounded-xl shadow-sm mb-6 flex items-center justify-between flex-wrap gap-4">
                    <h2 class="text-xl font-semibold light-text-gray-800">Connect Domain</h2>
                    <button
                        class="custom-btn text-white px-6 py-3 rounded-lg font-light hover-bg-orange-600 transition-colors shadow-md">
                        Add New Domain
                    </button>
                </div>

                <!-- Overview Cards -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                    <!-- Card 1: Total Projects -->
                    <div class="p-6 rounded-xl shadow-sm flex items-center justify-between"
                        style="background-color: #D6F7FB;">
                        <div>
                            <p class="text-3xl font-bold light-text-gray-800">{{ $projectCount }}</p>
                            <p class="light-text-gray-700"><span style="color:#AFAFAF;">Total Projects</span></p>
                        </div>
                        <div class="p-3 rounded-full light-bg-00cfe8-icon">
                            <img src="{{ asset('./assets/folder-2.svg') }}" alt="icon"
                                class="w-12 h-12 text-white light-mode-icon"
                                data-dark-src="{{ asset('./assets/folder-2-DARK.svg') }}">
                        </div>
                    </div>
                    <!-- Card 2: In-Process Projects -->
                    <div class="p-6 rounded-xl shadow-sm flex items-center justify-between"
                        style="background-color: #DDF6E8;">
                        <div>
                            <p class="text-3xl font-bold light-text-gray-800">{{ $inprogressProjectCount }}</p>
                            <p class="light-text-gray-700"><span style="color:#AFAFAF;">In Progress Projects</span></p>
                        </div>
                        <div class="p-3 rounded-full light-bg-28c76f-icon">
                            <img src="{{ asset('./assets/folder-open.svg') }}" alt="icon"
                                class="w-12 h-12 text-white light-mode-icon"
                                data-dark-src="{{ asset('./assets/folder-open-DARK.svg') }}">
                        </div>
                    </div>
                    <!-- Card 3: Open Tickets -->
                    <div class="p-6 rounded-xl shadow-sm flex items-center justify-between"
                        style="background-color: #FCE4E4;">
                        <div>
                            <p class="text-3xl font-bold light-text-gray-800">{{ $ticketCount }}</p>
                            <p class="light-text-gray-700"><span style="color:#AFAFAF;">Open Tickets</span></p>
                        </div>
                        <div class="p-3 rounded-full light-bg-ea5455-icon">
                            <img src="{{ asset('assets/receipt.svg') }}" alt="icon"
                                class="w-12 h-12 text-white light-mode-icon"
                                data-dark-src="{{ asset('assets/receipt-DARK.svg') }}">
                        </div>
                    </div>
                    <!-- Card 4: Unread Messages -->
                    <div class="p-6 rounded-xl shadow-sm flex items-center justify-between"
                        style="background-color: #FFF0E1;">
                        <div>
                            <p class="text-3xl font-bold light-text-gray-800">08</p>
                            <p class="light-text-gray-100"><span style="color:#AFAFAF;">Unread Messages</span></p>
                        </div>
                        <div class="p-3 rounded-full light-bg-ff9f43-icon">
                            <img src="{{ asset('assets/message-2.svg') }}" alt="icon"
                                class="w-12 h-12 text-white light-mode-icon"
                                data-dark-src="{{ asset('assets/message-2-DARK.svg') }}">
                        </div>
                    </div>
                </div>

                <!-- SEO Plan Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @if (isset($subscriptionData) && count($subscriptionData) > 0)
                        @foreach ($subscriptionData as $subscription)
                            <div id="subscription-card-{{ $subscription->id }}"
                                class="light-bg-f5f5f5 light-bg-seo p-6 rounded-xl shadow-sm flex flex-col relative overflow-hidden mb-8 subscription-card">

                                <div class="flex items-center mb-10 justify-between">
                                    <h3
                                        class="subscription_tag cursor-pointer text-md font-normal text-black w-32 p-3 rounded-full text-center light-bg-d7d7d7 light-text-black">
                                        {{ $subscription->subscription_tag }}
                                    </h3>
                                </div>

                                <p class="text-5xl font-medium light-text-black mb-2 flex items-center">
                                    $<span class="price text-5xl font-medium">
                                        {{ number_format($subscription->price, 0) }}
                                    </span>
                                    <span class="ml-1 text-sm font-light" style="color:#AFAFAF;">
                                        /month
                                    </span>
                                </p>

                                <p class="subscription_name text-sm font-bold mb-2"
                                    style="font-size:12px;font-weight:600;">
                                    {{ $subscription->subscription_name }}
                                </p>

                                <p class="tagline text-xs text-gray-400 font-medium mb-6">
                                    {{ $subscription->tagline }}
                                </p>

                                <div class="flex items-center justify-between border-t dark-border-gray-500 pt-5">
                                    <div class="w-1/2 pr-2">
                                        <button data-sub-detail-id="{{ $subscription->id }}"
                                            class="px-5 py-1 light-text-black border border-gray-200 openModal dark:border-gray-500 rounded-md text-md">
                                            View Info
                                        </button>
                                    </div>
                                    <div class="w-1/2 pl-2">
                                        <button class="bg-orange-600 px-5 py-1 text-white rounded-md text-md"
                                            data-edit-id="{{ $subscription->id }}">
                                            Buy Now
                                        </button>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                    @else
                        <p>No subscriptions found.</p>
                    @endif
                </div>


                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
                    <!-- User's Projects List Table -->
                    <div class="tableContainer lg:col-span-2 light-bg-f5f5f5 light-bg-seo  rounded-xl shadow-sm">
                        <div class="flex items-center justify-between mb-4 p-6 flex-wrap gap-3">
                            <h2 class="text-xl font-semibold light-text-gray-800">User's Projects List</h2>
                            <div class="flex items-center space-x-3">
                                <div class="relative">
                                    <input type="text" placeholder="Search here" id="memberSearch"
                                        class="memberSearch pl-10 pr-4 py-2 rounded-lg light-border-gray-300 focus:outline-none focus:ring-1 focus:ring-orange-500">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="icon text-gray-400" viewBox="0 0 24 24">
                                            <circle cx="11" cy="11" r="8"></circle>
                                            <line x1="21" y1="21" x2="16.65" y2="16.65">
                                            </line>
                                        </svg>
                                    </div>
                                </div>
                                <div class="relative inline-block">
                                    <!-- Button -->
                                    <select id="filterSelect"
                                        class="filterSelect px-4 py-2 rounded-lg bg-white light-bg-d9d9d9 light-text-gray-700 border border-gray-300 text-gray-700 hover:bg-gray-200 transition-colors cursor-pointer">
                                        <option value="5">5</option>
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                    </select>

                                </div>
                            </div>
                        </div>

                        <div class="overflow-x-auto">
                            <table id="memberTable"
                                class="memberTable  projectTable min-w-full border-b light-border-gray-300">
                                <thead class="light-bg-d9d9d9">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium light-text-gray-500 uppercase tracking-wider">
                                            <div class="flex items-center">
                                                ID
                                                <svg class="ml-1 w-4 h-4" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path d="M7 8 L12 3 L17 8" /> <!-- Up chevron -->
                                                    <path d="M7 16 L12 21 L17 16" /> <!-- Down chevron -->
                                                </svg>
                                            </div>
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium light-text-gray-500 uppercase tracking-wider">
                                            <div class="flex items-center">
                                                PROJECTS
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
                                            class="px-6 py-3 text-left text-xs font-medium light-text-gray-500 uppercase tracking-wider">
                                            <div class="flex items-center">
                                                PRICE

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
                                                PROGRESS

                                            </div>
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium light-text-gray-500 uppercase tracking-wider">
                                            <div class="flex items-center">
                                                <svg class="w-4 h-4 mr-1 icon" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path d="M7 8 L12 3 L17 8" /> <!-- Up chevron -->
                                                    <path d="M7 16 L12 21 L17 16" /> <!-- Down chevron -->
                                                </svg>
                                                ACTION
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="light-bg-white light-bg-seo border-b light-border-gray-300"
                                    id="project-table-body">

                                </tbody>
                            </table>
                        </div>

                        <!-- Table Pagination -->
                        <div
                            class="flex items-center justify-between mt-4 p-6 text-sm light-text-gray-600 flex-wrap gap-2">
                            <div>
                                <span class="tableInfo" id="tableInfo"></span>
                            </div>
                            <div id="customPagination" class="customPagination flex space-x-2">
                                <button
                                    class="px-4 py-2 rounded-md border border-gray-300 hover:bg-gray-100 transition-colors">Previous</button>
                                <button
                                    class="px-4 py-2 rounded-md border border-gray-300 bg-orange-600 text-white font-semibold">1</button>
                                <button
                                    class="px-4 py-2 rounded-md border border-gray-300 hover:bg-gray-100 transition-colors">2</button>
                                <button
                                    class="px-4 py-2 rounded-md border border-gray-300 hover:bg-gray-100 transition-colors">3</button>
                                <button
                                    class="px-4 py-2 rounded-md border border-gray-300 hover:bg-gray-100 transition-colors">4</button>
                                <button
                                    class="px-4 py-2 rounded-md border border-gray-300 hover:bg-gray-100 transition-colors">5</button>
                                <button
                                    class="px-4 py-2 rounded-md border border-gray-300 hover:bg-gray-100 transition-colors">Next</button>
                            </div>
                        </div>

                    </div>

                    <!-- Reports Section -->
                    <div class="lg:col-span-1 light-bg-f5f5f5 light-bg-seo  rounded-xl shadow-sm">
                        <div class="p-6">
                            <h2 class="text-xl font-semibold light-text-gray-800 mb-4">Reports</h2>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="min-w-full border-b-4 light-border-gray-300">
                                <thead class="light-bg-d9d9d9">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium light-text-gray-500 uppercase tracking-wider">
                                            <div class="flex items-center">
                                                MONTH
                                                <svg class="w-4 h-4 ml-20" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path d="M7 8 L12 3 L17 8" /> <!-- Up chevron -->
                                                    <path d="M7 16 L12 21 L17 16" /> <!-- Down chevron -->
                                                </svg>
                                            </div>
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium light-text-gray-500 uppercase tracking-wider">
                                            <div class="flex ml-20 items-center">
                                                DATE
                                                <svg class="w-4 h-4 ml-20" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path d="M7 8 L12 3 L17 8" /> <!-- Up chevron -->
                                                    <path d="M7 16 L12 21 L17 16" /> <!-- Down chevron -->
                                                </svg>
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="light-bg-white light-bg-seo ">
                                    <!-- Report 1 -->
                                    <tr class="border-b-4 light-border-gray-300">
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium light-text-gray-900">
                                            Jan 2025</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm">
                                            <a href="#"
                                                class="inline-flex items-center light-text-gray-400 hover:underline p-2 rounded-md light-bg-e6e6e6">
                                                Website SEO.pdf
                                                <svg class="icon ml-2 w-5 h-5" viewBox="0 0 20 20" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <!-- Arrow down left side -->
                                                    <path d="M7.5 9.16667V14.1667L9.16667 12.5" stroke="#7D7D7D"
                                                        stroke-width="1.25" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M7.49998 14.1667L5.83331 12.5" stroke="#7D7D7D"
                                                        stroke-width="1.25" stroke-linecap="round"
                                                        stroke-linejoin="round" />

                                                    <!-- Document outline -->
                                                    <path
                                                        d="M18.3334 8.33334V12.5C18.3334 16.6667 16.6667 18.3333 12.5 18.3333H7.50002C3.33335 18.3333 1.66669 16.6667 1.66669 12.5V7.5C1.66669 3.33334 3.33335 1.66667 7.50002 1.66667H11.6667"
                                                        stroke="#7D7D7D" stroke-width="1.25" stroke-linecap="round"
                                                        stroke-linejoin="round" />

                                                    <!-- Folded corner -->
                                                    <path
                                                        d="M18.3334 8.33334H15C12.5 8.33334 11.6667 7.5 11.6667 5.00001V1.66667L18.3334 8.33334Z"
                                                        stroke="#7D7D7D" stroke-width="1.25" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>

                                            </a>
                                        </td>
                                    </tr>
                                    <!-- Report 2 -->
                                    <tr class="border-b-4 light-border-gray-300">
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium light-text-gray-900">
                                            Feb 2025</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm">
                                            <a href="#"
                                                class="inline-flex items-center light-text-gray-400 hover:underline p-2 rounded-md light-bg-e6e6e6">
                                                Website SEO.pdf
                                                <svg class="icon ml-2 w-5 h-5" viewBox="0 0 20 20" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <!-- Arrow down left side -->
                                                    <path d="M7.5 9.16667V14.1667L9.16667 12.5" stroke="#7D7D7D"
                                                        stroke-width="1.25" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M7.49998 14.1667L5.83331 12.5" stroke="#7D7D7D"
                                                        stroke-width="1.25" stroke-linecap="round"
                                                        stroke-linejoin="round" />

                                                    <!-- Document outline -->
                                                    <path
                                                        d="M18.3334 8.33334V12.5C18.3334 16.6667 16.6667 18.3333 12.5 18.3333H7.50002C3.33335 18.3333 1.66669 16.6667 1.66669 12.5V7.5C1.66669 3.33334 3.33335 1.66667 7.50002 1.66667H11.6667"
                                                        stroke="#7D7D7D" stroke-width="1.25" stroke-linecap="round"
                                                        stroke-linejoin="round" />

                                                    <!-- Folded corner -->
                                                    <path
                                                        d="M18.3334 8.33334H15C12.5 8.33334 11.6667 7.5 11.6667 5.00001V1.66667L18.3334 8.33334Z"
                                                        stroke="#7D7D7D" stroke-width="1.25" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>
                                    <!-- Report 3 -->
                                    <tr class="border-b-4 light-border-gray-300">
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium light-text-gray-900">
                                            Feb 2025</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm">
                                            <a href="#"
                                                class="inline-flex items-center light-text-gray-400 hover:underline p-2 rounded-md light-bg-e6e6e6">
                                                Website SEO.pdf
                                                <svg class="icon ml-2 w-5 h-5" viewBox="0 0 20 20" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <!-- Arrow down left side -->
                                                    <path d="M7.5 9.16667V14.1667L9.16667 12.5" stroke="#7D7D7D"
                                                        stroke-width="1.25" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M7.49998 14.1667L5.83331 12.5" stroke="#7D7D7D"
                                                        stroke-width="1.25" stroke-linecap="round"
                                                        stroke-linejoin="round" />

                                                    <!-- Document outline -->
                                                    <path
                                                        d="M18.3334 8.33334V12.5C18.3334 16.6667 16.6667 18.3333 12.5 18.3333H7.50002C3.33335 18.3333 1.66669 16.6667 1.66669 12.5V7.5C1.66669 3.33334 3.33335 1.66667 7.50002 1.66667H11.6667"
                                                        stroke="#7D7D7D" stroke-width="1.25" stroke-linecap="round"
                                                        stroke-linejoin="round" />

                                                    <!-- Folded corner -->
                                                    <path
                                                        d="M18.3334 8.33334H15C12.5 8.33334 11.6667 7.5 11.6667 5.00001V1.66667L18.3334 8.33334Z"
                                                        stroke="#7D7D7D" stroke-width="1.25" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- Reports Pagination -->
                        <div
                            class="flex overflow-x-auto p-6 items-center justify-start mt-4 text-sm text-gray-600 gap-2 whitespace-nowrap">
                            <div class="flex space-x-2">
                                <button
                                    class="px-4 py-2 rounded-md border border-gray-300 hover:light-bg-orange-600 text-white transition-colors">Previous</button>
                                <button
                                    class="px-4 py-2 rounded-md border border-gray-300 bg-orange-600 text-white hover:light-bg-orange-600 font-semibold">1</button>
                                <button
                                    class="px-4 py-2 rounded-md border border-gray-300 hover:bg-gray-100 text-white hover:light-bg-orange-600 transition-colors">2</button>
                                <button
                                    class="px-4 py-2 rounded-md border border-gray-300 hover:bg-gray-100 text-white hover:light-bg-orange-600 transition-colors">3</button>
                                <button
                                    class="px-4 py-2 rounded-md border border-gray-300 hover:bg-gray-100 text-white hover:light-bg-orange-600 transition-colors">Next</button>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Bottom Cards: Need Help & Free Consulting -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pb-6">
                    <!-- Need Help? Card -->
                    <div
                        class="light-bg-f5f5f5 light-bg-seo p-6 rounded-xl shadow-sm flex flex-col sm:flex-row items-center text-center sm:text-left gap-4">
                        <div class="flex-grow">
                            <h3 class="text-xl font-semibold light-text-gray-800 mb-2">Need help?</h3>
                            <p class="light-text-gray-600 mb-32">Open a new ticket now.</p>
                            <button
                                class="custom-btn text-white px-6 py-2 rounded-lg font-semibold light-hover-bg-orange-600 transition-colors shadow-md light-border-black">
                                Learn More
                            </button>
                        </div>
                        <img src="{{ asset('assets/List.png') }}"
                            class="w-[240px] h-[240px] object-contain light-mode-img flex-shrink-0"
                            data-dark-src="{{ asset('assets/List.png') }}">
                    </div>


                    <!-- Need Free Business Consulting? Card -->
                    <div
                        class="light-bg-f5f5f5 light-bg-seo p-6 rounded-xl shadow-sm flex flex-col sm:flex-row items-center text-center sm:text-left gap-4">
                        <div class="flex-grow">
                            <h3 class="text-xl font-semibold light-text-gray-800 mb-2">Need Free Business<br>
                                Consulting?</h3>
                            <p class="light-text-gray-600 mb-4">Schedule a meeting with<br> an expert now.</p>
                            <button
                                class="custom-btn text-white px-6 py-2 rounded-lg font-semibold light-hover-bg-orange-600 transition-colors shadow-md light-border-black mb-24">
                                Learn More
                            </button>
                        </div>
                        <img src="{{ asset('assets/Frame 2147224397.png') }}" alt="Consulting Illustration"
                            class="w-[240px] h-[240px] object-contain light-mode-img flex-shrink-0"
                            data-dark-src="{{ asset('assets/Frame 2147224397.png') }}">
                    </div>

                </div>

            </div>
        </main>
    </div>

    <!-- Modal Background -->
    <div id="modal"
        class="hidden modal fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50 overflow-y-auto max-h-screen">
        <div
            class="light-bg-seo text-white rounded-lg w-[90%] md:w-[850px] relative p-6 md:flex max-h-[90vh] overflow-y-auto">

            <!-- Left Section -->
            <div class="md:w-[40%] pr-6 border-r border-gray-700 mb-6 md:mb-0">
                <span id="subscription_tag" class="bg-gray-700 text-sm px-3 py-1 rounded-full">Starter SEO</span>
                <h2 id="subscription_price" class="text-3xl md:text-5xl font-medium mt-4">$19 <span
                        class="text-xl font-normal">/ month</span></h2>

                <h3 class="font-semibold mt-6" id="subscription_name">Foundation & Fixes</h3>
                <p class="text-gray-400 text-sm mt-2" id="subscription_tagline">All the basic features to boost your
                    freelance career</p>
                <ul class="text-sm mt-4 list-disc list-inside text-gray-300" id="best_for_list">
                    <li>Best for new or small business websites</li>
                </ul>

                <button class="bg-orange-600 hover:bg-orange-700 text-white w-full py-3 rounded-lg mt-6 font-semibold">
                    Buy Now
                </button>
            </div>

            <!-- Right Section -->
            <div class="md:w-[60%] pl-0 md:pl-6 mt-6 md:mt-0">
                <h4 class="font-semibold mb-4">What's Included</h4>
                <ul class="space-y-3 break-words" id="features_list">

                </ul>
            </div>

            <!-- Close Button -->
            <button id="closeModal"
                class="absolute top-4 right-4 text-gray-400 hover:text-white text-xl rounded-full hover:bg-gray-500 px-2">&times;</button>
        </div>
    </div>

    <div id="projectModal"
        class="fixed inset-0 bg-black light-bg-000000 bg-opacity-70 flex items-center justify-center z-50 hidden">
        <div
            class="light-bg-seo light-bg-f5f5f5  rounded-xl  w-full md:max-w-6xl  max-h-[90vh] overflow-y-auto shadow-xl">

            <div class="flex justify-between items-start mb-6">

                <div class="p-6">
                    <h2 class="text-2xl font-bold light-text-black mb-1 p-name">Website SEO</h2>
                    <div class="rounded-sm text-center w-20 light-bg-ea54547a p-priority-div"
                        style="display: none !important">
                        <div class="text-xs light-text-ff0000 ">High Priority</div>
                    </div>
                </div>
                <button id="closeModal"
                    class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 p-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <div class="relative">
                <!-- Desktop View (unchanged) -->
                <div
                    class="hidden md:flex border-b px-6 light-border-gray-200 dark:border-gray-700 light-bg-d9d9d9 py-2 items-center  mb-10">
                    <!-- Your existing desktop tabs structure -->
                    <!-- Tab 1: Overview -->
                    <div
                        class="flex items-center active px-2 py-1 gap-2 justify-center rounded-sm hover:rounded-md light-hover-bg-gray-300 tab-wrapper">
                        <button class="tab-btn flex  items-center justify-center gap-1 pb-2 px-2" data-tab="overview">
                            <img class="w-4 h-4 " src="{{ asset('assets/category.png') }}" alt="">
                            <span>Overview</span>
                        </button>
                    </div>

                    <!-- Other tabs... -->
                    <!-- Tab 2: Notes -->
                    <div
                        class="flex items-center px-2 py-1 justify-center rounded-sm hover:rounded-md light-hover-bg-gray-300 tab-wrapper">
                        <button class="tab-btn flex items-center justify-center gap-1 pb-2 px-2 font-medium "
                            data-tab="notes">
                            <img class="w-4 h-4 " src="{{ asset('assets/fi_839860.png') }}" alt="">
                            <span>Notes</span>
                        </button>
                    </div>

                    <!-- Tab 3: Uploaded Document -->
                    <div
                        class="flex items-center px-2 py-1 justify-center rounded-sm hover:rounded-md light-hover-bg-gray-300 tab-wrapper">
                        <button
                            class="tab-btn flex items-center justify-center gap-1 mb-2 px-2 font-medium light-text-gray-500 dark:text-gray-400 hover:light-text-gray-700 dark:hover:text-gray-300"
                            data-tab="uploadedDocument">
                            <img class="w-4 h-4 " src="{{ asset('assets/document.png') }}" alt="">
                            <span>Uploaded Document</span>
                        </button>
                    </div>

                    <!-- Tab 4: Add Credentials -->
                    <div
                        class="flex items-center px-2 py-1 justify-center rounded-sm hover:rounded-md light-hover-bg-gray-300 tab-wrapper">
                        <button
                            class="tab-btn flex items-center justify-center gap-1 pb-2 px-2 font-medium light-text-gray-500 dark:text-gray-400 hover:light-text-gray-700 dark:hover:text-gray-300"
                            data-tab="addCredentials"><img class="w-4 h-4 "
                                src="{{ asset('assets/fi_1332646.png') }}" alt="">
                            <span>Add Credentials</span>
                        </button>
                    </div>

                    <!-- Tab 5: Reports -->
                    <div
                        class="flex items-center px-2 py-1 justify-center rounded-sm hover:rounded-md light-hover-bg-gray-300 tab-wrapper">
                        <button
                            class="tab-btn flex items-center justify-center gap-1 pb-2 px-2 font-medium light-text-gray-500 dark:text-gray-400 hover:light-text-gray-700 dark:hover:text-gray-300"
                            data-tab="reports">
                            <div class="flex items-center justify-center">
                                <img class="w-4 h-4" src="{{ asset('assets/dociment.png') }}" alt="">
                            </div>
                            <span>Reports</span>
                        </button>
                    </div>
                </div>

                <!-- Mobile Slider View -->
                <div class="md:hidden overflow-x-auto whitespace-nowrap py-4 scrollbar-hide">
                    <div class="inline-flex space-x-8 px-4">
                        <!-- Tab 1: Overview -->
                        <div class="flex flex-col active items-center">
                            <img class="w-5 h-5" src="{{ asset('assets/category.png') }}" alt="">
                            <button
                                class="tab-btn  pt-2 font-medium light-text-orange-500 dark:text-orange-400 border-b-2 light-border-orange-500 dark:border-orange-400"
                                data-tab="overview">Overview</button>
                        </div>

                        <!-- Tab 2: Notes -->
                        <div class="flex flex-col items-center">
                            <img class="w-5 h-5" src="{{ asset('assets/fi_839860.png') }}" alt="">
                            <button
                                class="tab-btn pt-2 font-medium light-text-gray-500 dark:text-gray-400 hover:light-text-gray-700 dark:hover:text-gray-300"
                                data-tab="notes">Notes</button>
                        </div>

                        <!-- Tab 3: Uploaded Document -->
                        <div class="flex flex-col items-center">
                            <img class="w-5 h-5" src="{{ asset('assets/document.png') }}" alt="">
                            <button
                                class="tab-btn pt-2 font-medium light-text-gray-500 dark:text-gray-400 hover:light-text-gray-700 dark:hover:text-gray-300"
                                data-tab="uploadedDocument">Uploaded</button>
                        </div>

                        <!-- Tab 4: Add Credentials -->
                        <div class="flex flex-col items-center">
                            <img class="w-5 h-5" src="{{ asset('assets/fi_1332646.png') }}" alt="">
                            <button
                                class="tab-btn pt-2 font-medium light-text-gray-500 dark:text-gray-400 hover:light-text-gray-700 dark:hover:text-gray-300"
                                data-tab="addCredentials">Credentials</button>
                        </div>

                        <!-- Tab 5: Reports -->
                        <div class="flex flex-col items-center">
                            <img class="w-5 h-5" src="{{ asset('assets/dociment.png') }}" alt="">
                            <button
                                class="tab-btn pt-2 font-medium light-text-gray-500 dark:text-gray-400 hover:light-text-gray-700 dark:hover:text-gray-300"
                                data-tab="reports">Reports</button>
                        </div>
                    </div>
                </div>
            </div>


            <div id="overviewContent" class="tab-content p-6">
                <div class=" items-center">
                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                        <div class="bg-green-500 h-2.5 rounded-full" style="width: 78%"></div>
                    </div>
                    <span class="justify-center flex ml-2 text-sm light-text-black">78%</span>
                </div>
                <div class="flex w-full justify-between">
                    <div class="">

                        <div class="space-y-3">
                            <div class="flex text-left gap-2">
                                <img src="{{ asset('assets/money.png') }}" alt="">
                                <span class="light-text-black"> PRICE $<span class="p-price">$4000</span></span>
                            </div>
                            <div class="flex text-left gap-2">
                                <img src="{{ asset('assets/notification-status.png') }}" alt="">
                                <span class="light-text-black"> STATUS <span class="p-status">InProgress</span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="space-y-3">
                            <div class="flex items-center gap-2">
                                <img src="{{ asset('assets/clock.png') }}" alt="">
                                <span class="light-text-black"> START DATE <span
                                        class="p-start-date">05-7-2024</span></span>
                            </div>

                            <div class="flex items-center gap-2">
                                <img src="{{ asset('assets/timer.png') }}" alt="">
                                <span class="light-text-black"> DEADLINE <span
                                        class="p-end-date">05-7-2024</span></span>
                            </div>
                        </div>
                    </div>
                </div>



            </div>

            <div id="notesContent" class="tableContainer tab-content hidden">
                <div class="flex justify-between items-center px-8 mb-4 gap-4">
                    <h3 class="justify-start light-text-black text-2xl">WIZSPEED Team Notes</h3>
                    <div class="flex gap-2">
                        <div class="relative w-full max-w-xs">
                            <input type="text" placeholder="Search here"
                                class="memberSearch block w-full mr-10 px-4 py-2  
                                 bg-transparent border border-gray-200 dark:text-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 dark:focus:ring-orange-400">
                            <svg class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 light-text-gray-400 dark:text-gray-500"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <select id="filterSelect"
                            class="filterSelect px-4 py-2 rounded-lg bg-white light-bg-d9d9d9 light-text-gray-700 border border-gray-300 text-gray-700 hover:bg-gray-200 transition-colors cursor-pointer">
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="25">25</option>
                        </select>
                    </div>
                </div>
                <div class="overflow-x-auto ">
                    <table class="memberTable milestoneTable min-w-full divide-y bg-transparent">
                        <thead class="bg-gray-500 border-2 light-border-gray-300">
                            <tr class="light-bg-d9d9d9">
                                <th scope="col"
                                    class="px-8 py-3 text-left text-xs font-medium light-text-black uppercase tracking-wider">
                                    <div class="flex items-center whitespace-nowrap">
                                        <span>CREATED DATE</span>
                                        <svg class="ml-1 w-3 h-3" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path>
                                        </svg>
                                    </div>
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium light-text-black uppercase tracking-wider">
                                    TITLE
                                    <svg class="inline-block ml-1 w-3 h-3" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path>
                                    </svg>
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium light-text-black uppercase tracking-wider">
                                    DESCRIPTION
                                    <svg class="inline-block ml-1 w-3 h-3" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path>
                                    </svg>
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium light-text-black uppercase tracking-wider">
                                    <div class="flex items-center whitespace-nowrap">
                                        <span>PRIORITY</span>
                                        <svg class="ml-1 w-3 h-3" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path>
                                        </svg>
                                    </div>
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium light-text-black uppercase tracking-wider">
                                    <div class="flex items-center whitespace-nowrap">
                                        <span>Deadline</span>
                                        <svg class="ml-1 w-3 h-3" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path>
                                        </svg>
                                    </div>
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium light-text-black uppercase tracking-wider">
                                    <div class="flex items-center whitespace-nowrap">
                                        <span>Completed</span>
                                        <svg class="ml-1 w-3 h-3" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path>
                                        </svg>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-transparent light-border-gray-300" id="milestoneTableBody">

                        </tbody>
                    </table>
                </div>
                <div class="flex justify-between items-center px-8 mt-4">
                    <div>
                        <span class="tableInfo" id="tableInfo"></span>
                    </div>
                    <div id="customPagination" class="customPagination flex space-x-2">
                        <button
                            class="px-4 py-2 rounded-md border border-gray-300 hover:bg-gray-100 transition-colors">Previous</button>
                        <button
                            class="px-4 py-2 rounded-md border border-gray-300 bg-orange-600 text-white font-semibold">1</button>
                        <button
                            class="px-4 py-2 rounded-md border border-gray-300 hover:bg-gray-100 transition-colors">2</button>
                        <button
                            class="px-4 py-2 rounded-md border border-gray-300 hover:bg-gray-100 transition-colors">3</button>
                        <button
                            class="px-4 py-2 rounded-md border border-gray-300 hover:bg-gray-100 transition-colors">4</button>
                        <button
                            class="px-4 py-2 rounded-md border border-gray-300 hover:bg-gray-100 transition-colors">5</button>
                        <button
                            class="px-4 py-2 rounded-md border border-gray-300 hover:bg-gray-100 transition-colors">Next</button>
                    </div>
                </div>
            </div>

            <div id="uploadedDocumentContent" class="tableContainer tab-content hidden">
                <div class="flex justify-between items-center px-4 mb-4">
                    <div class="flex justify-between items-center p-4 mb-4">
                        <h3 class="text-2xl">Documents</h3>
                        <div class="relative w-full max-w-xs pl-2">

                        </div>
                        <div class="flex space-x-2">
                            <input type="text" placeholder="Search here"
                                class="memberSearch block w-full px-4 py-2 border border-gray-200 light-text-gray-900 dark:text-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 dark:focus:ring-orange-400">
                            <svg class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 light-text-gray-400 dark:text-gray-500"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                                <select id="filterSelect"
                                        class="filterSelect px-4 py-2 rounded-lg bg-white light-bg-d9d9d9 light-text-gray-700 border border-gray-300 text-gray-700 hover:bg-gray-200 transition-colors cursor-pointer">
                                        <option value="5">5</option>
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                </select>
                            <button
                                class="light-bg-orange-600 dark:bg-orange-700 text-white w-96 py-2 rounded-lg hover:light-bg-orange-700 dark:hover:bg-orange-600 transition-colors text-sm open-upload-modal">
                                Upload Documents
                            </button>
                        </div>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="memberTable documentTable min-w-full divide-y light-divide-gray-200 dark:divide-gray-700">
                        <thead class="light-bg-gray-50 dark:bg-gray-700">
                            <tr class="light-bg-d9d9d9">
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium light-text-black uppercase tracking-wider">
                                    ID
                                    <svg class="inline-block ml-1 w-3 h-3" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path>
                                    </svg>
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium light-text-black uppercase tracking-wider">
                                    FILE
                                    <svg class="inline-block ml-1 w-3 h-3" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path>
                                    </svg>
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium light-text-black uppercase tracking-wider">
                                    UPLOADED DATE
                                    <svg class="inline-block ml-1 w-3 h-3" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path>
                                    </svg>
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium light-text-black uppercase tracking-wider">
                                    ACTION
                                    <svg class="inline-block ml-1 w-3 h-3" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path>
                                    </svg>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-transparent border-2 light-border-gray-300 " id="document-table">
                        </tbody>
                    </table>
                </div>
                <div class="flex justify-between items-center px-8 mt-4">
                <div>
                                <span class="tableInfo" id="tableInfo"></span>
                            </div>
                            <div id="customPagination" class="customPagination flex space-x-2">
                                <button
                                    class="px-4 py-2 rounded-md border border-gray-300 hover:bg-gray-100 transition-colors">Previous</button>
                                <button
                                    class="px-4 py-2 rounded-md border border-gray-300 bg-orange-600 text-white font-semibold">1</button>
                                <button
                                    class="px-4 py-2 rounded-md border border-gray-300 hover:bg-gray-100 transition-colors">2</button>
                                <button
                                    class="px-4 py-2 rounded-md border border-gray-300 hover:bg-gray-100 transition-colors">3</button>
                                <button
                                    class="px-4 py-2 rounded-md border border-gray-300 hover:bg-gray-100 transition-colors">4</button>
                                <button
                                    class="px-4 py-2 rounded-md border border-gray-300 hover:bg-gray-100 transition-colors">5</button>
                                <button
                                    class="px-4 py-2 rounded-md border border-gray-300 hover:bg-gray-100 transition-colors">Next</button>
                            </div>
                </div>
            </div>

            <div id="addCredentialsContent" class="tableContainer tab-content hidden ">
                <div class="p-4">
                    <div class="light-bg-d9d9d9 p-4 rounded-xl">
                        <h3 class="text-2xl  light-text-black  mb-4">Add Credentials</h3>
                        <form id="credentialsForm">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
                                <div>
                                    <label class="block text-sm font-medium light-text-white mb-1">Platform
                                        Name</label>
                                    <input type="text" placeholder="Google/Facebook etc" name="platform_name"
                                        id="platformName"
                                        class="w-full p-2 rounded light-bg-d7d7d7 border border-gray-700 text-white">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium light-text-white mb-1">Account Name</label>
                                    <input type="text" name="account_name" placeholder="Account Holder Name"
                                        id="accountName"
                                        class="w-full p-2 rounded light-bg-d7d7d7 border border-gray-700 text-white">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium light-text-white mb-1">Email</label>
                                    <input type="email" name="email" id="email" placeholder="abc@gmail.com"
                                        class="w-full p-2 rounded light-bg-d7d7d7 border border-gray-700 text-white">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium light-text-white mb-1">Password</label>
                                    <input type="password" name="password" id="password"
                                        placeholder="Password Here"
                                        class="w-full p-2 rounded light-bg-d7d7d7 border border-gray-700 text-white">
                                </div>
                            </div>

                            <div class="flex justify-end space-x-2 mb-8">
                                <button type="button" class="cancel-btn px-4 py-2 rounded-lg">Cancel</button>
                                <button type="submit"
                                    class="add-credentials-btn px-4 py-2 rounded-lg bg-orange-600 text-white">
                                    Save
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
                <div class=" px-4">
                    <div class=" flex justify-between items-center p-4 mb-4">
                        <h3 class="text-2xl">Credentials List</h3>
                        <div class="relative w-full max-w-xs pl-2">

                        </div>
                        <div class="flex space-x-2">
                            <input type="text" placeholder="Search here"
                                class="memberSearch block w-full px-4 py-2 border border-gray-200 light-text-black  rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 dark:focus:ring-orange-400">
                            <svg class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 light-text-gray-400 dark:text-gray-500"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                                    <select id="filterSelect"
                                        class="filterSelect px-4 py-2 rounded-lg bg-white light-bg-d9d9d9 light-text-gray-700 border border-gray-300 text-gray-700 hover:bg-gray-200 transition-colors cursor-pointer">
                                        <option value="5">5</option>
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                    </select>
                            {{-- <button
                                class="light-bg-orange-600 dark:bg-orange-700 text-white w-96 py-2 rounded-lg hover:light-bg-orange-700 dark:hover:bg-orange-600 transition-colors text-sm">
                                Upload Documents
                            </button> --}}
                        </div>
                    </div>

                </div>
                <div class="overflow-x-auto">
                    <table class="memberTable credentialTable min-w-full divide-y light-divide-gray-200 dark:divide-gray-700">
                        <thead class="light-bg-gray-50 dark:bg-gray-700">
                            <tr class="light-bg-d9d9d9 border-2 light-border-gray-300 ">
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium light-text-black  uppercase tracking-wider">
                                    PLATFORM
                                    <svg class="inline-block ml-1 w-3 h-3" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path>
                                    </svg>
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium light-text-black uppercase tracking-wider">
                                    NAME
                                    <svg class="inline-block ml-1 w-3 h-3" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path>
                                    </svg>
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium light-text-black uppercase tracking-wider">
                                    EMAIL
                                    <svg class="inline-block ml-1 w-3 h-3" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path>
                                    </svg>
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium light-text-black uppercase tracking-wider">
                                    PASSWORD
                                    <svg class="inline-block ml-1 w-3 h-3" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path>
                                    </svg>
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium light-text-black uppercase tracking-wider">
                                    ACTION
                                    <svg class="inline-block ml-1 w-3 h-3" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path>
                                    </svg>
                                </th>
                            </tr>
                        </thead>
                        <tbody class=" border-2 light-border-gray-300 " id="credentials-table">
                            {{-- <tr class="border-2 light-border-gray-300 ">
                                <td class="px-6 py-4 whitespace-nowrap text-sm light-text-black">Facebook</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm light-text-black">John Doe</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm light-text-black">abc123@email.com</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm light-text-black">********** <button
                                        class="ml-2 light-text-gray-500 hover:light-text-gray-700 dark:text-gray-400 dark:hover:text-gray-200"><svg
                                            class="w-4 h-4" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                            </path>
                                        </svg></button></td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button
                                        class="light-text-indigo-600 hover:light-text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300 mr-2">
                                        <img src="{{ asset('assets/edit.svg') }}" alt="eye"
                                            class="bg-gray-200 p-1 rounded-full">
                                    </button>
                                    <button
                                        class="light-text-red-600 hover:light-text-red-900 dark:text-red-400 dark:hover:text-red-300">
                                        <img src="{{ asset('assets/trash.svg') }}" alt="eye"
                                            class="bg-gray-200 p-1 rounded-full">
                                    </button>
                                </td>
                            </tr> --}}
                        </tbody>
                    </table>
                </div>
                <div class="flex justify-between items-center mt-4 px-8">
                   <div>
                                <span class="tableInfo" id="tableInfo"></span>
                            </div>
                            <div id="customPagination" class="customPagination flex space-x-2">
                                <button
                                    class="px-4 py-2 rounded-md border border-gray-300 hover:bg-gray-100 transition-colors">Previous</button>
                                <button
                                    class="px-4 py-2 rounded-md border border-gray-300 bg-orange-600 text-white font-semibold">1</button>
                                <button
                                    class="px-4 py-2 rounded-md border border-gray-300 hover:bg-gray-100 transition-colors">2</button>
                                <button
                                    class="px-4 py-2 rounded-md border border-gray-300 hover:bg-gray-100 transition-colors">3</button>
                                <button
                                    class="px-4 py-2 rounded-md border border-gray-300 hover:bg-gray-100 transition-colors">4</button>
                                <button
                                    class="px-4 py-2 rounded-md border border-gray-300 hover:bg-gray-100 transition-colors">5</button>
                                <button
                                    class="px-4 py-2 rounded-md border border-gray-300 hover:bg-gray-100 transition-colors">Next</button>
                            </div>
                </div>
            </div>

            <div id="reportsContent" class="tab-content hidden ">
                <div class="flex justify-between items-center p-8 mb-4">
                    <h3 class="text-2xl">Reports</h3>
                    <div class="relative w-full max-w-xs pl-2">

                    </div>
                    <div class="flex space-x-2">
                        <input type="text" placeholder="Search here"
                            class="block w-full px-4 py-2 border border-gray-200 light-text-gray-900 dark:text-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 dark:focus:ring-orange-400">
                        <svg class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 light-text-gray-400 dark:text-gray-500"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        <button
                            class="flex items-center px-4 py-2 border border-gray-200 dark:text-gray-300 rounded-lg hover:light-bg-gray-300 dark:hover:bg-gray-600">
                            Filters
                            <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <button
                            class="light-bg-orange-600 dark:bg-orange-700 text-white w-96 py-2 rounded-lg hover:light-bg-orange-700 dark:hover:bg-orange-600 transition-colors text-sm">
                            Upload Documents
                        </button>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y light-divide-gray-200 dark:divide-gray-700">
                        <thead class="light-bg-gray-50 dark:bg-gray-700">
                            <tr class="light-bg-d9d9d9 border-2 light-border-gray-300 ">
                                <th scope="col"
                                    class="flex items-center px-6 py-3 text-left text-xs font-medium light-text-black  uppercase tracking-wider">
                                    ID
                                    <svg class="inline-block w-3 h-3" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path>
                                    </svg>
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium light-text-black uppercase tracking-wider">
                                    MONTH
                                    <svg class="inline-block ml-1 w-3 h-3" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path>
                                    </svg>
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium light-text-black uppercase tracking-wider">
                                    DESCRIPTION
                                    <svg class="inline-block ml-1 w-3 h-3" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path>
                                    </svg>
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium light-text-black uppercase tracking-wider">
                                    DATE
                                    <svg class="inline-block ml-1 w-3 h-3" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path>
                                    </svg>
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium light-text-black uppercase tracking-wider">
                                    DOCUMENT
                                    <svg class="inline-block ml-1 w-3 h-3" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path>
                                    </svg>
                                </th>
                            </tr>
                        </thead>
                        <tbody class=" border-2 light-border-gray-300 ">
                            <tr class=" border-2 light-border-gray-300 ">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">01</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm light-text-black">Jan 2025</td>
                                <td class="px-6 py-4 text-sm text-gray-300">Auth Screen Done, please provide any
                                    additional content by end of this week</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">05-3-2024</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="#"
                                        class="flex items-center bg-gray-200 rounded-md w-36
                                p-2 text-gray-300  hover:underline">
                                        Website SEO.pdf
                                        <svg class="icon ml-2 w-5 h-5" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <!-- Arrow down left side -->
                                            <path d="M7.5 9.16667V14.1667L9.16667 12.5" stroke="#7D7D7D"
                                                stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M7.49998 14.1667L5.83331 12.5" stroke="#7D7D7D"
                                                stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />

                                            <!-- Document outline -->
                                            <path
                                                d="M18.3334 8.33334V12.5C18.3334 16.6667 16.6667 18.3333 12.5 18.3333H7.50002C3.33335 18.3333 1.66669 16.6667 1.66669 12.5V7.5C1.66669 3.33334 3.33335 1.66667 7.50002 1.66667H11.6667"
                                                stroke="#7D7D7D" stroke-width="1.25" stroke-linecap="round"
                                                stroke-linejoin="round" />

                                            <!-- Folded corner -->
                                            <path
                                                d="M18.3334 8.33334H15C12.5 8.33334 11.6667 7.5 11.6667 5.00001V1.66667L18.3334 8.33334Z"
                                                stroke="#7D7D7D" stroke-width="1.25" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>

                                    </a>
                                </td>
                            </tr>
                            <tr class=" border-2 light-border-gray-300 ">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">01</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm light-text-black">Feb 2025</td>
                                <td class="px-6 py-4 text-sm text-gray-300">Auth Screen Done, please provide any
                                    additional content by end of this week</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">05-3-2024</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="#"
                                        class="flex items-center bg-gray-200 rounded-md w-36
                                p-2 text-gray-300 hover:underline">
                                        Website SEO.pdf
                                        <svg class="icon ml-2 w-5 h-5" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <!-- Arrow down left side -->
                                            <path d="M7.5 9.16667V14.1667L9.16667 12.5" stroke="#7D7D7D"
                                                stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M7.49998 14.1667L5.83331 12.5" stroke="#7D7D7D"
                                                stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />

                                            <!-- Document outline -->
                                            <path
                                                d="M18.3334 8.33334V12.5C18.3334 16.6667 16.6667 18.3333 12.5 18.3333H7.50002C3.33335 18.3333 1.66669 16.6667 1.66669 12.5V7.5C1.66669 3.33334 3.33335 1.66667 7.50002 1.66667H11.6667"
                                                stroke="#7D7D7D" stroke-width="1.25" stroke-linecap="round"
                                                stroke-linejoin="round" />

                                            <!-- Folded corner -->
                                            <path
                                                d="M18.3334 8.33334H15C12.5 8.33334 11.6667 7.5 11.6667 5.00001V1.66667L18.3334 8.33334Z"
                                                stroke="#7D7D7D" stroke-width="1.25" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>

                                    </a>
                                </td>
                            </tr>
                            <tr class=" border-2 light-border-gray-300 ">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">01</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm light-text-black">Feb 2025</td>
                                <td class="px-6 py-4 text-sm text-gray-300">Auth Screen Done, please provide any
                                    additional content by end of this week</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">05-3-2024</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="#"
                                        class="flex items-center bg-gray-200 rounded-md w-36
                                p-2 text-gray-300 hover:underline">
                                        Website SEO.pdf
                                        <svg class="icon ml-2 w-5 h-5" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <!-- Arrow down left side -->
                                            <path d="M7.5 9.16667V14.1667L9.16667 12.5" stroke="#7D7D7D"
                                                stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M7.49998 14.1667L5.83331 12.5" stroke="#7D7D7D"
                                                stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />

                                            <!-- Document outline -->
                                            <path
                                                d="M18.3334 8.33334V12.5C18.3334 16.6667 16.6667 18.3333 12.5 18.3333H7.50002C3.33335 18.3333 1.66669 16.6667 1.66669 12.5V7.5C1.66669 3.33334 3.33335 1.66667 7.50002 1.66667H11.6667"
                                                stroke="#7D7D7D" stroke-width="1.25" stroke-linecap="round"
                                                stroke-linejoin="round" />

                                            <!-- Folded corner -->
                                            <path
                                                d="M18.3334 8.33334H15C12.5 8.33334 11.6667 7.5 11.6667 5.00001V1.66667L18.3334 8.33334Z"
                                                stroke="#7D7D7D" stroke-width="1.25" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>

                                    </a>
                                </td>
                            </tr>
                            <tr class=" border-2 light-border-gray-300 ">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">01</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm light-text-black">March 2025</td>
                                <td class="px-6 py-4 text-sm text-gray-300">Auth Screen Done, please provide any
                                    additional content by end of this week</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">05-3-2024</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="#"
                                        class="flex items-center bg-gray-200 rounded-md w-36
                                p-2 text-gray-300 hover:underline">
                                        Website SEO.pdf
                                        <svg class="icon ml-2 w-5 h-5" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <!-- Arrow down left side -->
                                            <path d="M7.5 9.16667V14.1667L9.16667 12.5" stroke="#7D7D7D"
                                                stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M7.49998 14.1667L5.83331 12.5" stroke="#7D7D7D"
                                                stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />

                                            <!-- Document outline -->
                                            <path
                                                d="M18.3334 8.33334V12.5C18.3334 16.6667 16.6667 18.3333 12.5 18.3333H7.50002C3.33335 18.3333 1.66669 16.6667 1.66669 12.5V7.5C1.66669 3.33334 3.33335 1.66667 7.50002 1.66667H11.6667"
                                                stroke="#7D7D7D" stroke-width="1.25" stroke-linecap="round"
                                                stroke-linejoin="round" />

                                            <!-- Folded corner -->
                                            <path
                                                d="M18.3334 8.33334H15C12.5 8.33334 11.6667 7.5 11.6667 5.00001V1.66667L18.3334 8.33334Z"
                                                stroke="#7D7D7D" stroke-width="1.25" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>

                                    </a>
                                </td>
                            </tr>
                            <tr class="border-2 light-border-gray-300 ">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">01</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm light-text-black">Apr 2025</td>
                                <td class="px-6 py-4 text-sm text-gray-300">Auth Screen Done, please provide any
                                    additional content by end of this week</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">05-3-2024</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="#"
                                        class="flex items-center bg-gray-200 rounded-md w-36
                                p-2 text-gray-300 hover:underline">
                                        Website SEO.pdf
                                        <svg class="icon ml-2 w-5 h-5" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <!-- Arrow down left side -->
                                            <path d="M7.5 9.16667V14.1667L9.16667 12.5" stroke="#7D7D7D"
                                                stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M7.49998 14.1667L5.83331 12.5" stroke="#7D7D7D"
                                                stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />

                                            <!-- Document outline -->
                                            <path
                                                d="M18.3334 8.33334V12.5C18.3334 16.6667 16.6667 18.3333 12.5 18.3333H7.50002C3.33335 18.3333 1.66669 16.6667 1.66669 12.5V7.5C1.66669 3.33334 3.33335 1.66667 7.50002 1.66667H11.6667"
                                                stroke="#7D7D7D" stroke-width="1.25" stroke-linecap="round"
                                                stroke-linejoin="round" />

                                            <!-- Folded corner -->
                                            <path
                                                d="M18.3334 8.33334H15C12.5 8.33334 11.6667 7.5 11.6667 5.00001V1.66667L18.3334 8.33334Z"
                                                stroke="#7D7D7D" stroke-width="1.25" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>

                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="flex justify-between items-center p-8 mt-4">
                    <div class="flex items-center">
                        <span class="text-sm light-text-gray-700 dark:text-gray-400">Showing 1 to 5 of 100
                            entries</span>
                        <select
                            class="ml-2 border light-border-gray-300 dark:border-gray-600 rounded-md shadow-sm text-sm light-text-gray-700 dark:text-gray-300 light-bg-white dark:bg-gray-700 focus:outline-none focus:ring-orange-500 focus:border-orange-500">
                            <option>5</option>
                            <option>10</option>
                            <option>25</option>
                        </select>
                    </div>
                    <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                        <div class="flex space-x-2">
                            <button
                                class="px-4 py-2 rounded-md border border-gray-300 hover:bg-gray-100 transition-colors">Previous</button>
                            <button
                                class="px-4 py-2 rounded-md border border-gray-300 bg-orange-600 text-white font-semibold">1</button>
                            <button
                                class="px-4 py-2 rounded-md border border-gray-300 hover:bg-gray-100 transition-colors">2</button>
                            <button
                                class="px-4 py-2 rounded-md border border-gray-300 hover:bg-gray-100 transition-colors">3</button>
                            <button
                                class="px-4 py-2 rounded-md border border-gray-300 hover:bg-gray-100 transition-colors">4</button>
                            <button
                                class="px-4 py-2 rounded-md border border-gray-300 hover:bg-gray-100 transition-colors">5</button>
                            <button
                                class="px-4 py-2 rounded-md border border-gray-300 hover:bg-gray-100 transition-colors">Next</button>
                        </div>
                    </nav>
                </div>
            </div>

            <div class=" light-bg-need flex justify-between items-center px-6 py-4 mt-8 ">
                <div>
                    <h4 class="font-semibold text-black dark:text-white mb-2">
                        Need Something Else?
                    </h4>
                    <p class="text-gray-600 dark:text-white mb-0 text-sm">
                        Looking for additional services? Explore our marketplace for Web Design, Digital Marketing, and
                        more!
                    </p>
                </div>

                <button
                    class="bg-orange-600 dark:bg-[#282828] border-2 light-border-gray-300 text-white px-6 py-2 rounded-lg hover:bg-orange-700 dark:hover:bg-orange-600 transition-colors">
                    View More
                </button>
            </div>


        </div>
    </div>


    <!-- document Upload Modal -->
    <div id="uploadModal" class="fixed inset-0 z-50 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <div class="p-6 bg-[#1f1f1f] rounded-lg w-full max-w-[70vw] text-white">

            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold">Upload Documents</h2>
                <button class="close-upload-modal text-gray-300 hover:text-white">✕</button>
            </div>

            <!-- file Upload -->
            <form action="{{ route('document.store') }}" method="POST">
                @csrf
                <div>
                    <label class="block text-sm mb-1 light-text-black">Attachment</label>
                    <input id="project_document" type="file" id="ticketFile"
                        class="file-input w-full light-text-black light-bg-d7d7d7 p-1 rounded-md focus:outline-none">
                </div>

                <div class="flex justify-end mt-4">
                    <div class="flex gap-2">
                        <button class="close-upload-modal bg-gray-600 px-4 py-2 rounded">Cancel</button>
                        <button type="submit" class="bg-orange-500 text-white px-4 py-2 rounded"
                            id="upload-document-btn">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- edit credentials Modal -->
    <div id="credentialModal"
        class="fixed inset-0 z-50 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <div class="p-6 bg-[#1f1f1f] rounded-lg w-full max-w-[70vw] text-white">

            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold">Edit Credentials</h2>
                <button class="close-credential-modal text-gray-300 hover:text-white">✕</button>
            </div>

            <form>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
                    <input type="hidden" name="e_credentail_id" id="e_credential_id">
                    <div>
                        <label class="block text-sm font-medium light-text-white mb-1">Platform
                            Name</label>
                        <input type="text" placeholder="Google/Facebook etc" name="e_platform_name"
                            id="e_platformName"
                            class="w-full p-2 rounded light-bg-d7d7d7 border border-gray-700 text-white">
                    </div>

                    <div>
                        <label class="block text-sm font-medium light-text-white mb-1">Account Name</label>
                        <input type="text" name="e_account_name" placeholder="Account Holder Name"
                            id="e_accountName"
                            class="w-full p-2 rounded light-bg-d7d7d7 border border-gray-700 text-white">
                    </div>

                    <div>
                        <label class="block text-sm font-medium light-text-white mb-1">Email</label>
                        <input type="email" name="e_email" id="e_email" placeholder="abc@gmail.com"
                            class="w-full p-2 rounded light-bg-d7d7d7 border border-gray-700 text-white">
                    </div>

                    <div>
                        <label class="block text-sm font-medium light-text-white mb-1">Password</label>
                        <input type="text" name="e_password" id="e_password" placeholder="Password Here"
                            class="w-full p-2 rounded light-bg-d7d7d7 border border-gray-700 text-white">
                    </div>
                </div>

                <div class="flex justify-end space-x-2 mb-8">
                    <button type="button" class="close-credential-modal px-4 py-2 rounded-lg">Cancel</button>
                    <button type="submit"
                        class="edit-credentials-btn px-4 py-2 rounded-lg bg-orange-600 text-white">
                        Save
                    </button>
                </div>
            </form>

        </div>
    </div>


    <div id="document_delete_msg" style="display: none; z-index: 9999 !important;"
        class="fixed top-5 right-5 bg-red-500 text-white px-4 py-2 rounded shadow-lg z-50">
        Document Deleted successfully!
    </div>

    <div id="documentUploadMsg" style="display: none; z-index: 9999 !important;"
        class="fixed top-5 right-5 bg-green-500 text-white px-4 py-2 rounded shadow-lg z-50">
        Document Upload successfully!
    </div>

    <div id="credentialsMsg" x-data="{ show: true }" x-init="setTimeout(() => show = false, 1000)" x-show="show" x-transition
        class="fixed top-5 right-5 bg-green-500 text-white px-4 py-2 rounded shadow-lg z-50" style="display: none;">
        Credentials saved successfully
    </div>

    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 1000)" x-show="show" x-transition
        class="Errors fixed top-5 right-5 bg-red-500 text-white px-4 py-2 rounded shadow-lg z-50"
        style="display: none;">
    </div>

    <div id="deletecredential" style="display: none; z-index: 9999 !important;"
        class="fixed top-5 right-5 bg-red-500 text-white px-4 py-2 rounded shadow-lg z-50">
        Credentials deleted successfully!
    </div>

    <div id="editcredential" style="display: none; z-index: 9999 !important;"
        class="fixed top-5 right-5 bg-green-500 text-white px-4 py-2 rounded shadow-lg z-50">
        Credentials Updated successfully!
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>


    <script>
        $(document).ready(function() {

            $('.memberTable').each(function(index, table) {
                let $table = $(table);

                let $container = $table.closest('.tableContainer');
                let $search = $container.find('.memberSearch');
                let $info = $container.find('.tableInfo');
                let $pagination = $container.find('.customPagination');
                let $filter = $container.find('.filterSelect');

                let dataTable = $table.DataTable({
                    paging: true,
                    searching: true,
                    ordering: true,
                    lengthChange: true,
                    pageLength: 5,
                    destroy: true,
                    columnDefs: [{
                        orderable: false,
                        targets: 3
                    }],
                    dom: `<"flex justify-between items-center mb-4"l>rt`
                });

                $table.data('tableInstance', dataTable);

                // Search
                $search.on('keyup', function() {
                    dataTable.search(this.value).draw();
                });

                // Update info
                function updateTableInfo() {
                    let info = dataTable.page.info();
                    $info.text(`Showing ${info.start + 1} to ${info.end} of ${info.recordsTotal} entries`);
                }

                // Update custom pagination
                function updatePagination() {
                    let info = dataTable.page.info();
                    $pagination.empty();

                    // Previous button
                    $pagination.append(`
                    <button data-page="prev" class="px-4 py-2 rounded-md border border-gray-300
                        ${info.page === 0 ? 'opacity-50 cursor-not-allowed' : 'hover:bg-gray-100'}">
                        Previous
                    </button>
                `);

                    // Page numbers
                    for (let i = 0; i < info.pages; i++) {
                        $pagination.append(`
                        <button data-page="${i}" class="px-4 py-2 rounded-md border border-gray-300
                            ${i === info.page ? 'bg-orange-600 text-white font-semibold' : 'hover:bg-gray-100'}">
                            ${i + 1}
                        </button>
                    `);
                    }

                    // Next button
                    $pagination.append(`
                    <button data-page="next" class="px-4 py-2 rounded-md border border-gray-300
                        ${info.page === info.pages - 1 ? 'opacity-50 cursor-not-allowed' : 'hover:bg-gray-100'}">
                        Next
                    </button>
                `);
                }

                // Handle custom pagination click
                $pagination.on('click', 'button', function() {
                    let action = $(this).data('page');
                    let info = dataTable.page.info();

                    if (action === 'prev' && info.page > 0) {
                        dataTable.page('previous').draw('page');
                    } else if (action === 'next' && info.page < info.pages - 1) {
                        dataTable.page('next').draw('page');
                    } else if (!isNaN(action)) {
                        dataTable.page(action).draw('page');
                    }
                });

                // Update on draw
                dataTable.on('draw', function() {
                    updateTableInfo();
                    updatePagination();
                });

                // Initial update
                updateTableInfo();
                updatePagination();

                // Filter select change
                $filter.on('change', function() {
                    let val = parseInt(this.value);
                    if (!isNaN(val)) {
                        dataTable.page.len(val).draw();
                    }
                });
            });


            function projectData(tableInstance) {
                $.ajax({
                    type: 'GET',
                    url: '/project/list',
                    success: function(response) {
                        tableInstance.clear();
                        if (response.success) {
                            let count = 0;
                            let index = 1;

                            if (response.success.length > 0) {

                                response.success.forEach(function(project) {
                                    count++;
                                    tableInstance.row.add([

                                        `<div class="px-6 py-4 whitespace-nowrap text-sm font-medium light-text-gray-900">
                                            ${index++}
                                        </div>`,

                                        `<div class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium light-text-gray-900">
                                                ${project.project_name}
                                            </div>
                                            ${
                                                project.is_high_priority == 1
                                                ? `<div class="rounded-sm text-center w-20 light-bg-ea54547a mt-1">
                                                            <div class="text-xs light-text-ff0000">
                                                                High Priority
                                                            </div>
                                                    </div>`
                                                : ''
                                            }
                                        </div>`,

                                        `<div class="px-6 py-4 whitespace-nowrap text-sm light-text-gray-900">
                                            <div class="flex items-center gap-1">
                                                <p>$${project.price}</p>
                                            </div>
                                        </div>`,

                                        `<div class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex flex-col justify-start gap-2">
                                                <span class="ml-2 text-sm light-text-gray-700 align-middle">
                                                    70%
                                                </span>
                                                <progress value="70" max="100"
                                                    class="w-52 h-2.5 mb-4 rounded-full">
                                                </progress>
                                            </div>
                                        </div>`,

                                        `<div class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <button data-project-id="${project.id}"
                                                class="edit-project-modal light-text-orange-500 light-hover-text-orange-700"
                                                data-action="view-project">
                                                <svg class="icon w-5 h-5" viewBox="0 0 24 24">
                                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                    <circle cx="12" cy="12" r="3"></circle>
                                                </svg>
                                            </button>
                                        </div>`

                                    ]);
                                });
                            }
                            tableInstance.draw();
                        }
                    },
                    error: function(xhr) {
                        console.error('Error fetching project data:', xhr.responseText);
                    }
                });
            }

            projectData();

            function renderMilestones(tableInstance, milestoneData) {
                tableInstance.clear();

                if (milestoneData && milestoneData.length > 0) {
                    milestoneData.forEach(ms => {
                        tableInstance.row.add([
                            `<div class="px-6 py-4 whitespace-nowrap text-sm light-text-black">
                            ${new Date(ms.created_at).toLocaleDateString()}
                        </div>`,
                            `<div class="px-6 py-4 whitespace-nowrap text-sm light-text-black">
                            ${ms.milestone_name}
                        </div>`,
                            `<div class="px-6 py-4 text-sm light-text-black">
                            ${ms.description}
                        </div>`,
                            `<div class="px-6 py-4 text-sm light-text-black">
                            ${getPriorityBadge(ms.priority)}
                        </div>`,
                            `<div class="px-6 py-4 text-sm light-text-black">
                            ${ms.deadline}
                        </div>`,
                            `<div class="px-6 py-4 text-center">
                            <input 
                                type="checkbox"
                                class="accent-orange-500 w-4 h-4 is-completed-checkbox"
                                data-id="${ms.id}"
                                ${ms.is_completed == 1 ? 'checked' : ''}
                            />
                        </div>`
                        ]);
                    });
                } 

                tableInstance.draw();
            }

            function renderDocuments(tableInstance, documents) {
                tableInstance.clear();

                if (documents && documents.length > 0) {
                    documents.forEach((document, index) => {
                        let createdDate = document.created_at.split("T")[0];

                        tableInstance.row.add([
                            `<div class="px-6 py-4 whitespace-nowrap text-sm light-text-black">${index + 1}</div>`,

                            `<div class="px-6 py-4 whitespace-nowrap text-sm light-text-gray-900 dark:text-gray-300">
                                <a href="${document.document_name}" target="_blank"
                                    class="flex items-center bg-gray-200 rounded-md w-36
                                    p-2 light-text-gray-600 dark:text-gray-400 hover:underline">
                                    View File
                                    <svg class="icon ml-2 w-5 h-5" viewBox="0 0 20 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7.5 9.16667V14.1667L9.16667 12.5" stroke="#7D7D7D"
                                            stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M7.49998 14.1667L5.83331 12.5" stroke="#7D7D7D"
                                            stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M18.3334 8.33334V12.5C18.3334 16.6667 16.6667 18.3333 12.5 18.3333H7.50002C3.33335 18.3333 1.66669 16.6667 1.66669 12.5V7.5C1.66669 3.33334 3.33335 1.66667 7.50002 1.66667H11.6667"
                                            stroke="#7D7D7D" stroke-width="1.25" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M18.3334 8.33334H15C12.5 8.33334 11.6667 7.5 11.6667 5.00001V1.66667L18.3334 8.33334Z"
                                            stroke="#7D7D7D" stroke-width="1.25" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </a>
                            </div>`,

                            `<div class="px-6 py-4 whitespace-nowrap text-sm light-text-black">${createdDate}</div>`,

                            `<div class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                <button class="light-text-red-600 hover:light-text-red-900 dark:text-red-400 dark:hover:text-red-300">
                                    <div class="flex gap-2">
                                        <img data-document-id="${document.id}" data-d_project-id="${document.project_id}" 
                                            src="{{ asset('assets/trash.svg') }}" alt="eye" 
                                            class="delete-document-btn bg-gray-200 p-1 rounded-full">
                                    </div>
                                </button>
                            </div>`
                        ]);
                    });
                } 
                tableInstance.draw();
            }

            function renderCredentials(tableInstance, credentials) {
                tableInstance.clear();

                if (credentials && credentials.length > 0) {
                    credentials.forEach((cred, index) => {
                        tableInstance.row.add([
                            `<div class="px-6 py-4 whitespace-nowrap text-sm light-text-black">${index + 1}</div>`,

                            `<div class="px-6 py-4 whitespace-nowrap text-sm light-text-black">${cred.platform_name}</div>`,

                            `<div class="px-6 py-4 whitespace-nowrap text-sm light-text-black">${cred.account_name}</div>`,

                            `<div class="px-6 py-4 whitespace-nowrap text-sm light-text-black">
                                <span id="password-${index}" data-password="${cred.password}">********</span>
                                <button onclick="togglePassword(${index})" class="ml-2 light-text-gray-500 hover:light-text-gray-700">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                </button>
                            </div>`,

                            `<div class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <button class="mr-2 open-credential-modal" data-credential-id="${cred.id}">
                                    <img src="{{ asset('assets/edit.svg') }}" class="bg-gray-200 p-1 rounded-full">
                                </button>
                                <button class="delete-credentials-btn" data-credential-id="${cred.id}">
                                    <img src="{{ asset('assets/trash.svg') }}" class="bg-gray-200 p-1 rounded-full">
                                </button>
                            </div>`
                        ]);
                    });
                } 

                tableInstance.draw();
            }

            $('.projectTable').each(function() {
                let dataTable = $(this).data('tableInstance');
                projectData(dataTable);
            });

            $('.milestoneTable').each(function() {
                let dataTable = $(this).data('tableInstance');
                renderMilestones(dataTable, []);
            });

            $('.documentTable').each(function() {
                let dataTable = $(this).data('tableInstance'); 
                renderDocuments(dataTable, []); 
            });

            $('.credentialTable').each(function() {
                let dataTable = $(this).data('tableInstance'); 
                renderCredentials(dataTable, []); 
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            function getPriorityBadge(priority) {
                if (priority === 'Low') {
                    return `<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full light-bg-green-200 light-text-green-800 dark:bg-green-900 dark:text-green-200">Low</span>`;
                }
                if (priority === 'Medium') {
                    return `<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full light-bg-blue-100 light-text-blue-800 dark:bg-blue-900 dark:text-blue-200">Medium</span>`;
                }
                if (priority === 'High') {
                    return `<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full light-bg-red-100 light-text-red-800 dark:bg-red-900 dark:text-red-200">High</span>`;
                }
                return '';
            }

        
            $(document).on('change', '.is-completed-checkbox', function() {

                let milestoneId = $(this).data('id');
                let isCompleted = $(this).is(':checked') ? 1 : 0;

                $.ajax({
                    url: '/milestones/update-status',
                    method: 'POST',
                    data: {
                        milestone_id: milestoneId,
                        is_completed: isCompleted
                    },
                    success: function(response) {

                        $('#milestonestatus').fadeIn(400);
                        setTimeout(() => {
                            $('#milestonestatus').fadeOut(600);
                        }, 3000);

                        console.log(response.message);
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                    }
                });

            });

        
            $('#project-table-body').on('click', '.toggle-btn', function() {
                const targetId = $(this).data('target');
                $('#' + targetId).toggleClass('hidden');
            });


            function openSubscriptionModal(subscription_id) {

                $.ajax({
                    url: "{{ route('subscription.detail') }}",
                    method: 'POST',
                    data: {
                        id: subscription_id,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(data) {

                        let price = parseFloat(data.subDetail.price);
                        let formattedPrice = Number.isInteger(price) ? price : price.toFixed(2);

                        $('#subscription_tag').text(data.subDetail.subscription_tag);
                        $('#subscription_price').html(
                            `$${formattedPrice} <span class="text-xl font-normal">/ month</span>`);
                        $('#subscription_name').text(data.subDetail.subscription_name);
                        $('#subscription_tagline').text(data.subDetail.tagline);

                        $('#best_for_list').html(`<li>${data.subDetail.best_for}</li>`);

                        let featuresHtml = '';
                        if (data.subDetail.features && data.subDetail.features.length > 0) {
                            data.subDetail.features.forEach(function(feature) {
                                featuresHtml += `<li class="flex items-start">
                                    <span class="flex-shrink-0 flex items-center justify-center w-5 h-5 mr-2 mt-0.5">
                                        <img src="{{ asset('assets/modal-check.svg') }}" class="w-full h-full" alt="✓">
                                    </span>
                                    <span>${feature.feature}.</span>
                                </li>`;
                            });
                        } else {
                            featuresHtml = `<li>No features available</li>`;
                        }
                        $('#features_list').html(featuresHtml);

                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                        alert('Something went wrong while fetching subscription details.');
                    }
                });
            }

            $('.openModal').click(function() {
                const subscription_id = $(this).data('sub-detail-id');

                openSubscriptionModal(subscription_id);
            });

            $(document).on('click', '.edit-project-modal', function() {
                const currentProjectId = $(this).data('project-id');

                $.ajax({
                    url: '/projects/project-id',
                    method: 'POST',
                    data: {
                        id: currentProjectId
                    },
                    success: function(response) {
                        $('#upload-document-btn').attr('data-project-id', currentProjectId);
                        const documentTable = $('.documentTable').DataTable();
                        renderDocuments(documentTable, response.documentData)
                        const milestoneTable = $('.milestoneTable').DataTable();
                        renderMilestones(milestoneTable, response.milestoneData);

                        $('.p-name').text(response.data.project_name);
                        $('.p-price').text(response.data.price);
                        $('.p-status').text(response.data.status);
                        $('.p-start-date').text(response.data.start_date);
                        $('.p-end-date').text(response.data.end_date);

                        if (response.data.is_high_priority == 1) {
                            $('.p-priority-div').show();
                        } else {
                            $('.p-priority-div').hide();
                        }
                    }
                });

            });

            // document work start

            $(document).on('click', '.delete-document-btn', function() {
                document_id = $(this).data('document-id');
                projectId = $(this).data('d_project-id');

                $.ajax({
                    url: 'document/delete',
                    method: 'POST',
                    data: {
                        document_id: document_id
                    },
                    success: function(r) {
                        $('#document_delete_msg').fadeIn(400);
                        setTimeout(() => {
                            $('#document_delete_msg').fadeOut(600);
                        }, 3000);

                        $.ajax({
                            url: '/document/list',
                            method: 'POST',
                            data: {
                                project_id: projectId
                            },
                            success: function(documentResponse) {
                                renderDocuments(documentResponse.documentData);
                            },
                            error: function() {
                                alert(
                                    'Failed to reload Document after deletion.'
                                );
                            }
                        });


                    }
                });
            })

            $(document).on('click', '#upload-document-btn', function(d) {

                d.preventDefault();

                let document_project_id = $(this).attr('data-project-id');

                let formData = new FormData();

                formData.append('_token', '{{ csrf_token() }}');
                formData.append('project_document', $('#project_document')[0].files[0]);
                formData.append('project_id', document_project_id);


                $.ajax({
                    url: "{{ route('document.store') }}",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response) {
                            $('#project_document').val('');
                            $('#documentUploadMsg').fadeIn(400);
                            setTimeout(() => {
                                $('#documentUploadMsg').fadeOut(600);
                            }, 3000);

                            $.ajax({
                                url: '/document/list',
                                method: 'POST',
                                data: {
                                    project_id: document_project_id
                                },
                                success: function(documentResponse) {
                                    renderDocuments(documentResponse.documentData);
                                },
                                error: function() {
                                    alert(
                                        'Failed to reload Document after deletion.'
                                    );
                                }
                            });
                        }
                    },
                    error: function(xhr) {
                        console.log(xhr.status);
                        console.log(xhr.responseJSON);
                    }
                });
            });

            // credentials start

            function loadCredentials() {
                $.ajax({
                    url: '/credentials/list',
                    type: 'GET',
                    success: function(response) {
                        const credentialTable = $('.credentialTable').DataTable();
                        renderCredentials(credentialTable, response.credentialsData);
                    },
                    error: function() {
                        console.log('Failed to load credentials');
                    }
                });
            }

            loadCredentials();

            $(document).on('click', '.add-credentials-btn', function(e) {
                e.preventDefault();

                let platform_name = $('#platformName').val();
                let account_name = $('#accountName').val();
                let email = $('#email').val();
                let password = $('#password').val();

                let formData = new FormData();
                formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
                formData.append('platform_name', platform_name);
                formData.append('account_name', account_name);
                formData.append('email', email);
                formData.append('password', password);

                $.ajax({
                    url: "{{ route('credentials.store') }}",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        loadCredentials();
                        $('#platformName').val('');
                        $('#accountName').val('');
                        $('#email').val('');
                        $('#password').val('');

                        $('#credentialsMsg').fadeIn(400);
                        setTimeout(() => {
                            $('#credentialsMsg').fadeOut(600);
                        }, 3000);
                    },
                    error: function(xhr) {

                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;
                            let errorHtml = '<ul class="list-disc list-inside">';
                            $.each(errors, function(key, messages) {
                                $.each(messages, function(i, msg) {
                                    errorHtml += `<li>${msg}</li>`;
                                });
                            });
                            errorHtml += '</ul>';

                            $('.Errors').html(errorHtml).fadeIn();
                            setTimeout(() => {
                                $('.Errors').fadeOut();
                            }, 5000);
                        } else {
                            $('.Errors').html('An unexpected error occurred.').fadeIn();
                            setTimeout(() => {
                                $('.Errors').fadeOut();
                            }, 5000);
                        }
                    }
                });
            });

            $(document).on('click', '.delete-credentials-btn', function() {
                let credential_id = $(this).data('credential-id');

                $.ajax({
                    url: '/credentials/delete',
                    method: 'POST',
                    data: {
                        credential_id: credential_id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        loadCredentials();
                        $('#deletecredential').fadeIn(400);
                        setTimeout(() => {
                            $('#deletecredential').fadeOut(600);
                        }, 3000);
                    },
                    error: function() {
                        console.log('Failed to delete credential');
                    }
                });
            });

            $(document).on('click', '.open-credential-modal', function() {
                let credential_id = $(this).data('credential-id');

                $('#credentialModal').removeClass('hidden');

                console.log('Credential ID to edit:', credential_id);

                $.ajax({
                    url: '/credentials/edit',
                    method: 'POST',
                    data: {
                        credential_id: credential_id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        let credential_id = $('#e_credential_id').val(response.credentialData
                            .id);
                        let platform_name = $('#e_platformName').val(response.credentialData
                            .platform_name);
                        let account_name = $('#e_accountName').val(response.credentialData
                            .account_name);
                        let email = $('#e_email').val(response.credentialData.email);
                        let password = $('#e_password').val(response.credentialData.password);
                    },
                    error: function() {
                        console.log('Failed to fetch credential');
                    }
                });

            });

            $(document).on('click', '.edit-credentials-btn', function(e) {
                e.preventDefault();

                let credential_id = $('#e_credential_id').val();
                let platform_name = $('#e_platformName').val();
                let account_name = $('#e_accountName').val();
                let email = $('#e_email').val();
                let password = $('#e_password').val();

                let formData = new FormData();
                formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
                formData.append('credential_id', credential_id);
                formData.append('platform_name', platform_name);
                formData.append('account_name', account_name);
                formData.append('email', email);
                formData.append('password', password);

                $.ajax({
                    url: '/credentials/update',
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        loadCredentials();
                        $('#editcredential').fadeIn(400);
                        setTimeout(() => {
                            $('#editcredential').fadeOut(600);
                        }, 3000);
                    },
                    error: function(xhr) {
                        console.log(xhr.status);
                        console.log(xhr.responseJSON);
                    }
                });
            });



        })
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Debugging point 1
            console.log('DOM loaded - script running');

            const modal = document.getElementById('projectModal');
            const closeBtn = document.getElementById('closeModal');
            const tabButtons = document.querySelectorAll('.tab-btn'); // Select all tab buttons
            const tabContents = document.querySelectorAll('.tab-content'); // Select all tab content divs

            // --- NEW: Dark Mode Elements and Logic ---
            const themeToggleBtn = document.getElementById(
                'themeToggle'); // Assuming you'll have a button with this ID
            const htmlElement = document.documentElement; // This is the <html> tag

            // Function to set the theme
            function setTheme(theme) {
                if (theme === 'dark') {
                    htmlElement.classList.add('dark');
                    localStorage.setItem('theme', 'dark');
                    // Update button icon/text if you have one
                    if (themeToggleBtn) {
                        themeToggleBtn.innerHTML =
                            '<i class="fa-solid fa-sun"></i> Light Mode'; // Example for a sun icon
                    }
                } else {
                    htmlElement.classList.remove('dark');
                    localStorage.setItem('theme', 'light');
                    // Update button icon/text if you have one
                    if (themeToggleBtn) {
                        themeToggleBtn.innerHTML =
                            '<i class="fa-solid fa-moon"></i> Dark Mode'; // Example for a moon icon
                    }
                }
            }

            // Function to toggle the theme
            function toggleTheme() {
                if (htmlElement.classList.contains('dark')) {
                    setTheme('light');
                } else {
                    setTheme('dark');
                }
            }

            // Apply saved theme on load, or default to system preference/light
            const savedTheme = localStorage.getItem('theme');
            if (savedTheme) {
                setTheme(savedTheme);
            } else if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
                // Check for system preference if no theme is saved
                setTheme('dark');
            } else {
                setTheme('light'); // Default to light mode if no preference
            }

            // Add event listener for the theme toggle button
            if (themeToggleBtn) {
                themeToggleBtn.addEventListener('click', toggleTheme);
            }
            // --- END NEW: Dark Mode Elements and Logic ---


            if (!modal || !closeBtn || tabButtons.length === 0 || tabContents.length === 0) {
                console.error('Modal or tab elements not found!');
                return;
            }

            // Debugging point 2
            console.log('Modal, close button, and tab elements found');

            // Function to show a specific tab content and activate its button
            function showTab(tabId) {
                // Hide all tab contents
                tabContents.forEach(content => {
                    content.classList.add('hidden');
                });

                // Deactivate all tab wrappers
                const tabWrappers = document.querySelectorAll('.tab-wrapper');
                tabWrappers.forEach(wrapper => {
                    wrapper.classList.remove('active', 'bg-gray-tab');
                });

                // Deactivate all tab buttons
                tabButtons.forEach(button => {
                    button.classList.remove(
                        'text-orange-500',
                        'dark:text-orange-400',
                        'light-bg-d7d7d7',
                        'p-2',
                        'rounded-md'

                    );

                    // Remove inactive gray states to avoid duplicates
                    button.classList.remove(
                        'text-gray-500',
                        'dark:text-gray-400',
                        'hover:text-gray-700',
                        'dark:hover:text-gray-300',
                        'text-gray-700',
                        'dark:text-gray-300',
                        'hover:text-gray-900',
                        'dark:hover:text-gray-100'
                    );

                    // Add default inactive state
                    button.classList.add(
                        'text-gray-700', // visible in light mode
                        'dark:text-gray-300', // visible in dark mode
                        'hover:text-gray-900',
                        'dark:hover:text-gray-100'
                    );
                });

                // Show the selected tab content
                const selectedTabContent = document.getElementById(tabId + 'Content');
                if (selectedTabContent) {
                    selectedTabContent.classList.remove('hidden');
                }

                // Activate the selected tab button and wrapper
                const activeButton = document.querySelector(`.tab-btn[data-tab="${tabId}"]`);
                if (activeButton) {
                    // Remove inactive classes
                    activeButton.classList.remove(
                        'text-gray-700',
                        'dark:text-gray-300',
                        'hover:text-gray-900',
                        'dark:hover:text-gray-100'
                    );

                    // Add active classes
                    activeButton.classList.add(
                        'text-orange-500',
                        'dark:text-orange-400',
                        'light-bg-d7d7d7',
                        'p-2',
                        'rounded-md'

                    );

                    // Highlight its parent wrapper
                    const wrapper = activeButton.closest('.tab-wrapper');
                    if (wrapper) {
                        wrapper.classList.add('active', 'bg-gray-tab');
                    }
                }
            }


            document.addEventListener('click', function(e) {
                const eyeBtn = e.target.closest('[data-action="view-project"]');

                if (!eyeBtn) return;

                e.preventDefault();


                modal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
                showTab('overview');
            });


            // Close modal
            closeBtn.addEventListener('click', function() {
                modal.classList.add('hidden');
                document.body.style.overflow = 'auto';
            });

            // Close when clicking outside modal
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    modal.classList.add('hidden');
                    document.body.style.overflow = 'auto';
                }
            });

            // Tab switching functionality
            tabButtons.forEach(btn => {
                btn.addEventListener('click', function() {
                    const tabId = this.dataset.tab; // Get the data-tab attribute value
                    console.log(tabId);
                    showTab(tabId); // Call the helper function

                });
            });

            // Debugging point 5
            console.log('All event listeners set up');
        });

        document.addEventListener('DOMContentLoaded', () => {

            const uploadModal = document.getElementById("uploadModal");
            const openUploadModalBtns = document.querySelectorAll(".open-upload-modal");
            const closeUploadModalBtns = document.querySelectorAll(".close-upload-modal");

            openUploadModalBtns.forEach(btn => {
                btn.addEventListener("click", () => {
                    uploadModal.classList.remove("hidden");
                });
            });

            closeUploadModalBtns.forEach(btn => {
                btn.addEventListener("click", () => {
                    uploadModal.classList.add("hidden");
                });
            });

            const credentialModal = document.getElementById("credentialModal");
            const closeCredentialModalBtns = document.querySelectorAll(".close-credential-modal");


            closeCredentialModalBtns.forEach(btn => {
                btn.addEventListener("click", () => {
                    credentialModal.classList.add("hidden");
                });
            });

            window.togglePassword = function(index) {
                const el = document.getElementById(`password-${index}`);
                if (!el) return;

                const realPassword = el.getAttribute("data-password");

                if (el.textContent.trim() === "********") {
                    el.textContent = realPassword;
                } else {
                    el.textContent = "********";
                }
            };

            const mainModal = document.getElementById("modal");
            const openModalCards = document.querySelectorAll(".openModal");
            const closeModal = document.getElementById("closeModal");

            openModalCards.forEach((card) => {
                card.addEventListener("click", (e) => {
                    const isSwitch = e.target.closest(
                        ".toggle-switch, .toggle-input, .toggle-slider");
                    if (!isSwitch && mainModal) mainModal.classList.remove("hidden");
                });
            });

            if (closeModal && mainModal) {
                closeModal.addEventListener("click", () => mainModal.classList.add("hidden"));
            }

            window.addEventListener("click", (e) => {
                if (e.target === mainModal) mainModal.classList.add("hidden");
            });

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
        });
    </script>



</body>

</html>

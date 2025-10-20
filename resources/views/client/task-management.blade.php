<?php
    use App\Models\TaskManagment;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WIZSPEED Dashboard</title>
    <!-- Tailwind CSS CDN -->
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

        .dark-mode {
            --btn-bg: #282828;
            /* gray-700 */
            --btn-hover: #4B5563;
            /* gray-600 */
            --btn-border: #6B7280;
            /* gray-500 */
        }

        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        .active {
            background-color: #323232;
            border-radius: 5px;
        }

        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
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

        .light-hover-bg-gray-300:hover {
            background-color: #323232;
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
        .light-text-ff0000 {
            color: #FF0000;
        }

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

        .light-bg-need {
            background-color: #fc5d14;
        }

        .light-bg-bill {
            background-color: #ffffff;
        }


        .row-span {
            color: white;
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

        .dark-mode .light-bg-need {
            background-color: #fc5d1421 !important;
        }

        .dark-mode .light-bg-bill {
            background-color: #121212;
        }

        .dark-mode .light-bg-white,
        .dark-mode .light-bg-f5f5f5 {
            background-color: #171717 !important;
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


        .dark-mode .light-text-ff0000 {
            color: #EA5455 !important;
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

        .dark-mode .light-border-gray2 {
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

        .dark-mode .bg-gray-tab {
            /* Learn More buttons */
            background-color: #333333 !important;
            /* Darker gray */
            border-radius: 6px;
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

        .show {
            display: block;
        }

        .hide {
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

        .openPaymentModal{
            cursor: pointer;
        }
        .openTicketChatModal {
            cursor: pointer;
        }
    </style>

</head>

<body>

    @include('layouts.loader')

    <div class="flex min-h-screen light-bg-white">
        <!-- Sidebar -->
        @include('layouts.sidebar')

        <!-- Main Content Area -->
        <main class="flex-1  overflow-y-auto">
            <!-- Header -->
            @include('layouts.header')

            <div class="p-6 light-bg-bill lg:p-8">

                <!-- Projects Title -->
                {{-- <div class="flex justify-between ">
                    <div>
                        <h1 class="text-3xl font-bold light-text-gray-800 mb-10">Task Management</h1>
                    </div>
                    <div>
                        <img src="{{ asset('assets/Switch.svg') }}" alt="Switch View" id="switchBtn">
                    </div>
                </div> --}}

                <!-- Connect Domain Section -->

                <section class=" main-section show">
                    <div class="flex justify-between ">
                        <div>
                            <h1 class="text-3xl font-bold light-text-gray-800 mb-10">Task Management</h1>
                        </div>
                        <div>
                            {{-- <a href="{{route('task.data')}}"> --}}
                                <img src="{{ asset('assets/Switch.svg') }}" alt="Switch View" id="switchBtn">
                            {{-- </a> --}}
                        </div>
                    </div>
                    <div class="flex justify-between items-center w-full mb-10">
                        <!-- Search Box -->
                        <div class="relative max-w-md w-full">
                            <input type="text" placeholder="Search here"
                                class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="icon text-gray-400" viewBox="0 0 24 24">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg>
                            </div>
                        </div>

                        <!-- Right-side buttons -->
                        <div class="flex items-center space-x-4 ml-6">
                            <!-- Filter Button -->
                            <!-- Button -->
                            <select
                                class="w-20 px-3 py-2 rounded-md text-sm
                                bg-white text-gray-800 border border-gray-300
                                dark:bg-[#121212] dark:text-gray-100 dark:border-gray-600
                                focus:outline-none focus:ring-2 focus:ring-orange-500">
                                <option value="Filter">Filter</option>
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                            </select>

                            <!-- Add Button -->
                            <button
                                class="px-4 py-2 rounded-lg light-bg-d7d7d7 text-white font-semibold hover:bg-orange-700 transition-colors openTicketModal">
                                Add New Status </button>
                        </div>
                    </div>

                    <div class="light-bg-d9d9d9 w-full flex items-center mb-10  h-2 rounded-full">
                        <div class="light-bg-d7d7d7 w-24 h-1 ml-2 rounded-full"></div>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6 mb-6">
                        <!-- User's Projects List Table -->
                        <div>
                            <div class="flex justify-between items-center mb-10">
                                <h3>To Do</h3>
                                <div class="dropdown-wrapper" style="position: relative; display: inline-block;">
                                    <img src="{{ asset('assets/dots-vertical.svg') }}" class="dots-toggle"
                                        style="cursor: pointer; width: 24px;" />
                                    <div class="custom-dropdown"
                                        style="display: none; position:absolute; width: 120px; right: 35; background: #282828;  border-radius: 4px;">
                                        <div class="openPaymentModal dropdown-option"
                                            style="padding: 8px; cursor: pointer;">New Page</div>
                                        <div class="dropdown-option" style="padding: 8px; cursor: pointer;">Edit</div>
                                        <div class="dropdown-option" style="padding: 8px; cursor: pointer;">Delete</div>
                                    </div>
                                </div>
                            </div>

                            <div class="light-bg-d9d9d9 h-32 rounded-md mb-7">
                                <div class="flex items-center p-3 justify-between">
                                    <div class="bg-green-900 py-1 px-3 bg-opacity-30 rounded-full">
                                        <p class="text-green-400 text-sm">UX</p>
                                    </div>
                                    <div class="">
                                        <div class="dropdown-wrapper"
                                            style="position: relative; display: inline-block;">
                                            <img src="{{asset('assets/dots-vertical.svg')}}" class="dots-toggle"
                                                style="cursor: pointer; width: 24px;" />
                                            <div class="custom-dropdown"
                                                style="display: none; position: absolute; width: 120px; right: 35; background: #282828; border-radius: 4px;">
                                                <div class="dropdown-option" style="padding: 8px; cursor: pointer;">
                                                    Edit</div>
                                                <div class="dropdown-option" style="padding: 8px; cursor: pointer;">
                                                    Delete</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-3">
                                    <p class="text-sm text-gray-400">Research FAQ page UX</p>
                                </div>
                                <div class="flex items-center p-3 justify-between">
                                    <div class="flex openTicketChatModal gap-1 items-center text-sm text-gray-300"><img
                                            src="{{asset('assets/message-dots.svg')}}">12</div>
                                    <div><img src="{{asset('assets/Avatar (4).svg')}}" alt=""></div>
                                </div>
                            </div>

                            <div class="light-bg-d9d9d9 h-32 rounded-md">
                                <div class="flex items-center p-3 justify-between">
                                    <div class="bg-red-900 py-1 px-3 bg-opacity-30 rounded-full">
                                        <p class="text-red-400 text-sm">Code Review</p>
                                    </div>
                                    <div class="">
                                        <div class="dropdown-wrapper"
                                            style="position: relative; display: inline-block;">
                                            <img src="{{asset('assets/dots-vertical.svg')}}" class="dots-toggle"
                                                style="cursor: pointer; width: 24px;" />
                                            <div class="custom-dropdown"
                                                style="display: none; position: absolute; width: 120px; right: 35; background: #282828; border-radius: 4px;">
                                                <div class="dropdown-option" style="padding: 8px; cursor: pointer;">
                                                    Edit</div>
                                                <div class="dropdown-option" style="padding: 8px; cursor: pointer;">
                                                    Delete</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-3">
                                    <p class="text-sm text-gray-400">Review Javascript code</p>
                                </div>
                                <div class="flex items-center p-3 justify-between">
                                    <div class="openTicketChatModal flex gap-1 items-center text-sm text-gray-300"><img
                                            src="{{asset('assets/message-dots.svg')}}">12</div>
                                    <div><img src="{{asset('assets/Avatar (4).svg')}}" alt=""></div>
                                </div>
                            </div>

                            <div class="p-3">
                                <p class="openPaymentModal text-sm text-gray-400">+ Add New Page</p>
                            </div>

                        </div>

                        <div>
                            <div class="flex justify-between items-center mb-10">
                                <h3>In Progress</h3>
                                <div class="dropdown-wrapper" style="position: relative; display: inline-block;">
                                    <img src="{{asset('assets/dots-vertical.svg')}}" class="dots-toggle"
                                        style="cursor: pointer; width: 24px;" />
                                    <div class="custom-dropdown"
                                        style="display: none; position:absolute; width: 120px; right: 35; background: #282828;  border-radius: 4px;">
                                        <div class="openPaymentModal dropdown-option"
                                            style="padding: 8px; cursor: pointer;">New Page</div>
                                        <div class="dropdown-option" style="padding: 8px; cursor: pointer;">Edit</div>
                                        <div class="dropdown-option" style="padding: 8px; cursor: pointer;">Delete
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="light-bg-d9d9d9 h-32 rounded-md mb-7">
                                <div class="flex items-center p-3 justify-between">
                                    <div class="bg-cyan-900 py-1 px-3 bg-opacity-30 rounded-full">
                                        <p class="text-cyan-400 text-sm">Dashboard</p>
                                    </div>
                                    <div class="">
                                        <div class="dropdown-wrapper"
                                            style="position: relative; display: inline-block;">
                                            <img src="{{asset('assets/dots-vertical.svg')}}" class="dots-toggle"
                                                style="cursor: pointer; width: 24px;" />
                                            <div class="custom-dropdown"
                                                style="display: none; position: absolute; width: 120px; right: 35; background: #282828; border-radius: 4px;">
                                                <div class="dropdown-option" style="padding: 8px; cursor: pointer;">
                                                    Edit</div>
                                                <div class="dropdown-option" style="padding: 8px; cursor: pointer;">
                                                    Delete</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-3">
                                    <p class="text-sm text-gray-400">Review completed Apps</p>
                                </div>
                                <div class="flex items-center p-3 justify-between">
                                    <div class="openTicketChatModal flex gap-1 items-center text-sm text-gray-300"><img
                                            src="{{asset('assets/message-dots.svg')}}">12</div>
                                    <div><img src="{{asset('assets/Avatar (4).svg')}}" alt=""></div>
                                </div>
                            </div>
                            <div class="light-bg-d9d9d9 h-32 rounded-md">
                                <div class="flex items-center p-3 justify-between">
                                    <div class="bg-yellow-900 py-1 px-3 bg-opacity-30 rounded-full">
                                        <p class="text-yellow-500 text-sm">Image</p>
                                    </div>
                                    <div class="">
                                        <div class="dropdown-wrapper"
                                            style="position: relative; display: inline-block;">
                                            <img src="{{asset('assets/dots-vertical.svg')}}" class="dots-toggle"
                                                style="cursor: pointer; width: 24px;" />
                                            <div class="custom-dropdown"
                                                style="display: none; position: absolute; width: 120px; right: 35; background: #282828; border-radius: 4px;">
                                                <div class="dropdown-option" style="padding: 8px; cursor: pointer;">
                                                    Edit</div>
                                                <div class="dropdown-option" style="padding: 8px; cursor: pointer;">
                                                    Delete</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-3">
                                    <p class="text-sm text-gray-400">Research FAQ page UX</p>
                                </div>
                                <div class="flex items-center p-3 justify-between">
                                    <div class="openTicketChatModal flex gap-1 items-center text-sm text-gray-300"><img
                                            src="{{asset('assets/message-dots.svg')}}">12</div>
                                    <div><img src="{{asset('assets/Avatar (4).svg')}}" alt=""></div>
                                </div>
                            </div>
                            <div class="p-3">
                                <p class="openPaymentModal text-sm text-gray-400">+ Add New Page</p>
                            </div>
                        </div>

                        <div>
                            <div class="flex justify-between items-center mb-10">
                                <h3>In Review</h3>
                                <div class="dropdown-wrapper" style="position: relative; display: inline-block;">
                                    <img src="{{asset('assets/dots-vertical.svg')}}" class="dots-toggle"
                                        style="cursor: pointer; width: 24px;" />
                                    <div class="custom-dropdown"
                                        style="display: none; position:absolute; width: 120px; right: 35; background: #282828;  border-radius: 4px;">
                                        <div class="openPaymentModal dropdown-option"
                                            style="padding: 8px; cursor: pointer;">New Page</div>
                                        <div class="dropdown-option" style="padding: 8px; cursor: pointer;">Edit</div>
                                        <div class="dropdown-option" style="padding: 8px; cursor: pointer;">Delete
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="light-bg-d9d9d9 h-32 rounded-md mb-7">
                                <div class="flex items-center p-3 justify-between">
                                    <div class="bg-gray-400 py-1 px-3 bg-opacity-10 rounded-full">
                                        <p class="text-gray-400 text-sm">App</p>
                                    </div>
                                    <div class="">
                                        <div class="dropdown-wrapper"
                                            style="position: relative; display: inline-block;">
                                            <img src="{{asset('assets/dots-vertical.svg')}}" class="dots-toggle"
                                                style="cursor: pointer; width: 24px;" />
                                            <div class="custom-dropdown"
                                                style="display: none; position: absolute; width: 120px; right: 35; background: #282828; border-radius: 4px;">
                                                <div class="dropdown-option" style="padding: 8px; cursor: pointer;">
                                                    Edit</div>
                                                <div class="dropdown-option" style="padding: 8px; cursor: pointer;">
                                                    Delete</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-3">
                                    <p class="text-sm text-gray-400">Forms & tables section</p>
                                </div>
                                <div class="flex items-center p-3 justify-between">
                                    <div class="openTicketChatModal flex gap-1 items-center text-sm text-gray-300"><img
                                            src="{{asset('assets/message-dots.svg')}}">12</div>
                                    <div><img src="{{asset('assets/Avatar (4).svg')}}" alt=""></div>
                                </div>
                            </div>
                            <div class="light-bg-d9d9d9 h-32 rounded-md">
                                <div class="flex items-center p-3 justify-between">
                                    <div class="bg-violet-900 py-1 px-3 bg-opacity-30 rounded-full">
                                        <p class="text-violet-400 text-sm">Charts & Map</p>
                                    </div>
                                    <div class="">
                                        <div class="dropdown-wrapper"
                                            style="position: relative; display: inline-block;">
                                            <img src="{{asset('assets/dots-vertical.svg')}}" class="dots-toggle"
                                                style="cursor: pointer; width: 24px;" />
                                            <div class="custom-dropdown"
                                                style="display: none; position: absolute; width: 120px; right: 35; background: #282828; border-radius: 4px;">
                                                <div class="dropdown-option" style="padding: 8px; cursor: pointer;">
                                                    Edit</div>
                                                <div class="dropdown-option" style="padding: 8px; cursor: pointer;">
                                                    Delete</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-3">
                                    <p class="text-sm text-gray-400">Completed charts & maps</p>
                                </div>
                                <div class="flex items-center p-3 justify-between">
                                    <div class="openTicketChatModal flex gap-1 items-center text-sm text-gray-300"><img
                                            src="{{asset('assets/message-dots.svg')}}">12</div>
                                    <div><img src="{{ asset('assets/Avatar (4).svg') }}" alt=""></div>
                                </div>
                            </div>
                            <div class="p-3">
                                <p class="openPaymentModal text-sm text-gray-400">+ Add New Page</p>
                            </div>
                        </div>

                        <div>
                            <div class="flex justify-between items-center mb-10">
                                <h3>Done</h3>
                                <div class="dropdown-wrapper" style="position: relative; display: inline-block;">
                                    <img src="{{ asset('assets/dots-vertical.svg') }}" class="dots-toggle"
                                        style="cursor: pointer; width: 24px;" />
                                    <div class="custom-dropdown"
                                        style="display: none; position:absolute; width: 120px; right: 0; background: #282828;  border-radius: 4px;">
                                        <div class="openPaymentModal dropdown-option"
                                            style="padding: 8px; cursor: pointer;">New Page</div>
                                        <div class="dropdown-option" style="padding: 8px; cursor: pointer;">Edit</div>
                                        <div class="dropdown-option" style="padding: 8px; cursor: pointer;">Delete
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="light-bg-d9d9d9 h-32 rounded-md">
                                <div class="flex items-center p-3 justify-between">
                                    <div class="bg-green-900 py-1 px-3 bg-opacity-30 rounded-full">
                                        <p class="text-green-500 text-sm">IOS App</p>
                                    </div>
                                    <div class="">
                                        <div class="dropdown-wrapper"
                                            style="position: relative; display: inline-block;">
                                            <img src="{{asset('assets/dots-vertical.svg')}}" class="dots-toggle"
                                                style="cursor: pointer; width: 24px;" />
                                            <div class="custom-dropdown"
                                                style="display: none; position: absolute; width: 120px; right: 0; background: #282828; border-radius: 4px;">
                                                <div class="dropdown-option" style="padding: 8px; cursor: pointer;">
                                                    Edit</div>
                                                <div class="dropdown-option" style="padding: 8px; cursor: pointer;">
                                                    Delete</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-3">
                                    <p class="text-sm text-gray-400">Food delivery ios app</p>
                                </div>
                                <div class="flex items-center p-3 justify-between">
                                    <div class="openTicketChatModal flex gap-1 items-center text-sm text-gray-300"><img
                                            src="{{asset('assets/message-dots.svg')}}">12</div>
                                    <div><img src="{{asset('assets/Avatar (4).svg')}}" alt=""></div>
                                </div>
                            </div>
                            <div class="p-3">
                                <p class="openPaymentModal text-sm text-gray-400">+ Add New Page</p>
                            </div>
                        </div>

                    </div>
                </section>

                <!-- Overview Cards -->

                <section class="alt-section hide">
                    <div class="flex justify-between ">
                        <div>
                            <h1 class="text-3xl font-bold light-text-gray-800 mb-10">Task Management</h1>
                        </div>
                        <div>
                            <img src="{{ asset('assets/Switch.svg') }}" alt="Switch View" id="switchBtn2">
                        </div>
                    </div>
                    <div class="grid grid-cols-1 lg:grid-cols-1 gap-6 mb-6">
                        <!-- User's Projects List Table -->
                        <div class="lg:col-span-2 light-bg-f5f5f5 light-bg-seo  rounded-xl shadow-sm">
                            <div class="flex items-center justify-between mb-4 p-6 flex-wrap gap-3">
                                <h2 class="text-xl font-semibold light-text-gray-800">Tasks List</h2>
                                <div class="flex items-center space-x-3">
                                    <div class="relative">
                                        <input type="text" placeholder="Search here"
                                            class="pl-10 pr-4 py-2 rounded-lg light-border-gray-300 focus:outline-none focus:ring-1 focus:ring-orange-500">
                                        <div
                                            class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="icon text-gray-400" viewBox="0 0 24 24">
                                                <circle cx="11" cy="11" r="8"></circle>
                                                <line x1="21" y1="21" x2="16.65" y2="16.65">
                                                </line>
                                            </svg>
                                        </div>
                                    </div>

                                    <div class="relative  flex  gap-3 inline-block">
                                        <!-- Button -->
                                        <select
                                            class="w-20 px-3 py-2 rounded-md text-sm
                                bg-white text-gray-800 border border-gray-300
                                dark:bg-[#121212] dark:text-gray-100 dark:border-gray-600
                                focus:outline-none focus:ring-2 focus:ring-orange-500">
                                            <option value="Filter">Filter</option>
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                        </select>
                                        <button id="openTaskModalBtn"
                                            class="openTaskModal light-bg-d7d7d7 text-white w-40 py-2 rounded-lg hover:light-bg-orange-700 dark:hover:bg-orange-600 transition-colors text-sm">
                                            Add New Tasks
                                        </button>


                                    </div>
                                </div>
                            </div>

                            <div class="overflow-x-auto w-full max-h-[75vh]">
                                <table class="table-fixed w-full border-collapse  ">
                                    <thead class="light-bg-d9d9d9">
                                        <tr>
                                            <th scope="col"
                                                class="w-[80px] px-4 py-2 text-left text-xs font-semibold text-white uppercase">
                                                <div class="flex items-center">
                                                    ID
                                                    <svg class="ml-1 w-4 h-4" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M7 8 L12 3 L17 8" /> <!-- Up chevron -->
                                                        <path d="M7 16 L12 21 L17 16" /> <!-- Down chevron -->
                                                    </svg>
                                                </div>
                                            </th>
                                            <th scope="col"
                                                class="w-[200px] px-4 py-2 text-left text-xs font-semibold text-white uppercase">
                                                <div class="flex items-center">
                                                    TASKS
                                                    <svg class="ml-1 w-4 h-4" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M7 8 L12 3 L17 8" /> <!-- Up chevron -->
                                                        <path d="M7 16 L12 21 L17 16" /> <!-- Down chevron -->
                                                    </svg>
                                                </div>
                                            </th>
                                            <th scope="col"
                                                class="w-[140px] px-4 py-2 text-left text-xs font-semibold text-white uppercase">
                                                <div class="flex items-center">
                                                    START DATE
                                                    <svg class="ml-1 w-4 h-4" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M7 8 L12 3 L17 8" /> <!-- Up chevron -->
                                                        <path d="M7 16 L12 21 L17 16" /> <!-- Down chevron -->
                                                    </svg>
                                                </div>
                                            </th>
                                            <th scope="col"
                                                class="w-[140px] px-4 py-2 text-left text-xs font-semibold text-white uppercase">
                                                <div class="flex items-center justify-between">
                                                    <span class="whitespace-nowrap">DEADLINE</span>
                                                    <div class="flex flex-col ml-10">
                                                        <svg class="ml-1 w-4 h-4" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="1.5"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path d="M7 8 L12 3 L17 8" /> <!-- Up chevron -->
                                                            <path d="M7 16 L12 21 L17 16" /> <!-- Down chevron -->
                                                        </svg>
                                                    </div>
                                                </div>
                                            </th>
                                            <th scope="col"
                                                class="w-[220px] px-4 py-2 text-left text-xs font-semibold text-white uppercase">
                                                <div class="flex items-center mr-10">
                                                    COMPLETED ON
                                                    <svg class="ml-1 w-4 h-4" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M7 8 L12 3 L17 8" /> <!-- Up chevron -->
                                                        <path d="M7 16 L12 21 L17 16" /> <!-- Down chevron -->
                                                    </svg>
                                                </div>
                                            </th>
                                            <th scope="col"
                                                class="w-[160px] px-4 py-2 text-left text-xs font-semibold text-white uppercase">
                                                <div class="flex items-center">
                                                    HOURS LOGGED
                                                    <svg class="ml-1 w-4 h-4" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M7 8 L12 3 L17 8" /> <!-- Up chevron -->
                                                        <path d="M7 16 L12 21 L17 16" /> <!-- Down chevron -->
                                                    </svg>
                                                </div>
                                            </th>

                                            <th scope="col"
                                                class="w-[180px] px-4 py-2 text-left text-xs font-semibold text-white uppercase">
                                                <div class="flex items-center">
                                                    ASSIGNED TO
                                                </div>
                                            </th>
                                            <th scope="col" class="w-[60px] px-4 py-2">
                                                <div class="flex items-center">

                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="light-bg-white light-bg-seo divide-y divide-gray-200">
                                        <!-- Row 1 -->
                                        <tr>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm font-medium light-text-gray-900">
                                                01</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm font-medium light-text-gray-900">Website SEO</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm light-text-gray-900">
                                                <div class="flex items-center gap-1">
                                                    <p>05-7-2024</p>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm light-text-gray-900">
                                                <div class="flex items-center gap-1">
                                                    <p>05-7-2024</p>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div>
                                                    <p>05-7-2024</p>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">
                                                <!-- <select class="status-select px-4 py-2 rounded-lg transition-colors w-32 text-green-500 bg-green-900 hover:bg-green-900">
                                                <option value="complete" selected>Complete</option>
                                                <option value="in process">In Process</option>
                                                <option value="delayed">Delayed</option>
                                                <option value="cancelled">Cancelled</option>
                                            </select> -->
                                                <p>10h 30mins</p>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm light-text-gray-900">
                                                <div class="flex items-center gap-1">
                                                    <img class="w-20 h-10" src="{{asset('assets/Avatar Group.svg')}}" alt="">
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <button
                                                    class="light-text-orange-500  rounded-full p-1 light-hover-text-orange-700 toggle-btn"
                                                    data-target="expand-01">
                                                    <svg width="20" height="20" viewBox="0 0 100 100"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <!-- Circular dark background -->
                                                        <circle cx="50" cy="50" r="50"
                                                            fill="#1c1c1c" />

                                                        <!-- Upward-facing chevron arrow -->
                                                        <path d="M40 55 L50 45 L60 55" fill="none" stroke="white"
                                                            stroke-width="4" stroke-linecap="round" />
                                                    </svg>

                                                </button>
                                            </td>
                                        </tr>
                                        <!-- Expandable Row (Sub-Header + Sub-Row) -->
                                        <tr id="expand-01" class="hidden light-text-black">
                                            <td colspan="7" class="px-6 py-4 ">
                                                <!-- Sub-table Head -->
                                                <div class="grid grid-cols-6  font-semibold light-text-black">
                                                    <div class="w-1/2">#</div>
                                                    <div class="flex items-center text-xs">
                                                        STATUS
                                                        <svg class="icon mr-10 w-4 h-4" viewBox="0 0 24 24"
                                                            fill="none" stroke="currentColor" stroke-width="1.5"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path d="M7 8 L12 3 L17 8" />
                                                            <path d="M7 16 L12 21 L17 16" />
                                                        </svg>
                                                    </div>
                                                    <div class="flex items-center text-xs">
                                                        ACTION
                                                        <svg class="icon ml-1 w-4 h-4" viewBox="0 0 24 24"
                                                            fill="none" stroke="currentColor" stroke-width="1.5"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path d="M7 8 L12 3 L17 8" />
                                                            <path d="M7 16 L12 21 L17 16" />
                                                        </svg>
                                                    </div>
                                                </div>



                                                <!-- Sub-table Row -->
                                                <div class="grid grid-cols-6 pt-2 mt-2 light-text-black">
                                                    <div class="w-1/2"></div>

                                                    <div>
                                                        <select
                                                            class="status-select px-4 py-2 rounded-lg transition-colors w-32 text-green-500 bg-green-900 hover:bg-green-900">
                                                            <option value="complete" selected>Complete</option>
                                                            <option value="in process">In Process</option>
                                                            <option value="delayed">Delayed</option>
                                                            <option value="cancelled">Cancelled</option>
                                                        </select>
                                                    </div>
                                                    <div class="flex items-center gap-2">

                                                        <img src="{{asset('assets/edit.svg')}}" alt="Action 2"
                                                            class="w-6 h-6  rounded-full p-1 bg-gray-500"
                                                            data-action="view-project" />

                                                        <img src="{{asset('assets/trash.svg')}}" alt="Action 3"
                                                            class="w-6 h-6 rounded-full p-1 bg-gray-500" />
                                                    </div>
                                                </div>

                                            </td>
                                        </tr>
                                        <!-- Row 2 -->
                                        <!-- <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium light-text-gray-900">01</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium light-text-gray-900">Website SEO</div>
                                            <div class="rounded-sm text-center w-20 light-bg-ea54547a">
                                                <div class="text-xs light-text-ff0000">High Priority</div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm light-text-gray-900">
                                            <div class="flex items-center gap-1">
                                                <img class="w-6 h-6" src="Avatar (2).svg" alt="">
                                                <p>John Doe</p>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm light-text-gray-900">
                                            <div class="flex items-center -space-x-2">
                                        <img class="w-8 h-8 rounded-full border-2 border-black" src="Avatar (3).svg" alt="Avatar 1">
                                        <img class="w-8 h-8 rounded-full border-2 border-black" src="Avatar (2).svg" alt="Avatar 2">
                                        <img class="w-8 h-8 rounded-full border-2 border-black" src="Avatar (1).svg" alt="Avatar 3">
                                        
                                        </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="w-52 bg-gray-200 rounded-full h-2.5">
                                                    <div class="bg-cyan-400 h-2.5 rounded-full" style="width: 69%"></div>
                                                </div>
                                                <span class="ml-2 text-sm light-text-gray-700">69%</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">
                                            <select class="status-select px-4 py-2 rounded-lg transition-colors w-32 text-green-500 bg-green-900 hover:bg-green-900">
                                                <option value="complete" selected>Complete</option>
                                                <option value="in process">In Process</option>
                                                <option value="delayed">Delayed</option>
                                                <option value="cancelled">Cancelled</option>
                                            </select>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <button class="light-text-orange-500  rounded-full p-1 light-hover-text-orange-700 toggle-btn" data-target="expand-02">
                                                <svg width="20" height="20" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                                                    Circular dark background -->
                                        <!-- <circle cx="50" cy="50" r="50" fill="#1c1c1c" />

                                                    Upward-facing chevron arrow
                                                    <path d="M40 55 L50 45 L60 55" fill="none" stroke="white" stroke-width="4" stroke-linecap="round" />
                                                </svg>

                                            </button>
                                        </td>
                                    </tr> -->
                                        <!-- Expandable Row (Sub-Header + Sub-Row) -->
                                        <!-- <tr id="expand-02" class="hidden light-text-black">
                                        <td colspan="7" class="px-6 py-4 "> -->
                                        <!-- Sub-table Head -->
                                        <!-- <div class="grid grid-cols-6  font-semibold light-text-black border-b border-gray-300">
                                                <div class="w-1/2">#</div>
                                                <div class="flex items-center text-xs">
                                                    AMOUNT
                                                    <svg class="icon mr-10 w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M7 8 L12 3 L17 8" />
                                                        <path d="M7 16 L12 21 L17 16" />
                                                    </svg>
                                                </div>
                                                <div class="flex items-center text-xs">
                                                    LEAD SOURCE
                                                    <svg class="icon ml-1 w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M7 8 L12 3 L17 8" />
                                                        <path d="M7 16 L12 21 L17 16" />
                                                    </svg>
                                                </div>
                                                <div class="flex items-center text-xs">
                                                    CURRENT PROJECT
                                                    <svg class="icon ml-1 w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M7 8 L12 3 L17 8" />
                                                        <path d="M7 16 L12 21 L17 16" />
                                                    </svg>
                                                </div>
                                                <div class="flex items-center text-xs">
                                                    MEMBERSHIP
                                                    <svg class="icon ml-1 w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M7 8 L12 3 L17 8" />
                                                        <path d="M7 16 L12 21 L17 16" />
                                                    </svg>
                                                </div>
                                                <div class="flex items-center text-xs">ACTION</div>
                                            </div> -->


                                        <!-- Sub-table Row -->
                                        <!-- <div class="grid grid-cols-6 pt-2 mt-2 light-text-black">
                                                <div class="w-1/2"></div>
                                                <div>$10,000</div>
                                                <div>Email Marketing</div>
                                                <div>Wiz speed Dashboard</div>
                                                <div>
                                                    <span class="light-bg-d7d7d7 px-2 py-1 rounded-md text-xs">Domain</span>
                                                    <span class="light-bg-d7d7d7 px-2 py-1 rounded-md text-xs">Hosting</span>
                                                    <span class="light-bg-d7d7d7 px-2 py-1 rounded-md text-xs">+3</span>
                                                </div>
                                                <div class="flex items-center gap-2">

                                                    <img src="document-download-DARK.svg" alt="Action 1" class="openModalBtn w-6 h-6 rounded-full p-1 bg-gray-500" />

                                                    <img src="edit.svg" alt="Action 2" class="w-6 h-6  rounded-full p-1 bg-gray-500" data-action="view-project" />

                                                    <img src="trash.svg" alt="Action 3" class="w-6 h-6 rounded-full p-1 bg-gray-500" />
                                                </div>
                                            </div>

                                        </td>
                                    </tr> -->
                                        <!-- Row 3 -->
                                        <!-- <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium light-text-gray-900">01</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium light-text-gray-900">Website SEO</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm light-text-gray-900">
                                            <div class="flex items-center gap-1">
                                                <img class="w-6 h-6" src="Avatar (3).svg" alt="">
                                                <p>John Doe</p>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm light-text-gray-900">
                                            <div class="flex items-center gap-1">
                                                <img class="w-20 h-10" src="Avatar Group.svg" alt="">
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="w-52 bg-gray-200 rounded-full h-2.5">
                                                    <div class="bg-yellow-500 h-2.5 rounded-full" style="width: 43%"></div>
                                                </div>
                                                <span class="ml-2 text-sm light-text-gray-700">43%</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">
                                            <select class="status-select px-4 py-2 rounded-lg transition-colors w-32 text-green-500 bg-green-900 hover:bg-green-900">
                                                <option value="complete" selected>Complete</option>
                                                <option value="in process">In Process</option>
                                                <option value="delayed">Delayed</option>
                                                <option value="cancelled">Cancelled</option>
                                            </select>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <button class="light-text-orange-500  rounded-full p-1 light-hover-text-orange-700 toggle-btn" data-target="expand-03">
                                                <svg width="20" height="20" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                                                    Circular dark background -->
                                        <!-- <circle cx="50" cy="50" r="50" fill="#1c1c1c" /> -->

                                        <!-- Upward-facing chevron arrow -->
                                        <!-- <path d="M40 55 L50 45 L60 55" fill="none" stroke="white" stroke-width="4" stroke-linecap="round" />
                                                </svg>

                                            </button>
                                        </td>
                                    </tr> -->
                                        <!-- Expandable Row (Sub-Header + Sub-Row) -->
                                        <!-- <tr id="expand-03" class="hidden light-text-black">
                                        <td colspan="7" class="px-6 py-4 "> -->
                                        <!-- Sub-table Head -->
                                        <!-- <div class="grid grid-cols-6  font-semibold light-text-black border-b border-gray-300">
                                                <div class="w-1/2">#</div>
                                                <div class="flex items-center text-xs">
                                                    AMOUNT
                                                    <svg class="icon mr-10 w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M7 8 L12 3 L17 8" />
                                                        <path d="M7 16 L12 21 L17 16" />
                                                    </svg>
                                                </div>
                                                <div class="flex items-center text-xs">
                                                    LEAD SOURCE
                                                    <svg class="icon ml-1 w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M7 8 L12 3 L17 8" />
                                                        <path d="M7 16 L12 21 L17 16" />
                                                    </svg>
                                                </div>
                                                <div class="flex items-center text-xs">
                                                    CURRENT PROJECT
                                                    <svg class="icon ml-1 w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M7 8 L12 3 L17 8" />
                                                        <path d="M7 16 L12 21 L17 16" />
                                                    </svg>
                                                </div>
                                                <div class="flex items-center text-xs">
                                                    MEMBERSHIP
                                                    <svg class="icon ml-1 w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M7 8 L12 3 L17 8" />
                                                        <path d="M7 16 L12 21 L17 16" />
                                                    </svg>
                                                </div>
                                                <div class="flex items-center text-xs">ACTION</div>
                                            </div> -->


                                        <!-- Sub-table Row -->
                                        <!-- <div class="grid grid-cols-6 pt-2 mt-2 light-text-black">
                                                <div class="w-1/2"></div>
                                                <div>$10,000</div>
                                                <div>Email Marketing</div>
                                                <div>Wiz speed Dashboard</div>
                                                <div>
                                                    <span class="light-bg-d7d7d7 px-2 py-1 rounded-md text-xs">Domain</span>
                                                    <span class="light-bg-d7d7d7 px-2 py-1 rounded-md text-xs">Hosting</span>
                                                    <span class="light-bg-d7d7d7 px-2 py-1 rounded-md text-xs">+3</span>
                                                </div>
                                                <div class="flex items-center gap-2">

                                                    <img src="document-download-DARK.svg" alt="Action 1" class="openModalBtn w-6 h-6 rounded-full p-1 bg-gray-500" />

                                                    <img src="edit.svg" alt="Action 2" class="w-6 h-6  rounded-full p-1 bg-gray-500" data-action="view-project" />

                                                    <img src="trash.svg" alt="Action 3" class="w-6 h-6 rounded-full p-1 bg-gray-500" />
                                                </div>
                                            </div>

                                        </td>
                                    </tr> -->


                                    </tbody>
                                </table>
                            </div>

                            <div id="filterDropdown-1"
                                class="hidden absolute w-32 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-50">
                                <div class="py-1" role="menu" aria-orientation="vertical">
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                        role="menuitem">Filter Option 1</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                        role="menuitem">Filter Option 2</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                        role="menuitem">Filter Option 3</a>
                                    <div class="border-t border-gray-100"></div>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                        role="menuitem">Reset Filters</a>
                                </div>
                            </div>
                            <div id="filterDropdown-2"
                                class="hidden absolute w-32 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-50">
                                <div class="py-1" role="menu" aria-orientation="vertical">
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                        role="menuitem">Filter Option 1</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                        role="menuitem">Filter Option 2</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                        role="menuitem">Filter Option 3</a>
                                    <div class="border-t border-gray-100"></div>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                        role="menuitem">Reset Filters</a>
                                </div>
                            </div>
                            <div id="filterDropdown-3"
                                class="hidden absolute w-32 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-50">
                                <div class="py-1" role="menu" aria-orientation="vertical">
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                        role="menuitem">Filter Option 1</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                        role="menuitem">Filter Option 2</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                        role="menuitem">Filter Option 3</a>
                                    <div class="border-t border-gray-100"></div>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                        role="menuitem">Reset Filters</a>
                                </div>
                            </div>
                            <div id="filterDropdown-4"
                                class="hidden absolute w-32 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-50">
                                <div class="py-1" role="menu" aria-orientation="vertical">
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                        role="menuitem">Filter Option 1</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                        role="menuitem">Filter Option 2</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                        role="menuitem">Filter Option 3</a>
                                    <div class="border-t border-gray-100"></div>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                        role="menuitem">Reset Filters</a>
                                </div>
                            </div>
                            <div id="filterDropdown-5"
                                class="hidden absolute w-32 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-50">
                                <div class="py-1" role="menu" aria-orientation="vertical">
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                        role="menuitem">Filter Option 1</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                        role="menuitem">Filter Option 2</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                        role="menuitem">Filter Option 3</a>
                                    <div class="border-t border-gray-100"></div>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                        role="menuitem">Reset Filters</a>
                                </div>
                            </div>
                            <div id="filterDropdown-6"
                                class="hidden absolute w-32 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-50">
                                <div class="py-1" role="menu" aria-orientation="vertical">
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                        role="menuitem">Filter Option 1</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                        role="menuitem">Filter Option 2</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                        role="menuitem">Filter Option 3</a>
                                    <div class="border-t border-gray-100"></div>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                        role="menuitem">Reset Filters</a>
                                </div>
                            </div>
                            


                            <!-- Table Pagination -->
                            <div
                                class="flex items-center justify-between mt-4 p-6 text-sm light-text-gray-600 flex-wrap gap-2">
                                <div>
                                    <span>Showing 1 to 3 of 100 entries</span>
                                    <div class="relative inline-block">
                                        <!-- Button -->
                                        <select
                                            class="w-20 px-3 py-2 rounded-md text-sm
                                bg-white text-gray-800 border border-gray-300
                                dark:bg-[#121212] dark:text-gray-100 dark:border-gray-600
                                focus:outline-none focus:ring-2 focus:ring-orange-500">
                                            <option value="Filter">Filter</option>
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                        </select>


                                    </div>
                                </div>
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
                            </div>
                        </div>

                    </div>
            
                </section>

                <!-- Bottom Cards: Need Help & Free Consulting -->

            </div>

        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const body = document.body;
            const knowledgeButton = document.getElementById('knowledgeButton');
            const filterButton = document.getElementById('filterButton');
            const filterDropdown = document.getElementById('filterDropdown');

            // ✅ Dropdown toggle
            const filterButtons = document.querySelectorAll('[id^="filterButton"]');
            const filterDropdowns = document.querySelectorAll('[id^="filterDropdown"]');

            document.querySelectorAll('.toggle-btn').forEach(button => {
                button.addEventListener('click', () => {
                    const targetId = button.getAttribute('data-target');
                    const targetRow = document.getElementById(targetId);
                    targetRow.classList.toggle('hidden');

                    // Optionally toggle button text
                    // button.textContent =
                    // targetRow.classList.contains('hidden') ? 'Show More' : 'Show Less';
                });
            });

            filterButtons.forEach((button, index) => {
                button.addEventListener('click', (e) => {
                    e.stopPropagation();
                    filterDropdowns[index].classList.toggle('hidden');
                });
            });

            document.addEventListener('click', () => {
                filterDropdowns.forEach(dropdown => {
                    dropdown.classList.add('hidden');
                });
            });

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

        document.addEventListener("DOMContentLoaded", function() {
            // Toggle dropdown on click
            document.querySelectorAll(".dots-toggle").forEach((img) => {
                img.addEventListener("click", function(e) {
                    const dropdown = this.nextElementSibling;

                    // Close any open dropdowns
                    document.querySelectorAll(".custom-dropdown").forEach((dd) => {
                        if (dd !== dropdown) dd.style.display = "none";
                    });

                    // Toggle the clicked one
                    dropdown.style.display = dropdown.style.display === "block" ? "none" : "block";

                    // Prevent click from bubbling to document
                    e.stopPropagation();
                });
            });

            // Handle option click (can customize this as needed)
            document.querySelectorAll(".dropdown-option").forEach((option) => {
                option.addEventListener("click", function() {
                    //("Selected: " + this.textContent);
                    // Close the parent dropdown
                    this.closest(".custom-dropdown").style.display = "none";
                });
            });

            // Close dropdowns on outside click
            document.addEventListener("click", function() {
                document.querySelectorAll(".custom-dropdown").forEach((dd) => {
                    dd.style.display = "none";
                });
            });
        });

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

            const newTaskModal = document.getElementById('newTaskModal');
            const closeNewTaskModal = document.getElementById('closeNewTaskModal');
            const cancelTask = document.getElementById('cancelTask');
            const taskForm = document.getElementById('taskForm');
            const openTaskButtons = document.querySelectorAll('.openTaskModal');

            // Ticket Modal Handlers
            openTaskButtons.forEach(btn => {
                btn.addEventListener('click', () => newTaskModal.classList.remove('hidden'));
            });
            closeNewTaskModal.addEventListener('click', () => newTaskModal.classList.add('hidden'));
            cancelTask.addEventListener('click', () => newTaskModal.classList.add('hidden'));
            taskForm.addEventListener('submit', (e) => {
                e.preventDefault();
                console.log('Task form submitted');
                newTaskModal.classList.add('hidden');
            });

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

            const leftSection = document.getElementById('leftSection');
            const rightSection = document.getElementById('rightSection');
            const popupModal = document.getElementById('popupModal');
            const rolePopupModal = document.getElementById('rolePopupModal'); // ✅ New popup modal for roles

            const openRolePopupBtn = document.getElementById('openRolePopup'); // ✅ Button to open role popup
            const closeRolePopupBtn = document.getElementById('rolePopupClose'); // ✅ Close
            const rolePopupConfirmBtn = document.getElementById(
            'rolePopupConfirm'); // ✅ Confirm button for role popup


            const openPopupBtn = document.getElementById('openPopup');
            const closePopupBtn = document.getElementById('closePopup');
            const confirmPopupBtn = document.getElementById('confirmPopup');
            const backToLeftBtn = document.getElementById('backToLeft'); // ✅ New button

            // Show popup when button in left section is clicked
            //openPopupBtn.addEventListener('click', () => {
            //  popupModal.classList.remove('hidden');
            //});

            // Show popup when button in left section is clicked
            //openRolePopupBtn.addEventListener('click', () => {
            //  rolePopupModal.classList.remove('hidden');
            //});

            // Close popup without changes
            //closePopupBtn.addEventListener('click', () => {
            //  popupModal.classList.add('hidden');
            //});

            // Close popup without changes
            //closeRolePopupBtn.addEventListener('click', () => {
            //  rolePopupModal.classList.add('hidden');
            //});

            // Confirm in popup → switch to right section
            //confirmPopupBtn.addEventListener('click', (e) => {
            //  e.preventDefault(); // Prevent form submit/page reload
            //  leftSection.style.display = 'none';
            //  rightSection.style.display = 'block';
            //  popupModal.classList.add('hidden');
            //});

            // Back to left section
            backToLeftBtn.addEventListener('click', () => {
                rightSection.style.display = 'none';
                leftSection.style.display = 'block';
            });

            // Close popup when clicking outside of it
            window.addEventListener('click', (e) => {
                if (e.target === popupModal) {
                    popupModal.classList.add('hidden');
                }
            });



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

                    );

                    // Highlight its parent wrapper
                    const wrapper = activeButton.closest('.tab-wrapper');
                    if (wrapper) {
                        wrapper.classList.add('active', 'bg-gray-tab');
                    }
                }
            }


            // Use event delegation for dynamic eye buttons
            document.addEventListener('click', function(e) {
                // Check if clicked element or its parent has the action attribute
                const eyeBtn = e.target.closest('[data-action="view-project"]');

                if (eyeBtn) {
                    e.preventDefault();
                    console.log('Eye button clicked');

                    try {
                        const row = eyeBtn.closest('tr');
                        if (!row) {
                            console.error('Row not found for clicked button');
                            return;
                        }

                        // Debugging point 3
                        console.log('Row found:', row);

                        // Get all data from the row
                        const projectName = row.querySelector('td:nth-child(2) div:first-child')
                            ?.textContent || 'Website SEO';
                        const priorityElement = row.querySelector('.light-bg-ea54547a');
                        const priority = priorityElement ? priorityElement.textContent.trim() :
                            'High Priority'; // Default added for safety

                        // You need to adjust these selectors to accurately pull from your table structure
                        // Assuming progress, status, dates, and price are in specific <td>s or have unique identifiers
                        const progressValue = row.querySelector('td:nth-child(6) span:last-child')
                            ?.textContent?.replace('Progress ', '') || '78%';
                        const statusValue = row.querySelector('td:nth-child(7) span:last-child')
                            ?.textContent?.replace('STATUS ', '') || 'InProgress';
                        const startDateValue = row.querySelector('td:nth-child(4)')?.textContent?.trim() ||
                            '05-7-2024';
                        const deadlineValue = row.querySelector('td:nth-child(5)')?.textContent?.trim() ||
                            '05-7-2024';
                        const priceValue = row.querySelector('td:nth-child(3) span:last-child')?.textContent
                            ?.replace('PRICE ', '') || '$4000';


                        // Debugging point 4
                        console.log('Data extracted:', {
                            projectName,
                            priority,
                            progressValue,
                            statusValue,
                            startDateValue,
                            deadlineValue,
                            priceValue
                        });

                        // Update modal content for the Overview tab
                        // Ensure 'modal' is in scope, if it wasn't already from the top of the function
                        // const modal = document.getElementById('projectModal'); // Uncomment if modal isn't global to this scope
                        if (!modal) {
                            console.error('Modal element not found during update!');
                            return;
                        }

                        modal.querySelector('h2').textContent = projectName;
                        const modalPriorityBadge = modal.querySelector(
                        '.text-xs.font-medium.rounded'); // Target the badge specifically

                        if (modalPriorityBadge) {
                            modalPriorityBadge.textContent = priority;
                            // You might want to update the background/text colors based on priority here too
                            // Example: if (priority === 'High Priority') { modalPriorityBadge.classList.add('dark:bg-red-900', 'dark:text-red-200'); }
                            // You'll need to manage the class removals/additions based on the actual priority string
                        }


                        // Update progress, status, start date, deadline, price in the overview tab
                        const overviewContent = document.getElementById('overviewContent');
                        if (overviewContent) {

                            // --- CORRECTED PRICE SPAN SELECTION ---
                            const priceSpan = Array.from(overviewContent.querySelectorAll('span')).find(
                                el =>
                                el.textContent.includes('PRICE') && el.closest('.flex.items-center')
                            );
                            if (priceSpan) {
                                priceSpan.textContent = `PRICE ${priceValue}`;
                            } else {
                                console.warn(
                                    'Price span with "PRICE" text or its parent not found for update.');
                            }
                            // --- END CORRECTED PRICE SPAN SELECTION ---


                            const statusSpan = Array.from(overviewContent.querySelectorAll(
                                '.flex.items-center span')).find(el => el.textContent.includes(
                                'STATUS'));
                            if (statusSpan) {
                                statusSpan.textContent = `STATUS ${statusValue}`;
                            }



                            const deadlineSpan = Array.from(overviewContent.querySelectorAll(
                                '.flex.items-center span')).find(el => el.textContent.includes(
                                'DEADLINE'));
                            if (deadlineSpan) {
                                deadlineSpan.textContent = `DEADLINE ${deadlineValue}`;
                            }
                        } else {
                            console.error('Overview content element not found!');
                            return;
                        }

                        // Show modal
                        modal.classList.remove('hidden');
                        document.body.style.overflow = 'hidden';

                        // Ensure the 'Overview' tab is active when the modal opens
                        showTab('overview');

                    } catch (error) {
                        console.error('Error opening modal:', error);
                    }
                }
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

        // document.getElementById("switchBtn").addEventListener("click", function() {
        //     document.querySelector(".main-section").classList.toggle("hide");
        //     document.querySelector(".alt-section").classList.toggle("show");
        // });

        // document.getElementById("switchBtn2").addEventListener("click", function() {
        //     document.querySelector(".alt-section").classList.toggle("hide");
        //     document.querySelector(".main-section").classList.toggle("show");
        // });

        document.getElementById("switchBtn").addEventListener("click", function () {
            document.querySelector(".main-section").classList.add("hide");
            document.querySelector(".main-section").classList.remove("show");

            document.querySelector(".alt-section").classList.remove("hide");
            document.querySelector(".alt-section").classList.add("show");
        });

        document.getElementById("switchBtn2").addEventListener("click", function () {
            document.querySelector(".alt-section").classList.add("hide");
            document.querySelector(".alt-section").classList.remove("show");

            document.querySelector(".main-section").classList.remove("hide");
            document.querySelector(".main-section").classList.add("show");
        });


        document.addEventListener('DOMContentLoaded', () => {
            // Ticket Modal Elements
            const ticketModal = document.getElementById('ticketModal');
            const closeTicketModal = document.getElementById('closeTicketModal');
            const cancelTicket = document.getElementById('cancelTicket');
            const ticketForm = document.getElementById('ticketForm');
            const openTicketButtons = document.querySelectorAll('.openTicketModal');

            // Payment Modal Elements
            const paymentModal = document.getElementById('paymentModal');
            const closePaymentModal = document.getElementById('closePaymentModal');
            const cancelPayment = document.getElementById('cancelPayment');
            const paymentForm = document.getElementById('paymentForm');
            const openPaymentButtons = document.querySelectorAll('.openPaymentModal');

            // Section Switchers
            const leftSection = document.getElementById('leftSection');
            const rightSection = document.getElementById('rightSection');
            const switchImage = document.getElementById('switchImage');
            const backToLeft = document.getElementById('backToLeft');

            // Ticket Chat Modal
            const ticketChatModal = document.getElementById('ticketChatModal');
            const openTicketChatButtons = document.querySelectorAll('.openTicketChatModal');
            const closeTicketChatModal = document.getElementById('closeTicketChatModal');

            // Open chat modal from multiple triggers
            openTicketChatButtons.forEach(btn => {
                btn.addEventListener('click', () => {
                    ticketChatModal.classList.remove('hidden');
                    ticketChatModal.classList.add('flex'); // optional if you're using flex layout
                });
            });

            // Close chat modal
            closeTicketChatModal?.addEventListener('click', () => {
                ticketChatModal.classList.add('hidden');
                ticketChatModal.classList.remove('flex');
            });

            // Optional: outside click closes chat modal
            window.addEventListener('click', (e) => {
                if (e.target === ticketChatModal) {
                    ticketChatModal.classList.add('hidden');
                    ticketChatModal.classList.remove('flex');
                }
            });

            // Open Ticket Modal
            openTicketButtons.forEach(btn => {
                btn.addEventListener('click', () => ticketModal.classList.remove('hidden'));
            });

            // Close Ticket Modal
            closeTicketModal?.addEventListener('click', () => ticketModal.classList.add('hidden'));
            cancelTicket?.addEventListener('click', () => ticketModal.classList.add('hidden'));

            // Ticket Form Submit -> Close Ticket Modal, Open Payment Modal
            ticketForm?.addEventListener('submit', (e) => {
                e.preventDefault();
                console.log('Ticket form submitted');

                // Close ticket modal
                ticketModal.classList.add('hidden');

                // Open payment modal
                paymentModal.classList.remove('hidden');
                paymentModal.classList.add('flex'); // optional
            });

            // Open Payment Modal (directly from any element with class .openPaymentModal)
            openPaymentButtons.forEach(button => {
                button.addEventListener('click', () => {
                    paymentModal.classList.remove('hidden');
                    paymentModal.classList.add('flex');
                });
            });

            // Close Payment Modal
            closePaymentModal?.addEventListener('click', () => {
                paymentModal.classList.add('hidden');
                paymentModal.classList.remove('flex');
            });

            cancelPayment?.addEventListener('click', () => {
                paymentModal.classList.add('hidden');
                paymentModal.classList.remove('flex');
            });

            // Outside Click Closes Modals
            window.addEventListener('click', (e) => {
                if (e.target === ticketModal) ticketModal.classList.add('hidden');
                if (e.target === paymentModal) paymentModal.classList.add('hidden');
            });

            // Section Switching (click events with data attributes)
            document.addEventListener('click', (e) => {
                if (e.target.closest('[data-switch-right]')) {
                    e.preventDefault();
                    leftSection?.classList.add('hidden');
                    rightSection?.classList.remove('hidden');
                }

                if (e.target.closest('[data-back-left]')) {
                    e.preventDefault();
                    rightSection?.classList.add('hidden');
                    leftSection?.classList.remove('hidden');
                }
            });
        });

        function updateSelectStyle(selectElement) {
            const value = selectElement.value;

            // Reset base styles
            selectElement.className = "status-select px-4 py-2 rounded-lg transition-colors w-32";

            // Apply based on value
            switch (value) {
                case "complete":
                    selectElement.classList.add("bg-green-900", "hover:bg-green-900", "text-green-500");
                    break;
                case "in process":
                    selectElement.classList.add("bg-cyan-900", "hover:bg-cyan-900", "text-cyan-500");
                    break;
                case "delayed":
                    selectElement.classList.add("bg-yellow-700", "hover:bg-yellow-700", "text-yellow-500");
                    break;
                case "cancelled":
                    selectElement.classList.add("bg-red-800", "hover:bg-red-800", "text-red-500");
                    break;
            }
        }

        // On DOM ready: initialize all
        window.addEventListener("DOMContentLoaded", function() {
            const selects = document.querySelectorAll('.status-select');
            selects.forEach(select => {
                updateSelectStyle(select); // Apply default style
                select.addEventListener('change', () => updateSelectStyle(select)); // Watch for changes
            });
        });
    </script>


    <div id="projectModal"
        class="fixed inset-0 bg-black light-bg-000000 bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="light-bg-white  rounded-xl  w-full max-w-4xl max-h-[90vh] overflow-y-auto shadow-xl">

            <div class="flex justify-between items-start mb-6">

                <div class="p-6">
                    <h2 class="text-2xl font-bold light-text-black mb-1">Website SEO</h2>
                    <span
                        class="text-xs font-medium rounded px-2 py-1 light-bg-ea54547a light-text-ff0000 dark:bg-red-900 dark:text-red-200">High
                        Priority</span>
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
                <div class="hidden md:flex border-b px-6 light-border-gray-200 dark:border-gray-700  mb-10">
                    <!-- Your existing desktop tabs structure -->
                    <!-- Tab 1: Overview -->
                    <div
                        class="flex items-center active px-2 py-1 justify-center rounded-sm hover:rounded-md light-hover-bg-gray-300 tab-wrapper">
                        <img class="w-4 h-4 mb-2" src="category.png" alt="">
                        <button class="tab-btn  pb-2 px-2  " data-tab="overview">Overview</button>
                    </div>
                    <!-- Other tabs... -->
                    <!-- Tab 2: Notes -->
                    <div
                        class="flex items-center px-2 py-1 justify-center rounded-sm hover:rounded-md light-hover-bg-gray-300 tab-wrapper">
                        <img class="w-4 h-4 mb-2" src="fi_839860.png" alt="">
                        <button class="tab-btn pb-2 px-2 font-medium " data-tab="notes">Notes</button>
                    </div>

                    <!-- Tab 3: Uploaded Document -->
                    <div
                        class="flex items-center px-2 py-1 justify-center rounded-sm hover:rounded-md light-hover-bg-gray-300 tab-wrapper">
                        <img class="w-4 h-4 mb-2" src="document.png" alt="">
                        <button
                            class="tab-btn mb-2 px-2 font-medium light-text-gray-500 dark:text-gray-400 hover:light-text-gray-700 dark:hover:text-gray-300"
                            data-tab="uploadedDocument">Uploaded Document</button>
                    </div>

                    <!-- Tab 4: Add Credentials -->
                    <div
                        class="flex items-center px-2 py-1 justify-center rounded-sm hover:rounded-md light-hover-bg-gray-300 tab-wrapper">
                        <img class="w-4 h-4 mb-2" src="fi_1332646.png" alt="">
                        <button
                            class="tab-btn pb-2 px-2 font-medium light-text-gray-500 dark:text-gray-400 hover:light-text-gray-700 dark:hover:text-gray-300"
                            data-tab="addCredentials">Add Credentials</button>
                    </div>

                    <!-- Tab 5: Reports -->
                    <div
                        class="flex items-center px-2 py-1 justify-center rounded-sm hover:rounded-md light-hover-bg-gray-300 tab-wrapper">
                        <img class="w-4 h-4 mb-2" src="dociment.png" alt="">
                        <button
                            class="tab-btn pb-2 px-2 font-medium light-text-gray-500 dark:text-gray-400 hover:light-text-gray-700 dark:hover:text-gray-300"
                            data-tab="reports">Reports</button>
                    </div>
                </div>

                <!-- Mobile Slider View -->
                <div class="md:hidden overflow-x-auto whitespace-nowrap py-4 scrollbar-hide">
                    <div class="inline-flex space-x-8 px-4">
                        <!-- Tab 1: Overview -->
                        <div class="flex flex-col active items-center">
                            <img class="w-5 h-5" src="category.png" alt="">
                            <button
                                class="tab-btn  pt-2 font-medium light-text-orange-500 dark:text-orange-400 border-b-2 light-border-orange-500 dark:border-orange-400"
                                data-tab="overview">Overview</button>
                        </div>

                        <!-- Tab 2: Notes -->
                        <div class="flex flex-col items-center">
                            <img class="w-5 h-5" src="fi_839860.png" alt="">
                            <button
                                class="tab-btn pt-2 font-medium light-text-gray-500 dark:text-gray-400 hover:light-text-gray-700 dark:hover:text-gray-300"
                                data-tab="notes">Notes</button>
                        </div>

                        <!-- Tab 3: Uploaded Document -->
                        <div class="flex flex-col items-center">
                            <img class="w-5 h-5" src="document.png" alt="">
                            <button
                                class="tab-btn pt-2 font-medium light-text-gray-500 dark:text-gray-400 hover:light-text-gray-700 dark:hover:text-gray-300"
                                data-tab="uploadedDocument">Uploaded</button>
                        </div>

                        <!-- Tab 4: Add Credentials -->
                        <div class="flex flex-col items-center">
                            <img class="w-5 h-5" src="fi_1332646.png" alt="">
                            <button
                                class="tab-btn pt-2 font-medium light-text-gray-500 dark:text-gray-400 hover:light-text-gray-700 dark:hover:text-gray-300"
                                data-tab="addCredentials">Credentials</button>
                        </div>

                        <!-- Tab 5: Reports -->
                        <div class="flex flex-col items-center">
                            <img class="w-5 h-5" src="dociment.png" alt="">
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
                    <div class="mb-8">

                        <div class="space-y-3">
                            <div class="flex text-left gap-2">
                                <img src="money.png" alt="">
                                <span class="light-text-black"> PRICE $4000</span>
                            </div>
                            <div class="flex text-left gap-2">
                                <img src="notification-status.png" alt="">
                                <span class="light-text-black"> STATUS InProgress</span>
                            </div>
                        </div>
                    </div>
                    <div class="mb-8">
                        <div class="space-y-3">
                            <div class="flex items-center gap-2">
                                <img src="clock.png" alt="">
                                <span class="light-text-black"> START DATE 05-7-2024</span>
                            </div>

                            <div class="flex items-center gap-2">
                                <img src="timer.png" alt="">
                                <span class="light-text-black"> DEADLINE 05-7-2024</span>
                            </div>
                        </div>
                    </div>
                </div>



            </div>

            <div id="notesContent" class="tab-content hidden">
                <div class="flex justify-between items-center px-8 mb-4 gap-4">
                    <h3 class="justify-start light-text-black text-2xl">WIZSPEED Team Notes</h3>
                    <div class="flex gap-2">
                        <div class="relative w-full max-w-xs">
                            <input type="text" placeholder="Search here"
                                class="block w-full mr-10 px-4 py-2  
                    bg-transparent border border-gray-200 dark:text-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 dark:focus:ring-orange-400">
                            <svg class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 light-text-gray-400 dark:text-gray-500"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <button
                            class="flex items-center px-4 py-2 bg-transparent border border-gray-200 light-text-gray-700 dark:text-gray-300 rounded-lg hover:light-bg-gray-300 dark:hover:bg-gray-600">
                            Filters
                            <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="overflow-x-auto ">
                    <table class="min-w-full divide-y bg-transparent">
                        <thead class="bg-gray-500">
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
                                        <span>ACTION</span>
                                        <svg class="ml-1 w-3 h-3" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path>
                                        </svg>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-transparent light-border-gray2  ">
                            <tr class="border-2 light-border-gray2 ">
                                <td class="px-6 py-4 whitespace-nowrap text-sm light-text-black">2-4-2025</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm light-text-black">Website SEO</td>
                                <td class="px-6 py-4 text-sm light-text-black">The content draft is under review.
                                    Please provide any additional content by end of this wee</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full light-bg-green-100 light-text-green-800 dark:bg-green-900 dark:text-green-200">Low</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button
                                        class="light-text-indigo-600 hover:light-text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300 mr-2">
                                        <img src="eye.png" alt="eye" class="bg-gray-200 p-1 rounded-full">
                                    </button>
                                    <button
                                        class="light-text-red-600 hover:light-text-red-900 dark:text-red-400 dark:hover:text-red-300">
                                        <img src="trash.png" alt="eye" class="bg-gray-200 p-1 rounded-full">
                                    </button>
                                </td>
                            </tr>
                            <tr class="border-2 light-border-gray2 ">
                                <td class="px-6 py-4 whitespace-nowrap text-sm light-text-black">2-4-2025</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm light-text-black">Website SEO</td>
                                <td class="px-6 py-4 text-sm light-text-black">The content draft is under review.
                                    Please provide any additional content by end of this wee</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full light-bg-red-100 light-text-red-800 dark:bg-red-900 dark:text-red-200">High</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button
                                        class="light-text-indigo-600 hover:light-text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300 mr-2">
                                        <img src="eye.png" alt="eye" class="bg-gray-200 p-1 rounded-full">
                                    </button>
                                    <button
                                        class="light-text-red-600 hover:light-text-red-900 dark:text-red-400 dark:hover:text-red-300">
                                        <img src="trash.png" alt="eye" class="bg-gray-200 p-1 rounded-full">
                                    </button>
                                </td>
                            </tr>
                            <tr class="border-2 light-border-gray2 ">
                                <td class="px-6 py-4 whitespace-nowrap text-sm light-text-black">2-4-2025</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm light-text-black">Website SEO</td>
                                <td class="px-6 py-4 text-sm light-text-black">The content draft is under review.
                                    Please provide any additional content by end of this wee</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full light-bg-green-100 light-text-green-800 dark:bg-green-900 dark:text-green-200">Low</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button
                                        class="light-text-indigo-600 hover:light-text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300 mr-2">
                                        <img src="eye.png" alt="eye" class="bg-gray-200 p-1 rounded-full">
                                    </button>
                                    <button
                                        class="light-text-red-600 hover:light-text-red-900 dark:text-red-400 dark:hover:text-red-300">
                                        <img src="trash.png" alt="eye" class="bg-gray-200 p-1 rounded-full">
                                    </button>
                                </td>
                            </tr>
                            <tr class="border-2 light-border-gray2 ">
                                <td class="px-6 py-4 whitespace-nowrap text-sm light-text-black">2-4-2025</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm light-text-black">Website SEO</td>
                                <td class="px-6 py-4 text-sm light-text-black">The content draft is under review.
                                    Please provide any additional content by end of this wee</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full light-bg-blue-100 light-text-blue-800 dark:bg-blue-900 dark:text-blue-200">Medium</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button
                                        class="light-text-indigo-600 hover:light-text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300 mr-2">
                                        <img src="eye.png" alt="eye" class="bg-gray-200 p-1 rounded-full">
                                    </button>
                                    <button
                                        class="light-text-red-600 hover:light-text-red-900 dark:text-red-400 dark:hover:text-red-300">
                                        <img src="trash.png" alt="eye" class="bg-gray-200 p-1 rounded-full">
                                    </button>
                                </td>
                            </tr>
                            <tr class="border-2 light-border-gray2 ">
                                <td class="px-6 py-4 whitespace-nowrap text-sm light-text-black">2-4-2025</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm light-text-black">Website SEO</td>
                                <td class="px-6 py-4 text-sm light-text-black">The content draft is under review.
                                    Please provide any additional content by end of this wee</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full light-bg-green-100 light-text-green-800 dark:bg-green-900 dark:text-green-200">Low</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button
                                        class="light-text-indigo-600 hover:light-text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300 mr-2">
                                        <img src="eye.png" alt="eye" class="bg-gray-200 p-1 rounded-full">
                                    </button>
                                    <button
                                        class="light-text-red-600 hover:light-text-red-900 dark:text-red-400 dark:hover:text-red-300">
                                        <img src="trash.png" alt="eye" class="bg-gray-200 p-1 rounded-full">
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="flex justify-between items-center px-8 mt-4">
                    <div class="flex items-center">
                        <span class="text-sm light-text-black">Showing 1 to 5 of 100 entries</span>
                        <select
                            class="ml-2 border light-border-gray-300 dark:border-gray-600 rounded-md shadow-sm text-sm light-text-gray-700 dark:text-gray-300 light-bg-white dark:bg-gray-700 focus:outline-none focus:ring-orange-500 focus:border-orange-500">
                            <option>5</option>
                            <option>10</option>
                            <option>25</option>
                        </select>
                    </div>
                    <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">

                        <div class="flex space-x-2 ">
                            <button
                                class="px-4 py-2 rounded-md border light-text-white border-gray-300 hover:bg-gray-100 transition-colors">Previous</button>
                            <button
                                class="px-4 py-2 rounded-md border light-text-white border-gray-300 bg-orange-600 text-white font-semibold">1</button>
                            <button
                                class="px-4 py-2 rounded-md border light-text-white border-gray-300 hover:bg-gray-100 transition-colors">2</button>
                            <button
                                class="px-4 py-2 rounded-md border light-text-white border-gray-300 hover:bg-gray-100 transition-colors">3</button>
                            <button
                                class="px-4 py-2 rounded-md border light-text-white border-gray-300 hover:bg-gray-100 transition-colors">4</button>
                            <button
                                class="px-4 py-2 rounded-md border light-text-white border-gray-300 hover:bg-gray-100 transition-colors">5</button>
                            <button
                                class="px-4 py-2 rounded-md border light-text-white border-gray-300 hover:bg-gray-100 transition-colors">Next</button>
                        </div>

                    </nav>
                </div>
            </div>

            <div id="uploadedDocumentContent" class="tab-content hidden">
                <div class="flex justify-between items-center px-4 mb-4">
                    <div class="flex justify-between items-center p-4 mb-4">
                        <h3 class="text-2xl">Documents</h3>
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
                                <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
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
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y light-divide-gray-200 dark:divide-gray-700">
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
                        <tbody class="bg-transparent border  light-border-gray2">
                            <tr class="border-2 light-border-gray2">
                                <td class="px-6 py-4 whitespace-nowrap text-sm light-text-black">01</td>
                                <td
                                    class="px-6 py-4 whitespace-nowrap text-sm light-text-gray-900 dark:text-gray-300">
                                    <a href="#"
                                        class="flex items-center bg-gray-200 rounded-md w-36
                                p-2 light-text-gray-600 dark:text-gray-400 hover:underline">
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
                                <td class="px-6 py-4 whitespace-nowrap text-sm light-text-black">10-5-2024</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button
                                        class="light-text-red-600 hover:light-text-red-900 dark:text-red-400 dark:hover:text-red-300">
                                        <div class="flex gap-2">
                                            <img src="eye.png" alt="eye"
                                                class="bg-gray-200 p-1 rounded-full">
                                            <img src="trash.png" alt="eye"
                                                class="bg-gray-200 p-1 rounded-full">
                                        </div>
                                    </button>
                                </td>
                            </tr>
                            <tr class="border-2 light-border-gray2">
                                <td class="px-6 py-4 whitespace-nowrap text-sm light-text-black">01</td>
                                <td
                                    class="px-6 py-4 whitespace-nowrap text-sm light-text-gray-900 dark:text-gray-300">
                                    <a href="#"
                                        class="flex items-center bg-gray-200 rounded-md w-36
                                p-2 light-text-gray-600 dark:text-gray-400 hover:underline">
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
                                <td class="px-6 py-4 whitespace-nowrap text-sm light-text-black">10-5-2024</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button
                                        class="light-text-red-600 hover:light-text-red-900 dark:text-red-400 dark:hover:text-red-300">
                                        <div class="flex gap-2">
                                            <img src="eye.png" alt="eye"
                                                class="bg-gray-200 p-1 rounded-full">
                                            <img src="trash.png" alt="eye"
                                                class="bg-gray-200 p-1 rounded-full">
                                        </div>
                                    </button>
                                </td>
                            </tr>
                            <tr class="border-2 light-border-gray2">
                                <td class="px-6 py-4 whitespace-nowrap text-sm light-text-black">01</td>
                                <td
                                    class="px-6 py-4 whitespace-nowrap text-sm light-text-gray-900 dark:text-gray-300">
                                    <a href="#"
                                        class="flex items-center bg-gray-200 rounded-md w-36
                                p-2 light-text-gray-600 dark:text-gray-400 hover:underline">
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
                                <td class="px-6 py-4 whitespace-nowrap text-sm light-text-black">10-5-2024</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button
                                        class="light-text-red-600 hover:light-text-red-900 dark:text-red-400 dark:hover:text-red-300">
                                        <div class="flex gap-2">
                                            <img src="eye.png" alt="eye"
                                                class="bg-gray-200 p-1 rounded-full">
                                            <img src="trash.png" alt="eye"
                                                class="bg-gray-200 p-1 rounded-full">
                                        </div>
                                    </button>
                                </td>
                            </tr>
                            <tr class="border-2 light-border-gray2">
                                <td class="px-6 py-4 whitespace-nowrap text-sm light-text-black">01</td>
                                <td
                                    class="px-6 py-4 whitespace-nowrap text-sm light-text-gray-900 dark:text-gray-300">
                                    <a href="#"
                                        class="flex items-center bg-gray-200 rounded-md w-36
                                p-2 light-text-gray-600 dark:text-gray-400 hover:underline">
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
                                <td class="px-6 py-4 whitespace-nowrap text-sm light-text-black">10-5-2024</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button
                                        class="light-text-red-600 hover:light-text-red-900 dark:text-red-400 dark:hover:text-red-300">
                                        <div class="flex gap-2">
                                            <img src="eye.png" alt="eye"
                                                class="bg-gray-200 p-1 rounded-full">
                                            <img src="trash.png" alt="eye"
                                                class="bg-gray-200 p-1 rounded-full">
                                        </div>
                                    </button>
                                </td>
                            </tr>
                            <tr class="border-2 light-border-gray2">
                                <td class="px-6 py-4 whitespace-nowrap text-sm light-text-black">01</td>
                                <td
                                    class="px-6 py-4 whitespace-nowrap text-sm light-text-gray-900 dark:text-gray-300">
                                    <a href="#"
                                        class="flex items-center bg-gray-200 rounded-md w-36
                                p-2 light-text-gray-600 dark:text-gray-400 hover:underline">
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
                                <td class="px-6 py-4 whitespace-nowrap text-sm light-text-black">10-5-2024</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button
                                        class="light-text-red-600 hover:light-text-red-900 dark:text-red-400 dark:hover:text-red-300">
                                        <div class="flex gap-2">
                                            <img src="eye.png" alt="eye"
                                                class="bg-gray-200 p-1 rounded-full">
                                            <img src="trash.png" alt="eye"
                                                class="bg-gray-200 p-1 rounded-full">
                                        </div>

                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="flex justify-between items-center px-8 mt-4">
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

            <div id="addCredentialsContent" class="tab-content hidden ">
                <div class="p-4">
                    <div class="light-bg-d9d9d9 p-4 rounded-xl">
                        <h3 class="text-2xl  light-text-black  mb-4">Add Credentials</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
                            <div>
                                <label for="platformName"
                                    class="block text-sm font-medium light-text-white mb-1">Platform Name</label>
                                <input type="text" id="platformName" placeholder="Google / Facebook etc"
                                    class="block w-full px-3 py-2 bg-gray-200 border light-border-gray-300 dark:border-gray-600 rounded-md shadow-sm light-bg-orange-600  light-text-gray-900 dark:text-gray-300 focus:outline-none focus:ring-orange-500 focus:border-orange-500">
                            </div>
                            <div>
                                <label for="accountName"
                                    class="block text-sm font-medium light-text-white mb-1">Account Name</label>
                                <input type="text" id="accountName" placeholder="Account Holder Name"
                                    class="block w-full px-3 py-2 border bg-gray-200 light-border-gray-300 dark:border-gray-600 rounded-md shadow-sm light-bg-gray-50  light-text-gray-900 dark:text-gray-300 focus:outline-none focus:ring-orange-500 focus:border-orange-500">
                            </div>
                            <div>
                                <label for="email"
                                    class="block text-sm font-medium light-text-white mb-1">Email</label>
                                <input type="email" id="email" placeholder="abc123@email.com"
                                    class="block w-full px-3 py-2 border light-border-gray-300 dark:border-gray-600 rounded-md shadow-sm light-bg-gray-50  bg-gray-200 light-text-gray-900  focus:outline-none focus:ring-orange-500 focus:border-orange-500">
                            </div>
                            <div class="relative">
                                <label for="password"
                                    class="block text-sm font-medium light-text-white mb-1">Password</label>
                                <input type="password" id="password" placeholder="Password here"
                                    class="block w-full px-3 py-2 border light-border-gray-300 dark:border-gray-600 rounded-md shadow-sm light-bg-gray-50  bg-gray-200 light-text-gray-900  focus:outline-none focus:ring-orange-500 focus:border-orange-500 pr-10">
                                <button type="button"
                                    class="absolute inset-y-0 right-0 pr-3 flex items-center pt-6 light-text-gray-400 dark:text-gray-500 hover:light-text-gray-600 dark:hover:text-gray-400">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="flex justify-end space-x-2 mb-8">
                            <button
                                class="px-4 py-2 rounded-lg light-bg-gray-200 dark:bg-gray-700 light-text-gray-700 dark:text-gray-300 hover:light-bg-gray-300 dark:hover:bg-gray-600 transition-colors">Cancel</button>
                            <button
                                class="px-4 py-2 rounded-lg light-bg-orange-600 dark:bg-orange-700 text-white hover:light-bg-orange-700 dark:hover:bg-orange-600 transition-colors">Save</button>
                        </div>
                    </div>
                </div>
                <div class="px-4">
                    <div class="flex justify-between items-center p-4 mb-4">
                        <h3 class="text-2xl">Documents</h3>
                        <div class="relative w-full max-w-xs pl-2">

                        </div>
                        <div class="flex space-x-2">
                            <input type="text" placeholder="Search here"
                                class="block w-full px-4 py-2 border border-gray-200 light-text-black  rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 dark:focus:ring-orange-400">
                            <svg class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 light-text-gray-400 dark:text-gray-500"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            <button
                                class="flex items-center px-4 py-2 border border-gray-200 dark:text-gray-300 rounded-lg hover:light-bg-gray-300 dark:hover:bg-gray-600">
                                Filters
                                <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
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

                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y light-divide-gray-200 dark:divide-gray-700">
                        <thead class="light-bg-gray-50 dark:bg-gray-700">
                            <tr class="light-bg-d9d9d9">
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
                        <tbody class=" border-2 light-border-gray2">
                            <tr class="border-2 light-border-gray2">
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
                                        <img src="edit.svg" alt="eye" class="bg-gray-200 p-1 rounded-full">
                                    </button>
                                    <button
                                        class="light-text-red-600 hover:light-text-red-900 dark:text-red-400 dark:hover:text-red-300">
                                        <img src="trash.svg" alt="eye" class="bg-gray-200 p-1 rounded-full">
                                    </button>
                                </td>
                            </tr>
                            <tr class="border-2 light-border-gray2">
                                <td class="px-6 py-4 whitespace-nowrap text-sm light-text-black">Instagram</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm light-text-black">John_Doe</td>
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
                                        <img src="edit.svg" alt="eye" class="bg-gray-200 p-1 rounded-full">
                                    </button>
                                    <button
                                        class="light-text-red-600 hover:light-text-red-900 dark:text-red-400 dark:hover:text-red-300">
                                        <img src="trash.svg" alt="eye" class="bg-gray-200 p-1 rounded-full">
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="flex justify-between items-center mt-4 px-8">
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
                            <tr class="light-bg-d9d9d9">
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
                        <tbody class=" border-2 light-border-gray2">
                            <tr class=" border-2 light-border-gray2">
                                <td class="px-6 py-4 whitespace-nowrap text-sm light-text-black">01</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm light-text-black">Jan 2025</td>
                                <td class="px-6 py-4 text-sm light-text-black">Auth Screen Done, please provide any
                                    additional content by end of this week</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm light-text-black">05-3-2024</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="#"
                                        class="flex items-center bg-gray-200 rounded-md w-36
                                p-2 light-text-gray-600 dark:text-gray-400 hover:underline">
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
                            <tr class=" border-2 light-border-gray2">
                                <td class="px-6 py-4 whitespace-nowrap text-sm light-text-black">01</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm light-text-black">Feb 2025</td>
                                <td class="px-6 py-4 text-sm light-text-black">Auth Screen Done, please provide any
                                    additional content by end of this week</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm light-text-black">05-3-2024</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="#"
                                        class="flex items-center bg-gray-200 rounded-md w-36
                                p-2 light-text-gray-600 dark:text-gray-400 hover:underline">
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
                            <tr class=" border-2 light-border-gray2">
                                <td class="px-6 py-4 whitespace-nowrap text-sm light-text-black">01</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm light-text-black">Feb 2025</td>
                                <td class="px-6 py-4 text-sm light-text-black">Auth Screen Done, please provide any
                                    additional content by end of this week</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm light-text-black">05-3-2024</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="#"
                                        class="flex items-center bg-gray-200 rounded-md w-36
                                p-2 light-text-gray-600 dark:text-gray-400 hover:underline">
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
                            <tr class=" border-2 light-border-gray2">
                                <td class="px-6 py-4 whitespace-nowrap text-sm light-text-black">01</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm light-text-black">March 2025</td>
                                <td class="px-6 py-4 text-sm light-text-black">Auth Screen Done, please provide any
                                    additional content by end of this week</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm light-text-black">05-3-2024</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="#"
                                        class="flex items-center bg-gray-200 rounded-md w-36
                                p-2 light-text-gray-600 dark:text-gray-400 hover:underline">
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
                            <tr class=" border-2 light-border-gray2">
                                <td class="px-6 py-4 whitespace-nowrap text-sm light-text-black">01</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm light-text-black">Apr 2025</td>
                                <td class="px-6 py-4 text-sm light-text-black">Auth Screen Done, please provide any
                                    additional content by end of this week</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm light-text-black">05-3-2024</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="#"
                                        class="flex items-center bg-gray-200 rounded-md w-36
                                p-2 light-text-gray-600 dark:text-gray-400 hover:underline">
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

            <div class=" light-bg-need flex justify-between items-center p-8 mt-8 ">
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
                    class="bg-orange-600 dark:bg-black text-white px-6 py-2 rounded-lg hover:bg-orange-700 dark:hover:bg-orange-600 transition-colors">
                    View More
                </button>
            </div>


        </div>
    </div>

    <!-- New Ticket Modal -->
    <div id="ticketModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center z-50 justify-center hidden">
        <div
            class="light-bg-d9d9d9 bg-white text-white rounded-lg shadow-lg w-[900px] max-h-[90vh] overflow-y-auto  relative">
            <!-- Close Button -->
            <button id="closeTicketModal" class="absolute top-3 right-3 text-gray-400 hover:text-white">
                ✕
            </button>

            <div class="px-6 py-3"> <!-- Container for heading + divider -->
                <h2 class="text-lg light-text-black  font-semibold">Add New Status</h2>
            </div>
            <div class=""> <!-- Container for heading + divider -->
                <div class="border-t border-gray-600 w-full mt-4"></div>
            </div>

            <!-- Ticket Form -->
            <form id="ticketForm" class="space-y-4 p-6">
                <!-- Title, Project Name, Priority -->
                <div class="grid grid-cols-1 gap-4">
                    <div class="grid grid-cols-1 gap-2">
                        <div>
                            <label class="block text-sm mb-1 light-text-black">Title</label>
                            <input type="text" name="title" placeholder="Enter Task Title"
                                class="w-full p-2 rounded light-bg-d7d7d7 border border-gray-700 text-white focus:outline-none">
                        </div>

                    </div>

                </div>


                <!-- Buttons -->
                <div class="flex justify-end items-center">

                    <div class="flex justify-end gap-3 pt-3">
                        <button type="button" id="cancelTicket"
                            class="px-4 py-2 light-text-black light-bg-d7d7d7 rounded-lg hover:bg-gray-600">
                            Cancel
                        </button>
                        <button type="submit" class="px-4 py-2 bg-orange-500 rounded-lg hover:bg-orange-600">
                            Confirm
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- New Ticket Modal -->
    <div id="paymentModal"
        class="fixed inset-0 bg-black bg-opacity-50 flex items-center z-50 justify-center hidden">
        <div
            class="light-bg-d9d9d9 bg-white text-white rounded-lg shadow-lg w-[900px] max-h-[90vh] overflow-y-auto  relative">
            <!-- Close Button -->
            <button id="closePaymentModal" class="absolute top-3 right-3 text-gray-400 hover:text-white">
                ✕
            </button>

            <div class="px-6 py-3"> <!-- Container for heading + divider -->
                <h2 class="text-lg light-text-black  font-semibold">Add New Page</h2>
            </div>
            <div class=""> <!-- Container for heading + divider -->
                <div class="border-t border-gray-600 w-full mt-4"></div>
            </div>

            <!-- Ticket Form -->
            <form id="ticketForm" class="space-y-4 p-6">
                <!-- Title, Project Name, Priority -->
                <div class="grid grid-cols-1 gap-4">
                    <div class="grid grid-cols-1 gap-2">
                        <div>
                            <label class="block text-sm mb-1 light-text-black">Title</label>
                            <input type="text" name="title" placeholder="Enter Task Title"
                                class="w-full p-2 rounded light-bg-d7d7d7 border border-gray-700 text-white focus:outline-none">
                        </div>

                    </div>


                    <div class="grid grid-cols-3  gap-4">
                        <div>
                            <label class="block text-sm mb-1 light-text-black">Tag</label>
                            <input type="text" name="title" placeholder="Enter Task Title"
                                class="w-full p-2 rounded light-bg-d7d7d7 border border-gray-700 text-white focus:outline-none">
                        </div>

                        <!-- State Selection -->
                        <div>
                            <label class="block text-sm mb-1 light-text-black">Assign Team Member</label>
                            <select
                                class="w-full p-2 rounded light-bg-d7d7d7 border border-gray-700 light-text-black">
                                <option value="">Select Team Member</option>
                                <option value="John">John</option>
                                <option value="Sam">Sam</option>
                                <option value="Tom">Tom</option>
                                <option value="Liam">Liam</option>
                            </select>
                        </div>

                        <!-- City Selection -->
                        <div>
                            <label class="block text-sm mb-1 light-text-black">Task Status</label>
                            <select
                                class="w-full p-2 rounded light-bg-d7d7d7 border border-gray-700 light-text-black">
                                <option value="">Select Task Status</option>
                                <option value="Active">Active</option>
                                <option value="Cancelled">Cancelled</option>
                                <option value="InProcess">InProcess</option>
                                <option value="Pending">Pending</option>
                            </select>
                        </div>

                    </div>


                </div>


                <!-- Buttons -->
                <div class="flex justify-end items-center">

                    <div class="flex justify-end gap-3 pt-3">
                        <button type="button" id="cancelTicket"
                            class="px-4 py-2 light-text-black light-bg-d7d7d7 rounded-lg hover:bg-gray-600">
                            Cancel
                        </button>
                        <button type="submit" class="px-4 py-2 bg-orange-500  rounded-lg hover:bg-orange-600">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div id="newTaskModal"
        class="fixed inset-0 bg-black bg-opacity-50 flex items-center z-50 justify-center hidden">
        <div
            class="light-bg-d9d9d9 bg-[#1c1c1c] text-white rounded-lg shadow-lg w-[900px] max-h-[90vh] overflow-y-auto relative">

            <!-- Close Button -->
            <button id="closeNewTaskModal" class="absolute top-3 right-3 text-gray-400 hover:text-white">
                ✕
            </button>

            <!-- Header -->
            <div class="px-6 pt-5 pb-2">
                <h2 class="text-lg font-semibold light-text-white">Add new Task</h2>
            </div>

            <div class="border-t border-gray-700 mb-4"></div>

            <!-- Task Form -->
            <form id="ticketForm" class="space-y-4 px-6 pb-6" method="POST" action="{{route('task.store')}}">
                @csrf
                <div class="grid grid-cols-2 gap-4">
                    <!-- Task Name -->
                    <div>
                        <label class="block text-sm mb-1 light-text-white">Task Name</label>
                        <input type="text" placeholder="John Doe" name="task_name" value="{{old('task_name')}}"
                            class="w-full p-2 rounded light-bg-d7d7d7 border border-gray-700 text-white focus:outline-none">
                    </div>

                    <!-- Task Category -->
                    <div>
                        <label class="block text-sm mb-1 light-text-white">Task Category</label>
                        <select name="task_category"  class="w-full p-2 rounded light-bg-d7d7d7 border border-gray-700 text-white">
                            <option selected hidden>Select Category</option>
                            <option value="design" {{old('task_category') == 'design' ? 'selected' : '' }}>Design</option>
                            <option value="development" {{old('task_category') == 'development' ? 'selected' : '' }}>Development</option>
                        </select>
                    </div>

                    <!-- Project -->
                    <div>
                        <label class="block text-sm mb-1 light-text-white">Project</label>
                        <select name="project" class="w-full p-2 rounded light-bg-d7d7d7 border border-gray-700 text-white">
                            <option selected hidden>Select Project</option>
                            @if(count($projects) > 0)
                            @foreach ($projects as $project)
                                <option value="{{$project->id}}" {{old('project') == $project->id ? 'selected' : ''}}>{{$project->project_name}}</option>
                            @endforeach
                            @else
                                <option selected hidden>No Project Found</option>
                            @endif
                        </select>
                    </div>

                    <!-- Assign to -->
                    <div>
                        <label class="block text-sm mb-1 light-text-white">Assign to</label>
                        <select name="assign_to" class="w-full p-2 rounded light-bg-d7d7d7 border border-gray-700 text-white">
                            <option selected hidden>Select Members</option>
                            @if(count($users) > 0)
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" {{ old('assign_to') == $user->id ? 'selected' : ''}}>{{$user->name}}</option>
                                @endforeach
                            @else
                                <option selected hidden>No User Found</option>
                            @endif
                        </select>
                    </div>

                    <!-- Start Date -->
                    <div>
                        <label class="block text-sm mb-1 light-text-white">Start Date</label>
                        <input type="date" placeholder="dd / mm / yy" name="start_date" value="{{old('start_date')}}"
                            class="w-full p-2 rounded light-bg-d7d7d7 border border-gray-700 text-white focus:outline-none">
                    </div>

                    <!-- Due Date -->
                    <div>
                        <label class="block text-sm mb-1 light-text-white">Due Date</label>
                        <input type="date" placeholder="dd / mm / yy" name="due_date" value="{{old('due_date')}}"
                            class="w-full p-2 rounded light-bg-d7d7d7 border border-gray-700 text-white focus:outline-none">
                    </div>
                </div>

                <!-- Description -->
                <div>
                    <label class="block text-sm mb-1 light-text-white">Description</label>
                    <textarea placeholder="Description here" rows="4" name="description" 
                        class="w-full p-2 rounded light-bg-d7d7d7 border border-gray-700 text-white focus:outline-none">
                        {{old('descripiton')}}
                    </textarea>
                </div>

                <!-- Buttons -->
                <div class="flex justify-end gap-3 pt-4">
                    <button type="button" id="cancelTicket"
                        class="px-4 py-2 light-text-white light-bg-d7d7d7 rounded-lg hover:bg-gray-600">
                        Cancel
                    </button>
                    <button type="submit" class="px-4 py-2 bg-orange-500 rounded-lg hover:bg-orange-600">
                        Add
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div id="ticketChatModal"
        class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
        <div
            class="modal-content rounded-xl shadow-lg w-[900px] max-h-[90vh] relative 
                bg-white text-black light-bg-d9d9d9 dark:text-white transition-colors duration-300
                flex flex-col">
            <!-- Header -->
            <div class="flex justify-between items-center px-6 py-4 border-b border-gray-300 dark:border-gray-700">
                <div>
                    <div class="flex items-center space-x-3">
                        <h2 class="text-lg light-text-black font-semibold">Research FAQ page UX</h2>
                        <div><img src="{{asset('assets/dots-vertical.svg')}}"></div>
                    </div>
                    <div class="mt-2 flex items-center space-x-3">
                        <div class="bg-green-900 w-10 py-1 px-3 bg-opacity-30 rounded-full">
                            <p class="text-green-400 text-sm">UX</p>
                        </div>
                    </div>
                </div>
                <button id="closeTicketChatModal"
                    class="text-gray-500 hover:text-black dark:hover:text-white text-xl">
                    ✕
                </button>
            </div>

            <!-- Chat Messages Container (Scrollable) -->
            <div class="flex-1 overflow-y-auto">
                <div class="px-6 py-4 space-y-6">

                    <div class="w-full  p-3 light-bg-d7d7d7 rounded-md">
                        <div>
                            <p class="light-text-black">Description:</p>
                            <p class="text-gray-300">Conduct a detailed research to improve the FAQ page user
                                experience. Focus on usability, accessibility, and content clarity. Identify pain points
                                and gather examples of best practices.</p>
                        </div>
                        <div>
                            <p class="light-text-black mt-2">Attachments:</p>
                            <div class="text-gray-300">
                                <p>1. Current FAQ page screenshots</p>
                                <p>2. Competitor analysis spreadsheet</p>
                                <p>3. User feedback summary PDF</p>
                            </div>
                        </div>
                    </div>

                    <!-- Date Separator with Line Through -->
                    <div class="relative flex items-center px-6 my-6">
                        <div class="flex-grow border-t border-gray-300 dark:border-gray-600"></div>
                        <span class="flex-shrink-0 mx-3 text-xs bg-gray-300 dark:bg-gray-700 px-3 py-1 rounded-full">
                            Tuesday, July 20th
                        </span>
                        <div class="flex-grow border-t border-gray-300 dark:border-gray-600"></div>
                    </div>

                    <!-- Message - User 1 -->
                    <div class="flex items-start space-x-3">
                        <img src="Photos.png" class="w-10 h-10 rounded-md" alt="user" />
                        <div>
                            <p class="text-sm light-text-black font-semibold">
                                Chan <span class="text-xs  light-text-black ml-1">4:49 PM</span>
                            </p>
                            <p class="text-sm light-text-black">Anyone in Boston?</p>
                            <div class="flex space-x-2 mt-1 text-xs">
                                <button class="px-2 py-1 bg-gray-200 dark:bg-gray-700 rounded-xl">❤️ 2</button>
                                <button class="px-2 py-1 bg-gray-200 dark:bg-gray-700 rounded-xl"><img
                                        src="Icon (12).svg" alt=""></button>
                            </div>
                        </div>
                    </div>

                    <!-- Message - User 2 -->
                    <div class="flex items-start space-x-3">
                        <img src="Rectangle 220.png" class="w-10 h-10 rounded-md" alt="user" />
                        <div>
                            <p class="text-sm light-text-black font-semibold">
                                Tommy Lee <span class="text-xs light-text-black ml-1">4:49 PM</span>
                            </p>
                            <p class="text-sm light-text-black">Anyone in Boston?</p>
                            <div class="flex space-x-2 mt-1 text-xs">
                                <button class="px-2 py-1 bg-gray-200 dark:bg-gray-700 rounded-xl">❤️ 1</button>
                                <button class="px-2 py-1 bg-gray-200 dark:bg-gray-700 rounded-xl"><img
                                        src="Icon (12).svg" alt=""></button>
                            </div>
                        </div>
                    </div>

                    <!-- Date Separator with Line Through -->
                    <div class="relative flex items-center px-6 my-6">
                        <div class="flex-grow border-t border-gray-300 dark:border-gray-600"></div>
                        <span class="flex-shrink-0 mx-3 text-xs bg-gray-300 dark:bg-gray-700 px-3 py-1 rounded-full">
                            Tuesday, July 20th
                        </span>
                        <div class="flex-grow border-t border-gray-300 dark:border-gray-600"></div>
                    </div>


                    <!-- Message - User 1 -->
                    <div class="flex items-start space-x-3">
                        <img src="Photos.png" class="w-10 h-10 rounded-md" alt="user" />
                        <div>
                            <p class="text-sm light-text-black font-semibold">
                                Chan <span class="text-xs light-text-black text-gray-400 ml-1">4:49 PM</span>
                            </p>
                            <p class="text-sm light-text-black">Anyone in Boston?</p>
                            <div class="flex space-x-2 mt-1 text-xs">
                                <button class="px-2 py-1 bg-gray-200 dark:bg-gray-700 rounded-xl">❤️ 2</button>
                                <button class="px-2 py-1 bg-gray-200 dark:bg-gray-700 rounded-xl"><img
                                        src="Icon (12).svg" alt=""></button>
                            </div>
                        </div>
                    </div>

                    <!-- Message - User 2 -->
                    <div class="flex items-start space-x-3">
                        <img src="Rectangle 220.png" class="w-10 h-10 rounded-md" alt="user" />
                        <div>
                            <p class="text-sm light-text-black font-semibold">
                                Tommy Lee <span class="text-xs light-text-black text-gray-400 ml-1">4:49 PM</span>
                            </p>
                            <p class="text-sm light-text-black">Anyone in Boston?</p>
                            <div class="flex space-x-2 mt-1 text-xs">
                                <button class="px-2 py-1 bg-gray-200 dark:bg-gray-700 rounded-xl">❤️ 1</button>
                                <button class="px-2 py-1 bg-gray-200 dark:bg-gray-700 rounded-xl"><img
                                        src="Icon (12).svg" alt=""></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Input -->
            <div
                class="border-t rounded-b-lg rounded-t-lg  border-gray-300 dark:border-gray-700 bg-black light-bg-d7d7d7 ">
                <div class="flex items-center  px-4"><span class="flex items-center gap-1"><img
                            class=" w-full h-full" src="Icon (1).svg" alt=""><img class=" w-full h-full"
                            src="Icon.svg" alt=""><img class=" w-full h-full" src="Icon (2).svg"
                            alt=""><img class=" w-full h-full" src="Rectangle 226.svg"
                            alt=""><img class=" w-full h-full" src="Icon (6).svg" alt=""><img
                            class=" w-full h-full" src="Rectangle 226.svg" alt=""><img
                            class=" w-full h-full" src="Icon (7).svg" alt=""><img class=" w-full h-full"
                            src="Icon (8).svg" alt=""><img class=" w-full h-full"
                            src="Rectangle 226.svg" alt=""><img class=" w-full h-full"
                            src="Icon (9).svg" alt=""><img class=" w-full h-full"
                            src="Rectangle 226.svg" alt=""><img class=" w-full h-full"
                            src="Icon (10).svg" alt=""><img class=" w-full h-full" src="Icon (11).svg"
                            alt=""></span></div>
                <div class="flex   light-bg-d7d7d7">
                    <input type="text" placeholder="@type here"
                        class="w-full p-4  light-bg-d9d9d9 light-text-black  focus:outline-none text-sm placeholder-gray-500" />
                </div>
                <div class="flex rounded-b-lg light-bg-d9d9d9 items-center justify-between px-4"><span
                        class="flex items-center gap-1"><img class="pb-2 w-full h-full" src="Group 216.svg"
                            alt=""><img class="pb-2 w-full h-full" src="Icon (3).svg"
                            alt=""><img class="pb-2 w-full h-full" src="Icon (4).svg"
                            alt=""><img class="pb-2 w-full h-full" src="Icon (5).svg"
                            alt=""></span>
                    <button class="light-bg-d9d9d9 hover:bg-orange-600 pt-10 rounded-r text-white relative">
                        <span class="absolute bottom-2 right-3 text-lg">➤</span>
                    </button>
                </div>

            </div>
        </div>
    </div>
    
</body>

</html>

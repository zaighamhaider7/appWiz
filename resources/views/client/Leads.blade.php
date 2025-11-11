<?php
    use App\Models\Leads;
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
    <link rel="stylesheet" href="//cdn.datatables.net/2.3.4/css/dataTables.dataTables.min.css">
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

        .dark-mode .light-bg-bill {
            background-color: #121212 !important;
        }


        .dark-mode .light-mode-item {
            display: none;
        }

        .dark-mode .dark-mode-item {
            display: block;
        }

        .bg-gray-932 {
            background-color: #323232;
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

        .light-text-white {
            color: #FFFFFF;
        }

        .light-text-black {
            color: #000000;
        }

        .light-border-gray-300 {
            border-color: #4e4e4e;
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
        .light-bg-gray-900 {
            background-color: #323232;
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

        .light-bg-gray-1 {
            background-color: #323232;
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

        .dark-mode .light-bg-white,
        .dark-mode .light-bg-f5f5f5 {
            background-color: #000000 !important;
            /* General backgrounds for cards, sidebar, header */
        }

        .dark-mode .light-bg-gray-900 {
            background-color: #323232;
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

                /* Limit dropdown height to show 5 items */
        .choices__list--dropdown {
            max-height: 180px;
            overflow-y: auto;
            background-color:black !important;
        }

        .choices__list--dropdown .choices__item--selectable {
            padding: 6px 10px;
            font-size: 14px;
            line-height: 1.2;
            background-color: black !important;
            color: white !important; /* Optional: make text visible on dark background */
        }

        .choices__list--dropdown .choices__item--selectable:hover {
            background-color: #1a1a1a !important; /* Slightly lighter black or just black */
            color: white !important;
        }

        /* Optional: tighter spacing between options */
        .choices_list--dropdown .choices_item {
        padding: 6px 10px;
        font-size: 14px;
        line-height: 1.2;
        background-color:black !important;
        }

        label {
        display: block;
        margin-bottom: 0.7rem;
        }

        /* === Main select wrapper === */
        #mySelect + .choices {
        background-color: black !important;
        border: 1px solid black !important;
        border-radius: 0.5rem;        
        }


        .choices__inner{
            height: 40px !important;
            min-height: 41px !important;
            line-height: 41px !important;    
            background-color: #3f3f3f !important; 
            display: flex;
            align-items: center;   
            border-color: #374151 !important; 
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

            <div class="p-6 light-bg-bill -mt-5 h-full lg:p-8">

                <!-- Projects Title -->
                <h1 class="text-3xl font-bold light-text-gray-800 mb-10">Leads</h1>

                <!-- Connect Domain Section -->



                <!-- Tab Contents -->
                <div class="tab-contents">
                    <div id="overviewContent" class="tab-content">
                        <!-- Overview content here -->
                        <!-- Overview Cards -->
                        <!-- User's Projects List Table -->
                        <div class="lg:col-span-2 light-bg-f5f5f5 light-bg-seo  rounded-xl shadow-sm">
                            <div class="flex items-center justify-between  p-6 flex-wrap gap-3">
                                <h2 class="text-xl font-semibold light-text-gray-800">Leads Lists</h2>
                                <div class="flex items-center space-x-3">
                                    <div class="relative">
                                        <input type="search" placeholder="Search here"
                                            class="pl-10 pr-4 py-2 rounded-lg light-border-gray-300 focus:outline-none focus:ring-1 focus:ring-orange-500 dt-input" id="dt-search-0"  aria-controls="myTable">
                                        <div
                                            class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="icon text-gray-400" viewBox="0 0 24 24">
                                                <circle cx="11" cy="11" r="8"></circle>
                                                <line x1="21" y1="21" x2="16.65" y2="16.65">
                                                </line>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="relative inline-block">
                                        <div class="flex gap-3">
                                            <!-- Button -->
                                            <select aria-controls="myTable" id="dt-length-0" fdprocessedid="9gl4x"
                                                class="dt-input w-20 px-3 py-2 rounded-md text-sm
                                                bg-white text-gray-800 border border-gray-300
                                                dark:bg-[#121212] dark:text-gray-100 dark:border-gray-600
                                                focus:outline-none focus:ring-2 focus:ring-orange-500">
                                                <option value="Filter" selected hidden>Filter</option>
                                                <option value="5">5</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                            </select>
                                            <button
                                                class="flex items-center justify-center px-4 py-2 rounded-lg bg-white light-bg-d7d7d7 light-text-gray-700 border light-border-gray-300 text-gray-700 hover:bg-gray-200 transition-colors openTicketModal">
                                                <div class="flex">
                                                    <span>Add New Lead</span>
                                                </div>
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="overflow-x-auto">
                                <table class="min-w-full border-b-2 light-border-gray-300" id="myTable">
                                    <thead class="light-bg-d9d9d9 border-b-2 light-border-gray-300">
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
                                                class="px-9 py-3  text-left text-xs
    font-medium light-text-gray-500 uppercase tracking-wider">
                                                <div class="flex items-center w-full justify-between">
                                                    <div style="width: 80%">LEADS</div>
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
                                                <div class="flex items-center">
                                                    EMAIL
                                                    <svg class="ml-10 w-4 h-4" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round">
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
                                                    PHONE#
                                                    <svg class="ml-10 w-4 h-4" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <!-- Up chevron (positioned higher) -->
                                                        <path d="M7 8 L12 3 L17 8" />
                                                        <!-- Down chevron (positioned lower with gap) -->
                                                        <path d="M7 16 L12 21 L17 16" />
                                                    </svg>
                                                </div>
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium light-text-gray-500 uppercase whitespace-nowrap tracking-wider">
                                                <div class="flex items-center">
                                                    <div>Lead Source</div>
                                                    <svg class="ml-10 w-4 h-4" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round">
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
                                                    Business name
                                                    <svg class="ml-10 w-6 h-6" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <!-- Up chevron (positioned higher) -->
                                                        <path d="M7 8 L12 3 L17 8" />
                                                        <!-- Down chevron (positioned lower with gap) -->
                                                        <path d="M7 16 L12 21 L17 16" />
                                                    </svg>
                                                </div>
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium light-text-gray-500 uppercase tracking-wider min-w-[120px]">
                                                <div class="flex items-center justify-between">
                                                    <span class="whitespace-nowrap">Status</span>
                                                    <div class="flex flex-col ml-10">

                                                    </div>
                                                </div>
                                            </th>

                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium light-text-gray-500 uppercase tracking-wider">
                                                <div class="flex items-center">
                                                    <svg class="icon mr-10 w-4 h-4" viewBox="0 0 24 24"
                                                        fill="none" stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <!-- Up chevron (positioned higher) -->
                                                        <path d="M7 8 L12 3 L17 8" />
                                                        <!-- Down chevron (positioned lower with gap) -->
                                                        <path d="M7 16 L12 21 L17 16" />
                                                    </svg>
                                                    ACTION
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="light-bg-white light-bg-seo border-b-2 light-border-gray-300">
                                    @php
                                        $count = 1;
                                    @endphp
                                    @if (count($leadsData) > 0)
                                        @foreach ($leadsData as $lead)
                                        <!-- Row 1 -->
                                        <tr class="border-b-2 light-border-gray-300">
                                             <td class="px-6 py-4 whitespace-nowrap text-sm font-medium light-text-gray-900">
                                                    {{ $count++ }}</td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm font-medium light-text-black">
                                                <div class="flex items-center gap-2">
                                                    <div><img src="Avatar (3).svg" alt=""></div>
                                                    <div>
                                                        <p>{{$lead->lead_name ?? "N/A"}}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm font-thin text-gray-400"> {{$lead->email ?? "N/A"}} </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span
                                                    class="px-2 inline-flex text-xs text-gray-400 leading-5 font-semibold rounded-full">{{$lead->phone ?? "N/A" }}</span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span
                                                    class="px-2 inline-flex text-xs text-gray-400 leading-5 font-semibold rounded-full">{{$lead->lead_source ?? "N/A"}}</span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span
                                                    class="px-2 inline-flex text-xs text-gray-400 leading-5 font-semibold rounded-full">{{$lead->business_name ?? "N/A" }}
                                                    </span>
                                            </td>

                                            {{-- <td class="px-6 py-4 whitespace-nowrap text-sm  text-gray-400"><button
                                                    id="filterButton"
                                                    class="flex items-center justify-center px-4 py-2 rounded-lg light-text-gray-700  text-gray-700 hover:bg-gray-200 bg-green-900/50 transition-colors">
                                                    <div
                                                        class="w-32 flex items-center justify-center text-green-500  justify-between ">
                                                        <span>Converted</span>
                                                        <svg class="-mt-2 w-6 h-6" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="1.5"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path d="M7 16 L12 21 L17 16" /> <!-- Down chevron -->
                                                        </svg>
                                                    </div>
                                                </button>
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
                                            </td> --}}

                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">
                                                <form action="{{route('lead.update', $lead->id)}}" method="POST">
                                                    @csrf
                                                    @method('POST')
                                                    {{-- <input type="hidden" name="lead_id" value="{{ $lead->id }}" > --}}
                                                    <select class="statusDropdown" name="lead_status"
                                                        onchange="this.form.submit(); updateDropdownStyle(this)"
                                                        style="width: 150px; padding: 8px; border-radius: 8px; text-align: left;">
                                                        <option value="{{$lead->lead_status}}" selected hidden>{{$lead->lead_status}}</option>
                                                        <option value="In Process" style="color: black; background-color: #fff;">In Process</option>
                                                        <option value="Converted" style="color: black; background-color: #fff;">Converted</option>
                                                        <option value="Not Converted" style="color: black; background-color: #fff;">Not Converted</option>
                                                    </select>
                                                </form>
                                            </td>


                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <div class="flex justify-end gap-2">
                                                    <form action="{{route('lead.delete', $lead->id)}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button
                                                            class="light-text-orange-500 bg-gray-200 p-1 rounded-full light-hover-text-orange-700 open-ticket-modal"
                                                            data-action="view-project">
                                                            <img src="{{asset('assets/trash.svg')}}" alt="icon"
                                                                class="w-5 h-5 light-text-gray-900 rounded-full light-mode-icon">
                                                        </button>
                                                    </form>
                                                </div>

                                            </td>
                                        </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="7" class="px-6 py-4 whitespace-nowrap text-sm font-medium light-text-black text-center">
                                                No leads found.
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

                                    {{-- <span>Showing 1 to 3 of 100 entries </span> --}}
                                    <span class="dt-info" aria-live="polite" id="myTable_info" role="status" bis_skin_checked="1">Showing 1 to 2 of 2 entries</span>
                                </div>
                                <div id="custom-pagination" class="flex space-x-2 mt-4">
                                    <button id="prev-btn" class="px-4 py-2 rounded-md border border-gray-300 text-white hover:bg-orange-600  transition-colors">Previous</button>
                                    <button class="page-btn px-4 py-2 rounded-md border border-gray-300 text-white ">1</button>
                                    <button class="page-btn px-4 py-2 rounded-md border border-gray-300 text-white ">2</button>
                                    <button class="page-btn px-4 py-2 rounded-md border border-gray-300 text-white ">3</button>
                                    <button class="page-btn px-4 py-2 rounded-md border border-gray-300 text-white ">4</button>
                                    <button class="page-btn px-4 py-2 rounded-md border border-gray-300 text-white ">5</button>
                                    <button id="next-btn" class="px-4 py-2 rounded-md border border-gray-300 text-white hover:bg-orange-600  transition-colors">Next</button>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div id="notesContent" class="tab-content hidden">
                        <!-- Notes content here -->
                        <div>

                            <div class="flex justify-between mb-10">
                                <h3 class="light-text-black text-lg font-thin">Payment methods</h3>
                                <button
                                    class="bg-orange-500 p-2 rounded-lg text-white font-semibold openTicketModal">Add
                                    New Payment Method</button>
                            </div>

                            <div class="flex light-border-gray-300 border-2 p-3 mb-5 rounded-lg justify-between">
                                <div>
                                    <img src="mastercard 1.svg" class="mb-5" alt="">
                                    <h3 class="light-text-black text-md mb-5 font-thin">Mildred Wagner</h3>
                                    <p class="light-text-black text-mb font-thin">**** **** **** 9856</p>
                                </div>
                                <div>
                                    <button
                                        class="light-bg-orange-600 border-2 light-border-gray-300 py-1 px-5 text-sm text-white rounded-lg font-thin openPaymentModal">Edit</button>
                                    <button
                                        class="mb-14 light-transparent border-2 light-border-gray-300 py-1 px-5 text-sm rounded-lg font-thin">Delete</button>
                                    <div class="flex justify-end">
                                        <p class="text-[14px] ">Card expires at 12/26</p>
                                    </div>
                                </div>
                            </div>
                            <div class="flex light-border-gray-300 border-2 p-3 mb-5 rounded-lg justify-between">
                                <div>
                                    <img src="Visa.svg" class="mb-5" alt="">
                                    <h3 class="light-text-black text-md mb-5 font-thin">Tom McBride</h3>
                                    <p class="light-text-black text-mb font-thin">**** **** **** 5823</p>
                                </div>
                                <div>
                                    <button
                                        class="light-bg-orange-600 border-2 light-border-gray-300 py-1 px-5 text-white text-sm rounded-lg font-thin openPaymentModal">Edit</button>
                                    <button
                                        class="mb-14 light-transparent border-2 light-border-gray-300 py-1 px-5 text-sm rounded-lg font-thin">Delete</button>
                                    <div class="flex justify-end">
                                        <p class="text-[14px] ">Card expires at 12/27</p>
                                    </div>
                                </div>
                            </div>
                            <div class="flex light-border-gray-300 border-2 p-3 mb-5 rounded-lg justify-between">
                                <div>
                                    <img src="AE.svg" class="mb-5" alt="">
                                    <h3 class="light-text-black text-md mb-5 font-thin">Mildred Wagner</h3>
                                    <p class="light-text-black text-mb font-thin">**** **** **** 5896</p>
                                </div>
                                <div>
                                    <button
                                        class="light-bg-orange-600  border-2 light-border-gray-300 py-1 px-5 text-sm text-white rounded-lg font-thin openPaymentModal">Edit</button>
                                    <button
                                        class="mb-14 light-transparent border-2 light-border-gray-300 py-1 px-5 text-sm rounded-lg font-thin">Delete</button>
                                    <div class="flex justify-end">
                                        <p class="text-[14px] ">Card expires at 12/24</p>
                                    </div>
                                </div>
                            </div>



                        </div>


                    </div>
                    <div id="uploadedDocumentContent" class="tab-content hidden">
                        <!-- Uploaded Document content here -->
                        <div class="lg:col-span-2 light-bg-f5f5f5 light-bg-seo  rounded-xl shadow-sm">
                            <div class="flex items-center justify-between  p-6 flex-wrap gap-3">
                                <h2 class="text-xl font-semibold light-text-gray-800">Billing Details</h2>
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
                                    <div class="relative inline-block">
                                        <div class="flex gap-3">
                                            <!-- Button -->
                                            <button id="filterButton"
                                                class="flex items-center justify-center px-4 py-2 rounded-lg bg-white light-bg-d9d9d9 light-text-gray-700 border border-gray-300 text-gray-700 hover:bg-gray-200 transition-colors">
                                                <div class="flex">
                                                    <span>Filters</span>
                                                    <svg class="ml-1 w-4 h-4" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M7 16 L12 21 L17 16" /> <!-- Down chevron -->
                                                    </svg>
                                                </div>
                                            </button>
                                            <button
                                                class="flex items-center justify-center px-4 py-2 rounded-lg bg-white light-bg-d7d7d7 light-text-gray-700 border light-border-gray-300 text-gray-700 hover:bg-gray-200 transition-colors openTicketModal">
                                                <div class="flex">
                                                    <span>Add New Ticket</span>
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
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="light-bg-d7d7d7">
                                        <tr>
                                            <th scope="col"
                                                class="px-6 py-3  text-left text-xs
    font-medium light-text-gray-500 uppercase tracking-wider">
                                                <div class="flex items-center w-full justify-between">
                                                    <div style="width: 80%">ID</div>
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
                                                <div class="flex items-center">
                                                    TITLE
                                                    <svg class="ml-10 w-4 h-4" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round">
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
                                                    AMOUNT
                                                    <svg class="ml-10 w-4 h-4" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <!-- Up chevron (positioned higher) -->
                                                        <path d="M7 8 L12 3 L17 8" />
                                                        <!-- Down chevron (positioned lower with gap) -->
                                                        <path d="M7 16 L12 21 L17 16" />
                                                    </svg>
                                                </div>
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium light-text-gray-500 uppercase tracking-wider min-w-[120px]">
                                                <div class="flex items-center justify-between">
                                                    <span class="whitespace-nowrap">BILL DATE</span>
                                                    <div class="flex flex-col ml-10">

                                                    </div>
                                                </div>
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium light-text-gray-500 uppercase tracking-wider min-w-[120px]">
                                                <div class="flex items-center justify-between">
                                                    <span class="whitespace-nowrap">NEXT BILL DATE</span>
                                                    <div class="flex flex-col ml-10">

                                                    </div>
                                                </div>
                                            </th>


                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium light-text-gray-500 uppercase tracking-wider">
                                                <div class="flex items-center">
                                                    <svg class="icon mr-10 w-4 h-4" viewBox="0 0 24 24"
                                                        fill="none" stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <!-- Up chevron (positioned higher) -->
                                                        <path d="M7 8 L12 3 L17 8" />
                                                        <!-- Down chevron (positioned lower with gap) -->
                                                        <path d="M7 16 L12 21 L17 16" />
                                                    </svg>
                                                    ACTION
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="light-bg-white light-bg-seo divide-y divide-gray-200">
                                        <!-- Row 1 -->
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-400">
                                                SUB #20</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm font-thin light-text-gray-900"> Diamond </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span
                                                    class="px-2 inline-flex text-xs text-gray-400 leading-5 font-semibold rounded-full">$5000</span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">27-06-2025
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">27-07-2025
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <div class="flex justify-end gap-2">
                                                    <button
                                                        class="light-text-orange-500 bg-gray-200 p-1 rounded-full light-hover-text-orange-700 open-ticket-modal"
                                                        data-action="view-project">
                                                        <img src="document-download.svg" alt="icon"
                                                            class="w-5 h-5 light-text-gray-900 rounded-full light-mode-icon"
                                                            data-dark-src="document-download-DARK.svg">
                                                    </button>
                                                    <button
                                                        class="light-text-orange-500 bg-gray-200 p-1 rounded-full light-hover-text-orange-700 open-ticket-modal"
                                                        data-action="view-project">
                                                        <img src="eye-DARK.svg" alt="icon"
                                                            class="w-5 h-5 light-text-gray-900 rounded-full light-mode-icon">
                                                    </button>
                                                </div>

                                            </td>
                                        </tr>
                                        <!-- Row 2 -->
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-400">
                                                SUB #19</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm font-thin light-text-gray-900"> Gold </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span
                                                    class="px-2 inline-flex text-xs text-gray-400 leading-5 font-semibold rounded-full">$4000</span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">27-02-2025
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">27-03-2025
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <div class="flex justify-end gap-2">
                                                    <button
                                                        class="light-text-orange-500 bg-gray-200 p-1 rounded-full light-hover-text-orange-700 open-ticket-modal"
                                                        data-action="view-project">
                                                        <img src="document-download.svg" alt="icon"
                                                            class="w-5 h-5 light-text-gray-900 rounded-full light-mode-icon"
                                                            data-dark-src="document-download-DARK.svg">
                                                    </button>
                                                    <button
                                                        class="light-text-orange-500 bg-gray-200 p-1 rounded-full light-hover-text-orange-700 open-ticket-modal"
                                                        data-action="view-project">
                                                        <img src="eye-DARK.svg" alt="icon"
                                                            class="w-5 h-5 light-text-gray-900 rounded-full light-mode-icon">
                                                    </button>
                                                </div>

                                            </td>
                                        </tr>
                                        <!-- Row 3 -->
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-400">
                                                SUB #18</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm font-thin light-text-gray-900"> Silver</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span
                                                    class="px-2 inline-flex text-xs text-gray-400 leading-5 font-semibold rounded-full">$3000</span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">27-01-2025
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">27-02-2025
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <div class="flex justify-end gap-2">
                                                    <button
                                                        class="light-text-orange-500 bg-gray-200 p-1 rounded-full light-hover-text-orange-700 open-ticket-modal"
                                                        data-action="view-project">
                                                        <img src="document-download.svg" alt="icon"
                                                            class="w-5 h-5 light-text-gray-900 rounded-full light-mode-icon"
                                                            data-dark-src="document-download-DARK.svg">
                                                    </button>
                                                    <button
                                                        class="light-text-orange-500 bg-gray-200 p-1 rounded-full light-hover-text-orange-700 open-ticket-modal"
                                                        data-action="view-project">
                                                        <img src="eye-DARK.svg" alt="icon"
                                                            class="w-5 h-5 light-text-gray-900 rounded-full light-mode-icon">
                                                    </button>
                                                </div>

                                            </td>
                                        </tr>
                                        <!-- Row 4 -->
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-400">
                                                SUB #17</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm font-thin light-text-gray-900">Gold</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span
                                                    class="px-2 inline-flex text-xs text-gray-400 leading-5 font-semibold rounded-full">$4000</span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">27-12-2024
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">27-01-2025
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <div class="flex justify-end gap-2">
                                                    <button
                                                        class="light-text-orange-500 bg-gray-200 p-1 rounded-full light-hover-text-orange-700 open-ticket-modal"
                                                        data-action="view-project">
                                                        <img src="document-download.svg" alt="icon"
                                                            class="w-5 h-5 light-text-gray-900 rounded-full light-mode-icon"
                                                            data-dark-src="document-download-DARK.svg">
                                                    </button>
                                                    <button
                                                        class="light-text-orange-500 bg-gray-200 p-1 rounded-full light-hover-text-orange-700 open-ticket-modal"
                                                        data-action="view-project">
                                                        <img src="eye-DARK.svg" alt="icon"
                                                            class="w-5 h-5 light-text-gray-900 rounded-full light-mode-icon">
                                                    </button>
                                                </div>

                                            </td>
                                        </tr>
                                        <!-- Row 5 -->
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-400">
                                                SUB #16</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm font-thin light-text-gray-900"> Gold</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span
                                                    class="px-2 inline-flex text-xs text-gray-400 leading-5 font-semibold rounded-full">$2000</span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">27-05-2024
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">27-06-2024
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <div class="flex justify-end gap-2">
                                                    <button
                                                        class="light-text-orange-500 bg-gray-200 p-1 rounded-full light-hover-text-orange-700 open-ticket-modal"
                                                        data-action="view-project">
                                                        <img src="document-download.svg" alt="icon"
                                                            class="w-5 h-5 light-text-gray-900 rounded-full light-mode-icon"
                                                            data-dark-src="document-download-DARK.svg">
                                                    </button>
                                                    <button
                                                        class="light-text-orange-500 bg-gray-200 p-1 rounded-full light-hover-text-orange-700 open-ticket-modal"
                                                        data-action="view-project">
                                                        <img src="eye-DARK.svg" alt="icon"
                                                            class="w-5 h-5 light-text-gray-900 rounded-full light-mode-icon">
                                                    </button>
                                                </div>

                                            </td>
                                        </tr>
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

                        <div id="addCredentialsContent" class="tab-content hidden">
                            <!-- Add Credentials content here -->
                            <!-- Overview Cards -->


                            <!-- SEO Plan Cards -->
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 " id="seo-cards">


                            </div>

                            <!-- Overview Cards -->
                            <div>
                                <h3 class="pb-3 font-semibold text-md light-text-black">Wizspeed Social Media Marketing
                                    Packages</h3>
                            </div>


                            <!-- Overview Cards -->
                            <div>
                                <h3 class="pb-3 font-semibold text-md light-text-black">Google PPC & Paid Campaign
                                    Optimization</h3>
                            </div>

                            <!-- SEO Plan Cards -->
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 " id="seo-cards">

                                <!-- Starter SEO -->
                                <div
                                    class="light-bg-f5f5f5 light-bg-seo p-10 rounded-xl shadow-sm flex flex-col relative overflow-hidden mb-8">
                                    <h3
                                        class="text-md font-normal text-black mb-2 w-32 p-3 rounded-full text-center light-bg-d7d7d7 light-text-black">
                                        Starter SEO</h3>

                                    <p class="text-5xl font-medium light-text-black mb-2 flex items-center">
                                        <span class="light-text-black"
                                            style="font-size: 24px; font-weight: 400;">&nbsp;</span>$199
                                        <span class="light-text-black ml-1 text-sm font-light"
                                            style="color:#AFAFAF;">/month</span>
                                    </p>

                                    <p class="light-text-black text-sm font-bold mb-6">Foundation & Fixes</p>

                                    <!-- Smoothly Toggleable Content
                <div class="card-content max-h-0 overflow-hidden transition-all duration-500 ease-in-out text-sm light-text-black mb-6">
                <ul class="pl-2 space-y-3">
                <li class="flex items-start gap-3">
                    <img src="seo-tick.svg" alt="icon" class="w-5 h-5 mt-1 light-mode-icon" data-dark-src="seo-tick-DARK.svg">
                    <span>Comprehensive SEO strategy</span>
                </li>
                <li class="flex items-start gap-3">
                    <img src="seo-tick.svg" alt="icon" class="w-5 h-5 mt-1 light-mode-icon" data-dark-src="seo-tick-DARK.svg">
                    <span>Dedicated SEO specialist</span>
                </li>
                <li class="flex items-start gap-3">
                    <img src="seo-tick.svg" alt="icon" class="w-5 h-5 mt-1 light-mode-icon" data-dark-src="seo-tick-DARK.svg">
                    <span>Advanced analytics & reporting</span>
                </li>
                <li class="flex items-start gap-3">
                    <img src="seo-tick.svg" alt="icon" class="w-5 h-5 mt-1 light-mode-icon" data-dark-src="seo-tick-DARK.svg">
                    <span>Conversion rate optimization (CRO)</span>
                </li>
                <li class="flex items-start gap-3">
                    <img src="seo-tick.svg" alt="icon" class="w-5 h-5 mt-1 light-mode-icon" data-dark-src="seo-tick-DARK.svg">
                    <span>International SEO (if applicable)</span>
                </li>
                <li class="flex items-start gap-3">
                    <img src="seo-tick.svg" alt="icon" class="w-5 h-5 mt-1 light-mode-icon" data-dark-src="seo-tick-DARK.svg">
                    <span>Monthly strategy calls</span>
                </li>
                </ul>
                <p class="mt-4 italic">Best for small business websites</p>
                </div>  -->

                                    <div class="flex items-center justify-between border-t dark-border-gray-500 pt-5">
                                        <div
                                            class="px-5  light-text-black border border-gray-200 dark:border-gray-500 light-transparent openModal py-1  rounded-md text-md">
                                            <button>View Info</button></div>
                                        <div class="bg-orange-600 px-5 py-1 text-white rounded-md text-md"><button>Buy
                                                Now</button></div>

                                    </div>

                                </div>

                                <!-- Growth SEO -->
                                <div
                                    class="light-bg-f5f5f5 light-bg-seo p-10 rounded-xl shadow-sm flex flex-col relative overflow-hidden mb-8">
                                    <h3
                                        class="text-md font-normal text-white mb-2 w-32 p-3 rounded-full text-center light-bg-00cfe8">
                                        Growth SEO</h3>

                                    <p class="text-5xl font-medium light-text-black mb-2 flex items-center">
                                        <span class="light-text-black"
                                            style="font-size: 24px; font-weight: 400;">&nbsp;</span>$499
                                        <span class="light-text-black ml-1 text-sm font-light"
                                            style="color:#AFAFAF;">/month</span>
                                    </p>

                                    <p class="light-text-black text-sm font-bold mb-6">Authority & Visibility Boost</p>

                                    <!-- Smoothly Toggleable Content
                <div class="card-content max-h-0 overflow-hidden transition-all duration-500 ease-in-out text-sm light-text-black mb-6">
                <ul class="pl-2 space-y-3">
                <li class="flex items-start gap-3">
                    <img src="seo-tick.svg" alt="icon" class="w-5 h-5 mt-1 light-mode-icon" data-dark-src="seo-tick-DARK.svg">
                    <span>Comprehensive SEO strategy</span>
                </li>
                <li class="flex items-start gap-3">
                    <img src="seo-tick.svg" alt="icon" class="w-5 h-5 mt-1 light-mode-icon" data-dark-src="seo-tick-DARK.svg">
                    <span>Dedicated SEO specialist</span>
                </li>
                <li class="flex items-start gap-3">
                    <img src="seo-tick.svg" alt="icon" class="w-5 h-5 mt-1 light-mode-icon" data-dark-src="seo-tick-DARK.svg">
                    <span>Advanced analytics & reporting</span>
                </li>
                <li class="flex items-start gap-3">
                    <img src="seo-tick.svg" alt="icon" class="w-5 h-5 mt-1 light-mode-icon" data-dark-src="seo-tick-DARK.svg">
                    <span>Conversion rate optimization (CRO)</span>
                </li>
                <li class="flex items-start gap-3">
                    <img src="seo-tick.svg" alt="icon" class="w-5 h-5 mt-1 light-mode-icon" data-dark-src="seo-tick-DARK.svg">
                    <span>International SEO (if applicable)</span>
                </li>
                <li class="flex items-start gap-3">
                    <img src="seo-tick.svg" alt="icon" class="w-5 h-5 mt-1 light-mode-icon" data-dark-src="seo-tick-DARK.svg">
                    <span>Monthly strategy calls</span>
                </li>
                </ul>

                <p class="mt-4 italic">Best for growing business websites</p>
                </div> -->

                                    <!-- Toggle Button -->

                                    <div class="flex items-center justify-between border-t dark-border-gray-500 pt-5">
                                        <div
                                            class="px-5  light-text-black border border-gray-200 dark:border-gray-500 light-transparent openModal py-1  rounded-md text-md">
                                            <button>View Info</button></div>
                                        <div class="bg-orange-600 px-5 py-1 text-white rounded-md text-md"><button>Buy
                                                Now</button></div>

                                    </div>

                                </div>

                                <!-- Pro SEO -->
                                <div
                                    class="light-bg-f5f5f5 light-bg-seo p-10 rounded-xl shadow-sm flex flex-col relative overflow-hidden mb-8">
                                    <h3 class="text-md font-normal text-white mb-2 w-32 p-3 rounded-full text-center light-bg-white light-text-black"
                                        style="background-color: #28C76F;">Pro SEO</h3>

                                    <p class="text-5xl font-medium light-text-black mb-2 flex items-center">
                                        <span class="light-text-black"
                                            style="font-size: 24px; font-weight: 400;">&nbsp;</span>$699
                                        <span class=" ml-1 text-sm font-light" style="color:#AFAFAF;">/month</span>
                                    </p>

                                    <p class="light-text-black text-sm font-bold mb-6">Full Strategy & National Reach
                                    </p>

                                    <!-- Smoothly Toggleable Content
                <div class="card-content max-h-0 overflow-hidden transition-all duration-500 ease-in-out text-sm light-text-black mb-6">
                <ul class="pl-2 space-y-3">
                <li class="flex items-start gap-3">
                    <img src="seo-tick.svg" alt="icon" class="w-5 h-5 mt-1 light-mode-icon" data-dark-src="seo-tick-DARK.svg">
                    <span>Comprehensive SEO strategy</span>
                </li>
                <li class="flex items-start gap-3">
                    <img src="seo-tick.svg" alt="icon" class="w-5 h-5 mt-1 light-mode-icon" data-dark-src="seo-tick-DARK.svg">
                    <span>Dedicated SEO specialist</span>
                </li>
                <li class="flex items-start gap-3">
                    <img src="seo-tick.svg" alt="icon" class="w-5 h-5 mt-1 light-mode-icon" data-dark-src="seo-tick-DARK.svg">
                    <span>Advanced analytics & reporting</span>
                </li>
                <li class="flex items-start gap-3">
                    <img src="seo-tick.svg" alt="icon" class="w-5 h-5 mt-1 light-mode-icon" data-dark-src="seo-tick-DARK.svg">
                    <span>Conversion rate optimization (CRO)</span>
                </li>
                <li class="flex items-start gap-3">
                    <img src="seo-tick.svg" alt="icon" class="w-5 h-5 mt-1 light-mode-icon" data-dark-src="seo-tick-DARK.svg">
                    <span>International SEO (if applicable)</span>
                </li>
                <li class="flex items-start gap-3">
                    <img src="seo-tick.svg" alt="icon" class="w-5 h-5 mt-1 light-mode-icon" data-dark-src="seo-tick-DARK.svg">
                    <span>Monthly strategy calls</span>
                </li>
                </ul>

                <p class="mt-4 italic">Best for large scale national reach</p>
                </div> -->

                                    <!-- Toggle Button -->

                                    <div class="flex items-center justify-between border-t dark-border-gray-500 pt-5">
                                        <div
                                            class="px-5  light-text-black border border-gray-200 dark:border-gray-500 light-transparent openModal py-1  rounded-md text-md">
                                            <button>View Info</button></div>
                                        <div class="bg-orange-600 px-5 py-1 text-white rounded-md text-md"><button>Buy
                                                Now</button></div>

                                    </div>


                                </div>

                            </div>

                            <!-- Overview Cards -->
                            <div>
                                <h3 class="pb-3 font-semibold text-md light-text-black">Wizspeed SEO + Social Media
                                    Marketing Bundle Packages</h3>
                            </div>

                            <!-- SEO Plan Cards -->
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 " id="seo-cards">

                                <!-- Starter SEO -->
                                <div
                                    class="light-bg-f5f5f5 light-bg-seo p-10 rounded-xl shadow-sm flex flex-col relative overflow-hidden mb-8">
                                    <h3
                                        class="text-md font-normal text-black mb-2 w-32 p-3 rounded-full text-center light-bg-d7d7d7 light-text-black">
                                        Starter SEO</h3>

                                    <p class="text-5xl font-medium light-text-black mb-2 flex items-center">
                                        <span class="light-text-black"
                                            style="font-size: 24px; font-weight: 400;">&nbsp;</span>$199
                                        <span class="light-text-black ml-1 text-sm font-light"
                                            style="color:#AFAFAF;">/month</span>
                                    </p>

                                    <p class="light-text-black text-sm font-bold mb-6">Foundation & Fixes</p>

                                    <!-- Smoothly Toggleable Content
                <div class="card-content max-h-0 overflow-hidden transition-all duration-500 ease-in-out text-sm light-text-black mb-6">
                <ul class="pl-2 space-y-3">
                <li class="flex items-start gap-3">
                    <img src="seo-tick.svg" alt="icon" class="w-5 h-5 mt-1 light-mode-icon" data-dark-src="seo-tick-DARK.svg">
                    <span>Comprehensive SEO strategy</span>
                </li>
                <li class="flex items-start gap-3">
                    <img src="seo-tick.svg" alt="icon" class="w-5 h-5 mt-1 light-mode-icon" data-dark-src="seo-tick-DARK.svg">
                    <span>Dedicated SEO specialist</span>
                </li>
                <li class="flex items-start gap-3">
                    <img src="seo-tick.svg" alt="icon" class="w-5 h-5 mt-1 light-mode-icon" data-dark-src="seo-tick-DARK.svg">
                    <span>Advanced analytics & reporting</span>
                </li>
                <li class="flex items-start gap-3">
                    <img src="seo-tick.svg" alt="icon" class="w-5 h-5 mt-1 light-mode-icon" data-dark-src="seo-tick-DARK.svg">
                    <span>Conversion rate optimization (CRO)</span>
                </li>
                <li class="flex items-start gap-3">
                    <img src="seo-tick.svg" alt="icon" class="w-5 h-5 mt-1 light-mode-icon" data-dark-src="seo-tick-DARK.svg">
                    <span>International SEO (if applicable)</span>
                </li>
                <li class="flex items-start gap-3">
                    <img src="seo-tick.svg" alt="icon" class="w-5 h-5 mt-1 light-mode-icon" data-dark-src="seo-tick-DARK.svg">
                    <span>Monthly strategy calls</span>
                </li>
                </ul>
                <p class="mt-4 italic">Best for small business websites</p>
                </div>  -->

                                    <div class="flex items-center justify-between border-t dark-border-gray-500 pt-5">
                                        <div
                                            class="px-5  light-text-black border border-gray-200 dark:border-gray-500 light-transparent openModal py-1  rounded-md text-md">
                                            <button>View Info</button></div>
                                        <div class="bg-orange-600 px-5 py-1 text-white rounded-md text-md"><button>Buy
                                                Now</button></div>

                                    </div>

                                </div>

                                <!-- Growth SEO -->
                                <div
                                    class="light-bg-f5f5f5 light-bg-seo p-10 rounded-xl shadow-sm flex flex-col relative overflow-hidden mb-8">
                                    <h3
                                        class="text-md font-normal text-white mb-2 w-32 p-3 rounded-full text-center light-bg-00cfe8">
                                        Growth SEO</h3>

                                    <p class="text-5xl font-medium light-text-black mb-2 flex items-center">
                                        <span class="light-text-black"
                                            style="font-size: 24px; font-weight: 400;">&nbsp;</span>$499
                                        <span class="light-text-black ml-1 text-sm font-light"
                                            style="color:#AFAFAF;">/month</span>
                                    </p>
                                    <p class="light-text-black text-sm font-bold mb-6">Authority & Visibility Boost</p>

                                    <!-- Smoothly Toggleable Content
                <div class="card-content max-h-0 overflow-hidden transition-all duration-500 ease-in-out text-sm light-text-black mb-6">
                <ul class="pl-2 space-y-3">
                <li class="flex items-start gap-3">
                    <img src="seo-tick.svg" alt="icon" class="w-5 h-5 mt-1 light-mode-icon" data-dark-src="seo-tick-DARK.svg">
                    <span>Comprehensive SEO strategy</span>
                </li>
                <li class="flex items-start gap-3">
                    <img src="seo-tick.svg" alt="icon" class="w-5 h-5 mt-1 light-mode-icon" data-dark-src="seo-tick-DARK.svg">
                    <span>Dedicated SEO specialist</span>
                </li>
                <li class="flex items-start gap-3">
                    <img src="seo-tick.svg" alt="icon" class="w-5 h-5 mt-1 light-mode-icon" data-dark-src="seo-tick-DARK.svg">
                    <span>Advanced analytics & reporting</span>
                </li>
                <li class="flex items-start gap-3">
                    <img src="seo-tick.svg" alt="icon" class="w-5 h-5 mt-1 light-mode-icon" data-dark-src="seo-tick-DARK.svg">
                    <span>Conversion rate optimization (CRO)</span>
                </li>
                <li class="flex items-start gap-3">
                    <img src="seo-tick.svg" alt="icon" class="w-5 h-5 mt-1 light-mode-icon" data-dark-src="seo-tick-DARK.svg">
                    <span>International SEO (if applicable)</span>
                </li>
                <li class="flex items-start gap-3">
                    <img src="seo-tick.svg" alt="icon" class="w-5 h-5 mt-1 light-mode-icon" data-dark-src="seo-tick-DARK.svg">
                    <span>Monthly strategy calls</span>
                </li>
                </ul>

                <p class="mt-4 italic">Best for growing business websites</p>
                </div> -->

                                    <!-- Toggle Button -->

                                    <div class="flex items-center justify-between border-t dark-border-gray-500 pt-5">
                                        <div
                                            class="px-5  light-text-black border border-gray-200 dark:border-gray-500 light-transparent openModal py-1  rounded-md text-md">
                                            <button>View Info</button></div>
                                        <div class="bg-orange-600 px-5 py-1 text-white rounded-md text-md"><button>Buy
                                                Now</button></div>

                                    </div>

                                </div>

                                <!-- Pro SEO -->
                                <div
                                    class="light-bg-f5f5f5 light-bg-seo p-10 rounded-xl shadow-sm flex flex-col relative overflow-hidden mb-8">
                                    <h3 class="text-md font-normal text-white mb-2 w-32 p-3 rounded-full text-center light-bg-white light-text-black"
                                        style="background-color: #28C76F;">Pro SEO</h3>

                                    <p class="text-5xl font-medium light-text-black mb-2 flex items-center">
                                        <span class="light-text-black"
                                            style="font-size: 24px; font-weight: 400;">&nbsp;</span>$699
                                        <span class=" ml-1 text-sm font-light" style="color:#AFAFAF;">/month</span>
                                    </p>

                                    <p class="light-text-black text-sm font-bold mb-6">Full Strategy & National Reach
                                    </p>

                                    <!-- Smoothly Toggleable Content
                <div class="card-content max-h-0 overflow-hidden transition-all duration-500 ease-in-out text-sm light-text-black mb-6">
                <ul class="pl-2 space-y-3">
                <li class="flex items-start gap-3">
                    <img src="seo-tick.svg" alt="icon" class="w-5 h-5 mt-1 light-mode-icon" data-dark-src="seo-tick-DARK.svg">
                    <span>Comprehensive SEO strategy</span>
                </li>
                <li class="flex items-start gap-3">
                    <img src="seo-tick.svg" alt="icon" class="w-5 h-5 mt-1 light-mode-icon" data-dark-src="seo-tick-DARK.svg">
                    <span>Dedicated SEO specialist</span>
                </li>
                <li class="flex items-start gap-3">
                    <img src="seo-tick.svg" alt="icon" class="w-5 h-5 mt-1 light-mode-icon" data-dark-src="seo-tick-DARK.svg">
                    <span>Advanced analytics & reporting</span>
                </li>
                <li class="flex items-start gap-3">
                    <img src="seo-tick.svg" alt="icon" class="w-5 h-5 mt-1 light-mode-icon" data-dark-src="seo-tick-DARK.svg">
                    <span>Conversion rate optimization (CRO)</span>
                </li>
                <li class="flex items-start gap-3">
                    <img src="seo-tick.svg" alt="icon" class="w-5 h-5 mt-1 light-mode-icon" data-dark-src="seo-tick-DARK.svg">
                    <span>International SEO (if applicable)</span>
                </li>
                <li class="flex items-start gap-3">
                    <img src="seo-tick.svg" alt="icon" class="w-5 h-5 mt-1 light-mode-icon" data-dark-src="seo-tick-DARK.svg">
                    <span>Monthly strategy calls</span>
                </li>
                </ul>

                <p class="mt-4 italic">Best for large scale national reach</p>
                </div> -->

                                    <!-- Toggle Button -->

                                    <div class="flex items-center justify-between border-t dark-border-gray-500 pt-5">
                                        <div
                                            class="px-5  light-text-black border border-gray-200 dark:border-gray-500 light-transparent openModal py-1  rounded-md text-md">
                                            <button>View Info</button></div>
                                        <div class="bg-orange-600 px-5 py-1 text-white rounded-md text-md"><button>Buy
                                                Now</button></div>

                                    </div>


                                </div>

                            </div>



                        </div>

                        <!-- Overview Cards -->


                        <!-- SEO Plan Cards -->





                        <!-- Bottom Cards: Need Help & Free Consulting -->

                    </div>
        </main>
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
                <h2 class="text-lg light-text-black  font-semibold">Add Leads</h2>
            </div>
            <div class=""> <!-- Container for heading + divider -->
                <div class="border-t border-gray-600 w-full mt-4"></div>
            </div>

            <!-- Ticket Form -->
            <form id="ticketForm" class="space-y-4 p-6" action="{{ route('lead.store') }}" method="POST">
                @csrf
                <!-- Title, Project Name, Priority -->
                <div class="grid grid-cols-1 gap-4">
                    <div class="grid grid-cols-2 gap-2">
                        <div>
                            <label class="block text-sm mb-1 light-text-black">Lead Name</label>
                            <input type="text" name="lead_name" value="{{old('lead_name')}}" placeholder="John"
                                class="w-full p-2 rounded light-bg-d7d7d7 border border-gray-700 text-white focus:outline-none">
                        </div>
                        <div>
                            <label class="block text-sm mb-1 light-text-black">Business Name</label>
                            <input type="text" name="business_name" value="{{old('business_name')}}" placeholder="Wizspeed Tech Ltd"
                                class="w-full p-2 rounded light-bg-d7d7d7 border border-gray-700 text-white focus:outline-none">
                        </div>
                    </div>
                    <div class="grid-cols-1 gap-4">
                        <div class="grid grid-cols-2 gap-2">
                            <div>
                                <label class="block text-sm mb-1 light-text-black">Email</label>
                                <div class="relative flex-grow">
                                    <input type="text" name="email" value="{{old('email')}}" placeholder="abc123@email.com"
                                        class="w-full p-2 pr-16 rounded light-bg-d7d7d7 border border-gray-700 text-white focus:outline-none">

                                </div>
                            </div>
                            <div>
                                <label class="block text-sm mb-1 light-text-black">Phone Number</label>
                                <div class="relative flex-grow">
                                    <input type="text" name="phone" value="{{old('phone')}}" placeholder="0000-000-0000"
                                        class="w-full p-2 pr-16 rounded light-bg-d7d7d7 border border-gray-700 text-white focus:outline-none">

                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="grid-cols-1 gap-4">
                        <div>
                            <label class="block text-sm mb-1 light-text-black">Business Name </label>
                            <div class="relative flex-grow">
                                <input type="text" name="title" placeholder="Wizspeed Tech Ltd"
                                    class="w-full p-2 pr-16 rounded light-bg-d7d7d7 border border-gray-700 text-white focus:outline-none">
                            </div>
                        </div>
                    </div> --}}


                    <div class="grid grid-cols-3  gap-4">
                        <div>
                            <label class="block text-sm mb-1 light-text-black">Country</label>
                            {{-- <select name="country"
                                class="w-full p-2 rounded light-bg-d7d7d7 border border-gray-700 light-text-black">
                                <option value="" {{ old('country') ? '' : 'selected' }} hidden>Select Country
                                </option>
                                <option value="Pakistan" {{ old('country') == 'Pakistan' ? 'selected' : '' }}>
                                    Pakistan</option>
                                <option value="Punjab" {{ old('country') == 'Punjab' ? 'selected' : '' }}>Punjab
                                </option>
                                <option value="Sindh" {{ old('country') == 'Sindh' ? 'selected' : '' }}>Sindh
                                </option>
                                <option value="Balochistan" {{ old('country') == 'Balochistan' ? 'selected' : '' }}>
                                    Balochistan</option>
                            </select> --}}

                            <select id="mySelect" name="country"  class=" w-full p-2 rounded light-bg-d7d7d7 border border-gray-700 light-text-black">
                                <option value=""selected hidden style="color: #fff">Choose Country</option>
                            </select>
                        </div>

                        <!-- State Selection -->
                        <div>
                            <label class="block text-sm mb-1 light-text-black">City</label>
                            {{-- <select name="city"
                                class="w-full p-2 rounded light-bg-d7d7d7 border border-gray-700 light-text-black">
                                <option value="">Manshera</option>
                                <option value="KPK">KPK</option>
                                <option value="Punjab">Punjab</option>
                                <option value="Manshera">Manshera</option>
                                <option value="Balochistan">Balochistan</option>
                            </select> --}}
                             <input type="text" name="city" placeholder="City" value="{{ old('city') }}"
                                class="w-full p-2 rounded light-bg-d7d7d7 border border-gray-700 text-white focus:outline-none">
                        </div>

                        <!-- City Selection -->
                        <div>
                            <label class="block text-sm mb-1 light-text-black">Status</label>
                            <select name="status"
                                class="w-full p-2 rounded light-bg-d7d7d7 border border-gray-700 light-text-black">
                                <option value="" {{ old('status') ? '' : 'selected' }} hidden>Select status
                                </option>
                                <option value="Active" {{ old('status') == 'Active' ? 'selected' : '' }}>Active
                                </option>
                                <option value="In Active" {{ old('status') == 'In Active' ? 'selected' : '' }}>In Active
                                </option>
                            </select>
                        </div>

                    </div>
                    <div class="grid grid-cols-3  gap-4">
                        <div>
                            <label class="block text-sm mb-1 light-text-black">Lead Source</label>
                            <select name="lead_source"
                                class="w-full p-2 rounded light-bg-d7d7d7 border border-gray-700 light-text-black">
                                <option value="" {{ old('lead_source') ? '' : 'selected' }} hidden>Select Lead Source
                                </option>
                                <option value="Website" {{ old('lead_source') == 'Website' ? 'selected' : '' }}>Website
                                </option>
                                <option value="Referral" {{ old('lead_source') == 'Referral' ? 'selected' : '' }}>Referral
                                </option>
                                <option value="Social Media" {{ old('lead_source') == 'Social Media' ? 'selected' : '' }}>
                                    Social Media</option>
                                <option value="Email Campaign"
                                    {{ old('lead_source') == 'Email Campaign' ? 'selected' : '' }}>Email Campaign</option>
                            </select>
                        </div>

                        <!-- State Selection -->
                        <div>
                            <label class="block text-sm mb-1 light-text-black">Lead Status</label>
                            <select name="lead_status"
                                class="w-full p-2 rounded light-bg-d7d7d7 border border-gray-700 light-text-black">
                                <option value="" {{ old('lead_status') ? '' : 'selected' }} hidden>Select status
                                </option>
                                <option value="In Process" {{ old('lead_status') == 'In Process' ? 'selected' : '' }}>In Process
                                </option>
                                <option value="Converted" {{ old('lead_status') == 'Converted' ? 'selected' : '' }}>Converted
                                </option>
                                <option value="Not Converted" {{ old('lead_status') == 'Not Converted' ? 'selected' : '' }}>Not Converted
                                </option>
                            </select>
                        </div>

                        <!-- City Selection -->
                        <div>
                            <label class="block text-sm mb-1 light-text-black">Memberships</label>
                            <select name="memberships"
                                class="w-full p-2 rounded light-bg-d7d7d7 border border-gray-700 light-text-black">
                                <option value="" {{ old('memberships') ? '' : 'selected' }} hidden>Select
                                    Memberships</option>
                                <option value="Basic" {{ old('memberships') == 'Basic' ? 'selected' : '' }}>Basic
                                </option>
                                <option value="Gold" {{ old('memberships') == 'Gold' ? 'selected' : '' }}>Gold
                                </option>
                                <option value="Premium" {{ old('memberships') == 'Premium' ? 'selected' : '' }}>
                                    Premium</option>
                            </select>
                        </div>

                    </div>

                </div>


                <!-- Buttons -->
                <div class="flex justify-end items-center">

                    <div class="flex justify-end gap-3 pt-3">
                        {{-- <button type="button" id="cancelTicket"
                            class="px-4 py-2 light-text-black light-bg-d7d7d7 rounded-lg hover:bg-gray-600">
                            Cancel
                        </button> --}}
                        <button type="submit" class="px-4 py-2 bg-orange-500  rounded-lg hover:bg-orange-600">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <!-- Edit Modal -->
    <div id="paymentModal"
        class="fixed inset-0 bg-black bg-opacity-50 flex items-center z-50 justify-center hidden">
        <div
            class="light-bg-d9d9d9 bg-white text-white rounded-lg shadow-lg w-[900px] max-h-[90vh] overflow-y-auto relative">
            <button id="closePaymentModal" class="absolute top-3 right-3 text-gray-400 hover:text-white">✕</button>

            <div class="px-6 py-3">
                <h2 class="text-lg light-text-black font-semibold">Add Payment Method</h2>
            </div>
            <div class="border-t border-gray-600 w-full mt-4"></div>

            <form id="paymentForm" class="space-y-4 p-6">
                <!-- Card Holder Name -->


                <!-- Card Number -->
                <div>
                    <label class="block text-sm mb-1 light-text-black">Card Number</label>
                    <div class="relative">
                        <input type="text" name="cardNumber" placeholder="1234 **** **** ****"
                            class="w-full p-2 pr-16 rounded light-bg-d7d7d7 border border-gray-700 text-white focus:outline-none">
                        <div class="absolute right-2 top-1/2 transform -translate-y-1/2 flex gap-2">
                            <img src="paypal.svg" class="w-8 h-8" alt="PayPal">
                            <img src="visa-4-logo-svgrepo-com.svg" class="w-8 h-8" alt="Visa">
                            <img src="mastercard-3-svgrepo-com.svg" class="w-8 h-8" alt="Mastercard">
                        </div>
                    </div>
                </div>

                <!-- CVC and Expiry -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm mb-1 light-text-black">CVC Number</label>
                        <input type="text" name="cvc" placeholder="123"
                            class="w-full p-2 rounded light-bg-d7d7d7 border border-gray-700 text-white focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-sm mb-1 light-text-black">Expiration Date</label>
                        <div class="relative">
                            <input type="text" name="expiry" placeholder="08/12"
                                class="w-full p-2 pr-12 rounded light-bg-d7d7d7 border border-gray-700 text-white focus:outline-none">
                            <div class="absolute right-2 top-1/2 transform -translate-y-1/2">
                                <img src="calendar.svg" class="w-6 h-6" alt="Calendar">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Address Fields -->
                <div>
                    <label class="block text-sm mb-1 light-text-black">Address Line 1</label>
                    <input type="text" name="address1" placeholder="Street address"
                        class="w-full p-2 rounded light-bg-d7d7d7 border border-gray-700 text-white focus:outline-none">
                </div>

                <div>
                    <label class="block text-sm mb-1 light-text-black">Address Line 2 (optional)</label>
                    <input type="text" name="address2" placeholder="Apt, suite, etc."
                        class="w-full p-2 rounded light-bg-d7d7d7 border border-gray-700 text-white focus:outline-none">
                </div>

                <!-- City/State/Zip -->
                <div class="grid grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm mb-1 light-text-black">ZIP Code</label>
                        <input type="text" name="zip" placeholder="123"
                            class="w-full p-2 rounded light-bg-d7d7d7 border border-gray-700 text-white focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-sm mb-1 light-text-black">State</label>
                        <select class="w-full p-2 rounded light-bg-d7d7d7 border border-gray-700 light-text-black">
                            <option value="">Select State</option>
                            <option value="KPK">KPK</option>
                            <option value="Punjab">Punjab</option>
                            <option value="Sindh">Sindh</option>
                            <option value="Balochistan">Balochistan</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm mb-1 light-text-black">City</label>
                        <select class="w-full p-2 rounded light-bg-d7d7d7 border border-gray-700 light-text-black">
                            <option value="">Select City</option>
                            <option value="Mansehra">Mansehra</option>
                            <option value="Peshawar">Peshawar</option>
                            <option value="Abbottabad">Abbottabad</option>
                            <option value="Swat">Swat</option>
                        </select>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="flex justify-end gap-3 pt-3">
                    <button type="button" id="cancelPayment"
                        class="px-4 py-2 light-text-black light-bg-d7d7d7 rounded-lg hover:bg-gray-600">
                        Cancel
                    </button>
                    <button type="submit" class="px-4 py-2 bg-orange-500 rounded-lg hover:bg-orange-600">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>

    @if (session('AddLeads'))
        <div style="z-index: 9999 !important;"
            class="success-message fixed top-5 right-5 bg-green-500 text-white px-4 py-2 rounded shadow-lg">
            {{ session('AddLeads') }}
        </div>
        <style>
            #page-loader {
                display: none !important;
            }
        </style>
    @endif

    @if (session('UpdateLead'))
        <div style="z-index: 9999 !important;"
            class="success-message fixed top-5 right-5 bg-green-500 text-white px-4 py-2 rounded shadow-lg">
            {{ session('UpdateLead') }}
        </div>
        <style>
            #page-loader {
                display: none !important;
            }
        </style>
    @endif

    @if (session('DeleteLead'))
        <div style="z-index: 9999 !important;"
            class="success-message fixed top-5 right-5 bg-red-500 text-white px-4 py-2 rounded shadow-lg">
            {{ session('DeleteLead') }}
        </div>
        <style>
            #page-loader {
                display: none !important;
            }
        </style>
    @endif

    @if ($errors->any())
        <div style="z-index: 9999 !important;"
            class="success-message fixed top-5 right-5 bg-red-500 text-white px-4 py-2 rounded shadow-lg">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <style>
            #page-loader {
                display: none !important;
            }
        </style>
    @endif




        @if ($errors->any())
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const ticketModal = document.getElementById('ticketModal');
                if (ticketModal) {
                    ticketModal.classList.remove('hidden');
                }
            });
        </script>
    @endif

    <script>
        function updateDropdownStyle(select) {
            const value = select.value;

            if (value === 'In Process') {
                select.style.backgroundColor = '#00CFE826';
                select.style.color = 'white';
            } else if (value === 'Converted') {
                select.style.backgroundColor = 'green';
                select.style.color = 'white';
            } else if (value === 'Not Converted') {
                select.style.backgroundColor = 'red';
                select.style.color = 'white';
            }
        }

    document.addEventListener("DOMContentLoaded", function () {
        const selects = document.querySelectorAll(".statusDropdown");
        selects.forEach(select => updateDropdownStyle(select));
    });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
     <script src="//cdn.datatables.net/2.3.4/js/dataTables.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Initialize DataTable
            const table = new DataTable('#myTable',{
                dom: 't',
                ordering: false,
                pageLength: 5,
                drawCallback: function(settings) {
                    var api = this.api();
                    var pageInfo = api.page.info();
                    var currentPage = pageInfo.page; // zero-based page index
                    var totalPages = pageInfo.pages;

                    // Enable/disable Previous button
                    $('#prev-btn').prop('disabled', currentPage === 0);
                    // Enable/disable Next button
                    $('#next-btn').prop('disabled', currentPage === (totalPages - 1));

                    // Update page buttons active style
                    $('.page-btn').each(function(index) {
                        if (index === currentPage) {
                        $(this).addClass('bg-orange-600 text-white font-semibold').removeClass('hover:bg-orange-600 text-white');
                        } else {
                        $(this).removeClass('bg-orange-600 text-white font-semibold').addClass('hover:bg-orange-600 text-white');
                        }
                    });
                }
            });

            // Page button clicks
            $('.page-btn').on('click', function() {
                var pageNum = parseInt($(this).text()) - 1; // convert to zero-based index
                table.page(pageNum).draw('page');
            });

            // Previous button click
            $('#prev-btn').on('click', function() {
                table.page('previous').draw('page');
            });

            // Next button click
            $('#next-btn').on('click', function() {
                table.page('next').draw('page');
            });

            // Custom search input
            const customSearch = document.getElementById('dt-search-0');

            customSearch.addEventListener('input', function () {    
                table.search(this.value).draw();
            });

            // ✅ Custom page length selector
            const customLength = document.getElementById('dt-length-0');
            customLength.addEventListener('change', function () {
            const val = parseInt(this.value);
            if (!isNaN(val)) {
                table.page.len(val).draw();
            }
            });

            // ✅ Custom Info Updater
            table.on('draw', function () {
                const info = table.page.info();
                document.getElementById('myTable_info').textContent =
                `Showing ${info.start + 1} to ${info.end} of ${info.recordsTotal} entries`;
            });


            
        });
    </script>


    <script>
        
        document.addEventListener('DOMContentLoaded', () => {


            const select = document.getElementById('mySelect');

            fetch('https://restcountries.com/v3.1/all?fields=name')
            .then(res => res.json())
            .then(data => {
                
                data.sort((a, b) => a.name.common.localeCompare(b.name.common));

                data.forEach(country => {
                const option = document.createElement('option');
                option.value = country.name.common;
                option.textContent = country.name.common;
                select.appendChild(option);
                });

                new Choices(select, {
                searchEnabled: true,
                itemSelectText: '',
                shouldSort: false,
                });
            })
            .catch(err => {
                console.error('Error fetching countries:', err);
            });


            setTimeout(function() {
                const messages = document.querySelectorAll('.success-message');
                messages.forEach(function(el) {
                    el.style.display = 'none';
                });
            }, 5000);
            const body = document.body;
            const knowledgeButton = document.getElementById('knowledgeButton');
            const filterButton = document.getElementById('filterButton');
            const filterDropdown = document.getElementById('filterDropdown');

            // ✅ Dropdown toggle
            const filterButtons = document.querySelectorAll('[id^="filterButton"]');
            const filterDropdowns = document.querySelectorAll('[id^="filterDropdown"]');

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
        document.addEventListener('DOMContentLoaded', () => {
            // Initialize Ticket Modal
            const ticketModal = document.getElementById('ticketModal');
            const closeTicketModal = document.getElementById('closeTicketModal');
            const cancelTicket = document.getElementById('cancelTicket');
            const ticketForm = document.getElementById('ticketForm');
            const openTicketButtons = document.querySelectorAll('.openTicketModal');

            // Initialize Payment Modal
            const paymentModal = document.getElementById('paymentModal');
            const closePaymentModal = document.getElementById('closePaymentModal');
            const cancelPayment = document.getElementById('cancelPayment');
            const paymentForm = document.getElementById('paymentForm');
            const openPaymentButtons = document.querySelectorAll('.openPaymentModal');

            // Ticket Modal Handlers
            openTicketButtons.forEach(btn => {
                btn.addEventListener('click', () => ticketModal.classList.remove('hidden'));
            });
            closeTicketModal.addEventListener('click', () => ticketModal.classList.add('hidden'));
            cancelTicket.addEventListener('click', () => ticketModal.classList.add('hidden'));
            ticketForm.addEventListener('submit', (e) => {
                e.preventDefault();
                console.log('Ticket form submitted');
                ticketModal.classList.add('hidden');
            });

            // Payment Modal Handlers
            openPaymentButtons.forEach(btn => {
                btn.addEventListener('click', () => paymentModal.classList.remove('hidden'));
            });
            closePaymentModal.addEventListener('click', () => paymentModal.classList.add('hidden'));
            cancelPayment.addEventListener('click', () => paymentModal.classList.add('hidden'));
            paymentForm.addEventListener('submit', (e) => {
                e.preventDefault();
                console.log('Payment form submitted');
                paymentModal.classList.add('hidden');
            });

            // Outside click handler for both modals
            window.addEventListener('click', (e) => {
                if (e.target === ticketModal) ticketModal.classList.add('hidden');
                if (e.target === paymentModal) paymentModal.classList.add('hidden');
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const tabButtons = document.querySelectorAll('.tab-btn');
            const tabContents = document.querySelectorAll('.tab-content');
            const tabWrappers = document.querySelectorAll('.tab-wrapper');

            function activateTab(tabId) {
                // Reset all tabs first
                tabContents.forEach(content => content.classList.add('hidden'));
                tabWrappers.forEach(wrapper => {
                    wrapper.classList.remove(
                        'active',
                        'light-bg-gray-1',
                        'light-bg-orange-500',
                        'rounded-full'
                    );
                });
                tabButtons.forEach(button => {
                    button.classList.remove('text-black', 'dark:text-white');
                    button.classList.add('light-text-gray-500', 'dark:text-gray-400');
                });

                // Activate the selected tab
                const selectedTab = document.querySelector(`.tab-btn[data-tab="${tabId}"]`);
                if (selectedTab) {
                    const wrapper = selectedTab.closest('.tab-wrapper');
                    const content = document.getElementById(`${tabId}Content`);

                    if (wrapper) {
                        wrapper.classList.add(
                            'active',
                            'light-bg-orange-500',
                            'light-bg-gray-1',
                            'rounded-full',
                            'light-hover-bg-gray-300'
                        );
                    }

                    selectedTab.classList.remove('light-text-gray-500', 'dark:text-gray-400');
                    selectedTab.classList.add('text-black', 'dark:text-white');

                    if (content) {
                        content.classList.remove('hidden');
                    }
                }
            }

            // Add click handlers
            tabButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const tabId = this.getAttribute('data-tab');
                    activateTab(tabId);
                });
            });

            // ✅ Set first tab as default
            if (tabButtons.length > 0) {
                activateTab(tabButtons[0].getAttribute('data-tab'));
            }
        });
    </script>

</body>

</html>

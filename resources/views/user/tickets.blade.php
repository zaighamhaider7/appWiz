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
    <!-- Quill CSS -->
    <link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet" />
    <!-- Emoji Plugin -->
    <link href="https://cdn.jsdelivr.net/npm/quill-emoji@0.2.0/dist/quill-emoji.css" rel="stylesheet" />
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

        .dark-mode .light-bg-bill {
            background-color: #121212 !important;
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

            .ql-snow .ql-editor.ql-blank::before {
                color: #616060; 
                font-style: italic;
            }
        }
    </style>

</head>

<body>
    @include('layouts.loader')
    <div class="flex min-h-screen light-bg-white">
        <!-- Sidebar -->
        @include('layouts.sidebar')

        <!-- Main Content Area -->
        <main class="flex-1 overflow-y-auto">
            <!-- Header -->
            @include('layouts.header')

            <div class="p-6 light-bg-bill -mt-5 lg:p-8">

                <!-- Projects Title -->
                <h1 class="text-3xl font-bold light-text-gray-800 mb-10">Tickets</h1>

                <!-- Connect Domain Section -->


                <div class="grid grid-cols-1 lg:grid-cols-1 gap-6 mb-6">
                    <!-- User's Projects List Table -->
                    <div class="lg:col-span-2 light-bg-f5f5f5 light-bg-seo  rounded-xl shadow-sm">
                        <div class="flex items-center justify-between  p-6 flex-wrap gap-3">
                            <h2 class="text-xl font-semibold light-text-gray-800">Tickets List</h2>
                            <div class="flex items-center space-x-3">
                                <div class="relative">
                                    <input type="text" placeholder="Search here"
                                        class="pl-10 pr-4 py-2 rounded-lg light-border-gray-300 focus:outline-none focus:ring-1 focus:ring-orange-500">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="icon text-gray-400" viewBox="0 0 24 24">
                                            <circle cx="11" cy="11" r="8"></circle>
                                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
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
                                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path d="M7 16 L12 21 L17 16" /> <!-- Down chevron -->
                                                </svg>
                                            </div>
                                        </button>
                                        <button id="openTicketButton"
                                            class="flex items-center justify-center px-4 py-2 rounded-lg bg-white light-bg-d7d7d7 light-text-gray-700 border light-border-gray-300 text-gray-700 hover:bg-gray-200 transition-colors">
                                            <div class="flex">
                                                <span class="open-ticket-modal">Add New Ticket</span>
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
                                <thead class="light-bg-d9d9d9">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3  text-left text-xs
    font-medium light-text-gray-500 uppercase tracking-wider">
                                            <div class="flex items-center w-full justify-between">
                                                <div style="width: 80%">TICKET ID</div>
                                                <div style="width: 20%;">
                                                    <svg class=" w-8 h-4" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round">
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
                                                PRIORITY
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
                                            class="px-6 py-3 text-left text-xs font-medium light-text-gray-500 uppercase tracking-wider min-w-[120px]">
                                            <div class="flex items-center justify-between">
                                                <span class="whitespace-nowrap">BILLING DATE</span>
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

                                @php
                                    $count = 1;
                                @endphp
                                <tbody class="light-bg-white light-bg-seo divide-y divide-gray-200">
                                    @if ($ticketData->count() > 0)
                                        @foreach ($ticketData as $ticket)
                                            <tr class="border-b-2 light-border-gray-300">
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-400">
                                                    Ticket {{ $count++ }}</td>

                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm font-thin light-text-gray-900">
                                                        {{ $ticket->title }}</div>
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap">

                                                    @if ($ticket->priority == 'Low')
                                                        <span
                                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-900 text-green-400 bg-opacity-50">Low</span>
                                                    @elseif($ticket->priority == 'Medium')
                                                        <span
                                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-cyan-900 bg-opacity-50 text-cyan-400">Medium</span>
                                                    @elseif($ticket->priority == 'High')
                                                        <span
                                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-900 bg-opacity-50 text-red-400">High</span>
                                                    @endif
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm font-thin light-text-gray-900">
                                                        {{ $ticket->created_at->calendar() }}</div>
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap">

                                                    @if ($ticket->status == 'Pending')
                                                        <div class="flex ml-8 items-center ">
                                                            <div class="bg-blue-200 rounded-full w-2.5 h-2.5">
                                                                <div class="bg-yellow-400 h-2.5 rounded-full w-full">
                                                                </div>
                                                            </div>
                                                            <span
                                                                class="ml-2 text-sm items-center text-gray-400">Pending</span>
                                                        </div>
                                                    @elseif($ticket->status == 'In Progress')
                                                        <div class="flex ml-8 items-center ">
                                                            <div class="bg-gray-200 rounded-full w-2.5 h-2.5">
                                                                <div class="bg-cyan-400 h-2.5 rounded-full w-full">
                                                                </div>
                                                            </div>
                                                            <span class="ml-2 text-sm items-center text-gray-400">In
                                                                Progress</span>
                                                        </div>
                                                    @elseif($ticket->status == 'Resolved')
                                                        <div class="flex ml-8 items-center ">
                                                            <div class="bg-gray-200 rounded-full w-2.5 h-2.5">
                                                                <div class="bg-green-500 h-2.5 rounded-full w-full">
                                                                </div>
                                                            </div>
                                                            <span
                                                                class="ml-2 text-sm items-center text-gray-400">Resolved</span>
                                                        </div>
                                                    @elseif($ticket->status == 'Cancelled')
                                                        <div class="flex ml-8 items-center ">
                                                            <div class="bg-gray-200 rounded-full w-2.5 h-2.5">
                                                                <div class="bg-red-500 h-2.5 rounded-full w-full">
                                                                </div>
                                                            </div>
                                                            <span
                                                                class="ml-2 text-sm items-center text-gray-400">Cancelled</span>
                                                        </div>
                                                    @endif
                                                </td>

                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                                    <button
                                                        class="light-text-orange-500 light-hover-text-orange-700 open-chat-modal"
                                                        id="openChatModal" data-action="view-project">
                                                        <img src="{{ asset('assets/message.svg') }}" alt="icon"
                                                            data-ticket-id="{{ $ticket->id }}"
                                                            class="ticket-chat w-6 h-6 light-text-gray-900 rounded-full  light-mode-icon"
                                                            data-dark-src="{{ asset('assets/message-DARK.svg') }}">
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="7"
                                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-400 text-left">
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

                <!-- Overview Cards -->


                <!-- SEO Plan Cards -->





                <!-- Bottom Cards: Need Help & Free Consulting -->

            </div>
        </main>
    </div>




    <!-- New Ticket Modal -->
    <div id="newTicketModal"
        class="fixed inset-0 bg-black bg-opacity-50 flex items-center z-50 justify-center hidden">
        <div class="light-bg-d9d9d9 bg-white text-white rounded-lg shadow-lg w-[900px]  relative">
            <!-- Close Button -->
            <button id="closeTicketModal" class="absolute top-3 right-3 text-gray-400 hover:text-white">
                ✕
            </button>

            <div class="px-6 py-3"> <!-- Container for heading + divider -->
                <h2 class="text-lg light-text-black  font-semibold">New Ticket</h2>
            </div>
            <div class=""> <!-- Container for heading + divider -->
                <div class="border-t border-gray-600 w-full mt-4"></div>
            </div>

            <!-- Ticket Form -->
            <form id="ticketForm" class="space-y-4 p-6" method="POST" action="{{ route('ticket.store') }}"
                enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="user_id" value="{{ auth()->id() }}">

                <!-- Title, Project Name, Priority -->
                <div class="grid grid-cols-3 gap-4">

                    <div>
                        <label class="block text-sm mb-1 light-text-black">Title</label>
                        <input type="text" name="title" value="{{ old('title') }}"
                            placeholder="Ticket name here..."
                            class="w-full p-2 rounded light-bg-d7d7d7 border border-gray-700 text-white focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-sm mb-1 light-text-black">Project Name</label>
                        <select name="project_id"
                            class="w-full p-2 rounded light-bg-d7d7d7 border border-gray-700 light-text-black">
                            <option value="" selected hidden>Select Project</option>
                            @if ($projectData->count() > 0)
                                @foreach ($projectData as $project)
                                    <option value="{{ $project->id }}">{{ $project->project_name }}</option>
                                @endforeach
                            @else
                                <option value="" selected hidden>No project assign to you</option>
                            @endif
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm mb-1 light-text-black">Priority</label>
                        <select name="priority"
                            class="w-full p-2 rounded light-bg-d7d7d7 border border-gray-700 light-text-black">
                            <option value="" selected hidden>Select Priority</option>
                            <option value="Low">Low</option>
                            <option value="Medium">Medium</option>
                            <option value="High">High</option>
                        </select>
                    </div>
                </div>

                <!-- Details -->
                <div>
                    <label class="block text-sm mb-1 light-text-black">Details</label>
                    <textarea name="description" rows="4" placeholder="Explanation here"
                        class="w-full p-2 rounded light-bg-d7d7d7 border border-gray-700 text-white focus:outline-none">{{ old('description') }}</textarea>
                </div>

                <!-- File Upload -->
                <div>
                    <label class="block text-sm mb-1 light-text-black">Attachment</label>
                    <input type="file" id="ticketFile" name="attachments"
                        class="file-input w-full light-text-black light-bg-d7d7d7 p-1 rounded-md focus:outline-none">
                </div>

                <!-- Buttons -->
                <div class="flex justify-between items-center">
                    <div>
                        {{-- <button type="button" id="cancelTicket"
                            class="px-4 py-2 light-text-black light-bg-d7d7d7 rounded-lg hover:bg-gray-600">
                            Upload
                        </button> --}}
                    </div>

                    <div class="flex justify-end gap-3 pt-3">
                        <button type="button" id="cancelTicket"
                            class="px-4 py-2 light-text-black light-bg-d7d7d7 rounded-lg hover:bg-gray-600">
                            Cancel
                        </button>
                        <button type="submit" class="px-4 py-2 bg-orange-500  rounded-lg hover:bg-orange-600">
                            Confirm
                        </button>
                    </div>
                </div>
            </form>

        </div>
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
                        <img class=" w-full h-full" src="{{ asset('assets/Icon (1).svg') }}" alt="bold"
                            id="btn-bold">
                        <img class=" w-full h-full" src="{{ asset('assets/Icon.svg') }}" alt="italic"
                            id="btn-italic">
                        <img class=" w-full h-full" src="{{ asset('assets/Icon (2).svg') }}" alt="underline">
                        <img class=" w-full h-full" src="{{ asset('assets/Rectangle 226.svg') }}" alt="line">
                        <img class=" w-full h-full" src="{{ asset('assets/Icon (6).svg') }}" alt="link"
                            id="btn-link">
                        <img class=" w-full h-full" src="{{ asset('assets/Rectangle 226.svg') }}" alt="line">
                        <img class=" w-full h-full" src="{{ asset('assets/Icon (7).svg') }}" alt="ordered"
                            id="btn-ordered">
                        <img class=" w-full h-full" src="{{ asset('assets/Icon (8).svg') }}" alt="bullet"
                            id="btn-bullet">
                        <img class=" w-full h-full" src="{{ asset('assets/Rectangle 226.svg') }}" alt="line">
                        <img class=" w-full h-full" src="{{ asset('assets/Icon (9).svg') }}" alt="left"
                            id="btn-left">
                        <img class=" w-full h-full" src="{{ asset('assets/Rectangle 226.svg') }}" alt="line">
                        <img class=" w-full h-full" src="{{ asset('assets/Icon (10).svg') }}" alt="code"
                            id="btn-code">
                        <img class=" w-full h-full" src="{{ asset('assets/Icon (11).svg') }}" alt="">
                    </span>
                </div>
                <div class="flex items-center light-bg-d7d7d7">
                    <input type="hidden" id="chat-ticket-id" name="ticket_id" value="">
                    <input type="hidden" id="chat-sender-id" name="sender_id" value="{{ auth()->id() }}">
                    <div id="editor" class="w-full p-4 light-bg-d9d9d9 light-text-black text-sm"
                        style="height:80px !important;"></div>
                    <button id="send-btn"
                        class="light-bg-d9d9d9 hover:bg-orange-600 pt-10 rounded-r text-white relative">
                        <span class="absolute bottom-2 right-3 text-lg">➤</span>
                    </button>
                </div>

                <div class="flex rounded-b-lg light-bg-d9d9d9 items-center justify-between px-4"><span
                        class="flex items-center gap-1">
                        <img class="pb-2 w-full h-full" src="{{ asset('assets/Group 216.svg') }}"alt="img"
                            id="btn-image">
                        <img class="pb-2 w-full h-full" src="{{ asset('assets/Icon (3).svg') }}" alt=""
                            id="btn-underline">
                        <img class="pb-2 w-full h-full" src="{{ asset('assets/Icon (4).svg') }}" alt="emoji"
                            id="btn-emoji">
                        <div id="hidden-toolbar" style="display:none">
                            <button class="ql-emoji"></button>
                        </div>
                        <img class="pb-2 w-full h-full" src="{{ asset('assets/Icon (5).svg') }}" alt="">
                    </span>

                </div>

            </div>

        </div>
    </div>


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

        <script>
            document.addEventListener('DOMContentLoaded', () => {
                // Ticket Modal Elements
                const newTicketModal = document.getElementById('newTicketModal');
                newTicketModal.classList.remove('hidden');
            });
        </script>
    @endif

    @if (session('success'))
        <div style="z-index: 9999 !important;"
            class="success-message fixed top-5 right-5 bg-green-500 text-white px-4 py-2 rounded shadow-lg">
            {{ session('success') }}
        </div>

        <style>
            #page-loader {
                display: none !important;
            }
        </style>
    @endif


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
                        const reader = new FileReader(); // Create a new FileReader to read the file
                        reader.onload = (e) => {
                            const range = quill
                                .getSelection(); // Get the current selection or cursor position in the editor
                            quill.insertEmbed(range.index, 'image', e.target
                                .result); // Insert the image at the current cursor position
                        };
                        reader.readAsDataURL(
                            file); // Convert the file to Base64 format (so it can be embedded directly)
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
                        let file = new File([blob], "image.png", {
                            type: blob.type
                        });
                        imageFiles.push({
                            file: file,
                            element: img
                        });
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
                let arr = dataurl.split(','),
                    mime = arr[0].match(/:(.*?);/)[1],
                    bstr = atob(arr[1]),
                    n = bstr.length,
                    u8arr = new Uint8Array(n);
                while (n--) {
                    u8arr[n] = bstr.charCodeAt(n);
                }
                return new Blob([u8arr], {
                    type: mime
                });
            }

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
                            weekday: 'long',
                            month: 'long',
                            day: 'numeric'
                        });


                        chatContainer.append(`
                                <div class="flex items-start space-x-3">
                                    <img src="${chat.sender.image || '{{ asset('assets/default-prf.png') }}'}" 
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

    <script>
        document.addEventListener('DOMContentLoaded', () => {


            function updateDropdownStyle(select) {
                const value = select.value;

                if (value === 'To Do') {
                    select.style.backgroundColor = '#95A5A6';
                    select.style.color = 'white';
                } else if (value === 'In Progress') {
                    select.style.backgroundColor = '#00CFE826';
                    select.style.color = 'white';
                } else if (value === 'In Review') {
                    select.style.backgroundColor = '#F39C12';
                    select.style.color = 'white';
                } else if (value === 'Resolved') {
                    select.style.backgroundColor = 'green';
                    select.style.color = 'white';
                } else if (value === 'Cancelled') {
                    select.style.backgroundColor = 'red';
                    select.style.color = 'white';
                }
            }

            const selects = document.querySelectorAll(".statusDropdown");
            selects.forEach(select => updateDropdownStyle(select));

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

            // Ticket Modal Elements
            const newTicketModal = document.getElementById('newTicketModal');
            const closeTicketModal = document.getElementById('closeTicketModal');
            const openTicketButton = document.getElementById('openTicketButton');

            const ticketChatModal = document.getElementById('ticketChatModal');
            const closeChatModal = document.getElementById('closeChatModal');
            const openChatButtons = document.querySelectorAll('.open-chat-modal');

            // Open ticket modal button
            openTicketButton.addEventListener('click', () => {
                newTicketModal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            });

            // Close ticket modal button
            closeTicketModal.addEventListener('click', () => {
                newTicketModal.classList.add('hidden');
                document.body.style.overflow = 'auto';
            });

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

</body>

</html>

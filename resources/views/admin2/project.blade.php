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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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
    </style>

</head>

<body>
    <div id="m_mileStonemsg" style="display: none; z-index: 9999 !important;"
        class="fixed top-5 right-5 bg-green-500 text-white px-4 py-2 rounded shadow-lg z-50">
        Milestone Added successfully!
    </div>

    <div id="milestonedelete" style="display: none; z-index: 9999 !important;"
        class="fixed top-5 right-5 bg-red-500 text-white px-4 py-2 rounded shadow-lg z-50">
        Milestone Deleted successfully!
    </div>

    <div id="deleteProject" style="display: none; z-index: 9999 !important;"
        class="fixed top-5 right-5 bg-red-500 text-white px-4 py-2 rounded shadow-lg z-50">
        Project Deleted successfully!
    </div>

    <div id="Projectstatus" style="display: none; z-index: 9999 !important;"
        class="fixed top-5 right-5 bg-green-500 text-white px-4 py-2 rounded shadow-lg z-50">
        Project Status Update successfully!
    </div>

    <div id="milestonestatus" style="display: none; z-index: 9999 !important;"
        class="fixed top-5 right-5 bg-green-500 text-white px-4 py-2 rounded shadow-lg z-50">
        Milestone Status Update successfully!
    </div>

    <div id="document_delete_msg" style="display: none; z-index: 9999 !important;"
        class="fixed top-5 right-5 bg-red-500 text-white px-4 py-2 rounded shadow-lg z-50">
        Document Deleted successfully!
    </div>


    <div  style="display: none; z-index: 9999 !important;"
        class="Errors fixed top-5 right-5 bg-red-500 text-white px-4 py-2 rounded shadow-lg ">
        
    </div>

 


    <div class="flex min-h-screen light-bg-white">
        @include('layouts.sidebar')

        <!-- Main Content Area -->
        <main class="flex-1 light-bg-bill overflow-y-auto">
            <!-- Header -->
            <header class="flex items-center justify-between light-bg-f5f5f5 light-bg-seo p-5 shadow-sm mb-2 header">
                <div class="relative w-full max-w-md">
                    <input type="text" placeholder="Search here"
                        class="w-full pl-10 pr-4 py-2 rounded-lg light-border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="icon text-gray-400" viewBox="0 0 24 24">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                    </div>
                </div>
                <div class="flex items-center space-x-4 ml-4">
                    <button
                        class="p-2 border-2 rounded-full light-hover-bg-gray-200 transition-colors light-border-gray-300">
                        <img src="message.svg" alt="icon"
                            class="w-6 h-6 light-text-gray-900 rounded-full  light-mode-icon"
                            data-dark-src="message-DARK.svg">
                    </button>
                    <button
                        class="p-2 border-2 rounded-full light-hover-bg-gray-200 transition-colors light-border-gray-300">
                        <img src="notification.svg" alt="icon"
                            class="w-6 h-6 light-text-gray-900 rounded-full   light-mode-icon"
                            data-dark-src="notification-DARK.svg">
                    </button>
                    <div class="flex items-center p-1 space-x-3 rounded-full border-2 light-border-gray-300">
                        <img src="Ellipse 3.png" alt="User Avatar" class="w-10 h-10 rounded-full ">
                        <span class="font-semibold light-text-gray-500 hidden  sm:block">John Wick</span>
                        <svg class="icon w-6 pr-2 h-6 text-gray-500 " viewBox="0 0 24 24">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </div>
                </div>
            </header>

            <div class="p-6 light-bg-bill lg:p-8">

                <!-- Projects Title -->
                <h1 class="text-3xl font-bold light-text-gray-800 mb-10">Projects</h1>

                <!-- Connect Domain Section -->


                <div class="grid grid-cols-1 lg:grid-cols-1 gap-6 mb-6">
                    <!-- User's Projects List Table -->
                    <div class="lg:col-span-2 light-bg-f5f5f5 light-bg-seo  rounded-xl shadow-sm">
                        <div class="flex items-center justify-between mb-4 p-6 flex-wrap gap-3">
                            <h2 class="text-xl font-semibold light-text-gray-800">User's Projects List</h2>
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
                                        class="light-bg-d7d7d7 text-white w-40 py-2 rounded-lg hover:light-bg-orange-700 dark:hover:bg-orange-600 transition-colors text-sm">
                                        Add New Projects
                                    </button>


                                </div>
                            </div>
                        </div>

                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="light-bg-d9d9d9">
                                    <tr>
                                        <th scope="col"
                                            class="px-9 py-3 text-left text-xs font-medium light-text-gray-500 uppercase tracking-wider">
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
                                                CLIENT
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
                                                <span class="whitespace-nowrap">ASSIGNED TO</span>
                                                <div class="flex flex-col ml-10">
                                                    <svg class="icon mr-10 w-4 h-4" viewBox="0 0 24 24"
                                                        fill="none" stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <!-- Up chevron (positioned higher) -->
                                                        <path d="M7 8 L12 3 L17 8" />
                                                        <!-- Down chevron (positioned lower with gap) -->
                                                        <path d="M7 16 L12 21 L17 16" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left  text-xs font-medium light-text-gray-500 uppercase tracking-wider">
                                            <div class="flex items-center mr-10">
                                                PROGRESS

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
                                                STATUS
                                            </div>
                                        </th>

                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium light-text-gray-500 uppercase tracking-wider">
                                            <div class="flex items-center">

                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="project-table-body"
                                    class="light-bg-white light-bg-seo divide-y divide-gray-200">

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

                <!-- Overview Cards -->






                <!-- Bottom Cards: Need Help & Free Consulting -->

            </div>
        </main>
    </div>

    <div id="projectModal"
        class="fixed inset-0 bg-black light-bg-000000 bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="light-bg-white  rounded-xl  w-full max-w-4xl max-h-[90vh] overflow-y-auto shadow-xl">

            <div class="flex justify-between border-b light-border-gray-200 dark:border-gray-700 items-start">

                <div class="px-6 ">
                    <h2 class="text-xl font-light light-text-black pt-3">Edit Project</h2>
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
                <div class="hidden md:flex light-bg-d9d9d9 px-5 py-2  mb-10">
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
                        <button class="tab-btn pb-2 px-2 font-medium " data-tab="notes">Milestones</button>
                    </div>

                    <!-- Tab 3: Uploaded Document
        <div class="flex items-center px-2 py-1 justify-center rounded-sm hover:rounded-md light-hover-bg-gray-300 tab-wrapper">
            <img class="w-4 h-4 mb-2" src="bookmark.svg" alt="">
            <button class="tab-btn mb-2 px-2 font-medium light-text-gray-500 dark:text-gray-400 hover:light-text-gray-700 dark:hover:text-gray-300" data-tab="uploadedDocument">Memberships</button>
        </div>
-->

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

                        <!-- Tab 3: Uploaded Document
            <div class="flex flex-col items-center">
                <img class="w-5 h-5" src="document.png" alt="">
                <button class="tab-btn pt-2 font-medium light-text-gray-500 dark:text-gray-400 hover:light-text-gray-700 dark:hover:text-gray-300" data-tab="uploadedDocument">Uploaded</button>
            </div>
-->

                    </div>
                </div>
            </div>


            <div id="overviewContent" class="tab-content px-6">

                <form id="ticketForm" class="space-y-4 mb-10 " action="{{ route('project.edit') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 gap-4">
                        <div class="grid grid-cols-1 gap-2">

                            <input type="hidden" id="edit_project_id" name="project_id" placeholder="John Doe"
                                class="w-full p-2 rounded light-bg-d7d7d7 border border-gray-700 light-text-black focus:outline-none">

                            <input type="hidden" id="edit_user_id" name="project_id" placeholder="John Doe"
                                class="w-full p-2 rounded light-bg-d7d7d7 border border-gray-700 light-text-black focus:outline-none">

                            <div>
                                <label class="block text-sm mb-1 light-text-black">Project Name</label>
                                <input type="text" id="edit_project_name" name="project_name"
                                    placeholder="Develop WizSpeed Dashboard"
                                    class="w-full p-2 rounded light-bg-d7d7d7 border border-gray-700 text-white focus:outline-none">
                            </div>

                        </div>

                        <div class="grid-cols-1 gap-4">
                            <div class="grid grid-cols-3 gap-2">
                                <div>
                                    <label class="block text-sm mb-1 light-text-black">Client Name</label>
                                    <input type="text" id="edit_client_name" name="client_name"
                                        placeholder="John Doe"
                                        class="w-full p-2 rounded light-bg-d7d7d7 border border-gray-700 light-text-black focus:outline-none">
                                </div>

                                <div>
                                    <label class="block text-sm mb-1 light-text-black">Membership</label>
                                    <select name="membership" id="edit_membership"
                                        class="w-full p-2 rounded light-bg-d7d7d7 border border-gray-700 light-text-black">
                                        <option value="" hidden selected>Select Membership</option>
                                        <option value="basic">Basic</option>
                                        <option value="gold">Gold</option>
                                        <option value="premium">Premium</option>
                                    </select>
                                </div>

                                <!-- State Selection -->
                                <div>
                                    <label class="block text-sm mb-1 light-text-black">Assigned To</label>
                                    <select name="assign_to" id="edit_assign_to"
                                        class="w-full p-2 rounded light-bg-d7d7d7 border border-gray-700 light-text-black"
                                        {{ $users->isEmpty() ? 'disabled' : '' }}>

                                        @if ($users->isEmpty())
                                            <option value="" hidden selected>No users available</option>
                                        @else
                                            <option value="" hidden selected>Select User</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        @endif

                                    </select>

                                </div>

                            </div>
                        </div>


                        <div class="grid grid-cols-3  gap-4">
                            <div>
                                <label class="block text-sm mb-1 light-text-black"> Price</label>
                                <input type="text" id="edit_price" name="price" placeholder="$10,000"
                                    class="file-input w-full light-text-black light-bg-d7d7d7 p-2 rounded-md focus:outline-none">
                            </div>

                            <div>
                                <label class="block text-sm mb-1 light-text-black">Start Date</label>
                                <input type="date" id="edit_start_date" name="start_date" placeholder="05-7-2024"
                                    class="file-input w-full light-text-black light-bg-d7d7d7 p-2 rounded-md focus:outline-none">
                            </div>

                            <div>
                                <label class="block text-sm mb-1 light-text-black">Deadline</label>
                                <input type="date" id="edit_end_date" name="end_date" placeholder="05-10-2024"
                                    class="file-input w-full light-text-black light-bg-d7d7d7 p-2 rounded-md focus:outline-none">
                            </div>

                        </div>


                        <div class="flex items-center gap-2">
                            <input type="checkbox" checked class="accent-orange-500 w-4 h-4">
                            <p class="text-xs font-light">Mark As High Priority</p>
                        </div>





                    </div>


                    <!-- Buttons -->
                    <div class="flex justify-end items-center">

                        <div class="flex justify-end gap-3 pt-3">
                            {{-- <button type="button" id="cancelTicket"
                                class="px-4 py-2 light-text-black light-bg-d7d7d7 rounded-lg hover:bg-gray-600">
                                Cancel
                            </button> --}}

                            <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 1000)" x-show="show" x-transition
                                class="fixed top-5 right-5 bg-green-500 text-white px-4 py-2 rounded shadow-lg z-50"
                                id="updateMsg" style="display: none;">
                                Project Updated successfully!
                            </div>

                            <button type="submit"
                                class="edit-project px-4 py-2 bg-orange-500  rounded-lg hover:bg-orange-600">
                                Edit Project
                            </button>
                        </div>
                    </div>
                </form>

            </div>

            <div id="notesContent" class="tab-content hidden">

                <div class="px-5 items-center">
                    <div class="mb-1 text-base font-medium text-green-700 dark:text-green-500"></div>
                    <div>
                        <button class="w-full bg-gray-200 rounded-full h-2.5 mb-4 dark:bg-gray-700"
                            onclick="myFunction()">
                            <progress class="w-full rounded-full bg-blue-400" id="myProgress" value="22"
                                max="100"></progress></button>
                    </div>
                    <span class="justify-center flex ml-2 text-sm light-text-black">20%</span>
                </div>

                <div class="flex justify-between items-center px-8 mb-4 gap-4">

                    <div class="flex justify-between items-center p-4 mb-4">

                        <div class="flex justify-between items-center  ">
                            <h3 class="text-2xl">Milestones</h3>
                            <div class="relative w-full max-w-xs pl-2">

                            </div>
                            <div class="flex space-x-2">
                                <div class="relative w-full">
                                    <!-- Search Icon (Left-aligned) -->
                                    <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 light-text-gray-400 dark:text-gray-500"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>

                                    <!-- Input with padding to avoid icon overlap -->
                                    <input type="text" placeholder="Search here"
                                        class="block w-full pl-10 pr-4 py-2 border border-gray-200 light-text-gray-900 dark:text-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 dark:focus:ring-orange-400" />
                                </div>
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
                                <button
                                    class="open-milestone-modal light-bg-orange-600 dark:bg-orange-700 text-white w-96 py-2 rounded-lg hover:light-bg-orange-700 dark:hover:bg-orange-600 transition-colors text-sm">
                                    Add New Milestone
                                </button>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="overflow-x-auto ">
                    <table class="min-w-full divide-y bg-transparent">
                        <thead class="bg-gray-500">
                            <tr class="light-bg-d9d9d9">
                                <th
                                    class="px-8 py-3 text-left text-xs font-medium light-text-black uppercase tracking-wider whitespace-nowrap">
                                    ID
                                    <svg class="inline ml-1 w-3 h-3" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path>
                                    </svg>
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium light-text-black uppercase tracking-wider whitespace-nowrap">
                                    MILESTONE NAME
                                    <svg class="inline ml-1 w-3 h-3" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path>
                                    </svg>
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium light-text-black uppercase tracking-wider whitespace-nowrap">
                                    START DATE
                                    <svg class="inline ml-1 w-3 h-3" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path>
                                    </svg>
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium light-text-black uppercase tracking-wider whitespace-nowrap">
                                    DEADLINE
                                    <svg class="inline ml-1 w-3 h-3" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path>
                                    </svg>
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium light-text-black uppercase tracking-wider whitespace-nowrap">
                                    STATUS
                                    <svg class="inline ml-1 w-3 h-3" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path>
                                    </svg>
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium light-text-black uppercase tracking-wider whitespace-nowrap">
                                    ACTION
                                    <svg class="inline ml-1 w-3 h-3" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path>
                                    </svg>
                                </th>
                            </tr>
                        </thead>

                        <tbody class="bg-transparent light-border-gray2  " id="milestoneTableBody">

                        </tbody>

                    </table>
                </div>

            </div>

            <div id="uploadedDocumentContent" class="tab-content hidden">
                <div class="px-5 items-center">
                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                        <div class="bg-green-500 h-2.5 rounded-full" style="width: 20%"></div>
                    </div>
                    <span class="justify-center flex ml-2 text-sm light-text-black">Progress 20%</span>
                </div>
                <div class="flex justify-between items-center px-4 mb-4">
                    <div class="flex justify-between items-center p-4 mb-4">
                        <h3 class="text-2xl">Memberships</h3>
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
                                class="light-bg-d7d7d7 text-white w-96 py-2 rounded-lg hover:light-bg-orange-700 dark:hover:bg-orange-600 transition-colors text-sm">
                                Add New Memberships
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
                                    MEMBERSHIP
                                    <svg class="inline-block ml-1 w-3 h-3" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path>
                                    </svg>
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium light-text-black uppercase tracking-wider">
                                    PRICE
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
                                <td class="px-6 py-4 whitespace-nowrap text-sm light-text-black">Domain</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm light-text-gray-900 dark:text-gray-300">
                                    <p class="text-gray-400">$100</p>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm light-text-black">10-5-2024</td>
                                <td class="px-6 py-4 whitespace-nowrap text-start text-sm font-medium">
                                    <button
                                        class="light-text-red-600 hover:light-text-red-900 dark:text-red-400 dark:hover:text-red-300">
                                        <div class="flex gap-2">
                                            <img src="trash.png" alt="eye" class="bg-gray-200 p-1 rounded-full">
                                        </div>
                                    </button>
                                </td>
                            </tr>
                            <tr class="border-2 light-border-gray2">
                                <td class="px-6 py-4 whitespace-nowrap text-sm light-text-black">Hosting</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm light-text-gray-900 dark:text-gray-300">
                                    <p class="text-gray-400">$100</p>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm light-text-black">10-5-2024</td>
                                <td class="px-6 py-4 whitespace-nowrap text-start text-sm font-medium">
                                    <button
                                        class="light-text-red-600 hover:light-text-red-900 dark:text-red-400 dark:hover:text-red-300">
                                        <div class="flex gap-2">
                                            <img src="trash.png" alt="eye" class="bg-gray-200 p-1 rounded-full">
                                        </div>
                                    </button>
                                </td>
                            </tr>
                            <tr class="border-2 light-border-gray2">
                                <td class="px-6 py-4 whitespace-nowrap text-sm light-text-black">Deployment</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm light-text-gray-900 dark:text-gray-300">
                                    <p class="text-gray-400">$100</p>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm light-text-black">10-5-2024</td>
                                <td class="px-6 py-4 whitespace-nowrap text-start text-sm font-medium">
                                    <button
                                        class="light-text-red-600 hover:light-text-red-900 dark:text-red-400 dark:hover:text-red-300">
                                        <div class="flex gap-2">
                                            <img src="trash.png" alt="eye" class="bg-gray-200 p-1 rounded-full">
                                        </div>
                                    </button>
                                </td>
                            </tr>
                            <tr class="border-2 light-border-gray2">
                                <td class="px-6 py-4 whitespace-nowrap text-sm light-text-black">Maintenance</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm light-text-gray-900 dark:text-gray-300">
                                    <p class="text-gray-400">$100</p>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm light-text-black">10-5-2024</td>
                                <td class="px-6 py-4 whitespace-nowrap text-start text-sm font-medium">
                                    <button
                                        class="light-text-red-600 hover:light-text-red-900 dark:text-red-400 dark:hover:text-red-300">
                                        <div class="flex gap-2">
                                            <img src="trash.png" alt="eye" class="bg-gray-200 p-1 rounded-full">
                                        </div>
                                    </button>
                                </td>
                            </tr>
                            <tr class="border-2 light-border-gray2">
                                <td class="px-6 py-4 whitespace-nowrap text-sm light-text-black">01</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm light-text-gray-900 dark:text-gray-300">
                                    <p class="text-gray-400">$100</p>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm light-text-black">10-5-2024</td>
                                <td class="px-6 py-4 whitespace-nowrap text-start text-sm font-medium">
                                    <button
                                        class="light-text-red-600 hover:light-text-red-900 dark:text-red-400 dark:hover:text-red-300">
                                        <div class="flex gap-2">
                                            <img src="trash.png" alt="eye" class="bg-gray-200 p-1 rounded-full">
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


        </div>
    </div>

    <div id="taskModal"
                    class="fixed inset-0 bg-black light-bg-000000 bg-opacity-50 flex items-center justify-center z-50 hidden">
                    <div class="light-bg-white  rounded-xl  w-full max-w-4xl max-h-[90vh] overflow-y-auto shadow-xl">

                        <div class="flex justify-between border-b light-border-gray-200 dark:border-gray-700 items-start">

                            <div class="px-6 ">
                                <h2 class="text-xl font-light light-text-black pt-3">Add Project</h2>
                            </div>
                            <button id="closeTaskModalBtn"
                                class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 p-4">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>

                    <div class="relative">
                        <!-- Desktop View (unchanged) -->
                        <div class="hidden md:flex light-bg-d9d9d9 px-5 py-2  mb-10">
                            <!-- Your existing desktop tabs structure -->
                            <!-- Tab 1: Overview -->
                            <div
                                class="flex items-center active px-2 py-1 justify-center rounded-sm hover:rounded-md light-hover-bg-gray-300 tab-wrapper">
                                <img class="w-4 h-4 mb-2" src="category.png" alt="">
                                <button class="task-tab-btn  pb-2 px-2  " data-tab="taskTab1">Overview</button>
                            </div>
                            <!-- Other tabs... -->
                            

                                        <!-- Tab 3: Uploaded Document
                            <div class="flex items-center px-2 py-1 justify-center rounded-sm hover:rounded-md light-hover-bg-gray-300 tab-wrapper">
                                <img class="w-4 h-4 mb-2" src="bookmark.svg" alt="">
                                <button class="task-tab-btn open-membership-modal mb-2 px-2 font-medium light-text-gray-500 dark:text-gray-400 hover:light-text-gray-700 dark:hover:text-gray-300" data-tab="taskTab3">Memberships</button>
                            </div>
                    -->

                                    </div>

                                <!-- Mobile Slider View -->
                                <div class="md:hidden overflow-x-auto whitespace-nowrap py-4 scrollbar-hide">
                                    <div class="inline-flex space-x-8 px-4">
                                        <!-- Tab 1: Overview -->
                                        <div class="flex tab-wrapper flex-col active items-center">
                                            <img class="w-5 h-5" src="category.png" alt="">
                                            <button
                                                class="task-tab-btn  pt-2 font-medium light-text-orange-500 dark:text-orange-400 border-b-2 light-border-orange-500 dark:border-orange-400"
                                                data-tab="overview">Overview</button>
                                        </div>

                                        <!-- Tab 2: Notes -->
                                        <div class="flex tab-wrapper flex-col items-center">
                                            <img class="w-5 h-5" src="fi_839860.png" alt="">
                                            <button
                                                class="task-tab-btn pt-2 font-medium light-text-gray-500 dark:text-gray-400 hover:light-text-gray-700 dark:hover:text-gray-300"
                                                data-tab="notes">Milestones</button>
                                        </div>

                                        <!-- Tab 3: Uploaded Document
                            <div class="flex flex-col items-center">
                                <img class="w-5 h-5" src="document.png" alt="">
                                <button class="task-tab-btn pt-2 font-medium light-text-gray-500 dark:text-gray-400 hover:light-text-gray-700 dark:hover:text-gray-300" data-tab="uploadedDocument">Uploaded</button>
                            </div>
                -->

                                    </div>
                                </div>
                            </div>


                            <div id="taskTab1Content" class="task-tab-content px-6">

                                <form id="ticketForm" class="space-y-4 mb-10 " method="POST" action="{{ route('project.store') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <!-- Title, Project Name, Priority -->
                                    <input type="hidden" name="user_id" id="user_id" value="{{ $userId }}">

                                    <div class="grid grid-cols-1 gap-4">
                                        <div class="grid grid-cols-1 gap-2">
                                            <div>
                                                <label class="block text-sm mb-1 light-text-black">Project Name</label>
                                                <input type="text" id="project_name" name="project_name"
                                                    placeholder="Develop WizSpeed Dashboard"
                                                    class="w-full p-2 rounded light-bg-d7d7d7 border border-gray-700 text-white focus:outline-none">
                                            </div>

                                        </div>
                                        <div class="grid-cols-1 gap-4">
                                            <div class="grid grid-cols-3 gap-2">
                                                <div>
                                                    <label class="block text-sm mb-1 light-text-black">Client Name</label>
                                                    <input type="text" id="client_name" name="client_name" placeholder="John Doe"
                                                        class="w-full p-2 rounded light-bg-d7d7d7 border border-gray-700 light-text-black focus:outline-none">
                                                </div>

                                                <div>
                                                    <label class="block text-sm mb-1 light-text-black">Membership</label>
                                                    <select name="membership" id="membership"
                                                        class="w-full p-2 rounded light-bg-d7d7d7 border border-gray-700 light-text-black">
                                                        <option value="" hidden selected>Select Membership</option>
                                                        <option value="basic">Basic</option>
                                                        <option value="gold">Gold</option>
                                                        <option value="premium">Premium</option>
                                                    </select>
                                                </div>

                                                <!-- State Selection -->
                                                <div>
                                                    <label class="block text-sm mb-1 light-text-black">Assigned To</label>
                                                    <select name="assign_to" id="assign_to"
                                                        class="w-full p-2 rounded light-bg-d7d7d7 border border-gray-700 light-text-black"
                                                        {{ $users->isEmpty() ? 'disabled' : '' }}>

                                                        @if ($users->isEmpty())
                                                            <option value="" hidden selected>No users available</option>
                                                        @else
                                                            <option value="" hidden selected>Select User</option>
                                                            @foreach ($users as $user)
                                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                            @endforeach
                                                        @endif

                                                    </select>

                                                </div>

                                            </div>
                                        </div>

                                        <div class="grid grid-cols-3  gap-4">
                                            <div>
                                                <label class="block text-sm mb-1 light-text-black"> Price</label>
                                                <input type="text" id="price" name="price" placeholder="$10,000"
                                                    class="file-input w-full light-text-black light-bg-d7d7d7 p-2 rounded-md focus:outline-none">
                                            </div>

                                            <!-- State Selection -->
                                            <div>
                                                <label class="block text-sm mb-1 light-text-black">Start Date</label>
                                                <input type="date" name="start_date" id="start_date" placeholder="05-7-2024"
                                                    class="file-input w-full light-text-black light-bg-d7d7d7 p-2 rounded-md focus:outline-none">
                                            </div>

                                            <!-- City Selection -->
                                            <div>
                                                <label class="block text-sm mb-1 light-text-black">Deadline</label>
                                                <input type="date" name="end_date" id="end_date" placeholder="05-10-2024"
                                                    class="file-input w-full light-text-black light-bg-d7d7d7 p-2 rounded-md focus:outline-none">
                                            </div>

                                        </div>
                                        <!-- File Upload -->
                                        <div>
                                            <label class="block text-sm mb-1 light-text-black">Attachment</label>
                                            <input type="file" id="document_name" name="document_name"
                                                class="file-input w-full light-text-black light-bg-d7d7d7 p-1 rounded-md focus:outline-none">
                                        </div>

                                        <div class="flex items-center gap-2">
                                            <input type="checkbox" checked class="accent-orange-500 w-4 h-4">
                                            <p class="text-xs font-light">Mark As High Priority</p>
                                        </div>





                                    </div>


                                    <!-- Buttons -->
                                    <div class="flex justify-end items-center">

                                        <div class="flex justify-end gap-3 pt-3">
                                            {{-- <button type="button" id="cancelTicket"
                                                class="px-4 py-2 light-text-black light-bg-d7d7d7 rounded-lg hover:bg-gray-600">
                                                Cancel
                                            </button> --}}

                                            <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 1000)" x-show="show" x-transition
                                                class="fixed top-5 right-5 bg-green-500 text-white px-4 py-2 rounded shadow-lg z-50"
                                                id="msg" style="display: none;">
                                                Project Added successfully!
                                            </div>

                                            <button type="submit" id="addProject"
                                                class="px-4 py-2 bg-orange-500 open-Task-Milestone-Modal-Btn rounded-lg hover:bg-orange-600">
                                                Add Project
                                            </button>
                                            
                                        </div>
                                    </div>
                                </form>

                            </div>

                    


                </div>

                <div id="taskTab3" class="task-tab-content   hidden">

                </div>


            </div>
            </div>


            <div id="taskMilestoneModal"
                    class="fixed inset-0 bg-black light-bg-000000 bg-opacity-50 flex items-center justify-center z-50 hidden">
                    <div class="light-bg-white  rounded-xl  w-full max-w-4xl max-h-[90vh] overflow-y-auto shadow-xl">

                        <div class="flex justify-between border-b light-border-gray-200 dark:border-gray-700 items-start">

                            {{-- <div class="px-6 ">
                                <h2 class="text-xl font-light light-text-black pt-3">Add Project</h2>
                            </div> --}}
                            <button class="close-Task-Milestone-Modal-Btn"
                                class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 p-4">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>

                    <div class="relative">
                        <!-- Desktop View (unchanged) -->
                        <div class="hidden md:flex light-bg-d9d9d9 px-5 py-2  mb-10">
                            <!-- Your existing desktop tabs structure -->
                            
                            <!-- Tab 2: Notes -->
                            <div
                                class="flex items-center px-2 py-1 justify-center rounded-sm hover:rounded-md light-hover-bg-gray-300 tab-wrapper">
                                <img class="w-4 h-4 mb-2" src="fi_839860.png" alt="">
                                <button class="milestone-task-tab-btn pb-2 px-2 font-medium " data-tab="taskTab2">Milestones</button>
                            </div>

                                        <!-- Tab 3: Uploaded Document
                            <div class="flex items-center px-2 py-1 justify-center rounded-sm hover:rounded-md light-hover-bg-gray-300 tab-wrapper">
                                <img class="w-4 h-4 mb-2" src="bookmark.svg" alt="">
                                <button class="task-tab-btn open-membership-modal mb-2 px-2 font-medium light-text-gray-500 dark:text-gray-400 hover:light-text-gray-700 dark:hover:text-gray-300" data-tab="taskTab3">Memberships</button>
                            </div>
                    -->

                                    </div>

                                <!-- Mobile Slider View -->
                                <div class="md:hidden overflow-x-auto whitespace-nowrap py-4 scrollbar-hide">
                                    <div class="inline-flex space-x-8 px-4">
                                        

                                        <!-- Tab 2: Notes -->
                                        <div class="flex tab-wrapper flex-col items-center">
                                            <img class="w-5 h-5" src="fi_839860.png" alt="">
                                            <button
                                                class="milestone-task-tab-btn pt-2 font-medium light-text-gray-500 dark:text-gray-400 hover:light-text-gray-700 dark:hover:text-gray-300"
                                                data-tab="notes">Milestones</button>
                                        </div>

                                        <!-- Tab 3: Uploaded Document
                            <div class="flex flex-col items-center">
                                <img class="w-5 h-5" src="document.png" alt="">
                                <button class="task-tab-btn pt-2 font-medium light-text-gray-500 dark:text-gray-400 hover:light-text-gray-700 dark:hover:text-gray-300" data-tab="uploadedDocument">Uploaded</button>
                            </div>
                             -->

                                    </div>
                                </div>
                            </div>


                            
                    <div id="taskTab2Content" class=" ">
                        <div class="px-5">

                            <form method="POST">
                                @csrf

                                <label class="block mb-2">Milestone Name</label>
                                <input type="text" id="milestone_name" placeholder="Name here..." name="milestone_name"
                                    class="w-full p-2 rounded light-bg-d7d7d7 border border-gray-700 text-white focus:outline-none">

                                <div class="flex gap-4 mb-4">
                                    <div class="flex-1">
                                        <label class="block mb-2">Start Date</label>
                                        <input type="date" name="start_date" id="milestone_start_date"
                                            class="w-full p-2 rounded light-bg-d7d7d7 border border-gray-700 text-white focus:outline-none">
                                    </div>
                                    <div class="flex-1">
                                        <label class="block mb-2">Deadline</label>
                                        <input type="date" name="deadline" id="deadline"
                                            class="w-full p-2 rounded light-bg-d7d7d7 border border-gray-700 text-white focus:outline-none">
                                    </div>
                                </div>

                                <input type="text" name="project_id" id="project_id"
                                    value="{{ session('last_project_id') }}">


                                <label class="flex items-center mb-4">
                                    <input type="checkbox" class="mr-2"> Mark as High Priority
                                </label>


                                
                        </div>

                            <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 1000)" x-show="show" x-transition
                                class="fixed top-5 right-5 bg-green-500 text-white px-4 py-2 rounded shadow-lg z-50"
                                id="mileStonemsg" style="display: none; z-index:9999 !important;">
                                Milestone Added successfully!
                            </div>

                            <div class="flex justify-between p-5 mt-4">
                                <button class="px-4 py-2 rounded bg-[#333] text-white">Add New Milestone</button>
                                <div class="flex gap-2">
                                    {{-- <button class="bg-gray-600 px-4 py-2 rounded">Cancel</button> --}}
                                    <button id="addMilestone" class="bg-orange-500 text-white px-4 py-2 rounded "
                                        type="submit">Save</button>
                                </div>
                            </div>

                        </form>

                    </div>


                </div>

                


            </div>
            </div>


    <!-- Modal -->
    <div id="customModal"
        class="fixed inset-0 bg-black light-bg-000000 bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="w-full max-w-[70vw] max-h-[90vh] overflow-y-auto ">
            <div class="light-bg-f5f5f5 light-bg-seo rounded-lg shadow-lg w-full  light-text-black relative">
                <!-- Close button -->
                <button
                    class="closeModalBtn absolute top-3 right-3 text-gray-400 hover:text-black dark:hover:text-white rounded-full border border-gray-200">
                    <svg class="w-4 h-4  " fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <div class="flex justify-between items-center px-4 mb-4">
                    <div class="flex justify-between items-center px-4 pt-8  mb-4">
                        <h3 class="text-2xl">Documents</h3>
                        <div class="relative w-full max-w-xs pl-2">

                        </div>
                        <div class="flex space-x-2">
                            <div class="relative w-full max-w-xs">
                                <!-- Search icon inside input -->
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 light-text-gray-400 dark:text-gray-500" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </div>

                                <!-- Input field with left padding to make space for icon -->
                                <input type="text" placeholder="Search here"
                                    class="block w-full pl-10 pr-4 py-2 border border-gray-200 light-text-gray-900 dark:text-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 dark:focus:ring-orange-400" />
                            </div>
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
                            <button
                                class="open-upload-modal light-bg-orange-600 dark:bg-orange-700 text-white w-96 py-2 rounded-lg hover:light-bg-orange-700 dark:hover:bg-orange-600 transition-colors text-sm">
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
                                    UPLOADED BY
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
                        <tbody id="document-table" class="bg-transparent border  light-border-gray2">
                            {{-- <tr class="border-2 light-border-gray2">
                                <td class="px-6 py-4 whitespace-nowrap text-sm light-text-black">01</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm light-text-gray-900">
                                    <div class="flex items-center gap-1">
                                        <img class="w-8 h-8" src="Avatar.svg" alt="">
                                        <div>
                                            <p class="text-md">John Doe</p>
                                            <p class="text-xs text-gray-400">Client</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm light-text-gray-900 dark:text-gray-300">
                                    <a href="#"
                                        class="flex items-center bg-gray-200 rounded-md w-36
                                        p-2 light-text-gray-600 dark:text-gray-400 hover:underline">
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

                                <td class="px-6 py-4 whitespace-nowrap text-sm light-text-black">10-5-2024</td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                    <button
                                        class="light-text-red-600 hover:light-text-red-900 dark:text-red-400 dark:hover:text-red-300">
                                        <div class="flex gap-2">
                                            <img src="{{asset('assets/trash.svg')}}" alt="eye" class="bg-gray-200 p-1 rounded-full">
                                        </div>
                                    </button>
                                </td>
                            </tr> --}}
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
                        <div class="flex space-x-1">
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
        </div>
    </div>

     <!-- Upload Modal -->
    <div id="uploadModal" class="fixed inset-0 z-50 bg-black bg-opacity-50 flex items-center justify-center hidden" >
        <div class="p-6 bg-[#1f1f1f] rounded-lg w-full max-w-[70vw] text-white">

            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold">Upload Documents</h2>
                <button class="close-upload-modal text-gray-300 hover:text-white">✕</button>
            </div>

            <!-- file Upload -->
            <div>
                <label class="block text-sm mb-1 light-text-black">Attachment</label>
                <input type="file" id="ticketFile" class="file-input w-full light-text-black light-bg-d7d7d7 p-1 rounded-md focus:outline-none">
            </div>

            <div class="flex justify-end mt-4">
                <div class="flex gap-2">
                    <button class="close-upload-modal bg-gray-600 px-4 py-2 rounded">Cancel</button>
                    <button class="bg-orange-500 text-white px-4 py-2 rounded">Save</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Second (Child) Modal milestone-->
    <div id="milestoneModal"
        class="fixed inset-0 z-50 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-[#1f1f1f] p-6 rounded-lg w-full max-w-[70vw] text-white">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold">Add New Milestone</h2>
                <button id="closeMilestoneModal" class="text-gray-300 hover:text-white">✕</button>
            </div>

            <form  method="POST">
                @csrf

                <label class="block mb-2">Milestone Name</label>
                <input type="text" id="m_milestone_name2" placeholder="Name here..."
                    class="w-full p-2 rounded light-bg-d7d7d7 border border-gray-700 text-white focus:outline-none">

                <div class="flex gap-4 mb-4">
                    <div class="flex-1">
                        <label class="block mb-2">Start Date</label>
                        <input type="date" id="m_start_date2"
                            class="w-full p-2 rounded light-bg-d7d7d7 border border-gray-700 text-white focus:outline-none">
                    </div>
                    <div class="flex-1">
                        <label class="block mb-2">Deadline</label>
                        <input type="date" id="m_deadline2"
                            class="w-full p-2 rounded light-bg-d7d7d7 border border-gray-700 text-white focus:outline-none">
                    </div>
                </div>

                <label class="flex items-center mb-4">
                    <input type="checkbox" class="mr-2"> Mark as High Priority
                </label>

                <div class="flex justify-between mt-4">
                    {{-- <button class="px-4 py-2 rounded bg-[#333] text-white">Add New Milestone</button> --}}
                    <div class="flex gap-2">
                        {{-- <button class="bg-gray-600 px-4 py-2 rounded">Cancel</button> --}}
                        <button type="submit" class="add-milestone-btn bg-orange-500 text-white px-4 py-2 rounded">Save</button>
                    </div>
                </div>

            </form>
            
        </div>
    </div>

    <!-- Third (Child) Modal -->
    <div id="milestoneEditModal"
        class="fixed inset-0 z-50 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-[#1f1f1f] p-6 rounded-lg w-full max-w-[70vw] text-white">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold">Edit Milestone</h2>
                <button id="closeMilestoneEditModal" class="text-gray-300 hover:text-white">✕</button>
            </div>

            <form method="POST" action="{{ route('milestone.edit') }}">
                @csrf

                <input type="text" id="m_project_id" name="project_id">
                <input type="text" id="m_milestone_id" name="milestone_id">


                <label class="block mb-2">Milestone Name</label>
                <input type="text" id="m_milestone_name" name="milestone_name"
                    placeholder="Design UI of Dashboard"
                    class="w-full p-2 rounded light-bg-d7d7d7 border border-gray-700 text-white focus:outline-none">

                <div class="flex gap-4 mb-4">
                    <div class="flex-1">
                        <label class="block mb-2">Start Date</label>
                        <input type="date" id="m_start_date" name="start_date"
                            class="w-full p-2 rounded light-bg-d7d7d7 border border-gray-700 text-white focus:outline-none">
                    </div>
                    <div class="flex-1">
                        <label class="block mb-2">Deadline</label>
                        <input type="date" id="m_deadline" name="deadline"
                            class="w-full p-2 rounded light-bg-d7d7d7 border border-gray-700 text-white focus:outline-none">
                    </div>
                </div>



                <div class="flex justify-between mt-4">

                    <div>
                        <label class="flex items-center mb-4">
                            <input type="checkbox" class="mr-2"> Mark as High Priority
                        </label>
                    </div>

                    <div class="flex gap-2">
                        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 1000)" x-show="show" x-transition
                            class="fixed top-5 right-5 bg-green-500 text-white px-4 py-2 rounded shadow-lg z-50"
                            id="milestoneMsg" style="display: none;">
                            Milestone Updated successfully!
                        </div>



                        {{-- <button class="bg-gray-600 px-4 py-2 rounded">Cancel</button> --}}
                        <button type="submit"
                            class="bg-orange-500 text-white px-4 py-2 rounded edit-milestone">Save</button>
                    </div>
            </form>

        </div>
    </div>

    <!-- MEMBERSHIP MODAL -->
    <div id="membershipModal"
        class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden flex items-center justify-center">
        <div class="bg-[#1e1e1e] text-white rounded-lg w-full max-w-xl p-6 relative">

            <!-- Close Button -->
            <button id="closeMembershipModal" class="absolute top-4 right-4 text-gray-400 hover:text-white">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <!-- Modal Header -->
            <h2 class="text-lg font-semibold mb-4">Add New Membership</h2>

            <!-- Select Dropdown -->
            <div class="mb-6">
                <label class="block mb-1 text-sm">Membership</label>
                <select class="w-full px-4 py-2 bg-[#2c2c2c] text-white border border-gray-600 rounded-md">
                    <option disabled selected>Select Membership</option>
                    <option>Basic</option>
                    <option>Premium</option>
                    <option>Gold</option>
                </select>
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-end space-x-2">
                <button class="px-4 py-2 rounded bg-gray-600 text-white">Cancel</button>
                <button class="px-4 py-2 rounded bg-orange-500 text-white font-semibold">Save</button>
            </div>
        </div>
    </div>

   


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>
        //  milestone data fetch funtion start
        function renderMilestones(milestoneData) {
            const tableBody = document.getElementById('milestoneTableBody');
            tableBody.innerHTML = '';

            if (milestoneData.length === 0) {
                const noDataTr = document.createElement('tr');
                noDataTr.innerHTML = `
                            <td colspan="6" class="px-6 py-4 text-center text-gray-500 italic">
                            No milestones found.
                            </td>
                        `;
                tableBody.appendChild(noDataTr);
                return;
            }

            milestoneData.forEach((milestone, index) => {
                const tr = document.createElement('tr');
                tr.classList.add('border-2', 'light-border-gray2');

                tr.innerHTML = `
                            <td class="px-6 py-4 whitespace-nowrap text-sm light-text-black">${index + 1}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm light-text-black">${milestone.milestone_name}</td>
                            <td class="px-6 py-4 text-sm light-text-black">${milestone.start_date}</td>
                            <td class="px-6 py-4 text-sm light-text-black">${milestone.deadline}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">
                                <input type="hidden" id="milestone_status_id" value="${milestone.id}">
                                <select id="milestone_status" name="milestone_status" class="w-32 px-4 py-2 rounded-lg bg-success-900/50 text-gray-700 hover:bg-gray-200 transition-colors">
                                    <option value="${milestone.status}" selected>${milestone.status}</option>
                                    <option value="In Process">In Process</option>
                                    <option value="Delay">Delay</option>
                                    <option value="Completed">Completed</option>
                                    <option value="Cancelled">Cancelled</option>
                                </select>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <button class="light-text-indigo-600 hover:light-text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300 mr-2"> 
                                    <img src="{{ asset('assets/edit.svg') }}" alt="eye" class="bg-gray-200 open-milestone-edit-modal p-1 rounded-full" 
                                data-milestone-id="${milestone.id}" > 
                                </button> 
                                <button class="delete-milestone light-text-red-600 hover:light-text-red-900 dark:text-red-400 dark:hover:text-red-300" data-m_delete-id="${milestone.id}" data-m_project-id="${milestone.project_id}"> 
                                    <img src="{{ asset('assets/trash.png') }}" alt="eye" class="bg-gray-200 p-1 rounded-full" >
                                </button> 
                            </td> 
                        `;

                tableBody.appendChild(tr);
            });

        }
        //  milestone data fetch funtion start

        // edit milestone code start
        document.addEventListener("DOMContentLoaded", function() {
            const editBtn = document.querySelector('.edit-milestone');

            if (editBtn) {
                editBtn.addEventListener('click', function(e) {
                    e.preventDefault();

                    const milestone_name = document.getElementById('m_milestone_name').value;
                    const start_date = document.getElementById('m_start_date').value;
                    const deadline = document.getElementById('m_deadline').value;
                    const project_id = document.getElementById('m_project_id').value;
                    const milestone_id = document.getElementById('m_milestone_id').value;

                    const formData = new FormData();
                    formData.append('_token', '{{ csrf_token() }}');
                    formData.append('milestone_name', milestone_name);
                    formData.append('start_date', start_date);
                    formData.append('deadline', deadline);
                    formData.append('project_id', project_id);
                    formData.append('milestone_id', milestone_id);

                    fetch('{{ route('milestone.edit') }}', {
                            method: 'POST',
                            body: formData,
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error("Network response was not ok");
                            }
                            return response.json();
                        })
                        .then(data => {
                            // Show success message
                            const msgBox = document.getElementById('milestoneMsg');
                            if (msgBox) {
                                msgBox.style.display = 'block';
                                setTimeout(() => {
                                    msgBox.style.display = 'none';
                                }, 3000);
                            }

                            return fetch('/milestone/list', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                body: JSON.stringify({
                                    project_id: project_id
                                })
                            });
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error("Failed to reload milestones after edit.");
                            }
                            return response.json();
                        })
                        .then(milestoneResponse => {
                            renderMilestones(milestoneResponse.milestonesData);
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('Failed to update milestones after edit.');
                        });
                });
            }
        });
        // edit milestone code start

        //  jquery work
        $(document).ready(function() {

            // project data fetch using ajax start
            function projectData() {

                $.ajax({
                    type: 'GET',
                    url: '/project/list',
                    success: function(response) {
                        if (response.success) {
                            let rows = '';
                            let count = 0;

                            let index = 1;

                            if (response.success.length > 0) {

                                response.success.forEach(function(project) {
                                    count++;

                                    rows += `
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium light-text-gray-900">
                                                ${index++}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm font-medium light-text-gray-900">
                                                        ${project.project_name}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm light-text-gray-900">
                                                    <div class="flex items-center gap-1">
                                                        <p>${project.client_name}</p>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm light-text-gray-900">
                                                    <div class="flex items-center gap-1">
                                                        ${
                                                            project.user
                                                                ? (project.user.image
                                                                    ? `<img class="w-12 h-12 light-text-gray-900 rounded-full light-mode-icon" src="${project.user.image}" alt="User Image">`
                                                                    : `<img class="w-12 h-12 light-text-gray-900 rounded-full light-mode-icon" src="/assets/profile-circle-DARK.svg" alt="Default User">`
                                                                )
                                                                : `<p>No user assigned</p>`
                                                        }
                                                    </div>
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <button style="border-radius: 20px;" class="w-52 bg-gray-200 rounded-full h-2.5 mb-4 dark:bg-gray-700" onclick="myFunction()">
                                                        <progress class="w-full" style="border-radius: 45px !important;color:orange;"  value="78" max="100"></progress> 78%
                                                    </button>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">
                                                    <input type="hidden" id="project_status_id" value="${project.id}">
                                                    <select id="project_status" name="project_status" class="w-32 px-4 py-2 rounded-lg bg-success-900/50 text-gray-700 hover:bg-gray-200 transition-colors">
                                                        <option value="${project.status}" selected>${project.status}</option>
                                                        <option value="In Process">In Process</option>
                                                        <option value="Delay">Delay</option>
                                                        <option value="Completed">Completed</option>
                                                        <option value="Cancelled">Cancelled</option>
                                                    </select>
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <button class="light-text-orange-500 rounded-full p-1 light-hover-text-orange-700 toggle-btn toggle-btn" data-target="expand-0${count}">
                                                        <i class="fa-solid fa-arrow-down"></i>
                                                    </button>
                                                </td>
                                            </tr>

                                            <tr id="expand-0${count}" class="hidden light-text-black">
                                                <td colspan="7" class="px-6 py-4">

                                                <!-- Sub-table Head -->
                                                <div
                                                    class="grid grid-cols-6  font-semibold light-text-black border-b border-gray-300">
                                                    <div class="w-1/2">#</div>
                                                    <div class="flex items-center text-xs">
                                                        AMOUNT
                                                        <svg class="icon mr-10 w-4 h-4" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path d="M7 8 L12 3 L17 8" />
                                                            <path d="M7 16 L12 21 L17 16" />
                                                        </svg>
                                                    </div>
                                                    <div class="flex items-center text-xs">
                                                        LEAD SOURCE
                                                        <svg class="icon ml-1 w-4 h-4" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path d="M7 8 L12 3 L17 8" />
                                                            <path d="M7 16 L12 21 L17 16" />
                                                        </svg>
                                                    </div>
                                                    <div class="flex items-center text-xs">
                                                        CURRENT PROJECT
                                                        <svg class="icon ml-1 w-4 h-4" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path d="M7 8 L12 3 L17 8" />
                                                            <path d="M7 16 L12 21 L17 16" />
                                                        </svg>
                                                    </div>
                                                    <div class="flex items-center text-xs">
                                                        MEMBERSHIP
                                                        <svg class="icon ml-1 w-4 h-4" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path d="M7 8 L12 3 L17 8" />
                                                            <path d="M7 16 L12 21 L17 16" />
                                                        </svg>
                                                    </div>
                                                    <div class="flex items-center text-xs">ACTION</div>
                                                </div>

                                                     <!-- Sub-table Row -->
                                                    <div class="grid grid-cols-6 pt-2 mt-2 light-text-black">
                                                        <div class="w-1/2"></div>
                                                        <div>${project.price}</div>
                                                        <div>Email Marketing</div>
                                                        <div>${project.project_name}</div>
                                                        <div>
                                                           ${project.membership}
                                                        </div>
                                                        <div class="flex items-center gap-2">

                                                             <img src="{{ asset('assets/document-download-DARK.svg') }}"
                                                                 id="openModalBtn" alt="Action 1"
                                                                 class="openModalBtn w-6 h-6 rounded-full p-1 bg-gray-500"
                                                                 data-d-project-id = "${project.id }"
                                                                 />

                                                             <img src="{{ asset('assets/edit.svg') }}" alt="Action 2"
                                                                 class="edit-project-modal w-6 h-6  rounded-full p-1 bg-gray-500"
                                                                 data-action="view-project"
                                                                 data-project-id = "${project.id }" />

                                                             <img data-delete_p-id = "${project.id}"  src="{{ asset('assets/trash.svg') }}"
                                                                 alt="Action 3"
                                                                 class="delete-project w-6 h-6 rounded-full p-1 bg-gray-500" />
                                                        </div>

                                                    </div>            

                                                </td>
                                            </tr>
                                        `;
                                });

                            } else {
                                rows = `
                                        <tr>
                                            <td colspan="7" class="px-6 py-4 whitespace-nowrap text-sm font-medium light-text-gray-900 text-left">
                                                No projects found.
                                            </td>
                                        </tr>
                                    `;
                            }
                            $('#project-table-body').html(rows);
                        }

                    },
                    error: function(xhr) {
                        console.error('Error fetching project data:', xhr.responseText);
                    }
                });

            }

            projectData();

            $('#project-table-body').on('click', '.toggle-btn', function() {
                const targetId = $(this).data('target');
                $('#' + targetId).toggleClass('hidden');
            });

            // project data fetch using ajax end

            // project start
            $('#addProject').click(function(event) {
                event.preventDefault();


                project_name = $('#project_name').val();
                client_name = $('#client_name').val();
                membership = $('#membership').val();
                assign_to = $('#assign_to').val();
                price = $('#price').val();
                start_date = $('#start_date').val();
                end_date = $('#end_date').val();
                user_id = $('#user_id').val();
                file = $('#document_name').val();

                let formData = new FormData();

                formData.append('_token', '{{ csrf_token() }}');
                formData.append('project_name', project_name);
                formData.append('client_name', client_name);
                formData.append('membership', membership);
                formData.append('assign_to', assign_to);
                formData.append('price', price);
                formData.append('start_date', start_date);
                formData.append('end_date', end_date);
                formData.append('user_id', user_id);
                formData.append('document_name', $('#document_name')[0].files[0]);

                for (let [key, value] of formData.entries()) {
                    console.log(`${key}:`, value);
                }

                $.ajax({
                    url: "{{ route('project.store') }}",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response) {
                            projectData();

                            $('#msg').fadeIn(400);
                            setTimeout(() => {
                                $('#msg').fadeOut(600);
                            }, 3000);

                            $('#project_name').val('');
                            $('#client_name').val('');
                            $('#membership').val('');
                            $('#assign_to').val('');
                            $('#price').val('');
                            $('#start_date').val('');
                            $('#end_date').val('');
                            $('#document_name').val('');

                            document.getElementById('project_id').value = response.project_id;

                            $('#taskMilestoneModal').css('display','flex');
                            $('#taskModal').addClass('hidden')


                        }
                        
                    },
                    error: function(xhr, status, error) {
                        if (xhr.status === 422) { 
                            let errors = xhr.responseJSON.errors;
                            let errorHtml = '<ul class="list-disc list-inside">';

                            $.each(errors, function(key, messages) {
                                $.each(messages, function(index, message) {
                                    errorHtml += '<li>' + message + '</li>';
                                });
                            });

                            errorHtml += '</ul>';

                            $('.Errors').html(errorHtml).fadeIn();

                            
                            setTimeout(() => {
                                $('.Errors').fadeOut();
                            }, 5000);

                        }
                        else {
                            $('.Errors').html('An unexpected error occurred.').fadeIn();
                            setTimeout(() => {
                                $('.Errors').fadeOut();
                            }, 5000);
                        }
                    }

                });

            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
                console.log("Meow");

            $(document).on('click', '.edit-project-modal', function() {
                const currentProjectId = $(this).data('project-id');

                console.log("edit modal clicked" + currentProjectId)

                // $.ajax({
                //     url: '/projects/project-id',
                //     method: 'POST',
                //     data: {
                //         id: currentProjectId
                //     },
                //     success: function(response) {
                //         $('.add-milestone-btn').attr('data-project-id', currentProjectId);
                //         $('#edit_project_name').val(response.data.project_name);
                //         $('#edit_client_name').val(response.data.client_name);
                //         $('#edit_price').val(response.data.price);
                //         $('#edit_start_date').val(response.data.start_date);
                //         $('#edit_end_date').val(response.data.end_date);
                //         $('#edit_membership').val(response.data.membership);
                //         $('#edit_assign_to').val(response.data.user.id);
                //         $('#edit_user_id').val(response.data.user_id);
                //         $('#edit_project_id').val(response.data.id);
                //         renderMilestones(response.milestoneData);
                //     }
                // });

            });


            $('.edit-project').on('click', function(s) {
                s.preventDefault()

                project_name = $('#edit_project_name').val();
                client_name = $('#edit_client_name').val();
                membership = $('#edit_membership').val();
                assign_to = $('#edit_assign_to').val();
                price = $('#edit_price').val();
                start_date = $('#edit_start_date').val();
                end_date = $('#edit_end_date').val();
                user_id = $('#edit_user_id').val();
                project_id = $('#edit_project_id').val();

                let formData = new FormData();

                formData.append('_token', '{{ csrf_token() }}');
                formData.append('project_name', project_name);
                formData.append('client_name', client_name);
                formData.append('membership', membership);
                formData.append('assign_to', assign_to);
                formData.append('price', price);
                formData.append('start_date', start_date);
                formData.append('end_date', end_date);
                formData.append('user_id', user_id);
                formData.append('id', project_id);


                $.ajax({
                    url: '/edit-project',
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        projectData();
                        $('#updateMsg').fadeIn(400);
                        setTimeout(() => {
                            $('#updateMsg').fadeOut(600);
                        }, 3000);
                    }
                });
            });

            $(document).on('click', '.delete-project', function() {
                let ProjectId = $(this).data('delete_p-id');
                console.log(ProjectId);
                $.ajax({
                    url: '/project/delete',
                    method: 'POST',
                    data: {
                        delete_id: ProjectId
                    },
                    success: function(response) {
                        projectData();
                        $('#deleteProject').fadeIn(400);
                        setTimeout(() => {
                            $('#deleteProject').fadeOut(600);
                        }, 3000);
                    }
                });
            });

            $(document).on('change', '#project_status', function() {

                let selectedStatus = $(this).val();
                let project_status_id = $('#project_status_id').val();


                $.ajax({
                    url: '/projects/status',
                    method: 'POST',
                    data: {
                        project_status: selectedStatus,
                        project_status_id: project_status_id
                    },
                    success: function(response) {
                        projectData();
                        $('#Projectstatus').fadeIn(400);

                        setTimeout(() => {
                            $('#Projectstatus').fadeOut(600);
                        }, 3000);
                    }
                });

            });

            // project end

            // milestone start
            $('#addMilestone').click(function(event) {
                event.preventDefault();

                milestone_name = $('#milestone_name').val();
                milestone_start_date = $('#milestone_start_date').val();
                deadline = $('#deadline').val();
                project_id = $('#project_id').val();

                let formData = new FormData();

                formData.append('_token', '{{ csrf_token() }}');
                formData.append('milestone_name', milestone_name);
                formData.append('milestone_start_date', milestone_start_date);
                formData.append('deadline', deadline);
                formData.append('project_id', project_id);

                $.ajax({
                    url: "{{ route('milestone.store') }}",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response) {
                            $('#milestone_name').val('');
                            $('#milestone_start_date').val('');
                            $('#deadline').val('');

                            $('#mileStonemsg').fadeIn(400);
                            setTimeout(() => {
                                $('#mileStonemsg').fadeOut(600);
                            }, 3000);
                        }
                    },
                    error: function(xhr, status, error) {
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;

                            let milestoneError = '<ul class="list-disc list-inside">';
                            
                            $.each(errors, function(key, m_messages) {
                                $.each(m_messages, function(index, m_message) {
                                    milestoneError += '<li>' + m_message + '</li>';
                                });
                            });

                            milestoneError += '</ul>';

                            $('.Errors').html(milestoneError).fadeIn(); 

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

            $(document).on('change', '#milestone_status', function(){

                let selectedMStatus = $(this).val();
                 let milestone_status_id = $('#milestone_status_id').val();

                $.ajax({
                    url : '/milestone/status',
                    method : 'POST',
                    data : {milestone_status : selectedMStatus, milestone_status_id : milestone_status_id},
                    success: function(response){
                         $('#milestonestatus').fadeIn(400);
                         setTimeout(() => {
                             $('#milestonestatus').fadeOut(600);
                         }, 3000);

                    }
                });

            });

            $(document).on('click', '.add-milestone-btn', function(e){
                e.preventDefault();
                let milestone_project_id = $(this).attr('data-project-id');

                milestone_name = $('#m_milestone_name2').val();
                milestone_start_date = $('#m_start_date2').val();
                deadline = $('#m_deadline2').val();

                let formData = new FormData();

                formData.append('_token', '{{ csrf_token() }}');
                formData.append('milestone_name', milestone_name);
                formData.append('milestone_start_date', milestone_start_date);
                formData.append('deadline', deadline);
                formData.append('project_id', milestone_project_id);


                $.ajax({
                    url: "{{ route('milestone.store') }}",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response) {
                            $('#m_milestone_name2').val('');
                            $('#m_start_date2').val('');
                            $('#m_deadline2').val('');

                            $('#m_mileStonemsg').fadeIn(400);
                            setTimeout(() => {
                                $('#m_mileStonemsg').fadeOut(600);
                            }, 3000);

                            $.ajax({
                                    url: '/milestone/list',
                                    method: 'POST',
                                    data: {
                                        project_id: milestone_project_id
                                    },
                                    success: function(milestoneResponse) {
                                        renderMilestones(milestoneResponse
                                            .milestonesData);
                                    },
                                    error: function() {
                                        alert(
                                            'Failed to reload milestones after deletion.'
                                        );
                                    }
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;

                            let milestoneError = '<ul class="list-disc list-inside">';
                            
                            $.each(errors, function(key, m_messages) {
                                $.each(m_messages, function(index, m_message) {
                                    milestoneError += '<li>' + m_message + '</li>';
                                });
                            });

                            milestoneError += '</ul>';

                            $('.Errors').html(milestoneError).fadeIn(); 

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

            // milestone end


            // document work start

            function renderDocuments(documentResponse) {
                let documents = documentResponse.documentData;
                let tbody = $('#document-table');

                tbody.empty();

                if (documents.length === 0) {
                    let row = `
                        <tr class="border-2 light-border-gray2">
                            <td colspan="5" class="px-6 py-4 whitespace-nowrap text-center text-sm light-text-black">
                                Documents not found
                            </td>
                        </tr>
                    `;
                    tbody.append(row);
                } else {
                    documents.forEach(function(document, index) {
                        let createdDate = document.created_at.split("T")[0];
                        let row = `
                        <tr class="border-2 light-border-gray2">
                            <td class="px-6 py-4 whitespace-nowrap text-sm light-text-black">${index + 1}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm light-text-gray-900">
                                <div class="flex items-center gap-1">
                                    <img class="w-8 h-8 rounded-full" src="${document.project.creator.image || '/assets/profile-circle-DARK.svg'}" alt="User Image">
                                    <div>
                                        <p class="text-md">${document.project.creator.name}</p>
                                        <p class="text-xs text-gray-400">${document.project.client_name}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm light-text-gray-900 dark:text-gray-300">
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
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm light-text-black">${createdDate}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                <button class="light-text-red-600 hover:light-text-red-900 dark:text-red-400 dark:hover:text-red-300">
                                    <div class="flex gap-2">
                                        <img data-document-id="${document.id}" data-d_project-id="${document.id}" src="{{ asset('assets/trash.svg') }}" alt="eye" class="delete-document-btn bg-gray-200 p-1 rounded-full">
                                    </div>
                                </button>
                            </td>
                        </tr>
                        `;
                        tbody.append(row);
                    });
                }


            }

            $(document).on('click', '.openModalBtn', function() {
                let project_id = $(this).data('d-project-id');
                $.ajax({
                    url: 'project/document',
                    method: 'POST',
                    data: {
                        project_id: project_id
                    },
                    success: function(documentresponse) {
                        renderDocuments(documentresponse);
                    }

                });
            });

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
                                renderDocuments(documentResponse);
                            },
                            error: function() {
                                alert(
                                    'Failed to reload milestones after deletion.'
                                );
                            }
                        });


                    }
                });
            })

            // document work end

        });

    </script>


    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const body = document.body;
            const htmlElement = document.documentElement;
            const themeToggleBtn = document.getElementById('themeToggle');
            const knowledgeButton = document.getElementById('knowledgeButton');

            // ========== DROPDOWN HANDLING ==========
            const filterButtons = document.querySelectorAll('[id^="filterButton"]');
            const filterDropdowns = document.querySelectorAll('[id^="filterDropdown"]');

            const updateDropdownColors = () => {
                const isDarkMode = body.classList.contains('dark-mode');
                filterDropdowns.forEach(dropdown => {
                    dropdown.style.color = isDarkMode ? 'white' : 'black';
                    dropdown.style.backgroundColor = isDarkMode ? '#1a1a1a' : 'white';
                });
            };

            filterButtons.forEach((button, index) => {
                const dropdown = filterDropdowns[index];
                button.addEventListener('click', (e) => {
                    e.stopPropagation();

                    // Hide all other dropdowns
                    filterDropdowns.forEach((d, i) => {
                        if (i !== index) d.classList.add('hidden');
                    });

                    // Toggle current dropdown
                    dropdown.classList.toggle('hidden');

                    // Position it absolutely outside the table cell
                    if (!dropdown.classList.contains('hidden')) {
                        const rect = button.getBoundingClientRect();
                        dropdown.style.position = 'absolute';
                        dropdown.style.top = `${rect.bottom + window.scrollY + 4}px`;
                        dropdown.style.left = `${rect.left + window.scrollX}px`;
                        dropdown.style.zIndex = 9999;
                    }

                    updateDropdownColors();
                });
            });

            document.addEventListener('click', () => {
                filterDropdowns.forEach(dropdown => dropdown.classList.add('hidden'));
            });

            // ========== DARK MODE TOGGLE ==========
            const toggleDarkMode = () => {
                body.classList.toggle('dark-mode');
                updateImageSources(body.classList.contains('dark-mode'));
                updateDropdownColors();
                localStorage.setItem('theme', body.classList.contains('dark-mode') ? 'dark' : 'light');
            };

            const updateImageSources = (isDarkMode) => {
                document.querySelectorAll('.light-mode-icon').forEach(icon => {
                    const darkSrc = icon.dataset.darkSrc;
                    const originalSrc = icon.src.replace('-DARK.svg', '.svg');
                    if (darkSrc) icon.src = isDarkMode ? darkSrc : originalSrc;
                });

                document.querySelectorAll('.light-mode-img').forEach(img => {
                    const darkSrc = img.dataset.darkSrc;
                    const originalSrc = img.src.replace('-DARK.png', '.png');
                    if (darkSrc) img.src = isDarkMode ? darkSrc : originalSrc;
                });

                const logo = document.querySelector('.light-mode-logo');
                if (logo) {
                    const darkLogoSrc = logo.dataset.darkSrc;
                    logo.src = isDarkMode ? darkLogoSrc : 'Frame 2147224409.png';
                }
            };

            // Apply saved theme on load
            if (localStorage.getItem('theme') === 'dark') {
                body.classList.add('dark-mode');
            }

            updateImageSources(body.classList.contains('dark-mode'));
            updateDropdownColors();

            if (knowledgeButton) {
                knowledgeButton.addEventListener('click', (e) => {
                    e.preventDefault();
                    toggleDarkMode();
                });
            }

            // ========== EXPANDABLE ROWS ==========
            document.querySelectorAll('.toggle-btn').forEach(button => {
                button.addEventListener('click', () => {
                    const targetId = button.getAttribute('data-target');
                    const targetRow = document.getElementById(targetId);
                    targetRow.classList.toggle('hidden');
                });
            });

            // ========== SEO CARD TOGGLE ==========
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

            // ========== MODALS ==========
            const modal = document.getElementById('projectModal');
            const closeBtn = document.getElementById('closeModal');
            const tabButtons = document.querySelectorAll('.tab-btn');
            const tabContents = document.querySelectorAll('.tab-content');
            const openModalBtns = document.querySelectorAll(".openModalBtn"); // ✅ plural
            const closeModalBtns = document.querySelectorAll(".closeModalBtn"); // ✅ plural
            const modals = document.getElementById("customModal");

            const taskModal = document.getElementById('taskModal');
            const openTaskModalBtn = document.getElementById('openTaskModalBtn');
            const closeTaskModalBtn = document.getElementById('closeTaskModalBtn');
            
            const taskMilestoneModal = document.getElementById('taskMilestoneModal');
            const openTaskMilestoneModalBtn = document.querySelectorAll('.open-Task-Milestone-Modal-Btn');
            const closeTaskMilestoneModalBtn = document.querySelectorAll('.close-Task-Milestone-Modal-Btn');

            // Open/Close task modal
            // openTaskModalBtn?.addEventListener('click', () => {
            //     taskModal.classList.remove('hidden');
            // });
            closeTaskModalBtn?.addEventListener('click', () => {
                taskModal.classList.add('hidden');
            });

            // openTaskMilestoneModalBtns.forEach((btn, index) => {
            // btn.addEventListener('click', () => {
            //     if (taskMilestoneModals[index]) {
            //         taskMilestoneModals[index].style.display = 'block';
            //     }
            //     });
            // });

            closeTaskMilestoneModalBtn.forEach((btn, index) => {
            btn.addEventListener('click', () => {
                if (taskMilestoneModals[index]) {
                    taskMilestoneModals[index].style.display = 'none';
                }
                });
            });

            // ✅ Open modal on click of any button
            document.addEventListener("click", function(e) {
                if (e.target.classList.contains("openModalBtn")) {
                    modals.classList.remove("hidden");
                }
            });


            // ✅ Close modal on click of any close button
            closeModalBtns.forEach((btn) => {
                btn.addEventListener("click", () => {
                    modals.classList.add("hidden");
                });
            });

            // ✅ Close modal when clicking outside the modal content
            window.addEventListener("click", (e) => {
                if (e.target === modals) {
                    modals.classList.add("hidden");
                }
            });

            openTaskMilestoneModalBtn?.addEventListener('click', () => {
    // Close the task modal
    taskModal.classList.add('hidden');

    // Open the milestone modal
    taskMilestoneModal.classList.remove('hidden');

    // Optional: Show default tab inside milestone modal
    showTab('taskTab2', taskMilestoneModal);
});


            // ========== DARK MODE ==========


            function setTheme(theme) {
                if (theme === 'dark') {
                    htmlElement.classList.add('dark');
                    localStorage.setItem('theme', 'dark');
                    if (themeToggleBtn) {
                        themeToggleBtn.innerHTML = '<i class="fa-solid fa-sun"></i> Light Mode';
                    }
                } else {
                    htmlElement.classList.remove('dark');
                    localStorage.setItem('theme', 'light');
                    if (themeToggleBtn) {
                        themeToggleBtn.innerHTML = '<i class="fa-solid fa-moon"></i> Dark Mode';
                    }
                }
            }

            if (themeToggleBtn) {
                themeToggleBtn.addEventListener('click', () => {
                    const isDark = htmlElement.classList.contains('dark');
                    setTheme(isDark ? 'light' : 'dark');
                });
            }

            const savedTheme = localStorage.getItem('theme');
            if (savedTheme) {
                setTheme(savedTheme);
            } else if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
                setTheme('dark');
            } else {
                setTheme('light');
            }

            // ========== MODAL TABS ==========
            function showTab(tabId, container) {
                const tabButtons = container.querySelectorAll('.tab-btn, .task-tab-btn');
                const tabContents = container.querySelectorAll('.tab-content, .task-tab-content');

                // Hide all tab contents
                tabContents.forEach(content => content.classList.add('hidden'));

                // Deactivate all tab wrappers
                const tabWrappers = container.querySelectorAll('.tab-wrapper');
                tabWrappers.forEach(wrapper => wrapper.classList.remove('active', 'bg-gray-tab'));

                // Deactivate all tab buttons
                tabButtons.forEach(button => {
                    button.classList.remove(
                        'text-orange-500', 'dark:text-orange-400',
                        'text-gray-700', 'dark:text-gray-300',
                        'hover:text-gray-900', 'dark:hover:text-gray-100'
                    );
                    button.classList.add(
                        'text-gray-700', 'dark:text-gray-300',
                        'hover:text-gray-900', 'dark:hover:text-gray-100'
                    );
                });

                // Show selected tab content
                container.querySelector(`#${tabId}Content`)?.classList.remove('hidden');

                // Activate selected button
                const activeButton = container.querySelector(
                    `.tab-btn[data-tab="${tabId}"], .task-tab-btn[data-tab="${tabId}"]`);
                if (activeButton) {
                    activeButton.classList.remove(
                        'text-gray-700', 'dark:text-gray-300',
                        'hover:text-gray-900', 'dark:hover:text-gray-100'
                    );
                    activeButton.classList.add('text-orange-500', 'dark:text-orange-400');

                    const wrapper = activeButton.closest('.tab-wrapper');
                    if (wrapper) {
                        wrapper.classList.add('active', 'bg-gray-tab');
                    }
                }
            }
            if (projectModal) {
                projectModal.querySelectorAll('.tab-btn').forEach(btn => {
                    btn.addEventListener('click', () => {
                        const tabId = btn.dataset.tab;
                        showTab(tabId, projectModal);
                    });
                });
            }
            if (taskModal) {
                taskModal.querySelectorAll('.tab-btn, .task-tab-btn').forEach(btn => {
                    btn.addEventListener('click', () => {
                        const tabId = btn.dataset.tab;
                        showTab(tabId, taskModal);
                    });
                });
            }
            if (taskMilestoneModal) {
            taskMilestoneModal.querySelectorAll('.milestone-task-tab-btn').forEach(btn => {
                btn.addEventListener('click', () => {
                    const tabId = btn.dataset.tab;
                    showTab(tabId, taskMilestoneModal);
                });
                });
            }

            // Auto-show tab on milestone modal open
            openTaskMilestoneModalBtn?.addEventListener('click', () => {
                taskMilestoneModal.classList.remove('hidden');
                showTab('taskTab2', taskMilestoneModal);
            });

            closeTaskMilestoneModalBtn?.addEventListener('click', () => {
                taskMilestoneModal.classList.add('hidden');
            });


            // ✅ Restore tab button listeners
            tabButtons.forEach(btn => {
                btn.addEventListener('click', function() {
                    const tabId = this.dataset.tab;
                    showTab(tabId);
                });
            });


            // ========== MODAL VIEW PROJECT LOGIC ==========
            document.addEventListener('click', function(e) {
                const eyeBtn = e.target.closest('[data-action="view-project"]');
                if (!eyeBtn) return;

                const row = eyeBtn.closest('tr');
                if (!row) return;

                const projectName = row.querySelector('td:nth-child(2) div:first-child')?.textContent ||
                    'Website SEO';
                const priorityElement = row.querySelector('.light-bg-ea54547a');
                const priority = priorityElement ? priorityElement.textContent.trim() : 'High Priority';
                const progressValue = row.querySelector('td:nth-child(6) span:last-child')?.textContent
                    ?.replace('Progress ', '') || '78%';
                const statusValue = row.querySelector('td:nth-child(7) span:last-child')?.textContent
                    ?.replace('STATUS ', '') || 'InProgress';
                const startDateValue = row.querySelector('td:nth-child(4)')?.textContent?.trim() ||
                    '05-7-2024';
                const deadlineValue = row.querySelector('td:nth-child(5)')?.textContent?.trim() ||
                    '05-7-2024';
                const priceValue = row.querySelector('td:nth-child(3) span:last-child')?.textContent
                    ?.replace('PRICE ', '') || '$4000';

                modal.querySelector('h2').textContent = projectName;
                const modalPriorityBadge = modal.querySelector('.text-xs.font-medium.rounded');
                if (modalPriorityBadge) modalPriorityBadge.textContent = priority;

                const overviewContent = document.getElementById('overviewContent');
                if (overviewContent) {
                    const priceSpan = Array.from(overviewContent.querySelectorAll('span')).find(el =>
                        el.textContent.includes('PRICE') && el.closest('.flex.items-center')
                    );
                    if (priceSpan) priceSpan.textContent = `PRICE ${priceValue}`;

                    const statusSpan = Array.from(overviewContent.querySelectorAll(
                        '.flex.items-center span')).find(el => el.textContent.includes('STATUS'));
                    if (statusSpan) statusSpan.textContent = `STATUS ${statusValue}`;

                    const deadlineSpan = Array.from(overviewContent.querySelectorAll(
                        '.flex.items-center span')).find(el => el.textContent.includes('DEADLINE'));
                    if (deadlineSpan) deadlineSpan.textContent = `DEADLINE ${deadlineValue}`;
                }

                modal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
                showTab('overview');
            });

            closeBtn?.addEventListener('click', () => {
                modal.classList.add('hidden');
                document.body.style.overflow = 'auto';
            });

            modal?.addEventListener('click', (e) => {
                if (e.target === modal) {
                    modal.classList.add('hidden');
                    document.body.style.overflow = 'auto';
                }
            });

            console.log('✅ All scripts initialized');
        });


        document.addEventListener("DOMContentLoaded", () => {
            const customModal = document.getElementById("customModal");
            const milestoneModal = document.getElementById("milestoneModal");
            const openMilestoneBtns = document.querySelectorAll(".open-milestone-modal");
            const closeMilestoneBtn = document.getElementById("closeMilestoneModal");
            const milestoneEditModal = document.getElementById("milestoneEditModal");
            const openMilestoneEditBtns = document.querySelectorAll(".open-milestone-edit-modal");
            const closeMilestoneEditBtn = document.getElementById("closeMilestoneEditModal");
            const projectModal = document.getElementById("projectModal");
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

            openMilestoneBtns.forEach(btn => {
                btn.addEventListener("click", () => {
                    customModal.classList.add("hidden");
                    milestoneModal.classList.remove("hidden");
                });
            });

            closeMilestoneBtn?.addEventListener("click", () => {
                milestoneModal.classList.add("hidden");

            });




            //  milestone show and delete start

            const tableBody = document.getElementById('milestoneTableBody');

            tableBody.addEventListener('click', (event) => {
                // Edit Milestone
                const editBtn = event.target.closest('.open-milestone-edit-modal');
                if (editBtn) {
                    customModal.classList.add('hidden');
                    milestoneEditModal.classList.remove('hidden');

                    const milestoneId = editBtn.getAttribute('data-milestone-id');

                    $.ajax({
                        url: '/milestone/milestone-id',
                        method: 'POST',
                        data: {
                            milestoneId: milestoneId
                        },
                        success: function(milestoneResponse) {
                            document.getElementById('m_milestone_name').value =
                                milestoneResponse.milestoneDatafetch.milestone_name;
                            document.getElementById('m_start_date').value = milestoneResponse
                                .milestoneDatafetch.start_date;
                            document.getElementById('m_deadline').value = milestoneResponse
                                .milestoneDatafetch.deadline;
                            document.getElementById('m_project_id').value = milestoneResponse
                                .milestoneDatafetch.project_id;
                            document.getElementById('m_milestone_id').value = milestoneResponse
                                .milestoneDatafetch.id;
                        },
                        error: function(err) {
                            console.error('AJAX error:', err);
                        }
                    });

                    return;
                }

                document.addEventListener('click', function(event) {
                    const deleteBtn = event.target.closest('.delete-milestone');
                    if (deleteBtn) {
                        const deleteId = deleteBtn.getAttribute('data-m_delete-id');
                        const projectId = deleteBtn.getAttribute('data-m_project-id');

                        $.ajax({
                            url: '/milestone/delete',
                            method: 'POST',
                            data: {
                                delete_id: deleteId
                            },
                            success: function(deleteResponse) {
                                document.getElementById('milestonedelete').style
                                    .display = 'block';

                                setTimeout(function() {
                                    document.getElementById('milestonedelete')
                                        .style.display = 'none';
                                }, 3000);

                                $.ajax({
                                    url: '/milestone/list',
                                    method: 'POST',
                                    data: {
                                        project_id: projectId
                                    },
                                    success: function(milestoneResponse) {
                                        renderMilestones(milestoneResponse
                                            .milestonesData);
                                    },
                                    error: function() {
                                        alert(
                                            'Failed to reload milestones after deletion.'
                                        );
                                    }
                                });
                            }
                        });

                    }
                });


            });

            //  milestone show and delete end



            openMilestoneEditBtns.forEach(btn => {
                btn.addEventListener("click", () => {
                    customModal.classList.add("hidden");
                    milestoneEditModal.classList.remove("hidden");
                });
            });

            closeMilestoneEditBtn?.addEventListener("click", () => {
                milestoneEditModal.classList.add("hidden");

            });


            const openProjectModalBtns = document.querySelectorAll(".open-project-modal");



            openProjectModalBtns.forEach(button => {
                button.addEventListener("click", () => {
                    if (customModal && projectModal) {
                        customModal.classList.add("hidden");
                        projectModal.classList.remove("hidden");
                    } else {
                        console.warn("One or both modals not found in DOM");
                    }
                });
            });
        });

        document.addEventListener('DOMContentLoaded', () => {
            const membershipModal = document.getElementById("membershipModal");
            const openMembershipBtns = document.querySelectorAll(".open-membership-modal");
            const closeMembershipBtn = document.getElementById("closeMembershipModal");

            // Open modal when tab/button is clicked
            openMembershipBtns.forEach(btn => {
                btn.addEventListener("click", () => {
                    // ⛔ Close the previous modal
                    const tabModal = document.getElementById("projectModal");
                    tabModal?.classList.add("hidden");

                    // ✅ Open the membership modal
                    membershipModal.classList.remove("hidden");
                });
            });

            // Close modal on close button
            closeMembershipBtn?.addEventListener("click", () => {
                membershipModal.classList.add("hidden");
            });

            // Optional: Close on background click
            window.addEventListener("click", (e) => {
                if (e.target === membershipModal) {
                    membershipModal.classList.add("hidden");
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


</body>

</html>

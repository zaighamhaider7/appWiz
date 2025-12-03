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

        /* Modal styling */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: white;
            margin: 10% auto;
            padding: 30px;
            border-radius: 8px;
            width: 90%;
            max-width: 500px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .modal-title {
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }

        .close-btn {
            font-size: 28px;
            cursor: pointer;
            color: #aaa;
        }

        .close-btn:hover {
            color: #333;
        }

        .price {
            font-size: 32px;
            font-weight: bold;
            margin: 15px 0;
            color: #2c3e50;
        }

        .price-period {
            font-size: 16px;
            color: #7f8c8d;
        }

        .divider {
            border: none;
            height: 1px;
            background-color: #eee;
            margin: 20px 0;
        }

        .feature-list {
            list-style-type: none;
            padding: 0;
        }

        .feature-list li {
            padding: 8px 0;
            display: flex;
            align-items: center;
        }

        .feature-list [type="checkbox"] {
            margin-right: 10px;
        }

        .buy-btn {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
            margin-top: 20px;
            transition: background-color 0.3s;
        }

        .buy-btn:hover {
            background-color: #2980b9;
        }

        /* Your existing button style */
        .pricing-btn {
            background-color: #2ecc71;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .pricing-btn:hover {
            background-color: #27ae60;
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

        .light-transparent {
            background-color: transparent;
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

        .dark-mode .light-transparent {
            background-color: #333333;
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

        .toggle-switch {
            position: relative;
            display: inline-flex;
            align-items: center;
            cursor: pointer;
        }

        .toggle-input {
            position: absolute;
            opacity: 0;
            width: 0;
            height: 0;
        }

        .toggle-slider {
            width: 2.75rem;
            height: 1.5rem;
            background-color: #2d2d2d;
            /* gray-200 */
            border-radius: 9999px;
            position: relative;
            transition: all 0.3s;
        }

        .toggle-slider:before {
            content: "";
            position: absolute;
            height: 1.25rem;
            width: 1.25rem;
            left: 0.125rem;
            top: 0.125rem;
            background-color: white;
            border: 1px solid z#d1d5db;
            /* gray-300 */
            border-radius: 50%;
            transition: all 0.3s;
        }

        .toggle-input:checked+.toggle-slider {
            background-color: #ea580c;
            /* orange-600 */
        }

        .toggle-input:checked+.toggle-slider:before {
            transform: translateX(1.25rem);
            border-color: white;
        }

        @media (prefers-color-scheme: dark) {
            .toggle-input:checked+.toggle-slider {
                background-color: #ea580c;
                /* orange-600 in dark mode too */
            }
        }

        /* === Media Queries === */

        /* Keep header items in one line */
        header.header {
            flex-wrap: nowrap;
            /* No wrapping */
            gap: 0.5rem;
            align-items: center;
        }

        /* Search input responsiveness */
        header.header .relative {
            flex: 1 1 auto;
            min-width: 0;
        }

        /* Input field width adjustments */
        header.header input[type="text"] {
            width: 100%;
            max-width: 400px;
            box-sizing: border-box;
        }

        /* Right-side icons responsiveness */
        header.header>.flex.items-center.space-x-4 {
            flex-shrink: 0;
            gap: 0.5rem;
        }

        /* =======================
   Small Screen Adjustments
   ======================= */
        @media (max-width: 640px) {

            /* Hide username text */
            header.header .flex.items-center span {
                display: none;
            }

            /* Shrink icons slightly */
            header.header .flex.items-center img {
                width: 24px;
                height: 24px;
            }

            /* Make input field smaller */
            header.header input[type="text"] {
                max-width: 220px;
            }
        }

        /* =======================
   Extra Small Screens (≤ 400px, down to 320px)
   ======================= */
        @media (max-width: 400px) {
            header.header {
                flex-wrap: wrap;
                /* allow wrapping when needed */
                gap: 0.25rem;
            }

            /* Search takes full width */
            header.header .relative {
                order: 3;
                width: 100%;
                margin-top: 0.5rem;
            }

            /* Shrink or stack icons nicely */
            header.header>.flex.items-center.space-x-4 {
                gap: 0.25rem;
            }

            header.header input[type="text"] {
                max-width: 100%;
            }
        }

        /* =====================
   SIDEBAR BASE STYLES
   ===================== */
        aside#sidebar {
            background-color: #171717;
            /* Theme dark color */
            height: 100vh;
            overflow-y: auto;
            overflow-x: hidden;
            width: 260px;
            flex-shrink: 0;
            margin: 0;
            padding: 10;
            transition: transform 0.3s ease-in-out;
        }

        /* Custom scrollbar */
        aside#sidebar::-webkit-scrollbar {
            width: 8px;
        }

        aside#sidebar::-webkit-scrollbar-track {
            background: #1c1c1c;
        }

        aside#sidebar::-webkit-scrollbar-thumb {
            background: #333;
            border-radius: 4px;
        }

        /* =====================
   DESKTOP VIEW
   ===================== */
        @media (min-width: 1024px) {
            aside#sidebar {
                position: sticky;
                top: 0;
                transform: none;
                /* Always visible */
            }

            #overlay {
                display: none !important;
                /* No overlay on desktop */
            }
        }

        /* =====================
   MOBILE VIEW
   ===================== */
        @media (max-width: 1023px) {
            aside#sidebar {
                position: fixed;
                top: 0;
                left: 0;
                height: 100%;
                width: 100%;
                /* full width on mobile */
                max-width: 320px;
                /* optional: limit for tablets */
                transform: translateX(-100%);
                z-index: 50;
                transition: transform 0.3s ease-in-out;
            }

            aside#sidebar.active {
                transform: translateX(0);
            }

            #overlay.active {
                display: block !important;
            }
        }

        /* =====================
   GENERAL RESET
   ===================== */
        body,
        html {
            margin: 0;
            padding: 0;
        }

        main {
            flex-grow: 1;
            background-color: #121212;
            min-height: 100vh;
            margin: 0;
            padding: 0;
        }
    </style>

</head>

<body>
    @include('layouts.loader')
    <div class="flex min-h-screen light-bg-white">

        @include('layouts.sidebar')

        <div id="overlay" class="sidebar-overlay fixed inset-0 bg-black bg-opacity-50 hidden z-40"></div>

        <!-- Main Content Area -->
        <main class="flex-1  overflow-y-auto">
            <!-- Header -->
            {{-- <header
                class="flex items-center justify-between light-bg-f5f5f5 light-bg-seo p-5 rounded-xl shadow-sm mb-6 header">
                <button class="hamburger-menu lg:hidden " id="hamburgerClose" aria-label="Toggle navigation">
                    <svg class="hamburger-icon" viewBox="0 0 24 24" width="24" height="24">
                        <path d="M3 12h18" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                        <path d="M3 6h18" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                        <path d="M3 18h18" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                    </svg>
                </button>
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
            </header> --}}

            @include('layouts.header')

            <div class="p-6 light-bg-bill -mt-5 lg:p-8">

                <!-- Projects Title -->
                <div class="flex items-center gap-2 justify-between mb-6">
                    <!-- Title -->
                    <h1 class="text-md sm:text-3xl md:text-2xl lg:text-3xl font-bold text-gray-800 dark:text-gray-200">
                        Marketplace
                    </h1>

                    <!-- Buttons (on right) -->
                    <!-- Buttons (on right) -->
                    <div class="flex  justify-end gap-3 sm:gap-4 ml-auto w-full sm:w-4/6 md:w-3/6 lg:w-3/6">

                        <!-- Add New Category -->
                        <button
                            class="w-full sm:w-1/2 md:w-2/5 lg:w-2/4 px-3 sm:px-5 py-2.5 sm:py-3 open-category-modal text-gray-400 border border-gray-500 rounded-md text-xs sm:text-sm md:text-base bg-[#171717] hover:bg-[#1f1f1f] transition">
                            Add New Category
                        </button>

                        <!-- Add New Subscription -->
                        <button
                            class="w-full sm:w-1/2 md:w-2/5 lg:w-1/2 px-3 sm:px-5 py-2.5 sm:py-3 open-subscription-modal text-orange-500 border border-gray-500 bg-[#171717] rounded-md text-xs sm:text-sm md:text-base hover:bg-[#1f1f1f] transition">
                            Add New Subscription
                        </button>

                    </div>

                </div>


            <!-- Tabs -->
            <div class="hidden md:flex border-b py-3 px-6 gap-2 light-border-gray-200 dark:border-gray-700 mb-10">
                @foreach($mainCategories as $index => $category)
                    <div class="flex items-center {{ $index == 0 ? 'active' : '' }} px-2 py-1 justify-center border border-gray-200 rounded-lg hover:rounded-md light-hover-bg-gray-300 tab-wrapper">
                        <img class="w-4 h-4 mr-2" src="{{ asset($category->category_icon ?? 'default-icon.svg') }}" alt="">
                        <button class="tab-btn p-1" data-tab="tab-{{ $category->id }}">{{ $category->category_name }}</button>
                    </div>
                @endforeach
            </div>

            {{-- @php
                $activeTab = request()->get('tab') ?? 'tab-' . $mainCategories->first()->id;
            @endphp --}}

            @php
                // $currentCategoryId = $currentCategoryId ?? $mainCategories->first()->id;
                 $currentCategoryId = $currentCategoryId ?? ($mainCategories->first()->id ?? null);
            @endphp

            <!-- Tab Contents -->
            @if($mainCategories->isNotEmpty())
            <div class="tab-contents">
                @foreach($mainCategories as $index => $category)
                    {{-- <div id="tab-{{ $category->id }}" class="tab-content {{ $activeTab == 'tab-' . $category->id ? '' : 'hidden' }} pl-6 pr-6"> --}}
                    <div id="tab-{{ $category->id }}" class="tab-content {{ $category->id == $currentCategoryId ? '' : 'hidden' }} }} pl-6 pr-6">
                        <div>
                            <h3 class="pb-3 font-semibold text-md light-text-black">{{ $category->name }}</h3>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($subscriptions[$category->id] as $subscription)
                                <div id="subscription-card-{{ $subscription->id }}"class="light-bg-f5f5f5 light-bg-seo p-6 rounded-xl shadow-sm flex flex-col relative overflow-hidden mb-8 subscription-card">
                                    <div class="flex items-center mb-10 justify-between">
                                        <h3 class="subscription_tag openModal cursor-pointer text-md font-normal text-black w-32 p-3 rounded-full text-center light-bg-d7d7d7 light-text-black" data-sub-detail-id="{{$subscription->id}}">
                                            {{ $subscription->subscription_tag }}
                                        </h3>
                                        <div class="w-16 flex justify-end">
                                            <label class="toggle-switch">
                                                <input type="checkbox" disabled class="toggle-input" {{ $subscription->sub_category ? 'checked' : '' }}>
                                                <span class="toggle-slider"></span>
                                            </label>
                                        </div>
                                    </div>

                                    <p class=" text-5xl font-medium light-text-black mb-2 flex items-center">
                                
                                        $<span class="price text-5xl font-medium">{{ number_format($subscription->price, 0) }}</span>

                                        <span class="light-text-black ml-1 text-sm font-light" style="color:#AFAFAF;">/month</span>
                                    </p>

                                    <p class="subscription_name light-text-black text-sm font-bold mb-2" style="font-size: 12px; font-weight: 600;">{{ $subscription->subscription_name }}</p>
                                    <p class="tagline text-xs text-gray-400 font-medium mb-6">{{ $subscription->tagline }}</p>

                                    <div class="flex items-center justify-between border-t dark-border-gray-500 pt-5">
                                        <div class="w-1/2 pr-2">

                                            <button data-sub-id="{{$subscription->id}}" class="w-full bg-[#E600020D] border border-orange-800 px-5 py-1 text-white rounded-md text-md delete-sub">Delete</button>
                                            
                                        </div>
                                        <div  class="w-1/2 pl-2">
                                            <button class="openEditSubscriptionModal w-full px-5 py-1 light-text-black light-bg-d7d7d7 border border-gray-200 dark:border-gray-500 bg-transparent rounded-md text-md edit-sub" data-edit-id="{{$subscription->id}}">Edit</button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
            @endif
            </div>
        </main>
        
    </div>


    <!-- Modal Background -->

    <div id="modal" class="hidden modal fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50 overflow-y-auto max-h-screen">
        <div class="light-bg-seo text-white rounded-lg w-[90%] md:w-[850px] relative p-6 md:flex max-h-[90vh] overflow-y-auto">
            
            <!-- Left Section -->
            <div class="md:w-[40%] pr-6 border-r border-gray-700 mb-6 md:mb-0">
                <span id="subscription_tag" class="bg-gray-700 text-sm px-3 py-1 rounded-full">Starter SEO</span>
                <h2 id="subscription_price" class="text-3xl md:text-5xl font-medium mt-4">$19 <span class="text-xl font-normal">/ month</span></h2>
                
                <h3 class="font-semibold mt-6" id="subscription_name">Foundation & Fixes</h3>
                <p class="text-gray-400 text-sm mt-2" id="subscription_tagline">All the basic features to boost your freelance career</p>
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
            <button id="closeModal" class="absolute top-4 right-4 text-gray-400 hover:text-white text-xl rounded-full hover:bg-gray-500 px-2">&times;</button>
        </div>
    </div>


    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const body = document.body;

            /* -------------------------------
               ELEMENTS
            --------------------------------*/
            const knowledgeButton = document.getElementById("knowledgeButton");
            const filterButtons = document.querySelectorAll('[id^="filterButton"]');
            const filterDropdowns = document.querySelectorAll('[id^="filterDropdown"]');
            const filterDropdown = document.getElementById("filterDropdown");
            const hamburgerOpen = document.getElementById("hamburgerOpen");
            const hamburgerClose = document.getElementById("hamburgerClose");
            const sidebar = document.getElementById("sidebar");
            const overlay = document.getElementById("overlay");
            const seoCards = document.getElementById('seo-cards');


            // Open sidebar
            /* -------------------------------
             SIDEBAR TOGGLE
          --------------------------------*/
            const hamburgerButtons = document.querySelectorAll("#hamburgerOpen, #hamburgerClose");

            if (sidebar && overlay) {

                function openSidebar() {
                    sidebar.classList.add("active");
                    overlay.classList.add("active");
                    body.classList.add("overflow-hidden", "sidebar-open");
                }

                function closeSidebar() {
                    sidebar.classList.remove("active");
                    overlay.classList.remove("active");
                    body.classList.remove("overflow-hidden", "sidebar-open");
                }

                function toggleSidebar() {
                    if (sidebar.classList.contains("active")) {
                        closeSidebar();
                    } else {
                        openSidebar();
                    }
                }

                // Attach toggle to all hamburger buttons
                hamburgerButtons.forEach(btn => {
                    btn.addEventListener("click", (e) => {
                        e.preventDefault();
                        e.stopPropagation();
                        toggleSidebar();
                    });
                });

                // Clicking overlay closes sidebar
                overlay.addEventListener("click", closeSidebar);

                // Pressing ESC closes sidebar
                window.addEventListener("keydown", (e) => {
                    if (e.key === "Escape" && sidebar.classList.contains("active")) {
                        closeSidebar();
                    }
                });
            }

            /* -------------------------------
               FILTER DROPDOWNS
            --------------------------------*/
            if (filterButtons && filterDropdowns) {
                filterButtons.forEach((button, index) => {
                    button.addEventListener("click", (e) => {
                        e.stopPropagation();
                        const dd = filterDropdowns[index];
                        if (dd) dd.classList.toggle("hidden");
                    });
                });

                // Clicking outside closes all
                document.addEventListener("click", () => {
                    filterDropdowns.forEach((dropdown) => dropdown.classList.add("hidden"));
                });
            }

            /* -------------------------------
               DARK MODE & IMAGE UPDATES
            --------------------------------*/
            const updateDropdownColors = () => {
                const isDarkMode = body.classList.contains("dark-mode");
                if (filterDropdown) {
                    filterDropdown.style.color = isDarkMode ? "white" : "black";
                    filterDropdown.style.backgroundColor = isDarkMode ? "#1a1a1a" : "white";
                }
            };

            const updateImageSources = (isDarkMode) => {
                const icons = document.querySelectorAll(".light-mode-icon");
                icons.forEach((icon) => {
                    const darkSrc = icon.dataset.darkSrc;
                    const originalSrc = icon.dataset.lightSrc || icon.src.replace("-DARK.svg", ".svg");
                    if (darkSrc) icon.src = isDarkMode ? darkSrc : originalSrc;
                });

                const images = document.querySelectorAll(".light-mode-img");
                images.forEach((img) => {
                    const darkSrc = img.dataset.darkSrc;
                    const originalSrc = img.dataset.lightSrc || img.src.replace("-DARK.png", ".png");
                    if (darkSrc) img.src = isDarkMode ? darkSrc : originalSrc;
                });

                const logo = document.querySelector(".light-mode-logo");
                if (logo) {
                    const darkLogoSrc = logo.dataset.darkSrc;
                    const lightLogoSrc = logo.dataset.lightSrc || "Frame 2147224409.png";
                    logo.src = isDarkMode ? darkLogoSrc : lightLogoSrc;
                }
            };

            const toggleDarkMode = () => {
                body.classList.toggle("dark-mode");
                const isDark = body.classList.contains("dark-mode");
                updateImageSources(isDark);
                updateDropdownColors();
                localStorage.setItem("theme", isDark ? "dark" : "light");
            };

            // Apply saved theme (do this early so images update before paint)
            if (localStorage.getItem("theme") === "dark") {
                body.classList.add("dark-mode");
            } else if (localStorage.getItem("theme") === "light") {
                body.classList.remove("dark-mode");
            }
            updateImageSources(body.classList.contains("dark-mode"));
            updateDropdownColors();

            // Knowledge button toggles theme
            if (knowledgeButton) {
                knowledgeButton.addEventListener("click", (e) => {
                    e.preventDefault();
                    toggleDarkMode();
                });
            }

            /* -------------------------------
               SEO CARD "VIEW MORE" TOGGLE
            --------------------------------*/
            if (seoCards) {
                seoCards.addEventListener('click', function(event) {
                    if (event.target.classList.contains('toggle-btn')) {
                        const card = event.target.closest('div[class*="p-10"]');
                        if (!card) return;
                        const content = card.querySelector('.card-content');
                        const textNode = event.target.childNodes[0];

                        if (!content.style.maxHeight || content.style.maxHeight === '0px') {
                            content.style.maxHeight = content.scrollHeight + 'px';
                            if (textNode) textNode.textContent = 'View Less ';
                        } else {
                            content.style.maxHeight = '0px';
                            if (textNode) textNode.textContent = 'View More ';
                        }
                    }
                });
            }

            /* -------------------------------
               CATEGORY & SUBSCRIPTION MODALS
            --------------------------------*/
            const categoryModal = document.getElementById("categoryModal");
            const openCategoryBtn = document.querySelector(".open-category-modal");
            const closeCategoryBtn = document.getElementById("closeCategoryModal");
            const subscriptionModal = document.getElementById("subscriptionModal");
            const openSubscriptionBtn = document.querySelector(".open-subscription-modal");
            const closeSubscriptionBtn = document.getElementById("closeSubscriptionModal");
            const addFeatureBtn = document.getElementById("addFeatureBtn");
            const featuresList = document.getElementById("featuresList");

            if (openCategoryBtn && categoryModal) {
                openCategoryBtn.addEventListener("click", () => categoryModal.classList.remove("hidden"));
            }
            if (closeCategoryBtn && categoryModal) {
                closeCategoryBtn.addEventListener("click", () => categoryModal.classList.add("hidden"));
            }
            if (categoryModal) {
                categoryModal.addEventListener("click", (e) => {
                    if (e.target === categoryModal) categoryModal.classList.add("hidden");
                });
            }

            if (openSubscriptionBtn && subscriptionModal) {
                openSubscriptionBtn.addEventListener("click", () => subscriptionModal.classList.remove("hidden"));
            }
            if (closeSubscriptionBtn && subscriptionModal) {
                closeSubscriptionBtn.addEventListener("click", () => subscriptionModal.classList.add("hidden"));
            }
            if (subscriptionModal) {
                subscriptionModal.addEventListener("click", (e) => {
                    if (e.target === subscriptionModal) subscriptionModal.classList.add("hidden");
                });
            }

            if (addFeatureBtn && featuresList) {
                addFeatureBtn.addEventListener("click", () => {
                    const input = document.createElement("input");
                    input.type = "text";
                    input.name = "features[]";
                    input.placeholder = "Feature " + (featuresList.children.length + 1);
                    input.className =
                        "w-full px-4 py-2 bg-[#2A2A2A] border border-gray-600 rounded text-sm text-gray-300";
                    featuresList.appendChild(input);
                });
            }

            // Open Edit Subscription Modal
            document.querySelectorAll('.openEditSubscriptionModal').forEach(btn => {
                btn.addEventListener('click', (e) => {
                    e.stopPropagation(); // Prevent the click from bubbling to parent modal
                    e.preventDefault(); // Prevent default behavior if button is a link

                    // Close all other modals except this one
                    document.querySelectorAll('.modal').forEach(modal => {
                        if (!modal.classList.contains('edit-subscription-modal')) {
                            modal.classList.add('hidden');
                        }
                    });

                    // Open this modal
                    document.querySelector('.edit-subscription-modal').classList.remove('hidden');
                });
            });

            // Close modal (X or Cancel buttons)
            document.querySelectorAll('.edit-subscription-modal .closeModal, .edit-subscription-modal .cancelModal')
                .forEach(btn => {
                    btn.addEventListener('click', (e) => {
                        e.stopPropagation();
                        btn.closest('.edit-subscription-modal').classList.add('hidden');
                    });
                });

            // Click outside modal content to close
            document.querySelectorAll('.edit-subscription-modal').forEach(modal => {
                modal.addEventListener('click', (e) => {
                    if (e.target === modal) modal.classList.add('hidden');
                });
            });




            /* -------------------------------
               GENERIC MODAL (for .openModal cards)
            --------------------------------*/
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


            const subToggle = document.getElementById("toggleSubCategory");
            const mainCategoryField = document.getElementById("mainCategoryField");
            const iconUploadField = document.getElementById("iconUploadField");

            // Initial state: toggle OFF
            mainCategoryField.classList.add("hidden"); // hidden
            iconUploadField.classList.remove("hidden"); // visible

            subToggle.addEventListener("change", () => {
                if (subToggle.checked) {
                    // Toggle ON: show main category, hide icon upload
                    mainCategoryField.classList.remove("hidden");
                    iconUploadField.classList.add("hidden");
                } else {
                    // Toggle OFF: hide main category, show icon upload
                    mainCategoryField.classList.add("hidden");
                    iconUploadField.classList.remove("hidden");
                }
            });


            /* -------------------------------
               TAB SYSTEM
            --------------------------------*/
            const tabButtons = document.querySelectorAll(".tab-btn");
            const tabContents = document.querySelectorAll(".tab-content");
            const tabWrappers = document.querySelectorAll(".tab-wrapper");

            function activateTab(tabId) {
                tabContents.forEach((content) => content.classList.add("hidden"));
                tabWrappers.forEach((wrapper) =>
                    wrapper.classList.remove("active", "bg-gray-500", "rounded-full", "light-hover-bg-gray-300")
                );
                tabButtons.forEach((button) => {
                    button.classList.remove("text-black", "dark:text-white");
                    button.classList.add("light-text-gray-500", "dark:text-gray-400");
                });

                const selectedTab = document.querySelector(`.tab-btn[data-tab="${tabId}"]`);
                if (selectedTab) {
                    const wrapper = selectedTab.closest(".tab-wrapper");
                    const content = document.getElementById(`${tabId}Content`);

                    if (wrapper) wrapper.classList.add("active", "bg-gray-500", "rounded-full");
                    selectedTab.classList.remove("light-text-gray-500", "dark:text-gray-400");
                    selectedTab.classList.add("text-black", "dark:text-white");
                    if (content) content.classList.remove("hidden");
                }
            }

            tabButtons.forEach((button) => {
                button.addEventListener("click", function() {
                    const tabId = this.getAttribute("data-tab");
                    activateTab(tabId);
                });
            });

            const activeTabs = document.querySelectorAll(".tab-wrapper.active");
            if (activeTabs.length === 0 && tabButtons.length > 0) {
                activateTab(tabButtons[0].getAttribute("data-tab"));
            }

        }); // end DOMContentLoaded
    </script>


    <div id="categoryModal"
        class="fixed modal inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-[#1C1C1C] text-white w-full max-w-md p-6 rounded-lg shadow-lg">
            <!-- Header -->
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-semibold">Add new Category</h2>
                <button id="closeCategoryModal" class="text-gray-400 hover:text-white">&times;</button>
            </div>

            <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="flex items-center justify-between mb-4">
                    <label class="text-sm">Create as a sub-category</label>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="hidden" name="is_sub" value="0">
                        <input type="checkbox" id="toggleSubCategory" name="is_sub" value="1" class="sr-only peer">
                        <div
                            class="w-11 h-6 bg-gray-700 peer-focus:outline-none rounded-full peer peer-checked:bg-orange-500">
                        </div>
                        <div
                            class="absolute left-1 top-1 w-4 h-4 bg-white rounded-full transition-all peer-checked:translate-x-full">
                        </div>
                    </label>
                </div>

                <!-- Main Category (Shown when toggle ON) -->
                <div id="mainCategoryField" class="mb-4 hidden">
                    <label class="block text-sm mb-1">Main Category</label>
                    <select name="parent_id" class="w-full px-4 py-2 bg-[#2A2A2A] border border-gray-600 rounded text-sm text-gray-300">
                        <option value="" selected hidden>Select Main Category</option>
                        @foreach ($mainCategories as $category)
                            <option value="{{$category->id}}">{{$category->category_name}}</option>
                        @endforeach
                    </select>
                </div>

                <div id="nameField" class="mb-4">
                    <label class="block text-sm mb-1">Name</label>
                    <input type="text" name="category_name"
                        class="w-full px-4 py-2 bg-[#2A2A2A] border border-gray-600 rounded text-sm text-gray-300"
                        placeholder="Category Name" value="{{old('category_name')}}" />
                </div>

                <!-- Upload Icon (Shown when toggle OFF) -->
                <div id="iconUploadField" class="mb-6">
                    <label class="block text-sm mb-1">Add icon</label>
                    <input type="file" name="category_icon"
                        class="w-full px-4 py-2 bg-transparent border border-gray-600 rounded text-sm text-gray-300
                    file:bg-transparent file:border-0 file:text-gray-300 file:text-sm file:mr-3" />
                </div>


                <!-- Footer Buttons -->
                <div class="flex justify-end gap-2">
                    <button type="button" class="bg-[#2A2A2A] text-gray-300 px-4 py-2 rounded-md">Cancel</button>
                    <button type="submit" class="bg-orange-500 text-white px-4 py-2 rounded-md">Save</button>
                </div>
            </form>

        </div>
    </div>


    <div id="subscriptionModal"
        class="fixed modal inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-[#1C1C1C] text-white w-full max-w-3xl p-6 rounded-lg shadow-lg overflow-y-auto max-h-[90vh]">

            <!-- Header -->
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-lg font-semibold">Add new Subscription</h2>
                <button id="closeSubscriptionModal" class="text-gray-400 hover:text-white text-2xl">&times;</button>
            </div>

            <!-- Form Grid -->
            <form action="{{route('subscription.store')}}" method="POST">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="text-sm block mb-1">Subscription Tag</label>
                        <input type="text" placeholder="Basic plan" name="subscription_tag" value="{{old('subscription_tag')}}"
                            class="w-full px-4 py-2 light-bg-d7d7d7 border border-gray-600 rounded text-sm text-gray-300">
                    </div>
                    <div>
                        <label class="text-sm block mb-1">Price</label>
                        <input type="text" placeholder="Enter Price" name="price" value="{{old('price')}}"
                            class="w-full px-4 py-2 light-bg-d7d7d7 border border-gray-600 rounded text-sm text-gray-300">
                    </div>
                    <div>
                        <label class="text-sm block mb-1">Name</label>
                        <input type="text" placeholder="Figma Designing" value="{{old('subscription_name')}}" name="subscription_name"
                            class="w-full px-4 py-2 light-bg-d7d7d7 border border-gray-600 rounded text-sm text-gray-300">
                    </div>
                    <div>
                        <label class="text-sm block mb-1">Tagline</label>
                        <input type="text" placeholder="Write tagline" value="{{old('tagline')}}" name="tagline"
                            class="w-full px-4 py-2 light-bg-d7d7d7 border border-gray-600 rounded text-sm text-gray-300">
                    </div>
                </div>

                <!-- Best For -->
                <div class="mb-4">
                    <label class="text-sm block mb-1">Best For</label>
                    <input type="text" placeholder="Wizspeed Tech Ltd" value="{{old('best_for')}}" name="best_for"
                        class="w-full px-4 py-2 light-bg-d7d7d7 border border-gray-600 rounded text-sm text-gray-300">
                </div>

                <!-- What's Included -->
                <div class="mb-4">
                    <label class="text-sm block mb-2">What's Included</label>
                    <div id="featuresList" class="space-y-2">
                        <input type="text" name="features[]" placeholder="Feature 1"
                            class="w-full px-4 py-2 light-bg-d7d7d7 border border-gray-600 rounded text-sm text-gray-300">
                        <input type="text" name="features[]" placeholder="Feature 2"
                            class="w-full px-4 py-2 light-bg-d7d7d7 border border-gray-600 rounded text-sm text-gray-300">
                    </div>
                    <button type="button" id="addFeatureBtn" class="mt-3 light-bg-d7d7d7 text-gray-300 px-4 py-2 rounded-md text-sm">
                        Add Feature
                    </button>
                </div>

                <!-- Select Category + Sub Category (NEW) -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                    <div>
                        <label class="text-sm block mb-1">Select Category</label>
                        <select name="main_category" class="w-full px-4 py-2 bg-[#2A2A2A] border border-gray-600 rounded text-sm text-gray-300">
                            <option value="" selected hidden>Select Category</option>
                            @foreach ($mainCategories as $maincategory)
                                <option value="{{$maincategory->id}}">{{$maincategory->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="text-sm block mb-1">Sub-Category</label>
                        <select name="sub_category" class="w-full px-4 py-2 bg-[#2A2A2A] border border-gray-600 rounded text-sm text-gray-300">
                            <option value="" selected hidden>Select Sub-Category</option>
                            @foreach ($subCategories as $subcategory)
                                <option value="{{$subcategory->id}}">{{$subcategory->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Footer -->
                <div class="flex justify-end gap-2 mt-6">
                    <button type="button" class="light-bg-d7d7d7 text-gray-300 px-4 py-2 rounded-md">Cancel</button>
                    <button type="submit" class="bg-orange-500 text-white px-4 py-2 rounded-md">Save</button>
                </div>
            </form>

        </div>
    </div>

    <div id=""
        class="edit-subscription-modal fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-[#1C1C1C] text-white w-full max-w-3xl p-6 rounded-lg shadow-lg overflow-y-auto max-h-[90vh]">

            <!-- Header -->
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-lg font-semibold">Edit Subscription</h2>
                <button id="" class=" closeModal text-gray-400 hover:text-white text-2xl">&times;</button>
            </div>

            <!-- Form Grid -->
            <form action="{{ route('subscription.update') }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <input type="hidden" name="id" id="edit_sub_id">
                    <div>
                        <label class="text-sm block mb-1">Subscription Tag</label>
                        <input type="text" placeholder="Enter subscription tag" name="subscription_tag" id="edit_subscription_tag"
                            class="w-full px-4 py-2 light-bg-d7d7d7 border border-gray-600 rounded text-sm text-gray-300">
                    </div>
                    <div>
                        <label class="text-sm block mb-1">Price</label>
                        <input type="text" placeholder="Enter price" name="price" id="edit_price"
                            class="w-full px-4 py-2 light-bg-d7d7d7 border border-gray-600 rounded text-sm text-gray-300">
                    </div>
                    <div>
                        <label class="text-sm block mb-1">Name</label>
                        <input type="text" placeholder="Enter subscription name" name="subscription_name" id="edit_subscription_name"
                            class="w-full px-4 py-2 light-bg-d7d7d7 border border-gray-600 rounded text-sm text-gray-300">
                    </div>
                    <div>
                        <label class="text-sm block mb-1">Tagline</label>
                        <input type="text" placeholder="Enter tagline" name="tagline" id="edit_tagline"
                            class="w-full px-4 py-2 light-bg-d7d7d7 border border-gray-600 rounded text-sm text-gray-300">
                    </div>
                </div>

                <!-- Best For -->
                <div class="mb-4">
                    <label class="text-sm block mb-1">Best For</label>
                    <input type="text" placeholder="Who is this subscription best for?" name="best_for" id="edit_best_for"
                        class="w-full px-4 py-2 light-bg-d7d7d7 border border-gray-600 rounded text-sm text-gray-300">
                </div>

                <!-- What's Included -->
                <div class="mb-4">
                    <label class="text-sm block mb-2">What's Included</label>
                    <div class="space-y-2" id="edit_feature_list">
                        <!-- Features will be dynamically inserted via JS -->
                    </div>
                </div>

                <!-- Select Category + Sub-Category -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                    <div>
                        <label class="text-sm block mb-1">Select Category</label>
                        <select class="w-full px-4 py-2 bg-[#2A2A2A] border border-gray-600 rounded text-sm text-gray-300" id="edit_main_category" name="main_category" >
                            <option value=""  selected hidden >Select Main Category</option>
                            @foreach ($mainCategories as $maincategory)
                                <option value="{{$maincategory->id}}">{{$maincategory->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="text-sm block mb-1">Sub-Category</label>
                        <select class="w-full px-4 py-2 bg-[#2A2A2A] border border-gray-600 rounded text-sm text-gray-300" id="edit_sub_category" name="sub_category" >
                            <option value=""  selected hidden >Select Sub Category</option>
                            @foreach ($subCategories as $subcategory)
                                <option value="{{$subcategory->id}}">{{$subcategory->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Footer -->
                <div class="flex justify-end gap-2 mt-6">
                    <button id="cancelEditSubscriptionModal"
                        class="light-bg-d7d7d7 text-gray-300 px-4 py-2 rounded-md">Cancel</button>
                    <button type="button" id="update-sub" class="bg-orange-500 text-white px-4 py-2 rounded-md">Update</button>
                </div>

            </form>

        </div>
    </div>



    @if ($errors->categoryError->any())
        <div style="z-index: 9999 !important;"
            class="success-message fixed top-5 right-5 bg-red-500 text-white px-4 py-2 rounded shadow-lg">
            <ul>
                @foreach ($errors->categoryError->all() as $error)
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
            document.addEventListener("DOMContentLoaded", function () {
                const categoryModal = document.getElementById("categoryModal");
                if(categoryModal){
                   categoryModal.classList.remove("hidden");
                }
            });
        </script>
    @endif

    @if ($errors->subscriptionError->any())
        <div style="z-index: 9999 !important;"
            class="success-message fixed top-5 right-5 bg-red-500 text-white px-4 py-2 rounded shadow-lg">
            <ul>
                @foreach ($errors->subscriptionError->all() as $error)
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
            document.addEventListener("DOMContentLoaded", function () {
                const subscriptionModal = document.getElementById("subscriptionModal");
                if(subscriptionModal){
                   subscriptionModal.classList.remove("hidden");
                }
            });
        </script>
    @endif

    @if (session('AddCategory'))
        <div style="z-index: 9999 !important;"
            class="success-message fixed top-5 right-5 bg-green-500 text-white px-4 py-2 rounded shadow-lg">
            {{ session('AddCategory') }}
        </div>

        <style>
            #page-loader {
                display: none !important;
            }
        </style>

    @endif
    
    @if (session('AddSubscription'))
        <div style="z-index: 9999 !important;"
            class="success-message fixed top-5 right-5 bg-green-500 text-white px-4 py-2 rounded shadow-lg">
            {{ session('AddSubscription') }}
        </div>

        <style>
            #page-loader {
                display: none !important;
            }
        </style>

    @endif


    <div id="delete-sub-msg" style="z-index: 9999 !important;"
        class=" fixed top-5 right-5 bg-red-500 text-white px-4 py-2 rounded shadow-lg hidden">
        Subscription deleted successfully.
    </div>

    <div id="update-sub-msg" style="z-index: 9999 !important;"
        class=" fixed top-5 right-5 bg-green-500 text-white px-4 py-2 rounded shadow-lg hidden">
        Subscription Updated successfully.
    </div>


    <script>
        setTimeout(function() {
            const messages = document.querySelectorAll('.success-message');
            messages.forEach(function(el) {
                el.style.display = 'none';
            });
        }, 5000);

        document.addEventListener('DOMContentLoaded', function () {
            const tabs = document.querySelectorAll('.tab-btn');
            const tabContents = document.querySelectorAll('.tab-content');

            tabs.forEach(tab => {
                tab.addEventListener('click', function () {
                    const target = this.getAttribute('data-tab');

                    // Remove active class from all tab wrappers
                    document.querySelectorAll('.tab-wrapper').forEach(wrapper => {
                        wrapper.classList.remove('active');
                    });

                    // Add active class to clicked tab
                    this.parentElement.classList.add('active');

                    // Hide all tab contents
                    tabContents.forEach(content => {
                        content.classList.add('hidden');
                    });

                    // Show the clicked tab content
                    const activeContent = document.getElementById(target);
                    if (activeContent) activeContent.classList.remove('hidden');
                });
            });
        });

    </script>

    {{-- ajax --}}

    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.delete-sub').click(function() {
                const subscription_id = $(this).data('sub-id');
                let card = $(this).closest('.subscription-card');
                $.ajax({
                    url: "{{ route('subscription.delete') }}",
                    method: 'POST',
                    data: {
                        id: subscription_id
                    },
                    success: function(response) {
                        $('#delete-sub-msg').show();
                            setTimeout(function() {
                             $('#delete-sub-msg').hide();   
                            }, 5000);
                        card.remove();
                    }
                });
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
                        $('#subscription_price').html(`$${formattedPrice} <span class="text-xl font-normal">/ month</span>`);
                        $('#subscription_name').text(data.subDetail.subscription_name);
                        $('#subscription_tagline').text(data.subDetail.tagline);

                        $('#best_for_list').html(`<li>${data.subDetail.best_for}</li>`);

                        let featuresHtml = '';
                        if(data.subDetail.features && data.subDetail.features.length > 0) {
                            data.subDetail.features.forEach(function(feature){
                                featuresHtml += `<li class="flex items-start">
                                    <span class="flex-shrink-0 flex items-center justify-center w-5 h-5 mr-2 mt-0.5">
                                        <img src="{{asset('assets/modal-check.svg')}}" class="w-full h-full" alt="✓">
                                    </span>
                                    <span>${feature.feature}.</span>
                                </li>`;
                            });
                        } else {
                            featuresHtml = `<li>No features available</li>`;
                        }
                        $('#features_list').html(featuresHtml);

                        // Show modal
                        // $('#modal').removeClass('hidden');
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

            $('.edit-sub').click(function() {
                const subscription_id = $(this).data('edit-id');
                $.ajax({
                    url: "{{ route('subscription.edit') }}",
                    method: 'POST',
                    data: {
                        id: subscription_id
                    },
                    success: function(response) {

                        console.log(response);

                        const data = response.subedit;

                        $('#edit_sub_id').val(data.id);
                        $('#edit_subscription_tag').val(data.subscription_tag);
                        $('#edit_price').val(parseInt(data.price));
                        $('#edit_subscription_name').val(data.subscription_name);
                        $('#edit_tagline').val(data.tagline);
                        $('#edit_best_for').val(data.best_for);

                        $('#edit_main_category').val(data.main_category.id);
                        if (data.sub_category) {
                            $('#edit_sub_category').val(data.sub_category.id);
                        } else {
                            $('#edit_sub_category').val(''); 
                        }


                        let featuresHtml = '';
                        if(data.features && data.features.length > 0) {
                            data.features.forEach(function(feature, index){
                                featuresHtml += `
                                    <div class="flex items-center gap-2">
                                        <input type="text" name="features[]" value="${feature.feature}" 
                                            class="feature-input w-full px-4 py-2 light-bg-d7d7d7 border border-gray-600 rounded text-sm text-gray-300">
                                    </div>
                                `;
                            });
                        } else {
                            featuresHtml = `<p>No features available</p>`;
                        }
                        $('#edit_feature_list').html(featuresHtml);
                    }
                });
            });

            $('#update-sub').on('click', function(e) {
                e.preventDefault();

                let id = $('#edit_sub_id').val();

                let data = {
                    id: id,
                    subscription_tag: $('#edit_subscription_tag').val(),
                    price: $('#edit_price').val(),
                    subscription_name: $('#edit_subscription_name').val(),
                    tagline: $('#edit_tagline').val(),
                    best_for: $('#edit_best_for').val(),
                    features: [],
                    main_category: $('#edit_main_category').val(),
                    sub_category: $('#edit_sub_category').val()
                };

                $('#edit_feature_list .feature-input').each(function() {
                    data.features.push($(this).val());
                });

                $.ajaxSetup({
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
                });

                $.ajax({
                    url: "{{ route('subscription.update') }}",
                    type: 'POST',
                    data: data,
                    success: function(response) {
                        $('#update-sub-msg').show();
                            setTimeout(function() {
                             $('#update-sub-msg').hide();   
                            }, 5000);
                        let sub = response.subscription;
                        let card = $("#subscription-card-" + sub.id);

                        card.find(".subscription_name").text(sub.subscription_name);
                        card.find(".subscription_tag").text(sub.subscription_tag);
                        card.find(".price").text(sub.price);
                        card.find(".tagline").text(sub.tagline);
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });
            });
      
        });
    </script>


</body>

</html>

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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">

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


        #backToLeft span:not(:first-child) {
            margin: 0 3px;
            /* Adjust the pixel value as needed */
        }

        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
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

        .password-requirements-title {
            margin-bottom: 10px;
        }

        .password-requirements-list {
            margin-top: 0;
            padding-left: 20px;
            line-height: 1.5;
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

        .dark-mode .light-text-ff0000 {
            color: #EA5455 !important;
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

        .dataTables_length {
            display: none;
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

        .dark-mode .light-text-gray-600 {
            color: #AFAFAF !important;
            /* gray-600 */
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

        .btn-orange {
            background-color: #FC5E14 !important;
            /* Orange hover */
        }

        .btn-orange:hover {
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
        }

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
    </style>

</head>

<body>
    <script>
        setTimeout(function() {
            const messages = document.querySelectorAll('.success-message');
            messages.forEach(function(el) {
                el.style.display = 'none';
            });
        }, 5000);
    </script>
    @include('layouts.loader')

    @if (session('status') === 'password-updated')
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 1000)" x-show="show" x-transition
        class="success-message fixed top-5 right-5 bg-green-500 text-white px-4 py-2 rounded shadow-lg z-50">
        Password updated successfully!
    </div>
    <style>
        #page-loader {
            display: none !important;
        }
    </style>
    @elseif (session('status') === 'verification-link-sent')
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 1000)" x-show="show" x-transition
        class="success-message fixed top-5 right-5 bg-green-500 text-white px-4 py-2 rounded shadow-lg z-50">
        Verification link sent to your email!
    </div>
    <style>
        #page-loader {
            display: none !important;
        }
    </style>
    @elseif (session('status') === 'profile-updated')
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 1000)" x-show="show" x-transition
        class="success-message fixed top-5 right-5 bg-green-500 text-white px-4 py-2 rounded shadow-lg z-50">
        Profile Updated!
    </div>
    <style>
        #page-loader {
            display: none !important;
        }
    </style>
    @elseif (session('status') === 'device-deleted')
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 1000)" x-show="show" x-transition
        class="success-message fixed top-5 right-5 bg-red-500 text-white px-4 py-2 rounded shadow-lg z-50">
        Device Deleted!
    </div>
    <style>
        #page-loader {
            display: none !important;
        }
    </style>
    @elseif(session('status') === 'role-added')
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 1000)" x-show="show" x-transition
        class="success-message fixed top-5 right-5 bg-green-500 text-white px-4 py-2 rounded shadow-lg z-50">
        Role added successfully!
    </div>
    <style>
        #page-loader {
            display: none !important;
        }
    </style>
    @endif
    @if ($errors->any())
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 1000)" x-show="show" x-transition
        class="success-message fixed top-5 right-5 bg-red-500 text-white px-4 py-2 rounded shadow-lg z-50">
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

    <div class="flex min-h-screen light-bg-white">
        <!-- Sidebar -->
        {{-- <aside
            class="fixed top-0 left-0 h-screen w-full md:w-64 light-bg-f5f5f5 light-bg-seo p-10 z-50 
              transition-transform duration-300 transform -translate-x-full 
              overflow-y-auto
              md:transform-none md:h-screen md:translate-x-0"
            id="sidebar">

            <!-- Logo -->
            <div class="mb-8 pl-4">
                <img src="Frame 2147224409.png" alt="WIZSPEED Logo" class="h-14 light-mode-logo"
                    data-dark-src="wizspeed-white2-2-1 1.png">
            </div>

            <!-- Navigation -->
            <nav class="flex-grow">
                <ul>

                    <li class="mb-2">
                        <a href="index.html"
                            class="flex items-center p-3 rounded-lg light-text-gray-700 light-hover-bg-gray-200 transition-colors">
                            <img src="home.svg" alt="icon" class="w-8 h-6 light-mode-icon"
                                data-dark-src="home-DARK.svg">
                            Dashboard
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="clients.html"
                            class="flex items-center p-3 rounded-lg light-text-gray-700 light-hover-bg-gray-200 transition-colors">
                            <img src="uni-01.svg" alt="icon" class="w-8 h-6 light-mode-icon"
                                data-dark-src="uni-01-DARK.svg">
                            Clients
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="projects.html"
                            class="flex items-center p-3 rounded-lg light-text-gray-700 light-hover-bg-gray-200 transition-colors">
                            <img src="task-square.svg" alt="icon" class="w-8 h-6 light-mode-icon"
                                data-dark-src="task-square-DARK.svg">
                            Projects
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="analytics.html"
                            class="flex items-center p-3 rounded-lg light-text-gray-700 light-hover-bg-gray-200 transition-colors">
                            <img src="chart-bar.svg" alt="icon" class="w-8 h-6 light-mode-icon"
                                data-dark-src="chart-bar-DARK.svg">
                            Analytics
                        </a>
                    </li>


                    <li class="mb-2">
                        <a href="tickets.html"
                            class="flex items-center p-3 rounded-lg light-text-gray-700 light-hover-bg-gray-200 transition-colors">
                            <img src="ticket-svgrepo-com.svg" alt="icon" class="w-8 h-6 light-mode-icon"
                                data-dark-src="ticket-svgrepo-com-DARK.svg">
                            Tickets
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="task-management.html"
                            class="flex whitespace-nowrap items-center p-3 rounded-lg light-text-gray-700 light-hover-bg-gray-200 transition-colors">
                            <img src="book.svg" alt="icon" class="w-8 h-6 light-mode-icon"
                                data-dark-src="archive-book-DARK.svg">
                            Task Management
                        </a>
                    </li>
                    <li class="mb-2 pl-2">
                        <a href="Leads.html"
                            class="flex items-center p-3 rounded-lg light-text-gray-700 light-hover-bg-gray-200 transition-colors">
                            <img src="20.svg" alt="icon" class="w-5 h-6 light-mode-icon"
                                data-dark-src="20-DARK.svg">
                            <span class="p-1">Leads</span>
                        </a>
                    </li>

                    <li class="mb-2">
                        <a href="marketplace.html"
                            class="flex items-center p-3 rounded-lg light-text-gray-700 light-hover-bg-gray-200 transition-colors">
                            <img src="Frame.svg" alt="icon" class="w-8 h-6 light-mode-icon"
                                data-dark-src="Frame-DARK.svg">
                            Marketplace
                        </a>
                    </li>
                    <li>
                        <!-- Light Mode Version (hidden in dark mode) -->
                        <div class="light-mode-item mr-1">
                            <a href="#"
                                class="flex items-center p-3 rounded-lg bg-orange-500 text-white font-semibold shadow-md">
                                <img src="settings-DARK.svg" alt="icon" class="w-8 h-6 light-mode-icon">
                                Settings
                            </a>
                        </div>

                        <!-- Dark Mode Version (hidden in light mode) -->
                        <div class="dark-mode-item hidden">
                            <div class="w-fit rounded-md mr-12  px-0.5 bg-orange-500 shadow-md">
                                <a href="#" class="bg-[#2c1e17]  rounded-md px-6 py-3 flex items-center gap-3">
                                    <img src="settings-DARK.svg" alt="icon" class="w-8 h-6 light-mode-icon">
                                    <span class="text-white font-semibold pr-2 text-lg">Settings</span>
                                </a>
                            </div>
                        </div>
                    </li>

                </ul>
                <div class="my-4 border-t border-gray-200"></div>
                <p class="text-xs text-gray-400 uppercase tracking-wider mb-2 pl-3">Misc</p>
                <ul>
                    <li class="mb-2">
                        <a href="#"
                            class="flex items-center p-3 rounded-lg light-text-gray-700 light-hover-bg-gray-200 transition-colors">
                            <img src="headphones.svg" alt="icon" class="w-8 h-6 light-mode-icon"
                                data-dark-src="headphones-DARK.svg">
                            Support
                        </a>
                    </li>

                </ul>
            </nav>

            <div class="h-[400px]"></div>

            <!-- Logout -->
            <div class="mt-auto pt-4">
                <a href="#" id="knowledgeButton"
                    class="flex items-center p-3 rounded-lg light-text-gray-700 light-hover-bg-gray-200 transition-colors">
                    <img src="fi_2961545.svg" alt="icon" class="w-8 h-6 light-mode-icon"
                        data-dark-src="fi_2961545-DARK.svg">
                    Knowledge
                </a>
            </div>
            <div class="pt-4">
                <a href="#"
                    class="flex items-center p-3 rounded-lg light-text-gray-700 light-hover-bg-gray-200 transition-colors">
                    <img src="logout.svg" alt="icon" class="w-8 h-6 light-mode-icon"
                        data-dark-src="logout-DARK.svg">
                    Logout
                </a>
            </div>
        </aside> --}}
        @include('layouts.sidebar')

        <!-- Main Content Area -->
        <main class="flex-1 light-bg-bill  overflow-y-auto">
            <!-- Header -->
            @include('layouts.header')

            <div class="p-6 lg:p-8 -mt-5 light-bg-bill">

                <!-- Projects Title -->
                <h1 class="text-3xl font-bold light-text-gray-800 mb-10">Settings</h1>

                <!-- Connect Domain Section -->

                <div class="hidden md:flex border-b py-3 px-6 gap-5 light-border-gray-200 dark:border-gray-700  mb-10">
                    <!-- Your existing desktop tabs structure -->
                    <!-- Tab 1: Overview -->
                    <div
                        class="flex items-center active px-2 py-1 justify-center border border-gray-200 rounded-lg hover:rounded-md light-hover-bg-gray-300 tab-wrapper">
                        <img class="w-5 h-5 mr-1" src="{{ asset('assets/profile-circle.svg') }}" alt="">
                        <button class="tab-btn text-xs p-1 tab-button " data-tab="overview">Profile
                            Management</button>
                    </div>
                    <!-- Other tabs... -->
                    <!-- Tab 2: Notes -->
                    <div
                        class="flex items-center px-2 py-1 justify-center border border-gray-200 rounded-lg hover:rounded-md light-hover-bg-gray-300 tab-wrapper">
                        <img class="w-5 h-5 mr-2" src="{{ asset('assets/security-safe.svg') }}" alt="">
                        <button class="tab-btn text-xs font-medium " data-tab="notes">Security Settings</button>
                    </div>

                    <!-- Tab 3: Uploaded Document -->
                    <div
                        class="flex items-center px-2 justify-center border border-gray-200 rounded-lg hover:rounded-md  light-hover-bg-gray-300 tab-wrapper">
                        <img class="w-5 h-5 mr-2" src="{{ asset('assets/notification-set.svg') }}" class="text-white"
                            alt="">
                        <button
                            class="tab-btn text-xs font-medium light-text-gray-500 dark:text-gray-400 hover:light-text-gray-700 dark:hover:text-gray-300"
                            data-tab="uploadedDocument">Notification Preferences</button>
                    </div>

                    <!-- Tab 4: Team Member -->
                    @if(auth()->user()->role_id == 1)
                    <div
                        class="flex items-center px-2 justify-center border border-gray-200 rounded-lg hover:rounded-md  light-hover-bg-gray-300 tab-wrapper">
                        <img class="w-5 h-5 mr-2" src="{{ asset('assets/profile-2user-DARK.svg') }}" class="text-white"
                            alt="">
                        <button
                            class="tab-btn text-xs font-medium light-text-gray-500 dark:text-gray-400 hover:light-text-gray-700 dark:hover:text-gray-300"
                            data-tab="teamMember">Team Member</button>
                    </div>

                    <!-- Tab 5: Roles & Permission -->
                    <div
                        class="flex items-center px-2 justify-center border border-gray-200 rounded-lg hover:rounded-md  light-hover-bg-gray-300 tab-wrapper">
                        <img class="w-5 h-5 mr-2" src="{{ asset('assets/security-safe.svg') }}" class="text-white"
                            alt="">
                        <button
                            class="tab-btn text-xs font-medium light-text-gray-500 dark:text-gray-400 hover:light-text-gray-700 dark:hover:text-gray-300"
                            data-tab="rolesAnd">Roles & Permissions</button>
                    </div>

                    @endif



                </div>

                <!-- Tab Contents -->
                <div class="tab-contents">
                    <div id="overviewContent" class="tab-content">
                        <!-- Overview content here -->
                        <!-- Overview Cards -->
                        <!-- User's Projects List Table -->
                        {{-- filepath: resources/views/profile/edit.blade.php --}}
                        <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="w-full h-full light-bg-d9d9d9 p-5 rounded-md">
                                <h3 class="font-medium pb-6 text-2xl">Profile Details</h3>
                                <div class="flex justify-start items-center gap-10">
                                    <div
                                        style="width: 9em ;height:9em; box-shadow: 0px 0px 1px 1px rgba(0, 0, 0, 0.25); border-radius: 12px;">
                                        <img src="{{ asset($user->image ?? 'assets/default-prf.png') }}" alt=""
                                            style="width: 9em ;height:9em;border-radius: 12px;">
                                    </div>
                                    <div>
                                        <input class="bg-gray-200 p-2 mb-2 rounded-lg border dark-border-gray-500"
                                            type="file" name="image" />
                                        <p>Allowed JPG, GIF or PNG. Max size of 800K</p>
                                    </div>
                                </div>
                                <div class="pt-5 pb-5">
                                    <div class="grid-cols-2 grid gap-4 pb-5">
                                        <div>
                                            <label class="block text-sm mb-1 light-text-black">First Name</label>
                                            <div class="relative flex-grow">
                                                <input type="text" name="name"
                                                    value="{{ old('name', $user->name) }}" placeholder="John"
                                                    class="w-full p-2 pr-16 rounded light-bg-d7d7d7 border border-gray-700 text-white focus:outline-none">
                                            </div>
                                        </div>

                                        <div>
                                            <label class="block text-sm mb-1 light-text-black">Email</label>
                                            <div class="relative flex-grow">
                                                <input type="email" name="email"
                                                    value="{{ old('email', $user->email) }}"
                                                    placeholder="John.Doe@gmail.com"
                                                    class="w-full p-2 pr-16 rounded light-bg-d7d7d7 border border-gray-700 text-white focus:outline-none">
                                            </div>
                                        </div>
                                        <div>
                                            <label class="block text-sm mb-1 light-text-black">Company/Organization
                                                Name</label>
                                            <div class="relative flex-grow">
                                                <input type="text" name="company"
                                                    value="{{ old('company', $user->company) }}"
                                                    placeholder="WIZSPEED"
                                                    class="w-full p-2 pr-16 rounded light-bg-d7d7d7 border border-gray-700 text-white focus:outline-none">
                                            </div>
                                        </div>
                                        <div>
                                            <label class="block text-sm mb-1 light-text-black">Business Website</label>
                                            <div class="relative flex-grow">
                                                <input type="text" name="website"
                                                    value="{{ old('website', $user->website) }}"
                                                    placeholder="www.wizspeed.com"
                                                    class="w-full p-2 pr-16 rounded light-bg-d7d7d7 border border-gray-700 text-white focus:outline-none">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Buttons -->
                                    <div class="flex justify-end items-center mt-5">
                                        <div class="flex justify-end gap-3 pt-3">
                                            <button type="button" id="cancelTicket"
                                                class="px-4 py-2 light-text-black light-bg-d7d7d7 rounded-lg hover:bg-gray-600">
                                                Cancel
                                            </button>
                                            <button type="submit"
                                                class="px-4 py-2 btn-orange text-white rounded-lg hover:bg-orange-600">
                                                Save
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
                <div id="notesContent" class="tab-content hidden">
                    <!-- Notes content here -->
                    <form action="{{ route('password.update') }}" method="post">
                        @csrf
                        @method('put')
                        <div class="w-full h-full light-bg-f5f5f5 light-bg-seo p-5 mb-5 rounded-md">
                            <h3 class="font-medium pb-6 text-2xl">Change Password</h3>
                            <div class="flex justify-start items-center gap-10">

                            </div>
                            <div class="pt-5 pb-5">

                                <div class="grid-cols-2 grid gap-4 pb-5">
                                    <div>
                                        <label class="block text-sm mb-1 light-text-black">Current Password</label>
                                        <div class="relative flex-grow">
                                            <input type="password" name="current_password"
                                                placeholder="Enter your Current Password"
                                                class="w-full p-2 pr-16 rounded light-bg-d7d7d7 border border-gray-700 text-white focus:outline-none">
                                        </div>
                                    </div>

                                </div>
                                <div class="grid-cols-2 grid gap-4 pb-5">
                                    <div>
                                        <label class="block text-sm mb-1 light-text-black">New Password</label>
                                        <div class="relative flex-grow">
                                            <input type="password" name="password"
                                                placeholder="Enter your New Password"
                                                class="w-full p-2 pr-16 rounded light-bg-d7d7d7 border border-gray-700 text-white focus:outline-none">
                                        </div>
                                    </div>
                                    <div>
                                        <label class="block text-sm mb-1 light-text-black">Confirm Password</label>
                                        <div class="relative flex-grow">
                                            <input type="password" name="password_confirmation"
                                                placeholder="Confirm your New Password"
                                                class="w-full p-2 pr-16 rounded light-bg-d7d7d7 border border-gray-700 text-white focus:outline-none">
                                            <div
                                                class="absolute right-2 top-1/2 transform -translate-y-1/2 flex gap-2">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="grid-cols-2 grid gap-4">

                                    <div class="text-gray-400">
                                        <h3 class="mb-2">Password Requirements:</h3>
                                        <ul class="list-disc text-sm pl-5 space-y-1"> <!-- Tailwind classes -->
                                            <li>Minimum 8 characters long - the more, the better</li>
                                            <li>At least one lowercase character</li>
                                            <li>At least one number, symbol, or whitespace character</li>
                                        </ul>
                                    </div>

                                </div>
                                <div class="flex items-center gap-4">



                                </div>
                                <!-- Buttons -->
                                <div class="flex justify-end items-center mt-5">

                                    <div class="flex justify-end gap-3 pt-3">
                                        <button type="button" id="cancelTicket"
                                            class="px-4 py-2 light-text-black light-bg-d7d7d7 rounded-lg hover:bg-gray-600">
                                            Cancel
                                        </button>
                                        <button type="submit"
                                            class="px-4 py-2 btn-orange text-white rounded-lg hover:bg-orange-600">
                                            Save
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                    <div class="w-full h-full light-bg-f5f5f5 light-bg-seo mb-5 px-5 py-2 rounded-md">
                        <h3 class="font-medium pt-4 text-2xl">Two-steps verification</h3>
                        <div class="flex justify-start items-center gap-10">

                        </div>
                        <div class="pt-5 pb-5">

                            <div class="grid-cols-2 flex grid gap-4">

                                <div class="text-gray-400">
                                    <h3 class="mb-2">Two-steps verification</h3>
                                    <p class="text-sm">Two-factor authentication adds a layer of security to your
                                        account by requiring
                                        more than just a password to log in. Learn more.</p>
                                </div>

                                <!-- Buttons -->
                                <div class="flex justify-end items-center mt-5">

                                    <div class="flex justify-end gap-3 pt-3">
                                        @auth
                                        @if (auth()->user()->email_verified_at === null)
                                        <form method="POST" action="{{ route('verification.send') }}">
                                            @csrf
                                            <button type="submit"
                                                class="px-4 py-2 mt-14 btn-orange text-white  rounded-lg hover:bg-orange-600">
                                                Enable two-factor authentication
                                            </button>
                                        </form>
                                        @else
                                        <button type="submit"
                                            class="px-4 py-2 mt-14 btn-orange text-white  rounded-lg hover:bg-orange-600">
                                            ✅ Two-factor authentication is enabled
                                        </button>
                                        @endif
                                        @endauth
                                    </div>
                                </div>

                            </div>


                        </div>
                    </div>
                    <div class="lg:col-span-2 light-bg-f5f5f5 light-bg-seo mb-5 rounded-md shadow-sm">
                        <div class="flex items-center justify-between  p-5 flex-wrap gap-3">
                            <h2 class="text-xl font-semibold light-text-gray-800">Authorized Devices:</h2>

                        </div>

                        <div class="overflow-x-auto rounded-b-md	">
                            <table class="min-w-full  divide-y divide-gray-200">
                                <thead class="light-bg-d9d9d9">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3  text-left text-xs
    font-medium light-text-gray-500 uppercase tracking-wider">
                                            <div class="flex items-center w-full justify-between">
                                                <div style="width: 80%">DEVICE</div>
                                                <div style="width: 20%;">

                                                </div>
                                            </div>
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs  font-medium light-text-gray-500 uppercase ">
                                            <div class="flex items-center">
                                                IP ADDRESS

                                            </div>
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium light-text-gray-500 uppercase tracking-wider">
                                            <div class="flex items-center">
                                                LOCATION

                                            </div>
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium light-text-gray-500 uppercase tracking-wider min-w-[120px]">
                                            <div class="flex items-center justify-between">
                                                <span class="whitespace-nowrap">LAST LOGIN</span>
                                                <div class="flex flex-col ml-10">

                                                </div>
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
                                <tbody class="light-bg-white  light-bg-seo divide-y divide-gray-200">
                                    <!-- Row 1 -->
                                    @if ($userDevices->isEmpty())
                                    <tr>
                                        <td colspan="5"
                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium light-text-gray-900 text-center">
                                            No authorized devices found.
                                        </td>
                                    </tr>
                                    @else
                                    @foreach ($userDevices as $device)
                                    <tr>
                                        <td
                                            class="px-6 py-2 whitespace-nowrap text-sm font-medium light-text-gray-900">
                                            {{ $device->device_name }}
                                        </td>
                                        <td class="px-6 py-2 whitespace-nowrap">
                                            <div class="text-sm font-thin text-gray-400">
                                                {{ $device->ip_address }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-2 whitespace-nowrap">
                                            <span
                                                class="px-2 inline-flex text-sm text-gray-400 leading-5 font-thin rounded-full">{{ $device->location }}</span>
                                        </td>
                                        <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-400">
                                            {{ $device->last_login }}
                                            20:07
                                        </td>
                                        <td class="px-6 py-2 whitespace-nowrap text-right text-sm font-medium">
                                            <div class="flex justify-start gap-2">
                                                <form
                                                    action="{{ route('profile.deleteDevice', $device->id) }}"
                                                    method="post">
                                                    @csrf
                                                    <button type="submit"
                                                        class="light-text-black light-bg-d7d7d7 px-5 py-2 rounded-md light-hover-text-orange-700 ">
                                                        Remove
                                                    </button>
                                                </form>
                                            </div>

                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                    <!-- Row 2 -->

                                    <!-- Row 3 -->

                                    <!-- Row 4 -->

                                </tbody>
                            </table>
                        </div>

                        <!-- Table Pagination -->

                    </div>

                </div>
            </div>


            <div id="uploadedDocumentContent" class="tab-content hidden ml-8 mr-5 -mt-8">
                <!-- Uploaded Document content here -->
                <div class=" mx-auto p-5 mb-5 w-full h-full  light-bg-d9d9d9 light-bg-seo rounded-lg shadow-sm">
                    <h1 class="text-2xl font-bold light-text-black mb-6">Notification Preferences</h1>

                    <div class="space-y-6">
                        <!-- Email Notifications Section -->
                        <div>
                            <ul class="space-y-3">
                                <!-- Notification Item with Toggle -->
                                <li class="flex items-center border-b justify-between py-4 gap-8">
                                    <div class="w-1/4 min-w-[160px]">
                                        <span class="text-gray-400 font-medium">Ticket Received</span>
                                    </div>
                                    <div class="flex-1">
                                        <span class="text-gray-400 text-left">Notify when a new support ticket is
                                            submitted.</span>
                                    </div>
                                    <div class="w-16 flex justify-end">
                                        <label class="toggle-switch">
                                            {{-- <input type="checkbox" class="toggle-input" checked> --}}
                                            <input type="checkbox" class="toggle-input" data-type="ticket_received"
                                                {{ ($preferences['ticket_received'] ?? 1) == 1 ? 'checked' : '' }}>
                                            <span class="toggle-slider"></span>
                                        </label>
                                    </div>
                                </li>

                                <!-- Notification Item with Toggle -->
                                <li class="flex items-center border-b justify-between py-4 gap-8">
                                    <div class="w-1/4 min-w-[160px]">
                                        <span class="text-gray-400 font-medium">Payment Received</span>
                                    </div>
                                    <div class="flex-1">
                                        <span class="text-gray-400 text-left">Alert when a payment is made by a
                                            user.</span>
                                    </div>
                                    <div class="w-16 flex justify-end">
                                        <label class="toggle-switch">
                                            {{-- <input type="checkbox" class="toggle-input" checked> --}}
                                            <input type="checkbox" class="toggle-input" data-type="payment_received"
                                                {{ ($preferences['payment_received'] ?? 1) == 1 ? 'checked' : '' }}>
                                            <span class="toggle-slider"></span>
                                        </label>
                                    </div>
                                </li>

                                <!-- File Upload/Download Alerts -->
                                <li class="flex items-center border-b justify-between py-4 gap-8">
                                    <div class="w-1/4 min-w-[160px]">
                                        <span class="text-gray-400 font-medium">Subscription Renewal Reminder</span>
                                    </div>
                                    <div class="flex-1">
                                        <span class="text-gray-400 text-left">Notify when a subscription is about to
                                            renew.</span>
                                    </div>
                                    <div class="w-16 flex justify-end">
                                        <label class="toggle-switch">
                                            {{-- <input type="checkbox" class="toggle-input" checked> --}}
                                            <input type="checkbox" class="toggle-input"
                                                data-type="subscription_renewal"
                                                {{ ($preferences['subscription_renewal'] ?? 1) == 1 ? 'checked' : '' }}>
                                            <span class="toggle-slider"></span>
                                        </label>
                                    </div>
                                </li>

                                <!-- Ticket Updates -->
                                <li class="flex items-center border-b justify-between py-4 gap-8">
                                    <div class="w-1/4 min-w-[160px]">
                                        <span class="text-gray-400 font-medium">New User Registration</span>
                                    </div>
                                    <div class="flex-1">
                                        <span class="text-gray-400 text-left">Notify when a new user registers.</span>
                                    </div>
                                    <div class="w-16 flex justify-end">
                                        <label class="toggle-switch">
                                            {{-- <input type="checkbox" class="toggle-input" checked> --}}
                                            <input type="checkbox" class="toggle-input"
                                                data-type="new_user_registration"
                                                {{ ($preferences['new_user_registration'] ?? 1) == 1 ? 'checked' : '' }}>
                                            <span class="toggle-slider"></span>
                                        </label>
                                    </div>
                                </li>

                                <!-- Billing/Invoice Alerts -->
                                <li class="flex items-center border-b justify-between py-4 gap-8">
                                    <div class="w-1/4 min-w-[160px]">
                                        <span class="text-gray-400 font-medium">Payment Failure Alerts</span>
                                    </div>
                                    <div class="flex-1">
                                        <span class="text-gray-400 text-left">Notify when a payment fails.</span>
                                    </div>
                                    <div class="w-16 flex justify-end">
                                        <label class="toggle-switch">
                                            {{-- <input type="checkbox" class="toggle-input" checked> --}}
                                            <input type="checkbox" class="toggle-input" data-type="payment_failure"
                                                {{ ($preferences['payment_failure'] ?? 1) == 1 ? 'checked' : '' }}>
                                            <span class="toggle-slider"></span>
                                        </label>
                                    </div>
                                </li>


                            </ul>
                        </div>
                        <!-- Buttons -->
                        {{-- <div class="flex justify-end items-center mt-5">

                            <div class="flex justify-end gap-3 pt-3">
                                <button type="submit" class="px-4 py-2 bg-gray-500  rounded-lg hover:bg-orange-600">
                                    Cancel
                                </button>
                                <button type="submit"
                                    class="px-4 py-2 btn-orange text-white rounded-lg hover:bg-orange-600">
                                    Save
                                </button>
                            </div>
                        </div> --}}
                    </div>

                </div>






                <!-- SEO Plan Cards -->





                <!-- Bottom Cards: Need Help & Free Consulting -->

            </div>

            <div id="teamMemberContent" class="tab-content hidden ml-8 mr-5  -mt-8">
                <!-- Uploaded Document content here -->
                <div id="leftSection" class="lg:col-span-2 light-bg-f5f5f5 light-bg-seo  rounded-xl shadow-sm">
                    <div class="flex items-center justify-between mb-4 p-6 flex-wrap gap-3">
                        <h2 class="text-xl font-semibold light-text-gray-800">Team Access</h2>
                        <div class="flex items-center space-x-3">
                            <div class="relative">
                                <input
                                    id="memberSearch"
                                    type="text"
                                    placeholder="Search here"
                                    class="pl-10 pr-4 py-2 rounded-lg light-border-gray-300 focus:outline-none focus:ring-1 focus:ring-orange-500">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="icon text-gray-400" viewBox="0 0 24 24">
                                        <circle cx="11" cy="11" r="8"></circle>
                                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                    </svg>
                                </div>
                            </div>
                            <div class="relative inline-block">
                                <!-- Button -->
                                <div class="flex gap-3">
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
                                    <button id="openPopup"
                                        class="flex items-center justify-center px-4 py-2 rounded-lg bg-white light-bg-d7d7d7 light-text-gray-700 border light-border-gray-300 text-gray-700 hover:bg-gray-200 transition-colors ">
                                        <div class="flex">
                                            <span>Add New Member</span>
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
                        <table id="memberTable" class="min-w-full table table-bordered divide-y divide-gray-200">
                            <thead class="light-bg-d9d9d9 w-full">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 w-1/3 text-left text-xs font-medium light-text-gray-500 uppercase tracking-wider">
                                        <div class="flex items-center">
                                            NAME

                                        </div>
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 w-1/3 text-left text-xs font-medium light-text-gray-500 uppercase tracking-wider">
                                        <div class="flex items-center justify-between">
                                            EMAIL

                                        </div>
                                    </th>

                                    <th scope="col"
                                        class="px-6 py-3 w-1/3 text-left text-xs font-medium light-text-gray-500 uppercase tracking-wider">
                                        <div class="flex items-center justify-between">
                                            ROLE

                                        </div>
                                    </th>

                                    <th scope="col"
                                        class="px-6 py-3 w-1/6 text-left text-xs font-medium light-text-gray-500 uppercase tracking-wider">
                                        ACTION
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="user-table-body" class="light-bg-white light-bg-seo divide-y divide-gray-200">

                            </tbody>
                        </table>
                    </div>

                    <!-- Table Pagination -->
                    <div
                        class="flex items-center p-6 justify-between mt-4 text-sm light-text-gray-600 flex-wrap gap-2">
                        <div>
                            <span id="tableInfo">Showing 1 to 3 of 100 entries</span>
                            <div class="relative inline-block">
                                <!-- Button -->
                                <!-- <button id="filterButton2"
                                    class="flex items-center justify-center px-4 py-2 rounded-lg bg-white light-bg-d9d9d9 light-text-gray-700 border border-gray-300 text-gray-700 hover:bg-gray-200 transition-colors">
                                    <div class="flex">
                                        <span>Filters</span>
                                        <svg class="ml-1 w-4 h-4" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path d="M7 16 L12 21 L17 16" /> <!-- Down chevron -->
                                <!-- </svg> -->
                                <!-- </div> -->
                                <!-- </button> -->

                                <!-- Dropdown Content -->
                                <div id="filterDropdown"
                                    class="hidden absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white light-bg-d9d9d9 light-text-gray-700 ring-1 ring-black text-gray-700 hover:bg-gray-200 transition-colors ring-opacity-5 z-50">
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
                        <div id="customPagination" class="flex space-x-2">
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


                <!-- Right Section -->
                <div id="rightSection" style="display: none; ">
                    <div class="flex gap-2 text-xs mb-10 ">
                        <div id="backToLeft">
                            <span class="cursor-pointer">Settings</span>
                            <span>/</span>
                            <span class="cursor-pointer">Team Access</span>
                            <span>/</span>
                        </div>
                        <span class="cursor-pointer">View Team Member</span>
                    </div>

                    <div class="flex gap-6">
                        <!-- First Column (40%) -->
                        <div class="w-[30%] h-[30%] p-4 light-bg-d9d9d9 rounded-md">
                            <div class="flex flex-col pb-4 items-center border-b light-border-black">
                                <img src="AvatarTeam.png" class="pb-4" alt="">
                                <h3 class="text-2xl member_name">Violet Mendoza</h3>
                            </div>

                            <div class="flex flex-col border-b light-border-black gap-4 mt-4 ">
                                <div class="text-sm light-text-gray-600">Details</div>
                                <div class="text-md gap-2 text-white"><span
                                        class="text-md light-text-gray-600 ">Username:
                                        <span class="member_name">John Doe</span></div>
                                <div class="text-md gap-2 text-white"><span class="text-md light-text-gray-600">Email:
                                        <span class="member_email">abc123@gmail.com</span>
                                </div>
                                <div class="text-md gap-2 text-white">
                                    <span class="text-md light-text-gray-600">Role:
                                        <span class="member_role">Designer</span>
                                </div>
                                <div class="text-md flex items-center gap-2 text-white mb-4"><span
                                        class="text-md light-text-gray-600">Role Permission: </span>
                                    <div class="bg-green-900/50 py-1 px-4 rounded-full">
                                        <p class="text-green-500">Edit</p>
                                    </div>
                                </div>

                            </div>

                            <div class="flex justify-end gap-4 mt-4">
                                <button id="edit-user-btn"
                                    class="px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 openPopup2">Edit</button>
                                <button id="remove-user-btn"
                                    class="px-4 py-2 bg-red-900/50 text-red-500 rounded-lg hover:bg-red-600 delete-member">Remove</button>
                            </div>
                        </div>

                        <!-- Second Column (60%) -->
                        <div class="w-[70%]  rounded-md">
                            <div class="lg:col-span-2 light-bg-f5f5f5 light-bg-seo mb-7 rounded-xl shadow-sm">
                                <div class="flex items-center justify-between  p-6 flex-wrap gap-3">
                                    <h2 class="text-xl font-semibold light-text-gray-800">Projects Lists</h2>
                                    <div class="flex items-center space-x-3">
                                        <div class="relative">
                                            <input type="text" placeholder="Search here"
                                                class="pl-10 pr-4 py-2 rounded-lg light-border-gray-300 focus:outline-none focus:ring-1 focus:ring-orange-500">
                                            <div
                                                class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <svg class="icon text-gray-400" viewBox="0 0 24 24">
                                                    <circle cx="11" cy="11" r="8"></circle>
                                                    <line x1="21" y1="21" x2="16.65"
                                                        y2="16.65"></line>
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
                                                    class="px-9 py-3  text-left text-xs font-medium light-text-gray-500 uppercase tracking-wider">
                                                    <div class="flex items-center w-full justify-between">
                                                        <div style="width: 80%">PROJECTS</div>
                                                        <div style="width: 20%;">
                                                            <svg class=" w-8 h-4" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                                <path d="M7 8 L12 3 L17 8" /> <!-- Up chevron -->
                                                                <path d="M7 16 L12 21 L17 16" />
                                                                <!-- Down chevron -->
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs  font-medium light-text-gray-500 uppercase ">
                                                    <div class="flex items-center">
                                                        CLIENT
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
                                                        PROGRESS
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
                                        <tbody id="projectsTableBody"
                                            class="light-bg-white light-bg-seo divide-y divide-gray-200">

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
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round">
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

                            <div class="light-bg-f5f5f5 light-bg-seo  rounded-xl shadow-sm">
                                <!-- Bottom Cards: Need Help & Free Consulting -->
                                <div class="flex flex-col md:flex-row gap-4">
                                    <div class="flex-1 bg-white light-bg-f5f5f5 light-bg-seo rounded-lg shadow-sm ">

                                        <div
                                            class="bg-gray-800 light-bg-f5f5f5 light-bg-seo text-white p-6 rounded-lg shadow-lg">
                                            <h2 class="text-lg font-semibold mb-4">Activity Log</h2>
                                            <div class="relative border-l border-gray-700 ml-3">
                                                @if (!empty($activity_logs) && count($activity_logs) > 0)
                                                @foreach ($activity_logs as $log)
                                                <div class="mb-8 relative pl-6">
                                                    <span
                                                        class="absolute -left-1.5 top-1/2 -translate-y-1/2 w-3 h-3 bg-gray-400 rounded-full border border-gray-800"></span>
                                                    <div>
                                                        <p class="font-medium">{{ $log->action }}</p>
                                                        <p class="text-gray-400 text-sm">
                                                            {{ $log->description }}
                                                        </p>
                                                        <span
                                                            class="absolute right-0 top-0 text-gray-400 text-sm">{{ $log->created_at->diffForHumans() }}</span>
                                                    </div>
                                                </div>
                                                @endforEach
                                                @else
                                                <div class="mb-8 relative pl-6">
                                                    <span
                                                        class="absolute -left-1.5 top-1/2 -translate-y-1/2 w-3 h-3 bg-gray-400 rounded-full border border-gray-800"></span>
                                                    <div>
                                                        <p class="text-gray-400 text-sm">No activity logs found.
                                                        </p>
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- Bottom Cards: Need Help & Free Consulting -->

                </div>



            </div>

            <div id="rolesAndContent" class="tab-content hidden ml-8 mr-5  -mt-8">
                <!-- Uploaded Document content here -->


                <div class="flex gap-2 text-xs mb-10">
                    <div id="backToLeft">
                        <span class="text-gray-400">Settings</span>
                        <span></span>
                        <span>/</span>
                    </div>
                    <span>Roles & Permission</span>
                </div>

                <div class="light-bg-f5f5f5 light-bg-seo px-5 py-8 rounded-lg">
                    <div class="flex items-center justify-between">
                        <div>Roles</div>
                        <div><button id="openRolePopup" class="bg-gray-500 rounded-md p-2">Add New Role</button>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-4">
                        @foreach ($roles as $role)
                        <div class="bg-gray-500 rounded-md p-2">
                            <div class="flex justify-between items-center p-2 mb-1">
                                <div class="felx flex-col">
                                    <img src="{{ asset('assets/ADmin.svg') }}" alt="">
                                </div>
                                <img src="{{ asset('assets/dots-vertical.svg') }}" alt="Menu"
                                    class="h-4 w-4 mt-0.5">
                            </div>
                            <h3 class="text-lg font-medium px-2 light-text-gray-800">{{ $role->name }} </h3>

                        </div>
                        @endforeach

                    </div>
                </div>

            </div>

        </main>
    </div>

    <div id="notification" style="display: none; z-index: 9999 !important;"
        class="fixed top-5 right-5 bg-green-500 text-white px-4 py-2 rounded shadow-lg z-50">
    </div>

    <div id="Projectstatus" style="display: none; z-index: 9999 !important;"
        class="fixed top-5 right-5 bg-green-500 text-white px-4 py-2 rounded shadow-lg z-50">
        Project Status Update successfully!
    </div>

    <div id="memeberadd" style="display: none; z-index: 9999 !important;"
        class="fixed top-5 right-5 bg-green-500 text-white px-4 py-2 rounded shadow-lg z-50">
        Member added successfully!
    </div>

    <div id="memberUpdate" style="display: none; z-index: 9999 !important;"
        class="fixed top-5 right-5 bg-green-500 text-white px-4 py-2 rounded shadow-lg z-50">
        Member updated successfully!
    </div>

    <div id="memeberaddError" style="display: none; z-index: 9999 !important;"
        class="fixed top-5 right-5 bg-red-500 text-white px-4 py-2 rounded shadow-lg z-50">
        Member updated successfully!
    </div>

    <div id="memberdelete" style="display: none; z-index: 9999 !important;"
        class="fixed top-5 right-5 bg-red-500 text-white px-4 py-2 rounded shadow-lg z-50">
        Member deleted successfully!
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {

            let memberTable = $('#memberTable').DataTable({
                paging: true,
                searching: true,
                ordering: true,
                lengthChange: true,
                pageLength: 6,
                destroy: true,
                columnDefs: [{
                        orderable: false,
                        targets: 3
                    } // ACTION column not sortable
                ],

                // ✅ Remove default search, info, pagination
                dom: `
        <"flex justify-between items-center mb-4"l>
        rt
    `
            });




            $('#memberSearch').on('keyup', function() {
                memberTable.search(this.value).draw();
            });



            // Update “Showing X to Y of Z entries”
            function updateTableInfo(table) {
                let info = table.page.info();
                $('#tableInfo').text(`Showing ${info.start + 1} to ${info.end} of ${info.recordsTotal} entries`);
            }

            // Build your custom pagination
            function updatePagination(table) {
                let info = table.page.info();
                let pagination = $('#customPagination');
                pagination.empty();

                // Previous button
                pagination.append(`
        <button data-page="prev" class="px-4 py-2 rounded-md border border-gray-300
            ${info.page === 0 ? 'opacity-50 cursor-not-allowed' : 'hover:bg-gray-100'}">
            Previous
        </button>
    `);

                // Page numbers
                for (let i = 0; i < info.pages; i++) {
                    pagination.append(`
            <button data-page="${i}" class="px-4 py-2 rounded-md border border-gray-300
                ${i === info.page ? 'bg-orange-600 text-white font-semibold' : 'hover:bg-gray-100'}">
                ${i + 1}
            </button>
        `);
                }

                // Next button
                pagination.append(`
        <button data-page="next" class="px-4 py-2 rounded-md border border-gray-300
            ${info.page === info.pages - 1 ? 'opacity-50 cursor-not-allowed' : 'hover:bg-gray-100'}">
            Next
        </button>
    `);
            }

            $('#customPagination').on('click', 'button', function() {
                let action = $(this).data('page');
                let info = memberTable.page.info();

                if (action === 'prev' && info.page > 0) {
                    memberTable.page('previous').draw('page');
                } else if (action === 'next' && info.page < info.pages - 1) {
                    memberTable.page('next').draw('page');
                } else if (!isNaN(action)) {
                    memberTable.page(action).draw('page');
                }
            });
            memberTable.on('draw', function() {
                updateTableInfo(memberTable);
                updatePagination(memberTable);
            });
            updateTableInfo(memberTable);
            updatePagination(memberTable);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.toggle-input').change(function() {
                let checkbox = $(this);
                var type = $(this).data('type');
                var isEnabled = $(this).is(':checked') ? 1 : 0;

                $.ajax({
                    url: 'settings/update-notification',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        notification_type: type,
                        is_enabled: isEnabled
                    },
                    success: function(response) {
                        checkbox.prop('checked', response.is_enabled == 1);
                        if (response.is_enabled == 1) {
                            $('#notification').html('Notification enabled').fadeIn().delay(4000)
                                .fadeOut();
                        } else {
                            $('#notification').html('Notification disabled').fadeIn().delay(
                                4000).fadeOut();
                        }
                    },
                    error: function(xhr) {
                        console.log('Error:', xhr.responseText);
                    }
                });
            });

            $(document).on('click', '#save-member', function(e) {
                e.preventDefault();
                name = $('#name').val();
                email = $('#email').val();
                role_id = $('#role_id').val();
                password = $('#password').val();
                project_id = $('#project_id').val();

                let formData = new FormData();

                formData.append('_token', '{{ csrf_token() }}');
                formData.append('name', name);
                formData.append('email', email);
                formData.append('role_id', role_id);
                formData.append('password', password);
                formData.append('project_id', project_id);

                $.ajax({
                    type: 'POST',
                    url: '/settings/addmember',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.success) {
                            $('#memeberadd').fadeIn().delay(4000).fadeOut();
                            memberData();
                            $('#name').val('');
                            $('#email').val('');
                            $('#role_id').val('');
                            $('#password').val('');
                            $('#project_id').val('');
                        } else {
                            alert('Failed to add member. Please try again.');
                        }
                    },
                    error: function(xhr) {

                        let errorMsg = 'Something went wrong. Please try again.';

                        if (xhr.responseJSON && xhr.responseJSON.errors) {
                            errorMsg = Object.values(xhr.responseJSON.errors)
                                .map(err => err.join('<br>'))
                                .join('<br>');
                        } else if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMsg = xhr.responseJSON.message;
                        }

                        $('#memeberaddError')
                            .html(errorMsg)
                            .fadeIn()
                            .delay(4000)
                            .fadeOut();
                    }
                })

            });

            $(document).on('click', '.openPopup2', function(e) {
                $('#popupModal2').removeClass('hidden');
                let userId = $(this).data('user-id');

                $.ajax({
                    url: '/settings/teammember',
                    method: 'POST',
                    data: {
                        user_id: userId,
                    },
                    success: function(response) {
                        if (response) {
                            $('#e_name').val(response.singleMember.name);
                            $('#e_email').val(response.singleMember.email);
                            $('#e_role_id').val(response.singleMember.role_id);
                            $('#e_project_id').val(response.assignProject.project_id);
                            $('#e_user_id').val(response.singleMember.id);
                        }
                    },
                    error: function(xhr) {
                        console.error('Error fetching member data:', xhr.responseText);
                    }
                })
            });

            $(document).on('click', '#edit-member', function(e) {
                e.preventDefault();
                let userId = $('#e_user_id').val();
                let name = $('#e_name').val();
                let email = $('#e_email').val();
                let role_id = $('#e_role_id').val();
                let project_id = $('#e_project_id').val();

                let formData = new FormData();

                formData.append('_token', '{{ csrf_token() }}');
                formData.append('user_id', userId);
                formData.append('name', name);
                formData.append('email', email);
                formData.append('role_id', role_id);
                formData.append('project_id', project_id);

                $.ajax({
                    type: 'POST',
                    url: '/settings/updatemember',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response) {
                            $('#memberUpdate').fadeIn().delay(4000).fadeOut();
                            $('.member_name').text(response.singleMember.name);
                            $('.member_email').text(response.singleMember.email);
                            $('.member_role').text(response.singleMember.role.name);
                            memberData();
                        } else {
                            alert('Failed to update member. Please try again.');
                        }
                    },
                    error: function(xhr) {
                        console.error('Error updating member:', xhr.responseText);
                    }
                })
            });

            $(document).on('click', '.delete-member', function(e) {
                let userId = $(this).data('user-id');

                $.ajax({
                    url: '/settings/deletemember',
                    method: 'POST',
                    data: {
                        user_id: userId,
                    },
                    success: function(response) {
                        $('#memberdelete').fadeIn().delay(4000).fadeOut();
                        $('#leftSection').show();
                        $('#rightSection').hide();
                        memberData();
                    },
                    error: function(xhr) {
                        console.error('Error Deleting member data:', xhr.responseText);
                    }
                })
            });

            function memberData() {
                $.ajax({
                    type: 'GET',
                    url: '/settings/memeberlist',
                    success: function(response) {

                        memberTable.clear(); // clear existing rows

                        if (response.users && response.users.length > 0) {
                            response.users.forEach(function(user) {
                                memberTable.row.add([
                                    `${user.name}`,
                                    `${user.email}`,
                                    `
                        <span class="ml-2 text-sm items-center text-orange-500 bg-red-500/30 px-2 py-1 rounded-full">
                            ${user.role.name}
                        </span>
                        `,
                                    `
                        <div class="flex gap-2 justify-end items-center">
                            <!-- Eye Button -->
                                                    <button class="confirmPopup" data-user-id="${ user.id }"
                                                        class="text-gray-400 bg-gray-200 p-2 rounded-full hover:bg-orange-100 transition-colors">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                        </svg>
                                                    </button>
                           <!-- Edit Button -->
                                                    <button data-user-id="${ user.id }"
                                                        class="openPopup2 text-gray-400 bg-gray-200 p-2 rounded-full hover:bg-orange-100 transition-colors">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                        </svg>
                                                    </button>
                           <!-- Trash Button -->
                                                    <button data-user-id="${ user.id }"
                                                        class="delete-member text-gray-400 bg-gray-200 p-2 rounded-full hover:bg-orange-100 transition-colors">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                    </button>
                        </div>
                        `
                                ]);
                            });
                        }

                        memberTable.draw(); // redraw table
                    },
                    error: function(xhr) {
                        console.error('Error fetching Users data:', xhr.responseText);
                    }
                });
            }

            memberData();


            function renderProjects(projects) {
                const tableBody = document.getElementById('projectsTableBody');
                tableBody.innerHTML = '';

                if (projects.length === 0) {
                    const tr = document.createElement('tr');
                    tr.innerHTML = `<td colspan="5" class="text-center">No projects assigned to this member.</td>`;
                    tableBody.appendChild(tr);
                    return;
                }

                projects.forEach(project => {
                    const tr = document.createElement('tr');

                    tr.innerHTML = `
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm font-medium light-text-gray-900">
                                                    ${project.project_name}
                                                </div>
                                                    ${
                                                        project.is_high_priority == 1
                                                        ? `
                                                                            <div class="rounded-sm text-center w-20 light-bg-ea54547a mt-1">
                                                                                <div class="text-xs light-text-ff0000">High Priority</div>
                                                                            </div>
                                                                            `
                                                        : ''
                                                    }
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm light-text-gray-900">
                                                <div class="flex items-center gap-1">
                                                    <p>${project.client_name}</p>
                                                </div>
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex flex-col justify-start gap-2">
                                                    <span id="progressText" class="ml-2 text-sm light-text-gray-700 align-middle">24%</span>
                                                    <progress id="myProgress" value="70" max="100" class="w-52 h-2.5 mb-4 rounded-full"></progress>                                                 
                                                </div>
                                            </td>
                                            
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">
                                                <input type="hidden" class="project_status_id" value="${project.id}">
                                                <select id="project_status" name="project_status" class="w-32 px-4 py-2 rounded-lg bg-success-900/50 text-gray-700 hover:bg-gray-200 transition-colors">
                                                    <option value="${project.status}" selected>${project.status}</option>
                                                    <option value="In Progress">In Progress</option>
                                                    <option value="Delay">Delay</option>
                                                    <option value="Completed">Completed</option>
                                                    <option value="Cancelled">Cancelled</option>
                                                </select>
                                            </td>   
                                            
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <div class="flex justify-end gap-2">
                                                        <button
                                                            class="light-text-orange-500 bg-gray-200 p-1 rounded-full light-hover-text-orange-700 open-ticket-modal"
                                                            data-action="view-project">
                                                            <img src="{{ asset('assets/eye-DARK.svg') }}" alt="icon"
                                                                class="w-5 h-5 light-text-gray-900 rounded-full light-mode-icon">
                                                        </button>
                                                    </div>

                                                </td>
                    `;

                    tableBody.appendChild(tr);
                });
            }

            $(document).on('click', '.confirmPopup', function() {
                const userId = $(this).data('user-id');
                $('#leftSection').hide();
                $('#rightSection').show();

                $.ajax({
                    url: '/settings/teammember',
                    method: 'POST',
                    data: {
                        user_id: userId,
                    },
                    success: function(response) {
                        renderProjects(response.projects);
                        $('.member_name').text(response.singleMember.name);
                        $('.member_email').text(response.singleMember.email);
                        $('.member_role').text(response.singleMember.role.name);

                        $('#edit-user-btn').attr('data-user-id', response.singleMember.id);
                        $('#remove-user-btn').attr('data-user-id', response.singleMember.id);
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                    }
                });

            });

            $(document).on('change', '#project_status', function() {

                let selectedStatus = $(this).val();

                let project_status_id = $(this).siblings('.project_status_id').val();

                $.ajax({
                    url: '/projects/status',
                    method: 'POST',
                    data: {
                        project_status: selectedStatus,
                        project_status_id: project_status_id
                    },
                    success: function(response) {
                        $('#Projectstatus').fadeIn(400);

                        setTimeout(() => {
                            $('#Projectstatus').fadeOut(600);
                        }, 3000);
                    }
                });

            });

        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
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

            const leftSection = document.getElementById('leftSection');
            const rightSection = document.getElementById('rightSection');
            const popupModal = document.getElementById('popupModal');
            const popupModal2 = document.getElementById('popupModal2');

            const rolePopupModal = document.getElementById('rolePopupModal'); // ✅ New popup modal for roles

            const openRolePopupBtn = document.getElementById('openRolePopup'); // ✅ Button to open role popup
            const closeRolePopupBtn = document.getElementById('rolePopupClose'); // ✅ Close
            const rolePopupConfirmBtn = document.getElementById(
                'rolePopupConfirm'); // ✅ Confirm button for role popup


            const openPopupBtn = document.getElementById('openPopup');
            const closePopupBtn = document.getElementById('closePopup');
            const closePopupBtn2 = document.getElementById('closePopup2');
            const confirmPopupBtns = document.querySelectorAll('.confirmPopup');
            const backToLeftBtn = document.getElementById('backToLeft'); // ✅ New button

            // Show popup when button in left section is clicked
            openPopupBtn.addEventListener('click', () => {
                popupModal.classList.remove('hidden');
            });


            // Show popup when button in left section is clicked
            openRolePopupBtn.addEventListener('click', () => {
                rolePopupModal.classList.remove('hidden');
            });

            // Close popup without changes
            closePopupBtn.addEventListener('click', () => {
                popupModal.classList.add('hidden');
            });

            closePopupBtn2.addEventListener('click', () => {
                popupModal2.classList.add('hidden');
            });

            // Close popup without changes
            closeRolePopupBtn.addEventListener('click', () => {
                rolePopupModal.classList.add('hidden');
            });

            // Confirm in popup → switch to right section
            // confirmPopupBtns.forEach((btn) => {
            //     btn.addEventListener('click', (e) => {
            //         e.preventDefault();

            //         leftSection.style.display = 'none';
            //         rightSection.style.display = 'block';
            //         popupModal.classList.add('hidden');
            //     });
            // });

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
        });




        // Outside click handler for both modals
        window.addEventListener('click', (e) => {
            if (e.target === ticketModal) ticketModal.classList.add('hidden');
            if (e.target === paymentModal) paymentModal.classList.add('hidden');
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


    <!-- New member Modal -->
    <div id="popupModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center z-50 justify-center hidden">
        <div
            class="light-bg-d9d9d9 bg-white text-white rounded-lg shadow-lg w-[900px] max-h-[90vh] overflow-y-auto  relative">
            <!-- Close Button -->
            <button id="closePopup" class="absolute top-3 right-3 text-gray-400 hover:text-white">
                ✕
            </button>

            <div class="px-6 py-3"> <!-- Container for heading + divider -->
                <h2 class="text-lg light-text-black  font-semibold">Add New Member</h2>
            </div>
            <div class=""> <!-- Container for heading + divider -->
                <div class="border-t border-gray-600 w-full mt-4"></div>
            </div>

            <!-- Ticket Form -->
            <form id="ticketForm" class="space-y-4 p-6">
                <!-- Title, Project Name, Priority -->
                <div class="grid grid-cols-1 gap-4">

                    <div class="grid-cols-2 grid gap-4">
                        <div>
                            <label class="block text-sm mb-1 light-text-black">Name</label>
                            <div class="relative flex-grow">
                                <input type="text" name="name" id="name" placeholder="Name here..."
                                    class="w-full p-2 pr-16 rounded light-bg-d7d7d7 border border-gray-700 text-white focus:outline-none">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm mb-1 light-text-black">Email</label>
                            <div class="relative flex-grow">
                                <input type="text" name="email" id="email" placeholder="Email here..."
                                    class="w-full p-2 pr-16 rounded light-bg-d7d7d7 border border-gray-700 text-white focus:outline-none">
                                <div class="absolute right-2 top-1/2 transform -translate-y-1/2 flex gap-2">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid-cols-2 grid gap-4">
                        <div>
                            <label class="block text-sm mb-1 light-text-black">Password</label>
                            <div class="relative flex-grow">
                                <input type="text" name="password" id="password" placeholder="Password here..."
                                    class="w-full p-2 pr-16 rounded light-bg-d7d7d7 border border-gray-700 text-white focus:outline-none">
                            </div>
                        </div>
                        <!-- State Selection -->
                        <div>
                            <label class="block text-sm mb-1 light-text-black">Role</label>
                            <select id="role_id"
                                class="w-full p-2 rounded light-bg-d7d7d7 border border-gray-700 light-text-black">
                                <option value="" hidden selected>Select Role</option>
                                @if ($roles->count() > 0)
                                @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="">
                        <!-- State Selection -->
                        <div>
                            <label class="block text-sm mb-1 light-text-black">Assign Project</label>
                            <select id="project_id"
                                class="w-full p-2 rounded light-bg-d7d7d7 border border-gray-700 light-text-black">
                                <option value="" selected hidden>Select Project</option>
                                @if ($allProjects->count() > 0)
                                @foreach ($allProjects as $project)
                                <option value="{{ $project->id }}">{{ $project->project_name }}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                    </div>

                </div>


                <!-- Buttons -->
                <div class="flex justify-end items-center">

                    <div class="flex justify-end gap-3 pt-3">
                        <button type="button" id="closePopup"
                            class="px-4 py-2 light-text-black light-bg-d7d7d7 rounded-lg hover:bg-gray-600">
                            Cancel
                        </button>
                        <button id="save-member" type="submit"
                            class="px-4 py-2 btn-orange text-white rounded-lg hover:bg-orange-600">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- edit member Modal -->
    <div id="popupModal2" class="fixed inset-0 bg-black bg-opacity-50 flex items-center z-50 justify-center hidden">
        <div
            class="light-bg-d9d9d9 bg-white text-white rounded-lg shadow-lg w-[900px] max-h-[90vh] overflow-y-auto  relative">
            <!-- Close Button -->
            <button id="closePopup2" class="absolute top-3 right-3 text-gray-400 hover:text-white">
                ✕
            </button>

            <div class="px-6 py-3"> <!-- Container for heading + divider -->
                <h2 class="text-lg light-text-black  font-semibold">Edit Member</h2>
            </div>
            <div class=""> <!-- Container for heading + divider -->
                <div class="border-t border-gray-600 w-full mt-4"></div>
            </div>

            <!-- Ticket Form -->
            <form id="ticketForm" class="space-y-4 p-6">
                <!-- Title, Project Name, Priority -->
                <div class="grid grid-cols-1 gap-4">
                    <input type="text" name="" id="e_user_id" hidden>

                    <div class="grid-cols-2 grid gap-4">
                        <div>
                            <label class="block text-sm mb-1 light-text-black">Name</label>
                            <div class="relative flex-grow">
                                <input type="text" name="name" id="e_name" placeholder="Name here..."
                                    class="w-full p-2 pr-16 rounded light-bg-d7d7d7 border border-gray-700 text-white focus:outline-none">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm mb-1 light-text-black">Email</label>
                            <div class="relative flex-grow">
                                <input type="text" name="email" id="e_email" placeholder="Email here..."
                                    class="w-full p-2 pr-16 rounded light-bg-d7d7d7 border border-gray-700 text-white focus:outline-none">
                                <div class="absolute right-2 top-1/2 transform -translate-y-1/2 flex gap-2">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid-cols-2 grid gap-4">
                        <div>
                            <label class="block text-sm mb-1 light-text-black">Assign Project</label>
                            <select id="e_project_id"
                                class="w-full p-2 rounded light-bg-d7d7d7 border border-gray-700 light-text-black">
                                <option value="" selected hidden>Select Project</option>
                                @if ($allProjects->count() > 0)
                                @foreach ($allProjects as $project)
                                <option value="{{ $project->id }}">{{ $project->project_name }}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                        <!-- State Selection -->
                        <div>
                            <label class="block text-sm mb-1 light-text-black">Role</label>
                            <select id="e_role_id"
                                class="w-full p-2 rounded light-bg-d7d7d7 border border-gray-700 light-text-black">
                                <option value="" hidden selected>Select Role</option>
                                @if ($roles->count() > 0)
                                @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="">
                        <!-- State Selection -->

                    </div>

                </div>


                <!-- Buttons -->
                <div class="flex justify-end items-center">

                    <div class="flex justify-end gap-3 pt-3">
                        <button type="button" id="closePopup"
                            class="px-4 py-2 light-text-black light-bg-d7d7d7 rounded-lg hover:bg-gray-600">
                            Cancel
                        </button>
                        <button id="edit-member" type="submit"
                            class="px-4 py-2 btn-orange text-white rounded-lg hover:bg-orange-600">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <!-- New Role Modal -->
    <div id="rolePopupModal"
        class="fixed inset-0 bg-black bg-opacity-50 flex items-center z-50 justify-center hidden">
        <div
            class="light-bg-d9d9d9 bg-white text-white rounded-lg shadow-lg w-[900px] max-h-[90vh] overflow-y-auto  relative">
            <!-- Close Button -->
            <button id="rolePopupClose" class="absolute top-3 right-3 text-gray-400 hover:text-white">
                ✕
            </button>

            <div class="px-6 py-3"> <!-- Container for heading + divider -->
                <h2 class="text-lg light-text-black  font-semibold">Add New Role</h2>
            </div>
            <div class=""> <!-- Container for heading + divider -->
                <div class="border-t border-gray-600 w-full mb-2"></div>
            </div>

            <div class="flex justify-start items-center p-6 gap-10">
                <form id="ticketForm" method='POST' action="{{ route('roles.add') }}"
                    enctype="multipart/form-data" class="space-y-4 p-6">
                    @csrf
                    <img class="rounded-xl" src="Avatar-Icon.svg" alt="">
                    <div class="flex flex-col gap-2">
                        <span class="text-white text-xs">Upload Icon</span>
                        <div>
                            <input type='file' name='file'
                                class="bg-gray-200 p-2 mb-2 rounded-lg border dark-border-gray-500" />
                        </div>
                        <p>Allowed JPG, GIF or PNG. Max size of 800K</p>
                    </div>
            </div>

            <!-- Ticket Form -->
            <div id="ticketForm" class="space-y-4 p-6">
                <div class="grid grid-cols-1 gap-4">

                    <div>
                        <label class="block text-sm mb-1 light-text-black">Role Name</label>
                        <div class="relative flex-grow">
                            <input type="text" name="name" placeholder="Write Role Name"
                                class="w-full p-2 pr-16 rounded light-bg-d7d7d7 border border-gray-700 text-white focus:outline-none">
                        </div>
                    </div>

                    <div class=" text-white  rounded-md w-full  mx-auto">
                        <h2 class="text-sm font-semibold mb-4">Permissions</h2>
                        <div class="overflow-x-auto">
                            <table
                                class="min-w-full text-sm border bg-gray-500 light-border-black rounded-lg overflow-hidden">
                                <thead class="bg-white">
                                    <tr class="bg-gray-200 text-left">
                                        <th class="px-4 py-3">TYPE</th>
                                        <th class="px-4 py-3">VIEW</th>
                                        <th class="px-4 py-3">EDIT</th>
                                        <th class="px-4 py-3">DELETE</th>
                                    </tr>
                                </thead>
                                <tbody class=" divide-y divide-gray-700">
                                    <tr class="light-bg-f5f5f5 light-bg-seo">
                                        <td class="px-4 py-3">Projects</td>
                                        <td class="px-4 py-3"><input name='pr' type="checkbox" checked
                                                class="accent-orange-500 w-4 h-4"></td>
                                        <td class="px-4 py-3"><input name='pe' type="checkbox" checked
                                                class="accent-orange-500 w-4 h-4"></td>
                                        <td class="px-4 py-3"><input name='pd' type="checkbox" checked
                                                class="accent-orange-500 w-4 h-4"></td>
                                    </tr>
                                    <tr class="light-bg-f5f5f5 light-bg-seo">
                                        <td class="px-4 py-3">Tickets</td>
                                        <td class="px-4 py-3"><input name='tr' type="checkbox" checked
                                                class="accent-orange-500 w-4 h-4"></td>
                                        <td class="px-4 py-3"><input name='te' type="checkbox" checked
                                                class="accent-orange-500 w-4 h-4"></td>
                                        <td class="px-4 py-3"><input name='td' type="checkbox" checked
                                                class="accent-orange-500 w-4 h-4"></td>
                                    </tr>
                                    <tr class="light-bg-f5f5f5 light-bg-seo">
                                        <td class="px-4 py-3">Market Place</td>
                                        <td class="px-4 py-3"><input name='mr' type="checkbox" checked
                                                class="accent-orange-500 w-4 h-4"></td>
                                        <td class="px-4 py-3"><input name='me' type="checkbox" checked
                                                class="accent-orange-500 w-4 h-4"></td>
                                        <td class="px-4 py-3"><input name='md' type="checkbox"
                                                class="accent-orange-500 w-4 h-4"></td>
                                    </tr>
                                    <tr class="light-bg-f5f5f5 light-bg-seo">
                                        <td class="px-4 py-3">Billings</td>
                                        <td class="px-4 py-3"><input name='br' type="checkbox" checked
                                                class="accent-orange-500 w-4 h-4"></td>
                                        <td class="px-4 py-3"><input name='be' type="checkbox"
                                                class="accent-orange-500 w-4 h-4"></td>
                                        <td class="px-4 py-3"><input name='bd' type="checkbox"
                                                class="accent-orange-500 w-4 h-4"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>


            </div>
            <!-- Title, Project Name, Priority -->



            <!-- Buttons -->
            <div class="flex justify-end items-center">

                <div class="flex justify-end gap-3 pt-3">
                    <button type="button" id="rolePopupClose"
                        class="px-4 py-2 light-text-black light-bg-d7d7d7 rounded-lg hover:bg-gray-600">
                        Cancel
                    </button>
                    <button type="submit" id="confirmPopup"
                        class="px-4 py-2 btn-orange text-white rounded-lg hover:bg-orange-600">
                        Save
                    </button>
                </div>
            </div>
            </form>
        </div>
    </div>

    <!-- Edit Modal -->
    <div id="paymentModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center z-50 justify-center hidden">
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
                    <button type="submit" class="px-4 py-2 btn-orange text-white rounded-lg hover:bg-orange-600">
                        Save
                    </button>
                </div>
            </form>
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
                <h2 class="text-lg light-text-black  font-semibold">Add Payment Method</h2>
            </div>
            <div class=""> <!-- Container for heading + divider -->
                <div class="border-t border-gray-600 w-full mt-4"></div>
            </div>

            <!-- Ticket Form -->
            <form id="ticketsForm" class="space-y-4 p-6">
                <!-- Title, Project Name, Priority -->
                <div class="grid grid-cols-1 gap-4">
                    <div class="grid grid-cols-2 gap-2">
                        <div>
                            <label class="block text-sm mb-1 light-text-black">Lead Name</label>
                            <input type="text" name="title" placeholder="John"
                                class="w-full p-2 rounded light-bg-d7d7d7 border border-gray-700 text-white focus:outline-none">
                        </div>
                        <div>
                            <label class="block text-sm mb-1 light-text-black">Business Name</label>
                            <input type="text" name="title" placeholder="Wizspeed Tech Ltd"
                                class="w-full p-2 rounded light-bg-d7d7d7 border border-gray-700 text-white focus:outline-none">
                        </div>
                    </div>
                    <div class="grid-cols-1 gap-4">
                        <div class="grid grid-cols-2 gap-2">
                            <div>
                                <label class="block text-sm mb-1 light-text-black">Email</label>
                                <div class="relative flex-grow">
                                    <input type="text" name="title" placeholder="abc123@email.com"
                                        class="w-full p-2 pr-16 rounded light-bg-d7d7d7 border border-gray-700 text-white focus:outline-none">

                                </div>
                            </div>
                            <div>
                                <label class="block text-sm mb-1 light-text-black">Phone Number</label>
                                <div class="relative flex-grow">
                                    <input type="text" name="title" placeholder="0000-000-0000"
                                        class="w-full p-2 pr-16 rounded light-bg-d7d7d7 border border-gray-700 text-white focus:outline-none">

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="grid-cols-1 gap-4">
                        <div>
                            <label class="block text-sm mb-1 light-text-black">Business Name </label>
                            <div class="relative flex-grow">
                                <input type="text" name="title" placeholder="Wizspeed Tech Ltd"
                                    class="w-full p-2 pr-16 rounded light-bg-d7d7d7 border border-gray-700 text-white focus:outline-none">
                            </div>
                        </div>
                    </div>


                    <div class="grid grid-cols-3  gap-4">
                        <div>
                            <label class="block text-sm mb-1 light-text-black">Country</label>
                            <select class="w-full p-2 rounded light-bg-d7d7d7 border border-gray-700 light-text-black">
                                <option value="">Pakistan</option>
                                <option value="Pakistan">Pakistan</option>
                                <option value="Punjab">Punjab</option>
                                <option value="Sindh">Sindh</option>
                                <option value="Balochistan">Balochistan</option>
                            </select>
                        </div>

                        <!-- State Selection -->
                        <div>
                            <label class="block text-sm mb-1 light-text-black">City/State</label>
                            <select class="w-full p-2 rounded light-bg-d7d7d7 border border-gray-700 light-text-black">
                                <option value="">Manshera</option>
                                <option value="KPK">KPK</option>
                                <option value="Punjab">Punjab</option>
                                <option value="Manshera">Manshera</option>
                                <option value="Balochistan">Balochistan</option>
                            </select>
                        </div>

                        <!-- City Selection -->
                        <div>
                            <label class="block text-sm mb-1 light-text-black">Status</label>
                            <select class="w-full p-2 rounded light-bg-d7d7d7 border border-gray-700 light-text-black">
                                <option value="">Active</option>
                                <option value="Mansehra">Mansehra</option>
                                <option value="Peshawar">Peshawar</option>
                                <option value="Abbottabad">Abbottabad</option>
                                <option value="Swat">Swat</option>
                            </select>
                        </div>

                    </div>
                    <div class="grid grid-cols-3  gap-4">
                        <div>
                            <label class="block text-sm mb-1 light-text-black">Lead Source</label>
                            <select class="w-full p-2 rounded light-bg-d7d7d7 border border-gray-700 light-text-black">
                                <option value="">Email Marketing</option>
                                <option value="KPK">KPK</option>
                                <option value="Punjab">Punjab</option>
                                <option value="Sindh">Sindh</option>
                                <option value="Balochistan">Balochistan</option>
                            </select>
                        </div>

                        <!-- State Selection -->
                        <div>
                            <label class="block text-sm mb-1 light-text-black">Lead Status</label>
                            <select class="w-full p-2 rounded light-bg-d7d7d7 border border-gray-700 light-text-black">
                                <option value="">In Process</option>
                                <option value="KPK">KPK</option>
                                <option value="Punjab">Punjab</option>
                                <option value="Sindh">Sindh</option>
                                <option value="Balochistan">Balochistan</option>
                            </select>
                        </div>

                        <!-- City Selection -->
                        <div>
                            <label class="block text-sm mb-1 light-text-black">Memberships</label>
                            <select class="w-full p-2 rounded light-bg-d7d7d7 border border-gray-700 light-text-black">
                                <option value="">Select Memberships</option>
                                <option value="Mansehra">Mansehra</option>
                                <option value="Peshawar">Peshawar</option>
                                <option value="Abbottabad">Abbottabad</option>
                                <option value="Swat">Swat</option>
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
                        <button type="submit" class="px-4 py-2 btn-orange  rounded-lg hover:bg-orange-600">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>



</body>

</html>
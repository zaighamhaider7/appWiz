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

        .dark-mode .light-bg-bill {
            background-color: #121212 !important;
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
        <main class="flex-1 light-bg-bill overflow-y-auto">
            <!-- Header -->
            @include('layouts.header')

            <div class="">
                <div class="p-6 light-bg-bill -mt-5 lg:p-8">

                    <!-- Projects Title -->
                    <div class="flex items-center gap-2 justify-between mb-6">
                        <!-- Title -->
                        <h1
                            class="text-md sm:text-3xl md:text-2xl lg:text-3xl font-bold text-gray-800 dark:text-gray-200">
                            Marketplace
                        </h1>
                    </div>


                    <!-- Tabs -->
                    <div
                        class="hidden md:flex border-b py-3 px-6 gap-2 light-border-gray-200 dark:border-gray-700 mb-10">
                        @if ($mainCategories->isNotEmpty())
                            @foreach ($mainCategories as $index => $category)
                                <div
                                    class="flex items-center {{ $index == 0 ? 'active' : '' }} px-2 py-1 justify-center border border-gray-200 rounded-lg hover:rounded-md light-hover-bg-gray-300 tab-wrapper">
                                    <img class="w-4 h-4 mr-2"
                                        src="{{ asset($category->category_icon ?? 'default-icon.svg') }}"
                                        alt="">
                                    <button class="tab-btn p-1"
                                        data-tab="tab-{{ $category->id }}">{{ $category->category_name }}</button>
                                </div>
                            @endforeach
                        @else
                            <p>No categories found.</p>
                        @endif
                    </div>

                    @php
                        // $currentCategoryId = $currentCategoryId ?? $mainCategories->first()->id;
                        $currentCategoryId = $currentCategoryId ?? ($mainCategories->first()->id ?? null);
                    @endphp

                    <!-- Tab Contents -->
                    @if ($mainCategories->isNotEmpty())
                        <div class="tab-contents">
                            @foreach ($mainCategories as $index => $category)
                                {{-- <div id="tab-{{ $category->id }}" class="tab-content {{ $activeTab == 'tab-' . $category->id ? '' : 'hidden' }} pl-6 pr-6"> --}}
                                <div id="tab-{{ $category->id }}"
                                    class="tab-content {{ $category->id == $currentCategoryId ? '' : 'hidden' }} }} pl-6 pr-6">
                                    <div>
                                        <h3 class="pb-3 font-semibold text-md light-text-black">{{ $category->name }}
                                        </h3>
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                        @if (isset($subscriptions[$category->id]) && count($subscriptions[$category->id]) > 0)
                                            @foreach ($subscriptions[$category->id] as $subscription)
                                                <div
                                                    id="subscription-card-{{ $subscription->id }}"class="light-bg-f5f5f5 light-bg-seo p-6 rounded-xl shadow-sm flex flex-col relative overflow-hidden mb-8 subscription-card">
                                                    <div class="flex items-center mb-10 justify-between">
                                                        <h3 class="subscription_tag openModal cursor-pointer text-md font-normal text-black w-32 p-3 rounded-full text-center light-bg-d7d7d7 light-text-black"
                                                            data-sub-detail-id="{{ $subscription->id }}">
                                                            {{ $subscription->subscription_tag }}
                                                        </h3>
                                                        <div class="w-16 flex justify-end">
                                                            <label class="toggle-switch">
                                                                <input type="checkbox" disabled class="toggle-input"
                                                                    {{ $subscription->sub_category ? 'checked' : '' }}>
                                                                <span class="toggle-slider"></span>
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <p
                                                        class=" text-5xl font-medium light-text-black mb-2 flex items-center">

                                                        $<span
                                                            class="price text-5xl font-medium">{{ number_format($subscription->price, 0) }}</span>

                                                        <span class="light-text-black ml-1 text-sm font-light"
                                                            style="color:#AFAFAF;">/month</span>
                                                    </p>

                                                    <p class="subscription_name light-text-black text-sm font-bold mb-2"
                                                        style="font-size: 12px; font-weight: 600;">
                                                        {{ $subscription->subscription_name }}</p>
                                                    <p class="tagline text-xs text-gray-400 font-medium mb-6">
                                                        {{ $subscription->tagline }}</p>

                                                    <div
                                                        class="flex items-center justify-between border-t dark-border-gray-500 pt-5">
                                                        <div class="w-1/2 pr-2">

                                                            <button data-sub-id="{{ $subscription->id }}"
                                                                class="w-full bg-[#E600020D] border border-orange-800 px-5 py-1 text-white rounded-md text-md delete-sub">Delete</button>

                                                        </div>
                                                        <div class="w-1/2 pl-2">
                                                            <button
                                                                class="openEditSubscriptionModal w-full px-5 py-1 light-text-black light-bg-d7d7d7 border border-gray-200 dark:border-gray-500 bg-transparent rounded-md text-md edit-sub"
                                                                data-edit-id="{{ $subscription->id }}">Edit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <p>No subscriptions found.</p>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
        </main>
    </div>






    <!-- Modal Background -->
    <div id="modal" class="hidden fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50">
        <div class="light-bg-f5f5f5 light-bg-seo text-white rounded-lg w-[90%] md:w-[850px] relative p-6 md:flex">

            <!-- Left Section (40%) -->
            <div class="md:w-[40%] pr-6 border-r border-gray-700">
                <span class="light-bg-d7d7d7 light-text-white text-sm px-3 py-1 rounded-full">Starter SEO</span>
                <h2 class="text-5xl light-text-black font-medium mt-4">$19 <span class="text-xl font-normal">/
                        month</span></h2>

                <h3 class="font-semibold light-text-black mt-6">Foundation & Fixes</h3>
                <p class="text-gray-400 text-sm mt-2">All the basic features to boost your freelance career</p>
                <ul class="text-sm mt-4 list-disc list-inside text-gray-300">
                    <li>Best for new or small business websites</li>
                </ul>

                <button class="bg-orange-600 hover:bg-orange-700 text-white w-full py-3 rounded-lg mt-6 font-semibold">
                    Buy Now
                </button>
            </div>

            <!-- Right Section (60%) -->
            <div class="md:w-[60%] pl-6 mt-6 md:mt-0">
                <h4 class="font-semibold light-text-black mb-4">What's Included</h4>
                <ul class="space-y-3">
                    <li class="flex items-start">
                        <span class="flex-shrink-0 flex items-center justify-center w-5 h-5 mr-2 mt-0.5">
                            <img src="modal-check.svg" class="w-full h-full" alt="✓">
                        </span>
                        <span class="light-text-black">Full technical SEO audit (crawlability, speed,
                            mobile-friendliness)</span>
                    </li>

                    <li class="flex items-start">
                        <span class="flex-shrink-0 flex items-center justify-center w-5 h-5 mr-2 mt-0.5">
                            <img src="modal-check.svg" class="w-full h-full" alt="✓">
                        </span>
                        <span class="light-text-black">On-page optimization (meta titles, descriptions, H1s, alt
                            text)</span>
                    </li>

                    <li class="flex items-start">
                        <span class="flex-shrink-0 flex items-center justify-center w-5 h-5 mr-2 mt-0.5">
                            <img src="modal-check.svg" class="w-full h-full" alt="✓">
                        </span>
                        <span class="light-text-black">Indexing setup (robots.txt, sitemap.xml, Search Console)</span>
                    </li>

                    <li class="flex items-start">
                        <span class="flex-shrink-0 flex items-center justify-center w-5 h-5 mr-2 mt-0.5">
                            <img src="modal-check.svg" class="w-full h-full" alt="✓">
                        </span>
                        <span class="light-text-black">Basic schema implementation (Organization, Service,
                            Product)</span>
                    </li>

                    <li class="flex items-start">
                        <span class="flex-shrink-0 flex items-center justify-center w-5 h-5 mr-2 mt-0.5">
                            <img src="modal-check.svg" class="w-full h-full" alt="✓">
                        </span>
                        <span class="light-text-black">5 core keywords targeted</span>
                    </li>

                    <li class="flex items-start">
                        <span class="flex-shrink-0 flex items-center justify-center w-5 h-5 mr-2 mt-0.5">
                            <img src="modal-check.svg" class="w-full h-full" alt="✓">
                        </span>
                        <span class="light-text-black">Monthly performance snapshot</span>
                    </li>
                </ul>
            </div>

            <!-- Close Button -->
            <button id="closeModal"
                class="absolute top-4 right-4 text-gray-400 hover:text-white text-xl rounded-full hover:  hover:bg-gray-500 px-2 ">&times;</button>
        </div>
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
            const modal = document.getElementById('modal');
            const openModalButtons = document.querySelectorAll('.openModal');
            const closeModal = document.getElementById('closeModal');

            // Attach click event to all buttons with class 'openModal'
            openModalButtons.forEach(btn => {
                btn.addEventListener('click', () => {
                    modal.classList.remove('hidden');
                });
            });

            closeModal.addEventListener('click', () => {
                modal.classList.add('hidden');
            });

            window.addEventListener('click', (e) => {
                if (e.target === modal) {
                    modal.classList.add('hidden');
                }
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
                        'bg-gray-500',
                        'rounded-full',
                        'light-hover-bg-gray-300'
                    );
                });
                tabButtons.forEach(button => {
                    button.classList.remove(
                        'text-black',
                        'dark:text-white'
                    );
                    button.classList.add(
                        'light-text-gray-500',
                        'dark:text-gray-400'
                    );
                });

                // Activate the selected tab
                const selectedTab = document.querySelector(`.tab-btn[data-tab="${tabId}"]`);
                if (selectedTab) {
                    const wrapper = selectedTab.closest('.tab-wrapper');
                    const content = document.getElementById(`${tabId}Content`);

                    if (wrapper) {
                        wrapper.classList.add(
                            'active',
                            'bg-gray-500',
                            'rounded-full'
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

            // Activate first tab by default if none are active
            const activeTabs = document.querySelectorAll('.tab-wrapper.active');
            if (activeTabs.length === 0 && tabButtons.length > 0) {
                activateTab(tabButtons[0].getAttribute('data-tab'));
            }
        });
    </script>
</body>

</html>

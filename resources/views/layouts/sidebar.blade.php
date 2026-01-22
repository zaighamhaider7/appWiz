<style>
    /* Custom class for dark mode active button */
    .sidebar-link-dark-active {
        background-color: #2c1e17 !important;
        border-left: 2px solid #ff7a00 !important;
        border-right: 2px solid #ff7a00 !important;
        color: #ffffff !important;
        border-radius: 0.5rem;
    }
</style>

<aside
    class="fixed top-0 left-0 h-full w-full light-bg-f5f5f5 light-bg-seo p-10 z-50 transition-transform duration-300
              transform -translate-x-full
              md:relative md:transform-none md:h-auto md:translate-x-0 md:w-64"
    id="sidebar">


    <!-- Logo -->

    <div class="mb-8 pl-4 flex justify-between">
        <div>
            <img src="{{ asset('assets/Frame 2147224409.png') }}" alt="WIZSPEED Logo" class="h-14 light-mode-logo"
                data-dark-src="{{ asset('assets/wizspeed-white2-2-1 1.png') }}">
        </div>

        <div><button id="hamburgerOpen" class="hamburger-menu lg:hidden " aria-label="Toggle navigation">
                <svg class="hamburger-icon" viewBox="0 0 24 24" width="24" height="24">
                    <path d="M3 12h18" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                    <path d="M3 6h18" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                    <path d="M3 18h18" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                </svg>
            </button></div>
    </div>

    <!-- Navigation -->
    <div class="flex flex-col h-full">
        <div>
            <nav class="flex-grow">
                <ul>
                    <li class="mb-2">
                        <a href="{{ route('dashboard') }}"
                            class="flex items-center gap-3 p-3 rounded-lg transition-colors dashboard-link sidebar-link">
                            <img src="{{ asset('assets/home-DARK.svg') }}" alt="icon"
                                class="w-8 h-6 light-mode-icon" data-dark-src="{{ asset('assets/home-DARK.svg') }}">
                            <span class="font-semibold">Dashboard</span>
                        </a>
                    </li>
                    @if (auth()->user()->role_id == 1)
                        <li class="mb-2">
                            <a href="{{ route('clients') }}"
                                class="flex items-center p-3 rounded-lg light-text-gray-700 light-hover-bg-gray-200 transition-colors sidebar-link">
                                <img src="{{ asset('assets/uni-01.svg') }}" alt="icon"
                                    class="w-8 h-6 light-mode-icon"
                                    data-dark-src="{{ asset('assets/uni-01-DARK.svg') }}">
                                Clients
                            </a>
                        </li>
                    @endif

                    @if (auth()->user()->role_id == 1)
                        <li class="mb-2">
                            <a href="{{ route('task.view') }}"
                                class="flex whitespace-nowrap items-center p-3 rounded-lg light-text-gray-700 light-hover-bg-gray-200 transition-colors sidebar-link">
                                <img src="{{ asset('assets/book.svg') }}" alt="icon" class="w-8 h-6 light-mode-icon"
                                    data-dark-src="{{ asset('assets/archive-book-DARK.svg') }}">
                                Task Management
                            </a>
                        </li>
                    @endif
                    <li class="mb-2">
                        <a href="{{ route('project.create') }}"
                            class="flex items-center p-3 rounded-lg light-text-gray-700 light-hover-bg-gray-200 transition-colors sidebar-link">
                            <img src="{{ asset('assets/task-square.svg') }}" alt="icon"
                                class="w-8 h-6 light-mode-icon"
                                data-dark-src="{{ asset('assets/task-square-DARK.svg') }}">
                            Projects
                        </a>
                    </li>
                    @if (auth()->user()->role_id == 1)
                        <li class="mb-2 pl-2">
                            <a href="{{ route('leads') }}"
                                class="flex items-center p-3 rounded-lg light-text-gray-700 light-hover-bg-gray-200 transition-colors sidebar-link">
                                <img src="{{ asset('assets/20.svg') }}" alt="icon" class="w-5 h-6 light-mode-icon"
                                    data-dark-src="{{ asset('assets/20-DARK.svg') }}">
                                <span class="p-1">Leads</span>
                            </a>
                        </li>
                    @endif
                    <li class="mb-2">
                        <a href="{{ route('ticket.view') }}"
                            class="flex items-center p-3 rounded-lg light-text-gray-700 light-hover-bg-gray-200 transition-colors sidebar-link">
                            <img src="{{ asset('assets/ticket-svgrepo-com.svg') }}" alt="icon"
                                class="w-8 h-6 light-mode-icon"
                                data-dark-src="{{ asset('assets/ticket-svgrepo-com-DARK.svg') }}">
                            Tickets
                        </a>
                    </li>
                    @if (auth()->user()->role_id == 2)
                        <li class="mb-2">
                            <a href="{{ route('billing') }}"
                                class="flex items-center p-3 rounded-lg light-text-gray-700 light-hover-bg-gray-200 transition-colors sidebar-link">
                                <img src="{{ asset('assets/bill-DARK.svg') }}" alt="icon"
                                    class="w-8 h-6 light-mode-icon"
                                    data-dark-src="{{ asset('assets/bill-DARK.svg') }}">
                                Billing
                            </a>
                        </li>
                    @endif
                    <li class="mb-2 ">
                        <a href="{{ route('analytics') }}"
                            class="flex items-center p-3 rounded-lg light-text-gray-700 light-hover-bg-gray-200 transition-colors sidebar-link">
                            <img src="{{ asset('assets/chart-bar.svg') }}" alt="icon"
                                class="w-8 h-6 light-mode-icon"
                                data-dark-src="{{ asset('assets/chart-bar-DARK.svg') }}">
                            Analytics
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('marketplace.view') }}"
                            class="flex items-center p-3 rounded-lg light-text-gray-700 light-hover-bg-gray-200 transition-colors sidebar-link">
                            <img src="{{ asset('assets/Frame.svg') }}" alt="icon" class="w-8 h-6 light-mode-icon"
                                data-dark-src="{{ asset('assets/Frame-DARK.svg') }}">
                            Marketplace
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('profile.edit') }}"
                            class="flex items-center p-3 rounded-lg light-text-gray-700 light-hover-bg-gray-200 transition-colors sidebar-link">
                            <img src="{{ asset('assets/settings.svg') }}" alt="icon"
                                class="w-8 h-6 light-mode-icon"
                                data-dark-src="{{ asset('assets/settings-DARK.svg') }}">
                            Settings
                        </a>
                    </li>
                </ul>
                <div class="my-4 border-t border-gray-200"></div>
                <p class="text-xs text-gray-400 uppercase tracking-wider mb-2 pl-3">Misc</p>
                <ul>
                    <li class="mb-2">
                        <a href="#"
                            class="flex items-center p-3 rounded-lg light-text-gray-700 light-hover-bg-gray-200 transition-colors sidebar-link">
                            <img src="headphones.svg" alt="icon" class="w-8 h-6 light-mode-icon"
                                data-dark-src="{{ asset('assets/headphones-DARK.svg') }}">
                            Support
                        </a>
                    </li>

                </ul>
            </nav>
        </div>



        <!-- Logout -->
        <div class="mt-auto pt-4">
            <a href="#" id="knowledgeButton"
                class="flex items-center p-3 rounded-lg light-text-gray-700 light-hover-bg-gray-200 transition-colors sidebar-link">
                <img src="fi_2961545.svg" alt="icon" class="w-8 h-6 light-mode-icon"
                    data-dark-src="{{ asset('assets/fi_2961545-DARK.svg') }}">
                Knowledge
            </a>
        </div>
        <div class="pt-4">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                    class="flex items-center p-3 rounded-lg light-text-gray-700 light-hover-bg-gray-200 transition-colors sidebar-link">
                    <img src="logout.svg" alt="icon" class="w-8 h-6 light-mode-icon"
                        data-dark-src="{{ asset('assets/logout-DARK.svg') }}">
                    Logout
                </button>
            </form>
        </div>
    </div>
</aside>
{{-- <script>
    document.addEventListener("DOMContentLoaded", function() {
        const links = document.querySelectorAll(".sidebar-link");

        // Detect dark mode from Tailwind 'dark' class or media query
        const isDarkMode = () =>
            document.documentElement.classList.contains("dark") ||
            window.matchMedia("(prefers-color-scheme: dark)").matches;

        // Remove active classes
        function resetActiveLinks() {
            links.forEach(link => {
                link.classList.remove("bg-orange-500", "text-white", "font-semibold", "shadow-md",
                    "sidebar-link-dark-active");
                link.style.border = "";
            });
        }

        // Apply correct active styles
        function applyActiveStyles(link) {
            if (isDarkMode()) {
                link.classList.add("sidebar-link-dark-active");
            } else {
                link.classList.add("bg-orange-500", "text-white", "font-semibold", "shadow-md");
            }
        }

        // On load: restore from localStorage
        const activeHref = localStorage.getItem("activeLink");
        if (activeHref) {
            const activeLink = Array.from(links).find(link => link.getAttribute("href") === activeHref);
            if (activeLink) applyActiveStyles(activeLink);
        }

        // On click: update styles + localStorage
        links.forEach(link => {
            link.addEventListener("click", function() {
                resetActiveLinks();
                applyActiveStyles(this);
                localStorage.setItem("activeLink", this.getAttribute("href"));
            });
        });
    });
</script> --}}


<script>
document.addEventListener("DOMContentLoaded", function () {
    const links = document.querySelectorAll(".sidebar-link");

    // Detect dark mode from Tailwind 'dark' class or media query
    const isDarkMode = () =>
        document.documentElement.classList.contains("dark") ||
        window.matchMedia("(prefers-color-scheme: dark)").matches;

    // Remove active classes
    function resetActiveLinks() {
        links.forEach(link => {
            link.classList.remove("bg-orange-500", "text-white", "font-semibold", "shadow-md", "sidebar-link-dark-active");
            link.style.border = "";
        });
    }

    // Apply correct active styles
    function applyActiveStyles(link) {
        if (isDarkMode()) {
            link.classList.add("sidebar-link-dark-active");
        } else {
            link.classList.add("bg-orange-500", "text-white", "font-semibold", "shadow-md");
        }
    }

    // On load: restore from localStorage
    const activeHref = localStorage.getItem("activeLink");
    if (activeHref) {
        const activeLink = Array.from(links).find(link => link.getAttribute("href") === activeHref);
        if (activeLink) applyActiveStyles(activeLink);
    }

    // On click: update styles + localStorage
    links.forEach(link => {
        link.addEventListener("click", function () {
            resetActiveLinks();
            applyActiveStyles(this);
            localStorage.setItem("activeLink", this.getAttribute("href"));
        });
    });
});
</script>
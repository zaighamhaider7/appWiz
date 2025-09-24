<aside class="fixed top-0 left-0 h-full w-full light-bg-f5f5f5 light-bg-seo p-10 z-50 transition-transform duration-300
              transform -translate-x-full
              md:relative md:transform-none md:h-auto md:translate-x-0 md:w-64"
       id="sidebar">
            
            
            <!-- Logo -->
            
            <div class="mb-8 pl-4 flex justify-between">
                <div>
                <img src="{{ asset('assets/Frame 2147224409.png') }}" alt="WIZSPEED Logo" class="h-14 light-mode-logo" data-dark-src="wizspeed-white2-2-1 1.png">
                </div>
                
                <div><button id="hamburgerOpen" class="hamburger-menu lg:hidden " aria-label="Toggle navigation">
                <svg class="hamburger-icon" viewBox="0 0 24 24" width="24" height="24">
                    <path d="M3 12h18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    <path d="M3 6h18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    <path d="M3 18h18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                </svg>
            </button></div>
            </div>

            <!-- Navigation -->
             <div class="flex flex-col h-full">
             <div>
            <nav class="flex-grow">
                <ul>
                    <li class="mb-2">
                        <!-- Light Mode Version (hidden in dark mode) -->
                        <div class="light-mode-item">
                            <a href="{{ route('dashboard') }}" class="flex items-center p-3 rounded-lg bg-orange-500 text-white font-semibold shadow-md">
                            <img src="{{ asset('assets/home-DARK.svg') }}" alt="icon" class="w-8 h-6 light-mode-icon">
                            Dashboard
                            </a>
                        </div>

                        <!-- Dark Mode Version (hidden in light mode) -->
                        <div class="dark-mode-item hidden">
                            <div class="w-fit rounded-md px-0.5 bg-orange-500 shadow-md">
                            <a href="{{ route('dashboard') }}" class="bg-[#2c1e17] rounded-md px-6 py-3 flex items-center gap-3">
                                <img src="{{ asset('assets/home-DARK.svg') }}" alt="icon" class="w-8 h-6 light-mode-icon">
                                <span class="text-white font-semibold text-lg">Dashboard</span>
                            </a>
                            </div>
                        </div>
                        </li>
                        <li class="mb-2">
                        <a href="clients.php" class="flex items-center p-3 rounded-lg light-text-gray-700 light-hover-bg-gray-200 transition-colors">
                            <img src="{{ asset('assets/uni-01.svg') }}" alt="icon" class="w-8 h-6 light-mode-icon" data-dark-src="uni-01-DARK.svg">
                            Clients
                        </a>
                    </li>
                        <li class="mb-2">
                        <a href="task-management.php" class="flex whitespace-nowrap items-center p-3 rounded-lg light-text-gray-700 light-hover-bg-gray-200 transition-colors">
                            <img src="{{ asset('assets/book.svg') }}" alt="icon" class="w-8 h-6 light-mode-icon" data-dark-src="archive-book-DARK.svg">
                            Task Management
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('project.create') }}" class="flex items-center p-3 rounded-lg light-text-gray-700 light-hover-bg-gray-200 transition-colors">
                            <img src="{{ asset('assets/task-square.svg') }}" alt="icon" class="w-8 h-6 light-mode-icon" data-dark-src="task-square-DARK.svg">
                            Projects
                        </a>
                    </li>
                    <li class="mb-2 pl-2">
                        <a href="Leads.php" class="flex items-center p-3 rounded-lg light-text-gray-700 light-hover-bg-gray-200 transition-colors">
                            <img src="{{ asset('assets/20.svg') }}" alt="icon" class="w-5 h-6 light-mode-icon" data-dark-src="20-DARK.svg">
                            <span class="p-1">Leads</span>
                        </a>
                    </li>
                     <li class="mb-2">
                        <a href="tickets.php" class="flex items-center p-3 rounded-lg light-text-gray-700 light-hover-bg-gray-200 transition-colors">
                            <img src="{{ asset('assets/ticket-svgrepo-com.svg') }}" alt="icon" class="w-8 h-6 light-mode-icon" data-dark-src="ticket-svgrepo-com-DARK.svg">
                            Tickets
                        </a>
                    </li>
                    <li class="mb-2 ">
                        <a href="{{ route('analytics') }}" class="flex items-center p-3 rounded-lg light-text-gray-700 light-hover-bg-gray-200 transition-colors">
                            <img src="{{ asset('assets/chart-bar.svg') }}" alt="icon" class="w-8 h-6 light-mode-icon" data-dark-src="chart-bar-DARK.svg">
                            Analytics
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="marketplace.php" class="flex items-center p-3 rounded-lg light-text-gray-700 light-hover-bg-gray-200 transition-colors">
                            <img src="{{ asset('assets/Frame.svg') }}" alt="icon" class="w-8 h-6 light-mode-icon" data-dark-src="Frame-DARK.svg">
                            Marketplace
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('profile.edit') }}" class="flex items-center p-3 rounded-lg light-text-gray-700 light-hover-bg-gray-200 transition-colors">
                            <img src="{{ asset('assets/settings.svg') }}" alt="icon" class="w-8 h-6 light-mode-icon" data-dark-src="settings-DARK.svg">
                            Settings
                        </a>
                    </li>
                </ul>
                <div class="my-4 border-t border-gray-200"></div>
                <p class="text-xs text-gray-400 uppercase tracking-wider mb-2 pl-3">Misc</p>
                <ul>
                    <li class="mb-2">
                    <a href="#" class="flex items-center p-3 rounded-lg light-text-gray-700 light-hover-bg-gray-200 transition-colors">
                        <img src="headphones.svg" alt="icon" class="w-8 h-6 light-mode-icon" data-dark-src="headphones-DARK.svg">
                        Support
                    </a>
                    </li>

                </ul>
            </nav>
            </div>
            
             

            <!-- Logout -->
            <div class="mt-auto pt-4">
                <a href="#" id="knowledgeButton" class="flex items-center p-3 rounded-lg light-text-gray-700 light-hover-bg-gray-200 transition-colors">
                    <img src="fi_2961545.svg" alt="icon" class="w-8 h-6 light-mode-icon" data-dark-src="fi_2961545-DARK.svg">
                    Knowledge
                </a>
            </div>
            <div class="pt-4">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="flex items-center p-3 rounded-lg light-text-gray-700 light-hover-bg-gray-200 transition-colors">
                        <img src="logout.svg" alt="icon" class="w-8 h-6 light-mode-icon" data-dark-src="logout-DARK.svg">
                        Logout
                    </button>
                </form>
            </div>
            </div>
        </aside>
        <script>
  document.addEventListener("DOMContentLoaded", function () {
    const links = document.querySelectorAll("#sidebar nav a");

    links.forEach(link => {
      link.addEventListener("click", function (e) {
        // Remove 'active' styles from all links
        links.forEach(l => {
          l.classList.remove("bg-orange-500", "text-white", "font-semibold", "shadow-md");
        });

        // Add 'active' styles to clicked link
        this.classList.add("bg-orange-500", "text-white", "font-semibold", "shadow-md");
      });
    });
  });
</script>

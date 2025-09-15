
  <aside class="w-64 light-bg-f5f5f5 light-bg-seo shadow-lg p-6 flex flex-col rounded-tr-xl rounded-br-xl sticky top-0 h-screen overflow-y-auto sidebar">
            
            <div class="flex-col justify-between">
            <div class="flex-col">
            <!-- Logo -->
        
            <div class="mb-8 pl-4">
                <img src="{{asset('assets/Frame 2147224409.png')}}" alt="WIZSPEED Logo" class="h-14 light-mode-logo" data-dark-src="{{asset('assets/wizspeed-white2-2-1 1.png')}}">
            </div>

            <!-- Navigation -->
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
                        <a href="{{ route('project.create') }}" class="flex items-center p-3 rounded-lg light-text-gray-700 light-hover-bg-gray-200 transition-colors">
                            <img src="{{ asset('assets/task-square.svg') }}" alt="icon" class="w-8 h-6 light-mode-icon" data-dark-src="{{asset('assets/task-square-DARK.svg')}}">
                            Projects
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="analytics.html" class="flex items-center p-3 rounded-lg light-text-gray-700 light-hover-bg-gray-200 transition-colors">
                            <img src="{{ asset('assets/chart-bar.svg') }}" alt="icon" class="w-8 h-6 light-mode-icon" data-dark-src="{{asset('assets/chart-bar-DARK.svg')}}">
                            Analytics
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="tickets.html" class="flex items-center p-3 rounded-lg light-text-gray-700 light-hover-bg-gray-200 transition-colors">
                            <img src="{{ asset('assets/ticket-svgrepo-com.svg') }}" alt="icon" class="w-8 h-6 light-mode-icon" data-dark-src="{{asset('assets/ticket-svgrepo-com-DARK.svg')}}">
                            Tickets
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="billings.html" class="flex items-center p-3 rounded-lg light-text-gray-700 light-hover-bg-gray-200 transition-colors">
                            <img src="{{ asset('assets/bill.svg') }}" alt="icon" class="w-8 h-6 light-mode-icon" data-dark-src="{{ asset('assets/bill-DARK.svg') }}">
                            Billing
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="marketplace.html" class="flex items-center p-3 rounded-lg light-text-gray-700 light-hover-bg-gray-200 transition-colors">
                            <img src="{{asset('assets/Frame.svg')}}" alt="icon" class="w-8 h-6 light-mode-icon" data-dark-src="{{asset('assets/Frame-DARK.svg')}}">
                            Marketplace
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="settings.html" class="flex items-center p-3 rounded-lg light-text-gray-700 light-hover-bg-gray-200 transition-colors">
                            <img src="{{asset('assets/settings.svg')}}" alt="icon" class="w-8 h-6 light-mode-icon" data-dark-src="{{asset('assets/settings-DARK.svg')}}">
                            Settings
                        </a>
                    </li>
                </ul>
                <div class="my-4 border-t border-gray-200"></div>
                <p class="text-xs text-gray-400 uppercase tracking-wider mb-2 pl-3">Misc</p>
                <ul>
                    <li class="mb-2">
                    <a href="#" class="flex items-center p-3 rounded-lg light-text-gray-700 light-hover-bg-gray-200 transition-colors">
                        <img src="{{asset('assets/headphones.svg')}}" alt="icon" class="w-8 h-6 light-mode-icon" data-dark-src="{{asset('assets/headphones-DARK.svg')}}">
                        Support
                    </a>
                    </li>

                </ul>
            </nav>
            </div>
            
            <div class="h-[900px]">
                
            </div>
            
            <div>

            <!-- Logout -->
            <div class="mt-auto pt-4">
                <a href="#" id="knowledgeButton" class="flex items-center p-3 rounded-lg light-text-gray-700 light-hover-bg-gray-200 transition-colors">
                    <img src="{{asset('assets/fi_2961545.svg')}}" alt="icon" class="w-8 h-6 light-mode-icon" data-dark-src="{{asset('assets/fi_2961545-DARK.svg')}}">
                    Knowledge
                </a>
            </div>
            <div class="pt-4">
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button type="submit" class="flex items-center p-3 rounded-lg light-text-gray-700 light-hover-bg-gray-200 transition-colors">
                    <img src="{{asset('assets/logout.svg')}}" alt="icon" class="w-8 h-6 light-mode-icon" data-dark-src="{{asset('assets/logout-DARK.svg')}}">
                    Logout
                    </button>
                </form>
            </div>
            </div>
            </div>
        </aside>

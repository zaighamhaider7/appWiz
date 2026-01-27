<style>
    #myInput {
        background-image: url('/css/searchicon.png');
        background-position: 10px 12px;
        background-repeat: no-repeat;
        width: 100%;
        font-size: 16px;
        padding: 12px 20px 12px 40px;
        border: 1px solid #171717;
    }

    #myUL {
        list-style-type: none;
        padding: 0;
        margin: 0;
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background: #171717;
        z-index: 10;
        border: 1px solid #171717;
        max-height: 200px;
        overflow-y: auto;
        border-top-left-radius: 0px;
        border-top-right-radius: 0px;
        border-bottom-right-radius: 8px;
        border-bottom-left-radius: 8px;
    }

    #myUL li a {
        border-bottom: 1px solid #171717;
        background-color: #171717;
        padding: 12px;
        text-decoration: none;
        font-size: 18px;
        color: white;
        display: flex;
        border-top-left-radius: 0px;
        border-top-right-radius: 0px;
        border-bottom-right-radius: 8px;
        border-bottom-left-radius: 8px;
    }

    #myUL li a:hover:not(.header) {
        background-color: #191919;
    }

    #myUL li a:hover:not(.header) {
        background-color: #191919;
    }
</style>



<header class="flex items-center justify-between light-bg-f5f5f5 light-bg-seo p-5 shadow-sm mb-2 header">
    <div class="relative w-full max-w-md">
        <!-- Search Input -->
        <input type="text" id="myInput" onkeyup="myFunction()"
            class="w-full pl-10 pr-4 py-2 rounded-lg light-border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent"
            placeholder="Search..." />

        <!-- Search Icon -->
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <svg class="icon text-gray-400 w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2">
                <circle cx="11" cy="11" r="8"></circle>
                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            </svg>
        </div>

        <ul id="myUL" class="w-full">
            <!-- Repeatable Item Template -->
            <li>
                <a href="{{ route('dashboard') }}"
                    class="flex justify-between items-center px-4 py-3 text-white bg-[#171717] border-b border-[#171717] hover:bg-[#191919] group">
                    <div class="flex items-center gap-2">
                        <img class="w-5 h-5 shrink-0" src="{{ asset('assets/home-DARK.svg') }}" alt="Dashboard Icon" />
                        <span class="text-sm truncate group-hover:text-orange-500">Dashboard</span>
                    </div>
                    <div>
                        <span class="text-white group-hover:text-orange-500 text-2xl transition-all shrink-0">></span>
                    </div>
                </a>
            </li>
            @if (auth()->user()->role_id == 1)
                <li>
                    <a href="{{ route('clients') }}"
                        class="flex justify-between items-center px-4 py-3 text-white bg-[#171717] border-b border-[#171717] hover:bg-[#191919] group">
                        <div class="flex items-center gap-2">
                            <img class="w-5 h-5 shrink-0" src="{{ asset('assets/uni-01-DARK.svg') }}"
                                alt="Clients Icon" />
                            <span class="text-sm truncate group-hover:text-orange-500">Clients</span>
                        </div>
                        <span class="text-white group-hover:text-orange-500 text-2xl  transition-all shrink-0">></span>
                    </a>
                </li>
            @endif

            @if (auth()->user()->role_id == 1)
                <li>
                    <a href="{{ route('task.view') }}"
                        class="flex justify-between items-center px-4 py-3 text-white bg-[#171717] border-b border-[#171717] hover:bg-[#191919] group">
                        <div class="flex items-center gap-2">
                            <img class="w-5 h-5 shrink-0" src="{{ asset('assets/archive-book-DARK.svg') }}"
                                alt="Task Icon" />
                            <span class="text-sm truncate group-hover:text-orange-500">Task Management</span>
                        </div>
                        <span class="text-white group-hover:text-orange-500 text-2xl  transition-all shrink-0">></span>
                    </a>
                </li>
            @endif

            <li>
                <a href="{{ route('project.create') }}"
                    class="flex justify-between items-center px-4 py-3 text-white bg-[#171717] border-b border-[#171717] hover:bg-[#191919] group">
                    <div class="flex items-center gap-2">
                        <img class="w-5 h-5 shrink-0" src="{{ asset('assets/task-square-DARK.svg') }}"
                            alt="Projects Icon" />
                        <span class="text-sm truncate group-hover:text-orange-500">Projects</span>
                    </div>
                    <span class="text-white group-hover:text-orange-500 text-2xl  transition-all shrink-0">></span>
                </a>
            </li>

            @if (auth()->user()->role_id == 1)
                <li>
                    <a href="{{ route('leads') }}"
                        class="flex justify-between items-center px-4 py-3 text-white bg-[#171717] border-b border-[#171717] hover:bg-[#191919] group">
                        <div class="flex items-center gap-2">
                            <img class="w-5 h-5 shrink-0" src="{{ asset('assets/20-DARK.svg') }}" alt="Leads Icon" />
                            <span class="text-sm truncate group-hover:text-orange-500">Leads</span>
                        </div>
                        <span class="text-white group-hover:text-orange-500 text-2xl  transition-all shrink-0">></span>
                    </a>
                </li>
            @endif

            <li>
                <a href="{{ route('ticket.view') }}"
                    class="flex justify-between items-center px-4 py-3 text-white bg-[#171717] border-b border-[#171717] hover:bg-[#191919] group">
                    <div class="flex items-center gap-2">
                        <img class="w-5 h-5 shrink-0" src="{{ asset('assets/ticket-svgrepo-com-DARK.svg') }}"
                            alt="Tickets Icon" />
                        <span class="text-sm truncate group-hover:text-orange-500">Tickets</span>
                    </div>
                    <span class="text-white group-hover:text-orange-500 text-2xl  transition-all shrink-0">></span>
                </a>
            </li>

            <li>
                <a href="{{ route('analytics') }}"
                    class="flex justify-between items-center px-4 py-3 text-white bg-[#171717] border-b border-[#171717] hover:bg-[#191919] group">
                    <div class="flex items-center gap-2">
                        <img class="w-5 h-5 shrink-0" src="{{ asset('assets/chart-bar-DARK.svg') }}"
                            alt="Analytics Icon" />
                        <span class="text-sm truncate group-hover:text-orange-500">Analytics</span>
                    </div>
                    <span class="text-white group-hover:text-orange-500 text-2xl  transition-all shrink-0">></span>
                </a>
            </li>

            <li>
                <a href="{{ route('marketplace.view') }}"
                    class="flex justify-between items-center px-4 py-3 text-white bg-[#171717] border-b border-[#171717] hover:bg-[#191919] group">
                    <div class="flex items-center gap-2">
                        <img class="w-5 h-5 shrink-0" src="{{ asset('assets/Frame-DARK.svg') }}"
                            alt="Marketplace Icon" />
                        <span class="text-sm truncate group-hover:text-orange-500">Marketplace</span>
                    </div>
                    <span class="text-white group-hover:text-orange-500 text-2xl transition-all shrink-0">></span>
                </a>
            </li>

            <li>
                <a href="{{ route('profile.edit') }}"
                    class="flex justify-between items-center px-4 py-3 text-white bg-[#171717] hover:bg-[#191919] group">
                    <div class="flex items-center gap-2">
                        <img class="w-5 h-5 shrink-0" src="{{ asset('assets/settings-DARK.svg') }}"
                            alt="Settings Icon" />
                        <span class="text-sm truncate group-hover:text-orange-500">Settings</span>
                    </div>
                    <span class="text-white group-hover:text-orange-500 text-2xl  transition-all shrink-0">></span>
                </a>
            </li>

            @if (auth()->user()->role_id == 2)
                <li>
                    <a href="{{ route('billing') }}"
                        class="flex justify-between items-center px-4 py-3 text-white bg-[#171717] hover:bg-[#191919] group">
                        <div class="flex items-center gap-2">
                            <img class="w-5 h-5 shrink-0" src="{{ asset('assets/bill-DARK.svg') }}"
                                alt="Settings Icon" />
                            <span class="text-sm truncate group-hover:text-orange-500">Billings</span>
                        </div>
                        <span class="text-white group-hover:text-orange-500 text-2xl  transition-all shrink-0">></span>
                    </a>
                </li>
            @endif

            <li class="flex justify-between items-center px-4 py-3 text-white bg-[#171717] hover:bg-[#191919] group "
                id="noResultsItem" style="display: none;">No results found.</li>
        </ul>




    </div>

    <!-- Right Side Icons & User -->
    <div class="flex items-center space-x-4 ml-4">
        <!-- Message Button -->
        <div class="relative" id="notificationDropdown2">
            <button id="msgButton"
                class="p-2 border-2 rounded-full light-hover-bg-gray-200 transition-colors light-border-gray-300">
                <img src="{{ asset('assets/message.svg') }}" alt="icon"
                    class="w-6 h-6 light-text-gray-900 rounded-full light-mode-icon"
                    data-dark-src="{{ asset('assets/message-DARK.svg') }}">

                <span id="MsgunreadBadge"
                    class=" absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-white bg-red-600 rounded-full"
                    @if ($MsgunreadCount == 0) style="display:none;" @endif>
                    {{ $MsgunreadCount }}
                </span>
            </button>
        </div>

        <!-- Notification Button -->
        <div class="relative" id="notificationDropdown">
            <button id="notificationButton"
                class="p-2 border-2 rounded-full light-hover-bg-gray-200 transition-colors light-border-gray-300">
                <img src="{{ asset('assets/notification.svg') }}" alt="icon"
                    class="w-6 h-6 light-text-gray-900 rounded-full light-mode-icon"
                    data-dark-src="{{ asset('assets/notification-DARK.svg') }}">

                <span id="unreadBadge"  
                    class=" absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-white bg-red-600 rounded-full"
                    @if ($unreadCount == 0) style="display:none;" @endif>
                    {{ $unreadCount }}
                </span>
            </button>

            <!-- Dropdown -->
            <div id="dropdownMenu2"
                class="absolute right-5 mt-1 w-80  bg-black text-white shadow-lg rounded-lg z-50 hidden">
                <ul id="notificationList">
                    @forelse($notifications ?? [] as $notification)
                        <li data-id="{{ $notification->id }}"
                            class="notification-item cursor-pointer flex items-center  justify-between p-4 border-b {{ $notification->is_read ? 'bg-black' : 'bg-gray-800' }}">
                            {{ $notification->message }}
                            <span
                                class="text-xs text-gray-400 float-right">{{ $notification->created_at->diffForHumans() }}</span>
                        </li>
                    @empty
                        <li class="p-3 text-gray-400">No notifications</li>
                    @endforelse
                </ul>
            </div>

            <div id="dropdownMenu3"
                class="absolute right-5 mt-1 w-80  bg-black text-white shadow-lg rounded-lg z-50 hidden">
                <ul id="notificationList">
                    @forelse($Msgnotifications ?? [] as $Msgnotification)
                        <li data-id="{{ $Msgnotification->id }}"
                            class="notification-item cursor-pointer flex items-center  justify-between p-4 border-b {{ $Msgnotification->is_read ? 'bg-black' : 'bg-gray-800' }}">
                            {{ $Msgnotification->message }}
                            <span
                                class="text-xs text-gray-400 float-right">{{ $Msgnotification->created_at->diffForHumans() }}</span>
                        </li>
                    @empty
                        <li class="p-3 text-gray-400">No Messages</li>
                    @endforelse
                </ul>
            </div>
        </div>


        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const button = document.getElementById('notificationButton');
                const msgbutton = document.getElementById('msgButton');
                const dropdown2 = document.getElementById('dropdownMenu2');
                const dropdown3 = document.getElementById('dropdownMenu3');

                button.addEventListener('click', (e) => {
                    e.stopPropagation();
                    dropdown2.classList.toggle('hidden');
                });

                document.addEventListener('click', (e) => {
                    if (!document.getElementById('notificationDropdown').contains(e.target)) {
                        dropdown2.classList.add('hidden');
                    }
                });

                msgbutton.addEventListener('click', (e) => {
                    e.stopPropagation();
                    dropdown3.classList.toggle('hidden');
                });

                document.addEventListener('click', (e) => {
                    if (!document.getElementById('notificationDropdown').contains(e.target)) {
                        dropdown3.classList.add('hidden');
                    }
                });
            });
        </script>



        <!-- User Profile & Dropdown -->
        <div class="flex items-center p-1 space-x-3 rounded-full border-2 light-border-gray-300">
            <img src="{{ asset(Auth::user()->image ?? 'assets/default-prf.png') }}" alt="User Avatar"
                class="w-10 h-10 rounded-full">
            <span class="font-semibold light-text-gray-500 ">{{ Auth::user()->name }}</span>

            <div class="relative inline-block text-left">
                <!-- Dropdown Toggle -->
                <button id="dropdownToggle" class="flex items-center focus:outline-none">
                    <svg class="icon w-6 h-6 text-gray-500 hover:text-gray-700" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </button>

                <!-- Dropdown Menu -->
                <div id="dropdownMenu"
                    class="hidden absolute -right-10 mt-5 w-60 light-bg-d9d9d9 rounded-md shadow-lg z-50">
                    <a href="{{ route('profile.edit') }}"
                        class="block px-4 py-2 text-sm text-white hover:bg-gray-800">Settings</a>
                    <form action="{{ route('logout') }}" method="POST" onsubmit="localStorage.removeItem('activeLink')">
                        @csrf
                        <button type="submit"
                            class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-800">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>


<script>
    // Toggle user dropdown menu
    const toggleBtn = document.getElementById('dropdownToggle');
    const menu = document.getElementById('dropdownMenu');

    toggleBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        menu.classList.toggle('hidden');
    });

    // Hide dropdown on outside click
    document.addEventListener('click', (e) => {
        if (!toggleBtn.contains(e.target)) {
            menu.classList.add('hidden');
        }
    });



    // Search filter function
    // function myFunction() {
    //     const input = document.getElementById('myInput');
    //     const filter = input.value.toUpperCase();
    //     const ul = document.getElementById('myUL');
    //     const li = ul.getElementsByTagName('li');

    //     let hasResults = false;

    //     for (let i = 0; i < li.length; i++) {
    //         const a = li[i].getElementsByTagName("a")[0];
    //         const txtValue = a.textContent || a.innerText;
    //         if (txtValue.toUpperCase().indexOf(filter) > -1) {
    //             li[i].style.display = "";
    //             hasResults = true;
    //         } else {
    //             li[i].style.display = "none";
    //         }
    //     }

    //     ul.style.display = hasResults && input.value.trim() !== "" ? "block" : "none";
    // }



    function myFunction() {
        const input = document.getElementById('myInput');
        const filter = input.value.toUpperCase();
        const ul = document.getElementById('myUL');
        const li = ul.getElementsByTagName('li');
        const noResultsItem = document.getElementById('noResultsItem');

        let hasResults = false;

        for (let i = 0; i < li.length; i++) {
            // Skip the "no results" <li> when checking for matches
            if (li[i].id === "noResultsItem") continue;

            const a = li[i].getElementsByTagName("a")[0];
            const txtValue = a.textContent || a.innerText;

            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                li[i].style.display = "";
                hasResults = true;
            } else {
                li[i].style.display = "none";
            }
        }

        if (input.value.trim() === "") {
            ul.style.display = "none";
            noResultsItem.style.display = "none";
        } else {
            ul.style.display = "block";
            noResultsItem.style.display = hasResults ? "none" : "list-item";
        }
    }
</script>




<script>
    document.querySelectorAll('.notification-item').forEach(item => {
        item.addEventListener('click', function() {
            const id = this.dataset.id;
            const li = this;

            fetch(`/notifications/${id}/read`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        li.classList.remove('bg-gray-800');
                        li.classList.add('bg-black');

                        const unreadBadge = document.getElementById('unreadBadge');
                        if (data.unreadCount > 0) {
                            unreadBadge.textContent = data.unreadCount;
                            unreadBadge.style.display = 'inline-flex';
                        } else {
                            unreadBadge.style.display = 'none';
                        }

                        const MsgunreadBadge = document.getElementById('MsgunreadBadge');
                        if (data.MsgunreadCount > 0) {
                            MsgunreadBadge.textContent = data.MsgunreadCount;
                            MsgunreadBadge.style.display = 'inline-flex';
                        } else {
                            MsgunreadBadge.style.display = 'none';
                        }


                        // const badges = document.querySelectorAll('.unreadBadge');

                        // badges.forEach(badge => {
                        //     if (data.unreadCount > 0) {
                        //         badge.textContent = data.unreadCount;
                        //         badge.style.display = 'inline-flex';
                        //     } else {
                        //         badge.style.display = 'none';
                        //     }
                        // });

                    }
                });
        });
    });
</script>

<!-- Header -->
<header class="bg-white shadow-sm">
    <div class="flex items-center justify-between px-4 py-3">
        <!-- Left Section -->
        <div class="flex items-center space-x-4">
            <!-- Hamburger Menu (mobile only) -->
            <button id="sidebar-toggle" class="text-gray-500 hover:text-gray-700 focus:outline-none md:hidden">
                <i class="fas fa-bars text-xl"></i>
            </button>

            <!-- Search Component (moved here) -->
            @include('components.searchbar')
        </div>

        <!-- Right Section -->
        <div class="flex items-center space-x-2">
            <!-- Notification Icon -->
            <a href="#" class="text-gray-600 hover:text-gray-800 relative">
                <div class="bg-white border-2 border-gray-200 rounded-full p-2 hover:bg-gray-50 shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-500 h-6 w-6 hover:text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0a3 3 0 11-6 0h6z" />
                    </svg>
                </div>
            </a>

            <!-- Cart Icon -->
            <a href="#" class="text-gray-600 hover:text-gray-800 relative">
                <div class="bg-white border-2 border-gray-200 rounded-full p-2 hover:bg-gray-50 shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="text-gray-500 h-6 w-6 hover:text-gray-600">
                        <path stroke-linecap="round" stroke-width="2" stroke-linejoin="round"
                              d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                    </svg>
                </div>
            </a>

            <!-- Profile Component -->
            @include('components.profile')  
        </div>
    </div>
</header>

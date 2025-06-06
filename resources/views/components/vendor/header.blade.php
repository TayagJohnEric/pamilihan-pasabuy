<!-- Header -->
<header class="bg-white shadow-sm">
    <div class="flex items-center justify-between px-4 py-3">
        <!-- Left Section -->
        <div class="flex items-center space-x-4">
            <!-- Hamburger Menu (mobile only) -->
            <button id="sidebar-toggle" class="text-gray-500 hover:text-gray-700 focus:outline-none md:hidden">
                <i class="fas fa-bars text-xl"></i>
            </button>
        </div>

        <!-- Right Section -->
        <div class="flex items-center space-x-4">
            <!-- Notification Component -->
            @include('components.notification')
   
            <!-- Profile Component -->
             @include('components.profile')
       
        </div>
    </div>
</header>
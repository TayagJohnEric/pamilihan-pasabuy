<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Rider Dashboard')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Tailwind CSS CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>
    @yield('styles')

    <style>
        /* Custom styles for the layout */
        body {
            font-family: 'Inter', sans-serif;
        }
        .sidebar {
            transition: transform 0.3s ease-in-out;
        }
     </style>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen overflow-hidden relative">
        <!-- Sidebar Component -->
        @include('components.rider.sidebar')

        <!-- Backdrop overlay (shown when sidebar is open on mobile) -->
        <div id="sidebar-backdrop" class="hidden fixed inset-0 bg-black bg-opacity-50 z-40" aria-hidden="true"></div>

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Header Component -->
            @include('components.rider.header')
            
            <!-- Main Content -->
            <main class="flex-1 overflow-y-auto p-4 bg-gray-50">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- JavaScript for interactivity -->
    <script>
        // Sidebar toggle functionality for mobile
        document.addEventListener('DOMContentLoaded', function() {
            // Sidebar toggle functionality for mobile
            document.getElementById('sidebar-toggle').addEventListener('click', function() {
                const sidebar = document.getElementById('sidebar');
                const backdrop = document.getElementById('sidebar-backdrop');
                
                // Show sidebar and backdrop
                sidebar.classList.remove('hidden');
                backdrop.classList.remove('hidden');
                
                // Force reflow to enable transitions
                sidebar.offsetHeight;
                
                // Add animation if needed
                sidebar.classList.add('left-0');
            });
            
            // Close sidebar when clicking the close button
            document.getElementById('sidebar-close').addEventListener('click', function() {
                const sidebar = document.getElementById('sidebar');
                const backdrop = document.getElementById('sidebar-backdrop');
                
                sidebar.classList.add('hidden');
                backdrop.classList.add('hidden');
            });
            
            // Close sidebar when clicking the backdrop
            document.getElementById('sidebar-backdrop').addEventListener('click', function() {
                const sidebar = document.getElementById('sidebar');
                const backdrop = document.getElementById('sidebar-backdrop');
                
                sidebar.classList.add('hidden');
                backdrop.classList.add('hidden');
            });
            
            // Profile dropdown toggle
            document.getElementById('profile-menu-button').addEventListener('click', function() {
                const dropdown = document.getElementById('profile-dropdown');
                dropdown.classList.toggle('hidden');
            });
            
            // Close dropdown when clicking outside
            document.addEventListener('click', function(event) {
                const profileButton = document.getElementById('profile-menu-button');
                const dropdown = document.getElementById('profile-dropdown');
                
                if (profileButton && dropdown && !profileButton.contains(event.target) && !dropdown.contains(event.target)) {
                    dropdown.classList.add('hidden');
                }
            });
        });
    </script>
</body>
</html>
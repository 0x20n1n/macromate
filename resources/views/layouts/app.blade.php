<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MacroMate') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Dark Mode Script - Execute Immediately -->
    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.theme === 'light') {
            document.documentElement.classList.remove('dark');
            console.log('Light mode applied from localStorage');
        } else {
            // Default to dark mode if no preference is found
            document.documentElement.classList.add('dark');
            localStorage.theme = 'dark';
            console.log('Dark mode applied as default');
        }
    </script>
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen flex flex-col">
        <!-- Navigation -->
        <header class="sticky top-0 z-50 bg-header shadow transition-all duration-300 py-3" id="navbar">
            <nav class="container mx-auto px-4 flex justify-between items-center">
                <div class="flex items-center space-x-8">
                    <a href="{{ route('home') }}" class="text-xl font-bold text-brand">
                        {{ config('app.name', 'MacroMate') }}
                    </a>
                    <div class="hidden md:flex space-x-6">
                        <a href="{{ route('home') }}" class="text-secondary hover:text-brand">Home</a>
                        <a href="{{ route('calculations.create') }}" class="text-secondary hover:text-brand">Calculator</a>
                        <a href="{{ route('about') }}" class="text-secondary hover:text-brand">About</a>
                    </div>
                </div>
                
                <!-- Theme toggle -->
                <div class="flex items-center">
                    <button id="theme-toggle" class="p-2 rounded-full text-gray-500 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 transition-colors duration-300">
                        <!-- Sun icon (shown in dark mode) -->
                        <svg id="sun-icon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display: none;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        <!-- Moon icon (shown in light mode) -->
                        <svg id="moon-icon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display: none;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                        </svg>
                    </button>
                </div>
            </nav>
        </header>

        <!-- Page Content -->
        <main class="flex-grow container mx-auto px-4 py-8 bg-main">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-footer">
            <div class="container mx-auto px-4 py-6">
                <p class="text-center text-muted">&copy; {{ date('Y') }} MacroMate. All rights reserved.</p>
            </div>
        </footer>
    </div>
    
    <!-- Theme Toggle Script -->
    <script>
        // Execute as soon as possible
        (function() {
            const themeToggle = document.getElementById('theme-toggle');
            const sunIcon = document.getElementById('sun-icon');
            const moonIcon = document.getElementById('moon-icon');
            
            // Helper function to update icon visibility based on theme
            function updateIcons() {
                if (document.documentElement.classList.contains('dark')) {
                    // Dark mode - show sun icon
                    sunIcon.style.display = 'block';
                    moonIcon.style.display = 'none';
                    console.log('Dark mode active - showing sun icon');
                } else {
                    // Light mode - show moon icon
                    sunIcon.style.display = 'none';
                    moonIcon.style.display = 'block';
                    console.log('Light mode active - showing moon icon');
                }
            }
            
            // Set initial icon state
            updateIcons();
            
            // Log current theme state on load
            if (document.documentElement.classList.contains('dark')) {
                console.log('Page loaded with dark mode active');
            } else {
                console.log('Page loaded with light mode active');
            }
            
            // Ensure the toggle button works
            if (themeToggle) {
                themeToggle.addEventListener('click', function() {
                    console.log('Theme toggle clicked');
                    
                    // Toggle theme
                    if (document.documentElement.classList.contains('dark')) {
                        document.documentElement.classList.remove('dark');
                        localStorage.theme = 'light';
                        console.log('Switched to light mode');
                    } else {
                        document.documentElement.classList.add('dark');
                        localStorage.theme = 'dark';
                        console.log('Switched to dark mode');
                    }
                    
                    // Update icons for the new theme
                    updateIcons();
                });
            } else {
                console.error('Theme toggle button not found!');
            }
        })();
    </script>
    
    <!-- Sticky Navbar Script -->
    <script>
        // Add scroll behavior for the navbar
        (function() {
            const navbar = document.getElementById('navbar');
            const navLinks = document.querySelectorAll('header a.text-secondary');
            const brand = document.querySelector('header a.text-brand');
            
            window.addEventListener('scroll', function() {
                if (window.scrollY > 10) {
                    // When scrolled, make navbar more compact
                    navbar.classList.add('py-1', 'shadow-md', 'bg-white/90', 'dark:bg-gray-800/90', 'backdrop-blur-sm');
                    navbar.classList.remove('bg-header');
                    
                    // Update text colors for better visibility
                    navLinks.forEach(link => {
                        link.classList.add('text-gray-700', 'dark:text-gray-300');
                        link.classList.remove('text-secondary');
                    });
                    
                    // Ensure brand text remains visible
                    if (brand) {
                        if (document.documentElement.classList.contains('dark')) {
                            // Dark mode - keep indigo-400
                            brand.classList.add('text-indigo-400');
                        } else {
                            // Light mode - use indigo-600 for better contrast
                            brand.classList.add('text-indigo-600');
                        }
                        brand.classList.remove('text-brand');
                    }
                } else {
                    // When at the top, return to normal
                    navbar.classList.remove('py-1', 'shadow-md', 'bg-white/90', 'dark:bg-gray-800/90', 'backdrop-blur-sm');
                    navbar.classList.add('bg-header');
                    
                    // Restore original text colors
                    navLinks.forEach(link => {
                        link.classList.remove('text-gray-700', 'dark:text-gray-300');
                        link.classList.add('text-secondary');
                    });
                    
                    // Restore brand text
                    if (brand) {
                        brand.classList.remove('text-indigo-400', 'text-indigo-600');
                        brand.classList.add('text-brand');
                    }
                }
            });
            
            // Trigger scroll event on page load to set initial state
            window.dispatchEvent(new Event('scroll'));
        })();
    </script>
</body>
</html> 
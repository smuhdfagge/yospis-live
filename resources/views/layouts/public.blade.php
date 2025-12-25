<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'YOSPIS') - Youth Society for the Prevention of Infectious Diseases and Social Vices</title>
    <meta name="description" content="@yield('meta_description', 'YOSPIS is a youth-led NGO committed to promoting public health, social responsibility, and youth development in Nigeria through education, advocacy, and community engagement.')">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --yospis-blue: #1e40af;
            --yospis-blue-dark: #1e3a8a;
            --yospis-blue-light: #3b82f6;
        }
    </style>

    @stack('styles')
</head>
<body class="font-sans antialiased bg-white text-gray-900">
    <!-- Top Bar -->
    <div class="bg-blue-900 text-white text-sm py-2 hidden md:block">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-4">
                    <a href="mailto:info@yospisnigeria.org" class="flex items-center hover:text-blue-200 transition">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        info@yospisnigeria.org
                    </a>
                    <a href="tel:+2348012345678" class="flex items-center hover:text-blue-200 transition">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        +234 801 234 5678
                    </a>
                </div>
                <div class="flex items-center space-x-3">
                    <a href="#" class="hover:text-blue-200 transition" aria-label="Facebook">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M18.77,7.46H14.5v-1.9c0-.9.6-1.1,1-1.1h3V.5h-4.33C10.24.5,9.5,3.44,9.5,5.32v2.15h-3v4h3v12h5v-12h3.85l.42-4Z"/></svg>
                    </a>
                    <a href="#" class="hover:text-blue-200 transition" aria-label="Twitter">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                    </a>
                    <a href="#" class="hover:text-blue-200 transition" aria-label="Instagram">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                    </a>
                    <a href="#" class="hover:text-blue-200 transition" aria-label="LinkedIn">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->
    <header class="bg-white shadow-sm sticky top-0 z-50" x-data="{ mobileMenuOpen: false }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center space-x-3">
                    <img src="{{ asset('images/logo.png') }}" alt="YOSPIS Logo" class="h-12 w-auto">
                    <div class="hidden sm:block">
                        <span class="text-blue-800 font-bold text-xl">YOSPIS</span>
                        <p class="text-xs text-gray-500 -mt-1">Youth Society for Prevention of Infectious Diseases and Social Vices</p>
                    </div>
                </a>

                <!-- Desktop Navigation -->
                <nav class="hidden lg:flex items-center space-x-1">
                    <a href="{{ route('home') }}" class="px-4 py-2 text-gray-700 hover:text-blue-800 hover:bg-blue-50 rounded-lg transition {{ request()->routeIs('home') ? 'text-blue-800 bg-blue-50 font-medium' : '' }}">
                        Home
                    </a>
                    <a href="{{ route('about') }}" class="px-4 py-2 text-gray-700 hover:text-blue-800 hover:bg-blue-50 rounded-lg transition {{ request()->routeIs('about*') ? 'text-blue-800 bg-blue-50 font-medium' : '' }}">
                        About Us
                    </a>
                    <a href="{{ route('projects') }}" class="px-4 py-2 text-gray-700 hover:text-blue-800 hover:bg-blue-50 rounded-lg transition {{ request()->routeIs('projects*') ? 'text-blue-800 bg-blue-50 font-medium' : '' }}">
                        Projects
                    </a>
                    <a href="{{ route('partners') }}" class="px-4 py-2 text-gray-700 hover:text-blue-800 hover:bg-blue-50 rounded-lg transition {{ request()->routeIs('partners') ? 'text-blue-800 bg-blue-50 font-medium' : '' }}">
                        Partners
                    </a>
                    <a href="{{ route('news') }}" class="px-4 py-2 text-gray-700 hover:text-blue-800 hover:bg-blue-50 rounded-lg transition {{ request()->routeIs('news*') ? 'text-blue-800 bg-blue-50 font-medium' : '' }}">
                        News
                    </a>
                    <a href="{{ route('gallery') }}" class="px-4 py-2 text-gray-700 hover:text-blue-800 hover:bg-blue-50 rounded-lg transition {{ request()->routeIs('gallery') ? 'text-blue-800 bg-blue-50 font-medium' : '' }}">
                        Gallery
                    </a>
                    <a href="{{ route('contact') }}" class="px-4 py-2 text-gray-700 hover:text-blue-800 hover:bg-blue-50 rounded-lg transition {{ request()->routeIs('contact') ? 'text-blue-800 bg-blue-50 font-medium' : '' }}">
                        Contact
                    </a>
                </nav>

                <!-- CTA Button -->
                <div class="hidden lg:flex items-center space-x-4">
                    <a href="{{ route('donate') }}" class="bg-blue-800 hover:bg-blue-900 text-white px-6 py-2.5 rounded-lg font-medium transition shadow-lg shadow-blue-800/25">
                        Donate Now
                    </a>
                </div>

                <!-- Mobile menu button -->
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="lg:hidden p-2 rounded-lg hover:bg-gray-100 transition">
                    <svg x-show="!mobileMenuOpen" class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg x-show="mobileMenuOpen" class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <!-- Mobile Navigation -->
            <div x-show="mobileMenuOpen" x-transition class="lg:hidden pb-4">
                <nav class="flex flex-col space-y-1">
                    <a href="{{ route('home') }}" class="px-4 py-3 text-gray-700 hover:text-blue-800 hover:bg-blue-50 rounded-lg transition {{ request()->routeIs('home') ? 'text-blue-800 bg-blue-50 font-medium' : '' }}">
                        Home
                    </a>
                    <a href="{{ route('about') }}" class="px-4 py-3 text-gray-700 hover:text-blue-800 hover:bg-blue-50 rounded-lg transition {{ request()->routeIs('about*') ? 'text-blue-800 bg-blue-50 font-medium' : '' }}">
                        About Us
                    </a>
                    <a href="{{ route('projects') }}" class="px-4 py-3 text-gray-700 hover:text-blue-800 hover:bg-blue-50 rounded-lg transition {{ request()->routeIs('projects*') ? 'text-blue-800 bg-blue-50 font-medium' : '' }}">
                        Projects
                    </a>
                    <a href="{{ route('partners') }}" class="px-4 py-3 text-gray-700 hover:text-blue-800 hover:bg-blue-50 rounded-lg transition {{ request()->routeIs('partners') ? 'text-blue-800 bg-blue-50 font-medium' : '' }}">
                        Partners
                    </a>
                    <a href="{{ route('news') }}" class="px-4 py-3 text-gray-700 hover:text-blue-800 hover:bg-blue-50 rounded-lg transition {{ request()->routeIs('news*') ? 'text-blue-800 bg-blue-50 font-medium' : '' }}">
                        News
                    </a>
                    <a href="{{ route('gallery') }}" class="px-4 py-3 text-gray-700 hover:text-blue-800 hover:bg-blue-50 rounded-lg transition {{ request()->routeIs('gallery') ? 'text-blue-800 bg-blue-50 font-medium' : '' }}">
                        Gallery
                    </a>
                    <a href="{{ route('contact') }}" class="px-4 py-3 text-gray-700 hover:text-blue-800 hover:bg-blue-50 rounded-lg transition {{ request()->routeIs('contact') ? 'text-blue-800 bg-blue-50 font-medium' : '' }}">
                        Contact
                    </a>
                    <a href="{{ route('donate') }}" class="mt-2 bg-blue-800 hover:bg-blue-900 text-white px-4 py-3 rounded-lg font-medium transition text-center">
                        Donate Now
                    </a>
                </nav>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white">
        <!-- Main Footer -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
                <!-- About Column -->
                <div class="lg:col-span-1">
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center">
                            <span class="text-white font-bold text-lg">Y</span>
                        </div>
                        <span class="text-white font-bold text-xl">YOSPIS</span>
                    </div>
                    <p class="text-gray-400 text-sm leading-relaxed mb-6">
                        Youth Society for the Prevention of Infectious Diseases and Social Vices - A youth-led NGO committed to promoting public health and youth development in Nigeria.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-gray-800 hover:bg-blue-600 rounded-full flex items-center justify-center transition">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M18.77,7.46H14.5v-1.9c0-.9.6-1.1,1-1.1h3V.5h-4.33C10.24.5,9.5,3.44,9.5,5.32v2.15h-3v4h3v12h5v-12h3.85l.42-4Z"/></svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 hover:bg-blue-600 rounded-full flex items-center justify-center transition">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 hover:bg-blue-600 rounded-full flex items-center justify-center transition">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 hover:bg-blue-600 rounded-full flex items-center justify-center transition">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="text-lg font-semibold mb-6">Quick Links</h3>
                    <ul class="space-y-3">
                        <li><a href="{{ route('about') }}" class="text-gray-400 hover:text-white transition">About Us</a></li>
                        <li><a href="{{ route('projects') }}" class="text-gray-400 hover:text-white transition">Our Projects</a></li>
                        <li><a href="{{ route('partners') }}" class="text-gray-400 hover:text-white transition">Partners</a></li>
                        <li><a href="{{ route('news') }}" class="text-gray-400 hover:text-white transition">News & Updates</a></li>
                        <li><a href="{{ route('donate') }}" class="text-gray-400 hover:text-white transition">Donate</a></li>
                        <li><a href="{{ route('contact') }}" class="text-gray-400 hover:text-white transition">Contact Us</a></li>
                    </ul>
                </div>

                <!-- Focus Areas -->
                <div>
                    <h3 class="text-lg font-semibold mb-6">Focus Areas</h3>
                    <ul class="space-y-3">
                        <li class="text-gray-400">Infectious Disease Prevention</li>
                        <li class="text-gray-400">Drug Abuse Prevention</li>
                        <li class="text-gray-400">Gender-Based Violence</li>
                        <li class="text-gray-400">Youth Empowerment</li>
                        <li class="text-gray-400">Menstrual Hygiene</li>
                        <li class="text-gray-400">Community Health</li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h3 class="text-lg font-semibold mb-6">Contact Us</h3>
                    <ul class="space-y-4">
                        <li class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-blue-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <span class="text-gray-400">Kano, Nigeria</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-blue-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <a href="mailto:info@yospisnigeria.org" class="text-gray-400 hover:text-white transition">info@yospisnigeria.org</a>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-blue-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            <a href="tel:+2348012345678" class="text-gray-400 hover:text-white transition">+234 801 234 5678</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Bottom Footer -->
        <div class="border-t border-gray-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                    <p class="text-gray-500 text-sm">
                        &copy; {{ date('Y') }} YOSPIS. All rights reserved. Registered with CAC (2002).
                    </p>
                    <div class="flex space-x-6 text-sm">
                        <a href="#" class="text-gray-500 hover:text-white transition">Privacy Policy</a>
                        <a href="#" class="text-gray-500 hover:text-white transition">Terms of Service</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>

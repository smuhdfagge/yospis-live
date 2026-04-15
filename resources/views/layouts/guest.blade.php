<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'YOSPIS') }} - Authentication</title>

        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            :root {
                --yospis-blue: #1e40af;
                --yospis-blue-dark: #1e3a8a;
                --yospis-blue-light: #3b82f6;
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen flex">
            <!-- Left Side - Branding -->
            <div class="hidden lg:flex lg:w-1/2 bg-gradient-to-br from-blue-900 via-blue-800 to-blue-900 relative overflow-hidden">
                <!-- Background Pattern -->
                <div class="absolute inset-0 opacity-10">
                    <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
                        <defs>
                            <pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse">
                                <path d="M 10 0 L 0 0 0 10" fill="none" stroke="white" stroke-width="0.5"/>
                            </pattern>
                        </defs>
                        <rect width="100" height="100" fill="url(#grid)"/>
                    </svg>
                </div>

                <!-- Floating Circles -->
                <div class="absolute top-20 left-20 w-64 h-64 bg-blue-500 rounded-full opacity-20 blur-3xl"></div>
                <div class="absolute bottom-20 right-20 w-96 h-96 bg-blue-400 rounded-full opacity-20 blur-3xl"></div>

                <!-- Content -->
                <div class="relative z-10 flex flex-col justify-center items-center w-full p-12 text-white">
                    <div class="text-center">
                        <!-- Logo -->
                        <div class="mb-8">
                            <img src="{{ asset('images/logo.png') }}" alt="YOSPIS Logo" class="w-32 h-32 mx-auto rounded-full bg-white p-2 shadow-2xl">
                        </div>

                        <!-- Organization Name -->
                        <h1 class="text-4xl font-bold mb-4">YOSPIS</h1>
                        <p class="text-xl text-blue-200 mb-8 max-w-md">Youth Society for the Prevention of Infectious Diseases and Social Vices</p>

                        <!-- Tagline -->
                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-8 max-w-md mx-auto">
                            <p class="text-lg leading-relaxed text-blue-100">
                                Empowering youth through education, advocacy, and community engagement for a healthier Nigeria.
                            </p>
                        </div>

                        <!-- Stats or Features -->
                        <div class="mt-12 grid grid-cols-3 gap-8 max-w-md mx-auto">
                            <div class="text-center">
                                <div class="text-3xl font-bold">10K+</div>
                                <div class="text-blue-300 text-sm">Youth Reached</div>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl font-bold">50+</div>
                                <div class="text-blue-300 text-sm">Programs</div>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl font-bold">20+</div>
                                <div class="text-blue-300 text-sm">Communities</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side - Form -->
            <div class="w-full lg:w-1/2 flex flex-col justify-center items-center p-8 bg-gray-50">
                <!-- Mobile Logo -->
                <div class="lg:hidden mb-8 text-center">
                    <img src="{{ asset('images/logo.png') }}" alt="YOSPIS Logo" class="w-20 h-20 mx-auto rounded-full shadow-lg mb-4">
                    <h1 class="text-2xl font-bold text-blue-900">YOSPIS</h1>
                </div>

                <div class="w-full max-w-md">
                    <!-- Back to Home Link -->
                    <a href="{{ route('home') }}" class="inline-flex items-center text-sm text-gray-500 hover:text-blue-600 mb-8 transition">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Back to website
                    </a>

                    <!-- Form Card -->
                    <div class="bg-white rounded-2xl shadow-xl p-8">
                        {{ $slot }}
                    </div>

                    <!-- Footer -->
                    <p class="text-center text-sm text-gray-500 mt-8">
                        &copy; {{ date('Y') }} YOSPIS Nigeria. All rights reserved.
                    </p>
                </div>
            </div>
        </div>
    </body>
</html>

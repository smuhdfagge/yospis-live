@extends('layouts.public')

@section('title', 'Donate')
@section('meta_description', 'Support YOSPIS in our mission to promote public health and youth empowerment in Nigeria. Your donation makes a difference.')

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-blue-900 via-blue-800 to-blue-900 text-white py-20 lg:py-28">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl">
                <span class="inline-block px-4 py-1.5 bg-blue-700/50 rounded-full text-blue-200 text-sm font-medium mb-6">
                    Support Our Mission
                </span>
                <h1 class="text-4xl md:text-5xl font-bold leading-tight mb-6">
                    Make a Donation
                </h1>
                <p class="text-xl text-blue-100 leading-relaxed">
                    Your generous support helps us reach more young people, expand our programs, and create lasting change in Nigerian communities.
                </p>
            </div>
        </div>
    </section>

    <!-- Impact Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-blue-600 font-semibold text-sm uppercase tracking-wider">Your Impact</span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-2 mb-4">How Your Donation Helps</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Every contribution, no matter the size, makes a meaningful difference in the lives of young Nigerians.
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center p-8 bg-blue-50 rounded-2xl">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z"/>
                        </svg>
                    </div>
                    <h3 class="text-3xl font-bold text-blue-600 mb-2">₦5,000</h3>
                    <p class="text-gray-600">Provides health education materials for 10 young people</p>
                </div>

                <div class="text-center p-8 bg-green-50 rounded-2xl">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <h3 class="text-3xl font-bold text-green-600 mb-2">₦20,000</h3>
                    <p class="text-gray-600">Supports a youth empowerment workshop for 25 participants</p>
                </div>

                <div class="text-center p-8 bg-purple-50 rounded-2xl">
                    <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-3xl font-bold text-purple-600 mb-2">₦50,000</h3>
                    <p class="text-gray-600">Funds a community health outreach reaching 100 people</p>
                </div>

                <div class="text-center p-8 bg-orange-50 rounded-2xl">
                    <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                        </svg>
                    </div>
                    <h3 class="text-3xl font-bold text-orange-600 mb-2">₦100,000</h3>
                    <p class="text-gray-600">Sponsors radio programming for a month, reaching 40,000+ people</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Ways to Give -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-blue-600 font-semibold text-sm uppercase tracking-wider">Ways to Give</span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-2">How to Donate</h2>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Bank Transfer -->
                <div class="bg-white rounded-2xl p-8 shadow-lg">
                    <div class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Bank Transfer</h3>
                    <div class="space-y-3 text-gray-600">
                        <p><span class="font-medium text-gray-900">Bank:</span> First Bank of Nigeria</p>
                        <p><span class="font-medium text-gray-900">Account Name:</span> YOSPIS</p>
                        <p><span class="font-medium text-gray-900">Account Number:</span> 0123456789</p>
                    </div>
                    <p class="mt-4 text-sm text-gray-500">Please include your name and "Donation" in the transfer reference.</p>
                </div>

                <!-- Mobile Money -->
                <div class="bg-white rounded-2xl p-8 shadow-lg">
                    <div class="w-14 h-14 bg-green-100 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Mobile Transfer</h3>
                    <div class="space-y-3 text-gray-600">
                        <p><span class="font-medium text-gray-900">Provider:</span> Opay / Palmpay</p>
                        <p><span class="font-medium text-gray-900">Name:</span> YOSPIS</p>
                        <p><span class="font-medium text-gray-900">Number:</span> 0801 234 5678</p>
                    </div>
                    <p class="mt-4 text-sm text-gray-500">Fast and convenient mobile money transfers.</p>
                </div>

                <!-- Contact for Large Donations -->
                <div class="bg-white rounded-2xl p-8 shadow-lg">
                    <div class="w-14 h-14 bg-purple-100 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Corporate & Major Gifts</h3>
                    <p class="text-gray-600 mb-4">
                        For corporate donations, grants, or major gifts, please contact us directly to discuss partnership opportunities.
                    </p>
                    <a href="{{ route('contact') }}" class="inline-flex items-center text-purple-600 font-medium hover:text-purple-800 transition">
                        Contact Us
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Other Ways to Support -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-blue-600 font-semibold text-sm uppercase tracking-wider">Beyond Financial Support</span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-2">Other Ways to Help</h2>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-10 h-10 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Volunteer</h3>
                    <p class="text-gray-600">Share your skills and time to support our programs and initiatives.</p>
                </div>

                <div class="text-center">
                    <div class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-10 h-10 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Spread the Word</h3>
                    <p class="text-gray-600">Follow us on social media and share our work with your network.</p>
                </div>

                <div class="text-center">
                    <div class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-10 h-10 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Partner With Us</h3>
                    <p class="text-gray-600">Explore corporate partnership and sponsorship opportunities.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Transparency Section -->
    <section class="py-20 bg-blue-800 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-3xl md:text-4xl font-bold mb-6">Our Commitment to Transparency</h2>
                <p class="text-xl text-blue-100 mb-8">
                    As a registered NGO with the Corporate Affairs Commission (CAC) since 2002, we maintain the highest standards of accountability. Your donations are used responsibly to maximize impact in our communities.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('about') }}" class="bg-white text-blue-800 hover:bg-blue-50 px-8 py-4 rounded-lg font-semibold transition">
                        Learn More About Us
                    </a>
                    <a href="{{ route('contact') }}" class="bg-transparent border-2 border-white text-white hover:bg-white hover:text-blue-800 px-8 py-4 rounded-lg font-semibold transition">
                        Request Financial Reports
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Thank You Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl mx-auto text-center">
                <div class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-10 h-10 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                    </svg>
                </div>
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Thank You for Your Support</h2>
                <p class="text-xl text-gray-600">
                    Every donation brings us closer to our vision of a healthier, safer Nigeria where youth lead the way in building empowered communities.
                </p>
            </div>
        </div>
    </section>
@endsection

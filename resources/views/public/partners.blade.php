@extends('layouts.public')

@section('title', 'Our Partners')
@section('meta_description', 'Meet the donors, implementing partners, and government agencies working with YOSPIS to create healthier communities in Nigeria.')

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-blue-900 via-blue-800 to-blue-900 text-white py-20 lg:py-28">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl">
                <span class="inline-block px-4 py-1.5 bg-blue-700/50 rounded-full text-blue-200 text-sm font-medium mb-6">
                    Our Partners
                </span>
                <h1 class="text-4xl md:text-5xl font-bold leading-tight mb-6">
                    Working Together for Change
                </h1>
                <p class="text-xl text-blue-100 leading-relaxed">
                    We collaborate with government agencies, development partners, media platforms, and communities to maximize our impact and reach more people.
                </p>
            </div>
        </div>
    </section>

    <!-- Donors Section -->
    @if($donors->count() > 0)
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <span class="text-blue-600 font-semibold text-sm uppercase tracking-wider">Funding Partners</span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-2">Our Donors</h2>
                <p class="text-xl text-gray-600 mt-4 max-w-2xl mx-auto">
                    Organizations and institutions that support our work financially.
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($donors as $partner)
                <div class="bg-gray-50 rounded-2xl p-8 text-center hover:shadow-lg transition-all duration-300 group">
                    @if($partner->logo)
                        <div class="h-20 flex items-center justify-center mb-4">
                            <img src="{{ Storage::url($partner->logo) }}" alt="{{ $partner->name }}" class="max-h-full w-auto object-contain">
                        </div>
                    @else
                        <div class="h-20 flex items-center justify-center mb-4">
                            <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center">
                                <span class="text-blue-600 font-bold text-xl">{{ substr($partner->name, 0, 2) }}</span>
                            </div>
                        </div>
                    @endif
                    <h3 class="font-bold text-gray-900 group-hover:text-blue-600 transition">{{ $partner->name }}</h3>
                    @if($partner->description)
                        <p class="text-sm text-gray-600 mt-2">{{ Str::limit($partner->description, 100) }}</p>
                    @endif
                    @if($partner->website)
                        <a href="{{ $partner->website }}" target="_blank" rel="noopener" class="inline-flex items-center text-blue-600 text-sm mt-4 hover:text-blue-800 transition">
                            Visit Website
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                            </svg>
                        </a>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Implementing Partners Section -->
    @if($implementingPartners->count() > 0)
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <span class="text-blue-600 font-semibold text-sm uppercase tracking-wider">Implementation</span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-2">Implementing Partners</h2>
                <p class="text-xl text-gray-600 mt-4 max-w-2xl mx-auto">
                    NGOs and organizations we work alongside to deliver programs.
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($implementingPartners as $partner)
                <div class="bg-white rounded-2xl p-8 text-center hover:shadow-lg transition-all duration-300 group">
                    @if($partner->logo)
                        <div class="h-20 flex items-center justify-center mb-4">
                            <img src="{{ Storage::url($partner->logo) }}" alt="{{ $partner->name }}" class="max-h-full w-auto object-contain">
                        </div>
                    @else
                        <div class="h-20 flex items-center justify-center mb-4">
                            <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center">
                                <span class="text-green-600 font-bold text-xl">{{ substr($partner->name, 0, 2) }}</span>
                            </div>
                        </div>
                    @endif
                    <h3 class="font-bold text-gray-900 group-hover:text-blue-600 transition">{{ $partner->name }}</h3>
                    @if($partner->description)
                        <p class="text-sm text-gray-600 mt-2">{{ Str::limit($partner->description, 100) }}</p>
                    @endif
                    @if($partner->website)
                        <a href="{{ $partner->website }}" target="_blank" rel="noopener" class="inline-flex items-center text-blue-600 text-sm mt-4 hover:text-blue-800 transition">
                            Visit Website
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                            </svg>
                        </a>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Government Partners Section -->
    @if($governmentPartners->count() > 0)
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <span class="text-blue-600 font-semibold text-sm uppercase tracking-wider">Government</span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-2">Government Partners</h2>
                <p class="text-xl text-gray-600 mt-4 max-w-2xl mx-auto">
                    Government agencies and ministries we collaborate with.
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($governmentPartners as $partner)
                <div class="bg-gray-50 rounded-2xl p-8 text-center hover:shadow-lg transition-all duration-300 group">
                    @if($partner->logo)
                        <div class="h-20 flex items-center justify-center mb-4">
                            <img src="{{ Storage::url($partner->logo) }}" alt="{{ $partner->name }}" class="max-h-full w-auto object-contain">
                        </div>
                    @else
                        <div class="h-20 flex items-center justify-center mb-4">
                            <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center">
                                <span class="text-purple-600 font-bold text-xl">{{ substr($partner->name, 0, 2) }}</span>
                            </div>
                        </div>
                    @endif
                    <h3 class="font-bold text-gray-900 group-hover:text-blue-600 transition">{{ $partner->name }}</h3>
                    @if($partner->description)
                        <p class="text-sm text-gray-600 mt-2">{{ Str::limit($partner->description, 100) }}</p>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Media Partners Section -->
    @if($mediaPartners->count() > 0)
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <span class="text-blue-600 font-semibold text-sm uppercase tracking-wider">Media</span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-2">Media Partners</h2>
                <p class="text-xl text-gray-600 mt-4 max-w-2xl mx-auto">
                    Media platforms that help amplify our message.
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($mediaPartners as $partner)
                <div class="bg-white rounded-2xl p-8 text-center hover:shadow-lg transition-all duration-300 group">
                    @if($partner->logo)
                        <div class="h-20 flex items-center justify-center mb-4">
                            <img src="{{ Storage::url($partner->logo) }}" alt="{{ $partner->name }}" class="max-h-full w-auto object-contain">
                        </div>
                    @else
                        <div class="h-20 flex items-center justify-center mb-4">
                            <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center">
                                <span class="text-orange-600 font-bold text-xl">{{ substr($partner->name, 0, 2) }}</span>
                            </div>
                        </div>
                    @endif
                    <h3 class="font-bold text-gray-900 group-hover:text-blue-600 transition">{{ $partner->name }}</h3>
                    @if($partner->description)
                        <p class="text-sm text-gray-600 mt-2">{{ Str::limit($partner->description, 100) }}</p>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Corporate Partners Section -->
    @if($corporatePartners->count() > 0)
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <span class="text-blue-600 font-semibold text-sm uppercase tracking-wider">Corporate</span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-2">Corporate Partners</h2>
                <p class="text-xl text-gray-600 mt-4 max-w-2xl mx-auto">
                    Private sector partners supporting our initiatives.
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($corporatePartners as $partner)
                <div class="bg-gray-50 rounded-2xl p-8 text-center hover:shadow-lg transition-all duration-300 group">
                    @if($partner->logo)
                        <div class="h-20 flex items-center justify-center mb-4">
                            <img src="{{ Storage::url($partner->logo) }}" alt="{{ $partner->name }}" class="max-h-full w-auto object-contain">
                        </div>
                    @else
                        <div class="h-20 flex items-center justify-center mb-4">
                            <div class="w-16 h-16 bg-gray-200 rounded-full flex items-center justify-center">
                                <span class="text-gray-600 font-bold text-xl">{{ substr($partner->name, 0, 2) }}</span>
                            </div>
                        </div>
                    @endif
                    <h3 class="font-bold text-gray-900 group-hover:text-blue-600 transition">{{ $partner->name }}</h3>
                    @if($partner->description)
                        <p class="text-sm text-gray-600 mt-2">{{ Str::limit($partner->description, 100) }}</p>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Empty State -->
    @if($donors->count() === 0 && $implementingPartners->count() === 0 && $governmentPartners->count() === 0 && $mediaPartners->count() === 0 && $corporatePartners->count() === 0)
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center py-12">
                <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Partners Coming Soon</h3>
                <p class="text-gray-500">We're updating our partners page. Check back soon!</p>
            </div>
        </div>
    </section>
    @endif

    <!-- Become a Partner CTA -->
    <section class="py-20 bg-gradient-to-br from-gray-900 to-black text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-3xl md:text-4xl font-bold mb-6">Become a Partner</h2>
                <p class="text-xl text-gray-300 mb-10">
                    Join us in creating healthier communities. Whether you're a donor, implementing organization, government agency, or corporate entity, we'd love to explore partnership opportunities.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('contact') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-4 rounded-lg font-semibold transition shadow-xl">
                        Contact Us
                    </a>
                    <a href="{{ route('donate') }}" class="bg-transparent border-2 border-white text-white hover:bg-white hover:text-gray-900 px-8 py-4 rounded-lg font-semibold transition">
                        Support Our Work
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

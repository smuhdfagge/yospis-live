@extends('layouts.public')

@section('title', 'Our Projects')
@section('meta_description', 'Explore YOSPIS ongoing and completed projects in public health, youth empowerment, and community development across Nigeria.')

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-blue-900 via-blue-800 to-blue-900 text-white py-20 lg:py-28">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl">
                <span class="inline-block px-4 py-1.5 bg-blue-700/50 rounded-full text-blue-200 text-sm font-medium mb-6">
                    Our Work
                </span>
                <h1 class="text-4xl md:text-5xl font-bold leading-tight mb-6">
                    Our Projects
                </h1>
                <p class="text-xl text-blue-100 leading-relaxed">
                    Discover the impactful programs and initiatives we're implementing to create healthier, safer communities across Nigeria.
                </p>
            </div>
        </div>
    </section>

    <!-- Ongoing Projects -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-12">
                <span class="text-blue-600 font-semibold text-sm uppercase tracking-wider">Current Initiatives</span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-2">Ongoing Projects</h2>
            </div>

            @if($ongoingProjects->count() > 0)
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($ongoingProjects as $project)
                    <article class="group bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100">
                        <div class="aspect-video bg-gray-200 overflow-hidden relative">
                            @if($project->featured_image)
                                <img src="{{ Storage::url($project->featured_image) }}" alt="{{ $project->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-blue-600 to-blue-800 flex items-center justify-center">
                                    <svg class="w-16 h-16 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                                    </svg>
                                </div>
                            @endif
                            <span class="absolute top-4 left-4 px-3 py-1 bg-green-500 text-white text-xs font-medium rounded-full">
                                Ongoing
                            </span>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-blue-600 transition">
                                {{ $project->title }}
                            </h3>
                            <p class="text-gray-600 mb-4 line-clamp-3">{{ $project->description }}</p>
                            
                            @if($project->location || $project->beneficiaries)
                            <div class="flex flex-wrap gap-4 text-sm text-gray-500 mb-4">
                                @if($project->location)
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    </svg>
                                    {{ $project->location }}
                                </span>
                                @endif
                                @if($project->beneficiaries)
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                    {{ $project->beneficiaries }}
                                </span>
                                @endif
                            </div>
                            @endif
                            
                            <a href="{{ route('projects.show', $project) }}" class="inline-flex items-center text-blue-600 font-medium hover:text-blue-800 transition">
                                Learn More
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>
                    </article>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12 bg-gray-50 rounded-2xl">
                    <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                    </svg>
                    <p class="text-gray-500">No ongoing projects at the moment. Check back soon!</p>
                </div>
            @endif
        </div>
    </section>

    <!-- Completed Projects -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-12">
                <span class="text-blue-600 font-semibold text-sm uppercase tracking-wider">Past Success</span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-2">Completed Projects</h2>
            </div>

            @if($completedProjects->count() > 0)
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($completedProjects as $project)
                    <article class="group bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100">
                        <div class="aspect-video bg-gray-200 overflow-hidden relative">
                            @if($project->featured_image)
                                <img src="{{ Storage::url($project->featured_image) }}" alt="{{ $project->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-gray-600 to-gray-800 flex items-center justify-center">
                                    <svg class="w-16 h-16 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                            @endif
                            <span class="absolute top-4 left-4 px-3 py-1 bg-gray-500 text-white text-xs font-medium rounded-full">
                                Completed
                            </span>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-blue-600 transition">
                                {{ $project->title }}
                            </h3>
                            <p class="text-gray-600 mb-4 line-clamp-3">{{ $project->description }}</p>
                            
                            @if($project->start_date && $project->end_date)
                            <div class="text-sm text-gray-500 mb-4">
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    {{ $project->start_date->format('M Y') }} - {{ $project->end_date->format('M Y') }}
                                </span>
                            </div>
                            @endif
                            
                            <a href="{{ route('projects.show', $project) }}" class="inline-flex items-center text-blue-600 font-medium hover:text-blue-800 transition">
                                View Details
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>
                    </article>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12 bg-white rounded-2xl">
                    <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <p class="text-gray-500">No completed projects to display yet.</p>
                </div>
            @endif
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-blue-800 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-3xl md:text-4xl font-bold mb-6">Want to Support Our Projects?</h2>
                <p class="text-xl text-blue-100 mb-10">
                    Your support helps us expand our reach and create lasting impact in more communities.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('donate') }}" class="bg-white text-blue-800 hover:bg-blue-50 px-8 py-4 rounded-lg font-semibold transition shadow-xl">
                        Donate Now
                    </a>
                    <a href="{{ route('contact') }}" class="bg-transparent border-2 border-white text-white hover:bg-white hover:text-blue-800 px-8 py-4 rounded-lg font-semibold transition">
                        Partner With Us
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

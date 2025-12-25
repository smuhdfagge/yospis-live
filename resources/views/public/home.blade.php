@extends('layouts.public')

@section('title', 'Home')

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-blue-900 via-blue-800 to-blue-900 text-white overflow-hidden">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'0.05\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 lg:py-32">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="text-center lg:text-left">
                    <span class="inline-block px-4 py-1.5 bg-blue-700/50 rounded-full text-blue-200 text-sm font-medium mb-6">
                        Since 1997 • Registered with CAC 2002
                    </span>
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight mb-6">
                        Empowering Youth for a 
                        <span class="text-blue-300">Healthier</span> Tomorrow
                    </h1>
                    <p class="text-xl text-blue-100 mb-8 leading-relaxed">
                        Youth Society for the Prevention of Infectious Diseases and Social Vices (YOSPIS) is a youth-led NGO committed to promoting public health, social responsibility, and youth development in Nigeria.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                        <a href="{{ route('about') }}" class="bg-white text-blue-800 hover:bg-blue-50 px-8 py-4 rounded-lg font-semibold transition shadow-xl">
                            Learn More About Us
                        </a>
                        <a href="{{ route('donate') }}" class="bg-transparent border-2 border-white text-white hover:bg-white hover:text-blue-800 px-8 py-4 rounded-lg font-semibold transition">
                            Support Our Cause
                        </a>
                    </div>
                </div>
                <div class="hidden lg:block">
                    <div class="relative">
                        <div class="absolute -top-4 -left-4 w-72 h-72 bg-blue-500/20 rounded-full blur-3xl"></div>
                        <div class="absolute -bottom-4 -right-4 w-72 h-72 bg-blue-300/20 rounded-full blur-3xl"></div>
                        <div class="relative bg-white/10 backdrop-blur-sm rounded-2xl p-8 border border-white/20">
                            <div class="grid grid-cols-2 gap-6">
                                <div class="text-center p-6 bg-white/10 rounded-xl">
                                    <div class="text-4xl font-bold text-white mb-2">10K+</div>
                                    <div class="text-blue-200 text-sm">Weekly Radio Reach</div>
                                </div>
                                <div class="text-center p-6 bg-white/10 rounded-xl">
                                    <div class="text-4xl font-bold text-white mb-2">700+</div>
                                    <div class="text-blue-200 text-sm">Youth Transformed</div>
                                </div>
                                <div class="text-center p-6 bg-white/10 rounded-xl">
                                    <div class="text-4xl font-bold text-white mb-2">25+</div>
                                    <div class="text-blue-200 text-sm">Years of Impact</div>
                                </div>
                                <div class="text-center p-6 bg-white/10 rounded-xl">
                                    <div class="text-4xl font-bold text-white mb-2">50+</div>
                                    <div class="text-blue-200 text-sm">Community Programs</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Wave Separator -->
        <div class="absolute bottom-0 left-0 right-0">
            <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full">
                <path d="M0 120L60 105C120 90 240 60 360 45C480 30 600 30 720 37.5C840 45 960 60 1080 67.5C1200 75 1320 75 1380 75L1440 75V120H1380C1320 120 1200 120 1080 120C960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0Z" fill="white"/>
            </svg>
        </div>
    </section>

    <!-- Focus Areas Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-blue-600 font-semibold text-sm uppercase tracking-wider">What We Do</span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-2 mb-4">Our Focus Areas</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    We work tirelessly to address critical health and social challenges affecting Nigerian youth through targeted interventions.
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Focus Area 1 -->
                <div class="group bg-gray-50 hover:bg-blue-800 rounded-2xl p-8 transition-all duration-300 hover:shadow-2xl hover:-translate-y-1">
                    <div class="w-14 h-14 bg-blue-100 group-hover:bg-white/20 rounded-xl flex items-center justify-center mb-6 transition">
                        <svg class="w-7 h-7 text-blue-600 group-hover:text-white transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 group-hover:text-white mb-3 transition">Infectious Disease Prevention</h3>
                    <p class="text-gray-600 group-hover:text-blue-100 transition">
                        Educating communities about HIV/AIDS, tuberculosis, and other infectious diseases through awareness campaigns and health screenings.
                    </p>
                </div>

                <!-- Focus Area 2 -->
                <div class="group bg-gray-50 hover:bg-blue-800 rounded-2xl p-8 transition-all duration-300 hover:shadow-2xl hover:-translate-y-1">
                    <div class="w-14 h-14 bg-blue-100 group-hover:bg-white/20 rounded-xl flex items-center justify-center mb-6 transition">
                        <svg class="w-7 h-7 text-blue-600 group-hover:text-white transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 group-hover:text-white mb-3 transition">Drug Abuse Prevention</h3>
                    <p class="text-gray-600 group-hover:text-blue-100 transition">
                        Actively advocating against drug abuse among young people, promoting healthy choices and peaceful coexistence in communities.
                    </p>
                </div>

                <!-- Focus Area 3 -->
                <div class="group bg-gray-50 hover:bg-blue-800 rounded-2xl p-8 transition-all duration-300 hover:shadow-2xl hover:-translate-y-1">
                    <div class="w-14 h-14 bg-blue-100 group-hover:bg-white/20 rounded-xl flex items-center justify-center mb-6 transition">
                        <svg class="w-7 h-7 text-blue-600 group-hover:text-white transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 group-hover:text-white mb-3 transition">Gender-Based Violence</h3>
                    <p class="text-gray-600 group-hover:text-blue-100 transition">
                        Addressing gender-based violence through education, advocacy, and support services for survivors in vulnerable communities.
                    </p>
                </div>

                <!-- Focus Area 4 -->
                <div class="group bg-gray-50 hover:bg-blue-800 rounded-2xl p-8 transition-all duration-300 hover:shadow-2xl hover:-translate-y-1">
                    <div class="w-14 h-14 bg-blue-100 group-hover:bg-white/20 rounded-xl flex items-center justify-center mb-6 transition">
                        <svg class="w-7 h-7 text-blue-600 group-hover:text-white transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 group-hover:text-white mb-3 transition">Youth Empowerment</h3>
                    <p class="text-gray-600 group-hover:text-blue-100 transition">
                        Rehabilitation and empowerment initiatives that have transformed lives of over 700 repentant youth, supporting them to renounce violence.
                    </p>
                </div>

                <!-- Focus Area 5 -->
                <div class="group bg-gray-50 hover:bg-blue-800 rounded-2xl p-8 transition-all duration-300 hover:shadow-2xl hover:-translate-y-1">
                    <div class="w-14 h-14 bg-blue-100 group-hover:bg-white/20 rounded-xl flex items-center justify-center mb-6 transition">
                        <svg class="w-7 h-7 text-blue-600 group-hover:text-white transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 group-hover:text-white mb-3 transition">Women's Health</h3>
                    <p class="text-gray-600 group-hover:text-blue-100 transition">
                        Sensitizing young adolescent girls on menstrual hygiene management and women's health to promote dignity and well-being.
                    </p>
                </div>

                <!-- Focus Area 6 -->
                <div class="group bg-gray-50 hover:bg-blue-800 rounded-2xl p-8 transition-all duration-300 hover:shadow-2xl hover:-translate-y-1">
                    <div class="w-14 h-14 bg-blue-100 group-hover:bg-white/20 rounded-xl flex items-center justify-center mb-6 transition">
                        <svg class="w-7 h-7 text-blue-600 group-hover:text-white transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 group-hover:text-white mb-3 transition">Media Engagement</h3>
                    <p class="text-gray-600 group-hover:text-blue-100 transition">
                        Strategic media engagement through our Hasken Matasa radio program, reaching over 10,000 people weekly with health messages.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Impact Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div>
                    <span class="text-blue-600 font-semibold text-sm uppercase tracking-wider">Our Impact</span>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-2 mb-6">Making a Difference Since 1997</h2>
                    <p class="text-lg text-gray-600 mb-8 leading-relaxed">
                        Through sustained community sensitization campaigns, rehabilitation and empowerment initiatives, and strategic media engagement, YOSPIS has recorded significant impact in Nigeria's public health landscape.
                    </p>
                    
                    <div class="space-y-6">
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900 mb-1">Hasken Matasa Radio Program</h4>
                                <p class="text-gray-600">Reaching over 10,000 people weekly with vital health education and awareness messages.</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900 mb-1">Youth Transformation</h4>
                                <p class="text-gray-600">Positively transformed lives of over 700 repentant youth in Kano, supporting them to renounce violence.</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900 mb-1">Community Partnerships</h4>
                                <p class="text-gray-600">Working closely with communities, government agencies, media platforms, and development partners.</p>
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('about') }}" class="inline-flex items-center mt-8 text-blue-600 font-semibold hover:text-blue-800 transition">
                        Learn More About Our Work
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                </div>

                <div class="grid grid-cols-2 gap-6">
                    <div class="bg-white rounded-2xl p-8 shadow-lg text-center">
                        <div class="text-5xl font-bold text-blue-600 mb-2">25+</div>
                        <div class="text-gray-600">Years of Service</div>
                    </div>
                    <div class="bg-white rounded-2xl p-8 shadow-lg text-center mt-8">
                        <div class="text-5xl font-bold text-blue-600 mb-2">10K+</div>
                        <div class="text-gray-600">Weekly Reach</div>
                    </div>
                    <div class="bg-white rounded-2xl p-8 shadow-lg text-center">
                        <div class="text-5xl font-bold text-blue-600 mb-2">700+</div>
                        <div class="text-gray-600">Lives Changed</div>
                    </div>
                    <div class="bg-white rounded-2xl p-8 shadow-lg text-center mt-8">
                        <div class="text-5xl font-bold text-blue-600 mb-2">50+</div>
                        <div class="text-gray-600">Programs</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Projects -->
    @if($featuredProjects->count() > 0)
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-end md:justify-between mb-12">
                <div>
                    <span class="text-blue-600 font-semibold text-sm uppercase tracking-wider">Our Work</span>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-2">Featured Projects</h2>
                </div>
                <a href="{{ route('projects') }}" class="mt-4 md:mt-0 inline-flex items-center text-blue-600 font-semibold hover:text-blue-800 transition">
                    View All Projects
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($featuredProjects as $project)
                <article class="group bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300">
                    <div class="aspect-video bg-gray-200 overflow-hidden">
                        @if($project->featured_image)
                            <img src="{{ Storage::url($project->featured_image) }}" alt="{{ $project->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-blue-600 to-blue-800 flex items-center justify-center">
                                <svg class="w-16 h-16 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                                </svg>
                            </div>
                        @endif
                    </div>
                    <div class="p-6">
                        <span class="inline-block px-3 py-1 text-xs font-medium rounded-full {{ $project->status === 'ongoing' ? 'bg-green-100 text-green-700' : ($project->status === 'completed' ? 'bg-gray-100 text-gray-700' : 'bg-blue-100 text-blue-700') }}">
                            {{ ucfirst($project->status) }}
                        </span>
                        <h3 class="text-xl font-bold text-gray-900 mt-3 mb-2 group-hover:text-blue-600 transition">
                            {{ $project->title }}
                        </h3>
                        <p class="text-gray-600 mb-4 line-clamp-2">{{ $project->description }}</p>
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
        </div>
    </section>
    @endif

    <!-- Mission & Vision -->
    <section class="py-20 bg-blue-800 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-12">
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-10 border border-white/20">
                    <div class="w-16 h-16 bg-white/20 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Our Mission</h3>
                    <p class="text-blue-100 leading-relaxed">
                        To empower young people with knowledge, skills, and resources to prevent infectious diseases and social vices, fostering a healthier and more responsible society through education, advocacy, and community engagement.
                    </p>
                </div>

                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-10 border border-white/20">
                    <div class="w-16 h-16 bg-white/20 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Our Vision</h3>
                    <p class="text-blue-100 leading-relaxed">
                        A future where youth take the lead in preventing diseases and addressing social challenges, building safer, healthier, and more empowered communities across Nigeria and beyond.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Latest News -->
    @if($latestNews->count() > 0)
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-end md:justify-between mb-12">
                <div>
                    <span class="text-blue-600 font-semibold text-sm uppercase tracking-wider">Stay Updated</span>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-2">Latest News</h2>
                </div>
                <a href="{{ route('news') }}" class="mt-4 md:mt-0 inline-flex items-center text-blue-600 font-semibold hover:text-blue-800 transition">
                    View All News
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($latestNews as $article)
                <article class="group bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300">
                    <div class="aspect-video bg-gray-200 overflow-hidden">
                        @if($article->featured_image)
                            <img src="{{ Storage::url($article->featured_image) }}" alt="{{ $article->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-gray-600 to-gray-800 flex items-center justify-center">
                                <svg class="w-16 h-16 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                                </svg>
                            </div>
                        @endif
                    </div>
                    <div class="p-6">
                        <time class="text-sm text-gray-500">{{ $article->published_at->format('M d, Y') }}</time>
                        <h3 class="text-xl font-bold text-gray-900 mt-2 mb-3 group-hover:text-blue-600 transition line-clamp-2">
                            {{ $article->title }}
                        </h3>
                        <p class="text-gray-600 mb-4 line-clamp-2">{{ $article->excerpt ?? Str::limit(strip_tags($article->content), 120) }}</p>
                        <a href="{{ route('news.show', $article) }}" class="inline-flex items-center text-blue-600 font-medium hover:text-blue-800 transition">
                            Read More
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Partners Section -->
    @if($partners->count() > 0)
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <span class="text-blue-600 font-semibold text-sm uppercase tracking-wider">Our Partners</span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-2 mb-4">Working Together for Change</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    We collaborate with government agencies, development partners, and communities to maximize our impact.
                </p>
            </div>

            <div class="flex flex-wrap justify-center items-center gap-8 md:gap-12">
                @foreach($partners as $partner)
                <div class="grayscale hover:grayscale-0 transition-all duration-300 opacity-70 hover:opacity-100">
                    @if($partner->logo)
                        <img src="{{ Storage::url($partner->logo) }}" alt="{{ $partner->name }}" class="h-12 md:h-16 w-auto object-contain">
                    @else
                        <div class="h-12 md:h-16 px-6 bg-gray-100 rounded-lg flex items-center justify-center">
                            <span class="text-gray-600 font-medium">{{ $partner->name }}</span>
                        </div>
                    @endif
                </div>
                @endforeach
            </div>

            <div class="text-center mt-12">
                <a href="{{ route('partners') }}" class="inline-flex items-center text-blue-600 font-semibold hover:text-blue-800 transition">
                    View All Partners
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>
        </div>
    </section>
    @endif

    <!-- CTA Section -->
    <section class="py-20 bg-gradient-to-br from-gray-900 to-black text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-3xl md:text-4xl font-bold mb-6">Join Us in Building Healthier Communities</h2>
                <p class="text-xl text-gray-300 mb-10">
                    Your support can help us reach more young people, expand our programs, and create lasting change in Nigerian communities.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('donate') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-4 rounded-lg font-semibold transition shadow-xl">
                        Make a Donation
                    </a>
                    <a href="{{ route('contact') }}" class="bg-transparent border-2 border-white text-white hover:bg-white hover:text-gray-900 px-8 py-4 rounded-lg font-semibold transition">
                        Partner With Us
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('layouts.public')

@section('title', 'About Us')
@section('meta_description', 'Learn about YOSPIS - Youth Society for the Prevention of Infectious Diseases and Social Vices, a youth-led NGO founded in 1997 committed to public health and youth development in Nigeria.')

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-blue-900 via-blue-800 to-blue-900 text-white py-20 lg:py-28">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl">
                <span class="inline-block px-4 py-1.5 bg-blue-700/50 rounded-full text-blue-200 text-sm font-medium mb-6">
                    About YOSPIS
                </span>
                <h1 class="text-4xl md:text-5xl font-bold leading-tight mb-6">
                    Empowering Youth Since 1997
                </h1>
                <p class="text-xl text-blue-100 leading-relaxed">
                    A youth-led and youth-focused non-governmental organization committed to promoting public health, social responsibility, and youth development in Nigeria.
                </p>
            </div>
        </div>
    </section>

    <!-- Our Story -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div>
                    <span class="text-blue-600 font-semibold text-sm uppercase tracking-wider">Our Story</span>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-2 mb-6">Who We Are</h2>
                    <div class="prose prose-lg text-gray-600">
                        <p class="mb-6 leading-relaxed">
                            Youth Society for the Prevention of Infectious Diseases and Social Vices (YOSPIS) is a youth-led and youth-focused, non-governmental organization founded in 1997 and registered with the Corporate Affairs Commission (CAC) in 2002.
                        </p>
                        <p class="mb-6 leading-relaxed">
                            The organization focuses on preventing infectious diseases and addressing social vices such as drug abuse, gender-based violence, and youth delinquency through education, advocacy, and grassroots interventions.
                        </p>
                        <p class="leading-relaxed">
                            YOSPIS works closely with communities, government agencies, media platforms, and development partners to reach vulnerable and marginalized populations, particularly young people.
                        </p>
                    </div>
                </div>
                <div class="relative">
                    <div class="aspect-square bg-gradient-to-br from-blue-100 to-blue-200 rounded-2xl overflow-hidden">
                        <div class="w-full h-full flex items-center justify-center">
                            <div class="text-center p-8">
                                <div class="w-32 h-32 bg-blue-800 rounded-full flex items-center justify-center mx-auto mb-6">
                                    <span class="text-white font-bold text-5xl">Y</span>
                                </div>
                                <h3 class="text-2xl font-bold text-blue-800">YOSPIS</h3>
                                <p class="text-blue-600 mt-2">Established 1997</p>
                            </div>
                        </div>
                    </div>
                    <div class="absolute -bottom-6 -right-6 w-48 h-48 bg-blue-600 rounded-2xl -z-10"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission & Vision -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-blue-600 font-semibold text-sm uppercase tracking-wider">Our Purpose</span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-2">Mission & Vision</h2>
            </div>

            <div class="grid md:grid-cols-2 gap-8">
                <div class="bg-white rounded-2xl p-10 shadow-lg">
                    <div class="w-16 h-16 bg-blue-100 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Our Mission</h3>
                    <p class="text-gray-600 leading-relaxed">
                        To empower young people with knowledge, skills, and resources to prevent infectious diseases and social vices, fostering a healthier and more responsible society through education, advocacy, and community engagement.
                    </p>
                </div>

                <div class="bg-white rounded-2xl p-10 shadow-lg">
                    <div class="w-16 h-16 bg-blue-100 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Our Vision</h3>
                    <p class="text-gray-600 leading-relaxed">
                        A future where youth take the lead in preventing diseases and addressing social challenges, building safer, healthier, and more empowered communities across Nigeria and beyond.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Core Values -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-blue-600 font-semibold text-sm uppercase tracking-wider">What Guides Us</span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-2">Our Core Values</h2>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-10 h-10 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Integrity</h3>
                    <p class="text-gray-600">We uphold the highest standards of honesty and transparency in all our activities.</p>
                </div>

                <div class="text-center">
                    <div class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-10 h-10 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Inclusivity</h3>
                    <p class="text-gray-600">We embrace diversity and ensure our programs reach all vulnerable populations.</p>
                </div>

                <div class="text-center">
                    <div class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-10 h-10 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Impact</h3>
                    <p class="text-gray-600">We focus on creating measurable, sustainable change in communities.</p>
                </div>

                <div class="text-center">
                    <div class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-10 h-10 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Collaboration</h3>
                    <p class="text-gray-600">We believe in working together with partners for greater collective impact.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Impact -->
    <section class="py-20 bg-blue-800 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-blue-200 font-semibold text-sm uppercase tracking-wider">Our Impact</span>
                <h2 class="text-3xl md:text-4xl font-bold mt-2">Making a Difference</h2>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="text-5xl md:text-6xl font-bold mb-2">10K+</div>
                    <p class="text-blue-200">Weekly Radio Reach through Hasken Matasa</p>
                </div>
                <div class="text-center">
                    <div class="text-5xl md:text-6xl font-bold mb-2">700+</div>
                    <p class="text-blue-200">Youth Transformed in Kano</p>
                </div>
                <div class="text-center">
                    <div class="text-5xl md:text-6xl font-bold mb-2">25+</div>
                    <p class="text-blue-200">Years of Service</p>
                </div>
                <div class="text-center">
                    <div class="text-5xl md:text-6xl font-bold mb-2">50+</div>
                    <p class="text-blue-200">Community Programs</p>
                </div>
            </div>

            <div class="mt-16 max-w-4xl mx-auto">
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-8 border border-white/20">
                    <p class="text-lg text-blue-100 leading-relaxed text-center">
                        Through sustained community sensitization campaigns, rehabilitation and empowerment initiatives, and strategic media engagement, YOSPIS has recorded significant impact. The organization reaches over 10,000 people weekly through its Hasken Matasa radio program, sensitizes young adolescent girls on menstrual hygiene management and women's health, and has positively transformed the lives of over 700 repentant youth in Kano, supporting them to renounce violence and drop their arms.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Key Milestones -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-blue-600 font-semibold text-sm uppercase tracking-wider">Our Journey</span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-2">Key Milestones</h2>
            </div>

            <div class="max-w-3xl mx-auto">
                <div class="space-y-8">
                    <div class="flex gap-6">
                        <div class="flex flex-col items-center">
                            <div class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center text-white font-bold">
                                1997
                            </div>
                            <div class="w-0.5 h-full bg-blue-200 mt-4"></div>
                        </div>
                        <div class="pb-8">
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Organization Founded</h3>
                            <p class="text-gray-600">YOSPIS was established by passionate young Nigerians committed to addressing public health challenges and social vices affecting youth.</p>
                        </div>
                    </div>

                    <div class="flex gap-6">
                        <div class="flex flex-col items-center">
                            <div class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center text-white font-bold">
                                2002
                            </div>
                            <div class="w-0.5 h-full bg-blue-200 mt-4"></div>
                        </div>
                        <div class="pb-8">
                            <h3 class="text-xl font-bold text-gray-900 mb-2">CAC Registration</h3>
                            <p class="text-gray-600">Official registration with the Corporate Affairs Commission (CAC), establishing YOSPIS as a recognized NGO in Nigeria.</p>
                        </div>
                    </div>

                    <div class="flex gap-6">
                        <div class="flex flex-col items-center">
                            <div class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center text-white font-bold text-xs">
                                2010s
                            </div>
                            <div class="w-0.5 h-full bg-blue-200 mt-4"></div>
                        </div>
                        <div class="pb-8">
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Hasken Matasa Radio Launch</h3>
                            <p class="text-gray-600">Launch of the flagship radio program reaching over 10,000 people weekly with health education and awareness messages.</p>
                        </div>
                    </div>

                    <div class="flex gap-6">
                        <div class="flex flex-col items-center">
                            <div class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center text-white font-bold text-xs">
                                Today
                            </div>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Continued Impact</h3>
                            <p class="text-gray-600">Over 700 youth transformed, multiple ongoing programs, and partnerships with government agencies and development partners.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-gradient-to-br from-gray-900 to-black text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-3xl md:text-4xl font-bold mb-6">Join Our Mission</h2>
                <p class="text-xl text-gray-300 mb-10">
                    Driven by the belief that informed and empowered youth are central to building healthier and safer societies, we continue to champion inclusive and sustainable solutions.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('donate') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-4 rounded-lg font-semibold transition shadow-xl">
                        Support Our Work
                    </a>
                    <a href="{{ route('contact') }}" class="bg-transparent border-2 border-white text-white hover:bg-white hover:text-gray-900 px-8 py-4 rounded-lg font-semibold transition">
                        Get In Touch
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

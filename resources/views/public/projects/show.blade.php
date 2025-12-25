@extends('layouts.public')

@section('title', $project->title)
@section('meta_description', Str::limit($project->description, 160))

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-blue-900 via-blue-800 to-blue-900 text-white py-20 lg:py-28">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl">
                <a href="{{ route('projects') }}" class="inline-flex items-center text-blue-200 hover:text-white mb-6 transition">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                    Back to Projects
                </a>
                <span class="inline-block px-3 py-1 rounded-full text-sm font-medium mb-4 {{ $project->status === 'ongoing' ? 'bg-green-500 text-white' : ($project->status === 'completed' ? 'bg-gray-500 text-white' : 'bg-blue-500 text-white') }}">
                    {{ ucfirst($project->status) }}
                </span>
                <h1 class="text-4xl md:text-5xl font-bold leading-tight mb-6">
                    {{ $project->title }}
                </h1>
                <p class="text-xl text-blue-100 leading-relaxed">
                    {{ $project->description }}
                </p>
            </div>
        </div>
    </section>

    <!-- Project Details -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-3 gap-12">
                <!-- Main Content -->
                <div class="lg:col-span-2">
                    @if($project->featured_image)
                    <div class="aspect-video bg-gray-200 rounded-2xl overflow-hidden mb-8">
                        <img src="{{ Storage::url($project->featured_image) }}" alt="{{ $project->title }}" class="w-full h-full object-cover">
                    </div>
                    @endif

                    @if($project->content)
                    <div class="prose prose-lg max-w-none">
                        {!! nl2br(e($project->content)) !!}
                    </div>
                    @else
                    <div class="prose prose-lg max-w-none">
                        <p>{{ $project->description }}</p>
                    </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-1">
                    <div class="bg-gray-50 rounded-2xl p-8 sticky top-24">
                        <h3 class="text-xl font-bold text-gray-900 mb-6">Project Details</h3>
                        
                        <div class="space-y-6">
                            <div>
                                <span class="text-sm text-gray-500 uppercase tracking-wider">Status</span>
                                <p class="mt-1 font-medium text-gray-900">{{ ucfirst($project->status) }}</p>
                            </div>

                            @if($project->location)
                            <div>
                                <span class="text-sm text-gray-500 uppercase tracking-wider">Location</span>
                                <p class="mt-1 font-medium text-gray-900">{{ $project->location }}</p>
                            </div>
                            @endif

                            @if($project->beneficiaries)
                            <div>
                                <span class="text-sm text-gray-500 uppercase tracking-wider">Beneficiaries</span>
                                <p class="mt-1 font-medium text-gray-900">{{ $project->beneficiaries }}</p>
                            </div>
                            @endif

                            @if($project->start_date)
                            <div>
                                <span class="text-sm text-gray-500 uppercase tracking-wider">Start Date</span>
                                <p class="mt-1 font-medium text-gray-900">{{ $project->start_date->format('F d, Y') }}</p>
                            </div>
                            @endif

                            @if($project->end_date)
                            <div>
                                <span class="text-sm text-gray-500 uppercase tracking-wider">End Date</span>
                                <p class="mt-1 font-medium text-gray-900">{{ $project->end_date->format('F d, Y') }}</p>
                            </div>
                            @endif
                        </div>

                        <hr class="my-8 border-gray-200">

                        <div class="space-y-4">
                            <a href="{{ route('donate') }}" class="w-full bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-semibold transition text-center block">
                                Support This Project
                            </a>
                            <a href="{{ route('contact') }}" class="w-full bg-gray-200 hover:bg-gray-300 text-gray-800 px-6 py-3 rounded-lg font-semibold transition text-center block">
                                Contact Us
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

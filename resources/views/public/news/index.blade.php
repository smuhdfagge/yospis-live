@extends('layouts.public')

@section('title', 'News & Updates')
@section('meta_description', 'Stay updated with the latest news, stories, and updates from YOSPIS - Youth Society for the Prevention of Infectious Diseases and Social Vices.')

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-blue-900 via-blue-800 to-blue-900 text-white py-20 lg:py-28">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl">
                <span class="inline-block px-4 py-1.5 bg-blue-700/50 rounded-full text-blue-200 text-sm font-medium mb-6">
                    Stay Informed
                </span>
                <h1 class="text-4xl md:text-5xl font-bold leading-tight mb-6">
                    News & Updates
                </h1>
                <p class="text-xl text-blue-100 leading-relaxed">
                    Latest stories, updates, and insights from our work in public health and youth empowerment across Nigeria.
                </p>
            </div>
        </div>
    </section>

    <!-- News Grid -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($articles->count() > 0)
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($articles as $article)
                    <article class="group bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100">
                        <div class="aspect-video bg-gray-200 overflow-hidden">
                            @if($article->featured_image)
                                <img src="{{ Storage::url($article->featured_image) }}" alt="{{ $article->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-blue-600 to-blue-800 flex items-center justify-center">
                                    <svg class="w-16 h-16 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                                    </svg>
                                </div>
                            @endif
                        </div>
                        <div class="p-6">
                            <div class="flex items-center gap-4 text-sm text-gray-500 mb-3">
                                <time datetime="{{ $article->published_at->toISOString() }}">
                                    {{ $article->published_at->format('M d, Y') }}
                                </time>
                                @if($article->author)
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                    {{ $article->author->name }}
                                </span>
                                @endif
                            </div>
                            <h2 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-blue-600 transition line-clamp-2">
                                <a href="{{ route('news.show', $article) }}">
                                    {{ $article->title }}
                                </a>
                            </h2>
                            <p class="text-gray-600 mb-4 line-clamp-3">
                                {{ $article->excerpt ?? Str::limit(strip_tags($article->content), 150) }}
                            </p>
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

                <!-- Pagination -->
                @if($articles->hasPages())
                <div class="mt-12">
                    {{ $articles->links() }}
                </div>
                @endif
            @else
                <div class="text-center py-16">
                    <svg class="w-20 h-20 text-gray-300 mx-auto mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                    </svg>
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">No News Yet</h3>
                    <p class="text-gray-500 mb-8">Check back soon for updates on our programs and initiatives.</p>
                    <a href="{{ route('home') }}" class="inline-flex items-center text-blue-600 font-medium hover:text-blue-800 transition">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                        Back to Home
                    </a>
                </div>
            @endif
        </div>
    </section>

    <!-- Newsletter CTA -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-blue-800 rounded-3xl p-8 md:p-12 lg:p-16 text-center text-white">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Stay Connected</h2>
                <p class="text-xl text-blue-100 mb-8 max-w-2xl mx-auto">
                    Follow us on social media to stay updated with our latest news, events, and impact stories.
                </p>
                <div class="flex justify-center space-x-4">
                    <a href="#" class="w-12 h-12 bg-white/20 hover:bg-white hover:text-blue-800 rounded-full flex items-center justify-center transition">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M18.77,7.46H14.5v-1.9c0-.9.6-1.1,1-1.1h3V.5h-4.33C10.24.5,9.5,3.44,9.5,5.32v2.15h-3v4h3v12h5v-12h3.85l.42-4Z"/></svg>
                    </a>
                    <a href="#" class="w-12 h-12 bg-white/20 hover:bg-white hover:text-blue-800 rounded-full flex items-center justify-center transition">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                    </a>
                    <a href="#" class="w-12 h-12 bg-white/20 hover:bg-white hover:text-blue-800 rounded-full flex items-center justify-center transition">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                    </a>
                    <a href="#" class="w-12 h-12 bg-white/20 hover:bg-white hover:text-blue-800 rounded-full flex items-center justify-center transition">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

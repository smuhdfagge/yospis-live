@extends('layouts.public')

@section('title', 'Gallery - YOSPIS')

@section('content')
    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-blue-900 to-blue-800 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Our Gallery</h1>
                <p class="text-xl text-blue-100 max-w-2xl mx-auto">
                    Explore moments captured from our events, projects, and community initiatives
                </p>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="py-16 bg-gray-50" x-data="galleryViewer()">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Category Filter -->
            @if($categories->count() > 0)
                <div class="flex flex-wrap justify-center gap-3 mb-12">
                    <a href="{{ route('gallery') }}" 
                       class="px-6 py-2 rounded-full font-medium transition {{ !request('category') ? 'bg-blue-800 text-white' : 'bg-white text-gray-700 hover:bg-gray-100 border border-gray-300' }}">
                        All
                    </a>
                    @foreach($categories as $category)
                        <a href="{{ route('gallery', ['category' => $category]) }}" 
                           class="px-6 py-2 rounded-full font-medium transition {{ request('category') == $category ? 'bg-blue-800 text-white' : 'bg-white text-gray-700 hover:bg-gray-100 border border-gray-300' }}">
                            {{ ucfirst($category) }}
                        </a>
                    @endforeach
                </div>
            @endif

            <!-- Gallery Grid -->
            @if($galleries->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach($galleries as $index => $gallery)
                        <div class="group cursor-pointer" @click="openGallery({{ $index }})">
                            <div class="relative aspect-square overflow-hidden rounded-xl shadow-lg">
                                <img src="{{ $gallery->cover_image_url }}" alt="{{ $gallery->title }}" 
                                     class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <div class="absolute bottom-0 left-0 right-0 p-4">
                                        <h3 class="text-white font-semibold text-lg">{{ $gallery->title }}</h3>
                                        <p class="text-gray-200 text-sm">{{ ucfirst($gallery->category) }}</p>
                                    </div>
                                </div>
                                <!-- Image Count Badge -->
                                <div class="absolute top-3 right-3">
                                    <span class="px-2.5 py-1 text-xs font-semibold bg-black/60 text-white rounded-full backdrop-blur-sm">
                                        {{ $gallery->images->count() }} {{ Str::plural('photo', $gallery->images->count()) }}
                                    </span>
                                </div>
                                <!-- Zoom Icon -->
                                <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-12">
                    {{ $galleries->withQueryString()->links() }}
                </div>
            @else
                <div class="text-center py-16">
                    <svg class="w-20 h-20 text-gray-300 mx-auto mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <h3 class="text-xl font-semibold text-gray-700 mb-2">No galleries yet</h3>
                    <p class="text-gray-500">Check back soon for photos from our events and activities.</p>
                </div>
            @endif
        </div>

        <!-- Lightbox Modal -->
        <div x-show="isOpen" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/90"
             @click.self="closeModal()"
             @keydown.escape.window="closeModal()"
             @keydown.arrow-left.window="prevImage()"
             @keydown.arrow-right.window="nextImage()"
             style="display: none;">
            
            <!-- Close Button -->
            <button @click="closeModal()" class="absolute top-4 right-4 text-white hover:text-gray-300 transition z-10">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>

            <!-- Previous Button -->
            <button @click="prevImage()" x-show="currentImages.length > 1" class="absolute left-4 text-white hover:text-gray-300 transition z-10 p-2">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </button>

            <!-- Next Button -->
            <button @click="nextImage()" x-show="currentImages.length > 1" class="absolute right-4 text-white hover:text-gray-300 transition z-10 p-2">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </button>

            <!-- Image Container -->
            <div class="max-w-5xl max-h-[85vh] relative">
                <img :src="currentImageUrl" :alt="currentGalleryTitle" 
                     class="max-w-full max-h-[85vh] object-contain rounded-lg shadow-2xl">
                
                <!-- Image Info -->
                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-6 rounded-b-lg">
                    <h3 class="text-white text-xl font-semibold" x-text="currentGalleryTitle"></h3>
                    <p class="text-gray-300 text-sm mt-1" x-text="currentGalleryCategory"></p>
                    <p class="text-gray-400 text-sm mt-2" x-text="currentGalleryDescription" x-show="currentGalleryDescription"></p>
                </div>
            </div>

            <!-- Image Counter -->
            <div x-show="currentImages.length > 1" class="absolute bottom-4 left-1/2 transform -translate-x-1/2 text-white text-sm">
                <span x-text="imageIndex + 1"></span> / <span x-text="currentImages.length"></span>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-16 bg-blue-800 text-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold mb-4">Want to Be Part of Our Story?</h2>
            <p class="text-xl text-blue-100 mb-8">Join us in our mission to empower communities and create lasting change.</p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ route('contact') }}" class="px-8 py-3 bg-white text-blue-800 rounded-lg font-semibold hover:bg-gray-100 transition">
                    Get Involved
                </a>
                <a href="{{ route('donate') }}" class="px-8 py-3 border-2 border-white text-white rounded-lg font-semibold hover:bg-white hover:text-blue-800 transition">
                    Support Our Cause
                </a>
            </div>
        </div>
    </section>

    @php
        $galleriesData = $galleries->map(fn($g) => [
            'title' => $g->title,
            'category' => ucfirst($g->category),
            'description' => $g->description,
            'images' => $g->images->map(fn($img) => $img->image_url)->values(),
        ])->values();
    @endphp
    <script>
        function galleryViewer() {
            return {
                isOpen: false,
                galleryIndex: 0,
                imageIndex: 0,
                galleries: {!! json_encode($galleriesData) !!},

                get currentImages() {
                    return this.galleries[this.galleryIndex]?.images || [];
                },
                get currentImageUrl() {
                    return this.currentImages[this.imageIndex] || '';
                },
                get currentGalleryTitle() {
                    return this.galleries[this.galleryIndex]?.title || '';
                },
                get currentGalleryCategory() {
                    return this.galleries[this.galleryIndex]?.category || '';
                },
                get currentGalleryDescription() {
                    return this.galleries[this.galleryIndex]?.description || '';
                },

                openGallery(index) {
                    this.galleryIndex = index;
                    this.imageIndex = 0;
                    this.isOpen = true;
                    document.body.style.overflow = 'hidden';
                },

                closeModal() {
                    this.isOpen = false;
                    document.body.style.overflow = '';
                },

                nextImage() {
                    this.imageIndex = (this.imageIndex + 1) % this.currentImages.length;
                },

                prevImage() {
                    this.imageIndex = (this.imageIndex - 1 + this.currentImages.length) % this.currentImages.length;
                }
            }
        }
    </script>
@endsection

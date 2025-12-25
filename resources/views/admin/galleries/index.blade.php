@extends('layouts.admin')

@section('title', 'Gallery Management')
@section('header', 'Gallery Management')

@section('content')
<div class="space-y-6">
    <!-- Header Actions -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h2 class="text-xl font-semibold text-gray-900">All Gallery Images</h2>
            <p class="text-sm text-gray-600">Manage your photo gallery</p>
        </div>
        <a href="{{ route('admin.galleries.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-800 text-white rounded-lg hover:bg-blue-700 transition">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Add Image
        </a>
    </div>

    <!-- Filters -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4">
        <form method="GET" class="flex flex-col sm:flex-row gap-4">
            <div class="flex-1">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search images..." 
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
                <select name="category" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <option value="">All Categories</option>
                    @foreach($categories as $category)
                        <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }}>
                            {{ ucfirst($category) }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <select name="status" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <option value="">All Status</option>
                    <option value="published" {{ request('status') == 'published' ? 'selected' : '' }}>Published</option>
                    <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                </select>
            </div>
            <button type="submit" class="px-6 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-700 transition">
                Filter
            </button>
            @if(request()->hasAny(['search', 'category', 'status']))
                <a href="{{ route('admin.galleries.index') }}" class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition text-center">
                    Clear
                </a>
            @endif
        </form>
    </div>

    <!-- Gallery Grid -->
    @if($galleries->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach($galleries as $gallery)
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden group">
                    <!-- Image -->
                    <div class="relative aspect-square overflow-hidden">
                        <img src="{{ $gallery->image_url }}" alt="{{ $gallery->title }}" 
                             class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                        
                        <!-- Status Badge -->
                        <div class="absolute top-2 left-2">
                            @if($gallery->is_published)
                                <span class="px-2 py-1 text-xs font-medium bg-green-100 text-green-800 rounded-full">Published</span>
                            @else
                                <span class="px-2 py-1 text-xs font-medium bg-yellow-100 text-yellow-800 rounded-full">Draft</span>
                            @endif
                        </div>

                        <!-- Overlay Actions -->
                        <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center space-x-2">
                            <a href="{{ route('admin.galleries.edit', $gallery) }}" 
                               class="p-2 bg-white rounded-full hover:bg-gray-100 transition">
                                <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </a>
                            <form action="{{ route('admin.galleries.togglePublish', $gallery) }}" method="POST" class="inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="p-2 bg-white rounded-full hover:bg-gray-100 transition" title="{{ $gallery->is_published ? 'Unpublish' : 'Publish' }}">
                                    @if($gallery->is_published)
                                        <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21"/>
                                        </svg>
                                    @else
                                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    @endif
                                </button>
                            </form>
                            <form action="{{ route('admin.galleries.destroy', $gallery) }}" method="POST" class="inline" 
                                  onsubmit="return confirm('Are you sure you want to delete this image?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 bg-white rounded-full hover:bg-gray-100 transition">
                                    <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Info -->
                    <div class="p-4">
                        <h3 class="font-semibold text-gray-900 truncate">{{ $gallery->title }}</h3>
                        <p class="text-sm text-gray-500 mt-1">{{ ucfirst($gallery->category) }}</p>
                        @if($gallery->description)
                            <p class="text-sm text-gray-600 mt-2 line-clamp-2">{{ $gallery->description }}</p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $galleries->withQueryString()->links() }}
        </div>
    @else
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-12 text-center">
            <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
            <h3 class="text-lg font-medium text-gray-900 mb-2">No gallery images yet</h3>
            <p class="text-gray-600 mb-4">Start by adding your first image to the gallery.</p>
            <a href="{{ route('admin.galleries.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-800 text-white rounded-lg hover:bg-blue-700 transition">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Add First Image
            </a>
        </div>
    @endif
</div>
@endsection

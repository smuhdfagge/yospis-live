@extends('layouts.admin')

@section('title', 'Create Article')
@section('page_title', 'Create Article')

@section('content')
    <div class="max-w-4xl">
        <div class="mb-6">
            <a href="{{ route('admin.articles.index') }}" class="inline-flex items-center text-sm text-gray-500 hover:text-gray-700">
                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Back to Articles
            </a>
        </div>

        <div class="bg-white rounded-xl shadow-sm">
            <div class="p-6 border-b border-gray-200">
                <h2 class="text-lg font-semibold text-gray-900">Create New Article</h2>
                <p class="text-sm text-gray-500 mt-1">Write and publish a new article to the news section</p>
            </div>

            <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
                @csrf

                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title *</label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}" required
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition @error('title') border-red-500 @enderror"
                        placeholder="Enter article title">
                    @error('title')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="excerpt" class="block text-sm font-medium text-gray-700 mb-2">Excerpt</label>
                    <textarea name="excerpt" id="excerpt" rows="3"
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition resize-none @error('excerpt') border-red-500 @enderror"
                        placeholder="Brief summary of the article (optional)">{{ old('excerpt') }}</textarea>
                    @error('excerpt')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Content *</label>
                    <textarea name="content" id="content" rows="15" required
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition @error('content') border-red-500 @enderror"
                        placeholder="Write your article content here...">{{ old('content') }}</textarea>
                    @error('content')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="featured_image" class="block text-sm font-medium text-gray-700 mb-2">Featured Image</label>
                    <input type="file" name="featured_image" id="featured_image" accept="image/*"
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition @error('featured_image') border-red-500 @enderror">
                    <p class="text-xs text-gray-500 mt-1">Recommended size: 1200x630 pixels. Max 2MB.</p>
                    @error('featured_image')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status *</label>
                    <select name="status" id="status" required
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition @error('status') border-red-500 @enderror">
                        <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
                    </select>
                    @error('status')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200">
                    <a href="{{ route('admin.articles.index') }}" class="px-6 py-3 text-gray-700 hover:text-gray-900 font-medium transition">
                        Cancel
                    </a>
                    <button type="submit" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition">
                        Create Article
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

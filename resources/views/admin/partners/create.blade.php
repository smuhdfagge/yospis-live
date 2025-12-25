@extends('layouts.admin')

@section('title', 'Create Partner')
@section('page_title', 'Create Partner')

@section('content')
    <div class="max-w-4xl">
        <div class="mb-6">
            <a href="{{ route('admin.partners.index') }}" class="inline-flex items-center text-sm text-gray-500 hover:text-gray-700">
                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Back to Partners
            </a>
        </div>

        <div class="bg-white rounded-xl shadow-sm">
            <div class="p-6 border-b border-gray-200">
                <h2 class="text-lg font-semibold text-gray-900">Add New Partner</h2>
                <p class="text-sm text-gray-500 mt-1">Add a new partner or sponsor to display on the website</p>
            </div>

            <form action="{{ route('admin.partners.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
                @csrf

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Partner Name *</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition @error('name') border-red-500 @enderror"
                        placeholder="Enter partner name">
                    @error('name')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label for="type" class="block text-sm font-medium text-gray-700 mb-2">Partner Type *</label>
                        <select name="type" id="type" required
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition @error('type') border-red-500 @enderror">
                            <option value="">Select type</option>
                            <option value="donor" {{ old('type') == 'donor' ? 'selected' : '' }}>Donor/Funder</option>
                            <option value="implementing" {{ old('type') == 'implementing' ? 'selected' : '' }}>Implementing Partner</option>
                            <option value="government" {{ old('type') == 'government' ? 'selected' : '' }}>Government Agency</option>
                            <option value="media" {{ old('type') == 'media' ? 'selected' : '' }}>Media Partner</option>
                            <option value="corporate" {{ old('type') == 'corporate' ? 'selected' : '' }}>Corporate Partner</option>
                        </select>
                        @error('type')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="website" class="block text-sm font-medium text-gray-700 mb-2">Website URL</label>
                        <input type="url" name="website" id="website" value="{{ old('website') }}"
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition @error('website') border-red-500 @enderror"
                            placeholder="https://example.com">
                        @error('website')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                    <textarea name="description" id="description" rows="4"
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition resize-none @error('description') border-red-500 @enderror"
                        placeholder="Brief description of the partnership">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="logo" class="block text-sm font-medium text-gray-700 mb-2">Logo</label>
                    <input type="file" name="logo" id="logo" accept="image/*"
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition @error('logo') border-red-500 @enderror">
                    <p class="text-xs text-gray-500 mt-1">Recommended: PNG with transparent background. Max 1MB.</p>
                    @error('logo')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="sort_order" class="block text-sm font-medium text-gray-700 mb-2">Display Order</label>
                    <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', 0) }}" min="0"
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition @error('sort_order') border-red-500 @enderror"
                        placeholder="0">
                    <p class="text-xs text-gray-500 mt-1">Lower numbers appear first.</p>
                    @error('sort_order')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center">
                    <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
                        class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                    <label for="is_active" class="ml-2 text-sm text-gray-700">Active (display on website)</label>
                </div>

                <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200">
                    <a href="{{ route('admin.partners.index') }}" class="px-6 py-3 text-gray-700 hover:text-gray-900 font-medium transition">
                        Cancel
                    </a>
                    <button type="submit" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition">
                        Add Partner
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

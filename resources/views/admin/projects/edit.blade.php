@extends('layouts.admin')

@section('title', 'Edit Project')
@section('page_title', 'Edit Project')

@section('content')
    <div class="max-w-4xl">
        <div class="mb-6">
            <a href="{{ route('admin.projects.index') }}" class="inline-flex items-center text-sm text-gray-500 hover:text-gray-700">
                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Back to Projects
            </a>
        </div>

        <div class="bg-white rounded-xl shadow-sm">
            <div class="p-6 border-b border-gray-200">
                <h2 class="text-lg font-semibold text-gray-900">Edit Project</h2>
                <p class="text-sm text-gray-500 mt-1">Update project details</p>
            </div>

            <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title *</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $project->title) }}" required
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition @error('title') border-red-500 @enderror"
                        placeholder="Enter project title">
                    @error('title')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Short Description *</label>
                    <textarea name="description" id="description" rows="3" required
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition resize-none @error('description') border-red-500 @enderror"
                        placeholder="Brief description for project cards">{{ old('description', $project->description) }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Full Content</label>
                    <textarea name="content" id="content" rows="10"
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition @error('content') border-red-500 @enderror"
                        placeholder="Detailed project description...">{{ old('content', $project->content) }}</textarea>
                    @error('content')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status *</label>
                        <select name="status" id="status" required
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition @error('status') border-red-500 @enderror">
                            <option value="ongoing" {{ old('status', $project->status) == 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                            <option value="completed" {{ old('status', $project->status) == 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="upcoming" {{ old('status', $project->status) == 'upcoming' ? 'selected' : '' }}>Upcoming</option>
                        </select>
                        @error('status')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="location" class="block text-sm font-medium text-gray-700 mb-2">Location</label>
                        <input type="text" name="location" id="location" value="{{ old('location', $project->location) }}"
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition @error('location') border-red-500 @enderror"
                            placeholder="e.g., Kano, Nigeria">
                        @error('location')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label for="start_date" class="block text-sm font-medium text-gray-700 mb-2">Start Date</label>
                        <input type="date" name="start_date" id="start_date" value="{{ old('start_date', $project->start_date?->format('Y-m-d')) }}"
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition @error('start_date') border-red-500 @enderror">
                        @error('start_date')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="end_date" class="block text-sm font-medium text-gray-700 mb-2">End Date</label>
                        <input type="date" name="end_date" id="end_date" value="{{ old('end_date', $project->end_date?->format('Y-m-d')) }}"
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition @error('end_date') border-red-500 @enderror">
                        @error('end_date')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="beneficiaries" class="block text-sm font-medium text-gray-700 mb-2">Beneficiaries</label>
                    <input type="text" name="beneficiaries" id="beneficiaries" value="{{ old('beneficiaries', $project->beneficiaries) }}"
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition @error('beneficiaries') border-red-500 @enderror"
                        placeholder="e.g., 5,000+ youth">
                    @error('beneficiaries')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="featured_image" class="block text-sm font-medium text-gray-700 mb-2">Featured Image</label>
                    @if($project->featured_image)
                        <div class="mb-4">
                            <img src="{{ Storage::url($project->featured_image) }}" alt="Current image" class="w-48 h-32 object-cover rounded-lg">
                            <p class="text-xs text-gray-500 mt-1">Current image</p>
                        </div>
                    @endif
                    <input type="file" name="featured_image" id="featured_image" accept="image/*"
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition @error('featured_image') border-red-500 @enderror">
                    <p class="text-xs text-gray-500 mt-1">Leave empty to keep current image. Max 2MB.</p>
                    @error('featured_image')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center">
                    <input type="checkbox" name="is_featured" id="is_featured" value="1" {{ old('is_featured', $project->is_featured) ? 'checked' : '' }}
                        class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                    <label for="is_featured" class="ml-2 text-sm text-gray-700">Feature this project on the homepage</label>
                </div>

                <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200">
                    <a href="{{ route('admin.projects.index') }}" class="px-6 py-3 text-gray-700 hover:text-gray-900 font-medium transition">
                        Cancel
                    </a>
                    <button type="submit" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition">
                        Update Project
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

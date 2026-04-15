@extends('layouts.admin')

@section('title', 'Add Gallery Images')
@section('header', 'Add Gallery Images')

@section('content')
<div class="max-w-3xl">
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="p-6 space-y-6">
                <!-- Image Upload -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Images *</label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-blue-400 transition" 
                         x-data="{ files: [], previews: [] }"
                         @dragover.prevent="$el.classList.add('border-blue-400')"
                         @dragleave.prevent="$el.classList.remove('border-blue-400')"
                         @drop.prevent="
                            $el.classList.remove('border-blue-400');
                            const dt = new DataTransfer();
                            Array.from($event.dataTransfer.files).forEach(f => { if (f.type.startsWith('image/')) dt.items.add(f); });
                            $refs.fileInput.files = dt.files;
                            files = Array.from(dt.files).map(f => f.name);
                            previews = Array.from(dt.files).map(f => URL.createObjectURL(f));
                         ">
                        <div class="space-y-2 text-center">
                            <template x-if="previews.length > 0">
                                <div class="flex flex-wrap gap-2 justify-center">
                                    <template x-for="(src, i) in previews" :key="i">
                                        <img :src="src" class="h-24 w-24 rounded-lg object-cover">
                                    </template>
                                </div>
                            </template>
                            <template x-if="previews.length === 0">
                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </template>
                            <div class="flex text-sm text-gray-600 justify-center">
                                <label class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none">
                                    <span x-text="files.length ? files.length + ' file(s) selected' : 'Upload files'"></span>
                                    <input type="file" name="images[]" x-ref="fileInput" class="sr-only" accept="image/*" multiple required
                                           @change="
                                               files = Array.from($event.target.files).map(f => f.name);
                                               previews = Array.from($event.target.files).map(f => URL.createObjectURL(f));
                                           ">
                                </label>
                                <p class="pl-1" x-show="!files.length">or drag and drop</p>
                            </div>
                            <p class="text-xs text-gray-500">PNG, JPG, GIF, WEBP up to 5MB each. You can select multiple images.</p>
                        </div>
                    </div>
                    @error('images')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    @error('images.*')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Title -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title *</label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('title') border-red-500 @enderror"
                           placeholder="Enter image title">
                    @error('title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Category -->
                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Category *</label>
                    <div x-data="{ showCustom: false, categories: {{ json_encode($categories) }} }">
                        <select name="category" id="category" 
                                x-show="!showCustom"
                                :disabled="showCustom"
                                @change="if ($event.target.value === '__custom__') { showCustom = true; $event.target.value = ''; }"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Select category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category }}" {{ old('category') == $category ? 'selected' : '' }}>
                                    {{ ucfirst($category) }}
                                </option>
                            @endforeach
                            <option value="events" {{ old('category') == 'events' ? 'selected' : '' }}>Events</option>
                            <option value="projects" {{ old('category') == 'projects' ? 'selected' : '' }}>Projects</option>
                            <option value="team" {{ old('category') == 'team' ? 'selected' : '' }}>Team</option>
                            <option value="general" {{ old('category') == 'general' ? 'selected' : '' }}>General</option>
                            <option value="__custom__">+ Add new category</option>
                        </select>
                        <div x-show="showCustom" class="flex gap-2">
                            <input type="text" name="category" :disabled="!showCustom" placeholder="Enter new category"
                                   class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <button type="button" @click="showCustom = false" class="px-4 py-2 text-gray-600 hover:text-gray-800">
                                Cancel
                            </button>
                        </div>
                    </div>
                    @error('category')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                    <textarea name="description" id="description" rows="3"
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                              placeholder="Optional description for this image">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Sort Order -->
                <div>
                    <label for="sort_order" class="block text-sm font-medium text-gray-700 mb-2">Sort Order</label>
                    <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', 0) }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                           placeholder="0">
                    <p class="mt-1 text-sm text-gray-500">Lower numbers appear first</p>
                </div>

                <!-- Published -->
                <div class="flex items-center">
                    <input type="checkbox" name="is_published" id="is_published" value="1" {{ old('is_published', true) ? 'checked' : '' }}
                           class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <label for="is_published" class="ml-2 block text-sm text-gray-700">
                        Publish immediately
                    </label>
                </div>
            </div>

            <!-- Actions -->
            <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex justify-end space-x-3">
                <a href="{{ route('admin.galleries.index') }}" class="px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition">
                    Cancel
                </a>
                <button type="submit" class="px-4 py-2 bg-blue-800 text-white rounded-lg hover:bg-blue-700 transition">
                    Add Images
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

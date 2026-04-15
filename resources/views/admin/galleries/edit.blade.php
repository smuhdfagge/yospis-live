@extends('layouts.admin')

@section('title', 'Edit Gallery')
@section('header', 'Edit Gallery')

@section('content')
<div class="max-w-3xl">
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <form action="{{ route('admin.galleries.update', $gallery) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="p-6 space-y-6">
                <!-- Current Images -->
                @if($gallery->images->count() > 0)
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Current Images</label>
                    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
                        @foreach($gallery->images as $img)
                            <div class="relative group" x-data="{ marked: false }">
                                <img src="{{ $img->image_url }}" alt="" class="h-32 w-full rounded-lg object-cover" :class="marked && 'opacity-40'">
                                <label class="absolute top-2 right-2 cursor-pointer">
                                    <input type="checkbox" name="remove_images[]" value="{{ $img->id }}" class="sr-only" x-model="marked">
                                    <span class="flex items-center justify-center w-6 h-6 rounded-full text-xs font-bold transition"
                                          :class="marked ? 'bg-red-600 text-white' : 'bg-white/80 text-red-600 opacity-0 group-hover:opacity-100'">
                                        &times;
                                    </span>
                                </label>
                                <p x-show="marked" class="absolute bottom-1 left-0 right-0 text-center text-xs text-red-600 font-medium">Will be removed</p>
                            </div>
                        @endforeach
                    </div>
                    <p class="mt-2 text-xs text-gray-500">Click the &times; on an image to mark it for removal.</p>
                </div>
                @endif

                <!-- Add More Images -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Add More Images</label>
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
                                    <input type="file" name="images[]" x-ref="fileInput" class="sr-only" accept="image/*" multiple
                                           @change="
                                               files = Array.from($event.target.files).map(f => f.name);
                                               previews = Array.from($event.target.files).map(f => URL.createObjectURL(f));
                                           ">
                                </label>
                                <p class="pl-1" x-show="!files.length">or drag and drop</p>
                            </div>
                            <p class="text-xs text-gray-500">PNG, JPG, GIF, WEBP up to 5MB each</p>
                        </div>
                    </div>
                    @error('images.*')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Title -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title *</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $gallery->title) }}" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('title') border-red-500 @enderror"
                           placeholder="Enter gallery title">
                    @error('title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Category -->
                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Category *</label>
                    <div x-data="{ showCustom: false }">
                        <select name="category" id="category" 
                                x-show="!showCustom"
                                :disabled="showCustom"
                                @change="if ($event.target.value === '__custom__') { showCustom = true; $event.target.value = ''; }"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Select category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category }}" {{ old('category', $gallery->category) == $category ? 'selected' : '' }}>
                                    {{ ucfirst($category) }}
                                </option>
                            @endforeach
                            <option value="events" {{ old('category', $gallery->category) == 'events' ? 'selected' : '' }}>Events</option>
                            <option value="projects" {{ old('category', $gallery->category) == 'projects' ? 'selected' : '' }}>Projects</option>
                            <option value="team" {{ old('category', $gallery->category) == 'team' ? 'selected' : '' }}>Team</option>
                            <option value="general" {{ old('category', $gallery->category) == 'general' ? 'selected' : '' }}>General</option>
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
                              placeholder="Optional description">{{ old('description', $gallery->description) }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Sort Order -->
                <div>
                    <label for="sort_order" class="block text-sm font-medium text-gray-700 mb-2">Sort Order</label>
                    <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', $gallery->sort_order) }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                           placeholder="0">
                    <p class="mt-1 text-sm text-gray-500">Lower numbers appear first</p>
                </div>

                <!-- Published -->
                <div class="flex items-center">
                    <input type="checkbox" name="is_published" id="is_published" value="1" {{ old('is_published', $gallery->is_published) ? 'checked' : '' }}
                           class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <label for="is_published" class="ml-2 block text-sm text-gray-700">
                        Published
                    </label>
                </div>
            </div>

            <!-- Actions -->
            <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex justify-between">
                <a href="{{ route('admin.galleries.index') }}" class="px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition">
                    Cancel
                </a>
                <button type="submit" class="px-4 py-2 bg-blue-800 text-white rounded-lg hover:bg-blue-700 transition">
                    Update Gallery
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

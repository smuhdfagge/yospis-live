@extends('layouts.admin')

@section('title', 'Projects')
@section('page_title', 'Projects')

@section('content')
    <div class="bg-white rounded-xl shadow-sm">
        <!-- Header -->
        <div class="p-6 border-b border-gray-200">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h2 class="text-lg font-semibold text-gray-900">All Projects</h2>
                    <p class="text-sm text-gray-500 mt-1">Manage organization projects and initiatives</p>
                </div>
                <a href="{{ route('admin.projects.create') }}" class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    New Project
                </a>
            </div>
        </div>

        <!-- Bulk Actions Bar (Hidden by default) -->
        <div id="bulk-actions-bar" class="hidden p-4 bg-gray-50 border-b border-gray-200">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div class="flex items-center space-x-2">
                    <span id="selected-count" class="text-sm font-medium text-gray-700">0 selected</span>
                    <button type="button" id="clear-selection" class="text-sm text-blue-600 hover:text-blue-800">
                        Clear selection
                    </button>
                </div>
                <div class="flex flex-wrap items-center gap-2">
                    <button type="button" data-action="set_ongoing" class="bulk-action-btn inline-flex items-center px-3 py-1.5 text-sm font-medium rounded-lg bg-green-100 text-green-700 hover:bg-green-200 transition">
                        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                        Ongoing
                    </button>
                    <button type="button" data-action="set_completed" class="bulk-action-btn inline-flex items-center px-3 py-1.5 text-sm font-medium rounded-lg bg-blue-100 text-blue-700 hover:bg-blue-200 transition">
                        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Completed
                    </button>
                    <button type="button" data-action="set_upcoming" class="bulk-action-btn inline-flex items-center px-3 py-1.5 text-sm font-medium rounded-lg bg-yellow-100 text-yellow-700 hover:bg-yellow-200 transition">
                        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Upcoming
                    </button>
                    <button type="button" data-action="feature" class="bulk-action-btn inline-flex items-center px-3 py-1.5 text-sm font-medium rounded-lg bg-amber-100 text-amber-700 hover:bg-amber-200 transition">
                        <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                        </svg>
                        Feature
                    </button>
                    <button type="button" data-action="unfeature" class="bulk-action-btn inline-flex items-center px-3 py-1.5 text-sm font-medium rounded-lg bg-gray-100 text-gray-700 hover:bg-gray-200 transition">
                        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                        </svg>
                        Unfeature
                    </button>
                    <button type="button" data-action="delete" class="bulk-action-btn inline-flex items-center px-3 py-1.5 text-sm font-medium rounded-lg bg-red-100 text-red-700 hover:bg-red-200 transition">
                        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                        Delete
                    </button>
                </div>
            </div>
        </div>

        <!-- Hidden form for bulk actions -->
        <form id="bulk-action-form" action="{{ route('admin.projects.bulkAction') }}" method="POST" class="hidden">
            @csrf
            <input type="hidden" name="action" id="bulk-action-type">
            <div id="bulk-project-ids"></div>
        </form>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left">
                            <input type="checkbox" id="select-all" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500 cursor-pointer">
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Project</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Location</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Featured</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($projects as $project)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">
                                <input type="checkbox" class="project-checkbox rounded border-gray-300 text-blue-600 focus:ring-blue-500 cursor-pointer" value="{{ $project->id }}">
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    @if($project->featured_image)
                                        <img src="{{ Storage::url($project->featured_image) }}" alt="" class="w-12 h-12 rounded-lg object-cover mr-4">
                                    @else
                                        <div class="w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center mr-4">
                                            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                            </svg>
                                        </div>
                                    @endif
                                    <div class="min-w-0 flex-1">
                                        <h3 class="text-sm font-medium text-gray-900 truncate">{{ $project->title }}</h3>
                                        <p class="text-sm text-gray-500 truncate">{{ Str::limit($project->description, 60) }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($project->status === 'ongoing')
                                    <span class="px-2 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">Ongoing</span>
                                @elseif($project->status === 'completed')
                                    <span class="px-2 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-800">Completed</span>
                                @else
                                    <span class="px-2 py-1 text-xs font-medium rounded-full bg-yellow-100 text-yellow-800">Upcoming</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $project->location ?? '-' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($project->is_featured)
                                    <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                    </svg>
                                @else
                                    <svg class="w-5 h-5 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                                    </svg>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex items-center justify-end space-x-2">
                                    <a href="{{ route('projects.show', $project) }}" target="_blank" class="text-gray-400 hover:text-gray-600" title="View">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                        </svg>
                                    </a>
                                    <a href="{{ route('admin.projects.edit', $project) }}" class="text-blue-600 hover:text-blue-800" title="Edit">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </a>
                                    <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this project?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800" title="Delete">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center">
                                <svg class="w-12 h-12 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                </svg>
                                <p class="text-gray-500 mb-4">No projects yet</p>
                                <a href="{{ route('admin.projects.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition">
                                    Create your first project
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($projects->hasPages())
            <div class="p-6 border-t border-gray-200">
                {{ $projects->links() }}
            </div>
        @endif
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selectAllCheckbox = document.getElementById('select-all');
            const projectCheckboxes = document.querySelectorAll('.project-checkbox');
            const bulkActionsBar = document.getElementById('bulk-actions-bar');
            const selectedCountEl = document.getElementById('selected-count');
            const clearSelectionBtn = document.getElementById('clear-selection');
            const bulkActionBtns = document.querySelectorAll('.bulk-action-btn');
            const bulkActionForm = document.getElementById('bulk-action-form');
            const bulkActionType = document.getElementById('bulk-action-type');
            const bulkProjectIds = document.getElementById('bulk-project-ids');

            function updateBulkActionsUI() {
                const checkedBoxes = document.querySelectorAll('.project-checkbox:checked');
                const count = checkedBoxes.length;

                if (count > 0) {
                    bulkActionsBar.classList.remove('hidden');
                    selectedCountEl.textContent = count + ' selected';
                } else {
                    bulkActionsBar.classList.add('hidden');
                }

                // Update select all checkbox state
                if (count === 0) {
                    selectAllCheckbox.checked = false;
                    selectAllCheckbox.indeterminate = false;
                } else if (count === projectCheckboxes.length) {
                    selectAllCheckbox.checked = true;
                    selectAllCheckbox.indeterminate = false;
                } else {
                    selectAllCheckbox.checked = false;
                    selectAllCheckbox.indeterminate = true;
                }
            }

            // Select all checkbox handler
            selectAllCheckbox.addEventListener('change', function() {
                projectCheckboxes.forEach(checkbox => {
                    checkbox.checked = this.checked;
                });
                updateBulkActionsUI();
            });

            // Individual checkbox handlers
            projectCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', updateBulkActionsUI);
            });

            // Clear selection button
            clearSelectionBtn.addEventListener('click', function() {
                projectCheckboxes.forEach(checkbox => {
                    checkbox.checked = false;
                });
                selectAllCheckbox.checked = false;
                selectAllCheckbox.indeterminate = false;
                updateBulkActionsUI();
            });

            // Bulk action buttons
            bulkActionBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    const action = this.dataset.action;
                    const checkedBoxes = document.querySelectorAll('.project-checkbox:checked');

                    if (checkedBoxes.length === 0) {
                        alert('Please select at least one project.');
                        return;
                    }

                    let confirmMessage = '';
                    switch(action) {
                        case 'set_ongoing':
                            confirmMessage = 'Mark ' + checkedBoxes.length + ' project(s) as ongoing?';
                            break;
                        case 'set_completed':
                            confirmMessage = 'Mark ' + checkedBoxes.length + ' project(s) as completed?';
                            break;
                        case 'set_upcoming':
                            confirmMessage = 'Mark ' + checkedBoxes.length + ' project(s) as upcoming?';
                            break;
                        case 'feature':
                            confirmMessage = 'Mark ' + checkedBoxes.length + ' project(s) as featured?';
                            break;
                        case 'unfeature':
                            confirmMessage = 'Remove ' + checkedBoxes.length + ' project(s) from featured?';
                            break;
                        case 'delete':
                            confirmMessage = 'Are you sure you want to delete ' + checkedBoxes.length + ' project(s)? This action cannot be undone.';
                            break;
                    }

                    if (confirm(confirmMessage)) {
                        bulkActionType.value = action;
                        bulkProjectIds.innerHTML = '';

                        checkedBoxes.forEach(checkbox => {
                            const input = document.createElement('input');
                            input.type = 'hidden';
                            input.name = 'project_ids[]';
                            input.value = checkbox.value;
                            bulkProjectIds.appendChild(input);
                        });

                        bulkActionForm.submit();
                    }
                });
            });
        });
    </script>
    @endpush
@endsection

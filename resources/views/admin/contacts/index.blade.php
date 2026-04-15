@extends('layouts.admin')

@section('title', 'Contact Messages')
@section('page_title', 'Contact Messages')

@section('content')
    <div class="bg-white rounded-xl shadow-sm">
        <!-- Header -->
        <div class="p-6 border-b border-gray-200">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h2 class="text-lg font-semibold text-gray-900">All Messages</h2>
                    <p class="text-sm text-gray-500 mt-1">View and respond to contact form submissions</p>
                </div>
                <div class="flex items-center space-x-4 text-sm">
                    <span class="flex items-center">
                        <span class="w-2 h-2 bg-blue-600 rounded-full mr-2"></span>
                        <span class="text-gray-600">{{ $contacts->where('status', 'unread')->count() }} Unread</span>
                    </span>
                </div>
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
                <div class="flex items-center space-x-2">
                    <button type="button" data-action="mark_read" class="bulk-action-btn inline-flex items-center px-3 py-1.5 text-sm font-medium rounded-lg bg-green-100 text-green-700 hover:bg-green-200 transition">
                        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Mark as Read
                    </button>
                    <button type="button" data-action="mark_unread" class="bulk-action-btn inline-flex items-center px-3 py-1.5 text-sm font-medium rounded-lg bg-blue-100 text-blue-700 hover:bg-blue-200 transition">
                        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        Mark as Unread
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
        <form id="bulk-action-form" action="{{ route('admin.contacts.bulkAction') }}" method="POST" class="hidden">
            @csrf
            <input type="hidden" name="action" id="bulk-action-type">
            <div id="bulk-contact-ids"></div>
        </form>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left">
                            <input type="checkbox" id="select-all" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500 cursor-pointer">
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Sender</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Subject</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($contacts as $contact)
                        <tr class="hover:bg-gray-50 {{ $contact->status === 'unread' ? 'bg-blue-50/50' : '' }}">
                            <td class="px-6 py-4">
                                <input type="checkbox" class="contact-checkbox rounded border-gray-300 text-blue-600 focus:ring-blue-500 cursor-pointer" value="{{ $contact->id }}">
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center flex-shrink-0">
                                        <span class="text-gray-600 font-medium text-sm">{{ substr($contact->name, 0, 1) }}</span>
                                    </div>
                                    <div class="ml-4">
                                        <div class="flex items-center">
                                            <h3 class="text-sm font-medium text-gray-900">{{ $contact->name }}</h3>
                                            @if($contact->status === 'unread')
                                                <span class="w-2 h-2 bg-blue-600 rounded-full ml-2"></span>
                                            @endif
                                        </div>
                                        <p class="text-sm text-gray-500">{{ $contact->email }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <p class="text-sm text-gray-900">{{ $contact->subject }}</p>
                                <p class="text-sm text-gray-500 truncate max-w-xs">{{ Str::limit($contact->message, 50) }}</p>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($contact->status === 'unread')
                                    <span class="px-2 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-800">Unread</span>
                                @elseif($contact->status === 'read')
                                    <span class="px-2 py-1 text-xs font-medium rounded-full bg-gray-100 text-gray-800">Read</span>
                                @else
                                    <span class="px-2 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">Replied</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $contact->created_at->format('M d, Y') }}
                                <br>
                                <span class="text-xs">{{ $contact->created_at->format('h:i A') }}</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex items-center justify-end space-x-2">
                                    <a href="{{ route('admin.contacts.show', $contact) }}" class="text-blue-600 hover:text-blue-800" title="View">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </a>
                                    @if($contact->status === 'unread')
                                        <form action="{{ route('admin.contacts.markAsRead', $contact) }}" method="POST" class="inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="text-gray-400 hover:text-gray-600" title="Mark as Read">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                                </svg>
                                            </button>
                                        </form>
                                    @endif
                                    <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this message?')">
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
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                                <p class="text-gray-500">No messages yet</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($contacts->hasPages())
            <div class="p-6 border-t border-gray-200">
                {{ $contacts->links() }}
            </div>
        @endif
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selectAllCheckbox = document.getElementById('select-all');
            const contactCheckboxes = document.querySelectorAll('.contact-checkbox');
            const bulkActionsBar = document.getElementById('bulk-actions-bar');
            const selectedCountEl = document.getElementById('selected-count');
            const clearSelectionBtn = document.getElementById('clear-selection');
            const bulkActionBtns = document.querySelectorAll('.bulk-action-btn');
            const bulkActionForm = document.getElementById('bulk-action-form');
            const bulkActionType = document.getElementById('bulk-action-type');
            const bulkContactIds = document.getElementById('bulk-contact-ids');

            function updateBulkActionsUI() {
                const checkedBoxes = document.querySelectorAll('.contact-checkbox:checked');
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
                } else if (count === contactCheckboxes.length) {
                    selectAllCheckbox.checked = true;
                    selectAllCheckbox.indeterminate = false;
                } else {
                    selectAllCheckbox.checked = false;
                    selectAllCheckbox.indeterminate = true;
                }
            }

            // Select all checkbox handler
            selectAllCheckbox.addEventListener('change', function() {
                contactCheckboxes.forEach(checkbox => {
                    checkbox.checked = this.checked;
                });
                updateBulkActionsUI();
            });

            // Individual checkbox handlers
            contactCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', updateBulkActionsUI);
            });

            // Clear selection button
            clearSelectionBtn.addEventListener('click', function() {
                contactCheckboxes.forEach(checkbox => {
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
                    const checkedBoxes = document.querySelectorAll('.contact-checkbox:checked');

                    if (checkedBoxes.length === 0) {
                        alert('Please select at least one message.');
                        return;
                    }

                    let confirmMessage = '';
                    switch(action) {
                        case 'mark_read':
                            confirmMessage = 'Mark ' + checkedBoxes.length + ' message(s) as read?';
                            break;
                        case 'mark_unread':
                            confirmMessage = 'Mark ' + checkedBoxes.length + ' message(s) as unread?';
                            break;
                        case 'delete':
                            confirmMessage = 'Are you sure you want to delete ' + checkedBoxes.length + ' message(s)? This action cannot be undone.';
                            break;
                    }

                    if (confirm(confirmMessage)) {
                        bulkActionType.value = action;
                        bulkContactIds.innerHTML = '';

                        checkedBoxes.forEach(checkbox => {
                            const input = document.createElement('input');
                            input.type = 'hidden';
                            input.name = 'contact_ids[]';
                            input.value = checkbox.value;
                            bulkContactIds.appendChild(input);
                        });

                        bulkActionForm.submit();
                    }
                });
            });
        });
    </script>
    @endpush
@endsection

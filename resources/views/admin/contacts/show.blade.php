@extends('layouts.admin')

@section('title', 'View Message')
@section('page_title', 'View Message')

@section('content')
    <div class="max-w-4xl">
        <div class="mb-6">
            <a href="{{ route('admin.contacts.index') }}" class="inline-flex items-center text-sm text-gray-500 hover:text-gray-700">
                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Back to Messages
            </a>
        </div>

        <div class="grid lg:grid-cols-3 gap-6">
            <!-- Message Content -->
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white rounded-xl shadow-sm">
                    <div class="p-6 border-b border-gray-200">
                        <div class="flex items-center justify-between">
                            <h2 class="text-lg font-semibold text-gray-900">{{ $contact->subject }}</h2>
                            @if($contact->status === 'unread')
                                <span class="px-2 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-800">Unread</span>
                            @elseif($contact->status === 'read')
                                <span class="px-2 py-1 text-xs font-medium rounded-full bg-gray-100 text-gray-800">Read</span>
                            @else
                                <span class="px-2 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">Replied</span>
                            @endif
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="prose max-w-none">
                            {!! nl2br(e($contact->message)) !!}
                        </div>
                    </div>
                </div>

                <!-- Reply Form -->
                @if($contact->status !== 'replied')
                    <div class="bg-white rounded-xl shadow-sm">
                        <div class="p-6 border-b border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-900">Send Reply</h3>
                        </div>
                        <form action="{{ route('admin.contacts.reply', $contact) }}" method="POST" class="p-6">
                            @csrf
                            <div class="mb-4">
                                <label for="reply" class="block text-sm font-medium text-gray-700 mb-2">Your Reply *</label>
                                <textarea name="reply" id="reply" rows="6" required
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition resize-none @error('reply') border-red-500 @enderror"
                                    placeholder="Type your reply here...">{{ old('reply') }}</textarea>
                                @error('reply')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="flex items-center justify-end">
                                <button type="submit" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition">
                                    Send Reply
                                </button>
                            </div>
                        </form>
                    </div>
                @else
                    <!-- Show Reply -->
                    <div class="bg-white rounded-xl shadow-sm">
                        <div class="p-6 border-b border-gray-200">
                            <div class="flex items-center justify-between">
                                <h3 class="text-lg font-semibold text-gray-900">Your Reply</h3>
                                <span class="text-sm text-gray-500">{{ $contact->replied_at->format('M d, Y h:i A') }}</span>
                            </div>
                        </div>
                        <div class="p-6 bg-green-50">
                            <div class="prose max-w-none">
                                {!! nl2br(e($contact->admin_reply)) !!}
                            </div>
                            @if($contact->repliedByUser)
                                <p class="mt-4 text-sm text-gray-500">Replied by: {{ $contact->repliedByUser->name }}</p>
                            @endif
                        </div>
                    </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Sender Info -->
                <div class="bg-white rounded-xl shadow-sm">
                    <div class="p-6 border-b border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900">Sender Details</h3>
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                                <span class="text-blue-600 font-semibold text-lg">{{ substr($contact->name, 0, 1) }}</span>
                            </div>
                            <div class="ml-4">
                                <h4 class="font-medium text-gray-900">{{ $contact->name }}</h4>
                            </div>
                        </div>

                        <div>
                            <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">Email</p>
                            <a href="mailto:{{ $contact->email }}" class="text-sm text-blue-600 hover:text-blue-800">{{ $contact->email }}</a>
                        </div>

                        @if($contact->phone)
                            <div>
                                <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">Phone</p>
                                <a href="tel:{{ $contact->phone }}" class="text-sm text-blue-600 hover:text-blue-800">{{ $contact->phone }}</a>
                            </div>
                        @endif

                        @if($contact->organization)
                            <div>
                                <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">Organization</p>
                                <p class="text-sm text-gray-900">{{ $contact->organization }}</p>
                            </div>
                        @endif

                        <div>
                            <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">Received</p>
                            <p class="text-sm text-gray-900">{{ $contact->created_at->format('M d, Y') }}</p>
                            <p class="text-xs text-gray-500">{{ $contact->created_at->format('h:i A') }}</p>
                        </div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <h3 class="font-semibold text-gray-900 mb-4">Actions</h3>
                    <div class="space-y-2">
                        <a href="mailto:{{ $contact->email }}" class="flex items-center w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-lg transition">
                            <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            Open in Email Client
                        </a>
                        @if($contact->phone)
                            <a href="tel:{{ $contact->phone }}" class="flex items-center w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-lg transition">
                                <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                                Call Sender
                            </a>
                        @endif
                        <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this message?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="flex items-center w-full px-4 py-2 text-sm text-red-600 hover:bg-red-50 rounded-lg transition">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                                Delete Message
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

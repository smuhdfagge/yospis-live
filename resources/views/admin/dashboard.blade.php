@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page_title', 'Dashboard')

@section('content')
    <!-- Stats Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total Articles -->
        <div class="bg-white rounded-xl shadow-sm p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Total Articles</p>
                    <p class="text-3xl font-bold text-gray-900 mt-1">{{ $stats['total_articles'] ?? 0 }}</p>
                </div>
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                    </svg>
                </div>
            </div>
            <a href="{{ route('admin.articles.index') }}" class="inline-flex items-center text-sm text-blue-600 hover:text-blue-800 mt-4">
                View all
                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </div>

        <!-- Unread Messages -->
        <div class="bg-white rounded-xl shadow-sm p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Unread Messages</p>
                    <p class="text-3xl font-bold text-gray-900 mt-1">{{ $stats['unread_contacts'] ?? 0 }}</p>
                </div>
                <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
            </div>
            <a href="{{ route('admin.contacts.index') }}" class="inline-flex items-center text-sm text-blue-600 hover:text-blue-800 mt-4">
                View all
                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </div>

        <!-- Active Projects -->
        <div class="bg-white rounded-xl shadow-sm p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Active Projects</p>
                    <p class="text-3xl font-bold text-gray-900 mt-1">{{ $stats['total_projects'] ?? 0 }}</p>
                </div>
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                </div>
            </div>
            <a href="{{ route('admin.projects.index') }}" class="inline-flex items-center text-sm text-blue-600 hover:text-blue-800 mt-4">
                View all
                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </div>

        <!-- Partners -->
        <div class="bg-white rounded-xl shadow-sm p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Active Partners</p>
                    <p class="text-3xl font-bold text-gray-900 mt-1">{{ $stats['active_partners'] ?? 0 }}</p>
                </div>
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
            </div>
            <a href="{{ route('admin.partners.index') }}" class="inline-flex items-center text-sm text-blue-600 hover:text-blue-800 mt-4">
                View all
                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </div>
    </div>

    <div class="grid lg:grid-cols-2 gap-8">
        <!-- Recent Articles -->
        <div class="bg-white rounded-xl shadow-sm">
            <div class="p-6 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <h2 class="text-lg font-semibold text-gray-900">Recent Articles</h2>
                    <a href="{{ route('admin.articles.create') }}" class="text-sm text-blue-600 hover:text-blue-800">+ New Article</a>
                </div>
            </div>
            <div class="divide-y divide-gray-200">
                @forelse($recentArticles ?? [] as $article)
                    <div class="p-6">
                        <div class="flex items-start justify-between">
                            <div class="flex-1 min-w-0">
                                <h3 class="text-sm font-medium text-gray-900 truncate">{{ $article->title }}</h3>
                                <p class="text-sm text-gray-500 mt-1">{{ $article->created_at->format('M d, Y') }}</p>
                            </div>
                            <span class="ml-4 px-2 py-1 text-xs font-medium rounded-full {{ $article->status === 'published' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                {{ ucfirst($article->status) }}
                            </span>
                        </div>
                    </div>
                @empty
                    <div class="p-6 text-center text-gray-500">
                        <p>No articles yet.</p>
                        <a href="{{ route('admin.articles.create') }}" class="text-blue-600 hover:text-blue-800 mt-2 inline-block">Create your first article</a>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Recent Messages -->
        <div class="bg-white rounded-xl shadow-sm">
            <div class="p-6 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <h2 class="text-lg font-semibold text-gray-900">Recent Messages</h2>
                    <a href="{{ route('admin.contacts.index') }}" class="text-sm text-blue-600 hover:text-blue-800">View All</a>
                </div>
            </div>
            <div class="divide-y divide-gray-200">
                @forelse($recentContacts ?? [] as $contact)
                    <a href="{{ route('admin.contacts.show', $contact) }}" class="block p-6 hover:bg-gray-50 transition">
                        <div class="flex items-start">
                            <div class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center flex-shrink-0">
                                <span class="text-gray-600 font-medium text-sm">{{ substr($contact->name, 0, 1) }}</span>
                            </div>
                            <div class="ml-4 flex-1 min-w-0">
                                <div class="flex items-center justify-between">
                                    <h3 class="text-sm font-medium text-gray-900">{{ $contact->name }}</h3>
                                    @if($contact->status === 'unread')
                                        <span class="w-2 h-2 bg-blue-600 rounded-full"></span>
                                    @endif
                                </div>
                                <p class="text-sm text-gray-600 mt-1">{{ $contact->subject }}</p>
                                <p class="text-xs text-gray-400 mt-1">{{ $contact->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="p-6 text-center text-gray-500">
                        <p>No messages yet.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="mt-8">
        <h2 class="text-lg font-semibold text-gray-900 mb-4">Quick Actions</h2>
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
            <a href="{{ route('admin.articles.create') }}" class="bg-white rounded-xl shadow-sm p-6 text-center hover:shadow-md transition">
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mx-auto mb-3">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                </div>
                <p class="text-sm font-medium text-gray-900">New Article</p>
            </a>

            <a href="{{ route('admin.projects.create') }}" class="bg-white rounded-xl shadow-sm p-6 text-center hover:shadow-md transition">
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mx-auto mb-3">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                </div>
                <p class="text-sm font-medium text-gray-900">New Project</p>
            </a>

            <a href="{{ route('admin.partners.create') }}" class="bg-white rounded-xl shadow-sm p-6 text-center hover:shadow-md transition">
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mx-auto mb-3">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                </div>
                <p class="text-sm font-medium text-gray-900">New Partner</p>
            </a>

            <a href="{{ route('home') }}" target="_blank" class="bg-white rounded-xl shadow-sm p-6 text-center hover:shadow-md transition">
                <div class="w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center mx-auto mb-3">
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                    </svg>
                </div>
                <p class="text-sm font-medium text-gray-900">View Site</p>
            </a>
        </div>
    </div>
@endsection

@extends('admin.layout')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Stats Cards -->
    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-600 font-medium">Total Posts</p>
                <p class="text-3xl font-bold text-gray-900 mt-2">{{ $stats['posts'] }}</p>
            </div>
            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                </svg>
            </div>
        </div>
    </div>

    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-600 font-medium">Published</p>
                <p class="text-3xl font-bold text-green-600 mt-2">{{ $stats['published_posts'] }}</p>
            </div>
            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
        </div>
    </div>

    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-600 font-medium">Portfolio projects</p>
                <p class="text-3xl font-bold text-gray-900 mt-2">{{ $stats['products'] }}</p>
            </div>
            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                </svg>
            </div>
        </div>
    </div>

    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-600 font-medium">Unread Messages</p>
                <p class="text-3xl font-bold text-red-600 mt-2">{{ $stats['unread_contacts'] }}</p>
            </div>
            <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center">
                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
            </div>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Recent Posts -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-lg font-semibold text-gray-900">Recent Posts</h2>
        </div>
        <div class="p-6">
            @if($recent_posts->count() > 0)
                <div class="space-y-4">
                    @foreach($recent_posts as $post)
                        <div class="flex items-center justify-between pb-4 border-b border-gray-100 last:border-0 last:pb-0">
                            <div class="flex-1">
                                <a href="{{ route('admin.posts.edit', $post) }}" class="text-blue-600 hover:underline font-medium">
                                    {{ $post->title }}
                                </a>
                                <p class="text-sm text-gray-500 mt-1">
                                    {{ $post->created_at->diffForHumans() }}
                                    @if($post->is_published)
                                        <span class="ml-2 text-green-600">● Published</span>
                                    @else
                                        <span class="ml-2 text-gray-400">● Draft</span>
                                    @endif
                                </p>
                            </div>
                            <a href="{{ route('admin.posts.edit', $post) }}" class="text-gray-400 hover:text-gray-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-500 text-center py-8">No posts yet</p>
            @endif
        </div>
    </div>

    <!-- Recent Contacts -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-lg font-semibold text-gray-900">Recent Contacts</h2>
        </div>
        <div class="p-6">
            @if($recent_contacts->count() > 0)
                <div class="space-y-4">
                    @foreach($recent_contacts as $contact)
                        <div class="flex items-center justify-between pb-4 border-b border-gray-100 last:border-0 last:pb-0">
                            <div class="flex-1">
                                <a href="{{ route('admin.contacts.show', $contact) }}" class="text-blue-600 hover:underline font-medium">
                                    {{ $contact->name }} - {{ $contact->subject }}
                                </a>
                                <p class="text-sm text-gray-500 mt-1">
                                    {{ $contact->created_at->diffForHumans() }}
                                    @if(!$contact->is_read)
                                        <span class="ml-2 text-red-600">● Unread</span>
                                    @endif
                                </p>
                            </div>
                            <a href="{{ route('admin.contacts.show', $contact) }}" class="text-gray-400 hover:text-gray-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-500 text-center py-8">No contacts yet</p>
            @endif
        </div>
    </div>
</div>
@endsection


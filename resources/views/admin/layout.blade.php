<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Panel') - 3HDS Services</title>
    <meta name="robots" content="noindex, nofollow">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-900 text-white flex-shrink-0">
            <div class="p-6 border-b border-gray-800">
                <h2 class="text-2xl font-bold text-white flex items-center gap-2"><svg class="w-6 h-6 text-blue-400" viewBox="0 0 28 28" fill="currentColor" aria-hidden="true"><rect x="3" y="3" width="22" height="5.5" rx="2.75"/><rect x="10" y="11.25" width="15" height="5.5" rx="2.75"/><rect x="3" y="19.5" width="22" height="5.5" rx="2.75"/></svg>3HDS</h2>
                <p class="text-sm text-gray-400 mt-1">Admin Panel</p>
            </div>
            <nav class="mt-6 px-4">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 mb-2 rounded-lg transition {{ request()->routeIs('admin.dashboard') ? 'bg-blue-600' : 'hover:bg-gray-800' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    Dashboard
                </a>
                <a href="{{ route('admin.posts.index') }}" class="flex items-center px-4 py-3 mb-2 rounded-lg transition {{ request()->routeIs('admin.posts.*') ? 'bg-blue-600' : 'hover:bg-gray-800' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                    </svg>
                    Blog Posts
                </a>
                <a href="{{ route('admin.products.index') }}" class="flex items-center px-4 py-3 mb-2 rounded-lg transition {{ request()->routeIs('admin.products.*') ? 'bg-blue-600' : 'hover:bg-gray-800' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                    Portfolio
                </a>
                <a href="{{ route('admin.testimonials.index') }}" class="flex items-center px-4 py-3 mb-2 rounded-lg transition {{ request()->routeIs('admin.testimonials.*') ? 'bg-blue-600' : 'hover:bg-gray-800' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                    Testimonials
                </a>
                <a href="{{ route('admin.contacts.index') }}" class="flex items-center px-4 py-3 mb-2 rounded-lg transition {{ request()->routeIs('admin.contacts.*') ? 'bg-blue-600' : 'hover:bg-gray-800' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    Enquiries
                    @php($unreadEnquiries = \App\Models\Contact::where('is_read', false)->count())
                    @if($unreadEnquiries > 0)
                        <span class="ml-auto px-2 py-0.5 text-xs font-semibold rounded-full bg-blue-500">{{ $unreadEnquiries }}</span>
                    @endif
                </a>
                <a href="{{ route('admin.team.index') }}" class="flex items-center px-4 py-3 mb-2 rounded-lg transition {{ request()->routeIs('admin.team.*') ? 'bg-blue-600' : 'hover:bg-gray-800' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    Team
                </a>
                <div class="mb-2">
                    <button onclick="toggleSubmenu('settings')" class="flex items-center justify-between w-full px-4 py-3 rounded-lg transition {{ request()->routeIs('admin.settings.*') ? 'bg-blue-600' : 'hover:bg-gray-800' }}">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <span>Settings</span>
                        </div>
                        <svg id="settings-chevron" class="w-4 h-4 transition-transform {{ request()->routeIs('admin.settings.*') ? 'rotate-90' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>
                    <div id="settings-submenu" class="ml-8 mt-1 space-y-1 {{ request()->routeIs('admin.settings.*') ? '' : 'hidden' }}">
                        <a href="{{ route('admin.settings.general') }}" class="block px-4 py-2 text-sm rounded-lg transition {{ request()->routeIs('admin.settings.general') ? 'bg-blue-600' : 'hover:bg-gray-800' }}">
                            General
                        </a>
                        <a href="{{ route('admin.settings.pricing') }}" class="block px-4 py-2 text-sm rounded-lg transition {{ request()->routeIs('admin.settings.pricing') ? 'bg-blue-600' : 'hover:bg-gray-800' }}">
                            Prices
                        </a>
                        <a href="{{ route('admin.settings.offices') }}" class="block px-4 py-2 text-sm rounded-lg transition {{ request()->routeIs('admin.settings.offices') ? 'bg-blue-600' : 'hover:bg-gray-800' }}">
                            Country contacts
                        </a>
                    </div>
                </div>
            </nav>
            
            <div class="absolute bottom-0 w-64 p-4 border-t border-gray-800">
                <div class="flex items-center mb-3">
                    <div class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center text-white font-bold">
                        {{ substr(auth()->user()->name, 0, 1) }}
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium">{{ auth()->user()->name }}</p>
                        <p class="text-xs text-gray-400">Admin</p>
                    </div>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full px-4 py-2 text-sm bg-gray-800 rounded-lg hover:bg-gray-700 transition">
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Bar -->
            <header class="bg-white border-b border-gray-200 px-8 py-4">
                <div class="flex items-center justify-between">
                    <h1 class="text-2xl font-bold text-gray-900">@yield('page-title', 'Dashboard')</h1>
                    <a href="{{ route('home') }}" target="_blank" class="px-4 py-2 text-sm bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition">
                        View Website →
                    </a>
                </div>
            </header>

            <!-- Main Content Area -->
            <main class="flex-1 overflow-y-auto p-8">
                @if(session('success'))
                    <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-800 rounded-lg flex items-center">
                        <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-800 rounded-lg">
                        <ul class="list-disc list-inside">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <script>
        // Submenu toggle
        function toggleSubmenu(id) {
            const submenu = document.getElementById(id + '-submenu');
            const chevron = document.getElementById(id + '-chevron');
            submenu.classList.toggle('hidden');
            chevron.classList.toggle('rotate-90');
        }
    </script>
</body>
</html>


@extends('layouts.auth')

@section('title', 'Reset password')

@section('content')
<div class="min-h-screen flex items-center justify-center py-12 px-4">
    <div class="max-w-md w-full bg-white rounded-2xl shadow-xl p-8">
        <h1 class="text-2xl font-bold mb-2">Reset your password</h1>
        <p class="text-gray-600 mb-6">Enter your admin email address and we'll send you a reset link.</p>

        @if (session('status'))
            <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-800 rounded-lg" role="status">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
            @csrf
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email address</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                @error('email')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>
            <button type="submit" class="w-full py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition">Send reset link</button>
        </form>

        <p class="mt-6 text-sm text-center"><a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-800">Back to login</a></p>
    </div>
</div>
@endsection

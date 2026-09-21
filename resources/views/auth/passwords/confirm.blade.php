@extends('layouts.auth')

@section('title', 'Confirm password')

@section('content')
<div class="min-h-screen flex items-center justify-center py-12 px-4">
    <div class="max-w-md w-full bg-white rounded-2xl shadow-xl p-8">
        <h1 class="text-2xl font-bold mb-2">Confirm your password</h1>
        <p class="text-gray-600 mb-6">Please confirm your password before continuing.</p>

        <form method="POST" action="{{ route('password.confirm') }}" class="space-y-5">
            @csrf
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                <input id="password" type="password" name="password" required autocomplete="current-password" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                @error('password')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>
            <button type="submit" class="w-full py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition">Confirm</button>
        </form>

        <p class="mt-6 text-sm text-center"><a href="{{ route('password.request') }}" class="text-blue-600 hover:text-blue-800">Forgot your password?</a></p>
    </div>
</div>
@endsection

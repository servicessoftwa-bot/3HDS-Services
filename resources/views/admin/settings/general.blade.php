@extends('admin.layout')

@section('title', 'General settings')
@section('page-title', 'General settings')

@section('content')
<form action="{{ route('admin.settings.general.update') }}" method="POST" enctype="multipart/form-data" class="max-w-4xl">
    @csrf
    @method('PUT')

    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 mb-6">
        <h2 class="text-lg font-semibold text-gray-900 mb-1">Contact</h2>
        <p class="text-sm text-gray-500 mb-5">Shown on the website, and where contact form enquiries are emailed.</p>
        <div class="grid grid-cols-2 gap-6">
            <div>
                <label for="site_email" class="block text-sm font-medium text-gray-700 mb-2">Main email address</label>
                <input type="email" name="site_email" id="site_email" value="{{ old('site_email', $settings['site_email'] ?? '') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="you@yourcompany.com">
            </div>
            <div>
                <label for="site_whatsapp" class="block text-sm font-medium text-gray-700 mb-2">WhatsApp button number</label>
                <input type="text" name="site_whatsapp" id="site_whatsapp" value="{{ old('site_whatsapp', $settings['site_whatsapp'] ?? '') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="+44 7XXX XXXXXX">
                <p class="mt-1 text-sm text-gray-500">Full international number. Leave empty to hide the floating WhatsApp button.</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 mb-6">
        <h2 class="text-lg font-semibold text-gray-900 mb-1">Logo</h2>
        <p class="text-sm text-gray-500 mb-5">Replaces the built-in 3HDS mark in the header and footer. PNG, JPG or WebP, square works best, up to 1 MB.</p>
        @if(!empty($settings['site_logo']))
            <div class="flex items-center gap-4 mb-4">
                <img src="{{ asset('storage/'.$settings['site_logo']) }}" alt="Current logo" class="h-12 w-auto border border-gray-200 rounded p-1 bg-white">
                <label class="flex items-center text-sm text-gray-700"><input type="checkbox" name="remove_logo" value="1" class="rounded border-gray-300 mr-2">Remove logo</label>
            </div>
        @endif
        <input type="file" name="logo" accept="image/png,image/jpeg,image/webp" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
    </div>

    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 mb-6">
        <h2 class="text-lg font-semibold text-gray-900 mb-1">Social profiles</h2>
        <p class="text-sm text-gray-500 mb-5">Full web addresses, starting with https://. Empty ones don't appear on the website.</p>
        <div class="grid grid-cols-2 gap-6">
            @foreach($social as $key => $label)
                <div>
                    <label for="social_{{ $key }}" class="block text-sm font-medium text-gray-700 mb-2">{{ $label }}</label>
                    <input type="url" name="social_{{ $key }}" id="social_{{ $key }}" value="{{ old('social_'.$key, $settings['social_'.$key] ?? '') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="https://">
                </div>
            @endforeach
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 mb-6">
        <h2 class="text-lg font-semibold text-gray-900 mb-1">Company registration</h2>
        <p class="text-sm text-gray-500 mb-5">Shown in the website footer. A UK limited company must show its registered name, number, place of registration and registered office.</p>
        <div class="grid grid-cols-2 gap-6">
            <div>
                <label for="company_legal_name" class="block text-sm font-medium text-gray-700 mb-2">Registered company name</label>
                <input type="text" name="company_legal_name" id="company_legal_name" value="{{ old('company_legal_name', $settings['company_legal_name'] ?? '') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="3HDS Services Ltd">
            </div>
            <div>
                <label for="company_uk_number" class="block text-sm font-medium text-gray-700 mb-2">UK company number</label>
                <input type="text" name="company_uk_number" id="company_uk_number" value="{{ old('company_uk_number', $settings['company_uk_number'] ?? '') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
            <div>
                <label for="company_uk_registered_in" class="block text-sm font-medium text-gray-700 mb-2">Registered in</label>
                <input type="text" name="company_uk_registered_in" id="company_uk_registered_in" value="{{ old('company_uk_registered_in', $settings['company_uk_registered_in'] ?? '') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="England and Wales">
            </div>
            <div>
                <label for="company_uk_office" class="block text-sm font-medium text-gray-700 mb-2">Registered office address</label>
                <input type="text" name="company_uk_office" id="company_uk_office" value="{{ old('company_uk_office', $settings['company_uk_office'] ?? '') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
            <div>
                <label for="company_abn" class="block text-sm font-medium text-gray-700 mb-2">Australian ABN</label>
                <input type="text" name="company_abn" id="company_abn" value="{{ old('company_abn', $settings['company_abn'] ?? '') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
            <div>
                <label for="company_ntn" class="block text-sm font-medium text-gray-700 mb-2">Pakistan NTN</label>
                <input type="text" name="company_ntn" id="company_ntn" value="{{ old('company_ntn', $settings['company_ntn'] ?? '') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 mb-6">
        <h2 class="text-lg font-semibold text-gray-900 mb-1">Visitor statistics</h2>
        <p class="text-sm text-gray-500 mb-5">Optional. Paste a Cloudflare Web Analytics token for cookie-free visit counts.</p>
        <input type="text" name="cloudflare_analytics_token" value="{{ old('cloudflare_analytics_token', $settings['cloudflare_analytics_token'] ?? '') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" aria-label="Cloudflare Web Analytics token">
    </div>

    <div class="flex justify-end">
        <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Save settings</button>
    </div>
</form>
@endsection

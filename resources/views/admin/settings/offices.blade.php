@extends('admin.layout')

@section('title', 'Country contacts')
@section('page-title', 'Country contacts')

@section('content')
<p class="text-gray-600 mb-6 max-w-3xl">Shown under "Where to reach us" on the website. Anything left empty stays hidden. Phone and WhatsApp numbers should be in full international format, for example +61 4XX XXX XXX.</p>

<form action="{{ route('admin.settings.offices.update') }}" method="POST" class="max-w-4xl">
    @csrf
    @method('PUT')

    @foreach($regions as $key => $region)
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 mb-6">
            <h2 class="text-lg font-semibold text-gray-900 mb-1">{{ $region['country'] }}</h2>
            <p class="text-sm text-gray-500 mb-5">Local time is shown automatically.</p>
            <div class="grid grid-cols-2 gap-6">
                <div>
                    <label for="office_{{ $key }}_city" class="block text-sm font-medium text-gray-700 mb-2">City or region</label>
                    <input type="text" name="office_{{ $key }}_city" id="office_{{ $key }}_city" value="{{ old('office_'.$key.'_city', $settings['office_'.$key.'_city'] ?? '') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
                <div>
                    <label for="office_{{ $key }}_email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                    <input type="email" name="office_{{ $key }}_email" id="office_{{ $key }}_email" value="{{ old('office_'.$key.'_email', $settings['office_'.$key.'_email'] ?? '') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
                <div>
                    <label for="office_{{ $key }}_phone" class="block text-sm font-medium text-gray-700 mb-2">Phone</label>
                    <input type="text" name="office_{{ $key }}_phone" id="office_{{ $key }}_phone" value="{{ old('office_'.$key.'_phone', $settings['office_'.$key.'_phone'] ?? '') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
                <div>
                    <label for="office_{{ $key }}_whatsapp" class="block text-sm font-medium text-gray-700 mb-2">WhatsApp</label>
                    <input type="text" name="office_{{ $key }}_whatsapp" id="office_{{ $key }}_whatsapp" value="{{ old('office_'.$key.'_whatsapp', $settings['office_'.$key.'_whatsapp'] ?? '') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
                <div class="col-span-2">
                    <label for="office_{{ $key }}_address" class="block text-sm font-medium text-gray-700 mb-2">Address</label>
                    <textarea name="office_{{ $key }}_address" id="office_{{ $key }}_address" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('office_'.$key.'_address', $settings['office_'.$key.'_address'] ?? '') }}</textarea>
                </div>
            </div>
        </div>
    @endforeach

    <div class="flex justify-end">
        <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Save contact details</button>
    </div>
</form>
@endsection

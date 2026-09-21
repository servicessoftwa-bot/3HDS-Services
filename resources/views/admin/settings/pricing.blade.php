@extends('admin.layout')

@section('title', 'Prices')
@section('page-title', 'Starting prices')

@section('content')
<p class="text-gray-600 mb-6 max-w-3xl">Starting prices shown in the pricing section of the website. Whole numbers only, without currency symbols or commas. Enter 0 to show "Custom quote" instead of a price.</p>

<form action="{{ route('admin.settings.pricing.update') }}" method="POST" class="max-w-5xl">
    @csrf
    @method('PUT')

    <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-x-auto mb-6">
        <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Package</th>
                    @foreach($regions as $regionKey => $region)
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ $region['country'] }} ({{ trim($region['symbol']) }})</th>
                    @endforeach
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($items as $itemKey => $item)
                    <tr>
                        <td class="px-6 py-4">
                            <div class="text-sm font-medium text-gray-900">{{ $item['name'] }}</div>
                            @if($item['monthly'])<div class="text-xs text-gray-500">per month</div>@endif
                        </td>
                        @foreach($regions as $regionKey => $region)
                            @php($field = "price_{$regionKey}_{$itemKey}")
                            <td class="px-6 py-4">
                                <input type="number" min="0" step="1" name="{{ $field }}" value="{{ old($field, $settings[$field] ?? $item['defaults'][$regionKey] ?? 0) }}"
                                    aria-label="{{ $item['name'] }}, {{ $region['country'] }}"
                                    class="w-36 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error($field) border-red-500 @enderror">
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="flex justify-end">
        <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Save prices</button>
    </div>
</form>
@endsection

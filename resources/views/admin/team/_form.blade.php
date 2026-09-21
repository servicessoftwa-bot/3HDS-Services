<div class="grid grid-cols-2 gap-6 mb-6">
    <div>
        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Name *</label>
        <input type="text" name="name" id="name" value="{{ old('name', $member->name) }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
    </div>
    <div>
        <label for="role" class="block text-sm font-medium text-gray-700 mb-2">Main role *</label>
        <input type="text" name="role" id="role" value="{{ old('role', $member->role) }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Senior Web Developer">
    </div>
</div>

<div class="mb-6">
    <label for="other_roles" class="block text-sm font-medium text-gray-700 mb-2">Other roles</label>
    <textarea name="other_roles" id="other_roles" rows="2" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="One per line, e.g. Founder, QuettaWal and Khyber">{{ old('other_roles', $member->other_roles) }}</textarea>
</div>

<div class="grid grid-cols-2 gap-6 mb-6">
    <div>
        <label for="location" class="block text-sm font-medium text-gray-700 mb-2">Based in</label>
        <input type="text" name="location" id="location" value="{{ old('location', $member->location) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Melbourne, Australia">
    </div>
    <div>
        <label for="order" class="block text-sm font-medium text-gray-700 mb-2">Display order</label>
        <input type="number" name="order" id="order" min="0" value="{{ old('order', $member->order ?? 0) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
    </div>
</div>

<div class="mb-6">
    <label for="photo" class="block text-sm font-medium text-gray-700 mb-2">Photo</label>
    @if($member->photo)
        <div class="flex items-center gap-4 mb-3">
            <img src="{{ asset('storage/'.$member->photo) }}" alt="" class="w-16 h-16 rounded-xl object-cover">
            <label class="flex items-center text-sm text-gray-700"><input type="checkbox" name="remove_photo" value="1" class="rounded border-gray-300 mr-2">Remove photo</label>
        </div>
    @endif
    <input type="file" name="photo" id="photo" accept="image/*" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
    <p class="mt-1 text-sm text-gray-500">Optional. Square photos with a plain background look best. Without a photo, initials are shown.</p>
</div>

<div class="mb-6">
    <label class="flex items-center">
        <input type="checkbox" name="is_visible" value="1" {{ old('is_visible', $member->is_visible) ? 'checked' : '' }} class="rounded border-gray-300 text-blue-600">
        <span class="ml-2 text-sm text-gray-700">Show on the website</span>
    </label>
</div>

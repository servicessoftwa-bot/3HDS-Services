@extends('admin.layout')

@section('title', 'Add Project')
@section('page-title', 'Add Portfolio Project')

@section('content')
<div class="max-w-4xl">
    <div class="mb-6">
        <a href="{{ route('admin.products.index') }}" class="text-blue-600 hover:text-blue-800">
            ← Back to Portfolio
        </a>
    </div>

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        @csrf

        <div class="mb-6">
            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title *</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" required 
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
        </div>

        <div class="mb-6">
            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description *</label>
            <textarea name="description" id="description" rows="3" required 
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('description') }}</textarea>
            <p class="mt-1 text-sm text-gray-500">Brief description of the product</p>
        </div>

        <div class="mb-6">
            <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Content *</label>
            <textarea name="content" id="content" rows="15" required 
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('content') }}</textarea>
            <p class="mt-1 text-sm text-gray-500">Full details, case study, features, etc.</p>
        </div>

        <div class="grid grid-cols-2 gap-6 mb-6">
            <div>
                <label for="client_name" class="block text-sm font-medium text-gray-700 mb-2">Client Name</label>
                <input type="text" name="client_name" id="client_name" value="{{ old('client_name') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
            <div>
                <label for="project_url" class="block text-sm font-medium text-gray-700 mb-2">Project URL</label>
                <input type="url" name="project_url" id="project_url" value="{{ old('project_url') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
        </div>

        <div class="mb-6">
            <label for="technologies" class="block text-sm font-medium text-gray-700 mb-2">Technologies</label>
            <input type="text" name="technologies" id="technologies" value="{{ old('technologies') }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                placeholder="Python, TensorFlow, React, AWS (comma separated)">
            <p class="mt-1 text-sm text-gray-500">Separate technologies with commas</p>
        </div>

        <div class="mb-6">
            <label for="featured_image" class="block text-sm font-medium text-gray-700 mb-2">Featured Image</label>
            <input type="file" name="featured_image" id="featured_image" accept="image/*"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
        </div>

        <div class="grid grid-cols-2 gap-6 mb-6">
            <div>
                <label class="flex items-center">
                    <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}
                        class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                    <span class="ml-2 text-sm text-gray-700">Featured project</span>
                </label>
                <p class="mt-1 text-sm text-gray-500 ml-6">Show on homepage</p>
            </div>
            <div>
                <label for="order" class="block text-sm font-medium text-gray-700 mb-2">Display Order</label>
                <input type="number" name="order" id="order" value="{{ old('order', 0) }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
        </div>

        <div class="flex justify-end space-x-4 pt-6 border-t border-gray-200">
            <a href="{{ route('admin.products.index') }}" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">
                Cancel
            </a>
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                Add Project
            </button>
        </div>
    </form>
</div>
@endsection


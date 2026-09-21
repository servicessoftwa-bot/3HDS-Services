@extends('admin.layout')

@section('title', 'Edit team member')
@section('page-title', 'Edit team member')

@section('content')
<div class="max-w-4xl">
    <div class="mb-6">
        <a href="{{ route('admin.team.index') }}" class="text-blue-600 hover:text-blue-800">← Back to team</a>
    </div>

    <form action="{{ route('admin.team.update', $member) }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        @csrf
    @method('PUT')
        @include('admin.team._form')

        <div class="flex justify-end space-x-4 pt-6 border-t border-gray-200">
            <a href="{{ route('admin.team.index') }}" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">Cancel</a>
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Save changes</button>
        </div>
    </form>
</div>
@endsection

@extends('admin.layout')

@section('title', 'Team')
@section('page-title', 'Team')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <p class="text-gray-600">The people shown in "The people behind 3HDS" on the website.</p>
    <a href="{{ route('admin.team.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 inline-flex items-center">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
        Add team member
    </a>
</div>

<div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-200">
        <thead>
            <tr>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Based in</th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">On website</th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @forelse($members as $member)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            @if($member->photo)
                                <img src="{{ asset('storage/'.$member->photo) }}" alt="" class="w-10 h-10 rounded-lg object-cover mr-3">
                            @else
                                <span class="w-10 h-10 rounded-lg bg-blue-600 text-white text-sm font-bold flex items-center justify-center mr-3">{{ $member->initials }}</span>
                            @endif
                            <span class="text-sm font-medium text-gray-900">{{ $member->name }}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-700">{{ $member->role }}</td>
                    <td class="px-6 py-4 text-sm text-gray-700">{{ $member->location }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $member->is_visible ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">{{ $member->is_visible ? 'Shown' : 'Hidden' }}</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <a href="{{ route('admin.team.edit', $member) }}" class="text-blue-600 hover:text-blue-900 mr-3">Edit</a>
                        <form action="{{ route('admin.team.destroy', $member) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Remove this team member from the website?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="px-6 py-12 text-center text-gray-500">No team members yet. <a href="{{ route('admin.team.create') }}" class="text-blue-600 hover:underline">Add the first one</a></td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

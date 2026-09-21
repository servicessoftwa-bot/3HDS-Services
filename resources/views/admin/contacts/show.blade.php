@extends('admin.layout')

@section('title', 'View Contact')
@section('page-title', 'Contact Submission')

@section('content')
<div class="max-w-4xl">
    <div class="mb-6">
        <a href="{{ route('admin.contacts.index') }}" class="text-blue-600 hover:text-blue-800">
            ← Back to Contacts
        </a>
    </div>

    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <div class="grid grid-cols-2 gap-6 mb-6 pb-6 border-b border-gray-200">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                <p class="text-lg text-gray-900">{{ $contact->name }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <p class="text-lg text-gray-900">
                    <a href="mailto:{{ $contact->email }}" class="text-blue-600 hover:underline">{{ $contact->email }}</a>
                </p>
            </div>
            @if($contact->company)
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Company</label>
                    <p class="text-lg text-gray-900">{{ $contact->company }}</p>
                </div>
            @endif
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Received</label>
                <p class="text-lg text-gray-900">{{ $contact->created_at->format('F d, Y \a\t h:i A') }}</p>
            </div>
        </div>

        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Subject</label>
            <p class="text-lg text-gray-900">{{ $contact->subject }}</p>
        </div>

        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Message</label>
            <div class="bg-gray-50 rounded-lg p-4">
                <p class="text-gray-900 whitespace-pre-wrap">{{ $contact->message }}</p>
            </div>
        </div>

        <div class="flex justify-between items-center pt-6 border-t border-gray-200">
            <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700" onclick="return confirm('Are you sure you want to delete this contact?')">
                    Delete
                </button>
            </form>

            @if(!$contact->is_read)
                <form action="{{ route('admin.contacts.mark-read', $contact) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
                        Mark as Read
                    </button>
                </form>
            @endif
        </div>
    </div>
</div>
@endsection


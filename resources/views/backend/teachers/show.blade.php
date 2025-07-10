@extends('backend.layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto bg-white shadow-md rounded p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Teacher Details</h1>

        <div class="space-y-4 text-gray-700">
            <p><strong>ID:</strong> {{ $teacher->id }}</p>
            <p><strong>Name:</strong> {{ $teacher->name }}</p>
            <p><strong>Email:</strong> {{ $teacher->email }}</p>
            <p><strong>Phone:</strong> {{ $teacher->phone ?? '-' }}</p>
            <p><strong>Subject:</strong> {{ $teacher->subject ?? '-' }}</p>
            <p><strong>Address:</strong> {{ $teacher->address ?? '-' }}</p>
            <p><strong>Active:</strong> {{ $teacher->is_active ? 'Yes' : 'No' }}</p>
        </div>

        <div class="mt-6 flex space-x-4">
            <a href="{{ route('admin.teachers.index') }}"
               class="px-4 py-2 bg-gray-100 text-gray-700 border border-gray-300 rounded hover:bg-gray-200">
                Back to List
            </a>

            <a href="{{ route('admin.teachers.edit', $teacher->id) }}"
               class="px-4 py-2 bg-yellow-400 text-white rounded hover:bg-yellow-500">
                Edit
            </a>
        </div>
    </div>
@endsection

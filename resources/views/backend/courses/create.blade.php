@extends('backend.layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded shadow mt-6">
    <h2 class="text-2xl font-bold mb-4">Create New Course</h2>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-600 rounded">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.courses.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block font-medium">Title</label>
            <input type="text" name="title" value="{{ old('title') }}" class="w-full border border-gray-300 rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block font-medium">Description</label>
            <textarea name="description" class="w-full border border-gray-300 rounded px-3 py-2" rows="4">{{ old('description') }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block font-medium">Start Date</label>
            <input type="date" name="start_date" value="{{ old('start_date') }}" class="w-full border border-gray-300 rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label class="block font-medium">End Date</label>
            <input type="date" name="end_date" value="{{ old('end_date') }}" class="w-full border border-gray-300 rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label class="block font-medium">Capacity</label>
            <input type="number" name="capacity" value="{{ old('capacity', 0) }}" class="w-full border border-gray-300 rounded px-3 py-2" min="0">
        </div>

        <div class="mb-4">
            <label class="inline-flex items-center">
                <input type="checkbox" name="is_active" value="1" checked class="mr-2">
                Active
            </label>
        </div>

        <div class="flex items-center space-x-2">
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Save</button>
            <a href="{{ route('admin.courses.index') }}" class="text-gray-600 hover:underline">Cancel</a>
        </div>
    </form>
</div>
@endsection

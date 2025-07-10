@extends('backend.layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Edit Teacher</h1>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.teachers.update', $teacher->id) }}" method="POST" class="space-y-6 max-w-lg">
        @csrf
        @method('PUT')

        <div>
            <label for="name" class="block mb-1 font-semibold">Name</label>
            <input
                type="text"
                id="name"
                name="name"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                value="{{ old('name', $teacher->name) }}"
                required
            >
        </div>

        <div>
            <label for="email" class="block mb-1 font-semibold">Email</label>
            <input
                type="email"
                id="email"
                name="email"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                value="{{ old('email', $teacher->email) }}"
                required
            >
        </div>

        <div>
            <label for="phone" class="block mb-1 font-semibold">Phone</label>
            <input
                type="text"
                id="phone"
                name="phone"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                value="{{ old('phone', $teacher->phone) }}"
            >
        </div>

        <div>
            <label for="subject" class="block mb-1 font-semibold">Subject</label>
            <input
                type="text"
                id="subject"
                name="subject"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                value="{{ old('subject', $teacher->subject) }}"
            >
        </div>

        <div>
            <label for="address" class="block mb-1 font-semibold">Address</label>
            <textarea
                id="address"
                name="address"
                rows="4"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
            >{{ old('address', $teacher->address) }}</textarea>
        </div>

        <div>
            <label for="is_active" class="block mb-1 font-semibold">Active</label>
            <select
                id="is_active"
                name="is_active"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                required
            >
                <option value="1" {{ old('is_active', $teacher->is_active) == 1 ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ old('is_active', $teacher->is_active) == 0 ? 'selected' : '' }}>No</option>
            </select>
        </div>

        <div class="flex space-x-4">
            <button
                type="submit"
                class="px-5 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
                Update
            </button>
            <a
                href="{{ route('admin.teachers.index') }}"
                class="inline-block px-5 py-2 border border-gray-400 rounded hover:bg-gray-100"
            >
                Cancel
            </a>
        </div>
    </form>
@endsection

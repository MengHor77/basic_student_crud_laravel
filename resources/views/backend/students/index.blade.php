@extends('backend.layouts.app')

@section('content')
<div class="max-w-6xl mx-auto p-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Student List</h1>
        <a href="{{ route('admin.students.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">+ Add Student</a>
    </div>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full table-auto border-collapse border border-gray-300">
        <thead class="bg-gray-200">
            <tr>
                <th class="border px-4 py-2">No</th>
                <th class="border px-4 py-2">Name</th>
                <th class="border px-4 py-2">Gender</th>
                <th class="border px-4 py-2">Age</th>
                <th class="border px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($students as $student)
            <tr class="text-center">
                <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                <td class="border px-4 py-2">{{ $student->name }}</td>
                <td class="border px-4 py-2 capitalize">{{ $student->gender }}</td>
                <td class="border px-4 py-2">{{ $student->age }}</td>
                <td class="border px-4 py-2 space-x-2">
                    <a href="{{ route('admin.students.show', $student->id) }}" class="text-blue-600 hover:underline">View</a>
                    <a href="{{ route('admin.students.edit', $student->id) }}" class="text-yellow-600 hover:underline">Edit</a>
                    <form action="{{ route('admin.students.destroy', $student->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Are you sure?')" class="text-red-600 hover:underline">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center py-4">No students found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

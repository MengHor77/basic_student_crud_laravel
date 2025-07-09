@extends('backend.layouts.app')

@section('title', 'Student List')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl mb-6 font-bold">Students</h1>

    <a href="{{ route('admin.students.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
        + Create New Student
    </a>

    @if(session('success'))
    <div class="bg-green-100 text-green-700 p-3 rounded mt-4">{{ session('success') }}</div>
    @endif

    <table class="table-auto w-full mt-6 border-collapse border border-gray-300">
        <thead class="bg-gray-100">
            <tr>
                <th class="border border-gray-300 px-4 py-2">ID</th>
                <th class="border border-gray-300 px-4 py-2">Name</th>
                <th class="border border-gray-300 px-4 py-2">Gender</th>
                <th class="border border-gray-300 px-4 py-2">Age</th>
                <th class="border border-gray-300 px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <td class="border border-gray-300 px-4 py-2">{{ $student->id }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $student->name }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ ucfirst($student->gender) }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $student->age }}</td>
                <td class="border border-gray-300 px-4 py-2">
                    <a href="{{ route('admin.students.show', $student->id) }}"
                        class="text-green-600 hover:underline mr-2">View</a>
                    <a href="{{ route('admin.students.edit', $student->id) }}"
                        class="text-blue-600 hover:underline mr-2">Edit</a>

                    <form action="{{ route('admin.students.destroy', $student->id) }}" method="POST"
                        class="inline-block"
                        onsubmit="return confirm('Are you sure you want to delete this student?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
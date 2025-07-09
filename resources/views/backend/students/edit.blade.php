@extends('backend.layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-6 text-center text-indigo-600">Edit Student</h2>

    @if ($errors->any())
        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 p-3 rounded">
            <strong>Whoops!</strong> There were some problems with your input.
            <ul class="mt-2 list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.students.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block text-gray-700">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $student->name) }}"
                class="w-full border px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
        </div>

        <div class="mb-4">
            <label for="gender" class="block text-gray-700">Gender</label>
            <select name="gender" id="gender"
                class="w-full border px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                <option value="">-- Select Gender --</option>
                <option value="male" {{ old('gender', $student->gender) == 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ old('gender', $student->gender) == 'female' ? 'selected' : '' }}>Female</option>
                <option value="other" {{ old('gender', $student->gender) == 'other' ? 'selected' : '' }}>Other</option>
            </select>
        </div>

        <div class="mb-6">
            <label for="age" class="block text-gray-700">Age</label>
            <input type="number" name="age" id="age" value="{{ old('age', $student->age) }}"
                class="w-full border px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
        </div>

        <div class="flex justify-between">
            <a href="{{ route('admin.students.index') }}" class="bg-gray-300 px-4 py-2 rounded">Cancel</a>
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Update</button>
        </div>
    </form>
</div>
@endsection

@extends('backend.layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white p-6 rounded shadow-md mt-8">
    <h2 class="text-2xl font-bold mb-6 text-center text-indigo-600">Create Student</h2>

    @if ($errors->any())
        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
            <strong>Whoops!</strong> Please fix the following errors:
            <ul class="mt-2 list-disc list-inside">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.students.store') }}">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700">Name</label>
            <input type="text" name="name" value="{{ old('name') }}" required
                class="w-full border px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Gender</label>
            <select name="gender" required
                class="w-full border px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500">
                <option value="">-- Select Gender --</option>
                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
            </select>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700">Age</label>
            <input type="number" name="age" value="{{ old('age') }}" required
                class="w-full border px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500">
        </div>

        <div class="flex justify-between">
            <a href="{{ route('admin.students.index') }}" class="bg-gray-300 text-black px-4 py-2 rounded hover:bg-gray-400">Back</a>
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Save</button>
        </div>
    </form>
</div>
@endsection

@extends('backend.layouts.app')

@section('content')
<div class="max-w-lg mx-auto p-6 bg-white rounded shadow">
    <h1 class="text-2xl font-bold mb-4">{{ $student->name }}</h1>
    <p><strong>Gender:</strong> {{ ucfirst($student->gender) }}</p>
    <p><strong>Age:</strong> {{ $student->age }}</p>

    <div class="mt-4">
        <a href="{{ route('admin.students.index') }}" class="bg-gray-300 px-4 py-2 rounded">Back</a>
    </div>
</div>
@endsection

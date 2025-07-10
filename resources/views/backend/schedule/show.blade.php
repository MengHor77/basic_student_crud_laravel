@extends('backend.layouts.app')

@section('content')
    <div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-xl font-bold mb-4">Schedule Details</h1>

        <p><strong>Course:</strong> {{ $schedule->course->title }}</p>
        <p><strong>Teacher:</strong> {{ $schedule->teacher->name }}</p>
        <p><strong>Student:</strong> {{ $schedule->student->name ?? '-' }}</p>
        <p><strong>Day:</strong> {{ $schedule->day }}</p>
        <p><strong>Time:</strong> {{ $schedule->start_time }} - {{ $schedule->end_time }}</p>
        <p><strong>Room:</strong> {{ $schedule->room ?? '-' }}</p>

        <div class="mt-6 flex space-x-4">
            <a href="{{ route('admin.schedule.index') }}" class="bg-gray-100 px-4 py-2 rounded hover:bg-gray-200">Back</a>
            <a href="{{ route('admin.schedule.edit', $schedule->id) }}" class="bg-yellow-400 text-white px-4 py-2 rounded hover:bg-yellow-500">Edit</a>
        </div>
    </div>
@endsection

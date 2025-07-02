<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Edit Student</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-10">

<div class="max-w-md mx-auto bg-white p-6 rounded shadow-md">
    <h2 class="text-2xl font-bold mb-6 text-indigo-600 text-center">Edit Student</h2>

    <form action="/update-student/{{ $student->id }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block text-gray-700 mb-1">Name</label>
            <input type="text" name="name" id="name" value="{{ $student->name }}" class="w-full border border-gray-300 rounded px-3 py-2" required />
        </div>

        <div class="mb-4">
            <label for="gender" class="block text-gray-700 mb-1">Gender</label>
            <input type="text" name="gender" id="gender" value="{{ $student->gender }}" class="w-full border border-gray-300 rounded px-3 py-2" required />
        </div>

        <div class="mb-4">
            <label for="age" class="block text-gray-700 mb-1">Age</label>
            <input type="number" name="age" id="age" value="{{ $student->age }}" class="w-full border border-gray-300 rounded px-3 py-2" required />
        </div>

        <div class="text-center">
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                Update Student
            </button>
        </div>
    </form>
</div>

</body>
</html>

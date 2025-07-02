<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Student List</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-10">

<div class="max-w-5xl mx-auto bg-white p-6 rounded shadow-md">
    <h1 class="text-3xl font-bold mb-6 text-indigo-600 text-center">Student List</h1>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-6 text-right">
        <a href="/create-student" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">+ Add Student</a>
    </div>

    <table class="min-w-full border border-gray-300 rounded overflow-hidden">
        <thead class="bg-indigo-100 text-gray-700">
            <tr>
                <th class="border px-4 py-2 text-left">ID</th>
                <th class="border px-4 py-2 text-left">Name</th>
                <th class="border px-4 py-2 text-left">Gender</th>
                <th class="border px-4 py-2 text-left">Age</th>
                <th class="border px-4 py-2 text-left">Action</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($students as $student)
                <tr class="hover:bg-gray-50">
                    <td class="border px-4 py-2">{{ $student->id }}</td>
                    <td class="border px-4 py-2">{{ $student->name }}</td>
                    <td class="border px-4 py-2">{{ $student->gender }}</td>
                    <td class="border px-4 py-2">{{ $student->age }}</td>
                    <td class="border px-4 py-2">
                        <a href="/edit-student/{{ $student->id }}" class="text-blue-500 hover:underline mr-3">Edit</a>
                        <form action="/delete-student/{{ $student->id }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?');">
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

</body>
</html>

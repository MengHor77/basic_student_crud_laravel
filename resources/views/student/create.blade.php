<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Student</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-10">
    <div class="max-w-md mx-auto bg-white p-6 rounded shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-center text-indigo-600">Create Student Form</h2>

        <form action="/create-student" method="POST">
            @csrf
            <!-- Laravel CSRF Token -->

            <div class="mb-4">
                <label for="name" class="block text-gray-700">Name</label>
                <input type="text" name="name" id="name" class="w-full border border-gray-300 rounded px-3 py-2"
                    required>
            </div>

            <!-- Gender Select -->
            <div class="mb-4">
                <label for="gender" class="block text-gray-700 mb-1">Gender</label>
                <select name="gender" id="gender" class="w-full border border-gray-300 rounded px-3 py-2" required>
                    <option value="">-- Select Gender --</option>
                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                    <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
                </select>

            </div>


            <div class="mb-4">
                <label for="age" class="block text-gray-700">Age</label>
                <input type="number" name="age" id="age" class="w-full border border-gray-300 rounded px-3 py-2"
                    required>
            </div>



            <div class="flex justify-between">
                <div class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                    <a href="/student">
                        <-Back to student list</a>
                </div>
                <button type="submit"
                    class=" bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">submit</button>
            </div>
        </form>
    </div>

</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="flex h-screen">

        <!-- Sidebar -->
        <aside class="w-64 bg-indigo-700 text-white p-6 space-y-4">
            <h1 class="text-2xl font-bold mb-6">Admin Panel</h1>
            <nav class="space-y-2">
                <a href="{{ route('admin.dashboard') }}"
                    class="block py-2 px-4 rounded hover:bg-indigo-600">Dashboard</a>
                <a href="{{ route('admin.students.index') }}"
                    class="block py-2 px-4 rounded hover:bg-indigo-600">Students</a>
                <a href="{{ route('admin.courses.index') }}"
                    class="block py-2 px-4 rounded hover:bg-indigo-600">Courses</a>
                <a href="{{ route('admin.teachers.index') }}"
                    class="block py-2 px-4 rounded hover:bg-indigo-600">Teachers</a>
                <a href="{{ route('admin.schedule.index') }}"
                    class="block py-2 px-4 rounded hover:bg-indigo-600">Schedule</a>
                <a href="{{ route('admin.reports.index') }}"
                    class="block py-2 px-4 rounded hover:bg-indigo-600">Reports</a>
                <a href="{{ route('admin.settings.index') }}"
                    class="block py-2 px-4 rounded hover:bg-indigo-600">Settings</a>

                <!-- Logout -->
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left py-2 px-4 rounded hover:bg-red-600">Logout</button>
                </form>
            </nav>
        </aside>


        <!-- Main Content -->
        <main class="flex-1 p-6 overflow-y-auto">
            @yield('content')
        </main>
    </div>
</body>

</html>
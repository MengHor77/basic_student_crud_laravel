<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Frontend')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

    <!-- Header -->
    <header class="bg-indigo-600 text-white p-4">
        <div class="container mx-auto">
            <h1 class="text-2xl font-bold">Welcome to student management!</h1>
        </div>
    </header>

    <!-- Navigation -->
    <nav class="bg-indigo-500 text-white p-2">
        <div class="container mx-auto flex space-x-6">
            <a href="{{ route('frontend.home') }}" class="hover:underline">Home</a>
            <a href="{{ route('frontend.about') }}" class="hover:underline">About</a>
            <a href="{{ route('frontend.contact') }}" class="hover:underline">Contact</a>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container mx-auto p-6">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white text-center p-4">
        <p>&copy; {{ date('Y') }} My Website. All rights reserved.</p>
    </footer>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <title>@yield('title', 'Default Title')</title>
</head>
<body class="bg-gray-100">
    <!-- Navbar -->
    <nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <!-- Navbar content -->
        @include('layouts.partials.navbar')
    </nav>

    <!-- Sidebar -->
    <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700">
        <!-- Sidebar content -->
        @include('layouts.partials.sidebar')
    </aside>

    <!-- Main Content -->
    <div class="p-4 sm:ml-64">
        <div class="p-4 mt-14">
            @yield('content')
        </div>
    </div>

    
</html>
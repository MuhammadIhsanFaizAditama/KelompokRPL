<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Student Dashboard | EduBridge')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex min-h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-blue-600 text-white flex flex-col justify-between">
        <div>
            <div class="p-6 border-b border-blue-500">
                <h2 class="text-2xl font-bold">EduBridge</h2>
                <p class="text-sm text-blue-200">Student Panel</p>
            </div>

            <nav class="flex-1 p-4 space-y-2">
                <a href="{{ route('student.dashboard') }}" 
                   class="block px-4 py-2 rounded hover:bg-blue-500 {{ request()->routeIs('student.dashboard') ? 'bg-blue-500' : '' }}">
                   Dashboard
                </a>

                <a href="{{ route('student.courses') }}" 
                   class="block px-4 py-2 rounded hover:bg-blue-500 {{ request()->routeIs('student.courses') ? 'bg-blue-500' : '' }}">
                   Courses
                </a>
            </nav>
        </div>

        <div class="p-4 border-t border-blue-500">
            <form action="{{ route('logout') }}" method="GET">
                <button type="submit" class="w-full bg-red-500 hover:bg-red-600 text-white py-2 rounded">
                    Logout
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-8 overflow-y-auto">
        <h1 class="text-3xl font-bold mb-6">@yield('title', 'Dashboard')</h1>
        @yield('content')
    </main>

</body>
</html>

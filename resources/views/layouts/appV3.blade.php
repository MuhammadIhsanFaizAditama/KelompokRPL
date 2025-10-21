<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'EduBridge')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">

    <!-- Header -->
    <header class="bg-blue-500 text-white shadow px-4 py-0 flex items-center" style="max-height: 85px;">
        <div class="container mx-auto flex justify-between items-center relative" x-data="{ open: false }">
            <!-- Logo -->
            <div class="flex items-center space-x-1">
                <img src="{{ asset('images/logo.png') }}" alt="Logo EduBridge" class="h-26 w-auto relative -top-0">
                <h1 class="text-2xl font-bold relative -top-0">EduBridge</h1>
            </div>

            <!-- Tombol Hamburger -->
            <button 
                @click="open = !open" 
                class="md:hidden flex flex-col space-y-1 focus:outline-none z-50"
            >
                <span class="block w-6 h-0.5 bg-white"></span>
                <span class="block w-6 h-0.5 bg-white"></span>
                <span class="block w-6 h-0.5 bg-white"></span>
            </button>

            <!-- Navigasi -->
            <nav 
                x-show="open || window.innerWidth >= 768"
                x-transition.duration.200ms
                @click.away="open = false"
                class="absolute md:static top-[85px] left-0 w-150 md:w-auto cursour-pointer bg-blue-500 md:bg-transparent flex flex-col md:flex-row items-center md:space-x-6 space-y-3 md:space-y-0 py-4 md:py-0 z-40"
            >
                @if(auth()->check())
                    @if(auth()->user()->role === 'admin')
                        <a href="{{ route('admin.courses.index') }}" class="hover:underline text-lg">Manage Courses</a>
                        <a href="{{ route('admin.dashboard') }}" class="hover:underline text-lg">Dashboard</a>
                    @elseif(auth()->user()->role === 'student')
                        <a href="{{ route('student.courses') }}" class="hover:underline text-lg">Kursus</a>
                        <a href="{{ route('student.dashboard') }}" class="hover:underline text-lg">Dashboard</a>
                    @endif
                @endif

                <form action="{{ route('logout') }}" method="GET" class="inline">
                    <button 
                        type="submit" 
                        class="px-4 py-2 rounded border border-white text-white hover:bg-white hover:text-blue-600 transition cursor-pointer font-semibold"
                    >
                        Logout
                    </button> 
                </form>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-1 container mx-auto p-8">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-blue-500 text-white text-center p-4 mt-auto">
        <p>&copy; {{ date('Y') }} EduBridge. All rights reserved.</p>
    </footer>

    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</body>
</html>

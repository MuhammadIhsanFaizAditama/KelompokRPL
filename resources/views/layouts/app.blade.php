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
    <header class="bg-blue-600 text-white shadow p-6">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold">EduBridge Dashboard</h1>
           <nav class="space-x-4">
             <a href="{{ route('home') }}" class="hover:underline text-lg">Home</a>

             @if(auth()->check())
                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('admin.dashboard') }}" class="hover:underline text-lg">Dashboard</a>
                @elseif(auth()->user()->role === 'student')
                    <a href="{{ route('student.dashboard') }}" class="hover:underline text-lg">Dashboard</a>
                @endif
             @endif

             <form action="{{ route('logout') }}" method="GET" class="inline">
                <button type="submit" class="hover:underline text-lg">Logout</button>
             </form>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-1 container mx-auto p-8">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-blue-600 text-white text-center p-6 mt-auto">
        <p>&copy; {{ date('Y') }} EduBridge. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

</body>
</html>

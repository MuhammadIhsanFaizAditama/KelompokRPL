<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'EduBridge')</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col" x-data="{ sidebarOpen: false }">

    <!-- Navbar Atas -->
    <header class="bg-blue-600 text-white shadow p-4 flex justify-between items-center">
        <div class="flex items-center space-x-3">
            <!-- Tombol Hamburger -->
            <button @click="sidebarOpen = !sidebarOpen" class="focus:outline-none hover:bg-blue-700 p-2 rounded-md">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
            <h1 class="text-2xl font-semibold">EduBridge</h1>
        </div>

        <nav class="space-x-6 text-lg">
            <a href="{{ route('home') }}" class="hover:underline">Home</a>
            <form action="{{ route('logout') }}" method="GET" class="inline">
                <button type="submit" class="hover:underline">Logout</button>
            </form>
        </nav>
    </header>

    <!-- Sidebar -->
    <aside
        class="fixed top-0 left-0 h-full w-64 bg-blue-800 text-white transform transition-transform duration-300 z-40"
        :class="{ '-translate-x-full': !sidebarOpen, 'translate-x-0': sidebarOpen }"
        @click.outside="sidebarOpen = false"
    >
        <div class="flex flex-col h-full p-6 space-y-6">
            <div class="flex items-center justify-between">
                <h2 class="text-lg font-semibold">Menu</h2>
                <button @click="sidebarOpen = false" class="hover:bg-blue-700 p-1 rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <nav class="flex flex-col space-y-4 mt-4">
                @if(auth()->check())
                    {{-- Dashboard --}}
                    @if(auth()->user()->role === 'admin')
                        <a href="{{ route('admin.dashboard') }}"
                           class="flex items-center space-x-3 px-3 py-2 rounded-lg hover:bg-blue-700 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6" />
                            </svg>
                            <span>Dashboard</span>
                        </a>

                        {{-- Manage Courses --}}
                        <a href="{{ route('admin.courses.index') }}"
                           class="flex items-center space-x-3 px-3 py-2 rounded-lg hover:bg-blue-700 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 20h9M12 4h9M3 12h18M3 6h9M3 18h9" />
                            </svg>
                            <span>Manage Courses</span>
                        </a>
                    @elseif(auth()->user()->role === 'student')
                        <a href="{{ route('student.dashboard') }}"
                           class="flex items-center space-x-3 px-3 py-2 rounded-lg hover:bg-blue-700 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6" />
                            </svg>
                            <span>Dashboard</span>
                        </a>

                        {{-- Courses --}}
                        <a href="{{ route('student.courses') }}"
                           class="flex items-center space-x-3 px-3 py-2 rounded-lg hover:bg-blue-700 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 20h9M12 4h9M3 12h18M3 6h9M3 18h9" />
                            </svg>
                            <span>Courses</span>
                        </a>
                    @endif
                @endif

                <div class="border-t border-blue-700 my-4"></div>

                {{-- Logout --}}
                <form action="{{ route('logout') }}" method="GET">
                    <button type="submit"
                            class="flex items-center space-x-3 px-3 py-2 rounded-lg hover:bg-blue-700 w-full text-left transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H7a2 2 0 01-2-2V7a2 2 0 012-2h4a2 2 0 012 2v1" />
                        </svg>
                        <span>Logout</span>
                    </button>
                </form>
            </nav>

            <div class="mt-auto text-center text-sm text-blue-300">
                @if(auth()->check())
                    <p>{{ auth()->user()->name }}</p>
                @endif
            </div>
        </div>
    </aside>

    <!-- Overlay -->
    <div x-show="sidebarOpen"
         x-transition.opacity
         class="fixed inset-0 bg-black bg-opacity-40 z-30"
         @click="sidebarOpen = false">
    </div>

    <!-- Konten Utama -->
    <main class="flex-1 p-8 mt-4">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-blue-600 text-white text-center p-4 mt-auto">
        <p>&copy; {{ date('Y') }} EduBridge. All rights reserved.</p>
    </footer>

</body>
</html>

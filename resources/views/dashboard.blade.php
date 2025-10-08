<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - EduBridge</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">

    <!-- Header -->
    <header class="bg-blue-600 text-white shadow p-6">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold">EduBridge Dashboard</h1>
            <nav class="space-x-4">
                <a href="{{ route('dashboard') }}" class="hover:underline">Dashboard</a>
                <a href="{{ route('landing') }}" class="hover:underline">Landing</a>
                <a href="#" class="hover:underline">Logout</a>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-1 container mx-auto p-8">
        <h2 class="text-3xl font-bold mb-4">Selamat Datang!</h2>
        <p class="text-gray-700">Ini adalah dashboard EduBridge. Di sini kamu bisa mengelola profil dan melihat aktivitas.</p>

        <!-- Contoh card -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                <h3 class="text-xl font-semibold mb-2">Kursus Aktif</h3>
                <p>3 kursus yang sedang kamu ikuti</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                <h3 class="text-xl font-semibold mb-2">Sertifikat</h3>
                <p>2 sertifikat sudah diterbitkan</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                <h3 class="text-xl font-semibold mb-2">Notifikasi</h3>
                <p>1 pemberitahuan baru</p>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-blue-600 text-white text-center p-6 mt-auto">
        <p>&copy; {{ date('Y') }} EduBridge. All rights reserved.</p>
    </footer>

</body>
</html>

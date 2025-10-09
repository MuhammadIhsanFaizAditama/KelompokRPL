<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduBridge - Platform Pelatihan</title>
    @vite('resources/css/app.css')
</head>
<body class="antialiased bg-gray-50 text-gray-800">

<!-- Header -->
<header class="bg-blue-700 text-white shadow p-6">
    <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-2xl font-bold">EduBridge</h1>
        <nav class="space-x-6">
            <a href="#" class="hover:text-blue-300 transition">Home</a>
            <a href="#features" class="hover:text-blue-300 transition">Fitur</a>
            <a href="#materi" class="hover:text-blue-300 transition">Materi</a>
            <a href="#about" class="hover:text-blue-300 transition">Tentang</a>
            <a href="{{ route('register') }}" class="bg-white text-blue-500 px-4 py-2 rounded shadow hover:bg-gray-300 transition">Daftar</a>
            <a href="{{ route('login') }}" class="px-4 py-2 rounded border border-white hover:bg-white hover:text-blue-700 transition">Login</a>
        </nav>
    </div>
</header>

<!-- Hero Section -->
<section class="text-center py-20 bg-gradient-to-r from-blue-600 to-blue-500 text-white">
    <h2 class="text-4xl font-extrabold mb-4">Selamat Datang di EduBridge</h2>
    <p class="text-lg mb-6">Platform pelatihan keterampilan untuk mengurangi kesenjangan pendidikan non-formal</p>
    <a href="{{ route('register') }}" class="px-6 py-3 bg-white text-blue-700 font-semibold rounded-lg shadow hover:bg-gray-100 transition">Mulai Sekarang</a>
</section>

<!-- Features -->
<section id="features" class="py-16 container mx-auto">
    <h3 class="text-3xl font-bold text-center mb-10 text-blue-700">Fitur Utama</h3>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
        <div class="p-6 bg-white rounded-lg shadow hover:shadow-lg transition">
            <h4 class="text-xl font-semibold mb-2 text-blue-600">Kursus Online</h4>
            <p>Akses materi pelatihan dari mana saja, kapan saja.</p>
        </div>
        <div class="p-6 bg-white rounded-lg shadow hover:shadow-lg transition">
            <h4 class="text-xl font-semibold mb-2 text-blue-600">Instruktur Ahli</h4>
            <p>Dibimbing langsung oleh mentor berpengalaman.</p>
        </div>
        <div class="p-6 bg-white rounded-lg shadow hover:shadow-lg transition">
            <h4 class="text-xl font-semibold mb-2 text-blue-600">Sertifikat</h4>
            <p>Dapatkan sertifikat resmi setelah menyelesaikan pelatihan.</p>
        </div>
    </div>
</section>

<!-- Materi / Artikel -->
<section id="materi" class="py-16 bg-gray-100">
    <h3 class="text-3xl font-bold text-center mb-10 text-blue-700">Materi Terbaru</h3>
    <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
            <h4 class="text-xl font-semibold mb-2 text-blue-600">Belajar HTML Dasar</h4>
            <p class="mb-4 text-gray-700">Pelajari dasar-dasar HTML, tag, struktur halaman web, dan praktik membuat halaman pertama.</p>
            <a href="#" class="text-blue-700 font-semibold hover:underline">Baca Selengkapnya</a>
        </div>
        <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
            <h4 class="text-xl font-semibold mb-2 text-blue-600">CSS untuk Pemula</h4>
            <p class="mb-4 text-gray-700">Kenali cara mengatur tampilan website menggunakan CSS, layout, warna, dan tipografi.</p>
            <a href="#" class="text-blue-700 font-semibold hover:underline">Baca Selengkapnya</a>
        </div>
        <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
            <h4 class="text-xl font-semibold mb-2 text-blue-600">JavaScript Interaktif</h4>
            <p class="mb-4 text-gray-700">Pelajari dasar JavaScript untuk membuat website interaktif dan responsif.</p>
            <a href="#" class="text-blue-700 font-semibold hover:underline">Baca Selengkapnya</a>
        </div>
    </div>
</section>

<!-- About -->
<section id="about" class="py-16 container mx-auto text-center">
    <h3 class="text-3xl font-bold mb-6 text-blue-700">Tentang EduBridge</h3>
    <p class="max-w-2xl mx-auto">
        EduBridge hadir sebagai solusi untuk mengurangi kesenjangan akses pendidikan non-formal dengan menyediakan
        platform pelatihan keterampilan berbasis web yang inklusif, praktis, dan mudah diakses oleh siapa saja.
    </p>
</section>

<!-- Footer -->
<footer class="bg-blue-700 text-white text-center p-6">
    <p>&copy; {{ date('Y') }} EduBridge. All rights reserved.</p>
</footer>

</body>
</html>

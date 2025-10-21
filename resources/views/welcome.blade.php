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
<header class="bg-blue-500 text-white shadow px-6 py-0 relative">
  <div class="container mx-auto flex justify-between items-center h-24">
    <div class="flex items-center space-x-3 relative">
      <div class="flex-shrink-0 absolute top-0">
        <img src="{{ asset('images/logo.png') }}" alt="Logo EduBridge" class="h-28 w-auto -mt-11">
      </div>
      <h1 class="text-2xl font-bold leading-none ml-27">EduBridge</h1>
    </div>
    <nav class="space-x-6">
      <a href="#" class="hover:text-blue-300 hover:underline transition text-lg">Home</a>
      <a href="#about" class="hover:text-blue-300 hover:underline transition text-lg">Tentang</a>
      <a href="#Layanan" class="hover:text-blue-300 hover:underline transition text-lg">Layanan</a>
      <a href="{{ route('register') }}" class="bg-white text-blue-500 px-4 py-2 rounded shadow hover:bg-gray-300 transition">Daftar</a>
      <a href="{{ route('login') }}" class="px-4 py-2 rounded border border-white hover:bg-gray-300 hover:text-blue-700 transition">Login</a>
    </nav>
  </div>
</header>

<!-- Hero Section -->
<section class="text-center py-10 bg-gray-100  text-blue-700">
    <h2 class="text-4xl font-extrabold mb-4">Selamat Datang di EduBridge</h2>
    <div class="relative flex items-center justify-center mb-6">
        <!-- Gambar -->
        <img src="{{ asset('images/gambar1.jpg') }}" 
             alt="Gambar Hero Section" 
             class="h-46 w-auto mx-auto rounded-lg shadow-sm border-2 border-blue-[#0900FF]">
    </div>
    <p class="text-xl mb-13 max-w-4xl mx-auto ">
        Platform pelatihan dan pengembangan keterampilan yang menghubungkan potensi dengan peluang. 
        Kami menghadirkan program belajar yang relevan dan praktis sesuai kebutuhan industri. 
        Bersama <span class="font-bold text-blue-700">EduBridge</span>, kamu siap melangkah menuju masa depan 
        yang lebih terampil dan percaya diri.
    </p>
    <a href="{{ route('register') }}" class="px-6 py-3 bg-blue-700 text-white font-semibold rounded-xl shadow hover:bg-blue-500 hover:text-black  transition">Mulai Sekarang -></a>
</section>


<!-- about -->
<section id="about" class="py-35 container mx-auto">
    <h3 class="text-4xl font-bold text-center mb-10 text-blue-700">Tentang Kami</h3>
    <p class="text-xl text-center max-w-2xl mx-auto text-blue-700 font-semibold">
       <span class="font-bold text-blue-700">EduBridge</span> adalah platform pelatihan dan pengembangan keterampilan untuk pemula 
       yang ingin membangun karier di dunia profesional.
    </p>
    <div class="py-5 grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
       
      <div class="p-6 bg-white rounded-lg shadow hover:shadow-2xl hover:bg-gray-100 transition flex items-center space-x-4">
            <!-- Gambar -->
            <img src="{{ asset('images/interaction.png') }}" alt="Pelatihan Interaktif" class="h-20 w-20">

            <!-- Konten teks -->
            <div class="text-left">
              <h4 class="text-2xl font-semibold mb-3 text-blue-700">Pelatihan Interaktif</h4>
              <p class="text-lg">Belajar sambil langsung menerapkan materi melalui simulasi 
                 dan praktik nyata.</p>
           </div>
        </div>
        
        <div class="p-6 bg-white rounded-lg shadow hover:shadow-2xl hover:bg-gray-100 transition flex items-center space-x-4">
             <!-- Gambar -->
             <img src="{{ asset('images/idea.png') }}" alt="Mudah Dipahami" class="h-21 w-auto">

             <!-- Konten teks -->
             <div class="text-left">
               <h4 class="text-2xl font-semibold mb-2 text-blue-600">Mudah Dipahami</h4>
              <p class="text-lg">Disusun dengan pendekatan sederhana agar mudah dipahami 
                 oleh siapa saja, tanpa latar belakang teknis.</p>
             </div>
        </div>
        <div class="p-6 bg-white rounded-lg shadow hover:shadow-2xl hover:bg-gray-100 transition flex items-center space-x-4">
             <!-- Gambar -->
             <img src="{{ asset('images/free-access.png') }}" alt="Akses Gratis" class="h-20 w-auto">

             <!-- Konten teks -->
            <div class="text-left">
               <h4 class="text-2xl font-semibold mb-2 text-blue-600">Akses Gratis</h4>
               <p class="text-lg">Disusun dengan pendekatan sederhana agar mudah dipahami oleh siapa saja, 
                  tanpa latar belakang teknis.</p>
            </div>
        </div>
    </div>
</section>

<!-- Layanan Kami -->
<section id="Layanan" class="py-20 bg-gray-100">
    <h3 class="text-4xl font-bold text-center mb-10 text-blue-700">Layanan Kami</h3>
    
    <p class="text-xl text-center max-w-2xl mx-auto text-blue-700 font-semibold">
       Jelajahi beragam layanan <span class="font-bold text-blue-700">EduBridge</span> 
       yang dirancang untuk mempercepat proses belajar dan meningkatkan kemampuan kerja Anda.
    </p>
    
    <div class="py-7 container mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
    
        <div class="relative bg-white rounded-lg shadow hover:shadow-2xl hover:bg-gray-100 transition overflow-hidden">
            <img src="{{ asset('images/hardskl.jpg') }}" class="w-full h-50 object-cover opacity-70 py-0">
            
            <div class="p-6 text-center relative">
            <h4 class="text-2xl font-semibold mb-2 text-blue-700">Pengembangan Hard Skill</h4>
            <p class="mb-4 text-gray-700 text-lg">Belajar keterampilan teknis seperti coding, desain grafis, dan penggunaan alat digital.</p>
            <a href="#" class="text-blue-700 font-semibold hover:underline">Baca Selengkapnya</a>
            </div>
        </div>

        <div class="relative bg-white rounded-lg shadow hover:shadow-2xl hover:bg-gray-100 transition overflow-hidden">
            <img src="{{ asset('images/soft3.jpg') }}" class="w-full h-50 object-cover opacity-70 py-0">

            <div class="p-6 text-center relative">
            <h4 class="text-2xl font-semibold mb-2 text-blue-600">Pelatihan Soft Skill</h4>
            <p class="mb-4 text-gray-700 text-lg">Latihan komunikasi, public speaking, manajemen 
                waktu, dan kerja tim.</p>
            <a href="#" class="text-blue-700 font-semibold hover:underline">Baca Selengkapnya</a>
            </div>
        </div>
                
        <div class="relative bg-white rounded-lg shadow hover:shadow-2xl hover:bg-gray-100 transition overflow-hidden">
            <img src="{{ asset('images/access2.jpg') }}" class="w-full h-50 object-cover opacity-70 py-0">
          
            <div class="p-6 text-center relative">
            <h4 class="text-2xl font-semibold mb-2 text-blue-600">Akses Belajar Mandiri</h4>
            <p class="mb-4 text-gray-700 text-lg">Materi pembelajaran fleksibel yang bisa diakses 
                kapan saja sesuai kebutuhan.</p>
            <a href="#" class="text-blue-700 font-semibold hover:underline">Baca Selengkapnya</a>
            </div>
        </div>
    
    </div>
</section>



<!-- Akhir -->
<section id="about" class="py-16 container mx-auto text-center">
    <h3 class="text-3xl font-bold mb-6 text-blue-700">EduBridge</h3>
    <p class="max-w-2xl mx-auto">
        EduBridge hadir sebagai solusi untuk mengurangi kesenjangan akses pendidikan non-formal dengan menyediakan
        platform pelatihan keterampilan berbasis web yang inklusif, praktis, dan mudah diakses oleh siapa saja.
    </p>
</section>

<!-- Footer -->
<footer class="bg-blue-500 text-white text-center p-6">
    <p>&copy; {{ date('Y') }} EduBridge. All rights reserved.</p>
</footer>

</body>
</html>

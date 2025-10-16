@extends('layouts.app')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Selamat Datang, {{ $user->name }} 👋</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        {{-- Card Statistik --}}
        <div class="bg-white p-5 rounded-lg shadow">
            <h2 class="text-gray-700 text-sm font-medium">Total Kursus</h2>
            <p class="text-3xl font-bold text-blue-600 mt-2">{{ $totalCourses }}</p>
        </div>

        <div class="bg-white p-5 rounded-lg shadow">
            <h2 class="text-gray-700 text-sm font-medium">Kursus Aktif</h2>
            <p class="text-3xl font-bold text-green-600 mt-2">{{ $activeCourses }}</p>
        </div>

        <div class="bg-white p-5 rounded-lg shadow">
            <h2 class="text-gray-700 text-sm font-medium">Materi Belum Dibaca</h2>
            <p class="text-3xl font-bold text-red-600 mt-2">{{ $unreadMaterials }}</p>
        </div>

    </div>

    {{-- Tombol menuju daftar kursus --}}
    <div class="mt-8 text-center">
        <a href="{{ route('student.courses') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg shadow transition duration-200">
           🎓 Lihat Semua Kursus
        </a>
    </div>
</div>
@endsection

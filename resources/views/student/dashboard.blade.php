@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-8">

    <!-- Profil Pengguna -->
    <div class="bg-white rounded-xl shadow-sm p-6 flex items-center gap-5 mb-10 border border-gray-100">
        {{-- <img src="{{ asset('images/default-avatar.png') }}" 
             class="w-16 h-16 rounded-full border border-gray-200 shadow-sm"> --}}
        <div>
            <h2 class="text-2xl font-semibold text-gray-800">Halo {{ $user->name }}, Selamat Datang 👋</h2>
            <p class="text-gray-500 text-sm">{{ $user->email }}</p>
            <span class="inline-block mt-2 text-xs px-3 py-1 bg-blue-100 text-blue-700 rounded-full font-medium">
                Siswa
            </span>
        </div>
    </div>

    <!-- Statistik -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-xl font-semibold shadow-sm border border-gray-100 text-center">
            <h2 class="text-sm text-gray-500">📘 Total Kursus Tersedia</h2>
            <p class="text-3xl font-bold text-blue-600 mt-2">{{ $totalCourses }}</p>
        </div>

        <div class="bg-white p-6 rounded-xl font-semibold shadow-sm border border-gray-100 text-center">
            <h2 class="text-sm text-gray-500">✅ Kursus Aktif</h2>
            <p class="text-3xl font-bold text-green-600 mt-2">{{ $activeCourses }}</p>
        </div>

        <div class="bg-white p-6 rounded-xl font-semibold shadow-sm border border-gray-100 text-center">
            <h2 class="text-sm text-gray-500">📖 Materi Belum Dibaca</h2>
            <p class="text-3xl font-bold text-red-600 mt-2">{{ $unreadMaterials }}</p>
        </div>
    </div>

    <!-- Tombol Kursus -->
    <div class="mt-10 text-center">
        <a href="{{ route('student.courses') }}"
           class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-medium py-2.5 px-6 rounded-lg hover:scale-102 transition-transform duration-200">
           🎓 Lihat Semua Kursus
        </a>
    </div>

    <!-- Kursus Anda -->
    <hr class="my-10 border-gray-300">
    <div class="mt-12">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4 text-center">Kursus Anda</h2>

        @if($enrolledCourses->isEmpty())
            <p class="text-gray-600 text-sm font-semibold text-xl text-center">Belum ada kursus yang diikuti</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($enrolledCourses as $course)
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 hover:scale-105 transition-transform duration-200">
                        <h3 class="text-lg font-semibold text-blue-700 mb-2">{{ $course->title }}</h3>

                        <div class="text-sm text-gray-600 space-y-1">
                            <p>📚 Total Materi: <span class="font-semibold">{{ $course->materials_count }}</span></p>
                            <p>✅ Sudah Dibaca: <span class="font-semibold text-green-600">{{ $course->completed_materials }}</span></p>
                        </div>

                        @php
                            $progress = $course->materials_count > 0
                                ? round(($course->completed_materials / $course->materials_count) * 100)
                                : 0;
                        @endphp      

                        <div class="w-full bg-gray-200 rounded-full h-2 mt-3 overflow-hidden">
                            <div class="bg-blue-600 h-2 rounded-full" style="width: {{ $progress }}%"></div>
                        </div>

                        <p class="text-xs text-gray-500 mt-2">Progres: {{ $progress }}%</p>
                        
                        <div class="mt-4 text-right">
                            <a href="{{ route('student.courses.materials', $course->id) }}" 
                               class="text-sm bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg shadow-sm transition">
                               Lihat Detail
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-10" x-data="{ search: '' }">
    
    <!-- 🌊 Header -->
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-4xl font-extrabold text-blue-700 flex items-center gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422A12.083 12.083 0 0118 20.944 11.94 11.94 0 0112 22a11.94 11.94 0 01-6-1.056A12.083 12.083 0 015.84 10.578L12 14z" />
            </svg>
            Daftar Kursus
        </h1>

        <a href="{{ route('student.dashboard') }}" 
           class="bg-green-500 text-white font-semibold px-4 py-2 rounded-lg shadow hover:bg-green-600 hover:scale-105 transition duration-200">
            ← Kembali
        </a>
    </div>

    <!-- 🔍 Search Bar -->
    <div class="relative mb-10 max-w-lg mx-auto">
        <input 
            type="text"
            x-model="search"
            placeholder="Cari kursus yang kamu mau..."
            class="w-full pl-12 pr-10 py-3 rounded-xl border border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none text-gray-700"
        >
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 absolute left-4 top-1/2 -translate-y-1/2 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M12.9 14.32a8 8 0 111.414-1.414l4.387 4.387a1 1 0 01-1.414 1.414l-4.387-4.387zM10 16a6 6 0 100-12 6 6 0 000 12z" clip-rule="evenodd" />
        </svg>

        <!-- Tombol clear -->
        <button 
            type="button"
            @click="search = ''"
            x-show="search.length > 0"
            x-transition.opacity
            class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-red-500">
            ✖
        </button>
    </div>

    <!-- 💬 Flash messages -->
    @if(session()->has('success'))
        <div x-data="{ show: true }" 
             x-show="show"
             x-init="setTimeout(() => show = false, 4000)"
             x-transition
             class="bg-green-100 text-green-700 p-3 rounded mb-4 shadow-sm text-center">
            {{ session('success') }}
        </div>
    @endif

    @if(session()->has('info'))
        <div x-data="{ show: true }" 
             x-show="show"
             x-init="setTimeout(() => show = false, 4000)"
             x-transition
             class="bg-blue-100 text-blue-700 p-3 rounded mb-4 shadow-sm text-center">
            {{ session('info') }}
        </div>
    @endif

    <!-- 🎓 Grid Courses -->
    <div class="grid lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 gap-8">
        @foreach ($courses as $course)
            <div 
                class="bg-white shadow-md rounded-xl p-6 border border-gray-100 flex flex-col justify-between hover:shadow-lg hover:-translate-y-1 transition-all duration-200"
                x-show="
                    '{{ strtolower($course->title) }}'.includes(search.toLowerCase()) ||
                    '{{ strtolower($course->description) }}'.includes(search.toLowerCase())
                "
                x-transition.opacity.duration.200ms
            >
                <div>
                    <h2 class="text-xl font-bold text-gray-800 mb-2">{{ $course->title }}</h2>
                    <p class="text-gray-600 text-sm mb-4 leading-relaxed">
                        {{ Str::limit($course->description, 90) }}
                    </p>
                </div>

                <div class="flex justify-between items-center mt-auto pt-3 border-t border-gray-100">
                    <a href="{{ route('student.courses.materials', $course->id) }}" 
                       class="bg-blue-500 text-white px-3 py-1.5 rounded-lg text-sm font-medium hover:bg-blue-600 transition">
                        📘 Lihat Materi
                    </a>

                    @php
                        $isEnrolled = auth()->user()->courses->contains($course->id);
                    @endphp

                    @if($isEnrolled)
                        <form action="{{ route('student.courses.unenroll', $course->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="bg-red-500 text-white px-3 py-1.5 rounded-lg text-sm font-medium hover:bg-red-600 transition cursor-pointer">
                                ❌ Batal
                            </button>
                        </form>
                    @else
                        <form action="{{ route('student.courses.enroll', $course->id) }}" method="POST">
                            @csrf
                            <button type="submit" 
                                    class="bg-green-500 text-white px-3 py-1.5 rounded-lg text-sm font-medium hover:bg-green-600 transition cursor-pointer">
                                ✅ Ikuti
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        @endforeach
    </div>

    <!-- 😢 Pesan tidak ada hasil -->
    <div x-show="!Array.from($el.previousElementSibling.children).some(el => el.offsetParent !== null)"
         class="text-center text-gray-500 mt-10 text-lg font-medium">
        Tidak ada kursus yang cocok dengan pencarian 🔍
    </div>
</div>
@endsection

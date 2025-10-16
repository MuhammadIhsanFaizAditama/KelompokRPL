@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Daftar Kursus</h1>

    <!-- Flash messages otomatis hilang -->
@if(session()->has('success'))
    <div x-data="{ show: true }" x-show="show"
         x-init="setTimeout(() => show = false, 4000)"
         x-transition:enter="transition ease-out duration-500"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-500"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-2"
         class="bg-green-100 text-green-700 p-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

@if(session()->has('info'))
    <div x-data="{ show: true }" x-show="show"
         x-init="setTimeout(() => show = false, 4000)"
         x-transition:enter="transition ease-out duration-500"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-500"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-2"
         class="bg-blue-100 text-blue-700 p-3 rounded mb-4">
        {{ session('info') }}
    </div>
@endif


    
    <!-- Grid courses -->
    <div class="grid md:grid-cols-3 sm:grid-cols-2 gap-6">
        @foreach ($courses as $course)
            <div class="bg-white shadow-lg rounded-lg p-6 border border-gray-200 h-full flex flex-col justify-between">
                <h2 class="text-xl font-semibold mb-2">{{ $course->title }}</h2>
                <p class="text-gray-600 mb-4">{{ Str::limit($course->description, 80) }}</p>

                <div class="flex justify-between items-center mt-auto ">
                    <!-- Tombol lihat materi -->
                    <a href="{{ route('student.courses.materials', $course->id) }}" 
                       class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 transition">
                        Lihat Materi
                    </a>

                    @php
                        // Cek apakah user sudah mengikuti kursus ini
                        $isEnrolled = auth()->user()->courses->contains($course->id);
                    @endphp

                    @if($isEnrolled)
                        <!-- Tombol Batal Ikut -->
                        <form action="{{ route('student.courses.unenroll', $course->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition">
                                Batal
                            </button>
                        </form>
                    @else
                        <!-- Tombol Ikuti Kursus -->
                        <form action="{{ route('student.courses.enroll', $course->id) }}" method="POST">
                            @csrf
                            <button type="submit" 
                                    class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 transition">
                                Ikuti Kursus
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection







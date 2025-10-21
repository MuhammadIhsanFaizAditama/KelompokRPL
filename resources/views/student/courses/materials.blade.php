@extends('layouts.app')

@section('title', 'Materi Kursus')

@section('content')
<div class="container mx-auto px-6 py-10">
    <!-- 🧭 Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-8">
        <div>
            <h1 class="text-3xl font-extrabold text-blue-700 mb-2 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M12 14l9-5-9-5-9 5 9 5z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M12 14l6.16-3.422A12.083 12.083 0 0118 20.944 11.94 11.94 0 0112 22a11.94 11.94 0 01-6-1.056A12.083 12.083 0 015.84 10.578L12 14z" />
                </svg>
                {{ $course->title }}
            </h1>
            <p class="text-gray-600 text-sm">Daftar materi pembelajaran lengkap untuk kursus ini.</p>
        </div>

        <!-- Tombol Navigasi -->
        <div class="flex flex-wrap gap-3 mt-4 sm:mt-0">
            <a href="{{ route('student.dashboard') }}" 
               class="inline-flex items-center gap-2 bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition duration-200">
               🏠 Dashboard
            </a>
            <a href="{{ route('student.courses') }}" 
               class="inline-flex items-center gap-2 bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-200">
               ← Kembali ke Kursus
            </a>
        </div>
    </div>

    <!-- 📚 Daftar Materi -->
    @if($course->materials->isEmpty())
        <div class="bg-yellow-50 border-l-4 border-yellow-400 text-yellow-700 p-4 rounded-lg shadow-sm">
            <p>Belum ada materi yang ditambahkan untuk kursus ini.</p>
        </div>
    @else
        <div class="grid md:grid-cols-2 gap-6">
            @foreach($course->materials as $index => $material)
                <div class="bg-white rounded-xl border border-gray-100 shadow-sm hover:shadow-md transition p-6 flex flex-col justify-between">
                    <div>
                        <h2 class="text-lg font-semibold text-blue-700 mb-2 flex items-center gap-2">
                            <span class="bg-blue-100 text-blue-700 font-bold px-2 py-0.5 rounded-md text-sm">
                                {{ $index + 1 }}
                            </span>
                            <a href="{{ route('student.courses.materials.show', ['course' => $course->id, 'material' => $material->id]) }}"
                               class="hover:underline">
                                {{ $material->title }}
                            </a>
                        </h2>
                        <p class="text-gray-600 text-sm mb-4">{{ Str::limit($material->content, 100, '...') }}</p>
                    </div>

                    <div class="text-right mt-auto">
                        <a href="{{ route('student.courses.materials.show', ['course' => $course->id, 'material' => $material->id]) }}"
                           class="inline-flex items-center gap-2 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-200">
                            Lihat Materi →
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection

@extends('layouts.app')

@section('title', $material->title)

@section('content')
<div class="container mx-auto px-6 py-10">
    <!-- 🧭 Header Materi -->
    <div class="mb-8">
        <h1 class="text-4xl font-extrabold text-blue-700 mb-3 tracking-tight flex items-center gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-9 w-9 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                      d="M12 14l9-5-9-5-9 5 9 5z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                      d="M12 14l6.16-3.422A12.083 12.083 0 0118 20.944 11.94 11.94 0 0112 22a11.94 11.94 0 01-6-1.056A12.083 12.083 0 015.84 10.578L12 14z" />
            </svg>
            {{ $material->title }}
        </h1>
        <div class="h-1 w-24 bg-blue-500 rounded-full mb-6"></div>
    </div>

    <!-- 📖 Konten Materi -->
    <div class="bg-white shadow-lg rounded-2xl p-6 border border-gray-100 mb-10">
        <p class="text-gray-700 leading-relaxed text-lg whitespace-pre-line">
            {{ $material->content }}
        </p>
    </div>

    <!-- 🎥 Video YouTube (jika ada) -->
    @if($material->youtube_link)
        @php
            $youtubeUrl = trim($material->youtube_link);
            if (str_contains($youtubeUrl, 'watch?v=')) {
                $youtubeUrl = str_replace('watch?v=', 'embed/', $youtubeUrl);
            } elseif (str_contains($youtubeUrl, 'youtu.be/')) {
                $youtubeUrl = str_replace('youtu.be/', 'www.youtube.com/embed/', $youtubeUrl);
            }
        @endphp

        <div class="rounded-2xl overflow-hidden shadow-lg border border-gray-200 mb-8">
            <iframe 
                class="w-full aspect-video"
                src="{{ $youtubeUrl }}"
                title="Video Materi"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen>
            </iframe>
        </div>
    @endif

    <!-- 🔙 Tombol Navigasi -->
    <div class="flex justify-between items-center">
        <a href="{{ route('student.courses.materials', $material->course_id) }}" 
           class="inline-flex items-center gap-2 bg-gray-600 text-white font-semibold px-5 py-2.5 rounded-lg shadow hover:bg-gray-700 transition duration-200">
            ← Kembali ke Daftar Materi
        </a>

        <a href="{{ route('student.courses') }}" 
           class="inline-flex items-center gap-2 bg-blue-500 text-white font-semibold px-5 py-2.5 rounded-lg shadow hover:bg-blue-600 transition duration-200">
            📚 Lihat Kursus Lain
        </a>
    </div>
</div>
@endsection

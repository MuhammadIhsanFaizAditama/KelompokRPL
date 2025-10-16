@extends('layouts.app')

@section('title', $material->title)

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-4">{{ $material->title }}</h1>
    <p class="text-gray-700 mb-6">{{ $material->content }}</p>

    @if($material->youtube_link)
        @php
            $youtubeUrl = trim($material->youtube_link);

            if (str_contains($youtubeUrl, 'watch?v=')) {
                $youtubeUrl = str_replace('watch?v=', 'embed/', $youtubeUrl);
            } elseif (str_contains($youtubeUrl, 'youtu.be/')) {
                $youtubeUrl = str_replace('youtu.be/', 'www.youtube.com/embed/', $youtubeUrl);
            }
        @endphp

        <div class="aspect-w-16 aspect-h-9 mb-6">
            <iframe class="w-full h-96 rounded-lg shadow"
                src="{{ $youtubeUrl }}"
                title="YouTube Video"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen>
            </iframe>
        </div>
    @endif

    <a href="{{ route('student.courses.materials', $material->course_id) }}" 
       class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">
       ← Kembali ke Daftar Materi
    </a>
</div>
@endsection

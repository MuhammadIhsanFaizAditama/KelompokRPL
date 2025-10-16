@extends('layouts.app')

@section('title', 'Materi Kursus')

@section('content')
<h1 class="text-2xl font-bold mb-6 text-blue-700">{{ $course->title }} - Daftar Materi</h1>

@foreach($course->materials as $material)
<div class="bg-white p-4 rounded-lg shadow mb-4 hover:shadow-lg transition">
    <h2 class="text-xl font-semibold mb-2">
        <a href="{{ route('student.courses.materials.show', ['course' => $course->id, 'material' => $material->id]) }}" 
           class="text-blue-600 hover:underline">
            {{ $material->title }}
        </a>
    </h2>
    <p class="text-gray-700 line-clamp-2">{{ Str::limit($material->content, 100, '...') }}</p>
</div>
@endforeach

<a href="{{ route('student.courses') }}" 
   class="inline-block mt-4 bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">
   ← Kembali ke Kursus
</a>
@endsection

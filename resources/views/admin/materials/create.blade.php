@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Tambah Materi: {{ $course->title }}</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.courses.materials.store', $course->id) }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block mb-2 font-semibold">Judul Materi</label>
            <input type="text" name="title" 
                   class="w-full border border-gray-300 p-2 rounded" 
                   value="{{ old('title') }}" required>
        </div>

        <div class="mb-4">
            <label class="block mb-2 font-semibold">Konten Materi</label>
            <textarea name="content" rows="6" 
                      class="w-full border border-gray-300 p-2 rounded" 
                      required>{{ old('content') }}</textarea>
        </div>

        <div class="mb-4">
    <label class="block mb-2 font-semibold">Link YouTube</label>
    <input type="text" name="youtube_link" 
           class="w-full border border-gray-300 p-2 rounded"
           value="{{ old('youtube_link', $material->youtube_link ?? '') }}">
</div>


        <button type="submit" 
                class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
            Simpan Materi
        </button>
        <a href="{{ route('admin.courses.materials.index', $course->id) }}" 
           class="ml-2 bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400">
           Batal
        </a>
    </form>
</div>
@endsection

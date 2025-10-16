@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Materi Kursus: {{ $course->title }}</h1>

    <a href="{{ route('admin.courses.index', $course->id) }}" 
       class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 mb-4 inline-block">
       <- Kembali
    </a>

    <a href="{{ route('admin.courses.materials.create', $course->id) }}" 
       class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 mb-4 inline-block">
       Tambah Materi
    </a>



    

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="space-y-4">
        @foreach($materials as $material)
            <div class="bg-white shadow rounded p-4 flex justify-between items-center">
                <div>
                    <h2 class="font-semibold text-lg">{{ $material->title }}</h2>
                    <p class="text-gray-600">{{ Str::limit($material->content, 100) }}</p>
                </div>
                <div class="flex space-x-2">
                    <a href="{{ route('admin.courses.materials.edit', [$course->id, $material->id]) }}" 
                       class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                       Edit
                    </a>
                    <form action="{{ route('admin.courses.materials.destroy', [$course->id, $material->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

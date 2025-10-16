@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Daftar Kursus</h1>

    <a href="{{ route('admin.dashboard') }}" 
       class="bg-green-500 text-white px-4 py-2 rounded mb-4 inline-block hover:bg-green-600 transition">
       <- Kembali
    </a>

    <a href="{{ route('admin.courses.create') }}" 
       class="bg-green-500 text-white px-4 py-2 rounded mb-4 inline-block hover:bg-green-600 transition">
       Tambah Kursus
    </a>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">{{ session('success') }}</div>
    @endif

    <table class="min-w-full bg-white border">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="py-2 px-4 border">Judul</th>
                <th class="py-2 px-4 border">Deskripsi</th>
                <th class="py-2 px-4 border">Status</th>
                <th class="py-2 px-4 border">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($courses as $course)
            <tr class="hover:bg-gray-50">
                <td class="py-2 px-4 border">{{ $course->title }}</td>
                <td class="py-2 px-4 border">{{ Str::limit($course->description, 50) }}</td>
                <td class="py-2 px-4 border">{{ ucfirst($course->status) }}</td>
                <td class="py-2 px-4 border flex flex-wrap gap-2">

                    {{-- Tombol Edit --}}
                    <a href="{{ route('admin.courses.edit', $course->id) }}" 
                       class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600 transition">
                        Edit
                    </a>

                    {{-- Tombol Hapus --}}
                    <form action="{{ route('admin.courses.destroy', $course->id) }}" method="POST" 
                          onsubmit="return confirm('Yakin ingin menghapus kursus ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600 transition">
                            Hapus
                        </button>
                    </form>

                    {{-- Tombol Lihat Materi --}}
                    <a href="{{ route('admin.courses.materials.index', $course->id) }}" 
                       class="bg-green-500 text-white px-2 py-1 rounded hover:bg-green-600 transition">
                        Lihat Materi
                    </a>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

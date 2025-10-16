@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Semua Materi</h1>

    <table class="w-full border border-gray-300 rounded">
        <thead class="bg-gray-100">
            <tr>
                <th class="p-2 border">Judul</th>
                <th class="p-2 border">Course</th>
                <th class="p-2 border">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($materials as $material)
            <tr>
                <td class="p-2 border">{{ $material->title }}</td>
                <td class="p-2 border">{{ $material->course->title ?? '-' }}</td>
                <td class="p-2 border">
                    <a href="{{ route('admin.materials.edit', $material->id) }}" 
                       class="text-blue-600 hover:underline">Edit</a>
                    <form action="{{ route('admin.materials.destroy', $material->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline" 
                                onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

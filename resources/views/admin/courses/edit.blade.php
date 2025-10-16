@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Edit Kursus</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.courses.update', $course->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Judul -->
        <div class="mb-4">
            <label class="block mb-1 font-semibold" for="title">Judul</label>
            <input type="text" id="title" name="title" 
                   value="{{ old('title', $course->title) }}" 
                   class="w-full border px-3 py-2 rounded" required>
        </div>

        <!-- Deskripsi -->
        <div class="mb-4">
            <label class="block mb-1 font-semibold" for="description">Deskripsi</label>
            <textarea id="description" name="description" 
                      class="w-full border px-3 py-2 rounded" rows="5">{{ old('description', $course->description) }}</textarea>
        </div>

        <!-- Status -->
        <div class="mb-4">
            <label class="block mb-1 font-semibold" for="status">Status</label>
            <select id="status" name="status" class="w-full border px-3 py-2 rounded" required>
                <option value="active" {{ old('status', $course->status) == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ old('status', $course->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <!-- Tombol Simpan -->
        <button type="submit" 
                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
            Update Kursus
        </button>
        <a href="{{ route('admin.courses.index') }}" 
           class="ml-2 bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition">
           Batal
        </a>
    </form>
</div>
@endsection

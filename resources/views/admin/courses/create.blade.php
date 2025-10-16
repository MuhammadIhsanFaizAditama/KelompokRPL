@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Tambah Kursus</h1>

    <form action="{{ route('admin.courses.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Judul</label>
            <input type="text" name="title" class="w-full border px-3 py-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-semibold">Deskripsi</label>
            <textarea name="description" class="w-full border px-3 py-2 rounded"></textarea>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-semibold">Status</label>
            <select name="status" class="w-full border px-3 py-2 rounded" required>
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
        </div>

        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition">
            Simpan
        </button>
    </form>
</div>
@endsection

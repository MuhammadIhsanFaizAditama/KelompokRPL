@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Tambah User</h1>

    @if($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block mb-1">Nama</label>
            <input type="text" name="name" value="{{ old('name') }}" 
                   class="w-full border px-3 py-2 rounded">
        </div>

        <div class="mb-4">
            <label class="block mb-1">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" 
                   class="w-full border px-3 py-2 rounded">
        </div>

        <div class="mb-4">
            <label class="block mb-1">Password</label>
            <input type="password" name="password" class="w-full border px-3 py-2 rounded">
        </div>

        <div class="mb-4">
            <label class="block mb-1">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="w-full border px-3 py-2 rounded">
        </div>

        <div class="mb-4">
            <label class="block mb-1">Role</label>
            <select name="role" class="w-full border px-3 py-2 rounded">
                <option value="student" {{ old('role')=='student'?'selected':'' }}>Student</option>
                <option value="admin" {{ old('role')=='admin'?'selected':'' }}>Admin</option>
            </select>
        </div>

        <button type="submit" 
                class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition">
            Simpan
        </button>
    </form>
</div>
@endsection

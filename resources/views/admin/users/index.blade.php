@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Daftar User</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif


    <a href="{{ route('admin.dashboard') }}" 
       class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition mb-4 inline-block">
         <- Kembali
    </a>

    <a href="{{ route('admin.users.create') }}" 
       class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition mb-4 inline-block">
        Tambah User
    </a>

    <table class="w-full table-auto border border-gray-300">
        <thead class="bg-gray-200">
            <tr>
                <th class="border px-4 py-2">No</th>
                <th class="border px-4 py-2">Nama</th>
                <th class="border px-4 py-2">Email</th>
                <th class="border px-4 py-2">Role</th>
                <th class="border px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                <td class="border px-4 py-2">{{ $user->name }}</td>
                <td class="border px-4 py-2">{{ $user->email }}</td>
                <td class="border px-4 py-2 capitalize">{{ $user->role }}</td>
                <td class="border px-4 py-2 flex gap-2">
                    <a href="{{ route('admin.users.edit', $user->id) }}" 
                       class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 transition">
                        Edit
                    </a>

                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" 
                          onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

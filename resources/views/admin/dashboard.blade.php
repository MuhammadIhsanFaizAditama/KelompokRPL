@extends('layouts.app')

@section('content')
<div class="p-6">
    <!-- Header Selamat Datang -->
    <div class="bg-white p-5 rounded-lg shadow mb-8 flex items-center justify-between flex-wrap">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">🎓 Dashboard Admin </h1>
            <p class="text-gray-500 mt-1">Selamat datang di panel pengelolaan EduBridge</p>
            <span class="inline-block mt-2 text-xs px-3 py-1 bg-blue-100 text-blue-700 rounded-full font-medium">
                Admin
            </span>

        </div>
        {{-- <img src="{{ asset('images/') }}" alt="Admin Illustration" class="h-20 hidden md:block"> --}}
    </div>

    <!-- Statistik Ringkas -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
        <div class="bg-blue-500 text-white font-bold p-6 rounded-lg shadow hover:shadow-xl transition">
            <h2 class="text-sm uppercase tracking-wide opacity-80">📚 Total Courses</h2>
            <p class="text-3xl font-bold mt-2">{{ $totalCourses }}</p>
        </div>

        <div class="bg-green-500 text-white font-bold p-6 rounded-lg shadow hover:shadow-xl transition">
            <h2 class="text-sm uppercase tracking-wide opacity-80">✅ Active Courses</h2>
            <p class="text-3xl font-bold mt-2">{{ $activeCourses }}</p>
        </div>

        <div class="bg-yellow-500 text-white font-bold p-6 rounded-lg shadow hover:shadow-xl transition">
            <h2 class="text-sm uppercase tracking-wide opacity-80">👥 Total Users</h2>
            <p class="text-3xl font-bold mt-2">{{ $totalUsers }}</p>
        </div>

        <div class="bg-purple-600 text-white font-bold p-6 rounded-lg shadow hover:shadow-xl transition">
            <h2 class="text-sm uppercase tracking-wide opacity-80">📑 Total Materials</h2>
            <p class="text-3xl font-bold mt-2">{{ $totalMaterials }}</p>
        </div>
    </div>

    <!-- Quick Management -->
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Quick Management</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <a href="{{ route('admin.courses.index') }}" 
           class="bg-blue-600 text-white font-semibold p-6 rounded-lg shadow hover:bg-blue-700 transition text-center">
           📘 Manage Courses
        </a>

        <a href="{{ route('admin.users.index') }}" 
           class="bg-yellow-500 text-white font-semibold p-6 rounded-lg shadow hover:bg-yellow-600 transition text-center">
           👥 Manage Users
        </a>

    </div>
</div>
@endsection

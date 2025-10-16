@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-2">Dashboard Admin</h1>
    <p class="text-gray-600 mb-6">Selamat datang di panel pengelolaan EduBridge 🎓</p>

    <!-- Statistik ringkas -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-blue-500 text-white p-6 rounded shadow">
            <h2 class="text-lg font-semibold">Total Courses</h2>
            <p class="text-2xl font-bold">{{ $totalCourses }}</p>
        </div>
        <div class="bg-green-500 text-white p-6 rounded shadow">
            <h2 class="text-lg font-semibold">Active Courses</h2>
            <p class="text-2xl font-bold">{{ $activeCourses }}</p>
        </div>
        <div class="bg-yellow-400 text-white p-6 rounded shadow">
            <h2 class="text-lg font-semibold">Total Users</h2>
            <p class="text-2xl font-bold">{{ $totalUsers }}</p>
        </div>
        <div class="bg-purple-500 text-white p-6 rounded shadow">
            <h2 class="text-lg font-semibold">Total Materials</h2>
            <p class="text-2xl font-bold">{{ $totalMaterials }}</p>
        </div>
    </div>

    <!-- Quick Links -->
    <h2 class="text-2xl font-semibold mb-4">Quick Management</h2>
    <div class="grid md:grid-cols-3 gap-6">
        <a href="{{ route('admin.courses.index') }}" 
           class="bg-blue-600 text-white p-6 rounded shadow hover:bg-blue-700 transition text-center">
            Manage Courses
        </a>
        <a href="{{ route('admin.users.index') }}" 
           class="bg-yellow-600 text-white p-6 rounded shadow hover:bg-yellow-700 transition text-center">
            Manage Users
        </a>
    </div>
</div>
@endsection

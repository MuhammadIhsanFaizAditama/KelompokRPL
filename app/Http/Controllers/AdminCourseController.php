<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class AdminCourseController extends Controller
{
    // Tampilkan daftar kursus
    public function index()
    {
        $courses = Course::all();
        return view('admin.courses.index', compact('courses'));
    }

    // Form tambah kursus baru
    public function create()
    {
        return view('admin.courses.create');
    }

    // Simpan kursus baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:active,inactive',
        ]);

        // Gunakan fillable di model Course agar mass assignment aman
        Course::create($request->only(['title', 'description', 'status']));

        return redirect()->route('admin.courses.index')->with('success', 'Kursus berhasil dibuat.');
    }

    // Tampilkan detail satu kursus
    public function show(Course $course)
    {
        return view('admin.courses.show', compact('course'));
    }

    // Form edit kursus
    public function edit(Course $course)
    {
        return view('admin.courses.edit', compact('course'));
    }

    // Update kursus
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:active,inactive',
        ]);

        $course->update($request->only(['title', 'description', 'status']));

        return redirect()->route('admin.courses.index')->with('success', 'Kursus berhasil diperbarui.');
    }

    // Hapus kursus
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('admin.courses.index')->with('success', 'Kursus berhasil dihapus.');
    }





}

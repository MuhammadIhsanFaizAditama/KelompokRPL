<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Material;

class AdminMaterialController extends Controller
{
    // 🟩 Tampilkan semua materi untuk kursus tertentu
    public function index(Course $course)
    {
        $materials = $course->materials;
        return view('admin.materials.index', compact('course', 'materials'));
    }

    // 🟩 Form tambah materi
    public function create(Course $course)
    {
        return view('admin.materials.create', compact('course'));
    }

    // 🟩 Simpan materi baru
    public function store(Request $request, Course $course)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'youtube_link' => 'nullable|string',
        ]);

        $course->materials()->create([
            'title' => $request->title,
            'content' => $request->content,
            'youtube_link' => $request->youtube_link,
        ]);

        return redirect()
            ->route('admin.courses.materials.index', $course->id)
            ->with('success', 'Materi berhasil ditambahkan!');
    }

    // 🟩 Form edit materi
    public function edit(Course $course, Material $material)
    {
        return view('admin.materials.edit', compact('course', 'material'));
    }

    // 🟩 Update materi
    public function update(Request $request, Course $course, Material $material)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'youtube_link' => 'nullable|string',
        ]);

        $material->update([
            'title' => $request->title,
            'content' => $request->content,
            'youtube_link' => $request->youtube_link,
        ]);

        return redirect()->route('admin.courses.materials.index', $course->id)
                         ->with('success', 'Materi berhasil diperbarui!');
    }

    // 🟩 Hapus materi
    public function destroy(Course $course, Material $material)
    {
        $material->delete();

        return redirect()
            ->route('admin.courses.materials.index', $course->id)
            ->with('success', 'Materi berhasil dihapus!');
    }

    // 🟩 Tampilkan semua materi tanpa filter course
    public function allMaterials()
    {
        $materials = Material::with('course')->get();
        return view('admin.materials.all', compact('materials'));
    }
}

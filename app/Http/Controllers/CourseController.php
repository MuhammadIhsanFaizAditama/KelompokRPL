<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    // Menampilkan daftar kursus student
public function index(Request $request)
{
    $user = Auth::user();

    /** @var \App\Models\User $user */

    // // Ambil input pencarian
    // $search = $request->input('search');

    // // Ambil hanya kursus yang aktif dan cocok dengan pencarian (kalau ada)
    // $courses = Course::where('status', 'active')
    //     ->when($search, function ($query, $search) {
    //         $query->where('title', 'like', "%{$search}%")
    //               ->orWhere('description', 'like', "%{$search}%");
    //     })
    //     ->get();

    // Ambil hanya kursus yang status-nya aktif
    $courses = Course::where('status', 'active')->get();

    // Ambil ID course yang sudah diikuti (status active)
    $enrolledCourseIds = $user->courses()
                              ->wherePivot('status', 'active')
                              ->pluck('course_id')
                              ->toArray();

    return view('student.courses.index', compact('courses', 'enrolledCourseIds', ));
}

    // Menampilkan materi suatu kursus
    public function materials(Course $course)
    {
        $course->load('materials'); // pastikan relasi materials sudah ada
        return view('student.courses.materials', compact('course'));
    }

    // Fitur Ikuti Kursus
    public function enroll($courseId)
    {
        $user = Auth::user();
        $course = Course::findOrFail($courseId);

        /** @var \App\Models\User $user */

        // Cek apakah user sudah mengikuti kursus ini
        if ($user->courses()->where('course_id', $courseId)->exists()) {
            return redirect()->back()->with('info', 'Kamu sudah mengikuti kursus ini.');
        }

        // Tambahkan ke pivot table dengan status active
        $user->courses()->attach($courseId, ['status' => 'active']);

        return redirect()
            ->route('student.courses')
            ->with('success', 'Berhasil mengikuti kursus!');
    }

    public function unenroll($courseId)
{

     /** @var \App\Models\User $user */
    $user = Auth::user();
    $user->courses()->detach($courseId);

    return redirect()->route('student.courses')
                     ->with('success', 'Batal Mengikuti Kursus.');
}


   public function showMaterial($courseId, $materialId)
{
    $user = Auth::user();
    /** @var \App\Models\User $user */

    // Ambil course dan materi
    $course = \App\Models\Course::findOrFail($courseId);
    $material = $course->materials()->findOrFail($materialId);

    // Tandai materi ini sebagai dibaca
    $user->materials()->syncWithoutDetaching([
        $material->id => ['is_read' => true]
    ]);

    // Hitung jumlah materi di course
    $totalMaterials = $course->materials()->count();

    // Hitung jumlah materi yang sudah dibaca user
    $completedMaterials = $course->materials()
        ->whereHas('usersRead', function($q) use ($user) {
            $q->where('user_id', $user->id);
        })
        ->count();

    // Jika semua materi sudah dibaca, tandai materi terakhir sebagai completed
    if ($completedMaterials == $totalMaterials) {
        $user->materials()->syncWithoutDetaching([
            $material->id => ['is_completed' => true]
        ]);
    }

    return view('student.courses.show', compact('course', 'material'));
}

}

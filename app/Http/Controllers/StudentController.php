<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use App\Models\Material;

class StudentController extends Controller
{
public function dashboard()
{
    $user = Auth::user();
    
    /** @var \App\Models\User $user */

    // Ambil semua course yang diikuti student
    $enrolledCourses = $user->courses()
        ->withCount([
            'materials', // total materi
            'materials as completed_materials' => function ($query) use ($user) {
              $query->whereHas('usersRead', function ($q) use ($user) {
                    $q->where('user_id', $user->id)
                      ->where('material_user.is_read', true); // ✅ pakai nama table pivot
                });
            }
        ])
        ->get();

    // Statistik lainnya (opsional)
    $totalCourses = Course::where('status', 'active')->count();
    $activeCourses = $user->courses()->wherePivot('status', 'active')->count();
    $unreadMaterials = Material::whereDoesntHave('usersRead', function ($query) use ($user) {
        $query->where('user_id', $user->id);
    })->count();

    return view('student.dashboard', compact(
        'user',
        'totalCourses',
        'activeCourses',
        'unreadMaterials',
        'enrolledCourses'
    ));
}

}
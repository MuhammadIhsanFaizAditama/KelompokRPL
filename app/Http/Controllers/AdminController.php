<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Material;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{

    public function __construct()
{
    $this->middleware('auth');

    $this->middleware(function ($request, $next) {
        if (auth::user()->role !== 'admin') {
            return redirect('/')->with('info', 'Anda tidak memiliki akses ke halaman admin.');
        }
        return $next($request);
    });
}



    public function dashboard()
    {
        $totalCourses = Course::count();
        $activeCourses = Course::where('status', 'active')->count();
        $totalUsers = User::count();
        $totalMaterials = Material::count();
        $courses = Course::all(); // atau Course::where('status', 'active')->get();
        

        return view('admin.dashboard', compact(
            'totalCourses',
            'activeCourses',
            'totalUsers',
            'totalMaterials',
            'courses'
        ));
    }


//     public function reports()
// {
//     // Ambil data untuk laporan
//     $totalCourses = \App\Models\Course::count();
//     $totalUsers = \App\Models\User::count();
//     $totalMaterials = \App\Models\Material::count();

//     // Statistik harian (misal user aktif 7 hari terakhir)
//     $userActivity = \App\Models\User::selectRaw('DATE(updated_at) as date, COUNT(*) as total')
//         ->where('updated_at', '>=', now()->subDays(7))
//         ->groupBy('date')
//         ->orderBy('date', 'asc')
//         ->pluck('total', 'date')
//         ->toArray();

//     return view('admin.reports', compact(
//         'totalCourses',
//         'totalUsers',
//         'totalMaterials',
//         'userActivity'
//     ));
// }


}

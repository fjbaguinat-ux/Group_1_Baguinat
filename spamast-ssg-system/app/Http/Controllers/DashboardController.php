<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'user'          => Auth::user(),
            'totalStudents' => Student::count(),
        ]);
    }
}
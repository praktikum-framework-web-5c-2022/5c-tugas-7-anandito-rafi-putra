<?php

namespace App\Http\Controllers;

use App\Models\Extracurricular;
use App\Models\Student;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $students = Student::count();
        $extracurriculars = Extracurricular::count();

        return view('dashboard', compact('students','extracurriculars'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\StudentMarksheet;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public  function index(Request $request)
    {
        $data['student_count'] = Student::count();
        $data['marksheet_count'] = StudentMarksheet::count();
        $data['user_count'] = User::count();
        return view('dashboard1', $data);
    }
}

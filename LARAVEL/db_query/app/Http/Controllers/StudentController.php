<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function show()
    {
     
        $student = DB::table('students')
            ->join('teacher', 'students.id', '=', 'teacher.student_id') 
            ->select('students.*', 'teacher.*') 
            ->get();

       
        return view('welcome', compact('student'));
    }
}


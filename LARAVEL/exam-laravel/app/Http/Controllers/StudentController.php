<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Details;

class StudentController extends Controller
{
    public function show($id)
    {
        $student = Student::with('posts')->findOrFail($id); // Eager load posts
        return view('welcome', compact('student')); // Pass single student
    }
}

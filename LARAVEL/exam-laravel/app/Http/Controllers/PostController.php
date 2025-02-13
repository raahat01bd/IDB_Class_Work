<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $students = Student::with('posts')->get(); // Eager load posts for multiple students
        return view('welcome', compact('students')); // Pass multiple students
    }
}



<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Display all students
    public function index()
{
    // Retrieve all students
    $students = Student::all();
    return response()->json([
        'results' => $students
    ], 200);

    // Pass the data to the view
    // return view('welcome', compact('students'));
}

}

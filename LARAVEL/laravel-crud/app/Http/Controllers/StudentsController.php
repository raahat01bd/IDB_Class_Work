<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function show()
    {
        $students = Student::all();
        return view('home', compact('students'));
    }
    // public function update($students_id)
    // {
    //     $student = Student::find($students_id);
    //     return view('edit', compact('student'));
    // }

    // public function edit(Request $request, $flights_id)
    // {
    //     $students = Student::find($flights_id);
    //     if ($students) {  // Check if flight exists
    //         $students->name = $request->name;
    //         $students->address = $request->address;
    //         $students->email = $request->email; 
    //         $students->save();
    //     }
    //     return redirect('home');
    // } 
    public function destroy($id)
    {
        $students = Student::find($id);
        if ($students) {  // Check if flight exists
            $students->delete();
        }
        return redirect('home')->with('success', 'Flight deleted successfully.');
    }
    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
      // Create a new flight entry
        $students = new Student();
        $students->name = $request->name;
        $students->address = $request->address;
        $students->email = $request->email;
        $students->save();

        return redirect('home');
    }
}

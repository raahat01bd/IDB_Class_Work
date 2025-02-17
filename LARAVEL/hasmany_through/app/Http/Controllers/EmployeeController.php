<?php

namespace App\Http\Controllers;

use App\Models\Employee;

class EmployeeController extends Controller
{
    public function show()
    {
     
        $employee = Employee::with('products')->get();
        // return $employee;
        return view('welcome', compact('employee'));
    }
}

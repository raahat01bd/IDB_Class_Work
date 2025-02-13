<?php

namespace App\Http\Controllers;

use App\Models\Mechanic;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $mechanic = Mechanic::with('carOwner')->get();

        return view('welcome', compact('mechanic'));
    }
}

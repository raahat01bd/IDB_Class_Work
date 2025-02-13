<?php

namespace App\Http\Controllers;

use App\Models\Mechanic;
use App\Models\Car;
use Illuminate\Http\Request;

class MechanicController extends Controller
{
    public function index()
    {
        $mechanic = Mechanic::with('carOwner')->get();
        return $mechanic;

    }
   
}

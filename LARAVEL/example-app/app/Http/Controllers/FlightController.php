<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flight;

class FlightController extends Controller
{
    public function show()
    {
        $flights = Flight::all();
        return view('home', compact('flights'));
    }

    public function destroy($id)
    {
        $flights = Flight::find($id);
        if ($flights) {  // Check if flight exists
            $flights->delete();
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
        $ss = new Flight();
        $ss->name = $request->name;
        $ss->email = $request->email; // Assuming 'flight_number' exists in DB
        $ss->save();

        return redirect('home');
    }

    public function update($flights_id)
    {
        $flight = Flight::find($flights_id);
        return view('edit', compact('flight'));
    }

    public function edit(Request $request, $flights_id)
    {
        $flight = Flight::find($flights_id);
        if ($flight) {  // Check if flight exists
            $flight->name = $request->name;
            $flight->email = $request->email; 
            $flight->save();
        }
        return redirect('home');
    } 
}

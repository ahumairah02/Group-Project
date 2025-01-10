<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use App\Models\Destination;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    // Show available flights for a destination
    public function index(Request $request)
    {
    $destinationId = $request->input('destination');
    $destinations = Destination::all();
    $flights = Flight::where('destination_id', $destinationId)->get(); // Make sure this query returns multiple flights

    return view('pages.destinations.index', compact('destinations', 'flights'));
    }

    // Search for flights based on user input
    public function search(Request $request)
    {
        // Validate the request (just destination in this case)
        $request->validate([
            'destination' => 'required',
        ]);

        $destinationId = $request->input('destination');
        $destination = Destination::find($destinationId);  // Retrieve the destination

        // Fetch flights and sort by price (ascending)
        $flights = Flight::where('destination_id', $destinationId)
                         ->orderBy('price', 'asc') // Sort by price
                         ->get();

        return view('pages.flights.results', compact('flights', 'destination'));  // Pass flights and destination to the view
    }
}

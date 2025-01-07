<?php

namespace App\Http\Controllers;

use App\Models\Destination; // Correctly importing the model
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    public function index()
    {
        // Fetch all destinations
        $destinations = Destination::all();

        // Fetch suggested destinations (e.g., based on a similar category or random selection)
        $suggestedDestinations = Destination::inRandomOrder()->limit(4)->get();  // Example for random suggestions

        // Pass both to the view
        return view('pages.destinations.index', compact('destinations', 'suggestedDestinations'));
    }

    // DestinationController.php
public function show($destination_id)
{
    $destination = Destination::with(['hotels', 'restaurants', 'travelPackages'])->findOrFail($destination_id); // Fetch destination with related data
    return view('pages.destinations.show', compact('destination'));
}


    public function submit(Request $request)
{
    // Validate the form data
    $validated = $request->validate([
        'destination_id' => 'required|exists:destinations,destination_id',
        'depart_date' => 'required|date',
        'return_date' => 'required|date|after_or_equal:depart_date',
        'duration' => 'required|integer|min:1',
    ]);

    // Get destination details
    $destination = Destination::findOrFail($request->destination_id);

    // Process or store the data as needed
    // Example: Store it in the session for later use
    $tripDetails = [
        'destination' => $destination,
        'depart_date' => $request->depart_date,
        'return_date' => $request->return_date,
        'duration' => $request->duration,
    ];

    session(['tripDetails' => $tripDetails]);

    // Redirect to a page with trip details or display success message
    return redirect()->route('destinations.index')->with('success', 'Trip details saved successfully!');
}


}




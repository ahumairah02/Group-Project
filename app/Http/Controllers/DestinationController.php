<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Hotel;
use App\Models\Restaurant;
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

    // Show destination with optional related data
    public function show($id, $withRelatedData = false)
    {
        // Check if related data needs to be loaded
        if ($withRelatedData) {
            // Load destination with related data (hotels, restaurants, travel packages)
            $destination = Destination::with(['hotels', 'restaurants', 'travelPackages'])->findOrFail($id);
        } else {
            // Load only the destination without related data
            $destination = Destination::findOrFail($id);
        }

        return view('pages.destinations.show', compact('destination'));
    }

    // Store new destination with image
    public function store(Request $request)
    {
        // Validate the form data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'country' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // Validate the image file
        ]);

        // Create a new Destination instance
        $destination = new Destination();
        $destination->name = $request->name;
        $destination->description = $request->description;
        $destination->country = $request->country;

        // Handle the image upload if the file is provided
        if ($request->hasFile('image')) {
            // Generate a unique name for the image
            $imageName = time() . '.' . $request->image->extension();

            // Move the image to the public folder (frontend/images in this case)
            $request->image->move(public_path('frontend/images'), $imageName);

            // Store the image name in the database
            $destination->image = $imageName;
        }

        // Save the destination record
        $destination->save();

        // Redirect to the destinations index page
        return redirect()->route('destinations.index')->with('success', 'Destination created successfully!');
    }

    // Handle trip submission (saving trip details in the session)
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

    // Search for destinations with halal-friendly amenities and flights
    public function search(Request $request)
    {
        $request->validate([
            'destination' => 'required',
            'depart_date' => 'required|date',
            'return_date' => 'required|date|after_or_equal:depart_date',
            'travellers' => 'required|integer|min:1',
            'cabin_class' => 'required|string',
        ]);

        $destinationId = $request->input('destination');
        $destination = Destination::find($destinationId);

        // Fetch halal-friendly amenities and flights (mock data for example)
        $hotels = Hotel::where('destination_id', $destinationId)->get();
        $restaurants = Restaurant::where('destination_id', $destinationId)->get();
        $flights = [
            ['flight_no' => 'MH123', 'price' => 500, 'cabin_class' => $request->input('cabin_class')],
            ['flight_no' => 'SQ456', 'price' => 700, 'cabin_class' => $request->input('cabin_class')],
        ];

        return view('pages.destinations.results', compact('destination', 'hotels', 'restaurants', 'flights'));
    }
}

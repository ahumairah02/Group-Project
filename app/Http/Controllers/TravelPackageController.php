<?php

namespace App\Http\Controllers;

use App\Models\TravelPackage;
use App\Models\Destination; // Import Destination model for dropdowns
use Illuminate\Http\Request;

class TravelPackageController extends Controller
{
    // Display a list of travel packages
    public function index()
    {
        $travel_packages = TravelPackage::with('destination')->get(); // Load related destination
        return view('travel_packages.index', compact('travel_packages'));
    }

    // Show the form for creating a new travel package
    public function create()
    {
        $destinations = Destination::all(); // Fetch all destinations for the dropdown
        return view('travel_packages.create', compact('destinations'));
    }

    // Store a newly created travel package in the database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|integer|min:1',
            'destination_id' => 'required|exists:destinations,id', // Ensure the destination exists
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $travelPackage = new TravelPackage($validated);

        // Handle image upload if provided
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('frontend/images'), $imageName);
            $travelPackage->image = $imageName;
        }

        $travelPackage->save();

        return redirect()->route('travel_packages.index')->with('success', 'Travel package created successfully!');
    }

    // Display the details of a specific travel package
    public function show($id)
    {
        $travel_package = TravelPackage::with('destination')->findOrFail($id); // Load related destination
        return view('travel_packages.show', compact('travel_package'));
    }

    // Show the form for editing an existing travel package
    public function edit($id)
    {
        $travel_package = TravelPackage::findOrFail($id);
        $destinations = Destination::all();
        return view('travel_packages.edit', compact('travel_package', 'destinations'));
    }

    // Update an existing travel package in the database
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|integer|min:1',
            'destination_id' => 'required|exists:destinations,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $travelPackage = TravelPackage::findOrFail($id);

        // Handle image upload if provided
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('frontend/images'), $imageName);
            $travelPackage->image = $imageName;
        }

        $travelPackage->update($validated);

        return redirect()->route('travel_packages.index')->with('success', 'Travel package updated successfully!');
    }

    // Delete an existing travel package
    public function destroy($id)
    {
        $travelPackage = TravelPackage::findOrFail($id);
        $travelPackage->delete();
        return redirect()->route('travel_packages.index')->with('success', 'Travel package deleted successfully!');
    }

    // Display travel packages by destination
    public function byDestination($destination_id)
    {
        $packages = TravelPackage::where('destination_id', $destination_id)->get();
        return view('travel_packages.index', compact('packages'));
    }
}

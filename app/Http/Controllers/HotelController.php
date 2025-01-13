<?php

namespace App\Http\Controllers;
use App\Models\Destination;
use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index(Request $request)
    {
        $hotels = Hotel::all();

        // Get the destination ID from the query string
        $destination_id = $request->query('destination_id');

        // Retrieve restaurants based on the destination ID
        $hotels = Hotel::where('destination_id', $destination_id)->get();

        // Retrieve the destination name
        $destination = Destination::find($destination_id);

        // Pass the data to the view
        return view('pages.hotels.index', compact('hotels','destination'));
    }

    public function create()
    {
        return view('hotels.create');
    }

    public function store(Request $request)
    {
        Hotel::create($request->all());
        return redirect()->route('pages.hotels.index');
    }

    /*public function show($destination_id, $hotel_id)
    {
        // Fetch the destination and hotel based on the IDs
        $destination = Destination::findOrFail($destination_id);
        $hotels = Restaurant::findOrFail($hotel_id);

        // Return the view with hotel and destination data
        return view('pages.hotel.show', compact('hotel', 'destination'));
    }*/

    public function byDestination($destination_id)
    {
        // Fetch the destination details
        $destination = Destination::findOrFail($destination_id);

        // Fetch hotels related to this destination
        $hotels = Hotel::where('destination_id', $destination_id)->paginate(10);

        // Pass both hotels and destination to the view
        return view('pages.hotel.index', compact('hotels', 'destination'));
    }

}

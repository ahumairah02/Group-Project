<?php

namespace App\Http\Controllers;
use App\Models\Destination;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    /*public function index()
    {
        $restaurants = Restaurant::with('destination')->paginate(10);
        return view('pages.restaurant.index', compact('restaurants'));
    }*/

    public function index(Request $request)
    {
        // Get the destination ID from the query string
        $destination_id = $request->query('destination_id');

        // Retrieve restaurants based on the destination ID
        $restaurants = Restaurant::where('destination_id', $destination_id)->get();

        // Retrieve the destination name
        $destination = Destination::find($destination_id);

        // Pass restaurants to the view
        return view('pages.restaurant.index', compact('restaurants', 'destination'));
    }



    public function create()
    {
        return view('restaurants.create');
    }

    public function store(Request $request)
    {
        Restaurant::create($request->all());
        return redirect()->route('pages.restaurant.index');
    }


    public function show($id)
{
    // Retrieve the restaurant by ID
    $restaurant = Restaurant::findOrFail($id);

    // Pass the restaurant to the view
    return view('pages.restaurant.show', compact('restaurant'));
}


/*public function show($request)
{

    // Get the destination ID from the query string
    $destination_id = $request->query('destination_id');

    // Retrieve restaurants based on the destination ID
    $restaurants = Restaurant::where('destination_id', $destination_id)->get();

    // Retrieve the destination name
    $destination = Destination::find($destination_id);

    // Pass restaurants to the view
    return view('pages.restaurant.index', compact('restaurants', 'destination'));
}
    // RestaurantController.php
/*public function byDestination($destination_id)
{
    $restaurants = Restaurant::where('destination_id', $destination_id)->get();
    return view('pages.restaurant.index', compact('restaurants'));
}*/

public function byDestination($destination_id)
{
    // Fetch the destination details
    $destination = Destination::findOrFail($destination_id);

    // Fetch restaurants related to this destination
    $restaurants = Restaurant::where('destination_id', $destination_id)->paginate(10);

    // Pass both restaurants and destination to the view
    return view('pages.restaurant.index', compact('restaurants', 'destination'));
}



}

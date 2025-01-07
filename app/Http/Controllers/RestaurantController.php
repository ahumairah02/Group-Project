<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::all();
        return view('restaurants.index', compact('restaurants'));
    }

    public function create()
    {
        return view('restaurants.create');
    }

    public function store(Request $request)
    {
        Restaurant::create($request->all());
        return redirect()->route('restaurants.index');
    }

    public function show($id)
    {
        $restaurants = Restaurant::findOrFail($id);
        return view('restaurants.show', compact('restaurants'));
    }
}

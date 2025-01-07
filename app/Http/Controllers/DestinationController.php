<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    public function index()
    {
        $destinations = Destination::all();
        return view('destinations.index', compact('destinations'));
    }

    public function create()
    {
        return view('destinations.create');
    }

    public function store(Request $request)
    {
        Destination::create($request->all());
        return redirect()->route('destinations.index');
    }

    public function show($id)
    {
        $destination = Destination::findOrFail($id);
        return view('destinations.show', compact('destination'));
    }
}

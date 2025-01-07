<?php

namespace App\Http\Controllers;

use App\Models\TravelPackage;
use Illuminate\Http\Request;

class TravelPackageController extends Controller
{
    public function index()
    {
        $travel_packages = TravelPackage::all();
        return view('travel_packages.index', compact('travel_packages'));
    }

    public function create()
    {
        return view('travel_packages.create');
    }

    public function store(Request $request)
    {
        TravelPackage::create($request->all());
        return redirect()->route('travel_packages.index');
    }

    public function show($id)
    {
        $travel_packages = TravelPackage::findOrFail($id);
        return view('travel_packages.show', compact('travel_packages'));
    }
}

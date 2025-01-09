@extends('layouts.app')

@section('content')
<header class="text-center">
    <h1>Search Results for {{ $destination->name }}</h1>
</header>

<div class="container mt-4">
    <h2>Halal-Friendly Amenities</h2>
    <div class="row">
        @foreach($hotels as $hotel)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $hotel->name }}</h5>
                        <p class="card-text">{{ $hotel->description }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <h2 class="mt-4">Restaurants</h2>
    <div class="row">
        @foreach($restaurants as $restaurant)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $restaurant->name }}</h5>
                        <p class="card-text">{{ $restaurant->description }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <h2 class="mt-4">Flight Tickets</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Flight No</th>
                <th>Price</th>
                <th>Cabin Class</th>
            </tr>
        </thead>
        <tbody>
            @foreach($flights as $flight)
                <tr>
                    <td>{{ $flight['flight_no'] }}</td>
                    <td>${{ $flight['price'] }}</td>
                    <td>{{ ucfirst($flight['cabin_class']) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<a href="{{ route('destinations.index') }}" class="btn btn-secondary mt-4">Back to Search</a>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="destination-header">
        <h1>{{ $destination->name }}</h1>
        <p><strong>Description:</strong> {{ $destination->description }}</p>
        <p><strong>Location:</strong> {{ $destination->country }}</p>
    </div>

    <!-- Links to view related content -->
    <div class="options mt-5">
        <h3>Explore More About {{ $destination->name }}</h3>
        <div class="row">
            <!-- Hotels -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Hotels</h5>
                        <p class="card-text">Discover the best hotels in {{ $destination->name }}.</p>
                        <a href="{{ route('hotels.index', ['destination_id' => $destination->destination_id]) }}" class="btn btn-primary">View Hotels</a>
                    </div>
                </div>
            </div>

            <!-- Restaurants -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Restaurants</h5>
                        <p class="card-text">Explore the top restaurants in {{ $destination->name }}.</p>
                        <a href="{{ route('restaurants.index', ['destination_id' => $destination->destination_id]) }}" class="btn btn-primary">View Restaurants</a>
                    </div>
                </div>
            </div>

            <!-- Travel Packages -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Travel Packages</h5>
                        <p class="card-text">Check out the best travel packages for {{ $destination->name }}.</p>
                        <a href="{{ route('travel-packages.index', ['destination_id' => $destination->destination_id]) }}" class="btn btn-primary">View Travel Packages</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Back Button -->
    <a href="{{ route('destinations.index') }}" class="btn btn-secondary mt-4">Back to All Destinations</a>
</div>
@endsection

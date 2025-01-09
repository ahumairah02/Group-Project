@extends('layouts.app')

@section('content')
<header class="text-center" class="destination-header" style="background-image: url('{{ asset('frontend/images/KL.jpg') }}');">
    <h1>
        {{ $destination->name }}
    </h1>
</header>

<!-- Explore More About Destination Section -->
<div class="options mt-5">
    <h3>Explore More About {{ $destination->name }}</h3>
    <div class="row">
        <!-- Hotels -->
        <div class="col-md-4">
            <div class="card">
                <img src="{{ asset('frontend/images/hotels.jpg') }}" alt="Hotel" class="card-img-top" style="height: 200px; object-fit: cover;">
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
                <img src="{{ asset('frontend/images/restaurants.jpg') }}" alt="Restaurant" class="card-img-top" style="height: 200px; object-fit: cover;">
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
                <img src="{{ asset('frontend/images/travel.jpg') }}" alt="Travel Package" class="card-img-top" style="height: 200px; object-fit: cover;">
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
@endsection

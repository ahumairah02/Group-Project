@extends('layouts.app')

@section('content')
<h1>Search Results for {{ $destination->name }}</h1>

<div class="container mt-4">
    <!-- Halal-Friendly Amenities Section -->
    <h2>Halal-Friendly Amenities</h2>
    <div class="row">
        @foreach($hotels as $hotel)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $hotel->name }}</h5>
                        <p class="card-text">{{ $hotel->description }}</p>
                    </div>
                    <!-- Hotel Image -->
                    <img src="{{ asset('frontend/images/' . $destination->images->first()->image_path) }}" alt="{{ $hotel->name }}" class="card-img-bottom" style="height: 200px; object-fit: cover;">
                </div>
            </div>
        @endforeach
    </div>

    <!-- Restaurants Section -->
    <h2 class="mt-4">Restaurants</h2>
    <div class="row">
        @foreach($restaurants as $restaurant)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $restaurant->name }}</h5>
                        <p class="card-text">{{ $restaurant->description }}</p>
                    </div>
                    <!-- Restaurant Image -->
                    <img src="{{ asset('frontend/images/' . $destination->images->first()->image_path) }}" alt="{{ $restaurant->name }}" class="card-img-bottom" style="height: 200px; object-fit: cover;">
                </div>
            </div>
        @endforeach
    </div>

    <!-- Flights Section -->
    <h2 class="mt-4">Flights Available</h2>

    <!-- Filter for affordable flights -->
    <form method="GET" action="{{ route('destinations.search') }}" class="mb-4">
        <div class="row">
            <div class="col-md-3">
                <label for="filter">Sort by:</label>
                <select name="filter" id="filter" class="form-control">
                    <option value="affordable">Most Affordable</option>
                    <option value="expensive">Most Expensive</option>
                </select>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary mt-4">Filter</button>
            </div>
        </div>
    </form>

    <div class="row">
        @foreach($flights as $flight)
    <div class="col-md-4">
        <div class="card">
            <!-- Display Flight Image based on flight_id -->
            @if($flight->images->isNotEmpty())
                <img src="{{ asset('frontend/images/' . $image->image_path) }}" alt="Flight Image" class="card-img-top" style="height: 200px; object-fit: cover;">
            @else
                <img src="{{ asset('frontend/images/default-flight-image.jpg') }}" alt="Default Flight Image" class="card-img-top" style="height: 200px; object-fit: cover;">
            @endif
            <div class="card-body">
                <h5 class="card-title">{{ $flight->flight_no }}</h5>
                <p class="card-text">Price: RM{{ $flight->price }}</p>
            </div>
        </div>
    </div>
@endforeach

    </div>

</div>

<a href="{{ route('destinations.index') }}" class="btn btn-secondary mt-4">Back to Search</a>
@endsection

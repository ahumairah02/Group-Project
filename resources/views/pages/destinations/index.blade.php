@extends('layouts.app')

@section('title')
    Taqwa Travels
@endsection

@section('content')
<!-- Header Section -->
<header class="text-center">
    <h1>
        Destinations
    </h1>
    <p class="mt-3">
        Home >> Destinations
    </p>
</header>

<main>
    <div class="container">
        <!-- Destination Selection Form -->
        <section class="section-stats row justify-content-center" id="stats">
            <div class="col-12 col-md-12 col-lg-10 stats-detail" style="max-width: 1200px; padding-bottom: 30px; border: 1px solid #ddd;">
                <h2>Choose Your Destination</h2>
                <form action="{{ route('bookings') }}" method="POST"
                      style="border: 1px solid #ddd; border-radius: 8px; padding: 20px; background-color: #f9f9f9;">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-4">
                            <label for="destination">Select Destination</label>
                            <select id="destination" name="destination" class="form-control" required>
                                @foreach($destinations as $destination)
                                    <option value="{{ $destination->destination_id }}">{{ $destination->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="depart_date">Departure Date</label>
                            <input type="date" id="depart_date" name="depart_date" class="form-control" required>
                        </div>
                        <div class="col-md-2">
                            <label for="return_date">Return Date</label>
                            <input type="date" id="return_date" name="return_date" class="form-control" required>
                        </div>
                        <div class="col-md-2">
                            <label for="duration">Duration (in days)</label>
                            <input type="number" id="duration" name="duration" class="form-control" required min="1">
                        </div>
                        <div class="col-md-2 align-self-end">
                            <button type="submit" class="btn btn-primary btn-block mt-2">Submit</button>
                        </div>
                    </div>
                    <!-- Checkbox Section -->
                    <div class="form-row mt-3">
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="muslim_friendly" name="muslim_friendly">
                                <label class="form-check-label" for="muslim_friendly">
                                    Muslim-Friendly Attractions
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="halal_amenities" name="halal_amenities">
                                <label class="form-check-label" for="halal_amenities">
                                    Halal Amenities
                                </label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
    <section class="section-popular" id="popular">
        <div class="container">
            <div class="row">
                <div class="col text-center section-popular-heading">
                    <h2>Destinations</h2>
                    <p>Explore Top Halal-Friendly Places</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section-popular-content" id="popular-content">
        <div class="container">
            <div class="section-popular-travel row justify-content-center">
                @foreach([
                    ['name' => 'Istanbul', 'location' => 'Turkey', 'image' => asset('frontend/images/istanbul.jpeg'), 'destination_id' => 3],
                    ['name' => 'Kuala Lumpur', 'location' => 'Malaysia', 'image' => asset('frontend/images/KL.jpg'), 'destination_id' => 1],
                    ['name' => 'Marrakech', 'location' => 'Morocco', 'image' => asset('frontend/images/marrakech.jpg'), 'destination_id' => 5]
                ] as $destination)
                    <div class="col-sm-6 col-md-6 col-lg-4 mb-4">
                        <div class="card shadow-sm" style="padding: 15px;">
                            <!-- Dynamic Image for Each Destination -->
                            <img src="{{ $destination['image'] }}" class="card-img-top" alt="{{ $destination['name'] }}" style="height: 250px; object-fit: cover;">
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $destination['name'] }}</h5>
                                <p class="card-text">{{ $destination['location'] }}</p>
                                <!-- View Details Button -->
                                <a href="{{ route('destinations.show', ['destination' => $destination['destination_id']]) }}"
                                   class="btn btn-travel-details px-4">View Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

</main>

@endsection

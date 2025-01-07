@extends('layouts.app')

@section('title')
    NOMADS - Explore Destinations
@endsection

@section('content')
<!-- header -->
<header class="text-center">
    <h1>
        Explore The Beautiful World
        <br>
        As Easy One Click
    </h1>
    <p class="mt-3">
        You will see beautiful
        <br>
        moments you've never seen before
    </p>
    <a href="#destination-form" class="btn btn-get-started px-4 mt-4">
        Get Started
    </a>
</header>

<main>
    <div class="container">
        <!-- Destination Selection Form -->
        <section class="section-stats row justify-content-center" id="stats">
            <div class="col-12 col-md-12 col-lg-10 stats-detail" style="max-width: 1200px; padding-bottom: 30px;">
                <h2>Choose Your Destination</h2>
                <form action="{{ route('bookings') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="destination">Select Destination</label>
                        <select id="destination" name="destination" class="form-control" required>
                            @foreach($destinations as $destination)
                                <option value="{{ $destination->destination_id }}">{{ $destination->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="depart_date">Departure Date</label>
                                <input type="date" id="depart_date" name="depart_date" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="return_date">Return Date</label>
                                <input type="date" id="return_date" name="return_date" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="duration">Duration (in days)</label>
                                <input type="number" id="duration" name="duration" class="form-control" required min="1">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </form>
            </div>
        </section>
    </div>

    <!-- Suggested Destinations Section -->
    <section class="section-popular" id="popular">
        <div class="container">
            <div class="row">
                <div class="col text-center section-popular-heading">
                    <h2>Suggested Destinations</h2>
                    <p>Explore other beautiful destinations you might like</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section-popular-content" id="popular-content">
        <div class="container">
            <div class="section-popular-travel row justify-content-center">
                @foreach($suggestedDestinations as $destination)
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="card-travel text-center d-flex flex-column"
                            style="background-image: url('{{ $destination->image_url }}');">
                            <div class="travel-country">{{ $destination->location }}</div>
                            <div class="travel-location">{{ $destination->name }}</div>
                            <div class="travel-button mt-auto">
                                <a href="{{ route('destinations.show', ['destination' => $destination->destination_id]) }}"
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

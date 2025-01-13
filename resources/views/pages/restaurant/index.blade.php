@extends('layouts.app')

@section('title','Restaurant')

@section('content')
<main>
    <div class="container my-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Restaurants in {{ $destination->name ?? 'Selected Location' }}</h1>
            <!-- Button to Saved Restaurants -->
    <a href="{{ route('restaurant.saved') }}" class="btn btn-primary mb-3">Saved Restaurants</a>
        </div>

        <div class="row">
            @foreach ($restaurants as $restaurant)
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title">{{ $restaurant->name }}</h5>
                <p class="card-text">{{ $restaurant->address }}, {{ $restaurant->city }}, {{ $restaurant->country }}</p>
                <p class="card-text">Halal Certified: {{ $restaurant->halal_certified ? 'Yes' : 'No' }}</p>
                <p class="card-text">Rating: {{ $restaurant->rating ?? 'N/A' }}</p>
                <a href="{{ route('restaurant.show', ['restaurant_id' => $restaurant->restaurant_id]) }}">View Restaurant</a>
                <!--@if($restaurant->id)
                    <a href="{{ route('restaurant.show', ['id' => $restaurant->id]) }}">View Restaurant</a>
                @else
                    <span>Restaurant details unavailable</span>
                @endif-->
            </div>
        </div>
    </div>
@endforeach



</main>
<div
<!-- Back Button -->
<a href="{{ url()->previous() }}" class="btn btn-secondary mt-4">Back</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</div>
@endsection

@push('prepend-style')
    <link rel="stylesheet" href="{{ url('frontend/libraries/xzoom/xzoom.css') }}">
@endpush

@push('addon-script')
    <script src="{{ url('frontend/libraries/xzoom/xzoom.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.xzoom, .xzoom-gallery').xzoom({
                zoomWidth: 500,
                title: false,
                tint: '#333',
                xoffset: 15
            });
        });

    </script>
@endpush


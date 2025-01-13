@extends('layouts.app')

@section('title','Hotel')

@section('content')
<main>
    <div class="container my-4">

        <h1 class="mb-4">Hotels in {{ $destination->name }}</h1>

        <div class="row">
            @foreach ($hotels as $hotel)
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title">{{ $hotel->name }}</h5>
                <p class="card-text">{{ $hotel->address }}, {{ $hotel->city }}, {{ $hotel->country }}</p>
                <p class="card-text">Halal Certified: {{ $hotel->halal_certified ? 'Yes' : 'No' }}</p>
                <p class="card-text">Rating: {{ $hotel->rating ?? 'N/A' }}</p>
                <!--<a href="{{ route('restaurant.show', $hotel->id) }}" class="btn btn-primary">View Details</a>-->
                <a href="{{ $hotel->booking_url }}" class="btn btn-primary" target="_blank">
                    Book on Booking.com</a>

            </div>
        </div>
    </div>
@endforeach

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</main>
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

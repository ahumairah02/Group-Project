@extends('layouts.app')

@section('title', $restaurant->name)

@section('content')
<div class="container my-5">
    <!-- Restaurant Name -->
    <h1 class="mb-3">{{ $restaurant->name }}</h1>
    <hr>

<<<<<<< HEAD
    <!-- At a glance section -->
    <div class="row">
        <div class="col-md-8">
            <h5>At a Glance</h5>
            <p><strong>Address:</strong> {{ $restaurant->address }}, {{ $restaurant->city }}, {{ $restaurant->country }}</p>
            <p><strong>Halal Certified:</strong> {{ $restaurant->halal_certified ? 'Yes' : 'No' }}</p>
            <p><strong>Rating:</strong> {{ number_format($restaurant->rating, 1) }}/5.0</p>
=======
        <!-- At a glance section -->
        <div class="row">
            <div class="col-md-8">
                <h5>At a Glance</h5>
                <p><strong>Address:</strong> {{ $restaurant->address }}, {{ $restaurant->city }}, {{ $restaurant->country }}</p>
                <p><strong>Halal Certified:</strong> {{ $restaurant->halal_certified ? 'Yes' : 'No' }}</p>
                <p><strong>Rating:</strong> {{ number_format($restaurant->rating, 1) }}/5.0</p>
            </div>
            <div class="col-md-4 text-end">
                <!--<button class="btn btn-outline-primary">
                    <i class="bi bi-bookmark"></i> Save this Restaurant
                </button>-->
                <!-- Save Button -->
                <form action="{{ route('restaurant.save') }}" method="POST">
                    @csrf
                    <input type="hidden" name="restaurant_id" value="{{ $restaurant->id }}">
                    <button class="btn btn-outline-primary">
                        <i class="bi bi-bookmark"></i> Save this Restaurant
                    </button>
                </form>

            </div>
>>>>>>> 5ac2bd076242f31e88edecd2d2ab6d070532d2cc
        </div>
        <div class="col-md-4 text-end">
            <button class="btn btn-outline-primary">
                <i class="bi bi-bookmark"></i> Save this Restaurant
            </button>
        </div>
    </div>
    <hr>

    <!-- About Section -->
    <div>
        <h5>About</h5>
        <p>{{ $restaurant->description ?? 'No description available.' }}</p>
    </div>
    <hr>

    <!-- Hours Section -->
    <div>
        <h5>Hours</h5>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Day</th>
                    <th>Hours</th>
                </tr>
            </thead>
            <tbody>
                <tr><td>Sunday</td><td>9:00 AM - 11:00 PM</td></tr>
                <tr><td>Monday</td><td>9:00 AM - 11:00 PM</td></tr>
                <tr><td>Tuesday</td><td>9:00 AM - 11:00 PM</td></tr>
                <tr><td>Wednesday</td><td>9:00 AM - 11:00 PM</td></tr>
                <tr><td>Thursday</td><td>9:00 AM - 11:00 PM</td></tr>
                <tr><td>Friday</td><td>9:00 AM - 11:00 PM</td></tr>
                <tr><td>Saturday</td><td>9:00 AM - 11:00 PM</td></tr>
            </tbody>
        </table>
    </div>

    <!-- Back Button -->
    <div class="mt-4">
<<<<<<< HEAD
        <a href="{{ route('home') }}" class="btn btn-secondary">Back to List</a>
=======
        <a href="{{ route('restaurant.index') }}" class="btn btn-secondary">Back to List</a>
>>>>>>> 5ac2bd076242f31e88edecd2d2ab6d070532d2cc
    </div>
</div>
@endsection

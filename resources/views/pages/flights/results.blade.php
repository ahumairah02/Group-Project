@extends('layouts.app')

@section('content')
    <h1>Available Flights for {{ $destination->name }}</h1>

    @if($flights->isEmpty())
        <p>No flights available for this destination.</p>
    @else
        <div class="row">
            @foreach($flights as $flight)
                <div class="col-12 mb-4">
                    <div class="card">
                        <div class="row no-gutters">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <h5 class="card-title">Flight No: {{ $flight->flight_no }}</h5>
                                    <p class="card-text">Price: RM{{ $flight->price }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Destinations</h1>
        <a href="{{ route('destinations.create') }}" class="btn btn-primary mb-3">Add New Destination</a>
        <div class="list-group">
            @foreach($destinations as $destination)
            <a href="{{ route('destinations.show', $destination->destination_id) }}" class="list-group-item list-group-item-action">
                    <h5>{{ $destination->name }}</h5>
                    <p>{{ $destination->description }}</p>
                </a>
            @endforeach
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $destination->name }}</h1>
        <p><strong>Description:</strong> {{ $destination->description }}</p>
        <p><strong>Location:</strong> {{ $destination->location }}</p>
        <a href="{{ route('destinations.index') }}" class="btn btn-primary">Back to Destinations</a>
    </div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $travel_packages->name }}</h1>
    <p><strong>Destination:</strong> {{ $travel_packages->destination->name }}</p>
    <p><strong>Description:</strong> {{ $travel_packages->description }}</p>
    <p><strong>Price:</strong> ${{ number_format($travel_packages->price, 2) }}</p>

    <a href="{{ route('travel_packages.index') }}" class="btn btn-secondary">Back to List</a>
</div>
@endsection

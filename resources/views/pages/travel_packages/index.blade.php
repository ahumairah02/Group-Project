@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Travel Packages</h1>
    <a href="{{ route('travel_packages.create') }}" class="btn btn-primary mb-3">Add New Package</a>

    @if ($travel_packages->isEmpty())
        <p>No travel packages available.</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Destination</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($travel_packages as $package)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $package->name }}</td>
                        <td>{{ $package->destination->name }}</td>
                        <td>${{ number_format($package->price, 2) }}</td>
                        <td>
                            <a href="{{ route('travel_packages.show', $package->package_id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('travel_packages.edit', $package->package_id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('travel_packages.destroy', $package->package_id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection

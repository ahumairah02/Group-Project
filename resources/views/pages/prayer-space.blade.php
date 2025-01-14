@extends('layouts.app')
<head>
    <link rel="stylesheet" href="{{ asset('C:\xampp\htdocs\Group-Project\resources\css\app.css') }}">
</head>

@section('content')
<div class="container my-5">

    <div class="container">
        <div id="prayer-times" class="card"></div>
        <div id="qiblah-direction" class="card"></div>
        <iframe id="mosque-map" src="" width="100%" height="300px" frameborder="0" allowfullscreen></iframe>
    </div>

    <!-- Top Navigation -->
    <div class="row mb-4">
        <div class="col text-center">
            <h1>Prayer Space</h1>
        </div>
    </div>

    <!-- Prayer Time Section -->
    <div class="row">
        <div class="col-md-4">
            <div class="card p-3">
                <h5 class="mb-3">Prayer Time - {{ now()->format('D, d M Y') }}</h5>
                <ul class="list-unstyled">
                    <li>Fajr: <span id="fajr-time">06:55</span></li>
                    <li>Sunrise: <span id="sunrise-time">08:24</span></li>
                    <li>Dhuhur: <span id="dhuhur-time">13:36</span></li>
                    <li class="bg-warning p-2">Asr: <span id="asr-time">16:17</span></li>
                    <li>Maghrib: <span id="maghrib-time">18:41</span></li>
                    <li>Isha’a: <span id="isha-time">19:57</span></li>
                </ul>
            </div>
        </div>

        <!-- Qiblah Finder Section -->
        <div class="col-md-4">
            <div class="card p-3 text-center">
                <h5>Qiblah Finder - <span id="qiblah-direction">91°</span></h5>
                <img src="frontend/images/compass.png" alt="Qiblah Finder" style="width: 80px; display: block; margin: auto;">
            </div>
        </div>

        <!-- Include JavaScript Libraries -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.3.4/axios.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_GOOGLE_MAPS_API_KEY"></script>

        <!-- Mosque Finder Map -->
        <div class="col-md-4">
            <div class="card p-3">
                <h5>Mosque nearby: <span id="mosque-location">Marrakech, Morocco</span></h5>
                <div id="mosque-map" style="height: 250px;"></div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                (position) => {
                    const latitude = position.coords.latitude;
                    const longitude = position.coords.longitude;

                    // Send location to Laravel
                    fetchPrayerTimes(latitude, longitude);
                    fetchQiblahDirection(latitude, longitude);
                    fetchNearbyMosques(latitude, longitude);
                },
                (error) => {
                    alert("Unable to retrieve location. Please enable location services.");
                }
            );
        } else {
            alert("Geolocation is not supported by this browser.");
        }
    });

    async function fetchPrayerTimes(lat, lng) {
        const response = await fetch(`/api/prayer-times?lat=${lat}&lng=${lng}`);
        const data = await response.json();
        document.getElementById('prayer-times').innerHTML = data.html;
    }

    async function fetchQiblahDirection(lat, lng) {
        const response = await fetch(`/api/qiblah?lat=${lat}&lng=${lng}`);
        const data = await response.json();
        document.getElementById('qiblah-direction').innerHTML = `Qiblah: ${data.direction}°`;
    }

    async function fetchNearbyMosques(lat, lng) {
        const response = await fetch(`/api/nearby-mosques?lat=${lat}&lng=${lng}`);
        const data = await response.json();
        // Render the map dynamically
        document.getElementById('mosque-map').src = data.mapUrl;
    }
</script>

@endsection

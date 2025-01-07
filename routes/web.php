<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\TravelPackageController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PaymentController;

// Destinations
Route::resource('destinations', DestinationController::class);

// Hotels
Route::resource('hotels', HotelController::class);

// Restaurants
Route::resource('restaurants', RestaurantController::class);

// Travel Packages
Route::resource('travel-packages', TravelPackageController::class);

// Bookings
Route::resource('bookings', BookingController::class);

// Payments
Route::resource('payments', PaymentController::class);

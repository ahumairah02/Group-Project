<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\TravelPackageController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\HomeController;
use App\Models\Destination; // Add this line

// Home Page
Route::get('/', [HomeController::class, 'index'])->name('home');

// User Dashboard
Route::get('/user-dashboard', [UserDashboardController::class, 'index'])->name('user-dashboard');

// Destinations
Route::resource('destinations', DestinationController::class);
Route::get('/destinations', [DestinationController::class, 'index'])->name('destinations.index');
Route::get('/destinations/{destination}', [DestinationController::class, 'show'])->name('destinations.show');
Route::post('/destinations/submit', [DestinationController::class, 'submit'])->name('destinations.submit');
Route::post('/destinations/search', [DestinationController::class, 'search'])->name('destinations.search');

// New Route for Showing Destination Images
Route::get('/destinations/{id}/images', [DestinationController::class, 'showImages'])->name('destinations.images');

// Hotels
Route::get('/hotels', [HotelController::class, 'index'])->name('hotels.index');
Route::get('/hotels/{destination_id}', [HotelController::class, 'byDestination'])->name('hotels.byDestination');

// Restaurants
Route::get('/restaurants', [RestaurantController::class, 'index'])->name('restaurant.index');
Route::get('/restautants', [RestaurantController::class, 'navRestaurant'])->name('restaurant.navRestaurant');
Route::get('/restaurant', [RestaurantController::class, 'show'])->name('restaurant.show');
Route::get('/restaurants/{destination_id}', [RestaurantController::class, 'byDestination'])->name('restaurant.byDestination');

// Travel Packages
Route::get('/travel-packages', [TravelPackageController::class, 'index'])->name('travel-packages.index');
Route::get('/travel-packages/{destination_id}', [TravelPackageController::class, 'byDestination'])->name('travel-packages.byDestination');

// Bookings
Route::get('/bookings', [BookingController::class, 'index'])->name('bookings');
Route::get('/booking/{flight_id}', [BookingController::class, 'show'])->name('booking.page');

// Payments
Route::resource('payments', PaymentController::class);

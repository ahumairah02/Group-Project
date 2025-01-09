<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\TravelPackageController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserDashboardController; // Add this line
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');


// User Dashboard
Route::get('/user-dashboard', [UserDashboardController::class, 'index'])->name('user-dashboard'); // Add the user-dashboard route

// Destinations
Route::resource('destinations', DestinationController::class);
Route::get('/destinations', [DestinationController::class, 'index'])->name('destinations.index');
Route::get('/destinations/{destination}', [DestinationController::class, 'show'])->name('destinations.show');
Route::post('/destinations/submit', [DestinationController::class, 'submit'])->name('destinations.submit');
Route::post('/destinations/search', [DestinationController::class, 'search'])->name('destinations.search');


// web.php

// Hotels
Route::get('/hotels', [HotelController::class, 'index'])->name('hotels.index');
Route::get('/hotels/{destination_id}', [HotelController::class, 'byDestination'])->name('hotels.byDestination');

// Restaurants
Route::get('/restaurants', [RestaurantController::class, 'index'])->name('restaurants.index');
Route::get('/restaurants/{destination_id}', [RestaurantController::class, 'byDestination'])->name('restaurants.byDestination');

// Travel Packages
Route::get('/travel-packages', [TravelPackageController::class, 'index'])->name('travel-packages.index');
Route::get('/travel-packages/{destination_id}', [TravelPackageController::class, 'byDestination'])->name('travel-packages.byDestination');


// Bookings
Route::get('/bookings', [BookingController::class, 'index'])->name('bookings');

// Payments
Route::resource('payments', PaymentController::class);

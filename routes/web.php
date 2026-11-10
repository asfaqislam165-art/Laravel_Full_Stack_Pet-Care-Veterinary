<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [FrontendController::class, 'home'])->name('home');
Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/services', [FrontendController::class, 'services'])->name('services');
Route::get('/pricing', [FrontendController::class, 'pricing'])->name('pricing');
Route::get('/reviews', [FrontendController::class, 'reviews'])->name('reviews');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');

Route::post('/contact', function(Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'phone' => 'nullable|string',
        'subject' => 'required|string|max:255',
        'message' => 'required|string',
    ]);
    \App\Models\ContactMessage::create($validated);
    return back()->with('success', 'Your inquiry has been sent to our concierge team.');
})->name('contact.store');

// Booking Flow
Route::get('/book', [BookingController::class, 'create'])->name('booking.create');
Route::post('/book', [BookingController::class, 'store'])->name('booking.store');
Route::get('/book/success/{booking}', [BookingController::class, 'success'])->name('booking.success');

// Authenticated User Routes (Profile & User Dashboard)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [BookingController::class, 'userDashboard'])->name('dashboard');
    
    // Profile Management Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Protected Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    
    // Pricing CRUD
    Route::get('pricings', [AdminController::class, 'pricingIndex'])->name('pricing.index');
    Route::get('pricings/create', [AdminController::class, 'pricingCreate'])->name('pricing.create');
    Route::post('pricings', [AdminController::class, 'pricingStore'])->name('pricing.store');
    Route::get('pricings/{pricing}/edit', [AdminController::class, 'pricingEdit'])->name('pricing.edit');
    Route::put('pricings/{pricing}', [AdminController::class, 'pricingUpdate'])->name('pricing.update');
    Route::delete('pricings/{pricing}', [AdminController::class, 'pricingDestroy'])->name('pricing.destroy');

    // Bookings Management
    Route::get('bookings', [AdminController::class, 'bookingsIndex'])->name('bookings.index');
    Route::get('bookings/{booking}', [AdminController::class, 'bookingShow'])->name('bookings.show');
    Route::patch('bookings/{booking}/status', [AdminController::class, 'bookingUpdateStatus'])->name('bookings.status');

    // Reviews Management
    Route::get('reviews', [AdminController::class, 'reviewsIndex'])->name('reviews.index');
    Route::get('reviews/create', [AdminController::class, 'reviewsCreate'])->name('reviews.create');
    Route::post('reviews', [AdminController::class, 'reviewsStore'])->name('reviews.store');
    Route::get('reviews/{review}/edit', [AdminController::class, 'reviewsEdit'])->name('reviews.edit');
    Route::put('reviews/{review}', [AdminController::class, 'reviewsUpdate'])->name('reviews.update');
    Route::patch('reviews/{review}/toggle', [AdminController::class, 'reviewToggle'])->name('reviews.toggle');
    Route::delete('reviews/{review}', [AdminController::class, 'reviewDestroy'])->name('reviews.destroy');

    // Messages Management
    Route::get('messages', [AdminController::class, 'messagesIndex'])->name('messages.index');
    Route::get('messages/{message}', [AdminController::class, 'messagesShow'])->name('messages.show');
    Route::delete('messages/{message}', [AdminController::class, 'messageDestroy'])->name('messages.destroy');

    // Website Settings
    Route::get('settings', [AdminController::class, 'settingsEdit'])->name('settings.edit');
    Route::put('settings/{setting}', [AdminController::class, 'settingsUpdate'])->name('settings.update');
});

require __DIR__.'/auth.php';
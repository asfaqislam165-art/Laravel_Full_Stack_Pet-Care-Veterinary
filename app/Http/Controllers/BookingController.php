<?php
namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Pricing;
use Illuminate\Http\Request;

class BookingController extends Controller {
    public function create() {
        $pricings = Pricing::where('is_active', true)->get();
        return view('booking', compact('pricings'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:30',
            'pet_name' => 'required|string|max:255',
            'pet_type' => 'required|string|in:Dog,Cat,Rabbit,Bird,Other',
            'pricing_id' => 'required|exists:pricings,id',
            'appointment_date' => 'required|date|after_or_equal:today',
            'appointment_time' => 'required|string',
            'message' => 'nullable|string|max:1000',
        ]);

        if (auth()->check()) {
            $validated['user_id'] = auth()->id();
        }

        $booking = Booking::create($validated);

        return redirect()->route('booking.success', $booking->id)
            ->with('success', 'Appointment successfully reserved!');
    }

    public function success(Booking $booking) {
        return view('booking-success', compact('booking'));
    }

    public function userDashboard() {
        $bookings = auth()->user()->bookings()->with('pricing')->latest()->get();
        return view('dashboard', compact('bookings'));
    }
}
<?php
namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Pricing;
use App\Models\Review;
use App\Models\ContactMessage;
use App\Models\WebsiteSetting;
use Illuminate\Http\Request;

class AdminController extends Controller {
    public function dashboard() {
        // Real-time Database Counts & Metrics
        $totalBookings = Booking::count();
        $pendingBookings = Booking::where('status', 'Pending')->count();
        $confirmedBookings = Booking::where('status', 'Confirmed')->count();
        $completedBookings = Booking::where('status', 'Completed')->count();
        
        $totalPricings = Pricing::count();
        $totalMessages = ContactMessage::count();
        $totalReviews = Review::count();

        $recentBookings = Booking::with('pricing')->latest()->take(8)->get();

        return view('admin.dashboard', compact(
            'totalBookings', 
            'pendingBookings', 
            'confirmedBookings', 
            'completedBookings', 
            'totalPricings', 
            'totalMessages', 
            'totalReviews', 
            'recentBookings'
        ));
    }

    // Pricing Management
    public function pricingIndex() {
        $pricings = Pricing::latest()->paginate(10);
        return view('admin.pricing.index', compact('pricings'));
    }

    public function pricingCreate() {
        return view('admin.pricing.create');
    }

    public function pricingStore(Request $request) {
        $request->validate([
            'package_name' => 'required|string|max:255',
            'service_name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|string',
            'description' => 'nullable|string',
        ]);

        Pricing::create($request->all());
        return redirect()->route('admin.pricing.index')->with('success', 'Service package created successfully.');
    }

    public function pricingEdit(Pricing $pricing) {
        return view('admin.pricing.edit', compact('pricing'));
    }

    public function pricingUpdate(Request $request, Pricing $pricing) {
        $request->validate([
            'package_name' => 'required|string|max:255',
            'service_name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|string',
            'description' => 'nullable|string',
            'is_active' => 'boolean',
        ]);

        $pricing->update($request->all());
        return redirect()->route('admin.pricing.index')->with('success', 'Service package updated successfully.');
    }

    public function pricingDestroy(Pricing $pricing) {
        $pricing->delete();
        return back()->with('success', 'Pricing package deleted.');
    }

    // Bookings Management
    public function bookingsIndex(Request $request) {
        $query = Booking::with('pricing')->latest();
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        $bookings = $query->paginate(15);
        return view('admin.bookings.index', compact('bookings'));
    }

    public function bookingShow(Booking $booking) {
        return view('admin.bookings.show', compact('booking'));
    }

    public function bookingUpdateStatus(Request $request, Booking $booking) {
        $request->validate(['status' => 'required|in:Pending,Confirmed,Completed,Cancelled']);
        $booking->update(['status' => $request->status]);
        return back()->with('success', 'Booking status updated successfully.');
    }

    // Customer Reviews Management
    public function reviewsIndex() {
        $reviews = Review::latest()->paginate(10);
        return view('admin.reviews.index', compact('reviews'));
    }

    public function reviewsCreate() {
        return view('admin.reviews.create');
    }

    public function reviewsStore(Request $request) {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'review_text' => 'required|string',
        ]);

        Review::create($validated);

        return redirect()->route('admin.reviews.index')->with('success', 'Review added successfully.');
    }

    public function reviewsEdit($id) {
        $review = Review::findOrFail($id);
        return view('admin.reviews.edit', compact('review'));
    }

    public function reviewsUpdate(Request $request, $id) {
        $review = Review::findOrFail($id);

        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'review_text' => 'required|string',
        ]);

        $review->update($validated);

        return redirect()->route('admin.reviews.index')->with('success', 'Review updated successfully.');
    }

    public function reviewToggle(Review $review) {
        $review->update(['is_active' => !$review->is_active]);
        return back()->with('success', 'Review status toggled.');
    }

    public function reviewDestroy(Review $review) {
        $review->delete();
        return back()->with('success', 'Review deleted successfully.');
    }

    // Messages Management
    public function messagesIndex() {
        $messages = ContactMessage::latest()->paginate(15);
        return view('admin.messages.index', compact('messages'));
    }

    public function messageShow(ContactMessage $message) {
        return view('admin.messages.show', compact('message'));
    }

    public function messageDestroy(ContactMessage $message) {
        $message->delete();
        return back()->with('success', 'Inquiry deleted.');
    }

    // Settings (Fixed parameter name to match route model binding)
    public function settingsEdit() {
        $settings = WebsiteSetting::first() ?? WebsiteSetting::create([
            'business_name' => 'Paws & Claws Boutique',
            'tagline' => 'Luxury Pet Care & Grooming',
            'phone' => '(800) 555-PAWS',
            'email' => 'concierge@pawsclaws.com',
            'address' => '123 Luxury Avenue, Beverly Hills, CA',
            'business_hours' => 'Mon - Sat: 8:00 AM - 7:00 PM',
        ]);
        return view('admin.settings.edit', compact('settings'));
    }

    public function settingsUpdate(Request $request, WebsiteSetting $setting) {
        $request->validate([
            'business_name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
        ]);

        $setting->update($request->all());
        return back()->with('success', 'Website settings updated successfully.');
    }
}
<?php



namespace App\Http\Controllers;

use App\Models\Pricing;
use App\Models\Review;
use App\Models\WebsiteSetting;
use Illuminate\Http\Request;

class FrontendController extends Controller {
    public function home() {
        $services = Pricing::where('is_active', true)->take(6)->get();
        $reviews = Review::where('is_active', true)->latest()->take(5)->get();
        return view('home', compact('services', 'reviews'));
    }

    public function about() {
        return view('about');
    }

    public function services() {
        $pricings = Pricing::where('is_active', true)->get()->groupBy('service_name');
        return view('services', compact('pricings'));
    }

    public function pricing() {
        $pricings = Pricing::where('is_active', true)->get();
        return view('pricing', compact('pricings'));
    }

    public function reviews() {
        $reviews = Review::where('is_active', true)->latest()->paginate(9);
        return view('reviews', compact('reviews'));
    }

    public function contact() {
        $settings = WebsiteSetting::first() ?? new WebsiteSetting();
        return view('contact', compact('settings'));
    }
}
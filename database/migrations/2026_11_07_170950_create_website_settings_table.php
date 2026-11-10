<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('website_settings', function (Blueprint $table) {
            $table->id();
            $table->string('business_name')->default('Paws & Claws Boutique');
            $table->string('tagline')->default('Luxury Pet Care & Grooming Sanctuary');
            $table->string('phone')->default('(800) 555-PAWS');
            $table->string('email')->default('concierge@pawsandclaws.com');
            
            // সমাধান: text() এর জায়গায় string() ব্যবহার করা হয়েছে যাতে default value কাজ করে
            $table->string('address')->default('742 Evergreen Terrace, Suite 400, Beverly Hills, CA 90210');
            
            $table->string('business_hours')->default('Mon - Sat: 8:00 AM - 7:00 PM');
            $table->string('facebook_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('logo_path')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('website_settings');
    }
};
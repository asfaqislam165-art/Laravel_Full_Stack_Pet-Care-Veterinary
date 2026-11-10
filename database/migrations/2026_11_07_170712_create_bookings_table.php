<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('customer_name');
            $table->string('email');
            $table->string('phone');
            $table->string('pet_name');
            $table->string('pet_type'); // Dog, Cat, Rabbit, Bird, Other
            $table->foreignId('pricing_id')->constrained('pricings')->cascadeOnDelete();
            $table->date('appointment_date');
            $table->string('appointment_time');
            $table->text('message')->nullable();
            $table->string('status')->default('Pending'); // Pending, Confirmed, Completed, Cancelled
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('bookings');
    }
};
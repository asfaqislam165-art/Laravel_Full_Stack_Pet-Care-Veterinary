<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('pricings', function (Blueprint $table) {
            $table->id();
            $table->string('package_name');
            $table->string('service_name'); // Grooming, Boarding, Daycare, Sitting, Walking
            $table->decimal('price', 8, 2);
            $table->string('duration');
            $table->text('description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('pricings');
    }
};
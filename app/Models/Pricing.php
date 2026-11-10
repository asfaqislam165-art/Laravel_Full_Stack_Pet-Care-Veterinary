<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pricing extends Model {
    protected $table = 'pricings';
    protected $fillable = ['package_name', 'service_name', 'price', 'duration', 'description', 'is_active'];

    public function bookings(): HasMany {
        return $this->hasMany(Booking::class);
    }
}
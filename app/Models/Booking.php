<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model {
    protected $fillable = [
        'user_id', 'customer_name', 'email', 'phone', 'pet_name', 
        'pet_type', 'pricing_id', 'appointment_date', 'appointment_time', 'message', 'status'
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function pricing(): BelongsTo {
        return $this->belongsTo(Pricing::class);
    }
}
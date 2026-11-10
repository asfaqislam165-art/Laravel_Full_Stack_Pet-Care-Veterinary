<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteSetting extends Model {
    use HasFactory;

    protected $table = 'website_settings';

    protected $fillable = [
        'business_name', 
        'tagline', 
        'phone', 
        'email', 
        'address', 
        'business_hours', 
        'facebook_url', 
        'instagram_url', 
        'logo_path'
    ];
}
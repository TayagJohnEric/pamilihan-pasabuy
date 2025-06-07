<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rider extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'average_rating',
        'total_deliveries',
        'daily_deliveries',
        'rank',
        'is_available',
        'verification_status',
        'license_number',
        'vehicle_type',
        'current_latitude',
        'current_longitude',
        'location_last_updated_at',
    ];

    protected $casts = [
        'average_rating' => 'decimal:2',
        'is_available' => 'boolean',
        'location_last_updated_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ratings()
    {
        return $this->morphMany(Rating::class, 'rateable');
    }
}
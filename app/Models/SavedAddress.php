<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavedAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'address_label',
        'address_line1',
        'address_line2',
        'barangay',
        'city',
        'province',
        'postal_code',
        'country',
        'latitude',
        'longitude',
        'delivery_notes',
        'is_default',
    ];

    protected $casts = [
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8',
        'is_default' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'delivery_address_id');
    }
}
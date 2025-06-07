<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryZone extends Model
{
    use HasFactory;

    protected $fillable = [
        'zone_name',
        'description',
        'base_delivery_fee',
        'fee_per_km',
        'min_order_for_free_delivery',
        'max_delivery_radius_km',
        'polygon_coordinates',
        'is_active',
    ];

    protected $casts = [
        'base_delivery_fee' => 'decimal:2',
        'fee_per_km' => 'decimal:2',
        'min_order_for_free_delivery' => 'decimal:2',
        'max_delivery_radius_km' => 'decimal:2',
        'polygon_coordinates' => 'array',
        'is_active' => 'boolean',
    ];
}
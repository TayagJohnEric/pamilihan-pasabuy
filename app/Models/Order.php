<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'customer_user_id',
        'rider_user_id',
        'delivery_address_id',
        'order_date',
        'status',
        'estimated_total_amount',
        'delivery_fee',
        'final_total_amount',
        'payment_method',
        'payment_status',
        'payment_intent_id',
        'special_instructions',
    ];

    protected $casts = [
        'order_date' => 'datetime',
        'estimated_total_amount' => 'decimal:2',
        'delivery_fee' => 'decimal:2',
        'final_total_amount' => 'decimal:2',
    ];

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_user_id');
    }

    public function rider()
    {
        return $this->belongsTo(User::class, 'rider_user_id');
    }

    public function deliveryAddress()
    {
        return $this->belongsTo(SavedAddress::class, 'delivery_address_id');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function orderStatusHistory()
    {
        return $this->hasMany(OrderStatusHistory::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function notifications()
    {
        return $this->morphMany(Notification::class, 'related_entity');
    }
}
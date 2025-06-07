<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'amount_paid',
        'payment_method_used',
        'status',
        'gateway_transaction_id',
        'paymongo_payment_intent_id',
        'paymongo_payment_method_id',
        'payment_gateway_response',
        'gateway_fee_amount',
        'payment_processed_at',
        'refunded_at',
        'refund_details',
    ];

    protected $casts = [
        'amount_paid' => 'decimal:2',
        'gateway_fee_amount' => 'decimal:2',
        'payment_processed_at' => 'datetime',
        'refunded_at' => 'datetime',
        'payment_gateway_response' => 'array',
        'refund_details' => 'array',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
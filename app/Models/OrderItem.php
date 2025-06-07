<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'product_name_snapshot',
        'quantity_requested',
        'unit_price_snapshot',
        'customer_budget_requested',
        'vendor_assigned_quantity_description',
        'actual_item_price',
        'is_substituted',
        'substituted_with_product_id',
        'customerNotes_snapshot',
        'vendor_fulfillment_notes',
    ];

    protected $casts = [
        'unit_price_snapshot' => 'decimal:2',
        'customer_budget_requested' => 'decimal:2',
        'actual_item_price' => 'decimal:2',
        'is_substituted' => 'boolean',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function substitutedProduct()
    {
        return $this->belongsTo(Product::class, 'substituted_with_product_id');
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vendor extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'vendor_name',
        'shop_logo_url',
        'shop_banner_url',
        'stall_number',
        'market_section',
        'business_hours',
        'public_contact_number',
        'public_email',
        'description',
        'verification_status',
        'permit_documents_path',
        'accepts_cod',
        'average_rating',
        'is_active',
    ];

    protected $casts = [
        'accepts_cod' => 'boolean',
        'average_rating' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function ratings()
    {
        return $this->morphMany(Rating::class, 'rateable');
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'role',
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'password',
        'profile_image_url',
        'email_verified_at',
        'remember_token',
        'is_active',
        'last_login_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_login_at' => 'datetime',
        'is_active' => 'boolean',
        'password' => 'hashed',
    ];

    public function rider()
    {
        return $this->hasOne(Rider::class);
    }

    public function vendor()
    {
        return $this->hasOne(Vendor::class);
    }

    public function customerOrders()
    {
        return $this->hasMany(Order::class, 'customer_user_id');
    }

    public function riderOrders()
    {
        return $this->hasMany(Order::class, 'rider_user_id');
    }

    public function savedAddresses()
    {
        return $this->hasMany(SavedAddress::class);
    }

    public function shoppingCartItems()
    {
        return $this->hasMany(ShoppingCartItem::class);
    }

    public function riderPayouts()
    {
        return $this->hasMany(RiderPayout::class, 'rider_user_id');
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function reviewedRiderApplications()
    {
        return $this->hasMany(RiderApplication::class, 'reviewed_by_user_id');
    }

    public function reviewedVendorApplications()
    {
        return $this->hasMany(VendorApplication::class, 'reviewed_by_user_id');
    }

    public function orderStatusUpdates()
    {
        return $this->hasMany(OrderStatusHistory::class, 'updated_by_user_id');
    }
}

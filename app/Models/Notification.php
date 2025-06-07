<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'user_id',
        'type',
        'title',
        'message',
        'related_entity_type',
        'related_entity_id',
        'read_at',
    ];

    protected $casts = [
        'message' => 'array',
        'read_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function relatedEntity()
    {
        return $this->morphTo('related_entity');
    }
}
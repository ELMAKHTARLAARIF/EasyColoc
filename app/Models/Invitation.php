<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    protected $fillable = ['colocation_id', 'email', 'token', 'expires_at'];
    protected $casts = ['expires_at' => 'datetime'];

    public function colocation()
    {
        return $this->belongsTo(Colocation::class);
    }

    public function isExpired(): bool
    {
        return $this->expires_at->isPast();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    /** @use HasFactory<\Database\Factories\PaymentFactory> */
    use HasFactory;
    protected $fillable = ['amount', 'status', 'depense_id', 'payed_id'];
    public function depense()
    {
        return $this->belongsTo(Depense::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'payed_id');
    }
}

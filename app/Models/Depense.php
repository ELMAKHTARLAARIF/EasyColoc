<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Depense extends Model
{
    protected $fillable = [
        'name',
        'amount',
        'category_id',
        'payer_id',
        'colocation_id',
        'created_at',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function colocation()
    {
        return $this->belongsTo(Colocation::class);
    }
    public function payer()
    {
        return $this->belongsTo(User::class, 'payer_id');
    }
}

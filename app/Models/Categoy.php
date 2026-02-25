<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoy extends Model
{
    public function colocation()
    {
        return $this->belongsTo(Colocation::class);
    }
    public function depenses()
    {
        return $this->hasMany(Depense::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Depense extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function colocation()
    {
        return $this->belongsTo(Colocation::class);
    }
}

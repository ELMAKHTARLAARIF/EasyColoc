<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Colocation extends Model
{
    public function members()
    {
        return $this->hasMany(Coloc_member::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }
    public function depenses()
    {
        return $this->hasMany(Depense::class);
    }
}

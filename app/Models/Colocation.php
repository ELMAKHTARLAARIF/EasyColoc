<?php

namespace App\Models;
use App\Models\ColocMember;
use App\Models\Category;
use App\Models\Depense;

use Illuminate\Database\Eloquent\Model;

class Colocation extends Model
{
    protected $fillable = ['name', 'description', 'address', 'capacite'];
    public function members()
    {
        return $this->hasMany(ColocMember::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }
    public function depenses()
    {
        return $this->hasMany(Depense::class);
    }
    public function invitations()
    {
        return $this->hasMany(Invitation::class);
    }
    public function payments()
{
    return $this->hasManyThrough(
        Payment::class,
        Depense::class,
        'colocation_id', 
        'depense_id',   
        'id',            
        'id'            
    );
}
}

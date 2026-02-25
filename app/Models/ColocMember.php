<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ColocMember extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function colocation()
    {
        return $this->belongsTo(Colocation::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reader extends Model
{
    public function borrows()
     {
        return $this->hasMany(Borrow::class);
     }
}

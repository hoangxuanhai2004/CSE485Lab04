<?php

namespace App\Models;

use App\Models\Borrow;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    
    protected $fillable = ['name','author','category','public_year','quantity'];
    public function borrows(){
        return $this->hasMany(Borrow::class);
    }
}



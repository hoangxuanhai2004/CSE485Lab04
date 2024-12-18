<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    public function book()
    {
    return $this->belongsTo(Book::class);
    }
   public function reader()
   {
    return $this->belongsTo(Reader::class);
   }
   
}

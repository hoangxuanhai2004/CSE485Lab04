<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Book;

class Borrow extends Model
{
    protected $fillable = ['return_date', 'status', 'borrow_date', 'reader_id', 'book_id'];
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function reader()
    {
        return $this->belongsTo(Reader::class);
    }
}
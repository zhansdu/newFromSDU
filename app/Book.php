<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'lib_books';
    protected $primaryKey = 'book_id';
    public $incrementing = 'book_id';
    public $timestamps = false;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = ['book_isbn', 'book_title', 'book_author', 'book_publisher', 'book_publication_year', 'book_category', 'book_code', 'book_shelf_location', 'book_stock', 'book_stock_borrowing', 'book_status', 'book_cover', 'book_updated_at', 'book_created_at'] ;
    protected $table = 'book';
    public $timestamps = false;
}

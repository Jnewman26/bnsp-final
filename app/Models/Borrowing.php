<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrowing extends Model
{
    use HasFactory;
    protected $fillable = [
        'borrowing_id',
        'member_id',
        'book_isbn',
        'member_name',
        'book_title',
        'book_code',
        'book_shelf_location',
        'book_cover',
        'borrowing_qty',
        'borrowing_start_date',
        'borrowing_end_date',
        'borrowing_overdue',
        'borrowing_status',
        'borrowing_updated_at',
        'borrowing_created_at'
    ];
    protected $table = 'borrowing';
    public $timestamps = false;
}

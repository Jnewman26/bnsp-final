<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $fillable = ['member_id', 'member_name', 'member_email', 'member_status', 'member_password', 'member_updated_at', 'member_created_at'];
    protected $table = 'member';
    public $timestamps = false;
}
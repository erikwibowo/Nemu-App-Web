<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = ['user_id', 'admin_id', 'post_id', 'comment', 'deleted', 'status'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = ['user_id', 'post', 'lat', 'lng', 'type', 'status'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

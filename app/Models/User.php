<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = ['nik', 'name', 'email', 'password', 'phone', 'address', 'status', 'verified'];
}

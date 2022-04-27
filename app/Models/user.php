<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    public $timestamps = false;
    protected $fillable = [
        //if id is not autoincrement then add 'id'
        'id',
        'username',
        'address',
        'email',
        'gender',
        'phone',
        'role',
        'dob',
        'password'
    ];


    use HasFactory;
}

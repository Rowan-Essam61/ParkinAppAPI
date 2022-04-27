<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class parkingsecurity extends Model
{
    public $timestamps = false;
    protected $fillable = [
        //if id is not autoincrement then add 'id'
        'parking_id',
        'security_id',
        'name',
        'email',
        'gender',
        'address',
        'dob',
        'work_hours',
        'phone',
        'status',
    ];
    use HasFactory;
}

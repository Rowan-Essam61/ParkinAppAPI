<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class registration extends Model
{

    public $timestamps = false;
    protected $fillable = [
        
        'user_id', 
        'car_id',
        'date',
        'status',
        'slot_name', 
        'leave_time',
        'checkin_time',
        'parking_id',
        'day'
    ]; 

    use HasFactory;
}

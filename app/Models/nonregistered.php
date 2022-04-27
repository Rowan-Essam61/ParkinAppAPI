<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nonregistered extends Model
{
    public $timestamps = false;
    protected $fillable = [
        //if id is not autoincrement then add 'id'
        'carnumber', 
        'username',
        'date', 
        'securityman_id', 
        'slot_id',
        'leave_time',
        'id',
        'nid'
    ]; 

    use HasFactory;
}

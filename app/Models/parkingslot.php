<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class parkingslot extends Model
{
    public $timestamps = false;
    protected $fillable = [
        
        'name', 
        'level',
        'parking_id', 
        'status'
    ]; 


    use HasFactory;

}

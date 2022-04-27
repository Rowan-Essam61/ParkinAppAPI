<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class car extends Model
{
    public $timestamps = false;
    protected $fillable = [
        //if id is not autoincrement then add 'id'
        'id', 
        'category',
        'type', 
        'color', 
        'user_id'
    ]; 


    use HasFactory;
}

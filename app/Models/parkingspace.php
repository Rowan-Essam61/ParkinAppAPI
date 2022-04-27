<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class parkingspace extends Model
{
    public $timestamps = false;
    protected $fillable = [
        //if id is not autoincrement then add 'id'
        'id', 
        'location',
        'description', 
        'capacity', 
        'name',
        'admin_id',
        'fees',
        'category',
        'levels',
        'img'
    ]; 

    use HasFactory;
}

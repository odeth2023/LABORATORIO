<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'room';
    protected $primaryKey ='idRoom';
    protected $fillable = ['roomNumber','NumberSeats','state'];
    use HasFactory;

    
}

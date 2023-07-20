<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    protected $table = 'seat';
    protected $primaryKey ='idSeat';
    protected $fillable = ['seatNumber','idRoom'];
    use HasFactory;

    
}

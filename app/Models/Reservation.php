<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = 'reservation';
    protected $primaryKey ='idReservation';
    protected $fillable = ['idfunction','idCustomer','idSeat','NVoucher','state','ReservationDate','total'];
    use HasFactory;

    
}

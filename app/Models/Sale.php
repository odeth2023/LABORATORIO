<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = 'sale';
    protected $primaryKey ='idSale';
    protected $fillable = ['total','DateSale','HourSale','idUser'];
    use HasFactory;

    
}

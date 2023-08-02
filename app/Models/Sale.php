<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productconfectionery extends Model
{
    protected $table = 'sale';
    protected $primaryKey ='idSale ';
    protected $fillable = ['total','DateSale','idCustomer','idMovie'];
    use HasFactory;

    
}

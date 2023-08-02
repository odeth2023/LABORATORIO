<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productconfectionery extends Model
{
    protected $table = 'SaleDetail';
    protected $primaryKey ='idSaleDetail';
    protected $fillable = ['idSale','idConfectionery','quantity'];
    use HasFactory;

    
}

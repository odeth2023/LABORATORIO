<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleDetailProduct extends Model
{
    protected $table = 'SaleDetailProduct';
    protected $primaryKey ='idSaleDetailProduct';
    protected $fillable = ['quantity','idSale','idUser','idConfectionery'];
    use HasFactory;

    
}

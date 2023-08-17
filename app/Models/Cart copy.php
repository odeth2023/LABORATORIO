<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'cart';
    protected $primaryKey ='idCart';
    protected $fillable = ['quantity_product','idUser','idConfectionery'];
    use HasFactory;

    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productconfectionery extends Model
{
    protected $table = 'productconfectionery';
    protected $primaryKey ='idConfectionery';
    protected $fillable = ['name','description','img','price','quantity','state','idCategoryChild'];
    use HasFactory;

    
}

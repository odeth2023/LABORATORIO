<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';
    protected $primaryKey ='idCustomer';
    protected $fillable = ['dni','name','lastname','sort','phone','address','email','idUser'];
    use HasFactory;

    
}

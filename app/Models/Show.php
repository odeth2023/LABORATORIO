<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movieshow extends Model
{
    protected $table = 'show';
    protected $primaryKey ='idfunction';
    protected $fillable = ['schedule','hour','idMovie','idRoom','idseatdetail','price_show'];
    use HasFactory;

    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movieshow extends Model
{
    protected $table = 'movieshow';
    protected $primaryKey ='idfunction';
    protected $fillable = ['schedule','idMovie','idRoom'];
    use HasFactory;

    
}

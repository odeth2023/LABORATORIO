<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $table = 'movie';
    protected $primaryKey ='idMovie';
    protected $fillable = ['name','img','description','price','state','billboard'];
    use HasFactory;

    
}

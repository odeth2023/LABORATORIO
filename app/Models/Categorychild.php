<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorychild extends Model
{
    protected $table = 'categorychild';
    protected $primaryKey ='idCategoryChild';
    protected $fillable = ['name','idCategoryParent'];
    use HasFactory;

    
}

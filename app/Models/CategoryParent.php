<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryParent extends Model
{
    protected $table = 'categoryparent';
    protected $primaryKey ='idCategoryParent';
    protected $fillable = ['name'];
    use HasFactory;

    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Productconfectionery extends Model
{
    protected $table = 'productconfectionery';
    protected $primaryKey ='idConfectionery';
    protected $fillable = ['name','description','img','price','quantity','state','idCategoryChild'];
    use HasFactory;

    public function cart()
    {
        return $this->belongsToMany(User::class,'cart','idConfectionery','idUser')
                    ->withPivot(['idCart','quantity_product'])->withTimestamps();
    }
}

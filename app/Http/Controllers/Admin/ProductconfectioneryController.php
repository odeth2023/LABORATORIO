<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//Llamamos a el modelo movie el cual importara el modelo de la tabla
use App\Models\Movie;
use App\Models\Productconfectionery;

use Illuminate\Support\Facades\Storage;

class ProductconfectioneryController extends Controller
{
    public function index()
    {
        
        return view('auth.admin.productconfectionerymanagement.productconfectionery');
    }
}

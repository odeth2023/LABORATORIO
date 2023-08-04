<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryParent;


class CategoryparentController extends Controller
{
    public function index()
    {
        $c = CategoryParent::all();
        return view('auth.admin.Categoryparent.principal')->with('c',$c);
    }
}

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


    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|max:255'

        ]);

        $newc= new CategoryParent();
        $newc->name=$request->name;
        $newc->save();

        return redirect()->route('admin.categoriaPadre.principal')->with('crear','ok');

    }

    public function update(Request $request, CategoryParent $item)
    {
        
        $request->validate([
            'name'=>'required|max:255'
            
        ]);

        $item->name=$request->name;
        $item->save();

        return redirect()->route('admin.categoriaPadre.principal')->with('editar','ok');

        
    }

    public function delete(Request $request, $item)
    {
        //dd($movieid);
        
        $item=CategoryParent::find($item);
        $item->delete();
        
        
        //return redirect()->back()->with('eliminar','oki');
        return redirect()->route('admin.categoriaPadre.principal')->with('eliminar','oki');
    }
}

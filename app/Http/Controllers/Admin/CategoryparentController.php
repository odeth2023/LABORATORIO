<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryParent;


class CategoryparentController extends Controller
{
    public function index()
    {
        return view('auth.admin.Categoryparent.principal');
    }

    public function lista()
    {
        $c = CategoryParent::all();
        return view('auth.admin.Categoryparent.lista')->with('c',$c);
    }


    public function store(Request $request)
    {

        if($request->ajax()){
            $request->validate([
                'name'=>'required|max:255'
    
            ]);    

            $newc= new CategoryParent();
            $newc->name=$request->name;
            $newc->save();

            //return redirect()->route('admin.categoriaPadre.principal')->with('crear','ok');
            return response($newc);
        }
    }

    public function update(Request $request, CategoryParent $item)
    {
        if($request->ajax()){
            $request->validate([
                'name'=>'required|max:255'
                
            ]);

            $item->name=$request->name;
            $item->save();

            //return response()->route('admin.categoriaPadre.principal')->with('editar','ok');
            return response($item);
        }

        
    }

    public function delete(Request $request, $item)
    {
        //dd($movieid);
        if($request->ajax()){
            $item=CategoryParent::find($item);
            $item->delete();
            
        }
        
        //return redirect()->back()->with('eliminar','oki');
        //return redirect()->route('admin.categoriaPadre.principal')->with('eliminar','oki');
    }
}

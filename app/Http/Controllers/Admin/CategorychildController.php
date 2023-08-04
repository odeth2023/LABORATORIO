<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categorychild;
use App\Models\CategoryParent;

class CategorychildController extends Controller
{
    public function index()
    {
        

        $c2 = Categorychild::join('categoryparent', 'categoryparent.idCategoryParent', '=', 'categorychild.idCategoryParent')
        ->select('categorychild.*', 'categorychild.idCategoryChild as id','categorychild.name as ccName',
                'categoryparent.name as cpName','categorychild.idCategoryParent as idCP')         
        ->get();    

        $cp = CategoryParent::all();
        return view('auth.admin.Categorychild.principal')->with('c2',$c2)->with('cp',$cp);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|max:255',
            'CategoryParent'=>'required'   
        ]);

        $newc= new Categorychild();
        $newc->name=$request->name;
        $newc->idCategoryParent =$request->CategoryParent;
        $newc->save();

        return redirect()->route('admin.categorychild.principal')->with('crear','ok');

    }

    public function update(Request $request, Categorychild $item)
    {
        
        $request->validate([
            'name'=>'required|max:255',
            'CategoryParent'=>'required'
            
        ]);

        $item->name=$request->name;
        $item->idCategoryParent=$request->CategoryParent;
        $item->save();

        return redirect()->route('admin.categorychild.principal')->with('editar','ok');

        
    }

    public function delete(Request $request, $item)
    {
        //dd($movieid);
        $item=Categorychild::find($item);
        $item->delete();
        
        
        //return redirect()->back()->with('eliminar','oki');
        return redirect()->route('admin.categorychild.principal')->with('eliminar','oki');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//Llamamos a el modelo movie el cual importara el modelo de la tabla
use App\Models\Productconfectionery;
use App\Models\Categorychild;

use Illuminate\Support\Facades\Storage;

class ProductconfectioneryController extends Controller
{
    public function index()
    {
        $product = Productconfectionery::all();
        return view('auth.admin.productconfectioneryM.productconfectionery')->with('product', $product);
    }

    public function register()
    {   
        $categorychild = Categorychild::all();
        return view('auth.admin.productconfectioneryM.register')->with('categorychild', $categorychild);
    
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|max:255',
            'description'=>'required|max:255',
            'img'=>'required|image|mimes:jpg,jpeg,png|max:20000',
            'price'=>'required|numeric',
            'quantity'=>'required|numeric',
            'idCategoryChild'=>'required'

        ]);


        //un onjeto del modelo movie
        $newProducto= new Productconfectionery();

        //hasfile=para preguntar si viene con ese archivo (el nombre que indico 'img')
        //te dice sabes que tu formulario si viene con este archivo
        //en caso de que no lo subamos (la img) te dira falso
        //dd($request->hasFile('img'));

        $newProducto->name=$request->name;
        $newProducto->description=$request->description;

        //Proceso de subida de img
        if($request->hasFile('img')){
            $file=$request->file('img');
            $carpetaDestino='assets/images/pictures/';
            //time: nos trae un string, que en realidad es una marca de tiempo
            //con esto se evita que aparesca el nombre repetido, al tiempo le concatemos un string, el guion
            //y el nombre de la img original
            $filename=time().'-'.$file->getClientOriginalName();
            //moviendo img hacia la carpeta
            $uploadSuccess=$request->file('img')->move($carpetaDestino,$filename);
            //Guardando los datos de la nueba img carpeta de destino + el nombre en la bd
            $newProducto->img=$carpetaDestino.$filename;
        }

        $newProducto->price=$request->price;
        $newProducto->quantity=$request->quantity;
        $newProducto->state=0;
        $newProducto->idCategoryChild=$request->idCategoryChild;

        //Nota: recordar que los datos(variables) se encuentran en el orden de los mismos en la tabla de la bd
        $newProducto->save();

        //$this->emit("alert");

        //return view('auth.admin.MovieManagement.movie')->with('crear','ok');

        return redirect()->route('admin.confiteria')->with('crear','ok');

    }

    public function edit(Productconfectionery $item)
    {
        dd($item);
        /*$categorychild = Categorychild::all();

        $productconfectionery2 = Productconfectionery::join('categorychild', 'categorychild.idCategorychild', '=', 'productconfectionery.idCategorychild')
        ->select('productconfectionery.*', 'productconfectionery.name as pName','productconfectionery.description as pdescripcion','productconfectionery.idCategoryChild as idTipoCategoria',
                 'categorychild.name as NombreTipoCategoria', 'productconfectionery.price as precio','productconfectionery.quantity as pquantity',
                 'productconfectionery.img as img')  
        ->where('productconfectionery.idConfectionery', '=', $productconfectionery->idConfectionery)          
        ->get();*/
        

       //return view('auth.admin.productconfectioneryM.show_edit',compact('productconfectionery'))->with('productconfectionery2', $productconfectionery2)->with('categorychild', $categorychild);
       return view('auth.admin.productconfectioneryM.show_edit',compact('p'));
    
    }

    public function delete(Request $request, $productoid)
    {
        //dd($movieid);
        
        $productoid=Productconfectionery::find($productoid);
        if($productoid->img != '')
            {   //Sirve para eliminar la img antigua y sobreescribir por la nueva
                unlink($productoid->img);
            }
        $productoid->delete();
        
        
        return redirect()->back()->with('eliminar','oki');
    }
}

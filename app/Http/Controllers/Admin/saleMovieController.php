<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class saleMovieController extends Controller
{
    
    public function store(Request $request)
    {  
        
        
        
        //dd($fecha);
        ///valida que sea un peticion ajax
        if($request->ajax()){
            $array = $request->valores; //valores es el array que envió con el ajax
            $array = json_decode($array);
            $max=sizeof($array);  //Me devuelve el tamaño del array

            $butacas = $array[0]->butacas_venta; // la fecha de mi posición 0 en el array
            
            //dd($butacas);
            return response($butacas);
        }
        
        ///valida que sea un peticion ajax
        /*if($request->ajax()){
        $datos->valores;
        }   */

        //dd($request);
        //dd($request->json2);
        //dd($request->json2['butacas']);

        
        


        //$newMovie= new Movie();

        
        //$newMovie->idCategoryChild=$request->idCategoryChild;

        //$newMovie->save();

        //return redirect()->route('admin.venta')->with('crear','ok');

    }


}

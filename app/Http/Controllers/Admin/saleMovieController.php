<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Seat;

class saleMovieController extends Controller
{
     /*BOLETERIA*/
     public function ventaPelicula()
     {
         $movie = Movie::all();
         $seat = Seat::all();
         return view('auth.admin.salesmanagement.saleMovie')->with('movie', $movie)->with('seat', $seat);
     }



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
        


        


    }


}

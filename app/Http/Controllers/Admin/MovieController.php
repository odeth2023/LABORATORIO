<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//Llamamos a el modelo movie el cual importara el modelo de la tabla
use App\Models\Movie;

class MovieController extends Controller
{
    
    public function index()
    {
        //colocamos una variable para el modelo y luego el nombre como lo llamaremos para listar
        $movie = Movie::all();
        return view('auth.admin.MovieManagement.movie')->with('movie', $movie);
    }


    public function register()
    {
        return view('auth.admin.MovieManagement.register');
    }


    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'price'=>'required|numeric'

        ]);


        //un onjeto del modelo movie
        $newMovie= new Movie();

        //hasfile=para preguntar si viene con ese archivo (el nombre que indico 'img')
        //te dice sabes que tu formulario si viene con este archivo
        //en caso de que no lo subamos (la img) te dira falso
        //dd($request->hasFile('img'));

        $newMovie->name=$request->name;

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
            $newMovie->img=$carpetaDestino.$filename;
        }

        $newMovie->description=$request->description;
        $newMovie->price=$request->price;
        $newMovie->state=0;
        $newMovie->billboard=0;

        //Nota: recordar que los datos(variables) se encuentran en el orden de los mismos en la tabla de la bd
        $newMovie->save();

        return redirect()->back();

    }

   
    //MOSTRAR DATOS DE PELICULA POR ID
    public function show($id)
    {
        //
    }

   
    public function edit(Movie $movie)
    {
        //$movie = Movie::find($id);
        //return $movie;

        //Los datos enviados se almacenaran en una variable llamada movie
        return view('auth.admin.MovieManagement.show_edit',compact('movie'));
    }

  
    public function update(Request $request, Movie $movie)
    {
        
        $request->validate([
            'price'=>'required|numeric'
            

        ]);

        //hasfile=para preguntar si viene con ese archivo (el nombre que indico 'img')
        //te dice sabes que tu formulario si viene con este archivo
        //en caso de que no lo subamos (la img) te dira falso
        //dd($request->hasFile('img'));

        $movie->name=$request->name;

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
            $movie->img=$carpetaDestino.$filename;
        }

        $movie->description=$request->description;
        $movie->price=$request->price;
        $movie->state=0;
        $movie->billboard=0;

        //Nota: recordar que los datos(variables) se encuentran en el orden de los mismos en la tabla de la bd
        $movie->save();

        return redirect()->route("admin.MovieManagement.movie");
        //return $movie;
    }

  
    public function delete(Request $request, $movieid)
    {
        //dd($movieid);
        $movieid=Movie::find($movieid);
        $movieid->delete();
        
        
        return redirect()->back();
    }
}

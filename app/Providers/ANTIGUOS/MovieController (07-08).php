<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//Llamamos a el modelo movie el cual importara el modelo de la tabla
use App\Models\Movie;
use App\Models\Categorychild;

use Illuminate\Support\Facades\Storage;


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
        $categorychild = Categorychild::all();
        return view('auth.admin.MovieManagement.register')->with('categorychild', $categorychild);
       
    
    }


    public function create()
    {
        //
    }
    

   
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|max:255',
            'img'=>'required|image|mimes:jpg,jpeg,png|max:20000',
            'description'=>'required|max:255',
            'duracion'=>'required|max:8',
            'price'=>'required|numeric',
            'idCategoryChild'=>'required'

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
        $newMovie->duracion=$request->duracion;
        $newMovie->price=$request->price;
        $newMovie->state=0;
        $newMovie->billboard=0;
        $newMovie->idCategoryChild=$request->idCategoryChild;

        //Nota: recordar que los datos(variables) se encuentran en el orden de los mismos en la tabla de la bd
        $newMovie->save();

        //$this->emit("alert");

        //return view('auth.admin.MovieManagement.movie')->with('crear','ok');

        return redirect()->route('admin.MovieManagement.movie')->with('crear','ok');

    }

   
    //MOSTRAR DATOS DE PELICULA POR ID
    public function show($id)
    {
        //
    }

   
    public function edit(Movie $movie)
    {
        //dd($movie);
        $categorychild = Categorychild::all();

        $movie2 = Movie::join('categorychild', 'categorychild.idCategorychild', '=', 'movie.idCategorychild')
        ->select('movie.*', 'movie.name as movieName','movie.description as descripcion','movie.idCategoryChild as idTipoCategoria',
                 'categorychild.name as NombreTipoCategoria', 'movie.price as precio','movie.duracion as duracion',
                 'movie.img as img')  
        ->where('movie.idMovie', '=', $movie->idMovie)          
        ->get();

        //dd($movie);

       return view('auth.admin.MovieManagement.show_edit',compact('movie'))->with('movie2', $movie2)->with('categorychild', $categorychild);
    }

  
    public function update(Request $request, Movie $movie)
    {
        
        $request->validate([
            'name'=>'required|max:255',
            'img'=>'image|mimes:jpg,jpeg,png|max:20000',
            'description'=>'required|max:255',
            'duracion'=>'required|max:8',
            'price'=>'required|numeric',
            'idCategoryChild'=>'required'
            

        ]);

        //hasfile=para preguntar si viene con ese archivo (el nombre que indico 'img')
        //te dice sabes que tu formulario si viene con este archivo
        //en caso de que no lo subamos (la img) te dira falso
        //dd($request->hasFile('img'));

        
        

        $movie->name=$request->name;

        //Proceso de subida de img
        //Preguntamos si tiene fotografia en la carga
        if($request->hasFile('img')){
            $file=$request->file('img');
            $carpetaDestino='assets/images/pictures/';
            //time: nos trae un string, que en realidad es una marca de tiempo
            //con esto se evita que aparesca el nombre repetido, al tiempo le concatemos un string, el guion
            //y el nombre de la img original
            $filename=time().'-'.$file->getClientOriginalName();
            //moviendo img hacia la carpeta
            $uploadSuccess=$request->file('img')->move($carpetaDestino,$filename);

            if($movie->img != '')
            {   //dd($ruta);
                
                //Sirve para eliminar la img antigua y sobreescribir por la nueva
                unlink($movie->img);
            }

            //Guardando los datos de la nueva img en la carpeta de destino + el nombre en la bd
            $movie->img=$carpetaDestino.$filename;
        }

        $movie->description=$request->description;
        $movie->duracion=$request->duracion;
        $movie->price=$request->price;
        $movie->state=0;
        $movie->billboard=0;
        $movie->idCategoryChild=$request->idCategoryChild;
        
        //Nota: recordar que los datos(variables) se encuentran en el orden de los mismos en la tabla de la bd
        $movie->save();

        //return redirect()->route("admin.MovieManagement.movie");
        return redirect()->route('admin.MovieManagement.movie')->with('editar','ok');

        //return $movie;
    }

  
    public function delete(Request $request, $movieid)
    {
        //dd($movieid);
        
        $movieid=Movie::find($movieid);
        if($movieid->img != '')
            {   //Sirve para eliminar la img antigua y sobreescribir por la nueva
                unlink($movieid->img);
            }
        $movieid->delete();
        
        
        return redirect()->back()->with('eliminar','oki');
    }
}

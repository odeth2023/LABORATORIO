<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Seat;
use App\Models\SaleDetail;
use App\Models\Productconfectionery;
use App\Models\Movie;
use App\Models\CategoryParent;
use DB;


class SaleController extends Controller
{
    public function index()
    {
        
        return view('auth.admin.salesmanagement.sales');
    }


    

    private function obtenerProductos()
    {
        $productos = session("productos");
        if (!$productos) {
            $productos = [];
        }
        return $productos;
    }


    public function ventaConfiteria()
    {
        /*if ($request->session()->has('productos'))=null {
            $i = session('productos');
            $producto = Productconfectionery::all();
            return view('auth.admin.salesmanagement.saleProduct', array(
            "carrito" => $i,
        ))->with('producto', $producto);
        }*/
        
        //dd($i);


        //$carrito = $this->session->carrito;
        //dd($carrito);
        $productos = $this->obtenerProductos();
        $producto = Productconfectionery::all();
        
        
        //colocamos una variable para el modelo y luego el nombre como lo llamaremos para listar
        //$producto = Movie::all();
        //$array=($producto->comments()->get()->toArray());
        
        
       /* return view('auth.admin.salesmanagement.saleProduct', array(
            "carrito" => $productos,
        ))->with('producto',$producto->toArray());*/

        return view('auth.admin.salesmanagement.saleProduct', array(
            "carrito" => $productos,
        ))->with('producto',$producto);
    }

    /**/ 
    


    private function guardarProductos($productos)
    {
        session(["productos" => $productos,
        ]);
    }


    private function agregarProductoACarrito($producto)
    {   
        $productos = $this->obtenerProductos();
        //dd($productos);

        //dd( $producto->idConfectionery);
        //dd($productos);
              
                $producto->quantity = 1;
                array_push($productos, $producto);   
                $this->guardarProductos($productos);     
           
        
    }


    public function quitarProductoVenta($indice){
        //dd($indice);
        //$carrito = $this->session->carrito;
        //$i = session('productos');
        $productos = $this->obtenerProductos();
        array_splice($productos, $indice, 1);
        //guardarProductos($productos);
        //et_userdata("carrito", $productos);
        $this->guardarProductos($productos);
        return redirect()->back();
    }


    /*public function agregarProductoVenta(Request $request, Productconfectionery $p)
    {
        //$p_add = $request->post($p);
        $producto = Producto::where("idConfectionery", "=", $p->idConfectionery)->first();
        if (!$producto) {
            return redirect()
                ->route("auth.admin.salesmanagement.saleProduct")
                ->with("mensaje", "Producto no encontrado");
        }
        $this->agregarProductoACarrito($producto);
        return redirect()
            ->route("auth.admin.salesmanagement.saleProduct");
    }*/

    //public function edit(Movie $movie)
    public function agregarProductoVenta(Productconfectionery $p)
    {
    
        $producto = Productconfectionery::where("idConfectionery", "=", $p->idConfectionery)->first();
        $this->agregarProductoACarrito($producto);
        return redirect()->route("admin.ventaConfiteria");
        
    }


    /*BOLETERIA*/
    public function ventaPelicula()
    {
        $movie = Movie::all();
        $seat = Seat::all();
        return view('auth.admin.salesmanagement.saleMovie')->with('movie', $movie)->with('seat', $seat);
    }

    public function store(Request $request)
    {  // este metodo obtiene el json y se lo asigna a la variable $datos
        $datos = $request->json();
        // o tambien puedes hacer:
        $datos = $request->json()->all();
    
        
        //$fecha = $array[0]->fecha; // la fecha de mi posición 0 en el array
        dd($datos);
        ///valida que sea un peticion ajax
        if($request->ajax()){
        $datosz->valores;
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

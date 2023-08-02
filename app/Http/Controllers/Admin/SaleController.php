<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\SaleDetail;
use App\Models\Productconfectionery;
use App\Models\Movie;


class SaleController extends Controller
{
    public function index()
    {
        
        return view('auth.admin.salesmanagement.sales');
    }


    public function ventaPelicula()
    {
        
        return view('auth.admin.salesmanagement.saleMovie');
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
        
        
        return view('auth.admin.salesmanagement.saleProduct', array(
            "carrito" => $productos,
        ))->with('producto',$producto->toArray());

        
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
        
        $producto->quantity = 1;
        array_push($productos, $producto);
        

        $this->guardarProductos($productos);

        //dd($productos);
        
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

}

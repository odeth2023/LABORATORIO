<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Seat;
use App\Models\SaleDetail;
use App\Models\Productconfectionery;
use App\Models\Movie;
use App\Models\{CategoryParent, User};
use DB;
use Auth;

class SaleController extends Controller
{
    public function index()
    {
        
        return view('auth.admin.salesmanagement.sales');
    }

    public function ventaConfiteria()
    {
       $user=Auth::user();

       $cart=$user->cart;
       $CartProductsIds = array();

       if($cart->isNotEmpty())
       {
        foreach($cart as $product)
        {
            array_push($CartProductsIds,$product->idConfectionery);
        }
       }

       $products=Productconfectionery::whereNotIn('idConfectionery',$CartProductsIds)->get();

       return view('auth.admin.salesmanagement.saleProduct',[
            'products' => $products,
            'cart' => $cart
       ]);


    }


    public function agregarProductoVenta(Productconfectionery $p)
    {   
        $user=Auth::user();

        $user->cart()->attach($p,[
            'quantity_product' => 1
        ]);

        return redirect()->route('admin.ventaConfiteria');
    }


    public function quitarProductoVenta(Productconfectionery $p){
        
        $user=Auth::user();

        $user->cart()->detach($p);
        return redirect()->back();
    }


    public function updateQuantity(Request $request, Productconfectionery $p)
    {
        $user = Auth::user();

        $quantity = $request['quantity'];

        $user->cart()->updateExistingPivot($p, [
            'quantity_product' => $quantity
        ]);

        $total = $p->price * $quantity;

        return response()->json([
            "success" => "quantity updated",
            "total" => $total
        ]);
    }


     /*BOLETERIA*/
     public function ventaPelicula()
     {
         $movie = Movie::all();
         $seat = Seat::all();
         return view('auth.admin.salesmanagement.saleMovie')->with('movie', $movie)->with('seat', $seat);
     }
}
   
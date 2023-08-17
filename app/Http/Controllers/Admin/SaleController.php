<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Seat;
use App\Models\SaleDetailProduct;
use App\Models\Productconfectionery;
use App\Models\Movie;
use App\Models\{CategoryParent, User};
use DB;
use Auth;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade as PDF;

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



    public function agregarProductoBuscado(Request $request)
    {   
           $id= $request->id; 
            $id = json_decode($id);
            $p=Productconfectionery::find($id);

            $user=Auth::user();
            $user->cart()->attach($p,[
                'quantity_product' => 1
            ]);

            return response();
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

        $t=0;
        
        /*
        foreach($cart as $product)
         {
            $total2 = $p->price * $quantity;
            $t=$t+$total2;
         }*/
        
         
        return response()->json([
            "success" => "quantity updated",
            "total" => $total
        ]);
    }

    public function cancelarVenta(){
        
        $user=Auth::user();

        $user->cart()->detach();
        return redirect()->route('admin.ventaConfiteria');
    }
     

    public function finalizarVenta(Request $request)
    {   
        $user=Auth::user();


        $DateSale = Carbon::now()->toDateString();
        $HourSale = Carbon::now()->toTimeString();

        $cart=$user->cart;

        if($cart->isNotEmpty())
        {
            // Crear una venta
            $venta = new Sale();
            $venta->total=$request->total;
            $venta->DateSale=$DateSale;
            $venta->HourSale=$HourSale;
            $venta->idUser=$user->id;

            $venta->save();
            $idVenta = $venta->idSale;
            
            foreach($cart as $product)
            {
                $producto = new SaleDetailProduct();
                $producto->quantity=$product->pivot->quantity_product;
                $producto->idSale=$idVenta;
                $producto->idUser=$user->id;
                $producto->idConfectionery=$product->idConfectionery;
                $producto->save();
                
            }
            
            $this->cancelarVenta(); 

            $reportes = Sale::where('idSale', '=',$idVenta)->get();

            $reportes2 = SaleDetailProduct::join('productconfectionery','productconfectionery.idConfectionery' ,'=','saledetailproduct.idConfectionery')
            ->select('SaleDetailProduct.*',
            'saledetailproduct.quantity as quantity',
            'productconfectionery.name as name',
            'productconfectionery.price as price')
            ->where('saledetailproduct.idSale', '=', $idVenta)
            ->get();

            
            $pdf = \PDF::loadView('auth.admin.salesmanagement.TicketVentaP', [
                'reportes' => $reportes,
                'reportes2' => $reportes2
            ]);
            
            $pdf_name = 'TicketVentaP.pdf';
            return $pdf->download($pdf_name);
            //return $pdf->stream($pdf_name);
        
        }


    }

    

}
   
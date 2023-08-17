<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Reservation;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\Movie;
use App\Models\Categorychild;
use App\Models\Productconfectionery;

class HomeController extends Controller
{
    public function index()
    {
        return view('user.home');
    }

    public function peliculas()
    {
        $movie= Movie::join('categorychild', 'categorychild.idCategorychild', '=', 'movie.idCategorychild')
        ->select('movie.*', 'movie.name as movieName','movie.description as descripcion','movie.idCategoryChild as idTipoCategoria',
                 'categorychild.name as NombreTipoCategoria','movie.duracion as duracion',
                 'movie.img as img')     
        ->get();

        $c= Categorychild::where('idCategoryParent', '=',1)->get();
        
        return view('user.pelicula')->with('movie', $movie)->with('c',$c);
    }

    public function estrenos()
    {
        $c= Categorychild::where('idCategoryParent', '=',1)->get();
        return view('user.estrenos')->with('c',$c);
    }

    public function confiteria()
    {
        $c= Categorychild::where('idCategoryParent', '=',2)->get();
        return view('user.confiteria')->with('c',$c);
    }

    public function confiteriaD($id)
    {
        $c= Categorychild::where('idCategoryParent', '=',2)->get();
        $producto=Productconfectionery::where('idCategoryChild', '=',$id)->get();
        return view('user.confiteriaD')->with('producto',$producto)->with('c',$c);
    }

    public function compras()
    {
        //colocamos una variable para el modelo y luego el nombre como lo llamaremos para listar
        //$reporte = User::all();
        //return view('user.compras')->with('reporte', $reporte);
        
        $reportes = Reservation::join('customer', 'customer.idCustomer', '=', 'reservation.idReservation')
        ->join('movieshow', 'movieshow.idfunction', '=', 'reservation.idfunction')
        ->join('movie', 'movie.idMovie', '=', 'movieshow.idMovie')
        ->join('room', 'room.idRoom', '=', 'movieshow.idRoom')
        ->join('seat', 'seat.idSeat', '=', 'reservation.idSeat')
        ->select('reservation.*', 'customer.name', 'customer.lastname','movie.name as movieName','room.roomNumber','seat.seatNumber','movieshow.schedule','reservation.NVoucher')            
        ->get();

        return view('user.compras', [
            'reportes' => $reportes
        ]);

    }
    
    public function reporte()
    {
        $reportes = Reservation::join('customer', 'customer.idCustomer', '=', 'reservation.idReservation')
        ->join('movieshow', 'movieshow.idfunction', '=', 'reservation.idfunction')
        ->join('movie', 'movie.idMovie', '=', 'movieshow.idMovie')
        ->join('room', 'room.idRoom', '=', 'movieshow.idRoom')
        ->join('seat', 'seat.idSeat', '=', 'reservation.idSeat')
        ->select('reservation.*', 'customer.name', 'customer.lastname','movie.name as movieName','room.roomNumber','seat.seatNumber','movieshow.schedule','reservation.NVoucher')            
        ->get();
        
        //dd($item);
        $pdf = \PDF::loadView('user.reporte', [
            'reportes' => $reportes
        ]);
        $pdf_name = 'reporte.pdf';
        return $pdf->stream($pdf_name);
        //return $pdf->download($pdf_name);
        //return view('user.compras');
    }
}

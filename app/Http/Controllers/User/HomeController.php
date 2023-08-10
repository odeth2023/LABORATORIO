<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Reservation;
use Barryvdh\DomPDF\Facade as PDF;

class HomeController extends Controller
{
    public function index()
    {
        return view('user.candy');
    }

    public function peliculas()
    {
        return view('user.pelicula');
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

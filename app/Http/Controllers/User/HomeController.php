<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;

class HomeController extends Controller
{
    public function index()
    {
        return view('user.candy');
    }

    public function compras()
    {
        //colocamos una variable para el modelo y luego el nombre como lo llamaremos para listar
        $reporte = User::all();
        return view('user.compras')->with('reporte', $reporte);
        
    }
    
    public function reporte(User $item)
    {
        //dd($item);
        $pdf = \PDF::loadView('user.reporte', compact('item'));
        $pdf_name = 'reporte.pdf';
        return $pdf->stream($pdf_name);
        //return $pdf->download($pdf_name);
        //return view('user.compras');
    }
}

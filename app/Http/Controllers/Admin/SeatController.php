<?php

namespace App\Http\Controllers\Admin;
use App\Models\Seat;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SeatController extends Controller
{
    public function index()
    {
        $seat=Seat::all();
        return view('auth.admin.seat.principal')->with('seat',$seat);
    }


    public function store(Request $request)
    {
        $request->validate([
            'seatNumber'=>'required|max:50'  
        ]);

        $news= new Seat();
        $news->seatNumber=$request->seatNumber;
        $news->save();

        return redirect()->route('admin.asiento')->with('crear','ok');

    }
    
}

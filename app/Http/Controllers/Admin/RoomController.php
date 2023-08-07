<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{
    public function index()
    {
        $sala = Room::all();
        return view('auth.admin.room.principal')->with('sala',$sala);;
    }


    public function store(Request $request)
    {
        $request->validate([
            'roomNumber'=>'required|max:50',
            'NumberSeats'=>'required|numeric'   
        ]);

        $newc= new Room();
        $newc->roomNumber=$request->roomNumber;
        $newc->NumberSeats =$request->NumberSeats;
        $newc->save();

        return redirect()->route('admin.sala')->with('crear','ok');

    }


    public function update(Request $request, Room $item)
    {
        
        $request->validate([
            'roomNumber'=>'required|max:50',
            'NumberSeats'=>'required|numeric'   
            
        ]);

        $item->roomNumber=$request->roomNumber;
        $item->NumberSeats =$request->NumberSeats;
        $item->save();

        return redirect()->route('admin.sala')->with('editar','ok');

        
    }

    public function delete(Request $request, $item)
    {
        //dd($movieid);
        $item=Room::find($item);
        $item->delete();
        
        
        //return redirect()->back()->with('eliminar','oki');
        return redirect()->route('admin.sala')->with('eliminar','oki');
    }



}

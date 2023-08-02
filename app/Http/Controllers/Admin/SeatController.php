<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SeatController extends Controller
{
    public function index()
    {
        
        return view('auth.admin.seatmanagement.seat');
    }
}

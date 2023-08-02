<?php

namespace App\Http\Livewire;

use Livewire\Component;
//Llamamos a el modelo movie el cual importara el modelo de la tabla
use App\Models\Movie;

class Toast extends Component
{
    //public $title;

    //public $count = 0;

    ////public function mount($title)
    ////{
        ////$this->titulo=$title;
    ////}
 
    //public function increment()
    ////{
        //$this->count++;
    ////}


    public function render()
    {
        $movie = Movie::all();
        return view('livewire.toast', compact('movie'));
    }
}

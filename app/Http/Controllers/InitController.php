<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InitController extends Controller
{
    public function menu(){

        return view('menu');
        
    }
    public function noticias(){

        return view('init.noticias');

    }
    public function reset(){

        return view('init.reset');
        
    }
}

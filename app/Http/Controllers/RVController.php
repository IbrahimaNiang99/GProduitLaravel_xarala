<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RVController extends Controller
{
    public function listerv(){
        return view('rv.liste');
    }
}

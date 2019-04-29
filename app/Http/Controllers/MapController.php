<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class MapController extends Controller
{
    //
    public function index(){
        return view('map',[
            'user' => Auth::user()
        ]);
    }
}

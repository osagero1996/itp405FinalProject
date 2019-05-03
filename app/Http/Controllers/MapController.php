<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Event;

class MapController extends Controller
{
    //
    public function index(){
        $events = Event::all();
        return view('map',[
            'user' => Auth::user(),
            'events' => $events,
        ]);
    }
}

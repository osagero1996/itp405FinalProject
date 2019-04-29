<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    public function index (){
        return view('login');
    }

    public function login(Request $request){
        $loginWasSuccessful = Auth::attempt([
            'email' => request('email'),
            'password' => request('password')
          ]);
          
          if($loginWasSuccessful){
              $user = Auth::user();
            // return view('map', ['user' => $user]);
            return redirect('/map');
          }else{
            // return redirect('/login');
            return redirect('/login')
            ->withInput()
            ->withErrors("Wrong Username Or Password");
          }
          
        }
        
        public function logout(Request $request){
          Auth::logout();
          return redirect('/login');
        }
}

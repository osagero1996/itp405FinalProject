<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Organization;
use Hash;
use Auth;
use Validator;

class SignUpController extends Controller
{
    //
    public function index(){
      
        return view('signup');
      }
      
      public function signup(Request $request){


        $input = $request->all();

        $validation = Validator::make($input, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5',
            'org_name' => 'required',
            'description' => 'required'
        ]);

        if($validation->fails()){
            return redirect('/signup')
            ->withInput()
            ->withErrors($validation);
        }

        $org = new Organization();
        $org->Name = request('org_name');
        $org->Description = request('description');
        $org->save();

        $user = new User();
        $user->email = request('email');
        $user->password = Hash::make(request('password')); //bcrypt
        $user->firstName = request('first_name');
        $user->lastName = request('last_name');
        $user->CompanyId = $org->OrganizationId;
        $user->save();
        
        Auth::login($user);
        return redirect('/map');
        
        // return redirect('/login');
      }
}

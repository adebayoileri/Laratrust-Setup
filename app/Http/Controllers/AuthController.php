<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showRegisterForm(){
        return view('register');
    }
    public function postRegister(Request $request){
        $this->validate($request,[
             'email' => 'required',
             'lastname' => 'required',
             'firstname' => 'required',
             'middlename' => 'required',
             'phonenumber' => 'required',
             'password' => 'required',
         ]);
 
         //Create new post
             $user =  new User();
             $user->email = $request->input('email');
             $user->firstname = $request->input('firstname');
             $user->lastname = $request->input('lastname');
             $user->middlename = $request->input('middlename');
             $user->phonenumber = $request->input('phonenumber');
             $user->password = \Hash::make($request->input['password']);
            
             $user->save();

             if ($user){
                $user->attachRole('Customer');

             }
             return redirect('/success');
             
    }
    public function success(){
        return view('success');
    }
    public function control(){
        return view('control');
    }
}
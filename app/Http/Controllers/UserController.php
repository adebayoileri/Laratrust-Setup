<?php

namespace App\Http\Controllers;

use App\Permission;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //List of users
    public function users(){
        $users = User::all();
        $data=[
            'users' => $users
        ];
        return view('admin.user.list', $data);
    }
    public function createuser(){
        return view('admin.user.createuser');
    }
    public function storeuser(Request $request){
        $this->validate($request,[
            'email' => 'required',
            'lastname' => 'required',
            'firstname' => 'required',
            'middlename' => 'required',
            'password' => 'required',
        ]);

        //Create new user
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
            return redirect('fw/users');
    }
    public function editUser($userId){
        $user = User::where('id', $userId)->first();
        if($user == null){
            return 'User cannot be found';
        }
        $data = [
            'user' => $user,
        ];
        return view('admin.user.edituser', $data);
    }
    public function updateUser(Request $request, $userId){
        $this->validate($request,[
            'email' => 'required',
            'lastname' => 'required',
            'firstname' => 'required',
            'middlename' => 'required',
            'password' => 'required',
        ]);

        //Update existing user
        $user = User::find($userId);
        // dd($user);
        $user->email = $request->input('email');
        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->middlename = $request->input('middlename');
        $user->phonenumber = $request->input('phonenumber');
        $user->password = \Hash::make($request->input['password']);

        $user->save();

            return redirect('/fw/users')->with('success', 'User successfully updated');

    }
}

<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
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
    public function customerList(){
        $users = User::all();
        $data=[
            'users' => $users
        ];
        return view('admin.user.customerlist', $data);
    }
    public function adminList(){
        $users = User::all();
        $data=[
            'users' => $users
        ];
        return view('admin.user.adminlist', $data);
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
        $user = User::find($userId);
        $roles = Role::all();
        if($user == null){
            return 'User cannot be found';
        }
        $data = [
            'user' => $user,
            'roles' => $roles,
        ];
        return view('admin.user.edituser', $data);
    }
    public function updateUser(Request $request, $userId){
        $this->validate($request,[
            'lastname' => 'required',
            'firstname' => 'required',
            'middlename' => 'required',
        ]);

        //Update existing user
        $user = User::find($userId);
        $previousRoles = $user->roles()->get();
        $currentRoles = $request->get('roles');
        
        //Run foreach to remove role
        foreach($previousRoles as $previousRole){
            $user->detachRole($previousRole);
        }
        //Run foreach to add new ones
        foreach($currentRoles as $currentRole){
            $user->attachRole($currentRole);
        }

        // dd($user);
        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->middlename = $request->input('middlename');
        $user->save();

            return redirect('/fw/users');

    }
}

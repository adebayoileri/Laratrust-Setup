<?php

namespace App\Http\Controllers;

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
}

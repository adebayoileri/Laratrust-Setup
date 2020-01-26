<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
        //List of roles
        public function roles(){
            $roles = Role::all();
            $data=[
                'roles' => $roles
            ];
            return view('admin.user.role', $data);
        }
}

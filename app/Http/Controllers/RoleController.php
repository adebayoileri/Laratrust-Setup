<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
        //List of roles
        public function roles(){
            $roles = Role::all();
            $permissions = Permission::all();
            $data=[
                'roles' => $roles,
                'permissions' => $permissions,
            ];
            return view('admin.user.role', $data);
        }
        public function createrole(){
            $permissions = Permission::get();
            $data =[
                'permissions'=> $permissions
            ];
            return view('admin.user.createrole', $data);
        }

        public function postcreaterole(Request $request){
            // dd($request->all());
            $validator = \Validator::make($request->all(),
            [
                'name'=>'required|unique:roles'
            ]);
            $role = New Role;
            $role->name = $request['name'];
            $role->display_name = $request['name'];
            $role->save();

            $permissions = $request['permissions'];

            foreach($permissions as $permission){
                $role->attachPermission($permission);
            }

            return \Redirect::to('fw/roles');
        }
        
        public function editRole($roleId){
            $role = Role::where('id', $roleId)->first();
            $permissions= Permission::get();
            if($role == null){
                return 'Role cannot be found';
            }
            $data = [
                'role' => $role,
                'permissions' => $permissions
            ];
            return view('admin.role.edit', $data);
        }
}

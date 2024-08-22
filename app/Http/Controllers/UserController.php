<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUsersRole($role){
        $role = Role::where('role_name', $role)->first();
        $users = User::where('role_id', $role->id)->get();
        return view('dashboard.aturvisitor')->with('users', $users);
    }

    public function store(){
        request()->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role_id' => 'required',
        ]);

        User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'role_id' => request('role_id'),
        ]);
    }
}

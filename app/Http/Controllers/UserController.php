<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUsersRole($role){
        $role = Role::where('role_name', $role)->first();
        $allrole = Role::all();
        $users = User::where('role_id', $role->id)->get();
        return view('dashboard.aturbyrole')->with(['users' => $users, 'allrole' => $allrole]);
    }

    public function tambahUserForm(){
        $roles = Role::all();
        return view('dashboard.tambahuser')->with('roles', $roles);
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role_id' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => $request->role_id,
        ]);

        return back()->with('success', 'Your user has been created!');
    }
}

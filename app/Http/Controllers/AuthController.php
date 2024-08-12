<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Session;

class AuthController extends Controller
{
    public function loginForm(){
        if(Auth::check()){
            return redirect()->route('home');
    }else{
            return view('auth.login');
        }
    }

    public function loginAction(Request $request){
        $data = [
            'email' => $request->email,
            'password'=> $request->password
        ];

        if(Auth::attempt($data)){
            return redirect()->route('home');
        }else{
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }
    }

    public function registerForm(){
        if(Auth::check()){
            return redirect('home');
        }else{
            return view('auth.register');
        }
    }

    public function registerAction(Request $request){
        $request -> validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('login');
    }

    public function logout(){
        Auth::logout();
        return redirect('login');
    }
}

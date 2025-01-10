<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function showLogin(){
        return view('guest/login');
    }
    public function login(Request $request){

        // dd($request->Username);
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        // dd($credentials);

        if(Auth::attempt($credentials)){
            // $request->session()->regenerateToken();
            return redirect(route('home'));
        }

        return redirect()->back();
    }

    public function logout(Request $request){
        Auth::logout();
        // $request->session()->invalidate();    
        // $request->session()->regenerateToken();
        return redirect('/');
    }
}

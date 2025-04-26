<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function view_register(){
        return view('register');
    }

    public function register(Request $request){
        $request->validate([
            'nik' => 'required|max:12|unique:users,nik',
            'name' => 'required|max:255',
            'email' => 'required|max:255|unique:users',
            'password' => 'required|min:12|confirmed'

        ]);

        $password = Hash::make($request->password);

        User::create([
            'nik' => $request->nik,
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password,
        ]);

        return redirect('/login')->with('success', 'Register Berhasil');
    }
}

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
            'nis' => 'required|max:12|unique:users,nis',
            'name' => 'required|max:255',
            'kelas' => 'required|max:10',
            'jenis_kelamin' => 'required',
            'nohp_wali' => 'required|max:12',
            'email' => 'required|max:255|unique:users',
            'password' => 'required|min:12|confirmed'

        ]);

        $password = Hash::make($request->password);

        User::create([
            'nis' => $request->nis,
            'name' => $request->name,
            'kelas' => $request->kelas,
            'jenis_kelamin' => $request->jenis_kelamin,
            'nohp_wali' => $request->nohp_wali,
            'email' => $request->email,
            'password' => $password,
        ]);

        return redirect('/login')->with('success', 'Register Berhasil');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function register(){
        return view('auth.register');
    }

    public function store(Request $request){

        $validated = $request->validate([
            'username' => 'required|alpha_dash|unique:users',
            'nama_lengkap' => 'required',
            'email' => 'required|unique:users',
            
        ],
    [
        'username.required' => 'Username tidak boleh kosong',
        'username.alpha_dash' => 'Username tidak boleh spasi',
        'username.unique' => 'Username sudah ada',
        'nama_lengkap.required' => 'Nama harus di isi',
        'email.required' => 'Email harus di isi',
        'email.unique' => 'Email sudah digunakan',
    ]);

    if ($request->password !== $request->confirm_password) {
        
        return redirect('/register')->with('failed', 'Password Tidak sama');
        
    }

    $adduser = User::create([
        'username' => $request->username,
        'email' => $request->email,
        'nama_lengkap' => $request->nama_lengkap,
        'password' => Hash::make($request->password),
        'role_id' => 3
    ]);

    return redirect('/login')->with('success', 'Register berhasil');
    
    }

    public function login(){
        return view('auth.login');
    }

    public function check(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/home');
        }else{
            return redirect('/login')->with('failed', 'Login gagal periksa kembali email dan password');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }


    
}

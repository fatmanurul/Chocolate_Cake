<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index (){
        return view('login.index');
    }


    public function authenticate(Request $request)
    { 
        $messages = [
            'required' => 'Silahkan isi kolom ini!',
            'email' => 'Email tidak valid!'
        ];

       $credentials = $request->validate([//validasi
        'usr_email' => 'required|email:dns',
        'usr_password' => 'required'
       ],$messages);

       $attempt = [//jika percobaan login yang dilakukan credentials berhasil akan dipindahkan ke sebuah halaman tapi jika gagal kita akan kembalikan ke halaman login dengan mengirimkan pesan eror
        'usr_email' => $request->usr_email,
        'password' => $request->usr_password
       ];
      
       if(Auth::attempt($attempt)) {
        $request->session()->regenerate();//session di generate(untuk menghindari teknik kejahatan session fixation)
        return redirect()->intended('/admin/dashboard');
       }

      return back()->with('loginError', 'Login  gagal!');
    }


    public function logout(){
        Auth::logout();
 
        request()->session()->invalidate();
     
        request()->session()->regenerateToken();
     
        return redirect('/login');
    }

    public function username()
    {
        return 'usr_email';
    }
}

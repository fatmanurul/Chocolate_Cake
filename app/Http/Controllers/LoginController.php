<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index (){
        return view('login.index', [
            'title' => 'login',
            "active" => "login"
        ]);
    }


    public function authenticate(Request $request)
    {
       $credentials = $request->validate([
        'usr_email' => 'required|email',
        'usr_password' => 'required'
       ]);

       $attempt = [
        'usr_email' => $request->usr_email,
        'password' => $request->usr_password
       ];
      
       if(Auth::attempt($attempt)) {
        $request->session()->regenerate();
        return redirect()->intended('/dashboard');
       }



      return back()->with('loginError', 'login  gagal!');
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

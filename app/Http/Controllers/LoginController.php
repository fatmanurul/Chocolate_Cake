<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'Login'
        ]);
    }
    public function authenticate(Request $request)
    {
    //   Validasi email dan password
    $credentials = $request->validate([
     'email' => 'required|email:dns',
     'password' => 'required'
    ]);

    //  if()
        return redirect('/dashboard');
    //  }
      return back()->with('loginError', 'Login gagal!');
    }
    // logout
    public function logout(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/login');
    }
}

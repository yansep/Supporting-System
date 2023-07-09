<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view ('login.index',[
            'title' => 'Login',
            'active' => 'login'
        ]);
    }

    public function authenticate(Request $request) // merupakan method login if else pesan error kesalahan
    {
        $credentials = $request->validate([
            'npk' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/home');//sebuah method dari laravel
        }

        return back()->with('loginError', 'Username atau Password Salah!');
    }

    public function logout(Request $request)//merupakan method fungsi dari logout
{
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/');
}


}

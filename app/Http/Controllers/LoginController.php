<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function formLogin() {
        return view('member.form-login');
    }

    public function prosesLogin(Request $req) {
        request()->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $kredensil = $req->only([
            'username', 'password',
        ]);

        if (Auth::attempt($kredensil)) {
            $user = Auth::user();
            if($user->level == 'user') {
                return redirect()->intended('user');
            } elseif($user->level == 'admin') {
                return redirect()->intended('admin');
            }
            return redirect()->intended('/');
        }

        return redirect('login')
        ->withInput()
        ->withErrors(['login gagal' => 'username atau password tidak ditemukan']);
    }
}
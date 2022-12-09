<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginView() {
        return view('auth.login');
    }
    public function login(Request $request) {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if(Auth::user()->role == 'admin') {
                return redirect('/admin');
            }
            return redirect('/');
        }
        return redirect('/login');
    }
    public function logout() {
        Auth::logout();

        return redirect('/');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        if ($user = Auth::user()) {
            if ($user->level == '1') {
                return redirect()->intended('beranda User');
            } else if ($user->level == '2') {
                return redirect()->intended('beranda Dosen');
            } else if ($user->level == '3') {
                return redirect()->intended('beranda Admin');
            }
        }

        return view('login.view_login');
    }
}

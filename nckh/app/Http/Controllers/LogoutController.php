<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LogoutController extends Controller
{
    public function logout()
    {
        Auth::logout();
        Session::forget('user');
        session()->forget('favoriteCount');
        return redirect()->route('home');
    }
}

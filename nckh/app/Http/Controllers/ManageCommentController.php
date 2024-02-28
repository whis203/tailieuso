<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManageCommentController extends Controller
{
    public function index()
    {
        if (auth()->check() && auth()->user()->role === 'user' && auth()->user()->role === 'teacher') {
            return redirect()->route('signin.index');
        }
        return view('admin.danhGia.list');
    }
}

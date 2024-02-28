<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Products;
use App\Models\Comment;
use App\Models\Education;

class ManageController extends Controller
{
    public function index()
    {
        if (auth()->check() && auth()->user()->role === 'user' && auth()->user()->role === 'teacher') {
            return redirect()->route('signin.index');
        }
        $totalComment = Comment::count();
        $totalEdu = Education::count();
        $totalDoc = Products::count();
        $totalUsers = User::count();
        return view('admin.thongKe.home', compact('totalUsers', 'totalComment', 'totalEdu', 'totalDoc'));
    }
}

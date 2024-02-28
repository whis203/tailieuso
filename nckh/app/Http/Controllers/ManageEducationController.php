<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Education;
use Illuminate\Support\Str;

class ManageEducationController extends Controller
{
    public function index()
    {
        if (auth()->check() && auth()->user()->role === 'user' && auth()->user()->role === 'teacher') {
            return redirect()->route('signin.index');
        }
        $education = Education::all();
        foreach ($education as $edu) {
            $edu->mota = Str::limit($edu->mota, 50);
            $edu->muctieu = Str::limit($edu->muctieu, 50); // Giới hạn độ dài thành 50 ký tự
        }
        return view('admin.quanLyHocPhan.list', compact('education'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Khoa;
use App\Models\Education;

class KhoaController extends Controller
{
    public function index()
    {
        if (auth()->check() && auth()->user()->role === 'admin') {
            return redirect()->route('signin.index');
        }
        $khoas = Khoa::all();
        $khoa = null;
        $khoa = $khoas->first();
        $educations = Education::all();
        $education = $educations->filter(function ($item) {
            return $item->khoa_id == "1";
        });
        return view('client.education', compact('khoa', 'khoas', 'education'));
    }
    public function select($khoaName)
    {
        $khoas = Khoa::all();
        $khoa = $khoas->filter(function ($item) use ($khoaName) {
            return $item->id == $khoaName;
        })->first();
        $educations = Education::all();
        $education = $educations->filter(function ($item) use ($khoaName) {
            return $item->khoa_id == $khoaName;
        });
        return view('client.education', compact('khoa', 'khoas', 'education'));
    }
}

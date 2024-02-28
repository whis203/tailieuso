<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Education;

class EducationController extends Controller
{
    public function eduDetail($id)
    {
        if (auth()->check() && auth()->user()->role === 'admin') {
            return redirect()->route('signin.index');
        }
        $education = Education::findOrFail($id);
        return view('client.detailEducation', compact('education'));
    }
}

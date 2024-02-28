<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\session;

// Đảm bảo sử dụng đúng namespace cho mô hình
use App\Models\User;
use App\Models\Favorite;

class SigninController extends Controller
{
    public $data = [];

    public function index()
    {
        return view('client.signin', $this->data);
    }
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->route('admin.index');
            }
            $userData = [
                'username' => $user->username,
                'name' => $user->name,
                'email' => $user->email,
                'phone' => $user->phone,
                'img' => $user->img,
                'gender' => $user->gender,
                'role' => $user->role,
            ];
            $request->session()->put('user', $userData);
            $favoriteCount = Favorite::where('user_id', $user->id)->sum('quantity');
            session()->put('favoriteCount', $favoriteCount);
            return redirect()->route('home');
        } elseif ($request->username == '' || $request->input('password') == '') {
            $data_er['error'] = 'Vui lòng nhập đủ thông tin';
            return redirect()->route('signin.index')->with($data_er);
        }
        $data_er['error'] = 'Tài khoản hoặc mật khẩu không chính xác';
        return redirect()->route('signin.index')->with($data_er);
    }
}

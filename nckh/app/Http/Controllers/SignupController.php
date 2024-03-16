<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Rules\EndsWith;

class SignupController extends Controller
{
    public $data = [];
    public function index()
    {
        return view('client.signup', $this->data);
    }
    public function create(Request $request)
    {
        $data_sc['success'] = 'Đăng ký thành công';
        $existingUsername = User::where('username', $request->username)
            ->first();
        $existingEmail = User::where('email', $request->email)
            ->first();
        if ($request->username == '' || $request->input('password') == '' || $request->input('name') == '' || $request->input('email') == '') {
            $data_er['error'] = 'Vui lòng nhập đủ thông tin';
            return redirect()->route('signup.index')->with($data_er);
        } elseif ($existingUsername) {
            $data_er['error'] = 'Tên đăng nhập đã được sử dụng.';
            return redirect()->route('signup.index')->with($data_er);
        }
        if (!preg_match('/^[a-zA-Z0-9_]+$/', $request->username)) {
            $data_er['error'] = 'Tên đăng nhập chỉ được chứa chữ cái, số và dấu gạch dưới.';
            return redirect()->route('signup.index')->with($data_er);
        }
        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL) || !str_ends_with($request->email, '@gmail.com')) {
            $data_er['error'] = 'Email không kết thúc bằng @gmail.com.';
            return redirect()->route('signup.index')->with($data_er);
        } elseif ($existingEmail) {
            $data_er['error'] = 'Email đã được sử dụng.';
            return redirect()->route('signup.index')->with($data_er);
        };
        $request->validate([
            'g-recaptcha-response' => 'required|captcha', 
            'username' => 'required|string',
            'password' => 'required|string',
            'name' => 'required|string',
            'email' => 'required|email'
        ], [
            'g-recaptcha-response.required' => 'Vui lòng xác nhận bạn không phải người máy.',
            'g-recaptcha-response.captcha' => 'Captcha không đúng!',
        ]);
        
        User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'name' => $request->name,
            'email' => $request->email
        ]);
        return redirect()->route('signin.index')->with($data_sc);
    }
}

<?php

// ForgotPasswordController.php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('client.forgerPass');
    }

    public function sendResetLinkEmail(Request $request)
    {

        $status = Password::sendResetLink(
            $request->only('email')
        );
        $request->validate([
            'email' => 'required|email',
            'g-recaptcha-response' => 'required|captcha', 
        ], [
            'g-recaptcha-response.required' => 'Vui lòng xác nhận bạn không phải người máy.',
            'g-recaptcha-response.captcha' => 'Captcha không đúng!',
            'email.required' => 'Vui lòng nhập Email.',
            'email.email' => 'Vui lòng đúng định dạng Email.',
        ]);
        return $status === Password::RESET_LINK_SENT
            ? back()->with('success', 'Liên kết đặt lại mật khẩu đã được gửi thành công!')
            : back()->withErrors(['email' => __($status)]);
            
    }
}

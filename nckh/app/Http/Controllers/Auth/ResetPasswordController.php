<?php

// ResetPasswordController.php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    public function showResetForm(Request $request, $token)
    {
        return view('client.changePass', ['token' => $token, 'email' => $request->email]);
    }
    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:5',
        ]);
        $request->validate([
            'g-recaptcha-response' => 'required|captcha', 
        ], [
            'g-recaptcha-response.required' => 'Vui lòng xác nhận bạn không phải người máy.',
            'g-recaptcha-response.captcha' => 'Captcha không đúng!',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->password = bcrypt($password);
                $user->save();
            }
        );
        return $status == Password::PASSWORD_RESET
            ? redirect()->route('signin.index')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
}

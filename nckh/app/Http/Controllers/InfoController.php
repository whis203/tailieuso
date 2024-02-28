<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use Illuminate\Support\Facades\Hash;

class InfoController extends Controller
{
    public function index()
    {
        // Kiểm tra xem người dùng đã đăng nhập hay chưa
        if (auth()->check() && auth()->user()->role === 'admin') {
            return redirect()->route('signin.index');
        }
        if (Auth::check()) {
            return view('client.info');
        } else {
            // Nếu chưa đăng nhập, chuyển hướng đến trang đăng nhập
            return redirect()->route('signin.index');
        }
    }
    public function updateInfo(Request $request)
    {
        // Lấy thông tin người dùng hiện tại
        $user = User::find(Auth::id());
        // Kiểm tra xem có hình ảnh được tải lên không
        if ($request->hasFile('img')) {
            $fileName = time() . '_' . $request->file('img')->getClientOriginalName();
            // Lưu hình ảnh vào thư mục public/img
            $request->file('img')->move(public_path('img'), $fileName);
            // Cập nhật đường dẫn hình ảnh trong cơ sở dữ liệu
            $user->img = '/img/' . $fileName;
        }
        // Kiểm tra và cập nhật các trường dữ liệu thông tin người dùng nếu chúng được cung cấp
        if ($request->filled(['name', 'phone', 'gender', 'email'])) {
            $user->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'gender' => $request->input('gender'),
            ]);
        }
        $user->save();
        // Lưu thông tin người dùng vào phiên và redirect với thông báo thành công
        $request->session()->put('user', $user->toArray());
        return redirect()->route('info.index')->with(['success' => 'Thông tin người dùng đã được cập nhật thành công.']);
    }


    public function changePassword(Request $request)
    {
        $user = User::find(Auth::id()); // Lấy thông tin người dùng đã đăng nhập

        // Kiểm tra xem mật khẩu cũ có khớp không
        if (!(Hash::check($request->get('old_password'), $user->password))) {
            return redirect()->back()->with("error", "Mật khẩu cũ không chính xác");
        }

        // Kiểm tra xem mật khẩu mới và nhập lại mật khẩu mới có khớp không
        if (strcmp($request->get('new_password'), $request->get('again_new_password')) !== 0) {
            return redirect()->back()->with("error", "Nhập lại mật khẩu mới không khớp");
        }

        // Kiểm tra xem mật khẩu mới có giống mật khẩu cũ không
        if (strcmp($request->get('old_password'), $request->get('new_password')) == 0) {
            return redirect()->back()->with("error", "Mật khẩu mới không được trùng với mật khẩu cũ");
        }

        // Cập nhật mật khẩu mới cho người dùng
        $user->password = bcrypt($request->get('new_password'));
        $user->save();
        return redirect()->back()->with("success", "Đổi mật khẩu thành công!");
    }
}

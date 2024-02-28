<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Cache;

class ManageAccountController extends Controller
{
    public function index()
    {
        if (auth()->check() && auth()->user()->role === 'user' && auth()->user()->role === 'teacher') {
            return redirect()->route('signin.index');
        }
        $loggedInUsers = Cache::get('logged_in_users', 0);
        $users = User::all();
        return view('admin.quanLyTaikhoan.list', compact('users', 'loggedInUsers'));
    }
    public function showFormAdd()
    {
        return view('admin.quanLyTaikhoan.add');
    }
    public function create(Request $request)
    {
        $data_sc['success'] = 'Đăng ký thành công';
        $existingUsername = User::where('username', $request->username)
            ->first();
        $existingEmail = User::where('email', $request->email)
            ->first();
        if ($request->hasFile('img')) {
            $imageFileName = time() . '_' . $request->file('img')->getClientOriginalName();
            $request->file('img')->move(public_path('img'), $imageFileName);
        }
        if ($existingUsername) {
            $data_er['error'] = 'Tên đăng nhập đã được sử dụng.';
            return redirect()->route('manageaccount.showFormAdd')->with($data_er);
        }
        if (!preg_match('/^[a-zA-Z0-9_]+$/', $request->username)) {
            $data_er['error'] = 'Tên đăng nhập chỉ được chứa chữ cái, số và dấu gạch dưới.';
            return redirect()->route('manageaccount.showFormAdd')->with($data_er);
        }
        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL) || !str_ends_with($request->email, '@gmail.com')) {
            $data_er['error'] = 'Email không kết thúc bằng @gmail.com.';
            return redirect()->route('manageaccount.showFormAdd')->with($data_er);
        } elseif ($existingEmail) {
            $data_er['error'] = 'Email đã được sử dụng.';
            return redirect()->route('manageaccount.showFormAdd')->with($data_er);
        };
        User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'name' => $request->name,
            'email' => $request->email,
            'img' => '/img/' . $imageFileName,
            'gender' => $request->gender,
            'role' => $request->role,
            'phone' => $request->phone
        ]);
        return redirect()->route('manageaccount.index')->with($data_sc);
    }
    public function showFormEdit($id)
    {
        $user = User::find($id);
        return view('admin.quanLyTaiKhoan.edit', compact('user'));
    }
    public function updateInfo(Request $request, $id)
    {
        // Lấy thông tin người dùng hiện tại
        $user = User::find($id);
        $existingEmail = User::where('email', $request->email)
            ->first();
        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL) || !str_ends_with($request->email, '@gmail.com')) {
            $data_er['error'] = 'Email không kết thúc bằng @gmail.com.';
            return redirect()->back()->with($data_er);
        } elseif ($existingEmail) {
            $data_er['error'] = 'Email đã được sử dụng.';
            return redirect()->back()->with($data_er);
        };
        // Kiểm tra xem có hình ảnh được tải lên không
        if ($request->hasFile('img')) {
            $fileName = time() . '_' . $request->file('img')->getClientOriginalName();
            // Lưu hình ảnh vào thư mục public/img
            $request->file('img')->move(public_path('img'), $fileName);
            $user->img = '/img/' . $fileName;
            // Cập nhật đường dẫn hình ảnh trong cơ sở dữ liệu
        }
        // Kiểm tra và cập nhật các trường dữ liệu thông tin người dùng nếu chúng được cung cấp
        if ($request->filled(['name', 'phone', 'gender', 'email', 'role'])) {
            $user->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'gender' => $request->input('gender'),
                'role' => $request->input('role'),

            ]);
        }
        $user->save();
        // Lưu thông tin người dùng vào phiên và redirect với thông báo thành công
        $request->session()->put('user', $user->toArray());
        return redirect()->route('manageaccount.index')->with(['success' => 'Thông tin người dùng đã được cập nhật thành công.']);
    }
    public function deleteUserId($id)
    {
        $user = User::find($id);
        $user->delete();
        $data['success'] = 'Xoá sản người dùng thành công';
        return redirect()->back()->with($data);
    }
}

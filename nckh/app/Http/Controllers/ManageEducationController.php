<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use App\Models\Education;
use App\Models\Khoa;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ManageEducationController extends Controller
{
    public function index()
    {
        if (auth()->check() && auth()->user()->role === 'user' && auth()->user()->role === 'teacher') {
            return redirect()->route('signin.index');
        }
        if (Auth::check()) {
            Paginator::useBootstrap();
            $education = Education::all();
            $education = Education::paginate(5);
            foreach ($education as $edu) {
                $edu->mota = Str::limit($edu->mota, 50);
                $edu->muctieu = Str::limit($edu->muctieu, 50); // Giới hạn độ dài thành 50 ký tự
            }
            return view('admin.quanLyHocPhan.list', compact('education'));
        } else {
            // Nếu chưa đăng nhập, chuyển hướng đến trang đăng nhập
            return redirect()->route('signin.index');
        }
    }
    public function addEducation(Request $request)
    {
        if ($request->input('mahp') == '' && $request->input('tenhp') == ''  && $request->input('main') == ''  && $request->input('tenvt') == ''  && $request->input('mota') == ''  && $request->input('muctieu') == ''  && $request->input('sotinchi') == '' &&  $request->input('khoa_id') == '') {
            $data_er['error'] = 'Nhập đủ thông tin.';
            return redirect()->route('manageeducation.showFormAdd')->with($data_er);
        }
        $existingTenvt = Education::where('tenvt', $request->tenvt)->first();
        if ($existingTenvt) {
            $data_er['error'] = 'Tên viết tắt đã được sử dụng.';
            return redirect()->route('manageeducation.showFormAdd')->with($data_er);
        }
        $existingMahp = Education::where('mahp', $request->mahp)->first();
        if ($existingMahp) {
            $data_er['error'] = 'Mã học phần đã được sử dụng.';
            return redirect()->route('manageeducation.showFormAdd')->with($data_er);
        }
        $existingMain = Education::where('main', $request->main)->first();
        if ($existingMain) {
            $data_er['error'] = 'Mã in đã được sử dụng.';
            return redirect()->route('manageeducation.showFormAdd')->with($data_er);
        }
        // If no errors, proceed to create the education record
        Education::create([
            'mahp' => $request->input('mahp'),
            'tenhp' => $request->input('tenhp'),
            'donvi' => $request->input('donvi'),
            'main' => $request->input('main'),
            'tenvt' => $request->input('tenvt'),
            'mota' => $request->input('mota'),
            'sotinchi' => $request->input('sotinchi'),
            'muctieu' => $request->input('muctieu'),
            'khoa_id' => $request->input('khoa_id'),
        ]);

        $data_sc['success'] = 'Đăng ký thành công';
        return redirect()->route('manageeducation.index')->with($data_sc);
    }
    public function showFormAdd()
    {
        $khoa = Khoa::all();
        return view('admin.quanLyHocPhan.add', compact('khoa'));
    }

    public function showFormEdit($id)
    {
        $khoa = Khoa::all();
        $education = Education::find($id);
        return view('admin.quanLyHocPhan.edit', compact('education', 'khoa'));
    }
    public function updateEdu(Request $request, $id)
    {
        $education = Education::find($id);
        if ($request->filled(['mahp', 'tenhp', 'donvi', 'tenvt', 'main', 'mota', 'sotinchi', 'muctieu', 'khoa_id'])) {
            $education->update([
                'mahp' => $request->input('mahp'),
                'tenhp' => $request->input('tenhp'),
                'donvi' => $request->input('donvi'),
                'main' => $request->input('main'),
                'mota' => $request->input('mota'),
                'sotinchi' => $request->input('sotinchi'),
                'muctieu' => $request->input('muctieu'),
                'khoa_id' => $request->input('khoa_id'),
            ]);
        }
        $education->save();
        return redirect()->route('manageeducation.index')->with(['success' => 'Thông tin học phần đã được cập nhật thành công.']);
    }
    public function deleteEduId($id)
    {

        $education = Education::find($id);
        $education->delete();
        $data['success'] = 'Xoá sản người dùng thành công';
        return redirect()->back()->with($data);
    }
}

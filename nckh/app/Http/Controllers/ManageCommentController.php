<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;

class ManageCommentController extends Controller
{
    public function index()
    {
        if (auth()->check() && auth()->user()->role === 'user' && auth()->user()->role === 'teacher') {
            return redirect()->route('signin.index');
        }
        if (Auth::check()) {
            $comments = Comment::all();
            return view('admin.danhGia.list', compact('comments'));
        } else {
            // Nếu chưa đăng nhập, chuyển hướng đến trang đăng nhập
            return redirect()->route('signin.index');
        }
    }
    public function deleteCommentId($id)
    {
        $comments = Comment::find($id);
        $comments->delete();
        $data['success'] = 'Xoá đánh giá thành công';
        return redirect()->back()->with($data);
    }
    public function recent()
    {
        $comments = Comment::orderBy('created_at', 'desc')->take(10)->get();
        return view('admin.danhGia.commentRecent', compact('comments'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Products;
use App\Models\Comment;
use App\Models\Education;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class ManageController extends Controller
{
    public function index()
{
    if (Auth::check()) {
        $totalComment = Comment::count();
        $totalEdu = Education::count();
        $totalDoc = Products::count();
        $totalUsers = User::count();
        $users = User::paginate(5); // Phân trang người dùng
        // Lấy 3 bình luận gần nhất dựa trên created_at
        $latestComments = Comment::orderBy('created_at', 'desc')->take(3)->get();
        
        // Giới hạn độ dài nội dung của bình luận và lấy thông tin user cho mỗi bình luận
        foreach ($latestComments as $comment) {
            $comment->content = Str::limit($comment->content, 20);
            $user = User::find($comment->user_id);
            if ($user) {
                $comment->userName = $user->name; // Tên của người dùng
                $comment->userImg = $user->img; // Hình ảnh của người dùng
            }
        }

        // Giới hạn độ dài password của người dùng
        foreach ($users as $user) {
            $user->password = Str::limit($user->password, 20);
        }
        
        return view('admin.thongKe.home', compact('totalUsers', 'totalComment', 'totalEdu', 'totalDoc', 'users', 'latestComments'));
    } else {
        // Nếu chưa đăng nhập, chuyển hướng đến trang đăng nhập
        return redirect()->route('signin.index');
    }
}



    
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $comment = new Comment([
            'product_id' => $request->input('product_id'),
            'user_id' => auth()->id(),
            'content' => $request->input('content'),
            'rating' => $request->input('rating'),
        ]);
        $comment->save();

        return redirect()->back()->with('success', 'Comment đã được thêm.');
    }
    // CommentController.php


    public function update(Request $request, $id)
    {
        $request->validate([
            'content' => 'required',
            'rating' => 'required',
        ]);
        $comment = Comment::findOrFail($id);
        // Kiểm tra xem người dùng có quyền chỉnh sửa bình luận này không, nếu không thì chuyển hướng hoặc hiển thị thông báo lỗi

        $comment->content = $request->input('content');
        $comment->rating = $request->input('rating');
        $comment->save();
        return redirect()->back()->with('success', 'Bình luận đã được cập nhật.');
    }
    // CommentController.php

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        // Kiểm tra xem người dùng có quyền xóa bình luận này không, nếu không thì chuyển hướng hoặc hiển thị thông báo lỗi
        $comment->delete();

        return redirect()->back()->with('success', 'Bình luận đã được xóa thành công.');
    }
}

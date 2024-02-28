<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Favorite;
use App\Models\Products;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;

class FavoriteController extends Controller
{


    public function viewFavorites()
    {
        if (auth()->check() && auth()->user()->role === 'admin') {
            return redirect()->route('signin.index');
        }
        // Đảm bảo người dùng đã đăng nhập
        if (Auth::check()) {
            $user_id = Auth::id();
            // Lấy danh sách các sản phẩm yêu thích của người dùng
            $favorites = Favorite::where('user_id', $user_id)->get();

            // Lặp qua danh sách sản phẩm yêu thích và tính điểm đánh giá trung bình của mỗi sản phẩm
            foreach ($favorites as $favorite) {
                // Lấy sản phẩm liên quan đến mỗi mục yêu thích
                $product = $favorite->product;

                // Tính toán điểm đánh giá trung bình của sản phẩm
                $totalstar = $product->comments()->avg('rating');

                // Gán giá trị điểm đánh giá trung bình vào thuộc tính 'totalstar' của sản phẩm
                $product->totalstar = $totalstar;
            }

            return view('client.favorite', compact('favorites'));
        } else {
            return redirect()->route('signin.index');
        }
    }
}

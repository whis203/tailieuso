<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Education;
use App\Models\Khoa;
use Illuminate\Support\Facades\DB;
use App\Models\Favorite;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    public function index()
    {
        $education = Education::all();
        $edus = Education::paginate(3);
        $user_id = Auth::id();
        // Lấy danh sách các sản phẩm yêu thích của người dùng
        $favorites = Favorite::where('user_id', $user_id)->paginate(3);
            // Lặp qua danh sách sản phẩm yêu thích và tính điểm đánh giá trung bình của mỗi sản phẩm
            foreach ($favorites as $favorite) {
                // Lấy sản phẩm liên quan đến mỗi mục yêu thích
                $product = $favorite->product;
                $product->product_name = Str::limit($product->product_name, 20);
                // Tính toán điểm đánh giá trung bình của sản phẩm
                $totalstar = $product->comments()->avg('rating');
                // Gán giá trị điểm đánh giá trung bình vào thuộc tính 'totalstar' của sản phẩm
                $product->totalstar = $totalstar;
            }
        $products = Products::orderBy('product_id', 'desc')->get(); // Lấy tất cả sản phẩm
        if (auth()->check() && auth()->user()->role === 'admin') {
            return redirect()->route('signin.index');
        }
        foreach ($products as $product) {
            // Sử dụng truy vấn SQL để tính toán điểm đánh giá trung bình của sản phẩm
            $product->product_name = Str::limit($product->product_name, 30);
            $totalstar = DB::table('comment')
                ->where('product_id', $product->product_id)
                ->avg('rating');
            // Gán giá trị điểm đánh giá trung bình vào thuộc tính 'averageRating' của sản phẩm
            $product->totalstar = $totalstar;
        }
        return view('client.home', compact( 'products','education','edus','favorites'));
    }

}

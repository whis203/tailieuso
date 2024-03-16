<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Education;
use App\Models\Products;
use App\Models\Favorite;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
class EducationController extends Controller
{
    public function index(){
        $education = Education::all();
        $products = Products::all();
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
        return view('client.education', compact('education', 'products','favorites'));
    }
    public function select($mahp) {
        // Lấy thông tin về học phần cụ thể
        $education = education::all();
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
        if($education) {
            // Nếu có học phần tương ứng, lấy các sản phẩm có mã học phần tương ứng
            $products = Products::where('mahp', $mahp)->get();
            $educations = Education::where('mahp', $mahp)->get();
            return view('client.education', compact('education', 'products','educations','favorites'));
        } else {
            // Nếu không tìm thấy học phần tương ứng, có thể redirect hoặc hiển thị thông báo lỗi
            return redirect()->back()->with('error', 'Không tìm thấy học phần.');
        }
    }
    
}
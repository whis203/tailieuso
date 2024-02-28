<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Education;
use App\Models\Khoa;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {

        $khoas = Khoa::all();
        $products = Products::all(); // Lấy tất cả sản phẩm
        if (auth()->check() && auth()->user()->role === 'admin') {
            return redirect()->route('signin.index');
        }
        foreach ($products as $product) {
            // Sử dụng truy vấn SQL để tính toán điểm đánh giá trung bình của sản phẩm
            $totalstar = DB::table('comment')
                ->where('product_id', $product->product_id)
                ->avg('rating');
            // Gán giá trị điểm đánh giá trung bình vào thuộc tính 'averageRating' của sản phẩm
            $product->totalstar = $totalstar;
        }
        return view('client.home', compact('khoas', 'products'));
    }
    public function select($khoaName)
    {
        $khoas = Khoa::all();
        $khoa = $khoas->filter(function ($item) use ($khoaName) {
            return $item->id == $khoaName;
        })->first();
        $educations = Education::all();
        $education = $educations->filter(function ($item) use ($khoaName) {
            return $item->khoa_id == $khoaName;
        });
        return view('client.education', compact('khoa', 'khoas', 'education'));
    }
}

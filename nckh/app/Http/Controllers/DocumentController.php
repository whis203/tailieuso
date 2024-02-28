<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\DB;

class DocumentController extends Controller
{
    public function index()
    {
        if (auth()->check() && auth()->user()->role === 'admin') {
            return redirect()->route('signin.index');
        }
        Paginator::useBootstrap();
        $products = Products::all();
        $production = Products::paginate(5);
        foreach ($products as $product) {
            // Sử dụng truy vấn SQL để tính toán điểm đánh giá trung bình của sản phẩm
            $totalstar = DB::table('comment')
                ->where('product_id', $product->product_id)
                ->avg('rating');
            // Gán giá trị điểm đánh giá trung bình vào thuộc tính 'averageRating' của sản phẩm
            $product->totalstar = $totalstar;
        }
        foreach ($production as $product) {
            // Sử dụng truy vấn SQL để tính toán điểm đánh giá trung bình của sản phẩm
            $totalstar = DB::table('comment')
                ->where('product_id', $product->product_id)
                ->avg('rating');
            // Gán giá trị điểm đánh giá trung bình vào thuộc tính 'averageRating' của sản phẩm
            $product->totalstar = $totalstar;
        }
        return view('client.document', compact('products', 'production'));
    }
    public function search(Request $request)
    {
        Paginator::useBootstrap();
        $keyword = $request->input('product_name');
        $category = $request->input('category');
        $created_at = $request->input('created_at');
        $query = Products::query();

        if ($keyword) {
            $query->where('product_name', 'like', '%' . $keyword . '%');
        }

        if ($category) {
            $query->where('category', $category);
        }
        if ($created_at) {
            // Xử lý thời gian tạo sản phẩm
            $previousDate = now()->subDays($created_at);
            $query->where('created_at', '>=', $previousDate);
        }
        $production = $query->paginate(5);
        $products = Products::all();
        if ($production->isEmpty()) {
            return redirect()->back()->with(['error' => 'Không có sản phẩm nào!']);
        }
        return view('client.document', compact('production', 'products'));
    }
}

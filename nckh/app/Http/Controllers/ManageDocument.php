<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Str;

class ManageDocument extends Controller
{


    public function index()
    {
        if (auth()->check() && auth()->user()->role === 'user' && auth()->user()->role === 'teacher') {
            return redirect()->route('signin.index');
        }
        Paginator::useBootstrap();
        $products = Products::all();
        $products = Products::paginate(5);
        // Lặp qua từng sản phẩm và giới hạn độ dài của trường 'product_detail'
        foreach ($products as $product) {
            $product->product_detail = Str::limit($product->product_detail, 70); // Giới hạn độ dài thành 50 ký tự
        }
        return view('admin.quanLyTaiLieu.list', compact('products'));
    }
    public function showFormAdd()
    {
        return view('admin.quanLyTaiLieu.add');
    }
    public function showFormEdit($id)
    {
        $product = Products::find($id);
        return view('admin.quanLyTaiLieu.edit', compact('product'));
    }
}

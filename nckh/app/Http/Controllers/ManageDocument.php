<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Education;
use Illuminate\Support\Str;

class ManageDocument extends Controller
{


    public function index()
    {
        if (auth()->check() && auth()->user()->role === 'user' && auth()->user()->role === 'teacher') {
            return redirect()->route('signin.index');
        }
        if (Auth::check()) {
            Paginator::useBootstrap();
            $products = Products::all();
            $products = Products::paginate(5);
            
            // Lặp qua từng sản phẩm và giới hạn độ dài của trường 'product_detail'
            foreach ($products as $product) {
                $product->product_detail = Str::limit($product->product_detail, 70); // Giới hạn độ dài thành 50 ký tự
            }
            return view('admin.quanLyTaiLieu.list', compact('products'));
        } else {
            // Nếu chưa đăng nhập, chuyển hướng đến trang đăng nhập
            return redirect()->route('signin.index');
        }
    }
    public function showFormAdd()
    {
        $education = Education::all();
        return view('admin.quanLyTaiLieu.add',compact('education'));
    }
    public function showFormEdit($id)
    {
        $education = Education::all();
        $product = Products::find($id);
        return view('admin.quanLyTaiLieu.edit', compact('product','education'));
    }
    public function search(Request $request)
    { $education = Education::all();
        Paginator::useBootstrap();
        $product_name = $request->input('product_name');
        $query = Products::query();
        if ($product_name) {
            $query->where('product_name', 'like', '%' . $product_name . '%')
            ->orWhere('category', 'like', '%'.$product_name.'%')
            ->orWhere('mahp', 'like', '%'.$product_name.'%')
            ->orWhere('tacgia', 'like', '%'.$product_name.'%');
        }
        $products = Products::all();
        $products = $query->paginate(10);
        foreach ($products as $pro) {
            $pro->product_detail = Str::limit($pro->product_detail, 40);
        }
        if ($products->isEmpty()) {
            return redirect()->back()->with(['error' => 'Không có sản phẩm nào!']);
        }
        return view('admin.quanLyTaiLieu.list', compact('products','education'));
    }
}

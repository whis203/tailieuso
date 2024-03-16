<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use App\Models\Favorite;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
class DocumentController extends Controller
{
    public function index()
    {
        $education = Education::all();
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
        return view('client.document',compact('education','favorites'));
    }
    
    public function search(Request $request)
    {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');
            if($query != '') {
                $searchData = Products::where('product_name', 'like', '%'.$query.'%')
                    ->orWhere('mahp', 'like', '%'.$query.'%')
                    ->orWhere('tacgia', 'like', '%'.$query.'%')
                    ->orderBy('product_id', 'desc')
                    ->paginate(5);
            } else {
                $searchData = Products::orderBy('product_id', 'desc')->paginate(5);
            }
            $total_row = $searchData->count();
            if($total_row > 0){
                
                foreach ($searchData as $product) {
                    $totalstar = DB::table('comment')
                        ->where('product_id', $product->product_id)
                        ->avg('rating');
                    // Gán giá trị điểm đánh giá trung bình vào thuộc tính 'averageRating' của sản phẩm
                    $product->totalstar = $totalstar;
                    $output .= '<div class="swiper-slide bg-white" style="max-width: 800px;">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="img-book col-lg-3 col-md-3 col-sm-4 col-3">
                            <img class="m-3" src="' . $product->product_img . '" alt="' . $product->product_name . '">
                        </div>
                        <div class="text-book row">
                            <a class="text-black" href="' . route('product.detail', ['id' => $product->product_id]) . '">
                                <span class="fs-5 fw-bold">' . $product->product_name . '</span>
                                <p style="height: 75px;" class="p-0 m-0 overflow-hidden fs-6 col-lg-12 col-md-10 col-sm-8 col-8">
                                    ' . $product->product_detail . ' <span>...</span>
                                </p>
                                <div class="icon-book d-flex justify-content-between row">
                                    <div class="new__star p-3" >';
                    if (!empty($product->totalstar)) {
                        for ($i = 0; $i < floor($product->totalstar); $i++) {
                            $output .= '<i class="fa-solid fa-star"></i>';
                        }
                        if ($product->totalstar - floor($product->totalstar) != 0) {
                            $output .= '<i class="fa-regular fa-star-half-stroke"></i> ';
                        }
                        $output .= ' <span>' .  number_format($product->totalstar, 1) . '</span>';
                    } else {
                        $output .= '<i class="fa-solid fa-star"></i><span>0.0</span>';
                    }
                    $output .= '</div>
                            <div class="d-flex">
                                <div class="download-book col-lg-5 col-md-5 col-sm-5 col-4">';
                                if(session()->has('user')){
                                    $output .= '<a href="' . $product->product_file . '" download="' . $product->product_name . '.pdf"
                                                    style="padding: 10px;border-radius: 3px;font-size: 16px;border: none;background: #f8e559;color: #fff;width:100%;">
                                                                <i class="fa-solid fa-download"></i> Tải xuống
                                                                                                                </a> ';
                                } else {
                                    $output .= '<a href="' . route('signin.index') . '"
                                                style="padding: 10px;border-radius: 3px;font-size: 16px;border: none;background: #f8e559;color: #fff;width:100%;">
                                                <i class="fa-solid fa-download"></i> Tải xuống
                                            </a> ';
                                    }
                        $output .= '</div>
                                    <div class="date-book ">
                                        <span style="font-size: 15px;color: #a3a3a3;margin-right: 20px;"><i class="fa-regular fa-calendar"></i> ' . $product->created_at . '</span>
                                        <span style="font-size: 15px;color: #a3a3a3;margin-right: 20px;"><i class="fa-solid fa-eye"></i>' . $product->views . '</span>
                                     </div>
                                </div>
                            </div>
                            </a>
                        </div>
                </div>
            </div>
            <hr>';
                }
            } else {
                $output = '
                    <div class="alert alert-danger" role="alert">
                        No Data Found
                    </div>
                ';
            }
            Paginator::useBootstrap();
            $data = [
                'table_data'  => $output,
                'pagination' => $searchData->links()->toHtml(),
            ];
            return response()->json($data);
        }
    }
    

}
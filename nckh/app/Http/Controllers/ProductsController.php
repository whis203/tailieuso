<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\Auth;
use App\Models\Favorite;
use App\Models\User;
use App\Models\Comment;
use App\Models\CommentReply;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    // Import Storage facade

    public function create(Request $request)
    {
        $imageFileName = null; // Initialize image file name
        $pdfFileName = null; // Initialize PDF file name

        // Handle image upload
        if ($request->hasFile('product_img')) {
            $imageFileName = time() . '_' . $request->file('product_img')->getClientOriginalName();
            $request->file('product_img')->move(public_path('img'), $imageFileName);
        }

        // Handle PDF upload
        if ($request->hasFile('product_file')) {
            $pdfFileName = time() . '_' . $request->file('product_file')->getClientOriginalName();
            $request->file('product_file')->storeAs('public/pdf', $pdfFileName);
        }
        if (
            empty($request->product_name) ||
            empty($request->product_detail) ||
            empty($imageFileName) ||
            empty($pdfFileName) ||
            empty($request->category)
        ) {
            $data['error'] = 'Vui lòng nhập đủ thông tin';
            return redirect()->back()->with($data);
        }
        // Create a new record in the Products table
        $product = new Products();
        $product->product_name = $request->product_name;
        $product->product_detail = $request->product_detail;
        $product->user_id = Auth::id();
        $product->product_img = '/img/' . $imageFileName;
        $product->product_file = '/storage/pdf/' . $pdfFileName; // Set the PDF file path
        $product->category = $request->category;
        $product->save();
        // Redirect back to the product list page with a success message
        return redirect()->back()->with(['success' => 'Đăng ký sản phẩm thành công']);
    }
    public function showProduct($product_id)
    {
        $comments = Comment::where('product_id', $product_id)->get();
        // Lấy thông tin của sản phẩm từ cơ sở dữ liệu
        $product = Products::where('product_id', $product_id)->first();
        // Truyền dữ liệu sản phẩm vào view và hiển thị view
        $product = Products::findOrFail($product_id);
        // Lấy tổng số sao của tất cả các đánh giá của sản phẩm
        $totalStar = $product->comments->sum('rating');
        // Đếm số lượng đánh giá của sản phẩm
        $numberOfReviews = $product->comments->count();
        // Tính trung bình số sao
        $averageRating = $numberOfReviews > 0 ? $totalStar / $numberOfReviews : 0;
        Session::put('averageRating', $averageRating);
        if ($product) {
            // Tăng số lượt xem khi sản phẩm được xem
            $product->views += 1;
            $product->save();
        }
        return view('client.detail', compact('comments', 'product', 'averageRating'));
    }
    public function download($id)
    {
        $product = Products::find($id);
        if ($product) {
            // Tăng số lượt tải xuống khi sản phẩm được tải xuống
            $product->downloads += 1;
            $product->save();
            // Thực hiện tải xuống file sản phẩm
        }
    }
    public function addFavorite($product_id)
    {
        // Đảm bảo người dùng đã đăng nhập
        if (Auth::check()) {
            $user_id = Auth::id();
            // Kiểm tra xem sản phẩm đã được thêm vào danh sách yêu thích của người dùng chưa
            $existingFavorite = Favorite::where('user_id', $user_id)->where('product_id', $product_id)->first();

            if ($existingFavorite) {

                $data['error'] = 'Sản phẩm đã tồn tại';
                return back()->with($data);
            } else {
                Favorite::create([
                    'user_id' => $user_id,
                    'product_id' => $product_id,
                    'quantity' => 1
                ]);
            }
            // Đếm số lượng yêu thích và lưu vào session

            $favoriteCount = Favorite::where('user_id', $user_id)->sum('quantity');
            session()->put('favoriteCount', $favoriteCount);
            $data['success'] = 'Thêm sản phẩm vào danh sách yêu thích thành công';
            return redirect()->route('favorite.index')->with($data);
        } else {
            // Xử lý trường hợp người dùng chưa đăng nhập
            $data['error'] = 'Vui lòng đăng nhập để thêm sản phẩm vào danh sách yêu thích';
            return redirect()->route('signin.index')->with($data);
        }
    }
    public function removeFavorite($favorite_id)
    {
        // Tìm sản phẩm yêu thích cần xóa
        $favorite = Favorite::find($favorite_id);

        // Kiểm tra xem sản phẩm yêu thích có tồn tại không
        if (!$favorite) {
            // Xử lý trường hợp không tìm thấy sản phẩm yêu thích
            // Ví dụ: trả về một thông báo lỗi
            $data['error'] = 'Không có sản phẩm nào';
            return redirect()->route('favorite.index')->with($data);
        }

        // Giảm số lượng sản phẩm yêu thích nếu số lượng lớn hơn 1
        if ($favorite->quantity > 1) {
            $favorite->decrement('quantity');
        } else {
            // Nếu số lượng là 1 hoặc ít hơn, xóa sản phẩm yêu thích
            $favorite->delete();
        }
        // Cập nhật số lượng yêu thích trong session
        $user_id = Auth::id();
        $favoriteCount = Favorite::where('user_id', $user_id)->sum('quantity');
        session()->put('favoriteCount', $favoriteCount);
        $data['success'] = 'Xoá sản phẩm thành công';
        return redirect()->route('favorite.index')->with($data);
    }
    public function fileupload($user_id)
    {
        $user = Auth::id();
        $products = Products::where('user_id', $user)->get();
        if ($products->isEmpty()) {
            return view('client.product', compact('products'));
        } else {
            // Nếu có sản phẩm, bạn có thể truy cập và truyền dữ liệu vào view.
            return view('client.product', compact('products'));
        }
    }
    public function editProductId($id)
    {
        // Tìm sản phẩm cần sửa dựa trên id
        $product = Products::find($id);
        return view('client.product', compact('product'));
    }
    public function updateProductId(Request $request, $id)
    {
        // Tìm sản phẩm cần sửa dựa trên id
        $product = Products::find($id);

        // Kiểm tra xem sản phẩm có tồn tại không
        if (!$product) {
            // Nếu không tìm thấy sản phẩm, trả về 404 hoặc thông báo lỗi tùy ý
            abort(404);
        }
        // Kiểm tra xem có hình ảnh được tải lên không
        if ($request->hasFile('product_img')) {
            $fileName = time() . '_' . $request->file('product_img')->getClientOriginalName();
            $request->file('product_img')->move(public_path('img'), $fileName);
            $product->product_img = '/img/' . $fileName;
        }
        if ($request->hasFile('product_file')) {
            $pdfFileName = time() . '_' . $request->file('product_file')->getClientOriginalName();
            $request->file('product_file')->storeAs('public/pdf', $pdfFileName);
            $product->product_file = '/storage/pdf/' . $pdfFileName;
        }
        // Cập nhật các trường dữ liệu thông tin sản phẩm
        $product->product_name = $request->input('product_name');
        $product->product_detail = $request->input('product_detail');
        $product->category = $request->input('category');
        // Lưu thông tin sản phẩm
        $product->save();
        // Redirect về trang chỉnh sửa sản phẩm và kèm theo thông báo thành công
        return redirect()->back()->with('success', 'Cập nhật sản phẩm thành công');
    }
    public function deleteProductId($id)
    {
        // Tìm sản phẩm cần xoá dựa trên id
        $product = Products::find($id);

        // Kiểm tra xem sản phẩm có tồn tại không
        if (!$product) {
            $data['error'] = 'Sản phẩm không tồn tại';
            return redirect()->back()->with($data);
        }

        // Xoá sản phẩm
        $product->delete();

        // Redirect về route 'product.upload' và kèm theo thông báo thành công
        $data['success'] = 'Xoá sản phẩm thành công';
        return redirect()->back()->with($data);
    }
    public function edit($id)
    {
        $comment = Comment::findOrFail($id);
        // Kiểm tra xem người dùng có quyền chỉnh sửa bình luận này không, nếu không thì chuyển hướng hoặc hiển thị thông báo lỗi
        return view('client.detail', compact('comments'));
    }
    public function storeReply(Request $request)
    {
        $request->validate([
            'comment_id' => 'required',
            'content' => 'required',
        ]);

        $reply = new CommentReply([
            'comment_id' => $request->input('comment_id'),
            'user_id' => auth()->id(),
            'content' => $request->input('content'),
        ]);
        $reply->save();
        return redirect()->back()->with('success', 'Trả lời bình luận đã được thêm.');
    }
    public function updateReply(Request $request, $id)
    {
        $request->validate([
            'content' => 'required',
        ]);
        $CommentReply = CommentReply::findOrFail($id);
        // Kiểm tra xem người dùng có quyền chỉnh sửa bình luận này không, nếu không thì chuyển hướng hoặc hiển thị thông báo lỗi

        $CommentReply->content = $request->input('content');
        $CommentReply->save();

        return redirect()->back()->with('success', 'Bình luận đã được cập nhật.');
    }
    // CommentController.php

    public function destroyReply($id)
    {
        $CommentReply = CommentReply::findOrFail($id);
        // Kiểm tra xem người dùng có quyền xóa bình luận này không, nếu không thì chuyển hướng hoặc hiển thị thông báo lỗi
        $CommentReply->delete();

        return redirect()->back()->with('success', 'Bình luận đã được xóa thành công.');
    }
}

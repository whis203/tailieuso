@extends('layouts.index')

@section('title', 'Chi tiết tài liệu')

@section('content')
<section>
    <div class="container bg-white mb-3" style="margin-top: 100px; min-height: 500px;border:1px solid rgb(241, 241, 241);">
        <div class="py-3">
            @if (Session::has('success'))
            <div class="alert alert-success fs-6 " role="alert">
                {{ Session::get('success') }}
            </div>
            @elseif (Session::has('error'))
            <div class="alert alert-danger fs-6 " role="alert">
                {{ Session::get('error') }}
            </div>
            @endif
        </div>
        <div class="container container-product position-relative py-5 d-flex justify-content-between align-items-center gap-5">

            <div class="img-product d-flex flex-column justify-content-center align-items-center col-xl-6 col-lg-6 col-sm-4 col-12">
                <span>Tổng số đánh giá {{ number_format($averageRating, 1) }}<i class="fa-solid fa-star text-danger"></i></span>
                <img style="width: 500px;height: auto;" class="shadow m-3 bg-body rounded-3" src="{{ $product->product_img }}" alt="">
                <div class="download">
                    <a href="{{ $product->product_file }}" download="{{ $product->product_name }}.pdf" class="fw-bold ">Download ngay!</a>
                </div>
            </div>
            <div class="info-product">
                <div class="title" style="color: #717cb6;">
                    <h3 class="fw-bold fs-2">Giáo trình</h3>
                    <span class="fs-3  ">"{{ $product->product_name }}"</span>
                </div>
                <hr>
                <div class="about col-xl-12 col-lg-12 col-sm-12 col-12">
                    <p class="fs-5 ">
                        {{ $product->product_detail }}
                    </p>
                    <div class="read-book">
                        <a href="{{ $product->product_file}}" class="text-warning  ">Click để đọc sách</a>
                    </div>
                </div>
            </div>
            <div class="favorite d-flex position-absolute top-0 end-0 px-5 ">
                <a href="{{ route('product.addFavorite', ['id' => $product->product_id]) }}"><i class="fa-solid fa-heart fs-6 me-1 text-danger "></i><span class="fs-6 ">
                        Yêu thích</span></a>
            </div>
        </div>
    </div>
    @if (Auth::check())
    <div class="container bg-white" style="border:1px solid rgb(241, 241, 241);">
        <div class="row mt-5">

            <form action="{{route('comments.store')}}" method="post">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                <div class="col-12 p-5">
                    <div class="comment-box ml-2">
                        <p class="fs-4 text-black-50 text-center  ">Đánh giá</p>
                        <div class="rating">
                            <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                            <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                            <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                            <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                            <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                            <input class="rating-value" type="hidden" name="rating" value="{{ $product->product_id }}">
                        </div>
                        <script>
                            // JavaScript để xử lý việc chọn sao
                            document.addEventListener("DOMContentLoaded", function() {
                                const stars = document.querySelectorAll('.rating input[type="radio"]');
                                const ratingValue = document.querySelector('.rating-value');
                                stars.forEach(star => {
                                    star.addEventListener('change', function() {
                                        ratingValue.value = this.value;
                                    });
                                });
                            });
                        </script>
                        <div class="comment-area d-flex ">
                            @if (session()->has('user') && session('user')['img'])
                            <img class=" rounded-circle mt-2 object-fit-cover me-2" src="{{ session('user')['img'] }}" width="50" height="50" class="">
                            @else
                            <img class="rounded-circle mt-2 object-fit-cover me-2" width="50" height="50" src="../img/flat-business-man-user-profile-avatar-icon-vector-4333097.jpg" alt="">
                            @endif
                            <textarea name="content" class="form-control" placeholder="Viết bình luận..." rows="3"></textarea>
                        </div>
                        <div class="comment-btns ">
                            <div class="row">
                                <div class="col-6 ">
                                    <div class="pull-right ">
                                        <button class="mx-5 mt-3 btn btn-success send btn-sm">Gửi đi<i class="fa fa-long-arrow-right ml-1"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @else
    <div class="container bg-white" style="border:1px solid rgb(241, 241, 241);">
        <div class="row mt-2 ">
            <div class="col-12">
                <div class="comment-box p-5">
                    <p class="fs-6 text-black-50 ">Đánh giá</p>
                    <div class="rating">
                        <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                        <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                        <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                        <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                        <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                        <input class="rating-value" type="hidden" name="rating" value="{{ $product->product_id }}">
                        <script>
                            // JavaScript để xử lý việc chọn sao
                            document.addEventListener("DOMContentLoaded", function() {
                                const stars = document.querySelectorAll('.rating input[type="radio"]');
                                const ratingValue = document.querySelector('.rating-value');
                                stars.forEach(star => {
                                    star.addEventListener('change', function() {
                                        ratingValue.value = this.value;
                                    });
                                });
                            });
                        </script>
                    </div>
                    <div class="comment-area">
                        <textarea name="content" class="form-control" placeholder="Bạn cần đăng nhập để bình luận" rows="4" disabled></textarea>
                    </div>
                    <div class="comment-btns mt-2">
                        <div class="row">
                            <div class="col-6">
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-success send btn-sm">Gửi đi<i class="fa fa-long-arrow-right ml-1"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <div class="container bg-white my-3 " style=" border:1px solid rgb(241, 241, 241);">
        <div class="row my-3 ">
            <div class="col-md-12">
                <div class="blog-comment">
                    <p class="fs-6 text-black-50">Tất Cả Bình luận</p>
                    <br>
                    <hr>
                    @if(isset($comments) && is_iterable($comments))
                    <ul class="comments col-12">
                        @foreach($comments as $comment)
                        <li class="clearfix">
                            <img src="{{$comment->user->img}}" class="avatar" alt="">
                            <div class="post-comments col-12">
                                <p class="text-danger fs-6" for="1">@for ($i = 0; $i < $comment->rating; $i++)
                                        <i class="fa-solid fa-star text-danger"></i>
                                        @endfor</p>
                                <p class="meta"> {{$comment->created_at}} <a href="#">{{$comment->user->name}}</a> <i class="pull-right"></i></p>
                                <p class="fs-6">
                                    {{$comment->content}}
                                </p>
                                @if ($comment->user_id !== auth()->id())
                                <div class="d-flex justify-content-end gap-3 fs-6 fst-italic ">
                                    <a href="{{ route('comments.edit', $comment->id) }}" data-toggle="modal" data-target="#exampleModaly{{$comment->id}}">
                                        Trả lời
                                    </a>
                                </div>
                                @else
                                <div class="d-flex justify-content-end gap-3 fs-6 fst-italic ">
                                    <a href="{{ route('comments.edit', $comment->id) }}" data-toggle="modal" data-target="#exampleModalx{{$comment->id}}">
                                        Sửa
                                    </a>
                                    <a href="#" type="button" data-toggle="modal" data-target="#exampleModal{{$comment->id}}">
                                        Xoá
                                    </a>
                                </div>
                                @endif
                            </div>
                            <ul class="comments col-11">
                                @foreach($comment->replies as $reply)
                                <li class="clearfix">
                                    <img src="{{$reply->user->img}}" class="avatar" alt="">
                                    <div class="post-comments">
                                        <p class="meta"> {{ $reply->created_at }}<a href="#"> {{ $reply->user->name }}</a> trả lời : {{$comment->user->name}} <i class="pull-right"></i></p>
                                        <p class="fs-6">
                                            {{ $reply->content }}
                                        </p>
                                        @if ($reply->user_id !== auth()->id())
                                        <div class="d-flex justify-content-end gap-3 fs-6 fst-italic ">

                                        </div>
                                        @else
                                        <div class="d-flex justify-content-end gap-3 fs-6 fst-italic ">
                                            <a href="{{ route('commentsReply.edit', $reply->id) }}" data-toggle="modal" data-target="#exampleModalb{{$reply->id}}">
                                                Sửa
                                            </a>
                                            <a href="#" type="button" data-toggle="modal" data-target="#exampleModalc{{$reply->id}}">
                                                Xoá
                                            </a>
                                        </div>
                                        @endif
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Modal delete-->
    @foreach($comments as $comment)
    <div class="modal fade" id="exampleModal{{$comment->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Xoá tài liệu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Bạn có chắc chắn muốn xóa không?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">Huỷ</span>
                    </button>
                    <a href="{{ route('comments.destroy', $comment->id) }}" class="btn btn-danger">Xóa</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal reply cmt-->
    <div class="modal fade" id="exampleModaly{{$comment->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Trả lời bình luận</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('comment.reply.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                        <div class="form-group">
                            <textarea name="content" class="form-control" placeholder="Nhập nội dung của bạn"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Gửi Trả lời</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- Modal edit-->
    <div class="modal fade" id="exampleModalx{{$comment->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sửa bình luận</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('comments.update', $comment->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mt-2 ">
                            <div class="col-12">
                                <div class="comment-box p-5">
                                    <p class="fs-6 text-black-50 ">Đánh giá</p>

                                    <div class="comment-area">
                                        <textarea name="content" class="form-control" rows="4">{{$comment->content}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer fs-5">
                            <button type="submit" name="submit" for="myFileInput" class="file-input-label d-block p-2 text-white text-center pe-auto rounded-4 border-0 w-100 " style="background-color: #AAD9BB;"><i class="fa-solid fa-cloud-arrow-up"></i> Cập nhật</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @foreach($comment->replies as $reply)
    <!-- Modal reply cmt reply-->
    <div class="modal fade" id="exampleModala{{$reply->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Trả lời bình luận</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('comment.reply.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                        <div class="form-group">
                            <textarea name="content" class="form-control" placeholder="Nhập nội dung của bạn"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Gửi Trả lời</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- modal reply delete -->
    <div class="modal fade" id="exampleModalc{{$reply->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Xoá tài liệu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Bạn có chắc chắn muốn xóa không?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">Huỷ</span>
                    </button>
                    <a href="{{ route('commentsReply.destroy', $reply->id) }}" class="btn btn-danger">Xóa</a>
                </div>
            </div>
        </div>
    </div>
    <!-- modal reply edit -->
    <div class="modal fade" id="exampleModalb{{$reply->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sửa bình luận</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('commentsReply.update', $reply->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mt-2 ">
                            <div class="col-12">
                                <div class="comment-box p-5">
                                    <p class="fs-6 text-black-50 ">Đánh giá</p>
                                    <div class="rating">
                                        <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                                        <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                                        <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                                        <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                                        <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                                    </div>
                                    <div class="comment-area">
                                        <textarea name="content" class="form-control" rows="4">{{$reply->content}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer fs-5">
                            <button type="submit" name="submit" for="myFileInput" class="file-input-label d-block p-2 text-white text-center pe-auto rounded-4 border-0 w-100 " style="background-color: #AAD9BB;"><i class="fa-solid fa-cloud-arrow-up"></i> Cập nhật</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @endforeach
    </div>
</section>
<style>
    .comment-box {

        padding: 5px;
    }

    .comment-area textarea {
        resize: none;
        border: 1px solid rgb(250, 250, 250);
        background-color: rgb(246, 246, 246);
        border-radius: 20px;
        padding: 20px;
    }

    .form-control:focus {
        color: #495057;
        background-color: #fff;
        border-color: #ffffff;
        outline: 0;
        box-shadow: 0 0 0 1px #717cb6 !important;
    }

    .rating {
        display: flex;
        margin-top: -10px;
        flex-direction: row-reverse;
        margin-left: -4px;
        justify-content: center;
        gap: 2rem;

    }

    .rating>input {
        display: none;

    }

    .rating>label {
        position: relative;
        width: 19px;
        font-size: 40px;
        color: #ff0000;
        cursor: pointer;

    }

    .rating>label::before {
        content: "\2605";
        position: absolute;
        opacity: 0;


    }

    .rating>label:hover:before,
    .rating>label:hover~label:before {
        opacity: 1 !important
    }

    .rating>input:checked~label:before {
        opacity: 1
    }

    .rating:hover>input:checked~label:before {
        opacity: 0.4
    }




    a {
        color: #82b440;
        text-decoration: none;
    }

    .blog-comment::before,
    .blog-comment::after,
    .blog-comment-form::before,
    .blog-comment-form::after {
        content: "";
        display: table;
        clear: both;
    }

    .blog-comment {
        padding-left: 15%;
        padding-right: 15%;
    }

    .blog-comment ul {
        list-style-type: none;
        padding: 0;
    }

    .blog-comment img {
        opacity: 1;
        filter: Alpha(opacity=100);
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        -o-border-radius: 4px;
        border-radius: 4px;
    }

    .blog-comment img.avatar {
        position: relative;
        float: left;
        margin-left: 0;
        margin-top: 0;
        width: 45px;
        height: 45px;
    }

    .blog-comment .post-comments {
        border: 1px solid #eee;
        margin-bottom: 20px;
        margin-left: 66px;
        margin-right: 0px;
        padding: 10px 20px;
        position: relative;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        -o-border-radius: 4px;
        border-radius: 4px;
        background: #fff;
        color: #6b6e80;
        position: relative;
    }

    .blog-comment .meta {
        font-size: 13px;
        color: #aaaaaa;
        padding-bottom: 8px;
        margin-bottom: 10px !important;
        border-bottom: 1px solid #eee;
    }

    .blog-comment ul.comments ul {
        list-style-type: none;
        padding: 0;
        margin-left: 85px;
    }

    .blog-comment-form {
        padding-left: 15%;
        padding-right: 15%;
        padding-top: 40px;
    }

    .blog-comment h3,
    .blog-comment-form h3 {
        margin-bottom: 40px;
        font-size: 26px;
        line-height: 30px;
        font-weight: 800;
    }
</style>
@endsection
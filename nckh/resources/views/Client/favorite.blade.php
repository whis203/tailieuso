@extends('layouts.index')

@section('title', 'Yêu thích')

@section('content')

<section class="container" style="margin-top: 100px; min-height: 500px;">
    <div class="menu-user row">
        @if (Session::has('success'))
        <div class="alert alert-success fs-6" role="alert">
            {{ Session::get('success') }}
        </div>
        @elseif (Session::has('error'))
        <div class="alert alert-danger fs-6 " role="alert">
            {{ Session::get('error') }}
        </div>
        @endif
        @if (session()->has('user'))
        <div class="user col-xl-3 col-lg-4 col-sm-12">
            <div class="name d-flex ">
                @if(session()->has('user') && session('user')['img'])
                <img class="object-fit-cover" style="width: 100px;height: 100px;border-radius: 50%;" src="{{ session('user')['img'] }}" alt="">
                @else
                <img class="object-fit-cover" style="width: 100px;height: 100px;border-radius: 50%;" src="../img/flat-business-man-user-profile-avatar-icon-vector-4333097.jpg" alt="">
                @endif
                <div class="seting d-flex flex-column   ">
                    <span class="fw-bold fs-6">{{ session('user')['name'] }}</span>

                    <div class="changePassword mx-2">
                        <button type="button" class="btn p-0 m-0" data-toggle="modal" data-target="#exampleModalv">
                            Đổi mật khẩu
                        </button>
                        <div class="modal fade" id="exampleModalv" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">

                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Đổi mật khẩu</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('changePassword') }}" method="post" enctype="multipart/form-data" class="w-75 mx-auto ">
                                            @csrf
                                            <div class="form-group  fs-6 ">
                                                <label for="inputEmail4 ">Mật khẩu cũ</label>
                                                <input name="old_password" type="password" class="form-control" id="inputEmail4" placeholder="...">
                                            </div>
                                            <div class="form-group  fs-6 ">
                                                <label for="inputPassword4">Mật khẩu mới</label>
                                                <input name="new_password" type="password" class="form-control" id="inputPassword4" placeholder="..."></input>
                                            </div>
                                            <div class="form-group  fs-6 ">
                                                <label for="inputPassword4">Nhập lại mật khẩu mới</label>
                                                <input name="again_new_password" type="password" class="form-control" id="inputPassword4" placeholder="..."></input>
                                            </div>
                                            <div class="modal-footer fs-5">
                                                <button type="submit" name="submit" for="myFileInput" class="file-input-label d-block p-2 text-white text-center pe-auto rounded-4 border-0 w-100 " style="background-color: #AAD9BB;"><i class="fa-solid fa-rotate"></i> Đổi mật khẩu</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="d-flex flex-column">
                <div class="infomation">
                    <a class="text-black text-decoration-none" href="{{ route('info.index') }}"><i class="fa-solid fa-pen fs-6 text-black-50"></i> <span class="fs-6 "> Hồ sơ của bạn</span></a>
                </div>
                <div class="favorite">
                    <a class="text-black text-decoration-none" href="{{ route('favorite.index') }}"><i class="fa-solid fa-heart fs-6 me-1 text-danger "></i><span class="fs-6 ">
                            Yêu thích</span></a>
                </div>
                @if(session()->has('user') && session('user')['role'] == 'teacher')
                <div class="addProducts ">
                    <button type="button" class="btn p-0 m-0" data-toggle="modal" data-target="#exampleModal1">
                        <i class="fa-solid fa-cloud-arrow-up fs-6 text-primary"></i> Tải tài liệu
                    </button>
                    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">

                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Thêm tài liệu</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('product.create') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group  fs-6 ">
                                            <label for="inputEmail4 ">Tên tài liệu</label>
                                            <input name="product_name" type="text" class="form-control" id="inputEmail4" placeholder="Tên tài liệu">
                                        </div>
                                        <div class="form-group  fs-6 ">
                                            <label for="inputPassword4">Giới thiệu</label>
                                            <textarea name="product_detail" type="text" class="form-control" style="height: 300px;" id="inputPassword4" placeholder="Giới thiệu"></textarea>
                                        </div>
                                        <div class="form-group fs-6 overflow-hidden">
                                            <label class="text-start " for="inputAddress">Ảnh tài liệu:</label>
                                            <br>
                                            <div class="text-center ">
                                                <img style="width: 200px; margin: 0 auto;" id="previewImage" src="../img/mysach.jpg" alt="">
                                                <br>
                                                <input type="file" name="product_img" id="myFileInput" class="py-3" onchange="previewFile(this)" />
                                            </div>
                                        </div>
                                        <div class="form-group  fs-6 ">
                                            <label for="inputPassword4">File tài liệu (PDF)</label> <br>
                                            <input type="file" name="product_file" id="myFileInput" class="py-3" />
                                        </div>
                                        <div class="form-group  fs-6 ">
                                                <label for="inputEmail4 ">Tác giả</label>
                                                <input name="tacgia" type="text" class="form-control" id="inputEmail4"
                                                    placeholder="Tên tác giả">
                                            </div>
                                     
                                            <div class="form-group  fs-6 ">
                                                <label for="inputEmail4 ">Thể loại</label>
                                                <input name="category" type="text" class="form-control" id="inputEmail4"
                                                    placeholder="Tên tài liệu">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputAddress">Mã học phần</label>
                                                <select id="mahp_select" name="mahp" id="inputState"
                                                    class="form-control">
                                                    <option selected>Chọn học phần</option>
                                                    @foreach ($education as $edu)
                                                    <option value="{{$edu->mahp}}" data-tenhp="{{$edu->tenhp}}">
                                                        {{$edu->mahp}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        <div class="modal-footer fs-5">
                                            <button type="submit" name="submit" for="myFileInput" class="file-input-label d-block p-2 text-white text-center pe-auto rounded-4 border-0 w-100 " style="background-color: #AAD9BB;"><i class="fa-solid fa-cloud-arrow-up"></i> Tải lên</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="showProductsUpload">
                    <a class="text-black text-decoration-none" href="{{ route('product.upload',  ['id' => Auth::id()]) }}">
                        <i class="fa-solid fa-folder-open fs-6 text-success"></i>
                        <span class="fs-6">Tài liệu đăng tải</span>
                    </a>
                </div>
                @else
                <div></div>
                @endif
            </div>
        </div>
        <div class="info col-xl-9 col-lg-8 col-sm-12">
            <div class="title fs-6 mb-2 row border rounded p-3 bg-white  ">
                <span class="fw-bold ">Hồ Sơ Của Tôi</span>
                <p>Quản lý thông tin hồ sơ</p>
            </div>
            @if(count($favorites) > 0)
            <div class="row bg-white border rounded p-5 mb-5">
                <section class="books " style="padding-top: 50px;">
                    <p>Danh sách yêu thích của bạn</p>
                    <div class="mySwiper swiper">
                        <div class="swiper-wrapper " style="max-width: 350px;">
                            @foreach($favorites as $favorite)
                            <div class="swiper-slide col-xl-3 col-lg-6 col-sm-6 col-12 position-relative " style="height: 290px;">
                                <a class="text-black" href="{{ route('product.detail', ['id' => $favorite->product->product_id]) }}">
                                    <img src="{{ $favorite->product->product_img }}" alt="" />
                                    <div class="text-book d-flex flex-column justify-content-center align-items-center ">
                                        <h2 class="new__title pt-2 fs-6 text-center">{{ $favorite->product->product_name }}</h2>
                                        <div class="new__star d-flex justify-content-center align-items-center ">
                                            @if(!empty($favorite->product->totalstar))
                                            @for ($i = 0; $i < floor($favorite->product->totalstar); $i++)
                                                <i class="fa-solid fa-star"></i>
                                                @endfor
                                                @if ($favorite->product->totalstar - floor($favorite->product->totalstar) != 0)
                                                <i class="fa-regular fa-star-half-stroke"></i>
                                                @endif
                                                <SPAN>{{ number_format($favorite->product->totalstar, 1) }}</SPAN>
                                                @else
                                                <i class="fa-solid fa-star mx-1"></i>
                                                <SPAN> 0.0</SPAN>
                                                @endif
                                        </div>
                                </a>
                                <div class="deleteProduct ">
                                    <button type="button" class="btn rounded-circle btn-sm position-absolute top-0 end-0 bg-danger" style="color: white;" data-toggle="modal" data-target="#exampleModalz{{$favorite->id}}">
                                        <i class="fa-solid fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
            </div>
        </div>
</section>
@foreach($favorites as $favorite)
<div class="modal fade" id="exampleModalz{{$favorite->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Xoá tài liệu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body fs-6">
                Bạn có chắc chắn muốn xóa không?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                <a href="{{ route('product.deleteFavorite', ['id' => $favorite->id]) }}" class="btn btn-danger">Xóa</a>
            </div>
        </div>
    </div>
</div>
@endforeach

@else
<div class="row bg-white border rounded p-5 mb-5" style="height: 402px;">
    <section class="books" style="padding-top: 50px;">
        <div class="mySwiper swiper">
            <div class="swiper-wrapper">
                <h3>Không có sản phẩm yêu thích nào</h3>
            </div>
        </div>
    </section>
</div>
@endif
@endif
</section>
@endsection
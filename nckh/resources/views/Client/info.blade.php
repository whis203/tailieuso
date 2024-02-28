@extends('layouts.index')

@section('title', 'Thông tin người dùng')

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
                                            <label for="inputEmail4 ">Thể loại</label>
                                            <input name="category" type="text" class="form-control" id="inputEmail4" placeholder="Tên tài liệu">
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
            <div class="title fs-6 mb-2 row border rounded p-3 bg-white ">
                <span class="fw-bold ">Hồ Sơ Của Tôi</span>
                <p>Quản lý thông tin hồ sơ</p>
            </div>
            <div class="row justify-content-between bg-white border rounded p-5 mb-5">
                <form class="d-flex " action="{{ route('info.updateInfo') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="row">
                        <div class="modal-body col-xl-8 col-lg-7 col-10">
                            <div class="form-row">
                                <div class="form-group col-md-6 fs-6 position-relative">
                                    <label for="inputEmail4">Họ và tên:</label>
                                    <div class="input-group">
                                        <input name="name" type="text" class="form-control" id="nameInput" placeholder="Họ và tên" value="{{ session('user')['name'] }}">
                                        <span class="input-group-append">
                                            <span class="input-group-text" onclick="focusOnInput()">
                                                <i class="fas fa-pen"></i>
                                            </span>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 fs-6 position-relative">
                                    <label for="inputEmail4">Số điện thoại:</label>
                                    <div class="input-group">
                                        <input name="phone" type="text" class="form-control" id="nameInput" placeholder="Số điện thoại" value="{{ session('user')['phone'] }}">
                                        <span class="input-group-append">
                                            <span class="input-group-text" onclick="focusOnInput()">
                                                <i class="fas fa-pen"></i>
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group fs-6 position-relative">
                                <label for="inputEmail4">Email:</label>
                                <div class="input-group">
                                    <input name="email" type="text" class="form-control" id="nameInput" placeholder="Email" value="{{ session('user')['email'] }}">
                                    <span class="input-group-append">
                                        <span class="input-group-text" onclick="focusOnInput()">
                                            <i class="fas fa-pen"></i>
                                        </span>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group fs-6 ">
                                <label for="inputAddress">Giới tính:</label> <br>
                                <input type="radio" id="nam" name="gender" value="0" {{ session('user')['gender'] == 0 ? 'checked' : '' }}>
                                <label for="nam">Nam</label>
                                <input type="radio" id="nu" name="gender" value="1" {{ session('user')['gender'] == 1 ? 'checked' : '' }}>
                                <label for="nu">Nữ</label><br>
                            </div>
                            <div class="form-group fs-6">
                                <label for="inputAddress">Chọn ảnh:</label> <br>
                                <input style="background-color: white;border: 1px solid #ced4da;border-radius: 5px;
                                padding: 8px 0px;" type="file" name="img" id="myFileInput" />
                            </div>
                        </div>
                        <div class="img p-4 row col-xl-4 col-lg-6 col-10">
                            @if(session()->has('user') && session('user')['img'])
                            <div class="image-container">
                                <img class="rounded-circle object-fit-cover " style="width: 200px; height: 200px;" src="{{ session('user')['img'] }}">
                            </div>
                            @else
                            <div class="image-container position-relative" style="width: 200px; height: 200px; background-color: #333;">
                                <i class="fa-solid fa-camera position-absolute top-50 start-50 translate-middle" style=" color: rgba(255, 255, 255, 0.5);"></i>
                            </div>
                            @endif
                            <div class="modal-footer pt-5">
                                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-cloud-arrow-up"></i> Lưu thông tin</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    @endif
</section>
@endsection
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" type="x-icon" href="./img/book.png">
    </link>
    <title>Danh sách đăng tải</title>
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">

    <!--=============== REMIXICONS ===============-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css">
    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
    <script src="https://unpkg.com/scrollreveal"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/style.css" />
</head>

<body>
    <div class="container-loader">
        <div class="loader"></div>
    </div>
    <header class="header-area overlay">
        <nav class="navbar navbar-expand-md navbar-dark   " style="background: #717cb6;">
            <div class="container-fluid ">
                <a href="{{ route('home')}}"
                    class="navbar-brand d-flex align-content-center justify-content-center ps-5">
                    Tài Liệu
                    <span style="color: #fbeaad">Số</span></a>
                <button type="button" class="navbar-toggler collapsed text-white " data-toggle="collapse"
                    data-target="#main-nav">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <div id="main-nav" class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto fw-bold d-flex align-items-center  ">
                        <li>
                            <a href="{{ route('home') }}" class="nav-item nav-link fs-6">TRANG CHỦ</a>
                        </li>
                        <li>
                            <a href="{{ route('document.index') }}" class="nav-item nav-link fs-6">TÀI LIỆU</a>
                        </li>
                        <li class="container-edu position-relative">

                            <a href="{{ route('education.select', ['mahp' => 'INF5200TD']) }}"
                                class="nav-item nav-link fs-6 ">HỌC
                                PHẦN <i class="fa-solid fa-chevron-down m-1" style="font-size: 12px;"></i></a>
                            <div class="container-list-edu bg-white position-absolute"
                                style="height: auto; left: -750px; width: auto;">
                                <table class="table col">
                                    <tbody>
                                        @php $counter = 0 @endphp
                                        @foreach ($education as $edu)
                                        @if ($counter % 8 == 0)
                                        <tr>
                                            @endif
                                            <td><a class="text-black-50  text-star m-3" style="text-decoration: none;"
                                                    href="{{ route('education.select', ['mahp' => $edu->mahp]) }}">{{ $edu->mahp }}</a>
                                            </td>
                                            @php $counter++ @endphp
                                            @if ($counter % 8 == 0)
                                        </tr>
                                        @endif
                                        @endforeach
                                        @if ($counter % 8 != 0)
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>

                        </li>
                        <li>
                            <a href="{{ route('home') }}#newbook" class="nav-item nav-link fs-6">SÁCH MỚI</a>
                        </li>
                        <div class="logIn ps-5 d-flex justify-content-center align-items-center">
                            <a href="{{ route('favorite.index') }}" class="favorite-icon"
                                style=" font-size: 22px; color: white;"><i class="fa-solid fa-heart"></i>
                                <div class="count">{{ session('favoriteCount', 0) }}</div>
                            </a>
                            @if (!Auth::check())
                            <a href="{{ route('signin.index') }}"
                                style="font-size: 22px; color: white; padding: 10px; margin-right: 50px;">
                                <i class="fa-solid fa-user"></i>
                            </a>
                            @else
                            <div class="dropdown">
                                <a href="#" style="font-size: 22px; color: white; padding: 10px; margin-right: 50px;"
                                    class="dropdown-toggle" id="userDropdown" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    @if (session()->has('user') && session('user')['img'])
                                    <img class="object-fit-cover" style="width: 50px; height: 50px;border-radius: 50%;"
                                        src="{{ session('user')['img'] }}" alt="">
                                    @else
                                    <img class="object-fit-cover" style="width: 50px; height: 50px;border-radius: 50%;"
                                        src="../img/flat-business-man-user-profile-avatar-icon-vector-4333097.jpg"
                                        alt="">
                                    @endif
                                </a>
                                <div class="dropdown-menu my-4  " aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="{{ route('info.index') }}">Xem thông tin</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}">Đăng xuất</a>
                                </div>
                            </div>
                            @endif
                        </div>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    @section('content')
    <section class="container" style="margin-top: 100px; min-height: 500px;">
        <div class="menu-user row">
            @if (Session::has('success'))
            <div class="alert alert-success fs-6" role="alert">
                {{ Session::get('success') }}
            </div>
            @elseif (Session::has('error'))
            <div class="alert alert-danger fs-6" role="alert">
                {{ Session::get('error') }}
            </div>
            @endif
            @if (session()->has('user'))
            <div class="user col-xl-3 col-lg-4 col-sm-12">
                <div class="name d-flex ">
                    @if(session()->has('user') && session('user')['img'])
                    <img class="object-fit-cover" style="width: 100px;height: 100px;border-radius: 50%;"
                        src="{{ session('user')['img'] }}" alt="">
                    @else
                    <img class="object-fit-cover" style="width: 100px;height: 100px;border-radius: 50%;"
                        src="../img/flat-business-man-user-profile-avatar-icon-vector-4333097.jpg" alt="">
                    @endif
                    <div class="seting d-flex flex-column   ">
                        <span class="fw-bold fs-6">{{ session('user')['name'] }}</span>

                        <div class="changePassword mx-2">
                            <button type="button" class="btn p-0 m-0" data-toggle="modal" data-target="#exampleModalv">
                                Đổi mật khẩu
                            </button>
                            <div class="modal fade" id="exampleModalv" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Đổi mật khẩu</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('changePassword') }}" method="post"
                                                enctype="multipart/form-data" class="w-75 mx-auto ">
                                                @csrf
                                                <div class="form-group  fs-6 ">
                                                    <label for="inputEmail4 ">Mật khẩu cũ</label>
                                                    <input name="old_password" type="password" class="form-control"
                                                        id="inputEmail4" placeholder="...">
                                                </div>
                                                <div class="form-group  fs-6 ">
                                                    <label for="inputPassword4">Mật khẩu mới</label>
                                                    <input name="new_password" type="password" class="form-control"
                                                        id="inputPassword4" placeholder="..."></input>
                                                </div>
                                                <div class="form-group  fs-6 ">
                                                    <label for="inputPassword4">Nhập lại mật khẩu mới</label>
                                                    <input name="again_new_password" type="password"
                                                        class="form-control" id="inputPassword4"
                                                        placeholder="..."></input>
                                                </div>
                                                <div class="modal-footer fs-5">
                                                    <button type="submit" name="submit" for="myFileInput"
                                                        class="file-input-label d-block p-2 text-white text-center pe-auto rounded-4 border-0 w-100 "
                                                        style="background-color: #AAD9BB;"><i
                                                            class="fa-solid fa-rotate"></i> Đổi mật khẩu</button>
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
                        <a class="text-black text-decoration-none" href="{{ route('info.index') }}"><i
                                class="fa-solid fa-pen fs-6 text-black-50"></i><span class="fs-6 "> Hồ sơ của
                                bạn</span></a>
                    </div>
                    <div class="favorite ">
                        <a class="text-black text-decoration-none" href="{{ route('favorite.index') }}"><i
                                class="fa-solid fa-heart fs-6 me-1 text-danger "></i><span class="fs-6 ">Yêu
                                thích</span></a>
                    </div>
                    @if(session()->has('user') && session('user')['role'] == 'teacher')
                    <div class="addProducts ">
                        <button type="button" class="btn p-0 m-0" data-toggle="modal" data-target="#exampleModal1">
                            <i class="fa-solid fa-cloud-arrow-up fs-6 text-primary"></i> Tải tài liệu
                        </button>
                        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Thêm tài liệu</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('product.create') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group  fs-6 ">
                                                <label for="inputEmail4 ">Tên tài liệu</label>
                                                <input name="product_name" type="text" class="form-control"
                                                    id="inputEmail4" placeholder="Tên tài liệu">
                                            </div>
                                            <div class="form-group  fs-6 ">
                                                <label for="inputPassword4">Giới thiệu</label>
                                                <textarea name="product_detail" type="text" class="form-control"
                                                    style="height: 300px;" id="inputPassword4"
                                                    placeholder="Giới thiệu"></textarea>
                                            </div>
                                            <div class="form-group fs-6 overflow-hidden">
                                                <label class="text-start " for="inputAddress">Ảnh tài liệu:</label>
                                                <br>
                                                <div class="text-center ">
                                                    <img style="width: 200px; margin: 0 auto;" id="previewImage"
                                                        src="../img/mysach.jpg" alt="">
                                                    <br>
                                                    <input type="file" name="product_img" id="myFileInput" class="py-3"
                                                        onchange="previewFile(this)" />
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
                                            <div class="form-group fs-6 ">
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
                                                <button type="submit" name="submit" for="myFileInput"
                                                    class="file-input-label d-block p-2 text-white text-center pe-auto rounded-4 border-0 w-100 "
                                                    style="background-color: #AAD9BB;"><i
                                                        class="fa-solid fa-cloud-arrow-up"></i> Tải lên</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="showProductsUpload">
                        <a class="text-black text-decoration-none"
                            href="{{ route('product.upload',['id' => Auth::id()]) }}">
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
                <div class="title fs-6 mb-2 row border rounded p-3 bg-white">
                    <span class="fw-bold">Hồ Sơ Của Tôi</span>
                    <p>Quản lý thông tin hồ sơ</p>
                </div>
                @if(isset($products) && count($products) > 0)
                <div class="row bg-white border rounded p-5 mb-5">
                    <div class="books" style="padding-top: 50px;">
                        <p>Danh sách sản phẩm đã đăng</p>
                        <div class="mySwiper swiper">
                            <div class="swiper-wrapper" style="max-width: 350px;">
                                @foreach ($products as $product)

                                <div class="swiper-slide col-xl-3 col-lg-6 col-sm-6 col-12 position-relative"
                                    style="height: 290px;">
                                    <div class="function d-flex justify-content-center align-items-center font-italic gap-1"
                                        id="icon-container">
                                        <a href="{{ route('productId.edit', $product->product_id) }}"
                                            style="font-size: 15px; color: gray; display: none;" class="btn edit-icon"
                                            data-toggle="modal" data-target="#exampleModalx{{$product->product_id}}">
                                            <i class="fa-solid fa-pen"></i>
                                        </a>
                                        <a href="#" style="font-size: 15px; color: gray; display: none;" type="button"
                                            class="btn delete-icon" data-toggle="modal"
                                            data-target="#exampleModal{{$product->product_id}}">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                        <a href="#" style="font-size: 18px; color: gray;" class="btn three-dots">
                                            <i class="fa-solid fa-bars"></i>
                                        </a>
                                    </div>
                                    <a class="text-black"
                                        href="{{ route('product.detail', ['id' => $product->product_id]) }}">
                                        <img src="{{$product->product_img}}" alt="" />
                                        <div
                                            class="text-book d-flex flex-column justify-content-center align-items-center">
                                            <h2 class="new__title pt-2 fs-6 text-center">{{$product->product_name}}</h2>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                                <script>
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
                @foreach ($products as $product)
                <div class="modal fade" id="exampleModal{{$product->product_id}}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <a href="{{ route('productId.delete', $product->product_id) }}"
                                    class="btn btn-danger">Xóa</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @foreach ($products as $product)
                <div class="modal fade" id="exampleModalx{{$product->product_id}}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Sửa tài liệu</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('productId.update', $product->product_id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group fs-6">
                                        <label for="inputEmail4">Tên tài liệu:</label>
                                        <input name="product_name" type="text" class="form-control" id="inputEmail4"
                                            value="{{ $product->product_name }}">
                                    </div>
                                    <div class="form-group fs-6">
                                        <label for="inputPassword4">Giới thiệu về tài liệu:</label>
                                        <textarea name="product_detail" type="text" class="form-control"
                                            style="height: 300px;"
                                            id="inputPassword4">{{ $product->product_detail }}</textarea>
                                    </div>
                                    <div class="form-group fs-6 overflow-hidden">
                                        <label class="text-start " for="inputAddress">Ảnh tài liệu:</label>
                                        <br>
                                        <div class="text-center ">
                                            <img style="width: 200px; margin: 0 auto;" id="previewImage"
                                                src="{{ $product->product_img }}" alt="">
                                            <br>
                                            <span>{{ $product->product_img }}</span>
                                            <input type="file" name="product_img" id="myFileInput" class="py-3"
                                                onchange="previewFile(this)" />
                                        </div>
                                    </div>
                                    <div class="form-group  fs-6 ">
                                        <label for="inputPassword4">File tài liệu (PDF)</label> <br>
                                        <span>{{ $product->product_file }}</span>
                                        <input type="file" name="product_file" id="myFileInput" class="py-3"
                                            value="{{ $product->product_file }}" />
                                    </div>
                                    <div class="form-group  fs-6 ">
                                        <label for="inputEmail4 ">Tác giả</label>
                                        <input name="tacgia" type="text" class="form-control" id="inputEmail4"
                                            value="{{ $product->tacgia }}">
                                    </div>

                                    <div class="form-group  fs-6 ">
                                        <label for="inputEmail4 ">Thể loại</label>
                                        <input name="category" type="text" class="form-control" id="inputEmail4"
                                            value="{{ $product->category }}">
                                    </div>
                                    <div class="form-group fs-6 ">
                                        <label for="inputAddress">Mã học phần</label>
                                        <select id="mahp_select" name="mahp" id="inputState" class="form-control">
                                            <option selected>{{ $product->mahp }}"</option>
                                            @foreach ($education as $edu)
                                            <option value="{{$edu->mahp}}" data-tenhp="{{$edu->tenhp}}">
                                                {{$edu->mahp}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class=" modal-footer fs-5">
                                        <button type="submit" name="submit" for="myFileInput"
                                            class="file-input-label d-block p-2 text-white text-center pe-auto rounded-4 border-0 w-100 "
                                            style="background-color: #AAD9BB;"><i
                                                class="fa-solid fa-cloud-arrow-up"></i>
                                            Cập nhật</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <div class="row bg-white border rounded p-5 mb-5" style="height: 402px;">
                    <div class="books" style="padding-top: 50px;">
                        <p>Không có sản phẩm đăng tải nào</p>
                    </div>
                </div>
                @endif
                @endif
    </section>
    <footer class="text-white fs-6 pt-3 top-0 " style="background-color: #717cb6">
        <section class="">
            <div class="container mt-5" style="color: #fff;">

                <div class="row mt-3">

                    <div class="col-md-3 col-lg-4 col-xl-3 mb-4">

                        <h6 class="text-uppercase fw-bold">Trường Đại Học</h6>
                        <hr class="mb-4 mt-0 d-inline-block mx-auto"
                            style="width: 60px; background-color: #7c4dff; height: 2px" />
                        <p>
                            KHOA CÔNG NGHỆ THÔNG TIN <br />
                            TRƯỜNG ĐH HẢI PHÒNG
                        </p>
                    </div>

                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">

                        <h6 class="text-uppercase fw-bold">Sản phẩm</h6>
                        <hr class="mb-4 mt-0 d-inline-block mx-auto"
                            style="width: 60px; background-color: #7c4dff; height: 2px;" />
                        <p>
                            <a href="#!" style="color: #fff;">Website Tài Liệu Công Nghệ Thông Tin</a>
                        </p>
                    </div>

                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

                        <h6 class="text-uppercase fw-bold">Thành Viên</h6>
                        <hr class="mb-4 mt-0 d-inline-block mx-auto"
                            style="width: 60px; background-color: #7c4dff; height: 2px" />
                        <p>
                            <a href="#!" style="color: #fff;">Phạm Tiến Huy</a>
                        </p>
                        <p>
                            <a href="#!" style="color: #fff;">Đặng Thị Minh Ngọc</a>
                        </p>
                        <p>
                            <Phạm href="#!" style="color: #fff;">Tăng Phương Thảo</a>
                        </p>
                        <p>
                            <a href="#!" style="color: #fff;">Nguyễn Đình Sơn</a>
                        </p>
                        <p>
                            <a href="#!" style="color: #fff;">Phạm Đức Việt</a>
                        </p>
                    </div>
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <h6 class="text-uppercase fw-bold">Liên Hệ</h6>
                        <hr class="mb-4 mt-0 d-inline-block mx-auto"
                            style="width: 60px; background-color: #7c4dff; height: 2px" />
                        <p><i class="fas fa-home mr-3"></i>Đại Học Hải Phòng</p>
                        <p><i class="fas fa-envelope mr-3"></i>xyz@gmail.com</p>
                        <p><i class="fas fa-phone mr-3"></i>0869282369</p>
                    </div>

                </div>

            </div>
        </section>
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
            © 2023 Copyright:
            <a class="text-white" href="https://mdbootstrap.com/">Nhóm Dự Án Nghiên Cứu Khoa Học</a>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="../js/script.js"></script>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const threeDots = document.getElementsByClassName("three-dots");

        for (let i = 0; i < threeDots.length; i++) {
            threeDots[i].addEventListener("click", function(event) {
                event.preventDefault();

                let editIcon = threeDots[i].parentElement.querySelector(".edit-icon");
                let deleteIcon = threeDots[i].parentElement.querySelector(".delete-icon");

                editIcon.style.display = (editIcon.style.display === "none") ? "inline-block" : "none";
                deleteIcon.style.display = (deleteIcon.style.display === "none") ? "inline-block" :
                    "none";
            });
        }
    });

    function previewFile(input) {
        var file = input.files[0];
        var reader = new FileReader();

        reader.onload = function(e) {
            document.getElementById('previewImage').src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
    var swiper = new Swiper(".mySwiper", {
        loop: true,
        spaceBetween: 16,
        slidesPerView: "auto",
        breakpoints: {
            1150: {
                slidesPerView: 4,
            },
        },
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
    });
    </script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <link rel="shortcut icon" type="x-icon" href="./img/book.png">
    </link>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="../img/favicon.png" type="image/x-icon">

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
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
                                <div class="dropdown-menu  position-absolute  " aria-labelledby="userDropdown">
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
    <div class="container mx-auto "
        style="border:1px solid rgba(128, 128, 128, 0.212);background: white;margin: 100px 0px;">
        <section class="list__book border-1 m-0 p-0 mt-5">
            <div class="container">
                <div class="row my-4">
                    <div class="col-lg-7 col-sm-12">
                        <i class="fa-solid fa-paperclip text-success fs-5"></i> <span class="fs-5"> Tài Liệu Tham
                            Khảo</span>
                    </div>
                    <div class="s003 col-lg-5 col-sm-12 d-flex justify-content-end">

                        <div class="d-flex my-3 p-0">
                        </div>
                        <div class="inner-form pe-4">
                            <i class="fa-solid fa-magnifying-glass"></i>
                            <input class="col-12" id="search" name="product_name" type="text"
                                placeholder="Tìm kiếm, tên sách, tác giả, học phần..." />
                        </div>
                    </div>
                </div>
            </div>
            <div class="title d-flex align-content-center" style="background: #504f7c; height: 35px;">
                <span style="background: #717cb6; color: white; padding: 5px; font-size: 15px;">Danh Sách</span>
            </div>
            <div class="book">
                <div class="new__book__swiper swiper">
                    <div class="swiper-wrapper d-flex  flex-column justify-content-between align-items-center">
                        <div class="product"></div>
                    </div>
                </div>
            </div>
    </div>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center ">
            <div class="pagination-links"></div>
        </ul>
    </nav>
    </section>
    <script>
    $(document).ready(function() {
        fetch_customer_data();
        function fetch_customer_data(query = '', page = 1) {
            $.ajax({
                url: "{{ route('document.search') }}",
                method: 'GET',
                data: {
                    query: query,
                    page: page // Thêm tham số page vào data của AJAX request
                },
                dataType: 'json',
                success: function(data) {
                    $('.product').html(data.table_data);
                    $('.pagination-links').html(data.pagination);
                }
            });
        }
        $(document).on('keyup', '#search', function() {
            var query = $(this).val();
            fetch_customer_data(query);
        });
        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            fetch_customer_data($('#search').val(), page);
        });
    });
    </script>
    </div>
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

</body>
<script src="../js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>

</html>
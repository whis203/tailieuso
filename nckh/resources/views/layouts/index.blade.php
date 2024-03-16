<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <link rel="shortcut icon" type="x-icon" href="./img/book.png">
    </link>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="../img/favicon.png" type="image/x-icon">

    <!--=============== REMIXICONS ===============-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
    <!-- <div class="container-loader">
        <div class="loader"></div>
    </div> -->
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
                            <button type="button" class="btn favorite-icon" data-toggle="modal"
                                data-target="#exampleModalv" style="font-size: 22px; color: white;">
                                <i class="fas fa-heart"></i>
                                <div id="favoriteCount" class="count">{{ session('favoriteCount', 0) }}</div>
                            </button>

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
    <style>
    .right-modal .modal-dialog {
        max-width: 100%;
        width: 350px;
        margin-left: auto;
        margin-right: -100%;
        /* Move the modal off the screen initially */
        transition: margin-right 1s ease;
        position: absolute;
        top: 0;
        right: 0;
        margin-top: 0;
    }


    .right-modal.show .modal-dialog {
        margin-right: 0;
        /* Slide the modal in from the right */
    }
    </style>
    <div style="z-index: 9999;" class="modal right-modal" id="exampleModalv" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content rounded-0">
                <div class="modal-header " style="background: #FFE6E6;">
                    <h5 class="text-center mx-auto" id="exampleModalLabel"><i class="fas fa-heart fs-3 text-danger"></i>
                        Sản phẩm vừa yêu thích.</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                @foreach($favorites as $favorite)
    <div class="favorite-list p-2">
        <a href="{{ route('product.detail', ['id' => $favorite->product->product_id]) }}"
            class="d-flex text-decoration-none justify-content-center align-items-center">
            <img style="width: 100px;height: auto;margin: 10px;" src="{{ $favorite->product->product_img }}" alt="">
            <div>
                <p class="fs-6 text-black-50">{{ $favorite->product->product_name }}</p>
                <div class="new__star">
                    @if($favorite->product->totalstar)
                        @for ($i = 0; $i < floor($favorite->product->totalstar); $i++)
                            <i class="fa-solid fa-star"></i>
                        @endfor
                        @if ($favorite->product->totalstar - floor($favorite->product->totalstar) != 0)
                            <i class="fa-regular fa-star-half-stroke"></i>
                        @endif
                        <span>{{ number_format($favorite->product->totalstar, 1) }}</span>
                    @else
                        <i class="fa-solid fa-star"></i>
                        <span>0.0</span>
                    @endif
                </div>
            </div>
        </a>
    </div>
@endforeach
                </div>
                <div class="modal-footer">
                    <a class="fs-6 font-italic text-center p-2 text-white mx-auto w-100 text-decoration-none"
                        style="background: #FEC7B4;" href="{{ route('favorite.index') }}">Xem tất cả</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-loader">
        <div class="loader"></div>
    </div>
    @yield('content')
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
                        <img style="width: 70px;border-radius: 50%;"
                            src="../img/306089932_526172622646621_8420713735632697401_n.jpg" alt="">
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

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="../js/script.js"></script>
    <script>
    let typed = new Typed(".multiple-text", {
        strings: ["TÀI LIỆU SỐ HỌC", "THƯ VIỆN SỐ"],
        typeSpeed: 100,
        backSpeed: 100,
        backDelay: 2000,
        loop: true,
    });
    let swiperNew = new Swiper(".new__swiper", {
        loop: true,
        spaceBetween: 16,
        slidesPerView: "auto",
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            1150: {
                slidesPerView: 4,
            },
        },
    });
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
    var currentActiveItem = null;

    function markAsActive(element) {
        // Loại bỏ lớp 'active' từ 'currentActiveItem' (nếu có)
        if (currentActiveItem) {
            currentActiveItem.classList.remove('active');
        }
        // Thêm lớp 'active' cho 'li' được nhấp vào
        element.classList.add('active');
        // Cập nhật 'currentActiveItem'
        currentActiveItem = element;
    }

    function previewFile(input) {
        var file = input.files[0];
        var reader = new FileReader();

        reader.onload = function(e) {
            document.getElementById('previewImage').src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
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
    })
    document.querySelector('.btn-search').addEventListener('click', function() {
        var searchValue = document.getElementById('search').value;
        var selectValue = document.querySelector('select[name="category"]').value;
        var selectValueDay = document.querySelector('select[name="created_at"]').value;
        // Gửi yêu cầu tìm kiếm đến backend
        window.location.href = "/search?keyword=" + searchValue + "&category=" + selectValue + "&created_at=" +
            selectValueDay;
    });
    </script>
    <script>
    function addFavoriteBtn(productId, button) {
        $.ajax({
            url: "/product/addFavorite/" + productId,
            method: "GET",
            data: {
                _token: '{{ csrf_token() }}',
                productId: productId
            },
            success: function(result) {
                $("#favoriteCount").text(result.favoriteCount); // Cập nhật số lượng sản phẩm yêu thích
                $(".modal-body").empty(); // Xóa nội dung hiện tại của modal body
                // Nếu existingFavorite là một mảng, sử dụng forEach để lặp qua các phần tử và hiển thị trong modal body
                var html = '<div class="favorite-list p-2">';
                html += '<a href="' + "{{ route('product.detail', ['id' => ':product_id']) }}"
                    .replace(':product_id', result.existingFavorite.product.product_id) +
                    '" class="d-flex text-decoration-none justify-content-center align-items-center">';
                html += '<img style="width: 100px;height: auto;margin: 10px;" src="' + result
                    .existingFavorite.product.product_img + '" alt="">';
                html += '<div>';
                html += '<p class="fs-6 text-black-50">' + result.existingFavorite.product.product_name +
                    '</p>';
                html += '</div>';
                html += '</a>';
                html += '</div>';
                // Thêm chuỗi HTML vào modal body
                $(".modal-body").append(html);
                showAlert("Đã thêm sản phẩm vào danh sách yêu thích!",
                    true); // Hiển thị thông báo thành công
            },
            error: function(error) {
                showAlert("Sản phẩm này đã tồn tại trong yêu thích!", false); // Hiển thị thông báo lỗi
            }
        });
        function showAlert(message, isSuccess) {
            var alertBox = $("#alertBox");
            var alertMessage = $("#alertMessage");

            // Chọn lớp CSS tương ứng với trạng thái của thông báo
            var alertClass = isSuccess ? "alert-success" : "alert-error";

            // Thêm lớp CSS vào phần tử .alert-box
            alertBox.removeClass().addClass("alert-box " + alertClass);

            // Thiết lập nội dung của thông báo
            alertMessage.text(message);

            // Hiển thị thông báo
            alertBox.fadeIn().delay(1500).fadeOut();
        }
    }
    </script>
</body>

</html>
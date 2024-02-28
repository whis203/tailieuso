<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="../img/favicon.png" type="image/x-icon">

    <!--=============== REMIXICONS ===============-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css">
    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
    <script src="https://unpkg.com/scrollreveal"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/style.css" />
</head>

<body>
    <!-- <div class="container-loader">
        <div class="loader"></div>
    </div> -->
    <header class="header-area overlay">
        <nav class="navbar navbar-expand-md navbar-dark   " style="background: #717cb6;">
            <div class="container-fluid ">
                <a href="{{ route('home')}}" class="navbar-brand d-flex align-content-center justify-content-center ps-5">
                    Tài Liệu
                    <span style="color: #fbeaad">Số</span></a>
                <button type="button" class="navbar-toggler collapsed text-white " data-toggle="collapse" data-target="#main-nav">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <div id="main-nav" class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto fw-bold d-flex align-items-center  ">
                        <li>
                            <a href="{{ route('home') }}" class="nav-item nav-link fs-6">TRANG CHỦ</a>
                        </li>
                        <li>
                            <a href="{{ route('home') }}#document" class="nav-item nav-link fs-6">TÀI LIỆU</a>
                        </li>
                        <li>
                            <a href="{{ route('home') }}#education" class="nav-item nav-link fs-6">HỌC PHẦN</a>
                        </li>
                        <li>
                            <a href="{{ route('home') }}#newbook" class="nav-item nav-link fs-6">SÁCH MỚI</a>
                        </li>
                        <div class="logIn ps-5 d-flex justify-content-center align-items-center">
                            <a href="{{ route('favorite.index') }}" class="favorite-icon" style=" font-size: 22px; color: white;"><i class="fa-solid fa-heart"></i>
                                <div class="count">{{ session('favoriteCount', 0) }}</div>
                            </a>
                            @if (!Auth::check())
                            <a href="{{ route('signin.index') }}" style="font-size: 22px; color: white; padding: 10px; margin-right: 50px;">
                                <i class="fa-solid fa-user"></i>
                            </a>
                            @else
                            <div class="dropdown">
                                <a href="#" style="font-size: 22px; color: white; padding: 10px; margin-right: 50px;" class="dropdown-toggle" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    @if (session()->has('user') && session('user')['img'])
                                    <img class="object-fit-cover" style="width: 50px; height: 50px;border-radius: 50%;" src="{{ session('user')['img'] }}" alt="">
                                    @else
                                    <img class="object-fit-cover" style="width: 50px; height: 50px;border-radius: 50%;" src="../img/flat-business-man-user-profile-avatar-icon-vector-4333097.jpg" alt="">
                                    @endif
                                </a>
                                <div class="dropdown-menu  position-absolute  " aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="{{ route('info.index') }}">Xem thông tin</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}">Đăng xuất</a>
                                </div>
                            </div>
                            @endif
                            <style>
                                .dropdown {
                                    position: relative;
                                }

                                .dropdown-toggle {
                                    font-size: 22px;
                                    color: white;
                                    padding: 10px;
                                    margin-right: 50px;
                                    text-decoration: none;
                                }

                                .dropdown-menu {
                                    position: absolute;
                                    top: 100%;
                                    left: -30px;
                                    z-index: 1000;
                                    display: none;
                                    float: left;
                                    min-width: 160px;
                                    padding: 5px 0;
                                    margin: 14px 0 0;
                                    font-size: 16 px;
                                    text-align: left;
                                    background-color: #fff;
                                    border-radius: .25rem;
                                    box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
                                }

                                .dropdown-menu.show {
                                    display: block;
                                }

                                .dropdown-item {
                                    display: block;
                                    width: 100%;
                                    padding: .25rem 1.5rem;
                                    clear: both;
                                    font-weight: 400;
                                    color: #212529;
                                    text-align: inherit;
                                    white-space: nowrap;
                                    background-color: transparent;
                                    border: 0;
                                    transition: all 0.1s ease-in-out;
                                }

                                .dropdown-item:hover,
                                .dropdown-item:focus {
                                    color: #fff;
                                    background-color: #717cb6;

                                }



                                .dropdown-item.active,
                                .dropdown-item:active {
                                    color: #fff;
                                    background-color: #717cb6;
                                    outline: none;
                                }

                                .dropdown-item.disabled,
                                .dropdown-item:disabled {
                                    color: #6c757d;
                                    pointer-events: none;
                                    background-color: transparent;
                                }

                                .dropdown-item:not(:first-of-type) {
                                    border-top: 1px solid rgba(0, 0, 0, .125);
                                }
                            </style>
                        </div>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="container-loader">
        <div class="loader"></div>
    </div>
    @yield('content')
    <footer class="text-white fs-6 pt-3 top-0 " style="background-color: #717cb6">
        <section class="">
            <div class="container mt-5">
                <div class="row mt-3">
                    <div class="col-md-3 col-lg-4 col-xl-3 mb-4">
                        <h6 class="text-uppercase fw-bold">Trường Đại Học</h6>
                        <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />
                        <p>
                            KHOA CÔNG NGHỆ THÔNG TIN <br />
                            TRƯỜNG ĐH HẢI PHÒNG
                        </p>
                    </div>
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">

                        <h6 class="text-uppercase fw-bold">Sản phẩm</h6>
                        <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />
                        <p>
                            <a href="#!" class="text-white">Website</a>
                        </p>
                        <p>
                            <a href="#!" class="text-white">Tài liệu</a>
                        </p>
                    </div>

                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

                        <h6 class="text-uppercase fw-bold">Thành Viên</h6>
                        <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />
                        <p>
                            <a href="#!" class="text-white">Phạm Văn A</a>
                        </p>
                        <p>
                            <a href="#!" class="text-white">Phạm Văn B</a>
                        </p>
                        <p>
                            <Phạm href="#!" class="text-white">Phạm Văn C</a>
                        </p>
                        <p>
                            <a href="#!" class="text-white">Phạm Văn D</a>
                        </p>
                    </div>

                    <div class="col-md-4 col-lg-4 col-xl-3 mx-auto mb-md-0 mb-4">

                        <h6 class="text-uppercase fw-bold">Liên Hệ</h6>
                        <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />
                        <p><i class="fas fa-home mr-3"></i> Hải Phòng</p>
                        <p><i class="fas fa-envelope mr-3"></i> info@example.com</p>
                        <p><i class="fas fa-phone mr-3"></i> 098765432</p>
                        <p><i class="fas fa-print mr-3"></i> 098765432</p>
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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
                    deleteIcon.style.display = (deleteIcon.style.display === "none") ? "inline-block" : "none";
                });
            }
        })
        document.querySelector('.btn-search').addEventListener('click', function() {
            var searchValue = document.getElementById('search').value;
            var selectValue = document.querySelector('select[name="category"]').value;
            var selectValueDay = document.querySelector('select[name="created_at"]').value;
            // Gửi yêu cầu tìm kiếm đến backend
            window.location.href = "/search?keyword=" + searchValue + "&category=" + selectValue + "&created_at=" + selectValueDay;
        });
    </script>
</body>

</html>
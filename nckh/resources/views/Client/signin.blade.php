<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <link rel="shortcut icon" type="x-icon" href="./img/book.png">
    </link>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Đăng nhập</title>
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/login.css" />
    <script src="https://storage.googleapis.com/code.getmdl.io/1.0.6/material.min.js">
    </script>
    <link rel="stylesheet" href="https://storage.googleapis.com/code.getmdl.io/1.0.6/material.indigo-pink.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet">
</head>

<body>
    <header class="header">
        <p class="fs-1 ">Tài liệu <span>số</span>
        </p>
    </header>
    <div class="container-fluid">
        <form action="{{ route('signin.login') }}" method="post" id="signIn">
            <p class="">ĐĂNG  NHẬP</p>
            <br>
            @csrf
           
            <div class="img">
                <img src="img/logoSignIn.jpeg" alt="">
            </div>
            <div class="form-group">
            @if (Session::has('success'))
            <span class="text-success" >
                {{ Session::get('success') }}
            </span>
            @elseif (Session::has('error'))
            <span class="text-danger" >
            <i class="fa-solid fa-circle-exclamation"></i> {{ Session::get('error') }} !
            </span>
            @endif
                <input name="username" type="text" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="Tên đăng nhập">
            </div>
            <div class="form-group">
                <input name="password" type="password" class="form-control" id="exampleInputPassword1"
                    placeholder="Mật khẩu">
            </div>
            @if ($errors->has('g-recaptcha-response'))
            <span class="help-block">
                <span class="text-danger"><i class="fa-solid fa-circle-exclamation"></i> {{ $errors->first('g-recaptcha-response') }} </span>
            </span>
            @endif
            <div class="">
            {!! NoCaptcha::renderJs() !!}
            {!! NoCaptcha::display() !!}
            </div>
            <div class="forget">
                <a href="{{route('password.request')}}" style="color: #64656988;">Quên mật khẩu</a>
            </div>
            <a href=""> <button type="submit" class="btn--">Đăng nhập</button></a>
            <div id="btn-signUp py-3 ">
                Bạn chưa có tài khoản? <a href="{{route('signup.index')}}" style="color: #717cb6;">Đăng kí ngay</a>
            </div>
        </form>
    </div>
    <footer class="text-white fs-6 pt-3 top-0 " style="background-color: white;">
        <section class="">
            <div class="container mt-5" style="color: #717cb6;">

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
                            <a href="#!" style="color: #717cb6;">Website Tài Liệu Công Nghệ Thông Tin</a>
                        </p>
                    </div>

                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

                        <h6 class="text-uppercase fw-bold">Thành Viên</h6>
                        <hr class="mb-4 mt-0 d-inline-block mx-auto"
                            style="width: 60px; background-color: #7c4dff; height: 2px" />
                        <p>
                            <a href="#!" style="color: #717cb6;">Phạm Tiến Huy</a>
                        </p>
                        <p>
                            <a href="#!" style="color: #717cb6;">Đặng Thị Minh Ngọc</a>
                        </p>
                        <p>
                            <Phạm href="#!" style="color: #717cb6;">Tăng Phương Thảo</a>
                        </p>
                        <p>
                            <a href="#!" style="color: #717cb6;">Nguyễn Đình Sơn</a>
                        </p>
                        <p>
                            <a href="#!" style="color: #717cb6;">Phạm Đức Việt</a>
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

        <div class="text-center p-3" style="background-color: #717cb6">
            <a class="text-white" href="https://mdbootstrap.com/">Nhóm Dự Án Nghiên Cứu Khoa Học</a>
        </div>

    </footer>
</body>

</html>
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
</body>

</html>
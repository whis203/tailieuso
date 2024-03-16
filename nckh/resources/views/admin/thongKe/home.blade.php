<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="shortcut icon" type="x-icon" href="./img/book.png"></link>
    <title>Trang Quản Lý</title>
    <!-- Link Styles -->
    <link rel="stylesheet" href="../css/manage.css" />
    <script src="https://kit.fontawesome.com/cb6eefb674.js" crossorigin="anonymous"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/cb6eefb674.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="sidebar">
        <div class="logo_details">
            <img src="./img/book.png" class="icon">
            <div class="logo_name">QUẢN LÝ TÀI LIỆU SỐ</div>
            <i class="bx bx-menu" id="btn"></i>
        </div>
        <ul class="nav-list">
            <li>
                <a href="{{route('admin.index')}}">
                    <i class="fa-solid fa-house"></i>
                    <span class="link_name">Trang chủ</span>
                </a>
            </li>
            <li>
                <a href="{{route('managedocument.index')}}">
                    <i class="bx bx-folder"></i>
                    <span class="link_name">Quản lý tài liệu</span>
                </a>
            </li>
            <li>
                <a href="{{route('manageeducation.index')}}">
                    <i class="bx bx-folder"></i>
                    <span class="link_name">Quản lý học phần</span>
                </a>
            </li>
            <li>
                <a href="{{route('manageaccount.index')}}">
                    <i class="bx bx-folder"></i>
                    <span class="link_name">Quản lý người dùng</span>
                </a>
            </li>
            <li>
                <a href="{{route('managecomment.index')}}">
                    <i class="fa-solid fa-check-to-slot"></i>
                    <span class="link_name">Đánh giá</span>
                </a>
            </li>
            <li class="profile">
                <form action="{{route('logout')}}"><button type="submit" href="index.html" id="log_out"
                        style="border: none;">
                        <i class="bx bx-log-out" id="log_out"></i>
                    </button></form>
            </li>
        </ul>
    </div>
    <div class="container-fluid ">
        <div class="main-content">
            <div class="header-wrapper py-3">
                <div class="header-logo">
                    <i class="fa-solid fa-bars"></i>
                </div>
            </div>
            <style>
            .card-content {
                background-color: #e4e9f7;
                border-radius: 10px;
                margin: 50px 5px;
                width: 100%;
            }
            </style>
            <div class="card-content">
                <h3 class="title">THỐNG KÊ</h3>
                <div class="card-wrapper">
                    <style>
                    .card {
                        border-radius: 20% 10%;
                    }
                    </style>
                    <div class="card d-flex flex-row border-0" style="background-color: #fff">
                        <div class="">
                            <i class="fa-solid fa-user" style="color:#B7C9F2;"></i>
                        </div>
                        <div class="">
                            <div class="card-title">SỐ TÀI KHOẢN</div>
                            <div class="nofiti">{{ $totalUsers }}</div>
                        </div>
                    </div>
                    <div class="card d-flex flex-row border-0" style="background-color: #fff">
                        <div class="">
                            <i class="fa-solid fa-folder" style="color:#F2C18D;"></i>
                        </div>
                        <div class="">
                            <div class="card-title">SỐ TÀI LIỆU</div>
                            <div class="nofiti">{{ $totalDoc }}</div>
                        </div>
                    </div>
                    <div class="card d-flex flex-row border-0" style="background-color: #fff">
                        <div class="">
                            <i class="fa-solid fa-school" style="color:#B5C0D0;"></i>
                        </div>
                        <div class="">
                            <div class="card-title">SỐ HỌC PHẦN</div>
                            <div class="nofiti">{{ $totalEdu }}</div>
                        </div>
                    </div>
                    <div class="card d-flex flex-row border-0" style="background-color: #fff">
                        <div class="">
                            <i class="fa-solid fa-bookmark" style="color:#BFEA7C;"></i>
                        </div>
                        <div class="">
                            <div class="card-title">SỐ ĐÁNH GIÁ</div>
                            <div class="nofiti">{{ $totalComment }}</div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="card-content bg-white">
                <div class="narbar-bottom d-flex gap-4 align-items-center justify-content-center">
                    <div class="card-content col-8">
                        <h3 class="title">DANH SÁCH TÀI KHOẢN</h3>
                        <div class="table-container">
                            <table>
                                <thead class="bg-white text-black-50  ">
                                    <tr>
                                        <th class="font-weight-normal" scope="col">Người dùng</th>
                                        <th class="font-weight-normal" scope="col">Số điện thoại</th>
                                        <th class="font-weight-normal" scope="col">Email</th>
                                        <th class="font-weight-normal" scope="col">Giới tính</th>
                                        <th class="font-weight-normal" scope="col">Avatar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->phone}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                            @if($user->gender == 0)
                                            Nam
                                            @elseif($user->gender == 1)
                                            Nữ
                                            @endif
                                        </td>
                                        <td><img style="width: 50px;height: 50px; border-radius:10px;"
                                                src="{{$user->img}}" alt=""></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-content col-4">
                        <h5>Đánh giá gần đây</h5>
                        <div class="container mt-5">
                            <div class="row  d-flex">
                                <div class="col-md-8 comment">
                                @foreach ($latestComments as $latestComment)
                                    <div class="card p-3 border-0 rounded-0" style="width: 350px;height: auto;">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="user d-flex flex-row align-items-center">
                                                <img src="{{ $latestComment->userImg }}" width="30"
                                                    class="user-img rounded-circle mr-2">
                                                <span>
                                                    <small
                                                        class="font-weight-bold text-primary">{{ $latestComment->userName }}</small>
                                                    <small class="font-weight-bold">{{ $latestComment->content }}</small>
                                                </span>
                                            </div>
                                            <small
                                                class="m-3 text-black-50 font-italic">{{ $latestComment->created_at }}</small>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
    </div>
    </div>
    <script src="../js/QuanLy.js"></script>
</body>

</html>
</body>

</html>
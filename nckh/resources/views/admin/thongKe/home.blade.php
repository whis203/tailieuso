<!DOCTYPE html>
<html lang="en">

<head>
  <title>@yield('title')</title>
  <!-- Link Styles -->
  <link rel="stylesheet" href="{{ asset('css/manage.css') }}" />
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
        <form action="logout.php"><button type="submit" href="index.html" id="log_out" style="border: none;">
            <i class="bx bx-log-out" id="log_out"></i>
          </button></form>
      </li>
    </ul>
  </div>

  <div class="container-fluid ">
    <div class="main-content">
      <div class="header-wrapper">
        <div class="header-logo">
          <i class="fa-solid fa-bars"></i>
        </div>
        <div class="user-info">
          <div class="search--">
            <input type="text" placeholder="Tìm kiếm..." />
            <i class="fa-solid fa-magnifying-glass"></i>
          </div>
          <i class="fa-solid fa-bell"></i>
          <i class="fa-solid fa-user" style="
                border: 1px solid #504f7c;
                padding: 10px;
                border-radius: 50%;
                background-color: #504f7c;
                color: white;
              "></i>
        </div>
      </div>
      <style>
        .card-content {
          background-color: white;
          padding: 4rem;
          border-radius: 10px;
          margin: 105px 5px;
          width: 100%;
        }
      </style>
      <div class="card-content">
        <h3 class="title">THỐNG KÊ</h3>
        <div class="card-wrapper">
          <div class="card" style="background-color: #faeaea">
            <div class="card-title">SỐ TÀI KHOẢN</div>
            <div class="nofiti">{{ $totalUsers }}</div>
          </div>
          <div class="card" style="background-color: #eafaea">
            <div class="card-title">SỐ TÀI LIỆU</div>
            <div class="nofiti">{{$totalDoc}}</div>
          </div>
          <div class="card" style="background-color: #faf3ea">
            <div class="card-title">SỐ HỌC PHẦN</div>
            <div class="nofiti">{{$totalEdu}}</div>
          </div>
          <div class="card" style="background-color: #f0eafa">
            <div class="card-title">SỐ ĐÁNH GIÁ</div>
            <div class="nofiti">{{$totalComment}}</div>
          </div>

        </div>
      </div>
    </div>
  </div>
  <script src="{{ asset('js/QuanLy.js') }}"></script>
</body>

</html>
</body>

</html>
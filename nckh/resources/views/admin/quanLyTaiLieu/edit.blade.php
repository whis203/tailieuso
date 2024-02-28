<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="{{ asset('css/manage.css') }}" />
  <script src="https://kit.fontawesome.com/cb6eefb674.js" crossorigin="anonymous"></script>
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
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
  <div class="content">
    <div class="main-content" style="padding-bottom: 113px">
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
      <div class="card-content">
        @if (Session::has('success'))
        <div class="alert alert-success fs-6" role="alert">
          {{ Session::get('success') }}
        </div>
        @elseif (Session::has('error'))
        <div class="alert alert-danger fs-6 " role="alert">
          {{ Session::get('error') }}
        </div>
        @endif
        <h3 class="title">SỬA THÔNG TIN</h3>
        <form action="{{ route('productId.update', $product->product_id) }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="form-group ">
            <label for="inputPassword4">Tên tài liệu</label>
            <input type="text" name="product_name" class="form-control" id="inputPassword4" value="{{$product->product_name}}" />
          </div>
          <div class="form-group">
            <label for="inputAddress2">Giới thiệu</label>
            <input type="text" name="product_detail" class="form-control" id="inputAddress2" value="{{$product->product_detail}}" />
          </div>
          <div class="form-group ">
            <label for="inputAddress2">Ảnh</label> <br>
            <img style="width: 200px; margin: 20px;" id="previewImage" src="{{ $product->product_img }}" alt="">
            <br>
            <p>{{ $product->product_img }}</p>
            <input type="file" name="product_img" id="myFileInput " class="form-control" onchange="previewFile(this)" />
          </div>
          <div class=" form-group">
            <label for="inputAddress2">File Tài Liệu</label>
            <p>{{$product->product_file}}</p>
            <input type="file" class="form-control" name="product_file" id="inputAddress2" placeholder="Nhập file PDF" />
          </div>
          <div class=" form-group">
            <label for="inputAddress">Thể loại</label>
            <select name="category" id="inputState" class="form-control">
              <option value="Tài liệu">Tài liệu</option>
              <option value="Giáo trình">Giáo trình</option>
              <option value="Bài tập">Bài tập</option>
            </select>
          </div>
          <br />
          <button type="submit" class="btn-btn">Cập nhật</button>
        </form>
      </div>
    </div>
  </div>
  <script src="{{ asset('js/QuanLy.js') }}"></script>

</body>

</html>
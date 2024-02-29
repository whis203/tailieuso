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
        <form action="{{ route('manageeducation.updateEdu', $education->id) }}" method="post">
          @csrf
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputEmail4">Mã HP</label>
              <input type="text" name="mahp" class="form-control" id="inputEmail4" value="{{$education->mahp}}" />
            </div>
            <div class="form-group col-md-6">
              <label for="inputPassword4">Tên HP</label>
              <input type="text" name="tenhp" class="form-control" id="inputPassword4" value="{{$education->tenhp}}" />
            </div>
          </div>
          <div class="form-group">
            <label for="inputAddress">Đơn vị</label>
            <select name="donvi" id="inputState" class="form-control">
              <option selected value="{{$education->donvi}}">{{$education->donvi}}</option>
              <option value="Khoa Luận Chính Trị">Khoa Luận Chính Trị</option>
              <option value="Khoa Toán và Khoa học Tự nhiên">Khoa Toán và Khoa học Tự nhiên</option>
              <option value="Khoa Công Nghệ Thông Tin">Khoa Công Nghệ Thông Tin</option>
              <option value="Khoa Tâm lý - Giáo dục học">Khoa Tâm lý - Giáo dục học</option>
              <option value="Khoa Ngữ văn và Khoa học xã hội">Khoa Ngữ văn và Khoa học xã hội</option>
              <option value="Khoa Ngoại ngữ">Khoa Ngoại ngữ</option>
            </select>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputEmail4">Tên viết tắt</label>
              <input type="text" name="tenvt" class="form-control" id="inputEmail4" value="{{$education->tenvt}}" />
            </div>
            <div class="form-group col-md-6">
              <label for="inputPassword4">Mã In</label>
              <input type="text" name="main" class="form-control" id="inputPassword4" value="{{$education->main}}" />
            </div>
          </div>
          <div class="form-group ">
            <label for="inputPassword4">Mô tả</label>
            <textarea type="text" name="mota" class="form-control" id="inputPassword4" rows="5">{{$education->mota}}</textarea>
          </div>
          <div class="form-group">
            <label for="inputAddress">Số tín chỉ</label>
            <select name="sotinchi" id="inputState" class="form-control">
              <option selected value="{{$education->sotinchi}}">{{$education->sotinchi}}</option>
              <option value="2.0">2.0</option>
              <option value="3.0">3.0</option>
              <option value="4.0">4.0</option>
            </select>
          </div>
          <div class="form-group ">
            <label for="inputPassword4">Mục tiêu</label>
            <textarea type="text" name="muctieu" class="form-control" id="inputPassword4" rows="5">{{$education->muctieu}}</textarea>
          </div>
          <div class="form-group">
            <label for="inputAddress">Khung đào tạo</label>
            <select name="khoa_id" id="inputState" class="form-control">
              <option selected>Chọn khung đào tạo</option>
              @foreach($khoa as $k)
              <option value="{{$k->id}}" {{ $education->khoa_id == $k->id ? 'selected' : '' }}>{{$k->tenkhoa}}</option>
              @endforeach
            </select>
          </div>
          <button type="submit" class="btn-btn">SAVE</button>
        </form>
      </div>
    </div>
  </div>
  <script src="{{ asset('js/QuanLy.js') }}"></script>
</body>

</html>
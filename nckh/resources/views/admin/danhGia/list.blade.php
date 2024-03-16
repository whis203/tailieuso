<!DOCTYPE html>
<html lang="en">

<head>
<link rel="shortcut icon" type="x-icon" href="./img/book.png"></link>
<title>Quản Lý Đánh Giá</title>
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
        <form action="{{route('logout')}}"><button type="submit" href="index.html" id="log_out" style="border: none;">
            <i class="bx bx-log-out" id="log_out"></i>
          </button></form>
      </li>
    </ul>
  </div>
  <div class="content">
    <div class="main-content">
      <div class="header-wrapper">
        <div class="header-logo">
          <i class="fa-solid fa-bars"></i>
        </div>
        <style>
          .select select {
            outline: none;
            border: none;
            color: #838383;
            background-color: #f0f6fd;
            font-size: 15px;
            text-align: center;
            margin-right: 15px;
            width: 150px;
            height: 35px;
            color: #333;
            cursor: pointer;
            border-radius: 30px;
            padding: 5px;
          }

          .inner-form {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f0f6fd;
            padding: 5px;
            gap: 1rem;
            font-size: 18px;
            width: 450px;
            height: 35px;
            border-radius: 30px;
            position: relative;
          }

          .inner-form input {
            outline: none;
            border: none;
            color: #838383;
            width: 400px;
            padding: 3px 3px 3px 20px;
            background-color: #f0f6fd;
            font-size: 15px;
            border-radius: 30px;
          }

          .btn-search {
            border: none;
            background-color: #28666e;
            color: white;
            border-radius: 0px 30px 30px 0px;
            padding: 4px 17px;
            position: absolute;
            right: 0;
            top: 0;
          }
        </style>
        <form action="{{ route('document.search') }}" method="GET" class="d-flex justify-content-center align-items-center  ">
          <div class="d-flex my-3 p-0">
            <div class="select">
              <select name="category">
                <div class="bg-black">
                  <option value="">Tất cả</option>
                  <option value="Tài liệu">Tài liệu</option>
                  <option value="Bài tập">Bài tập</option>
                  <option value="Giáo trình">Giáo trình</option>
                </div>
              </select>
            </div>
            <div class="select">
              <select name="created_at">
                <option value="">Thời gian</option>
                <option value="1">1 ngày trước</option>
                <option value="7">1 tuần trước</option>
                <option value="30">1 tháng trước</option>
              </select>
            </div>
          </div>
          <div class="inner-form pe-4 d-flex justify-content-center align-items-center ">
            <div class="input-field second-wrap">
              @if (Session::has('error'))
              <input class="col-12" id="search" name="product_name" type="text" placeholder="{{ Session::get('error') }}" class="red-placeholder" />
              @else
              <input class="col-12" id="search" name="product_name" type="text" placeholder="Tìm kiếm..." />
              @endif
            </div>
            <div class="input-field third-wrap">
              <button class="btn-search" type="submit">
                <i class="fa-solid fa-magnifying-glass"></i>
              </button>
            </div>
          </div>
        </form>
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
        <h3 class="title">DANH SÁCH</h3> <br>
        <a href="{{ route('managecomment.recent') }}" class=" p-2 btn-btn text-white">Đánh giá gần đây</a>
        <div class="table-container">
          <table>
            <thead>
              <tr>
                <th scope="col-1">ID</th>
                <th scope="col-1">ID người dùng</th>
                <th scope="col-1">Tên người dùng</th>
                <th scope="col-1">ID tài liệu</th>
                <th scope="col-2">Thời gian</th>
                <th scope="col-2">Đánh giá</th>
                <th scope="col-4">Chi tiết</th>
                <th scope="col-1">Thao tác</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                @foreach($comments as $comment)
                <td>{{$comment->id}}</td>
                <td>{{$comment->user_id}}</td>
                <td>{{$comment->userName}}</td>
                <td>{{$comment->product_id}}</td>
                <td>{{$comment->created_at}}</td>
                <td>{{$comment->rating}} <i class="fa-solid fa-star text-danger "></i></td>
                <td>{{$comment->content}}</td>
                <td>
                  <button type="button" style="border: none;background: none;" data-toggle="modal" data-target="#exampleModal{{$comment->id}}">
                    <i class="fa-solid fa-trash"></i>
                  </button>
                  <div class="modal fade" id="exampleModal{{$comment->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">

                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          Bạn có chắc chắn xoá?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                          <a href="{{route('managecomment.delete', $comment->id)}}" class="btn btn-danger">Vâng</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>

        </div>
      </div>
    </div>
    <script src="{{ asset('js/QuanLy.js') }}"></script>
</body>

</html>
</body>

</html>
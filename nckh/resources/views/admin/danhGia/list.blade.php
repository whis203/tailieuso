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
  <div class="content">
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
      <div class="card-content">
        <h3 class="title">DANH SÁCH</h3>
        <div class="table-container">
          <table>
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Tên người dùng</th>
                <th scope="col">ID tài liệu</th>
                <th scope="col">Thời gian</th>
                <th scope="col">Đánh giá</th>
                <th scope="col">Chi tiết</th>
                <th scope="col">Thao tác</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Phạm Văn A</td>
                <td>1</td>
                <td>12-12-2023</td>
                <td style="color: yellow;">★★★★★</td>
                <td>Sách hay lắm nhé...</td>
                <td>

                  <i type="button" data-toggle="modal" data-target="#exampleModal" class="fa-solid fa-trash"></i>

                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                          <button type="button" class="btn btn-danger">Vâng</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </td>

              </tr>
              <tr>
                <td>1</td>
                <td>Phạm Văn A</td>
                <td>1</td>
                <td>12-12-2023</td>
                <td style="color: yellow;">★★★★★</td>
                <td>Sách hay lắm nhé...</td>
                <td>
                  <i class="fa-solid fa-trash"></i>
                </td>
              </tr>
              <tr>
                <td>1</td>
                <td>Phạm Văn A</td>
                <td>1</td>
                <td>12-12-2023</td>
                <td style="color: yellow;">★★★★★</td>
                <td>Sách hay lắm nhé...</td>
                <td>
                  <i class="fa-solid fa-trash"></i>
                </td>
              </tr>
              <tr>
                <td>1</td>
                <td>Phạm Văn A</td>
                <td>1</td>
                <td>12-12-2023</td>
                <td style="color: yellow;">★★★★★</td>
                <td>Sách hay lắm nhé...</td>
                <td>
                  <i class="fa-solid fa-trash"></i>
                </td>
              </tr>
              <tr>
                <td>1</td>
                <td>Phạm Văn A</td>
                <td>1</td>
                <td>12-12-2023</td>
                <td style="color: yellow;">★★★★★</td>
                <td>Sách hay lắm nhé...</td>
                <td>
                  <i class="fa-solid fa-trash"></i>
                </td>
              </tr>
              <tr>
                <td>1</td>
                <td>Phạm Văn A</td>
                <td>1</td>
                <td>12-12-2023</td>
                <td style="color: yellow;">★★★★★</td>
                <td>Sách hay lắm nhé...</td>
                <td>
                  <i class="fa-solid fa-trash"></i>
                </td>
              </tr>
            </tbody>
          </table>
          <a href="add.html"><button class="btn-btn">Đánh giá gần đây</button></a>
        </div>
      </div>
    </div>
    <script src="{{ asset('js/QuanLy.js') }}"></script>
</body>

</html>
</body>

</html>
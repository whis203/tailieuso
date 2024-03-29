<!DOCTYPE html>
<html lang="en">

<head>
<link rel="shortcut icon" type="x-icon" href="./img/book.png"></link>
    <title>Quản Lý Học Phần</title>
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
            <div class="header-wrapper p-3">
                <div class="header-logo">
                    <i class="fa-solid fa-bars"></i>
                </div>
                <form action="{{ route('manageeducation.search') }}" method="GET"
                    class="d-flex justify-content-center align-items-center  ">
                    <div class="d-flex my-3 p-0">
                        
                    </div>
                    <div class="inner-form pe-4 d-flex justify-content-center align-items-center ">
                        <div class="input-field second-wrap">
                            @if (Session::has('error'))
                            <input class="col-12" id="search" name="mahp" type="text"
                                placeholder="{{ Session::get('error') }}" class="red-placeholder" />
                            @else
                            <input class="col-12" id="search" name="mahp" type="text" placeholder="Tìm kiếm..." />
                            @endif
                        </div>
                        <div class="input-field third-wrap">
                            <button class="btn-search" type="submit">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <script>
                document.querySelector('.btn-search').addEventListener('click', function(event) {
                    var searchValue = document.getElementById('search').value;
                    var selectValue = document.querySelector('select[name="donvi"]').value;
                    window.location.href = "/search?mahp=" + searchValue + "&donvi=" + selectValue;
                });
                </script>
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
                <h3 class="title">DANH SÁCH</h3>
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th scope="col">Mã HP</th>
                                <th scope="col">Tên HP</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($education as $edu)
                            <tr>
                                <td>{{$edu->mahp}}</td>
                                <td>{{$edu->tenhp}}</td>
                                <td><a href="{{route('manageeducation.showFormEdit', $edu->id)}}"><i
                                            class="fa-solid fa-pen-to-square"></i></a>
                                    <button type="button" style="border: none;background: none;" data-toggle="modal"
                                        data-target="#exampleModal{{$edu->id}}">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                    <div class="modal fade" id="exampleModal{{$edu->id}}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">

                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Bạn có chắc chắn xoá?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Đóng</button>
                                                    <a href="{{route('manageeducation.delete', $edu->id)}}"
                                                        class="btn btn-danger">Vâng</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{route('manageeducation.showFormAdd')}}"><button class="btn-btn">ADD</button></a>
                </div>
                <nav aria-label="Page navigation example ">
                    <ul class="pagination justify-content-end ">
                        {{ $education->links() }}
                    </ul>
                </nav>
            </div>
        </div>
        <script src="{{ asset('js/QuanLy.js') }}"></script>
</body>

</html>
</body>

</html>
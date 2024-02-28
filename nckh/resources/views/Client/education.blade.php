@extends('layouts.index')

@section('title', 'Học phần')

@section('content')
<section class="container-sm ">
    <div class="container-wrapper container-xxl" style="border:1px solid rgba(128, 128, 128, 0.212);background: white;margin: 100px 0px;">
        <style>

        </style>
        <!-- Trong template của bạn -->
        <div class="menu-edu">
            <div class="title-edu text-white p-3 fs-6 fw-bold">
                HỌC PHẦN
            </div>
            <ul class="list-menu">
                @foreach($khoas as $k)
                <a class="text-decoration-none" href="{{ route('education.select', ['id' => $k->id]) }}">
                    <li onclick="markAsActive(this)">{{$k->tenkhoa}}</li>
                </a>
                @endforeach
            </ul>
        </div>
        <div class="container-xl education" id="newbook">
            <span class="fs-4" style="color: black;padding: 20px;">{{$khoa->tenkhoa}}</span>
            <br>
            <hr>
            <div class="container">
                <ul class="responsive-table">
                    <li class="table-header ">
                        <div class="col col-3">Mã Học Phần</div>
                        <div class="col col-5">Tên Học Phần</div>
                        <div class="col col-4">Số Tín Chỉ</div>
                        <div class="col col-5">Chi Tiết</div>
                    </li>
                    @foreach($education as $ed)
                    <li class="table-row">
                        <div class="col col-3">{{$ed->mahp}}</div>
                        <div class="col col-5">{{$ed->tenhp}}</div>
                        <div class="col col-4"><strong>{{$ed->sotinchi}}</strong></div>
                        <div class="col col-5"><a href="{{route('education.eduDetail', ['id' => $ed->id])}}"><i>Chi tiết</i></a></div>
                    </li>
                    @endforeach
                </ul>
            </div>
            <hr>
        </div>

</section>
@endsection
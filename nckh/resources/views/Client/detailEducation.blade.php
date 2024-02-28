@extends('layouts.index')

@section('title', 'Chi tiết học phần')

@section('content')

<section class="container-sm  ">
    <div class=" container-xxl" style="border:1px solid rgba(128, 128, 128, 0.212);background: white;margin: 100px 0px;padding: 40px;">
        <div class="title-edu bg-white">
            CHI TIẾT HỌC PHẦN: <span class="text-uppercase">{{$education->tenhp}} ( {{$education->mahp}} )</span>
        </div>
        <div class="row">
            <div class="col">
                Đơn vị đào tạo
            </div>
            <div class="col-9">
                {{$education->donvi}}
            </div>
        </div>
        <div class="row">
            <div class="col ">
                Mã học phần
            </div>
            <div class="col-9">
                {{$education->mahp}}
            </div>
        </div>
        <div class="row">
            <div class="col ">
                Tên học phần
            </div>
            <div class="col-9">
                {{$education->tenhp}}
            </div>
        </div>
        <div class="row">
            <div class="col ">
                Tên viết tắt
            </div>
            <div class="col-9">
                {{$education->tenvt}}
            </div>
        </div>
        <div class="row">
            <div class="col ">
                Mã in
            </div>
            <div class="col-9">
                {{$education->main}}
            </div>
        </div>
        <div class="row">
            <div class="col ">
                Mô tả
            </div>
            <div class="col-9">
                {{$education->mota}}
            </div>
        </div>
        <div class="row">
            <div class="col ">
                Số tín chỉ
            </div>
            <div class="col-9">
                <strong>{{$education->sotinchi}}</strong>
            </div>
        </div>
        <div class="row">
            <div class="col ">
                Mục tiêu
            </div>
            <div class="col-9">
                {{$education->muctieu}}

            </div>
        </div>
    </div>
    <style>
        .row {
            padding: 10px;
            font-size: 15px;
        }

        .col-9,
        .col {
            background: rgb(252, 252, 252);
            margin: 2px;
            padding: 8px;
            border: 1px solid rgb(226, 226, 226);

        }

        .title-edu {
            font-size: 22px;
        }

        .title-edu span {
            color: rgb(255, 83, 83);
        }
    </style>
</section>
@endsection
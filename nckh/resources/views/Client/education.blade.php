@extends('layouts.index')

@section('title', 'Học phần')

@section('content')
<section class="container-sm ">
    <div class="container-wrapper container-xxl"
        style="border:1px solid rgba(128, 128, 128, 0.212);background: white;margin: 100px 0px;">
        <style>
        </style>
        <!-- Trong template của bạn -->
        <div class="menu-edu">
            <div class="title-edu text-white p-3 fs-6 fw-bold">
                HỌC PHẦN
            </div>
            <ul class="list-menu">
                @foreach($education as $edu)
                <a class="text-decoration-none" href="{{ route('education.select', ['mahp' => $edu->mahp]) }}">
                    <li onclick="markAsActive(this)">{{ $edu->tenhp }}</li>
                </a>
                @endforeach
            </ul>
        </div>
        <style>
        .list-menu {
            max-height: 600px;
            /* Đặt chiều cao tối đa cho danh sách */
            overflow-y: auto;
            /* Kích hoạt thanh cuộn dọc khi nội dung vượt qua kích thước danh sách */
            padding-right: 15px;
            /* Tạo không gian cho thanh cuộn */
        }

        /* Tùy chỉnh thanh cuộn */
        .list-menu::-webkit-scrollbar {
            width: 10px;
            /* Độ rộng của thanh cuộn */
        }

        .list-menu::-webkit-scrollbar-thumb {
            background-color: #888;
            /* Màu của thanh cuộn */
            border-radius: 5px;
            /* Bo góc cho thanh cuộn */
        }
        </style>
        <div class="container m-3" style="background-color: #fff;">
            <section class="books" style="padding-top: 100px;">
                <h4 class="  position-relative h4-title" style="color: #504f7c">
                    @foreach ($educations as $edus)
                    <i class="fa-solid fa-paperclip"></i> {{$edus->tenhp}}: <span
                        class="text-danger">{{$edus->mahp}}</span>
                        @endforeach
                </h4>
                <div class=" swiper" style="width: 94%;">
                    <div class="swiper-wrapper gap-2 d-flex flex-wrap">
                        @foreach($products as $product)
                        <div class="swiper-slide col-xl-3 col-lg-4 col-sm-6 col-12" style="height: 350px;z-index: 3;">
                            <a class="text-black" href="{{ route('product.detail', ['id' => $product->product_id]) }}">
                                <img src="{{$product->product_img}}" alt="" />
                                <div class="text-book d-flex flex-column justify-content-center align-items-center ">
                                    <h2 class="new__title fs-6 pt-4 text-center">{{$product->product_name}}</h2>
                                    <div class="new__star">
                                        @if(!empty($product->totalstar))
                                        @for ($i = 0; $i < floor($product->totalstar); $i++)
                                            <i class="fa-solid fa-star"></i>
                                            @endfor
                                            @if ($product->totalstar - floor($product->totalstar) != 0)
                                            <i class="fa-regular fa-star-half-stroke"></i>
                                            @endif
                                            <SPAN>{{ number_format($product->totalstar, 1) }}</SPAN>
                                            @else
                                            <i class="fa-solid fa-star"></i>
                                            <SPAN>0.0</SPAN>
                                            @endif
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>

            </section>
        </div>

    </div>

</section>
@endsection
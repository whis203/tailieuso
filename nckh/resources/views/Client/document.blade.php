@extends('layouts.index')

@section('title', 'Tài liệu')

@section('content')
<div class="container mx-auto " style="border:1px solid rgba(128, 128, 128, 0.212);background: white;margin: 100px 0px;max-width: 1200px;">

    <div class="title-wrapper row">
        <div class="title col-lg-5">
            Tài Liệu Tham Khảo
        </div>
    </div>
    <div class="container">
        <p class="fs-6"><i class="fa-solid fa-tag text-success"></i> Gợi ý cho bạn:</p>
        <div class="mySwiper swiper">
            <div class="swiper-wrapper">
                @if(isset($products) && count($products) > 0)
                @foreach($products as $product)
                <div class="swiper-slide col-xl-3 col-lg-4 col-sm-6 col-12" style="height: 270px;">
                    <a class="text-black" href="{{ route('product.detail', ['id' => $product->product_id]) }}">
                        <img src="{{$product->product_img}}" alt="" />
                        <div class="text-book d-flex flex-column justify-content-center align-items-center ">
                            <h2 class="new__title fs-6 pt-2 text-center">{{$product->product_name}}</h2>
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
                @endif
            </div>
        </div>
    </div>
    @if(isset($production) && count($production) > 0)
    <section class="list__book border-1 m-0 p-0 mt-5" style="border-left: 1px solid rgb(207, 207, 207); border-right: 1px solid rgb(207, 207, 207);">
        <div class="container">
            <div class="row my-4">
                <div class="col-lg-7 col-sm-12">
                    <i class="fa-solid fa-bars"></i>
                </div>
                <div class="s003 col-lg-5 col-sm-12 d-flex justify-content-end">
                    <form action="{{ route('document.search') }}" method="GET" class="d-flex  row ">
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
                        <div class="inner-form pe-4">
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
            </div>
        </div>
        <div class="title d-flex align-content-center" style="background: #504f7c; height: 35px;">
            <span style="background: #717cb6; color: white; padding: 5px; font-size: 15px;">Danh Sách</span>
        </div>
        <div class="book">
            <div class="new__book__swiper swiper">
                <div class="swiper-wrapper d-flex  flex-column justify-content-between align-items-center">
                    @foreach($production as $product)
                    <div class="swiper-slide bg-white" style="max-width: 800px;">

                        <div class="d-flex justify-content-between align-items-center ">
                            <div class="img-book">
                                <img class="m-3" src="{{$product->product_img}}" alt>
                            </div>
                            <div class="text-book row">
                                <a class="text-black" href="{{ route('product.detail', ['id' => $product->product_id]) }}">
                                    <span class=" fs-5 fw-bold ">{{$product->product_name}}</span>
                                    <p style="height: 75px;" class="p-0 m-0 overflow-hidden fs-6 col-lg-12 col-md-10 col-sm-8 col-12 ">{{$product->product_detail}} <span>...</span></p>

                                    <div class="icon-book d-flex justify-content-between row">
                                        <div class="new__star  ">
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
                                        <div class="download-book col-lg-3 col-md-5 col-sm-8 col-12 ">
                                            <a href="{{$product->product_file}}" download="{{$product->product_name}}.pdf" style="padding: 10px;border-radius: 3px;font-size: 16px;border: none;background: #f8e559;color: #fff;"><i class="fa-solid fa-download"></i> Tải xuống</a>
                                        </div>
                                </a>

                            </div>
                            <div class="date-book">
                                <span style="font-size: 15px;color: #a3a3a3;margin-right: 20px;"><i class="fa-regular fa-calendar"></i> {{$product->created_at}}
                                </span>
                                <span style="font-size: 15px;color: #a3a3a3;margin-right: 20px;"><i class="fa-solid fa-eye"></i> {{$product->views}}</span>

                            </div>
                            <hr>
                        </div>
                    </div>

                </div>
                @endforeach
            </div>
        </div>
</div>
</div>
</section>
@endif
</div>
<nav aria-label="Page navigation example ">
    <ul class="pagination justify-content-center ">
        {{ $production->links() }}
    </ul>
</nav>
@endsection
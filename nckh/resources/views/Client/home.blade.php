@extends('layouts.index')

@section('title', 'Trang chủ')

@section('content')

<div class="banner" id="banner">

    <div class="container-fluid  row  ">

        <div class="container-title mt-5 col-lg-6 col-sm-12">
            <p class="fw-bold fs-1" style="color: #fbeaad">
                CHÀO MỪNG ĐÃ ĐẾN VỚI <br />
                <span class="multiple-text" style="color: #504f7c"></span>
            </p>
            <p class="fw-normal fs-6">
                Nơi giao lưu học hỏi kiến thức về công nghệ thông tin với rất
                nhiều <br />
                tài liệu tham khảo hữu ích.
            </p>
            @if(session()->has('user'))
            <a href="{{route('info.index')}}" class="button button-primary fs-6">Xin chào {{ session('user')['name'] }} !</a>
            @else
            <a href="{{route('signup.index')}}" class="button button-primary fs-6">Đăng kí ngay!</a>
            @endif
        </div>
        <div class="container-img py-5 col-lg-6 col-sm-12">
            <img style="
                width:90%;
                filter: drop-shadow(rgba(0, 0, 0, 0.35) 7px 10px 5px);
              " src="../img/books.jpg" alt="" />
        </div>
    </div>
</div>
<div class="container bg-white ">
    <section id="document" class="row justify-content-center align-items-center ">
        <br />
        <br />
        <h4 class="text-center p-4 position-relative h4-title" style="color: #504f7c">
            Tổng Hợp Tài Liệu
        </h4>
        <div class="articles">
            <article>
                <div class="article-wrapper article-one ">
                    <figure style="background-color: #80bcbd">
                        <img src="../img/thuongmaidientu-303.jpg" alt="" />
                    </figure>
                    <div class="article-body">
                        <h2>Tài liệu</h2>
                        <a href="{{ route('document.index')}}" class="read-more">
                            Tìm hiểu thêm
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>
            </article>
            <article>
                <div class="article-wrapper">
                    <figure style="background-color: #9eddff">
                        <img src="../img/5f44d4298582b.jpg" alt="" />
                    </figure>
                    <div class="article-body">
                        <h2>Sách bài tập</h2>
                        <a href="{{ route('document.index')}}" class="read-more">
                            Tìm hiểu thêm
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>
            </article>
            <article>
                <div class="article-wrapper article-three">
                    <figure style="background-color: #86b6f6">
                        <img src="../img/63da273418657.jpg" alt="" />
                    </figure>
                    <div class="article-body">
                        <h2>Giáo trình</h2>
                        <a href="{{ route('document.index')}}" class="read-more">
                            Tìm hiểu thêm
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>
            </article>
        </div>
    </section>
    <section class="books" style="padding-top: 100px;">
        <h4 class="text-center p-4 position-relative h4-title" style="color: #504f7c">
            Sách Phổ Biến
        </h4>
        @if(isset($products) && count($products) > 0)
        <div class="mySwiper swiper">
            <div class="swiper-wrapper">
                @foreach($products as $product)
                <div class="swiper-slide col-xl-3 col-lg-4 col-sm-6 col-12" style="height: 350px;">
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
                @endif
            </div>
        </div>
    </section>

    <section id="education">
        <br />
        <br />
        <h4 class=" text-center p-4 position-relative h4-title" style="color: #504f7c">
            Học Phần
        </h4>

        <div class="articles">
            @foreach($khoas as $k)
            <article>
                <div class="article-wrapper article-one">
                    <figure style="background-color: #9eddff">
                        <img src="../img/edu.jpg" alt="" />
                    </figure>
                    <div class="article-body">
                        <h2>{{$k->tenkhoa}}</h2>
                        <a href="{{ route('education.select', ['id' => $k->id]) }}" class="read-more"> <!-- Sử dụng 'khoa_id' thay vì 'id' -->
                            Tìm hiểu thêm
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>
            </article>
            @endforeach
        </div>
    </section>

    <section class="newbook" id="newbook" style="padding-top: 130px;">
        <h4 class="text-center p-4 position-relative h4-title" style="color: #504f7c">
            Sách Mới
        </h4>
        @if(isset($products) && count($products) > 0)
        <div class="new__container">
            <div class="new__swiper swiper">
                <div class="swiper-wrapper">
                    @foreach ($products as $product)
                    <div class="new__card swiper-slide">
                        <img src="{{ $product->product_img }}" alt="" class="new__img m-2">
                        <div class="card__overlay">
                            <a href="{{ route('product.addFavorite', ['id' => $product->product_id]) }}"><span class="icon__container favorite"><i class="fa-solid fa-heart "></i></span></a>
                            <a href="{{ route('product.detail', ['id' => $product->product_id]) }}"><span class="icon__container check"><i class="fa-solid fa-eye"></i></span></a>
                        </div>
                        <div class="new__title">
                            <h2 class="fs-6 text-uppercase ">{{ $product->product_name }}</h2>
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
                    </div>
                    @endforeach
                </div>
                <div class="swiper-button-prev">
                    <i class="ri-arrow-left-s-line"></i>
                </div>
                <div class="swiper-button-next">
                    <i class="ri-arrow-right-s-line"></i>
                </div>
            </div>
        </div>
        @else
        <p>No products available</p>
        @endif

</div>
</div>
</section>
</div>

@endsection
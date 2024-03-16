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
            <a href="{{route('info.index')}}" class=" button text-decoration-none fs-6"><span>Xin chào
                    {{ session('user')['name'] }}
                    !</span></a>
            @else
            <a href="{{route('signup.index')}}" class="button text-white fs-6">Đăng kí ngay!</a>
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

<div class="container">
    <section id="document" class="row justify-content-center align-items-center position-relative">
        <div class="d-flex flex-column  position-absolute align-items-start " style="top:70px ; color: #7C72FF;">
            <div class="border-one"
                style=" height: 210px;width: 4px;margin-left: 6px; border-radius:50% 50% 0px 0px;background: linear-gradient(transparent, #7C72FF 30%);">
            </div>
            <i class="fa-solid fa-folder-open fs-6" style="margin: 6px 0px;"></i>
            <div class="overflow-hidden">
                <div class="border-two "
                    style=" height: 400px;width: 4px;margin-left: 6px; border-radius:20px;background: linear-gradient(#7C72FF, #2DA44E 80%, #3FB950);">
                </div>
                <i class="fa-solid fa-book-open fs-6"></i>
                <div class="overflow-hidden">
                    <div class="border-one"
                        style=" height: 210px;width: 4px;margin-left: 6px; border-radius:0px 0px 50% 50% ;background: linear-gradient(rgb(63, 185, 80), rgb(46, 160, 67), transparent);">
                    </div>
                </div>
            </div>
        </div>
        <br />
        <br />
        <h4 class=" p-4 position-relative h4-title" style="color: #504f7c">
            <i class="fa-solid fa-tag"></i> Tổng Hợp Tài Liệu
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
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
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
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
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
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>
            </article>
        </div>
    </section>
    <div class=" m-3" style="background-color: #fff;">
        <section class="books" style="padding-top: 100px;">
            <h4 class=" p-4 position-relative h4-title" style="color: #504f7c">
                <i class="fa-solid fa-paperclip"></i> Gợi ý cho bạn
            </h4>
            @if(isset($products) && count($products) > 0)
            <div class="mySwiper swiper " style="width: 93%;">
                <div class="swiper-wrapper">
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
                    @endif
                </div>
            </div>
        </section>
        <section id="education">
            <br />
            <br />
            <h4 class=" p-4 position-relative h4-title" style="color: #504f7c">
            <i class="fa-solid fa-bookmark"></i> Học Phần
            </h4>
            <div class="articles ">
                @foreach($edus as $edu)
                <article>
                    <div class="article-wrapper article-one">
                        <figure style="background-color: #9eddff">
                            <img src="../img/edu.jpg" alt="" />
                        </figure>
                        <div class="article-body">
                            <h2>{{$edu->tenhp}}</h2>
                            <a href="{{ route('education.select', ['mahp' => $edu->mahp]) }}" class="read-more">
        
                                Tìm hiểu thêm
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </article>
                @endforeach
                <article style="height: auto; margin: 20px;"  >
                    <div class="article-wrapper bg-white border-0" style="padding: 0px 30px;" >
                        <a href="{{ route('education.select', ['mahp' => 'INF5200TD']) }}" class="read-more bg-white">
                            Xem tất cả ...
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </article>
            </div>

        </section>
    </div>

    <section class="newbook" id="newbook" style="padding-top: 130px;">
        <h4 class=" p-4 position-relative h4-title" style="color: #504f7c">
            <i class="fa-solid fa-book"></i> Sách Mới
        </h4>
        @if(isset($products) && count($products) > 0)
        <div class="new__container">
            <div class="new__swiper swiper">
                <div class="swiper-wrapper">
                    @foreach ($products as $product)
                    <div class="new__card swiper-slide">
                        <img src="{{ $product->product_img }}" alt="" class="new__img m-2">
                        <div class="card__overlay">
                            @if(session()->has('user'))
                            <button class="border-0 bg-transparent"
                                onclick="addFavoriteBtn('{{ $product->product_id }}')">
                                <span class="icon__container favorite"><i class="fa-solid fa-heart "></i></span>
                            </button>
                            @else
                            <a class="border-0 bg-transparent" href="{{route('signin.index')}}"
                               >
                                <span class="icon__container favorite"><i class="fa-solid fa-heart "></i></span>
                            </a>
                            @endif
                            <a href="{{ route('product.detail', ['id' => $product->product_id]) }}"><span
                                    class="icon__container check"><i class="fa-solid fa-eye"></i></span></a>
                        </div>
                        <div class="new__title">
                            <h2 class="fs-6  ">{{ $product->product_name }}</h2>
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
        <div class="container">
            <p>No products available</p>
        </div>

        @endif
        <div id="alertBox" class="alert-box">
            <span id="alertMessage"></span>
        </div>
</div>
</div>


<style>


#container {
    height: 700px;
    background: #1D2B53;
}

#container .sun {
    width: 111px;
    height: 111px;
    background: #F6F193;
    border-radius: 50%;
    position: relative;
    animation: starAnimation 5s linear infinite alternate;
    /* Thêm animation cho hiệu ứng lấp lánh */
}

#container .orbit {
    border: solid;
    border-color: #F6F5F5;
    border-radius: 50%;
    border-width: 1px 1px 0 0;
    box-sizing: border-box;
    transform: rotate(0deg);
    transform-origin: center;
    position: absolute;
}

#container .orbit#earth-orbit {
    animation: orbit 36.5s linear infinite;
    height: 300px;
    width: 300px;
}

#container .orbit#moon-orbit {
    animation: orbit 2.7s linear infinite;
    height: 100px;
    width: 100px;
    left: -25px;
    top: -25px;
}

#container .orbit .globe {
    border-radius: 50%;
    position: absolute;
}

#container .orbit .globe#earth {
    background: aqua;
    height: 50px;
    width: 50px;
    right: 100px;
    top: 270px;
    box-shadow: 0 0 25px aqua;

}

#container .orbit .globe#moon {
    background: #d6d6d6;
    height: 25px;
    width: 25px;
    right: 25px;
    top: 85px;
    box-shadow: 0 0 15px white;
}

@keyframes orbit {
    to {
        transform: rotate(360deg);
    }
}

@keyframes orbit1 {
    to {
        transform: rotate(360deg);
    }
}

@media screen and (max-width: 768px) {
    .hero {
        flex-direction: column;
    }
}



@keyframes starAnimation {
    0% {
        box-shadow: 0 0 5px yellow, 0 0 10px yellow, 0 0 20px yellow, 0 0 30px yellow, 0 0 40px yellow, 0 0 50px yellow, 0 0 60px yellow, 0 0 70px yellow;
    }

    100% {
        box-shadow: 0 0 12px yellow, 0 0 24px yellow, 0 0 36px yellow, 0 0 48px yellow, 0 0 60px yellow, 0 0 72px yellow, 0 0 84px yellow, 0 0 96px yellow;
    }
}
</style>

<div class="container-fluid d-flex justify-content-center align-items-center position-relative " id="container">
    <div class="sun"></div>
    <div class="orbit" id="earth-orbit">
        <div class="globe" id="earth">
            <div class="orbit" id="moon-orbit">
                <div class="globe" id="moon"></div>
            </div>
        </div>
    </div>
</div>


</section>
</div>


@endsection
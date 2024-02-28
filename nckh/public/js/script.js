jQuery(function ($) {
    $(window).on("scroll", function () {
        if ($(this).scrollTop() >= 200) {
            $(".navbar").addClass("fixed-top");
        } else if ($(this).scrollTop() == 0) {
            $(".navbar").removeClass("fixed-top");
        }
    });
});
ScrollReveal({
    reset: true,
    distance: "70px",
    duration: 1000,
    delay: 100,
});
ScrollReveal().reveal(".container-title", { origin: "top" });
ScrollReveal().reveal(".container-img", { origin: "bottom" });
ScrollReveal().reveal(".h4-title", { origin: "top" });
// ScrollReveal().reveal(".article-three", { origin: "right" });
// ScrollReveal().reveal(".article-one", { origin: "left" });

window.addEventListener("load", () => {
    const loader = document.querySelector(".container-loader");

    loader.classList.add("loader-hidden");

    loader.addEventListener("transitionend", () => {
        document.body.removeChild(".container-loader");
    });
});

var Favorite = new Swiper(".mySwiper-Favorite", {
    loop: true,
    spaceBetween: 16,
    slidesPerView: "auto",
    breakpoints: {
        1150: {
            slidesPerView: 4,
        },
    },
});
var swiper = new Swiper(".mySwiper-book", {
    loop: false,
    spaceBetween: 16,
    slidesPerView: "auto",
    breakpoints: {
        1150: {
            slidesPerView: 5,
        },
    },
    autoplay: {
        delay: 3000,
        disableOnInteraction: false,
    },
});

let swiperNewAuto = new Swiper(".new__swiper__auto", {
    loop: true,
    spaceBetween: 16,
    slidesPerView: "auto",
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    breakpoints: {
        1150: {
            slidesPerView: 3,
        },
    },
    autoplay: {
        delay: 3000, // Đặt độ trễ giữa các lần chuyển slide (đơn vị là milliseconds)
        disableOnInteraction: false, // Tắt tự động chuyển slide khi người dùng tương tác với swiper
    },
});
function focusOnInput() {
    // Tìm ô nhập và tập trung vào nó
    document.getElementById("nameInput").focus();
}
document.addEventListener("DOMContentLoaded", function (event) {
    var swiper = new Swiper(".mySwiper", {
        loop: true,
        spaceBetween: 16,
        slidesPerView: "auto",
        breakpoints: {
            1150: {
                slidesPerView: 4,
            },
        },
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
    });
});

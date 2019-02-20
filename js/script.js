/*************************SLICK******************************/

$(document).ready(function () {
    $(".testimonial-carousel").slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        arrows: false,
        dots: false,
        prevArrow: $(".testimonial-carousel-controls .prev"),
        nextArrow: $(".testimonial-carousel-controls .next"),
        responsive: [{
                breakpoint: 992,
                settings: {
                    slidesToShow: 1
                }
            }, {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1
                }
            }, {
                breakpoint: 520,
                settings: {
                    slidesToShow: 1
                }
            }]
    });
});


$(document).ready(function () {
    $(".clients-carousel").slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        arrows: false,
        dots: false,
        prevArrow: $(".clients-carousel-controls .prev"),
        nextArrow: $(".clients-carousel-controls .next"),
        responsive: [{
                breakpoint: 992,
                settings: {
                    slidesToShow: 3
                }
            }, {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2
                }
            }, {
                breakpoint: 520,
                settings: {
                    slidesToShow: 2
                }
            }]
    });
});
/*************************SLICK_END******************************/
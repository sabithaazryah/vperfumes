
// jQuery to collapse the navbar on scroll
$(window).scroll(function() {
    if ($(".main_head").offset().top > 200) {
        $(".fixed-top").addClass("top-nav-collapse");
    } else {
        $(".fixed-top").removeClass("top-nav-collapse");
    }
});







const nextIcon = '<img src="/assets/images/next_arrow.png" alt=""/>';
const prevIcon = '<img src="/assets/images/prev_arrow.png" alt=""/>';
$(document).ready(function(){
    $(".owl-carousel-hot-products").owlCarousel({
        nav: true,
        dots: false,
        checkVisible: false,
        items: 4,
        margin: 19,
        autoplay: false,
        navText: [prevIcon, nextIcon]
    });

    $(".owl-carousel-top-products").owlCarousel({
        nav: true,
        dots: false,
        checkVisible: false,
        items: 4,
        margin: 19,
        autoplay: false,
        navText: [prevIcon, nextIcon]
    });

    $(".owl-carousel-gallery-products").owlCarousel({
        nav: true,
        dots: false,
        items: 3,
        autoplay: false,
        navText: [prevIcon, nextIcon]
    });

});





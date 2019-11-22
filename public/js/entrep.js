$(document).ready(function(){

    $('.bg-slides').slick({
        dots: false,
        infinite: true,
        speed: 700,
        slidesToShow: 1,
        fade:true,
        autoplay: true,
        autoplaySpeed: 3500,
    });

    $('.reason-slides').slick({
        dots: true,
        infinite: true,
        speed: 1300,
        slidesToShow: 1,
        fade:true,
        autoplay: true,
        autoplaySpeed: 10000,
    });

    $('.event-slides').slick({
        dots: false,
        infinite: true,
        speed: 800,
        slidesToShow: 1,
        // fade:true,
        autoplay: true,
        autoplaySpeed: 5000,
    });




});
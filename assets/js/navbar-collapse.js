/// some script
$(function() {
    'use strict'
    $("[data-trigger]").on("click", function() {
        var trigger_id = $(this).attr('data-trigger');
        $(trigger_id).toggleClass("show");
        $('body').toggleClass("offcanvas-active");
        $('nav').removeClass("bg-dark");
        $('nav').removeClass("navbar-dark");
        $('nav').addClass("bg-light");
        $('nav').addClass("navbar-light");
    });

    // close if press ESC button 
    $(document).on('keydown', function(event) {
        if (event.keyCode === 27) {
            $(".navbar-collapse").removeClass("show");
            $("body").removeClass("overlay-active");
        }
    });

    // close button 
    $(".btn-close").click(function(e) {
        $(".navbar-collapse").removeClass("show");
        $("body").removeClass("offcanvas-active");
        $('nav').addClass("bg-dark");
        $('nav').addClass("navbar-dark");
        $('nav').removeClass("bg-light");
        $('nav').removeClass("navbar-light");
    });

    $(".cart").click(function(e) {
        $(".navbar-collapse").removeClass("show");
        $('nav').addClass("bg-dark");
        $('nav').addClass("navbar-dark");
        $('nav').removeClass("bg-light");
        $('nav').removeClass("navbar-light");
    });

    $("#list").click(function(e) {
        $(".navbar-collapse").removeClass("show");
        $('nav').addClass("bg-dark");
        $('nav').addClass("navbar-dark");
        $('nav').removeClass("bg-light");
        $('nav').removeClass("navbar-light");
    });

    $(".dropdown-item").click(function(e) {
        $(".navbar-collapse").removeClass("show");
        $('nav').addClass("bg-dark");
        $('nav').addClass("navbar-dark");
        $('nav').removeClass("bg-light");
        $('nav').removeClass("navbar-light");
    });

    $(window).resize(function() {
        if ($(window).width() > 992) {
            $('nav').addClass("bg-dark");
            $('nav').addClass("navbar-dark");
            $('nav').removeClass("bg-light");
            $('nav').removeClass("navbar-light");
        }
    });
})
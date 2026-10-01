$(document).ready(function() {

    // =========================
    // Mobile Navigation Toggle
    // =========================

    $('#nav-toggle').on('click', function() {
        $('#nav-menu').toggleClass('active');
    });


    // Close mobile menu when link is clicked

    $('.nav-link').on('click', function() {
        $('#nav-menu').removeClass('active');
    });


    // =========================
    // Smooth Scrolling
    // =========================

    $('a[href^="#"]').on('click', function(event) {

        var target = $(this.getAttribute('href'));

        if (target.length) {

            event.preventDefault();

            $('html, body').stop().animate({
                scrollTop: target.offset().top - 70
            }, 600);
        }
    });


    // =========================
    // Active Navigation Link
    // =========================

    $(window).on('scroll', function() {

        var scrollPos = $(document).scrollTop() + 100;

        $('.nav-link').each(function() {

            var currLink = $(this);
            var refElement = $(currLink.attr('href'));

            if (
                refElement.length &&
                refElement.position().top <= scrollPos &&
                refElement.position().top + refElement.height() > scrollPos
            ) {

                $('.nav-link').removeClass('active');
                currLink.addClass('active');
            }
        });
    });


    // =========================
    // Theme Toggle
    // =========================

    const themeToggle = $('#theme-toggle');
    const themeIcon = $('#theme-icon');

    function setTheme(theme) {

        if (theme === 'light') {

            $('body').addClass('light-theme');

            themeIcon.removeClass('fa-sun');
            themeIcon.addClass('fa-moon');

            themeToggle.attr('aria-label', 'Switch to dark mode');
            themeToggle.attr('title', 'Switch to dark mode');

        } else {

            $('body').removeClass('light-theme');

            themeIcon.removeClass('fa-moon');
            themeIcon.addClass('fa-sun');

            themeToggle.attr('aria-label', 'Switch to light mode');
            themeToggle.attr('title', 'Switch to light mode');
        }

        localStorage.setItem('portfolio-theme', theme);
    }


    // Load saved theme

    const savedTheme = localStorage.getItem('portfolio-theme');

    if (savedTheme) {
        setTheme(savedTheme);
    } else {
        setTheme('dark');
    }


    // Toggle theme

    themeToggle.on('click', function() {

        if ($('body').hasClass('light-theme')) {
            setTheme('dark');
        } else {
            setTheme('light');
        }

    });


    // =========================
    // Initialize Swiper
    // =========================

    var swiper = new Swiper('.project-slider', {

        slidesPerView: 1,

        spaceBetween: 20,

        loop: true,

        autoplay: {
            delay: 4000,
            disableOnInteraction: false,
        },

        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },

        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },

        breakpoints: {
            768: {
                slidesPerView: 2,
                spaceBetween: 30,
            }
        }
    });

});
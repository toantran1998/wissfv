var script = document.createElement('script');
script.src = 'https://code.jquery.com/jquery-3.4.1.min.js';
script.type = 'text/javascript';
document.getElementsByTagName('head')[0].appendChild(script);

$(document).ready(function() {
    window.addEventListener('scroll', () => {
        if (window.scrollY > 300) {
            $('header').removeClass("transparent-header")
            $('header').addClass("sticky-header");
            document.getElementById("brand-logo").src = './images/black-logo.jpg';

        } else {
            $('header').removeClass("sticky-header")
            $('header').addClass("transparent-header");
            document.getElementById("brand-logo").src = './images/logo-alternative.jpg';
        }
    });
    $('.menu-icon').click(function() {
        $('.navbar-main-brand').addClass("menu-mobile-active");
        $('.menu-icon').addClass("menu-mobile-active");
    });
    $('.close-icon').click(function() {
        $('.navbar-main-brand').removeClass("menu-mobile-active");
        $('.menu-icon').removeClass("menu-mobile-active");
    });
    $(window).click(function() {
        var div = document.querySelector('.navbar-collapse');
        if (div.classList.contains('show'))
            $('.close-icon').trigger("click");
    });
});
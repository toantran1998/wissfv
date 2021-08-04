$(document).ready(function() {
    // //Show header when scroll down
    // var scrollPos = 0;
    // // adding scroll event
    // window.addEventListener('scroll', function() {
    //     // detects new state and compares it with the new one
    //     if ((document.body.getBoundingClientRect()).top > scrollPos) {
    //         $('header').removeClass("navbar-showon")
    //         $('header').addClass("hiden");
    //     } else {
    //         $('header').removeClass("hiden")
    //         $('header').addClass("navbar-showon");
    //     }
    //     // saves the new position for iteration.
    //     scrollPos = (document.body.getBoundingClientRect()).top;
    // });

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
});
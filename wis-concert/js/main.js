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

    //Schedule picker 
    $('.btn-schedule').click(function() {
        var $target = $(this).data('target');
        var prevBtnActive = document.getElementsByClassName("btn-schedule-active")[0];
        prevBtnActive.classList.remove("btn-schedule-active");
        var prevScheduleActive = document.getElementsByClassName("schedule-active")[0];
        prevScheduleActive.classList.remove("schedule-active")
        $(this).addClass("btn-schedule-active");
        $($target).addClass("schedule-active");
    });

    //Counter count
    // $('.count-number').each(function() {
    //     $(this).prop('Counter', 0).animate({
    //         Counter: $(this).text()
    //     }, {
    //         duration: 2000,
    //         easing: 'swing',
    //         step: function(now) {
    //             $(this).text(Math.ceil(now));
    //         }
    //     });
    // });

    // Get the modal
    var modal = document.getElementById("myModal");

    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
    $('.img-popup').click(function() {
        console.log(this);
        modal.style.display = "block";
        modalImg.src = this.src;
        captionText.innerHTML = this.alt;
    });

    var span = document.getElementsByClassName("close")[0];

    span.onclick = function() {
        modal.style.display = "none";
    }

});
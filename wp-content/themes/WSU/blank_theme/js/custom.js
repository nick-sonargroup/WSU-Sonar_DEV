// SWIPER
var mySwiper = new Swiper('.swiper-container', {
    // Optional parameters
    direction: 'horizontal',
    loop: true,

    // If we need pagination
    pagination: '.swiper-pagination',

    // Navigation arrows
    nextButton: '.swiper-button-next',
    prevButton: '.swiper-button-prev',

    // And if we need scrollbar
    scrollbar: '.swiper-scrollbar',
})


// HAMBURGER CHANGE TO X ON OPEN
$(function() {
    //toggle class open on button
    $('#myNavbar').on('hide.bs.collapse', function() {
        $('.navbar-toggler').removeClass('open');
    })
    $('#myNavbar').on('show.bs.collapse', function() {
        $('.navbar-toggler').addClass('open');
    })
});
        
// MENU BAR CHANGES ON SCROLL
//function init() {
    window.addEventListener('scroll', function(e) {
        var distanceY = window.pageYOffset || document.documentElement.scrollTop,
            shrinkOn = 120,
            header = document.querySelector("#myTopMenu");
        if (distanceY > shrinkOn) {
            classie.add(header, "smaller");
        } else {
            if (classie.has(header, "smaller")) {
                classie.remove(header, "smaller");
            }
        }
    });
//}
//window.onload = init();
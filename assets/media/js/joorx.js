function navbar() {
    $(document).ready(function (){
        $("#buttonnews").click(function (){
           $('html, body').animate({
            scrollTop: $("#news").offset().top
           }, 1800);
        });
        $("#buttongallery").click(function (){
           $('html, body').animate({
            scrollTop: $("#gallery").offset().top
           }, 2600);
        });
    });
}

$(document).ready(function(){
    $(window).scroll(function(){
        if ($(window).scrollTop() > 140) {
            $('.button-scroll').fadeIn();
        } else {
            $('.button-scroll').fadeOut();
        }
    });
});

function scrolltotop()
{
    $('html, body').animate({scrollTop : 0},400);
}

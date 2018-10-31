var $multiple_menus = '.home, .mail';
var $all_menus = '.burger_menu, .home, .mail';

$('.burger_menu').click(function() {
    $(this).toggleClass('toggle_burger');

    setTimeout(function() {
        $('.home').toggleClass('toggle_home');
    }, 100);

    setTimeout(function() {
        $('.mail').toggleClass('toggle_mail');
    }, 400);

}); // "burger" to "X"

$($all_menus).click(function() {
    $(this).siblings().css({
        'z-index': '5'
    }); //hide siblings of the clicked menu under the current clicked menu
    $(this).css({
        'z-index': '10'
    }); //show current clicked item on top of the others
});

//full page layout
$('main i.fa').click(function() {
    $(this).parent().toggleClass('freeze');

    setTimeout(function() {
        $('.circle_background').addClass('scale');
    }, 500);

    if ($(this).parent().hasClass('freeze')) {
        $($multiple_menus).addClass('hide');
    }
});

//Close menu
$('i.icon_close').click(function() {
    $('.burger_menu').addClass('toggle_burger');

    $(this).parent().fadeOut("slow");
    setTimeout(function() {
        $('.circle_background').removeClass('scale');
        $('i.home-ico, i.envelope-ico').fadeIn("slow");
    }, 400);
    setTimeout(function() {
        $($multiple_menus).css({
            'z-index': '4'
        }).removeClass('hide freeze');
    }, 700);

    $('.circle_background').css({
        'z-index': '2'
    });
});

//////////////////////////////////////////////////////////////////
/*
// Home full page layout content into view
*/
//////////////////////////////////////////////////////////////////
$('i.home-ico').click(function() {
    setTimeout(function() {
        $('i.home-ico').fadeOut("fast");
    }, 500);
    setTimeout(function() {
        $('.home_content').fadeIn("slow");
    }, 1000);
});

//////////////////////////////////////////////////////////////////
/*
// Mail full page layout content into view
*/
//////////////////////////////////////////////////////////////////
$('i.envelope-ico').click(function() {
    setTimeout(function() {
        $('i.envelope-ico').fadeOut("fast");
    }, 500);
    setTimeout(function() {
        $('.mail_content').fadeIn("slow");
    }, 1000);
});
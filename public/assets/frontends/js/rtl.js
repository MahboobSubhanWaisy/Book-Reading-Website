$(document).ready(function(){
    var current_lang = $('#current-language').val();
    if(current_lang == 'fa' || current_lang == 'pa')
    {
        $('.wrapper').addClass('rtl');
        $('.mean-container .mean-nav ul li a').addClass('mean-nav-rtl');
        $('.owl-theme').addClass('owl-theme-rtl');
        $('.center').addClass('slider-center-rtl');
        $('.copyright__wrapper').addClass('copyright__wrapper__rtl');
        $('div.product__info__main').has("h1").css("text-align", "right");
        $('#btn-pdf-download').css('margin-right', '1rem');
        $('.description__attribute').css("text-align", "right");
        $('.review-section').css("direction",'ltr');
        $('.comment-rtl').css("direction",'ltr');
        $('.header__sidebar__right').css("direction",'ltr');
        $('.switcher-label').addClass('text-align-right');
        $('.setting__menu a').attr('class','text-align-right');
        $('.account__title').css('text-align','right');
        $('.input__box label').css('text-align','right');
        $('.input__box input').addClass('indent');
        $('.form__btn label').css('float','right');
        $('.forget_pass').css("text-align", "right");
        $('.logo').css('text-align','center');
        $('.wn_contact_area').css('direction','rtl');
        $('.content').css({'text-align': 'right', 'margin-right': '1rem'});
        $('.contact__title').css("text-align", "right");
        $('.contact-btn').css('float','right');
        $('.page__header').css('text-align','right');
        $('.widget-title').css('text-align','right');
    }
});
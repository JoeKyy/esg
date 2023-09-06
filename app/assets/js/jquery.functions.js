$(function () {
    $('.nav-button').click(function(){
		if (!$(this).hasClass('is-active')) {
			$(this).addClass('is-active');
			$('.menu nav').addClass('nav-menu--open');
			$('.menu nav').removeClass('nav-menu--close');
		} else {
			$(this).removeClass('is-active');
			$('.menu nav').removeClass('nav-menu--open');
			$('.menu nav').addClass('nav-menu--close');
		}
	});

	$('header .menu nav ul li a').click(function(){
		if ($('.nav-button').hasClass('is-active')) {
			$('.nav-button').removeClass('is-active');
			$('.menu nav').removeClass('nav-menu--open');
			$('.menu nav').addClass('nav-menu--close');
		}
	});
});
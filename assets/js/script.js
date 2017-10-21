$(document).ready(function(){
	$('.login-btn').click(function(){
		$('.account-container').addClass("active");
	});

	$('.burger-menu').click(function(){
		$('.primary-menu').addClass("active");
		$('body').addClass("js-move-left");
		$('.main-content').addClass("main-content-blured");
	});

	$('.primary-menu-close').click(function(){
		$('.primary-menu').removeClass("active");
		$('body').removeClass("js-move-left");
		$('.main-content').removeClass("main-content-blured");
	});
});
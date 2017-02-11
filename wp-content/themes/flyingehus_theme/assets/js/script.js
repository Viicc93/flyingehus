$(document).ready(function(){
	$('#primarynav').addClass('nav navbar-nav');

	$(window).on( 'resize', function () {
			$('.post-img').height( $('.post-img').width() / 1.5 );
	}).resize();
	$(window).on( 'resize', function () {
			$('.hero-img').height( $('.hero-img').width() / 1.8 );
	}).resize();
});

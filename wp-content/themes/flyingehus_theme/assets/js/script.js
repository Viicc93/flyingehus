$(document).ready(function(){
		if (document.body.offsetWidth > 768) {

	    $('.navbar-nav .dropdown').hover(function() {
	      $(this).find('.dropdown-menu').first().stop(true, true).delay(250).slideDown();
	    }, function() {
	      $(this).find('.dropdown-menu').first().stop(true, true).delay(100).slideUp();
	    });

	  }
	$(window).on( 'resize', function () {
			$('.post-img').height( $('.post-img').width() / 1.5 );
	}).resize();
	$(window).on( 'resize', function () {
			$('.hero-img').height( $('.hero-img').width() / 1.8 );
	}).resize();
});

$(document).ready(function() {
	/**
	*	Slick Slider
	*/
	$('.main-slider').not('.slick-initialized').slick({
	  dots: true,
	  arrows: true,
	  infinite: true,
	  speed: 500,
	  autoplay: true,
	  fade: true,
	  cssEase: 'linear'
	});
});

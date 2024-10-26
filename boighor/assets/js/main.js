/*********************************************************************************

	Template Name: Karbar - Multipurpose Bootstrap 4 Template   
	Description: Karbar is a best templete for your corporate/business website which comes with unique design and user friendly code.  
	Version: 1.0

	Note: This is main js.

**********************************************************************************/

(function($) {
    "use strict";
/*--
    Menu Sticky
-----------------------------------*/
var $window = $(window);
$window.on('scroll', function() {
	var scroll = $window.scrollTop();
	if (scroll < 300) {
		$(".sticker").removeClass("stick");
	}else{
		$(".sticker").addClass("stick");
	}
});

    
$('a[href*="#"]:not([href="#"])').click(function() {
if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
  var target = $(this.hash);
  target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
  if (target.length) {
	$('html, body').animate({
	  scrollTop: target.offset().top - 75
	}, 1000);
	return false;
  }
}
});
    
/*--
	Counter UP
-----------------------------------*/
$('.counter').counterUp({
    delay: 20,
    time: 3000
});


})(jQuery);




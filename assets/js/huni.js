(function($) {
	$(document).ready( function() {
		$('.hamburger-menu').click(function(){
			$('.hamburger-menu').toggleClass("active");
			$('.header-flex').toggleClass("active");
			$('header').toggleClass("inverted");
		});
		
		$('.huni-search').click(function(){
			$('.huni-modal-search').show(200);
		});
		$('.huni-modal-search .close').click(function(){
			$('.huni-modal-search').hide(200);
		});
		
		$('.huni-open-toggle').click(function(e){
			e.preventDefault();
			//$(this).closest('li').find('.sub-menu').toggleClass('active');
			$(this).closest('li').find('.sub-menu').slideToggle("slow");
			$(this).toggleClass('active');
		});
		
		
	});
	
	
	$(window).scroll(function() {
		var sticky = $('body:not(.header-type-left) header .header-wrap'),
			scroll = $(window).scrollTop();
			headerHeight=$('header').outerHeight();

		if (scroll > 50){
			$('body:not(.header-type-left) header').css('height',headerHeight);

			sticky.addClass('sticky');
		}
		else{
			sticky.removeClass('sticky');
			$('body:not(.header-type-left) header').css('padding-top',"");
			$('body:not(.header-type-left) header').css('height','auto');


		}
	});

		
})(jQuery)


jQuery(document).ready(function($) {

	jQuery('.hover_type').animate({
		opacity : 1
	});

	jQuery(".port_img, .sort_img").hover(function() {
		jQuery(this).find('.hover_type').css({
			display : 'block'
		}).animate({
			opacity : 1,
			bottom : (jQuery('.port_img, .sort_img').height()) / 2 - 20 + 'px'
		}, 200);
		jQuery(this).find('img').fadeTo(300, 0.4);

	}, function() {
		jQuery(this).find('.hover_type').animate({
			opacity : 0,
			bottom : '100%'
		}, 200, function() {
			jQuery(this).css({
				'bottom' : '0'
			});
		});
		jQuery(this).find('img').fadeTo(300, 1);
	});

});

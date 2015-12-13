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
	
	 var win_width = jQuery(window).width();

            if (win_width < 759) {

                if (!jQuery('.menu-dropdown').length) {

                    jQuery('<a class="menu-dropdown" href="ul#sf-mobilemenu" />').appendTo('.header');
                    this.mobilemenuclick();
                }
            } else {
                jQuery("#sf-mobilemenu").css('display', 'none');
            }
            
             jQuery('.header .menu-dropdown').click(function (e) {
                jQuery("#sf-mobilemenu").stop().slideToggle(500);
                e.preventDefault();
            });
			jQuery('.menu-item').click(function () {
				jQuery("#sf-mobilemenu").css('display', 'none');
			});
	
	
	

});

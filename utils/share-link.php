<?php

	define( 'THEME_URI', get_template_directory_uri() );
	echo '<div style="height:20px;"></div>';
	echo '<strong>'._e('Share','m1studio').':</strong>';
	echo '<ul class="atpsocials share">';

	// Google+
	if ( get_option( 'atp_google_enable' ) == 'on' ){ ?>
	<li class="google"><a href="http://www.google.com/bookmarks/mark?op=edit&amp;bkmk=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>&amp;annotation=<?php the_title(); ?>" ><img src="<?php echo THEME_URI ?>/images/sociables/google.png" alt="Google+"  /></a></li>	
	<?php
	}
	// Linkdedin
	if ( get_option('atp_linkedIn_enable') == 'on' ) { ?>
	<li class="linkedin"><a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>&amp;summary="<?php the_title(); ?>><img src="<?php echo THEME_URI ?>/images/sociables/linkedin.png" alt="Linkdedin"  /></a></li>
	<?php
	}
	// DiggIt
	if ( get_option('atp_digg_enable') == 'on') { ?>
	<li class="digg"><a href="http://digg.com/submit?phase=2&amp;url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>&amp;bodytext=<?php the_title(); ?>"><img src="<?php echo THEME_URI ?>/images/sociables/digg.png" alt="Digg"  /></a></li>
	<?php 
	}
		// StumbleUpon
	if ( get_option('atp_stumbleupon_enable') =='on'){ ?>
	<li class="stumbleupon"><a href="http://www.stumbleupon.com/submit?url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>" rel="nofollow external"><img src="<?php echo THEME_URI ?>/images/sociables/stumbleupon.png" alt="StumbleUpon"  /></a></li>
	<?php 
	}
	// Pinterest
	if ( get_option('atp_pinterest_enable') == 'on') { ?>
	<li class="pinterest"><a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&title=<?php the_title(); ?>"><img src="<?php echo THEME_URI ?>/images/sociables/pinterest.png" alt="Pinterest"  /></a></li>
	<?php 
	}
	// Twitter
	if ( get_option('atp_twitter_enable') == 'on' ) { ?>
	<li class="twitter"><a href="http://twitter.com/home?status=<?php the_title(); ?> - <?php the_permalink(); ?>"><img src="<?php echo THEME_URI ?>/images/sociables/twitter.png" alt="Twitter"  /></a></li>
	<?php 
	}
	// Facebook
	if ( get_option('atp_facebook_enable') == 'on' ){ ?>
	<li class="facebook"><a href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>&amp;t=<?php the_title(); ?>"><img src="<?php echo THEME_URI ?>/images/sociables/facebook.png" alt="Facebook"  /></a></li>
	<?php 
	}
	
	echo '</ul>';

?>
<?php

//Includes the header.php template file from your current theme's directory
get_header();
?>

	<div id="primary" class="pagemid">
		<div class="inner">
			<div class="content-area">
				<?php 
				$imagesPerPage= '30';
				$pagination = "on";
				$gallery_list = miu_get_images($post_id=null);
				?>
				<div <?php post_class('custompost-single'); ?> id="post-<?php the_ID(); ?>">
					<div class="custompost_entry">
						<div class="custompost_details">
							<div class="custompost_thumb">
								
								<?php 
								
								if($pagination == "on"){
									if ( empty($gallery_list) ) return false;
									$imageCount = count($gallery_list);
									$pageCount = ceil($imageCount / $imagesPerPage);
									$currentPage = intval($_GET['page']);
									if ( get_query_var('paged') ) {
										$currentPage = get_query_var('paged');
									}
									elseif ( get_query_var('page') ) {
										$currentPage = get_query_var('page');
									} else {
										$currentPage = 1;  
									}
									if ( empty($currentPage) || $currentPage<=0 ) $currentPage=1;
									$maxImage = $currentPage * $imagesPerPage;
									$minImage = ($currentPage-1) * $imagesPerPage;
									
									if ($pageCount > 1){
										$page_link= get_permalink();
										$page_link_perma= true;
										if ( strpos($page_link, '?')!==false )
											$page_link_perma= false;
						
										$gplist= '<div class="clear"></div><div class="pagination pagination2">'.__('Pages').'&nbsp; ';
										for ( $j=1; $j<= $pageCount; $j++){
											if ( $j==$currentPage )
												$gplist .= '<span class="current"> '.$j.' </span>';
											else
												$gplist .= '<a class="inactive" href="'.$page_link. ( ($page_link_perma?'?':'&amp;') ). 'page='.$j.'">'.$j.'</a>';
										}
						
										$gplist .= '</div>';
									}else
										$gplist= '';
									if($gallery_list !=''){
										$i = 0;
										$k = 0;
										foreach($gallery_list as $image) {
											if ($k >= $minImage && $k < $maxImage) {
												$image_id = get_attachment_id_from_src($image);
												$attachment = get_post( $image_id);
												$alt = get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true );
												$title = $attachment->post_title;
												$out .='<div class="gallery-postimg port_img">';
												$out .= theme_resize('',$image,'180','180','',$alt);										
												$out .='<div class="hover_type">';
												$out .='<a data-rel="prettyPhoto[gal-mixed]" class="hoverimage"   href="' . $image . '" title="' . $title . '">';
												$out .='<i class="fa fa-search fa-2x services-icon"></i></a>';
												$out .='</div>'; 
												$out .='</div>';
											}
											$k++;
										}
									}
										$out .= $gplist;
								}else{
									if($gallery_list !=''){
										foreach($gallery_list as $image) {
											if( count($gallery_list) > 0){
												
												$image_id = get_attachment_id_from_src($image);
												$attachment = get_post( $image_id);
												$alt = get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true );
												$title = $attachment->post_title;
												$out .='<div class="gallery-postimg port_img">';
												$out .= theme_resize('',$image,'180','180','',$alt);										
												$out .='<div class="hover_type">';
												$out .='<a data-rel="prettyPhoto[gal-mixed]" class="hoverimage"   href="' . $image . '" title="' . $title . '">';
												$out .='<i class="fa fa-search fa-2x services-icon"></i></a>';
												$out .='</div>'; 
												$out .='</div>';
											}
										}
									}
								}
								echo $out;
								?>
							</div>
						</div>
						<div class="demospace" style="height:20px;"></div>

						<?php the_content(); ?>

						<?php echo share_link(); ?>

						<div class="demospace" style="height:20px;"></div>
					</div>
					
				</div>

			</div><!-- .content-area -->
		</div><!-- .inner -->
	</div><!-- #primary.pagemid -->

<?php get_footer(); ?>
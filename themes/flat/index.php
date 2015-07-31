<?php

/*
* @Author 		ParaTheme
* @Folder	 	post-grid/includes

* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access



	include post_grid_plugin_dir.'/grid-items/variables.php';
	

	$html .= '<div style="background:url('.$post_grid_bg_img.');" class="post-grid-container-main" >';

	$html .= '<div class="popup-container " ><div class="box"></div></div >';

	$html .= '<div class="post-grid-container post-grid-container-'.$post_id.' '.$post_grid_themes.' " >'; 
	$html .= '<div class="post-grid-items" >'; 

	include post_grid_plugin_dir.'/grid-items/query.php';
	
	if ( $wp_query->have_posts() ) :
	while ( $wp_query->have_posts() ) : $wp_query->the_post();

	if(get_post_format( get_the_ID() ))
		{
			$post_formats_class = 'post-formats';
		}
	else
		{
			$post_formats_class = '';
		}

	$html .= '<div class="grid-single '.$post_formats_class.'" style="max-width:'.$post_grid_items_width.';" >';
	
	foreach($post_grid_items as $key=>$items)
		{
			if(!empty($post_grid_items_display[$key]))
				{
					include post_grid_plugin_dir.'/grid-items/'.$key.'.php';
				}	
		}
	$html .= '</div >';	
		
	endwhile;
	
	
	$html .= '</div >';	

	include post_grid_plugin_dir.'/grid-items/pagination.php';					

	wp_reset_query();
	endif;
		
	$html .= '</div>';
	$html .= '</div>';

	if($post_grid_masonry_enable == 'yes' )
		{
			$html .= '<script>
			jQuery(document).ready(function($) {
				// init Isotope
				$(".post-grid-items").isotope({});
			});
			</script>';	

			$html .= '<style type="text/css">.post-grid-container-'.$post_id.' .post-grid-items{margin: 0 auto !important;}</style>';

		}
	
	
				$html .= '<script>
					jQuery(document).ready(function($) {

		
	
					});		
				</script>';
	
	
	
	
	
	
			$html .= '<script>
			jQuery(document).ready(function($) {
				$(document).on("mouseenter", ".post-grid-container-'.$post_id.' .grid-single", function()
					{
		
						$(this).children(".hover-items").addClass("animated '.$post_grid_hover_items_hover_effect_in.'");
		
						
						
					})
			});
			</script>';			
	
	
	
	
	$html .= '<style type="text/css">
	
			.post-grid-container-'.$post_id.' iframe {
			  height: '.$post_grid_thumb_height.' !important;						  
			}
			</style>
			';

	
	include post_grid_plugin_dir.'/grid-items/custom-css.php';
	include post_grid_plugin_dir.'/grid-items/scripts.php';
	
	


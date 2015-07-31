<?php
/*
* @Author: 		ParaTheme
* @Folder:		Team/Templates
* @version:		3.0.5

* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 


	$post_grid_post_meta_fields = get_post_meta($post_id, 'post_grid_post_meta_fields', true );
	
	if(empty($post_grid_post_meta_fields))
		{
			$post_grid_post_meta_fields = '';
		}
									
	$post_grid_post_meta_fields = explode(',', $post_grid_post_meta_fields);
	if(!empty($post_grid_wrapper[$key]['start']))
		{
			$html .=$post_grid_wrapper[$key]['start'];
		}
	else
		{
			$html .= '<div class="meta-fields">';
		}
		
	if(!empty($post_grid_before_after[$key]['before']))
		{
			$html .= $post_grid_before_after[$key]['before'];
		}
	else
		{
			$html .= '';
		}
		
		
	foreach($post_grid_post_meta_fields as $meta_key)
		{
			$meta_value = get_post_meta(get_the_ID(), $meta_key, true );
			if(!empty($meta_value) && !is_array($meta_value))
				{
					$html .= '<div  class="meta-single">';
					$html .= do_shortcode($meta_value);		
					$html .= '</div >';
				}

		}
	
	
	
	if(!empty($post_grid_before_after[$key]['after']))
		{
			$html .= $post_grid_before_after[$key]['after'];
		}
	else
		{
			$html .= '';
		}



	if(!empty($post_grid_wrapper[$key]['end']))
		{
			$html .=$post_grid_wrapper[$key]['end'];
		}
	else
		{
			$html .= '</div >';	
		}


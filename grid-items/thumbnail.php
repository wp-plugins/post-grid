<?php
/*
* @Author: 		ParaTheme
* @Folder:		Team/Templates
* @version:		3.0.5

* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 

	$html_thumb = '';

	$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), $post_grid_thumb_size );
	$thumb_url = $thumb['0'];		

	$external_thumb = get_post_meta( get_the_ID(), $post_grid_post_thumbnail_external, true );
	if(!empty($external_thumb))
		{
			$thumb_url = $external_thumb;
		}

	if($post_grid_themes == 'rounded')
		{
			$thumb_height = 'height:'.$post_grid_thumb_height.';';
		}
	else
		{
			$thumb_height = 'max-height:'.$post_grid_thumb_height.';';
		}


	$html .= '<div class="thumb" style="'.$thumb_height.'" >';


	if(empty($thumb_url))
		{
			$thumb_url = $post_grid_empty_thumb;
		}


	$post_format = get_post_format( get_the_ID() );

	if($post_format=='video')
		{
			
			$html_thumb.= post_grid_first_embed_media(get_the_ID() );
		}
		
	elseif($post_format=='audio')
		{
			$html_thumb.= post_grid_first_embed_media(get_the_ID() );
		}	
		
	elseif($post_format=='link')
		{
			$html_thumb.= '<div class="post-format-link">';
			$html_thumb.= post_grid_get_link_url();
			$html_thumb.= '</div>';
		}								
	elseif($post_format=='quote')
		{
			$html_thumb.= '<div class="post-format-quote">';
			$html_thumb.= post_grid_get_blockquote();
			$html_thumb.= '</div>';
		}								
	elseif($post_format=='gallery')
		{
			$html_thumb.= '<div class="gallery owl-carousel">';
			$gallery = get_post_gallery( get_the_ID(), false );
			
			/* Loop through all the image and output them one by one */
			foreach( $gallery['src'] as $src )
				{
					$html_thumb .= '<img src="'.$src.'" class="gallery-item" alt="Gallery image" />';
				}
			$html_thumb.= '</div>';
		}
		
		
	else
		{
			if($post_grid_post_thumbnail_linked == 'yes')
				{
					$html_thumb .= '<a href="'.get_the_permalink().'"><img post_id="'.get_the_ID().'" src="'.$thumb_url.'" /></a>';
				}
			else
				{
					$html_thumb .= '<img post_id="'.get_the_ID().'" src="'.$thumb_url.'" />';
				}	
		}


	$html .= apply_filters( 'post_grid_filter_thumb', $html_thumb );

	$html .= '</div >';	
	
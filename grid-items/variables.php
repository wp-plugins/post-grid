<?php
/*
* @Author: 		ParaTheme
* @Folder:		Team/Templates
* @version:		3.0.5

* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 

		$post_grid_themes = get_post_meta( $post_id, 'post_grid_themes', true );
		$post_grid_masonry_enable = get_post_meta( $post_id, 'post_grid_masonry_enable', true );		
		
		$post_grid_bg_img = get_post_meta( $post_id, 'post_grid_bg_img', true );		
		$post_grid_thumb_size = get_post_meta( $post_id, 'post_grid_thumb_size', true );
		$post_grid_empty_thumb = get_post_meta( $post_id, 'post_grid_empty_thumb', true );		
			
		$post_grid_post_per_page = get_post_meta( $post_id, 'post_grid_post_per_page', true );		
		$post_grid_pagination_display = get_post_meta( $post_id, 'post_grid_pagination_display', true );		

		$post_grid_excerpt_count = get_post_meta( $post_id, 'post_grid_excerpt_count', true );		
		$post_grid_read_more_text = get_post_meta( $post_id, 'post_grid_read_more_text', true );					
		
		
		$post_grid_bg_img = get_post_meta( $post_id, 'post_grid_bg_img', true );
		
		$post_grid_items_width = get_post_meta( $post_id, 'post_grid_items_width', true );
		$post_grid_items_width_mobile = get_post_meta( $post_id, 'post_grid_items_width_mobile', true );				
		$post_grid_thumb_height = get_post_meta( $post_id, 'post_grid_thumb_height', true );	

		$post_grid_query_order = get_post_meta( $post_id, 'post_grid_query_order', true );
		$post_grid_query_orderby = get_post_meta( $post_id, 'post_grid_query_orderby', true );		
		$post_grid_posttype = get_post_meta( $post_id, 'post_grid_posttype', true );
				
		
		$post_grid_meta_author_display = get_post_meta( $post_id, 'post_grid_meta_author_display', true );
		$post_grid_meta_avatar_display = get_post_meta( $post_id, 'post_grid_meta_avatar_display', true );			
		$post_grid_meta_date_display = get_post_meta( $post_id, 'post_grid_meta_date_display', true );				
		$post_grid_meta_categories_display = get_post_meta( $post_id, 'post_grid_meta_categories_display', true );
		$post_grid_meta_tags_display = get_post_meta( $post_id, 'post_grid_meta_tags_display', true );		
		$post_grid_meta_comments_display = get_post_meta( $post_id, 'post_grid_meta_comments_display', true );		
		
		
		
		$post_grid_items = get_post_meta( $post_id, 'post_grid_items', true );		
		$post_grid_wrapper = get_post_meta( $post_id, 'post_grid_wrapper', true );
		$post_grid_before_after = get_post_meta( $post_id, 'post_grid_before_after', true );			
		$post_grid_items_display = get_post_meta( $post_id, 'post_grid_items_display', true );		
		
		$post_grid_post_title_linked = get_post_meta( $post_id, 'post_grid_post_title_linked', true );		
		$post_grid_post_thumbnail_linked = get_post_meta( $post_id, 'post_grid_post_thumbnail_linked', true );
		$post_grid_post_thumbnail_external = get_post_meta( $post_id, 'post_grid_post_thumbnail_external', true );					
			
		$post_grid_hover_items_link_display = get_post_meta( $post_id, 'post_grid_hover_items_link_display', true );		
		$post_grid_hover_items_share_display = get_post_meta( $post_id, 'post_grid_hover_items_share_display', true );		
		
		$post_grid_hover_items_hover_effect_in = get_post_meta( $post_id, 'post_grid_hover_items_hover_effect_in', true );
		
			
		$post_grid_custom_css = get_post_meta( $post_id, 'post_grid_custom_css', true );			


		
		if ( wp_is_mobile() )
			{
				$post_grid_items_width = $post_grid_items_width_mobile;
			}	
		

		
		if(empty($post_grid_items))
			{
			$post_grid_items = array('post_title'=>'Title',
											'content'=>'Content',
											'thumbnail'=>'Thumbnail',
											'meta'=>'Meta',
											'social'=>'Social',
											'hover_items'=>'Hover Items',
											'woocommerce'=>'WooCommerce'
											);
			}
		
		if(empty($post_grid_items_display))
			{
			$post_grid_items_display = array('post_title'=>'on',
											'content'=>'on',
											'thumbnail'=>'on',
											'meta'=>'on',
											'social'=>'on',
											'hover_items'=>'on',
											'woocommerce'=>'on'
											);
			}		
		
		
		
		
		
		
		
		if(empty($post_grid_read_more_text))
			{
				$post_grid_read_more_text = 'Read More.';
			}
			
		if(empty($post_grid_excerpt_count))
			{
				$post_grid_excerpt_count = 30;
			}

		
		if ( get_query_var('paged') ) {
		
			$paged = get_query_var('paged');
		
		} elseif ( get_query_var('page') ) {
		
			$paged = get_query_var('page');
		
		} else {
		
			$paged = 1;
		
		}

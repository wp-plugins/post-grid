<?php
/*
* @Author: 		ParaTheme
* @Folder:		Team/Templates
* @version:		3.0.5

* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 


	if(!empty($post_grid_taxonomy))
		{
			$wp_query = new WP_Query(
				array (
					'post_type' => $post_grid_posttype,
					'post_status' => 'publish',
					'tax_query' => array(
						array(
							   'taxonomy' => $post_grid_taxonomy,
							   'field' => 'id',
							   'terms' => $post_grid_taxonomy_category,
						)
					),					
					'orderby' => $post_grid_query_orderby,
					'order' => $post_grid_query_order,
					'posts_per_page' => $post_grid_post_per_page,
					'paged' => $paged,

					) );	
		}
	else
		{
			$wp_query = new WP_Query(
				array (
					'post_type' => $post_grid_posttype,
					'post_status' => 'publish',
					'orderby' => $post_grid_query_orderby,
					'order' => $post_grid_query_order,
					'posts_per_page' => $post_grid_post_per_page,
					'paged' => $paged,
					
					) );
		}
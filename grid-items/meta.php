<?php
/*
* @Author: 		ParaTheme
* @Folder:		Team/Templates
* @version:		3.0.5

* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 


	$html_meta = '';
	
	
	$html .= '<div class="meta">';					

	
	
	$tags = get_the_tags(get_the_ID());
	if(empty($tags))
	{
	$tags = array();
	}
	$tags_links = '';
	
	foreach ($tags  as $tag)
	{
	$tags_links .= '<a href="'.get_tag_link($tag->term_id).'" >#'.$tag->name.'</a> ';
	
	}
	
	$categories = get_the_category();
	$separator = ', ';
	$category_output = '';
	if($categories){
		foreach($categories as $category) {
		$category_output .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
		}
	
		}			


	
	
	if($post_grid_meta_avatar_display == 'yes')
		{
			$html_meta .= '<span class="avatar">'.get_avatar(get_the_author_meta( 'ID' ), 80 ).'</span>';
		}
	else
		{
			$html_meta .= '<span class="avatar-icon"></span>';
		}
	
	
	
	if($post_grid_meta_author_display == 'yes')
	$html_meta .= '<span class="author">'.get_the_author().'</span>';
	
	if($post_grid_meta_date_display == 'yes')		
	$html_meta .= '<span class="date">'.get_the_date('M d Y').'</span>';	
	
	if(!empty($category_output) && $post_grid_meta_categories_display == 'yes')
	$html_meta .= '<span class="cayegory">'.trim($category_output, $separator).'</span>';
	
	if(!empty($tags_links) && $post_grid_meta_tags_display == 'yes')
	$html_meta .= '<span class="tags">'.$tags_links.'</span>';
	
	$total_comments = wp_count_comments( get_the_ID() );
	if($post_grid_meta_comments_display == 'yes')		
	$html_meta .= '<span class="comments">'.$total_comments->approved.'</span>';	
	
	
	$html .= apply_filters( 'post_grid_filter_meta', $html_meta );

	$html .= '</div >';
<?php


function post_grid_themes_rounded($post_id)
	{
		
		$post_grid_themes = get_post_meta( $post_id, 'post_grid_themes', true );
		$post_grid_masonry_enable = get_post_meta( $post_id, 'post_grid_masonry_enable', true );		
		
		$post_grid_bg_img = get_post_meta( $post_id, 'post_grid_bg_img', true );		
		$post_grid_thumb_size = get_post_meta( $post_id, 'post_grid_thumb_size', true );
		$post_grid_empty_thumb = get_post_meta( $post_id, 'post_grid_empty_thumb', true );		
			
		$post_grid_post_per_page = get_post_meta( $post_id, 'post_grid_post_per_page', true );
		$post_grid_social_share_position = get_post_meta( $post_id, 'post_grid_social_share_position', true );
		$post_grid_social_share_display = get_post_meta( $post_id, 'post_grid_social_share_display', true );		
		$post_grid_pagination_display = get_post_meta( $post_id, 'post_grid_pagination_display', true );		
		
		$post_grid_read_more_position = get_post_meta( $post_id, 'post_grid_read_more_position', true );
		$post_grid_read_more_hov_in_style = get_post_meta( $post_id, 'post_grid_read_more_hov_in_style', true );
		$post_grid_excerpt_count = get_post_meta( $post_id, 'post_grid_excerpt_count', true );		
		$post_grid_read_more_text = get_post_meta( $post_id, 'post_grid_read_more_text', true );					
		
		$post_grid_bg_img = get_post_meta( $post_id, 'post_grid_bg_img', true );
		$post_grid_items_width = get_post_meta( $post_id, 'post_grid_items_width', true );			
		//$post_grid_thumb_width = get_post_meta( $post_id, 'post_grid_thumb_width', true );	
		$post_grid_thumb_height = get_post_meta( $post_id, 'post_grid_thumb_height', true );	

		$post_grid_posttype = get_post_meta( $post_id, 'post_grid_posttype', true );
		
		$post_grid_meta_author_display = get_post_meta( $post_id, 'post_grid_meta_author_display', true );		
		$post_grid_meta_date_display = get_post_meta( $post_id, 'post_grid_meta_date_display', true );				
		$post_grid_meta_categories_display = get_post_meta( $post_id, 'post_grid_meta_categories_display', true );
		$post_grid_meta_tags_display = get_post_meta( $post_id, 'post_grid_meta_tags_display', true );		
		$post_grid_meta_comments_display = get_post_meta( $post_id, 'post_grid_meta_comments_display', true );		
		
		
		if(empty($post_grid_read_more_text))
			{
				$post_grid_read_more_text = 'Read More.';
			}
			
		if(empty($post_grid_excerpt_count))
			{
				$post_grid_excerpt_count = 30;
			}



		$html  = '';
		$html .= '<div style="background:url('.$post_grid_bg_img.');" class="post-grid-container-main" >'; 	
		$html .= '<div class="post-grid-container post-grid-container-'.$post_id.' '.$post_grid_themes.' " >'; 
		$html .= '<div class="post-grid-items" >'; 
		
		$wp_query = new WP_Query(
			array (
				'post_type' => $post_grid_posttype,
				'post_status' => 'publish',
				'posts_per_page' => $post_grid_post_per_page,
				'paged' => get_query_var( 'paged' )
				
				) );

		if ( $wp_query->have_posts() ) :
		
		while ( $wp_query->have_posts() ) : $wp_query->the_post();
		$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), $post_grid_thumb_size );
		$thumb_url = $thumb['0'];	
			
		if(empty($thumb_url))
			{
			$thumb_url = $post_grid_empty_thumb;
			}
		
		$html .= '<div class="grid-single" style="max-width:'.$post_grid_items_width.';" >';	
		$html .= '<div class="thumb" style=" width:'.$post_grid_items_width.';height:'.$post_grid_items_width.';" ><img src="'.$thumb_url.'" />';
		
		$html .= '<div class="link '.$post_grid_read_more_position.' '.$post_grid_read_more_hov_in_style.'" ><a href="'.get_the_permalink().'">'.$post_grid_read_more_text.'</a></div >';
		
		
		if($post_grid_social_share_display=='yes')
			{
			$html .= '<div class="social-icon '.$post_grid_social_share_position.'" >
				<span class="fb">
					<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u='.get_permalink().'"> </a>
				</span>
				<span class="twitter">
					<a target="_blank" href="https://twitter.com/intent/tweet?url='.get_permalink().'&text='.get_the_title().'"></a>
				</span>
				<span class="gplus">
					<a target="_blank" href="https://plus.google.com/share?url='.get_permalink().'"></a>
				</span>
			</div >';
			}

		
		
		
		$html .= '</div>';
		
		
		
		
	$categories = get_the_category();
	$separator = ', ';
	$category_output = '';
	if($categories){
		foreach($categories as $category) {
			$category_output .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
		}
	
	}
		
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
		
		
		$total_comments = wp_count_comments( get_the_ID() );
		
		$html .= '<div class="meta" >';
		
		if($post_grid_meta_date_display == 'yes')		
		$html .= '<span class="date">'.get_the_date('M d Y').'</span>';	
		
		if($post_grid_meta_author_display == 'yes')
		$html .= '<span class="author">'.get_the_author().'</span>';
		
		if(!empty($category_output) && $post_grid_meta_categories_display == 'yes')
		$html .= '<span class="cayegory">'.trim($category_output, $separator).'</span>';
		
		if(!empty($tags_links) && $post_grid_meta_tags_display == 'yes')
		$html .= '<span class="tags">'.$tags_links.'</span>';
		
		if($post_grid_meta_comments_display == 'yes')		
		$html .= '<span class="comments">'.$total_comments->approved.'</span>';	
			
		$html .= '</div >';	
	
		
		$html .= '<div class="title" >'.get_the_title().'</div >';
		

			
		$content = get_the_content();
		$content =  wp_trim_words( $content , $post_grid_excerpt_count, ' <a class="read-more" href="'.get_the_permalink().'">'.$post_grid_read_more_text.'</a>' );
		
		
		
		
		$html .= '<div class="content" >'.$content.'</div >';



		
		
		
		$html .= '</div >';		
		endwhile;
		
		$html .= '</div >';			
		
		
		
		
		
				
		if($post_grid_pagination_display == 'yes')
			{
				$html .= '<div class="paginate">';
				$big = 999999999; // need an unlikely integer
				$html .= paginate_links( array(
					'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
					'format' => '?paged=%#%',
					'current' => max( 1, get_query_var('paged') ),
					'total' => $wp_query->max_num_pages
					) );
			
				$html .= '</div >';	
			}					

		//$html .= '<div class="load-more"><span postid="'.$post_id.'" per_page="'.$post_grid_post_per_page.'" offset="'.$post_grid_post_per_page.'" class="load">Load More</span></div >';

		
		
		
		wp_reset_query();
		endif;
			
		$html .= '</div >';
		$html .= '</div >';		
		
		
		
		
		if($post_grid_masonry_enable == 'yes' )
			{
				$html .= '<script>
				jQuery(document).ready(function($) {
				var container = document.querySelector(".post-grid-container-'.$post_id.' .post-grid-items");
				var msnry = new Masonry( container, {isFitWidth: true
				
				});
				});
				</script>';	
				
				
				
				$html .= '<style type="text/css">
				
						.post-grid-container-'.$post_id.' .post-grid-items {
						  margin: 0 auto !important;
						}
						</style>
						';

			}
		
		
		
		
		return $html;
	}
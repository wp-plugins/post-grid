<?php

/*
* @Author 		ParaTheme
* @Folder	 	post-grid/includes

* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access



function post_grid_get_blockquote() {
	
    $content = get_the_content();
    $content = apply_filters( 'the_content', $content );	
	preg_match('~<blockquote>([^{]*)</blockquote>~i', $content, $match);
	return $match[1];
	
}




function post_grid_get_link_url() {
    $content = get_the_content();
    $has_url = get_url_in_content( $content );

    $link =  ( $has_url ) ? $has_url : apply_filters( 'the_permalink', get_permalink() );
	
	return '<a href="'.$link.'">'.$link.'</a>';
	
}

function post_grid_first_embed_media($post_id ) {


    $post = get_post($post_id);
    $content = do_shortcode( apply_filters( 'the_content', $post->post_content ) );
    $embeds = get_media_embedded_in_content( $content );

    if( !empty($embeds) ) {
        //return first embed
        return $embeds[0];

    } else {
        //No embeds found
        return false;
    }

}


























// solve error replace #038; by &

function post_grid_fix_pagination($link) {
	
	return str_replace('#038;', '&', $link);
	
	}
add_filter('paginate_links', 'post_grid_fix_pagination');




	function post_grid_share_plugin()
		{
			
			?>
<iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwordpress.org%2Fplugins%2Fwoocommerce-products-slider%2F&amp;width&amp;layout=standard&amp;action=like&amp;show_faces=true&amp;share=true&amp;height=80&amp;appId=652982311485932" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:80px;" allowTransparency="true"></iframe>
            
            <br />
            <!-- Place this tag in your head or just before your close body tag. -->
            <script src="https://apis.google.com/js/platform.js" async defer></script>
            
            <!-- Place this tag where you want the +1 button to render. -->
            <div class="g-plusone" data-size="medium" data-annotation="inline" data-width="300" data-href="<?php echo post_grid_share_url; ?>"></div>
            
            <br />
            <br />
            <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo post_grid_share_url; ?>" data-text="<?php echo post_grid_plugin_name; ?>" data-via="ParaTheme" data-hashtags="WordPress">Tweet</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>



            <?php
			
			
			
		
		
		}
	
	
	

		
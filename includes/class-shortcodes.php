<?php

/*
* @Author 		ParaTheme
* @Folder	 	post-grid/includes

* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access

class class_post_grid_shortcodes{
	
	
    public function __construct()
    {
		
		add_shortcode( 'post_grid', array( $this, 'post_grid_display' ) );

    }
	
	public function post_grid_display($atts, $content = null ) {
			$atts = shortcode_atts(
				array(
					'id' => "",
	
					), $atts);
	
				$html  = '';
				$post_id = $atts['id'];
	
				$post_grid_themes = get_post_meta( $post_id, 'post_grid_themes', true );
				
				$class_post_grid_functions = new class_post_grid_functions();
				$post_grid_themes_dir = $class_post_grid_functions->post_grid_themes_dir();
				$post_grid_themes_url = $class_post_grid_functions->post_grid_themes_url();

				//var_dump($post_grid_themes_url);
				
				
				$html.= '<link  type="text/css" media="all" rel="stylesheet"  href="'.$post_grid_themes_url[$post_grid_themes].'/style.css" >';

				include $post_grid_themes_dir[$post_grid_themes].'/index.php';
	
				return $html;
	
	
	}

	
	
	
	
	}

new class_post_grid_shortcodes();
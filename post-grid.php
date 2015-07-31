<?php
/*
Plugin Name: Post Grid
Plugin URI: http://paratheme.com
Description: Awesome post grid for query post from any post-type and display on grid.
Version: 1.7
Author: paratheme
Author URI: http://paratheme.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 


class PostGrid{
	
	
	public function __construct(){
		
		define('post_grid_plugin_url', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );
		define('post_grid_plugin_dir', plugin_dir_path( __FILE__ ) );
		define('post_grid_wp_url', 'https://wordpress.org/plugins/post-grid/' );
		define('post_grid_wp_reviews', 'http://wordpress.org/support/view/plugin-reviews/post-grid' );
		define('post_grid_pro_url','http://paratheme.com/items/post-grid-awesome-grid-for-any-post-type/' );
		define('post_grid_demo_url', 'http://paratheme.com/demo/post-grid/' );
		define('post_grid_conatct_url', 'http://paratheme.com/contact/' );
		define('post_grid_qa_url', 'http://paratheme.com/qa/' );
		define('post_grid_plugin_name', 'Post Grid' );
		define('post_grid_version', '1.7' );
		define('post_grid_customer_type', 'free' );	 
		
		define('post_grid_share_url', 'https://wordpress.org/plugins/post-grid/' );
		define('post_grid_tutorial_video_url', '//www.youtube.com/embed/JsDfu6LXtj4' );
		

		
		include( 'includes/class-functions.php' );
		include( 'includes/class-shortcodes.php' );
		include( 'includes/class-settings.php' );		
		include( 'includes/post-grid-meta.php' );		
		include( 'includes/post-grid-functions.php' );
		include( 'includes/PostGridClass.php' );				
		

		
		add_action( 'wp_enqueue_scripts', array( $this, 'post_grid_scripts_front' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'post_grid_scripts_admin' ) );
		add_action( 'admin_enqueue_scripts', 'wp_enqueue_media' ); 
		
		}
		
		
		
	public function post_grid_install(){
		
		do_action( 'post_grid_action_install' );
		
		}		
		
	public function post_grid_uninstall(){
		
		do_action( 'post_grid_action_uninstall' );
		}		
		
	public function post_grid_deactivation(){
		
		do_action( 'post_grid_action_deactivation' );
		}
		
		
		
		
		
		
		
		
	public function post_grid_scripts_front(){
		wp_enqueue_script('jquery');

		wp_enqueue_style('post_grid_style', post_grid_plugin_url.'css/style.css');
		wp_enqueue_script('post_grid_scripts', plugins_url( '/js/scripts.js' , __FILE__ ) , array( 'jquery' ));
		wp_localize_script('post_grid_scripts', 'post_grid_ajax', array( 'post_grid_ajaxurl' => admin_url( 'admin-ajax.php')));
		wp_enqueue_script('masonry.pkgd.min', plugins_url( '/js/masonry.pkgd.min.js' , __FILE__ ) , array( 'jquery' ));
		wp_enqueue_script('owl.carousel', plugins_url( '/js/owl.carousel.js' , __FILE__ ) , array( 'jquery' ));
		wp_enqueue_style('owl.carousel', post_grid_plugin_url.'css/owl.carousel.css');
		wp_enqueue_style('owl.theme', post_grid_plugin_url.'css/owl.theme.css');
		wp_enqueue_style('font-awesome', post_grid_plugin_url.'css/font-awesome.css');		
		wp_enqueue_style('style-woocommerce', post_grid_plugin_url.'css/style-woocommerce.css');
		wp_enqueue_style('animate', post_grid_plugin_url.'css/animate.css');
		
		}
		
		
	public function post_grid_scripts_admin(){
			
		wp_enqueue_script('jquery');
		wp_enqueue_script('jquery-ui-core');
		wp_enqueue_script('jquery-ui-sortable');
		wp_enqueue_script('jquery-ui-droppable');
						
		wp_enqueue_script('post_grid_admin_js', plugins_url( '/admin/js/scripts.js' , __FILE__ ) , array( 'jquery' ));
		wp_localize_script( 'post_grid_admin_js', 'post_grid_ajax', array( 'post_grid_ajaxurl' => admin_url( 'admin-ajax.php')));

		wp_enqueue_style('post_grid_admin_style', post_grid_plugin_url.'admin/css/style.css');

		//ParaAdmin
		wp_enqueue_style('ParaAdmin', post_grid_plugin_url.'ParaAdmin/css/ParaAdmin.css');		
		wp_enqueue_script('ParaAdmin', plugins_url( 'ParaAdmin/js/ParaAdmin.js' , __FILE__ ) , array( 'jquery' ));
	
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'post_grid_color_picker', plugins_url('/js/color-picker.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
		
		
		}		
		
		
	
	}

new PostGrid();


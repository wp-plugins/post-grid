<?php

/*
* @Author 		ParaTheme
* @Folder	 	post-grid/includes

* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access

class class_post_grid_functions{
	
	public function __construct(){
		
		
		}
	
	
	public function post_grid_themes(){
		
		$themes = array(
					'flat'=>'Flat',		
					'rounded'=>'Rounded',												
					);

			foreach(apply_filters( 'post_grid_themes', $themes ) as $theme_key=> $theme_name)
				{
					$theme_list[$theme_key] = $theme_name;
				}

			
			return $theme_list;
			
		}






		
	public function post_grid_themes_dir($themes_dir = array())
		{
			$main_dir = post_grid_plugin_dir.'themes/';
			
			$themes_dir = array(
							'flat'=>$main_dir.'flat',
							'big-thumbnail'=>$main_dir.'big-thumbnail',
							'rounded'=>$main_dir.'rounded',
							'price-table'=>$main_dir.'price-table',
							'event'=>$main_dir.'event',
							'mixit'=>$main_dir.'mixit',					
							'isotope'=>$main_dir.'isotope',	
							'left-right'=>$main_dir.'left-right',						
							);
			
			foreach(apply_filters( 'post_grid_themes_dir', $themes_dir ) as $theme_key=> $theme_dir)
				{
					$theme_list_dir[$theme_key] = $theme_dir;
				}

			
			return $theme_list_dir;

		}


	public function post_grid_themes_url($themes_url = array())
		{
			$main_url = post_grid_plugin_url.'themes/';
			
			$themes_url = array(
							'flat'=>$main_url.'flat',
							'big-thumbnail'=>$main_url.'big-thumbnail',
							'rounded'=>$main_url.'rounded',
							'price-table'=>$main_url.'price-table',
							'event'=>$main_url.'event',
							'mixit'=>$main_url.'mixit',					
							'isotope'=>$main_url.'isotope',	
							'left-right'=>$main_url.'left-right',							
							);
			
			foreach(apply_filters( 'post_grid_themes_url', $themes_url ) as $theme_key=> $theme_url)
				{
					$theme_list_url[$theme_key] = $theme_url;
				}

			return $theme_list_url;

		}








	
	
	}
	
//new class_post_grid_functions();
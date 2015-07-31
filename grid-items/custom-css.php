<?php

/*
* @Author 		ParaTheme
* @Folder	 	Team/Templates
* @version     3.0.5

* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 
	
		
	if(!empty($post_grid_custom_css))
			{
				$html .= '<style type="text/css">'.$post_grid_custom_css.'</style>';	
			}
<?php
/*
* @Author: 		ParaTheme
* @Folder:		Team/Templates
* @version:		3.0.5

* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 


	$html_title = apply_filters( 'post_grid_filter_title', get_the_title(get_the_ID()) );	

	$html .= '<div  class="title">';
	if($post_grid_post_title_linked == 'yes')
		{
		$html .= '<a href="'.get_the_permalink(get_the_ID()).'">'.$html_title.'</a>';
		}
	else
		{
			$html .= $html_title;
		}
		
	$html .= '</div >';	

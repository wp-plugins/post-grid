<?php
/*
* @Author: 		ParaTheme
* @Folder:		Team/Templates
* @version:		3.0.5

* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 


		$html .='<script>
		jQuery(document).ready(function($)
		{
			$(".post-grid-container-'.$post_id.' .gallery").owlCarousel({
				
				items : 1, //10 items above 1000px browser width
				itemsDesktop : [1000,1], //5 items between 1000px and 901px
				itemsDesktopSmall : [900,1], // betweem 900px and 601px
				itemsTablet: [600,1], //2 items between 600 and 0
				itemsMobile : [479,1], 
				navigationText : ["",""],
				autoPlay: true,
				stopOnHover: true,
				navigation: true,
				pagination: false,
				paginationNumbers: true,
				slideSpeed: 500,
				paginationSpeed: 1000,
				touchDrag : true,
				mouseDrag  : true,
				';
	
				
		$html .='});
		
		});';
		$html .= '</script>';
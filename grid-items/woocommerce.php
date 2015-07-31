<?php
/*
* @Author: 		ParaTheme
* @Folder:		Team/Templates
* @version:		3.0.5

* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 



	$is_product = get_post_type( get_the_ID() );
	$active_plugins = get_option('active_plugins');
	
	if(in_array( 'woocommerce/woocommerce.php', (array) $active_plugins ) && $is_product=='product')
		{
		$html .= '<div class="pg-woocommerce">';
	
		global $woocommerce, $product;
		
		$price = $product->get_price_html();
		$cart = do_shortcode('[add_to_cart id="'.get_the_ID().'"]');
		$rating = $product->get_average_rating();
		$rating = (($rating/5)*100);
		$html .= '<div class="pg-price">'.$price.'</div>';
		$html .= '<div class="pg-cart">'.$cart.'</div>';
		
		if($rating <=0 )
			{
				
			}
		else
			{
				$html .= '<div class="pg-rating woocommerce"><div class="woocommerce-product-rating"><div class="star-rating" title="Rated '.$rating.'"><span style="width:'.$rating.'%;"></span></div></div></div>';
			}
								
	
		$html .= '</div >';	
	
		}

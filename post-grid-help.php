<?php	

	if(empty($_POST['post_grid_hidden']))
		{
			//$post_grid_ribbons = get_option( 'post_grid_ribbons' );
			
			
		}
	else
		{
					
				
		if($_POST['post_grid_hidden'] == 'Y') {
			//Form data sent

			//$post_grid_ribbons = stripslashes_deep($_POST['post_grid_ribbons']);
			//update_option('post_grid_ribbons', $post_grid_ribbons);
			
		
			
					

			?>
			<div class="updated"><p><strong><?php _e('Changes Saved.' ); ?></strong></p></div>

			<?php
		} 
	}
	
	
	
    $post_grid_customer_type = get_option('post_grid_customer_type');
    $post_grid_version = get_option('post_grid_version');
	
	
	
	
	
?>





<div class="wrap">

	<div id="icon-tools" class="icon32"><br></div><?php echo "<h2>".__(post_grid_plugin_name.' Help')."</h2>";?>
		<form  method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
	<input type="hidden" name="post_grid_hidden" value="Y">
        <?php settings_fields( 'post_grid_plugin_options' );
				do_settings_sections( 'post_grid_plugin_options' );
			
		?>
        
        
	<div class="para-settings">
        <ul class="tab-nav"> 
            <li nav="1" class="nav1 active">Help & Support</li>

        </ul> <!-- tab-nav end -->
    
		<ul class="box">
            <li style="display: block;" class="box1 tab-box active">
            
				<div class="option-box">
                    <p class="option-title">Need Help ?</p>
                    <p class="option-info">Feel free to contact with any issue for this plugin, Ask any question via forum <a href="<?php echo post_grid_qa_url; ?>"><?php echo post_grid_qa_url; ?></a> <strong style="color:#139b50;">(free)</strong><br />
                    </p>

                </div>
                
				<div class="option-box">
                    <p class="option-title">Upgrade</p>
                    <p class="option-info">
					<?php
                
                    if($post_grid_customer_type=="free")
                        {
                    
                            echo 'You are using <strong> '.$post_grid_customer_type.' version  '.$post_grid_version.'</strong> of <strong>'.post_grid_plugin_name.'</strong>, To get more feature you could try our premium version. ';
                            
                            echo '<br /><a href="'.post_grid_pro_url.'">'.post_grid_pro_url.'</a>';
                            
                        }
                    else
                        {
                    
                            echo 'Thanks for using <strong> premium version  '.$post_grid_version.'</strong> of <strong>'.post_grid_plugin_name.'</strong> ';	
                            
                            
                        }
                    
                     ?>       

                    
                    </p>

                </div>
                
				<div class="option-box">
                    <p class="option-title">Submit Reviews...</p>
                    <p class="option-info">We are working hard to build some awesome plugins for you and spend thousand hour for plugins. we wish your three(3) minute by submitting five star reviews at wordpress.org. if you have any issue please submit at forum.</p>
                	<img class="post_grid-pro-pricing" src="<?php echo post_grid_plugin_url."css/five-star.png";?>" /><br />
                    <a target="_blank" href="<?php echo post_grid_wp_reviews; ?>">
                		<?php echo post_grid_wp_reviews; ?>
               		</a>
                    
                    
                    
                </div>
				<div class="option-box">
                    <p class="option-title">Please Share</p>
                    <p class="option-info">If you like this plugin please share with your social share network.</p>
                    <?php
                    
						echo post_grid_share_plugin();
					?>
                </div>
				

				<div class="option-box">
                    <p class="option-title">Video Tutorial</p>
                    <p class="option-info">Please watch this video tutorial.</p>
                	<iframe width="640" height="480" src="<?php echo post_grid_tutorial_video_url; ?>" frameborder="0" allowfullscreen></iframe>
                </div>
            
            </li>  

        </ul>
    
    
    
    </div>    




<p class="submit">
                    <input class="button button-primary" type="submit" name="Submit" value="<?php _e('Save Changes' ) ?>" />
                </p>
		</form>


</div>

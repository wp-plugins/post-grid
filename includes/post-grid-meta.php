<?php


function post_grid_posttype_register() {
 
        $labels = array(
                'name' => _x('Post Grid', 'post_grid'),
                'singular_name' => _x('Post Grid', 'post_grid'),
                'add_new' => _x('New Post Grid', 'post_grid'),
                'add_new_item' => __('New Post Grid'),
                'edit_item' => __('Edit Post Grid'),
                'new_item' => __('New Post Grid'),
                'view_item' => __('View Post Grid'),
                'search_items' => __('Search Post Grid'),
                'not_found' =>  __('Nothing found'),
                'not_found_in_trash' => __('Nothing found in Trash'),
                'parent_item_colon' => ''
        );
 
        $args = array(
                'labels' => $labels,
                'public' => true,
                'publicly_queryable' => true,
                'show_ui' => true,
                'query_var' => true,
                'menu_icon' => null,
                'rewrite' => true,
                'capability_type' => 'post',
                'hierarchical' => false,
                'menu_position' => null,
                'supports' => array('title'),
				'menu_icon' => 'dashicons-media-spreadsheet',
				
          );
 
        register_post_type( 'post_grid' , $args );

}

add_action('init', 'post_grid_posttype_register');





/**
 * Adds a box to the main column on the Post and Page edit screens.
 */
function meta_boxes_post_grid()
	{
		$screens = array( 'post_grid' );
		foreach ( $screens as $screen )
			{
				add_meta_box('post_grid_metabox',__( 'Post Grid Options','post_grid' ),'meta_boxes_post_grid_input', $screen);
			}
	}
add_action( 'add_meta_boxes', 'meta_boxes_post_grid' );


function meta_boxes_post_grid_input( $post ) {
	
	global $post;
	wp_nonce_field( 'meta_boxes_post_grid_input', 'meta_boxes_post_grid_input_nonce' );
	
	
	$post_grid_post_per_page = get_post_meta( $post->ID, 'post_grid_post_per_page', true );
	$post_grid_themes = get_post_meta( $post->ID, 'post_grid_themes', true );
	$post_grid_social_share_position = get_post_meta( $post->ID, 'post_grid_social_share_position', true );	
	$post_grid_pagination_display = get_post_meta( $post->ID, 'post_grid_pagination_display', true );		
	
	
	$post_grid_read_more_position = get_post_meta( $post->ID, 'post_grid_read_more_position', true );
	$post_grid_read_more_hov_in_style = get_post_meta( $post->ID, 'post_grid_read_more_hov_in_style', true );		
	
	$post_grid_posttype = get_post_meta( $post->ID, 'post_grid_posttype', true );	
	
	$post_grid_width = get_post_meta( $post->ID, 'post_grid_width', true );		
	$post_grid_thumb_width = get_post_meta( $post->ID, 'post_grid_thumb_width', true );	
	$post_grid_thumb_height = get_post_meta( $post->ID, 'post_grid_thumb_height', true );	


?>

    <div class="para-settings">
        <div class="option-box">
            <p class="option-title">Shortcode</p>
            <p class="option-info">Copy this shortcode and paste on page or post where you want to display slider. <br />Use PHP code to your themes file to display slider.</p>
			<textarea cols="50" rows="1" style="background:#bfefff" onClick="this.select();" >[post_grid <?php echo ' id="'.$post->ID.'"';?> ]</textarea>
        <br /><br />
        PHP Code:<br />
        <textarea cols="50" rows="1" style="background:#bfefff" onClick="this.select();" ><?php echo '<?php echo do_shortcode("[post_grid id='; echo "'".$post->ID."' ]"; echo '"); ?>'; ?></textarea>  
		</div>


        <ul class="tab-nav"> 
            <li nav="1" class="nav1 active">Options</li>
            <li nav="2" class="nav2">Style</li>
            <li nav="3" class="nav3">Content</li>
        </ul> <!-- tab-nav end -->
        
		<ul class="box">
            <li style="display: block;" class="box1 tab-box active">
				<div class="option-box">
                    <p class="option-title">Grid Post per page</p>
                    <p class="option-info"></p>
					<input type="text" size="5"  name="post_grid_post_per_page" value="<?php if(!empty($post_grid_post_per_page))echo $post_grid_post_per_page; else echo 10; ?>" />                   
                </div>
                
				<div class="option-box">
                    <p class="option-title">Grid width</p>
                    <p class="option-info"></p>
					<input type="text" size="10"  name="post_grid_width" value="<?php if(!empty($post_grid_width))echo $post_grid_width; ?>" />                   
                </div>  
                
				<div class="option-box">
                    <p class="option-title">Grid thumbnail width</p>
                    <p class="option-info"></p>
					<input type="text" size="10"  name="post_grid_thumb_width" value="<?php if(!empty($post_grid_thumb_width))echo $post_grid_thumb_width; ?>" />                   
                </div>     
                
				<div class="option-box">
                    <p class="option-title">Grid thumbnail height</p>
                    <p class="option-info"></p>
					<input type="text" size="10"  name="post_grid_thumb_height" value="<?php if(!empty($post_grid_thumb_height)) echo $post_grid_thumb_height; ?>" />                   
                </div>
                
                
				<div class="option-box">
                    <p class="option-title">Display Pagination</p>
                    <p class="option-info"></p>
                    
					<select name="post_grid_pagination_display"  >
                    <option value="yes" <?php if($post_grid_pagination_display=="yes")echo "selected"; ?>>Yes</option>
                    <option value="no" <?php if($post_grid_pagination_display=="no")echo "selected"; ?>>No</option>                  
                    </select>
                  
                </div>                
                
                
                
                
                
                
               
            </li>
            <li style="display: none;" class="box2 tab-box ">
				<div class="option-box">
                    <p class="option-title">Themes</p>
                    <p class="option-info"></p>
					<select name="post_grid_themes"  >
                    <option value="flat" <?php if($post_grid_themes=="flat")echo "selected"; ?>>Flat</option>
                  
                    </select>                 
                </div>
                
                
				<div class="option-box">
                    <p class="option-title">Social Share buttons position</p>
                    <p class="option-info"></p>
					<select name="post_grid_social_share_position"  >
                    <option value="LeftTop" <?php if($post_grid_social_share_position=="LeftTop")echo "selected"; ?>>Left Top</option>
                    <option value="LeftBottom" <?php if($post_grid_social_share_position=="LeftBottom")echo "selected"; ?>>Left Bottom</option>                    
                    <option value="RightTop" <?php if($post_grid_social_share_position=="RightTop")echo "selected"; ?>>Right Top</option>                    
                    <option value="RightBottom" <?php if($post_grid_social_share_position=="RightBottom")echo "selected"; ?>>Right Bottom</option>                    
                  
                    </select>                 
                </div>               
                
                
                
				<div class="option-box">
                
                
                    <p class="option-title">Read more position</p>
                    <p class="option-info"></p>
                
					<select name="post_grid_read_more_position"  >
                    <option value="TopMiddle" <?php if($post_grid_read_more_position=="TopMiddle")echo "selected"; ?>>Top Middle</option>
                    <option value="LeftMiddle" <?php if($post_grid_read_more_position=="LeftMiddle")echo "selected"; ?>>Left Middle</option>                    
                    <option value="RightMiddle" <?php if($post_grid_read_more_position=="RightMiddle")echo "selected"; ?>>Right Middle</option>                    
                    <option value="BottomMiddle" <?php if($post_grid_read_more_position=="BottomMiddle")echo "selected"; ?>>Bottom Middle</option>                    
                  
                    </select>
                
                
                    <p class="option-title">Read more hover style</p>
                    <p class="option-info"></p>
					<select name="post_grid_read_more_hov_in_style"  >
                    <option value="zoomIn" <?php if($post_grid_read_more_hov_in_style=="zoomIn")echo "selected"; ?>>ZoomIn</option>
                    <option value="fadeIn" <?php if($post_grid_read_more_hov_in_style=="fadeIn")echo "selected"; ?>>FadeIn</option>
                    <option value="rotate" <?php if($post_grid_read_more_hov_in_style=="rotate")echo "selected"; ?>>Rotate</option>                                       
                  
                    </select>                 
                </div>
                
                
                
                
                
                
                
                

            </li>
            <li style="display: none;" class="box3 tab-box ">
				
                
				<div class="option-box">
                    <p class="option-title">Grid Content Posttype</p>
                    <p class="option-info"></p>
                    <?php
						
						$post_types = get_post_types( '', 'names' ); 
						
						foreach ( $post_types as $post_type ) {
						
							if($post_type=='post')
								{
								   echo '<label><input type="checkbox" name="post_grid_posttype['.$post_type.']"  value ="'.$post_type.'" ' ?> 
								   <?php if ( isset( $post_grid_posttype[$post_type] ) ) echo "checked"; ?>
								   <?php echo' >'. $post_type.'</label><br />' ;
							   
								}
						
							else
								{
								   echo '<label><input type="checkbox" name="post_grid_posttype['.$post_type.']"  value ="'.$post_type.'" ' ?> 
								   <?php if ( isset( $post_grid_posttype[$post_type] ) ) echo "checked"; ?>
								   <?php echo' >'. $post_type.'</label><br />' ;
						   
								}
						
						}
						?>
                </div>
                
                
                
                 
            </li>
        </ul>













    
    </div>
<?php


	
}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function meta_boxes_post_grid_save( $post_id ) {

  /*
   * We need to verify this came from the our screen and with proper authorization,
   * because save_post can be triggered at other times.
   */

  // Check if our nonce is set.
  if ( ! isset( $_POST['meta_boxes_post_grid_input_nonce'] ) )
    return $post_id;

  $nonce = $_POST['meta_boxes_post_grid_input_nonce'];

  // Verify that the nonce is valid.
  if ( ! wp_verify_nonce( $nonce, 'meta_boxes_post_grid_input' ) )
      return $post_id;

  // If this is an autosave, our form has not been submitted, so we don't want to do anything.
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
      return $post_id;



  /* OK, its safe for us to save the data now. */

  // Sanitize user input.
	$post_grid_post_per_page = sanitize_text_field( $_POST['post_grid_post_per_page'] );	
	$post_grid_themes = sanitize_text_field( $_POST['post_grid_themes'] );
	$post_grid_social_share_position = sanitize_text_field( $_POST['post_grid_social_share_position'] );	
	$post_grid_pagination_display = sanitize_text_field( $_POST['post_grid_pagination_display'] );		
		
	$post_grid_read_more_position = stripslashes_deep( $_POST['post_grid_read_more_position'] );
	$post_grid_read_more_hov_in_style = stripslashes_deep( $_POST['post_grid_read_more_hov_in_style'] );	
			
	$post_grid_posttype = stripslashes_deep( $_POST['post_grid_posttype'] );		
		
	$post_grid_width = sanitize_text_field( $_POST['post_grid_width'] );		
	$post_grid_thumb_width = sanitize_text_field( $_POST['post_grid_thumb_width'] );
	$post_grid_thumb_height = sanitize_text_field( $_POST['post_grid_thumb_height'] );	
	
	
	
	

  // Update the meta field in the database.
	update_post_meta( $post_id, 'post_grid_post_per_page', $post_grid_post_per_page );	
	update_post_meta( $post_id, 'post_grid_themes', $post_grid_themes );	
	update_post_meta( $post_id, 'post_grid_social_share_position', $post_grid_social_share_position );	
	update_post_meta( $post_id, 'post_grid_pagination_display', $post_grid_pagination_display );		
	
	update_post_meta( $post_id, 'post_grid_read_more_position', $post_grid_read_more_position );
	update_post_meta( $post_id, 'post_grid_read_more_hov_in_style', $post_grid_read_more_hov_in_style );		
	
	update_post_meta( $post_id, 'post_grid_posttype', $post_grid_posttype );	
	
	update_post_meta( $post_id, 'post_grid_width', $post_grid_width );	
	update_post_meta( $post_id, 'post_grid_thumb_width', $post_grid_thumb_width );
	update_post_meta( $post_id, 'post_grid_thumb_height', $post_grid_thumb_height );	
	

}
add_action( 'save_post', 'meta_boxes_post_grid_save' );






?>
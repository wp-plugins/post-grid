<?php


class PostgridClass
	{
		
		public 	$grid_items = array('post_title'=>'Title',
									'content'=>'Content',
									'thumbnail'=>'Thumbnail',
									'meta'=>'Meta',									
									'social'=>'Social',
									'hover_items'=>'Hover Items',
									);
									
		public	$grid_items_properties = array(
												'post_title'=> array('post_title'),
												'content'=> array('body','read_more'),
												'thumbnail'=> array('video','img'),
												'meta'=> array(	'post_date','post_author','terms','comments_count','avatar'),															
												'social'=> array('facebook','twitter','googleplus'),				
												'hover_items'=> array('link','share_button'),
												);
												
												
												
		public 	$post_grid_items_display = array(	'post_title'=>'on',
													'content'=>'on',
													'thumbnail'=>'on',
													'meta'=>'on',									
													'social'=>'on',
													'hover_items'=>'on',
													);												
												
												
												
												
												
									
									
									
									
	public function settings_grid_get_post_meta($post_id,$meta_key)
				{	
					return get_post_meta( $post_id, $meta_key, true );
				
				}								





	public function post_grid_settings_builder_saved_items()
				{

					global $post;
					$post_grid_items = $this->settings_grid_get_post_meta($post->ID, 'post_grid_items');
					
					$post_grid_items_display = $this->settings_grid_get_post_meta($post->ID, 'post_grid_items_display');
					$post_grid_post_meta_fields = $this->settings_grid_get_post_meta($post->ID, 'post_grid_post_meta_fields');					
					$post_grid_post_title_linked = $this->settings_grid_get_post_meta($post->ID, 'post_grid_post_title_linked');	
					$post_grid_post_thumbnail_linked = $this->settings_grid_get_post_meta($post->ID, 'post_grid_post_thumbnail_linked');
					$post_grid_post_thumbnail_external = $this->settings_grid_get_post_meta($post->ID, 'post_grid_post_thumbnail_external');					
					

					$post_grid_hover_items_link_display = $this->settings_grid_get_post_meta($post->ID, 'post_grid_hover_items_link_display');									
					$post_grid_hover_items_share_display = $this->settings_grid_get_post_meta($post->ID, 'post_grid_hover_items_share_display');
					
					$post_grid_meta_author_display = $this->settings_grid_get_post_meta($post->ID, 'post_grid_meta_author_display');
					
					$post_grid_meta_avatar_display = $this->settings_grid_get_post_meta($post->ID, 'post_grid_meta_avatar_display');									
								
					$post_grid_meta_date_display = $this->settings_grid_get_post_meta($post->ID, 'post_grid_meta_date_display');
					
					$post_grid_meta_categories_display = $this->settings_grid_get_post_meta($post->ID, 'post_grid_meta_categories_display');					
					
					$post_grid_meta_tags_display = $this->settings_grid_get_post_meta($post->ID, 'post_grid_meta_tags_display');					
					
					$post_grid_meta_comments_display = $this->settings_grid_get_post_meta($post->ID, 'post_grid_meta_comments_display');
				

					
					$post_grid_hover_items_hover_effect_in = $this->settings_grid_get_post_meta($post->ID, 'post_grid_hover_items_hover_effect_in');						
									
										
					
					$html = '';
					
					
					
					if(empty($post_grid_items))
						{
							$post_grid_items = $this->grid_items;
						}
					
				
					foreach($post_grid_items as $key=>$name)
						{
								
															
								
								
								
								
					$html .= '<div class="saved-item" data-class="saved-item" id="'.$key.'"><div class="header">'.$name;
					if(!empty($post_grid_items_display[$key]))
						{
					$html .= '<span class="input-switch"><input checked type="checkbox" id="switch-'.$key.'" name="post_grid_items_display['.$key.']" class="switch" />
	<label title="Display on grid ?" for="switch-'.$key.'">&nbsp;</label>
</span>';

						}
					else
						{
					$html .= '<span class="input-switch"><input type="checkbox" id="switch-'.$key.'" name="post_grid_items_display['.$key.']" class="switch" />
	<label title="Display on grid ?" for="switch-'.$key.'">&nbsp;</label>
</span>';
						}

					$html .= '</div>';
							
					$html .= '<input type="hidden" name="post_grid_items['.$key.']" value="'.$name.'" />';							
					$html .= '<div class="options">';

					if($key =='meta_fields')
						{
							$html .= '<div class="options-meta_fields">';
							$html .= 'Custom Meta Fields. comma separated, no blank space.';
							
							$html .= '<input style="width:80%" type="text" placeholder="post_view_count,post_share_count" name="post_grid_post_meta_fields" value="'.$post_grid_post_meta_fields.'" />';	
							$html .= '</div>';
						}
						
						
						
						
						
					elseif($key =='post_title')
						{
							$html .= '<div class="options-post_title">';
							$html .= 'Link to post ?<br />';
							$html .= '<select name="post_grid_post_title_linked">';
							
							$html .= '<option value="yes"';
							if($post_grid_post_title_linked == 'yes')
								{
									$html .= 'selected';
								}
							$html .= '>Yes</option>';							
							
							$html .= '<option value="no"';
							if($post_grid_post_title_linked == 'no')
								{
									$html .= 'selected';
								}
							$html .= '>No</option>';							
															
							$html .= '</select>';

							$html .= '</div>';
						}

					elseif($key =='content')
						{
							$html .= '<div class="options-content">';
							$html .= 'Link to post ?<br />';
							$html .= '<select name="post_grid_post_title_linked">';
							
							$html .= '<option value="yes"';
							if($post_grid_post_title_linked == 'yes')
								{
									$html .= 'selected';
								}
							$html .= '>Yes</option>';							
							
							$html .= '<option value="no"';
							if($post_grid_post_title_linked == 'no')
								{
									$html .= 'selected';
								}
							$html .= '>No</option>';							
															
							$html .= '</select>';
													
							
																				

							$html .= '</div>';
						}


					elseif($key =='thumbnail')
						{
							$html .= '<div class="options-thumbnail">';
							
							if(empty($post_grid_post_thumbnail_external))
								{
									$post_grid_post_thumbnail_external = 'dummy_'.$post->ID;
								}
							
							$html .= '<br />External Featured Image(meta key)<br />';							
							$html .= '<input id="post_grid_post_thumbnail_external" type="text" placeholder="meta_key" size="10"  name="post_grid_post_thumbnail_external" value="'.$post_grid_post_thumbnail_external.'" /><br /><br />';	
							
							
							$html .= 'Link to post ?<br />';
							$html .= '<select name="post_grid_post_thumbnail_linked">';
							
							$html .= '<option value="yes"';
							if($post_grid_post_thumbnail_linked == 'yes')
								{
									$html .= 'selected';
								}
							$html .= '>Yes</option>';							
							
							$html .= '<option value="no"';
							if($post_grid_post_thumbnail_linked == 'no')
								{
									$html .= 'selected';
								}
							$html .= '>No</option>';							
															
							$html .= '</select>';														

							$html .= '</div>';
						}					
					elseif($key =='meta')
						{
							$html .= '<div class="options-meta">';
							$html .= 'Display Author ?<br />';
							$html .= '<select name="post_grid_meta_author_display">';
							
							$html .= '<option value="yes"';
							if($post_grid_meta_author_display == 'yes')
								{
									$html .= 'selected';
								}
							$html .= '>Yes</option>';							
							
							$html .= '<option value="no"';
							if($post_grid_meta_author_display == 'no')
								{
									$html .= 'selected';
								}
							$html .= '>No</option>';							
															
							$html .= '</select>';	
							
							
							$html .= '<br /><br />Display Avatar ?<br />';
							$html .= '<select name="post_grid_meta_avatar_display">';
							
							$html .= '<option value="yes"';
							if($post_grid_meta_avatar_display == 'yes')
								{
									$html .= 'selected';
								}
							$html .= '>Yes</option>';							
							
							$html .= '<option value="no"';
							if($post_grid_meta_avatar_display == 'no')
								{
									$html .= 'selected';
								}
							$html .= '>No</option>';							
															
							$html .= '</select>';							
							
							
							
							
							
							
							
							
							
							
							$html .= '<br /><br />Display Date ?<br />';
							$html .= '<select name="post_grid_meta_date_display">';
							
							$html .= '<option value="yes"';
							if($post_grid_meta_date_display == 'yes')
								{
									$html .= 'selected';
								}
							$html .= '>Yes</option>';							
							
							$html .= '<option value="no"';
							if($post_grid_meta_date_display == 'no')
								{
									$html .= 'selected';
								}
							$html .= '>No</option>';							
															
							$html .= '</select>';							
							
							
							$html .= '<br /><br />Display Categories ?<br />';
							$html .= '<select name="post_grid_meta_categories_display">';
							$html .= '<option value="yes"';
							if($post_grid_meta_categories_display == 'yes')
								{
									$html .= 'selected';
								}
							$html .= '>Yes</option>';							
							$html .= '<option value="no"';
							if($post_grid_meta_categories_display == 'no')
								{
									$html .= 'selected';
								}
							$html .= '>No</option>';														
							$html .= '</select>';							
							
							
							$html .= '<br /><br />Display Tags ?<br />';
							$html .= '<select name="post_grid_meta_tags_display">';
							$html .= '<option value="yes"';
							if($post_grid_meta_tags_display == 'yes')
								{
									$html .= 'selected';
								}
							$html .= '>Yes</option>';							
							$html .= '<option value="no"';
							if($post_grid_meta_tags_display == 'no')
								{
									$html .= 'selected';
								}
							$html .= '>No</option>';														
							$html .= '</select>';								
							
							
							$html .= '<br /><br />Display Comments Counts ?<br />';
							$html .= '<select name="post_grid_meta_comments_display">';
							$html .= '<option value="yes"';
							if($post_grid_meta_comments_display == 'yes')
								{
									$html .= 'selected';
								}
							$html .= '>Yes</option>';							
							$html .= '<option value="no"';
							if($post_grid_meta_comments_display == 'no')
								{
									$html .= 'selected';
								}
							$html .= '>No</option>';														
							$html .= '</select>';							
																				

							$html .= '</div>';
						}

					elseif($key =='hover_items')
						{
							$html .= '<div class="options-hover_items">';
							
							
							$hover_effect_in = array(
													'fadeIn',													
													'zoomIn',													
													'swing',																									
												
													);
							
							if(empty($post_grid_hover_items_hover_effect_in))
								{
									$post_grid_hover_items_hover_effect_in = 'fadeIn';
								}
							
							
							
							
							
							$html .= 'Hover Effect In ?<br />';
							$html .= '<select name="post_grid_hover_items_hover_effect_in">';
							
							foreach($hover_effect_in as $effect)
								{
									
									$html .= '<option value="'.$effect.'"';
									if($post_grid_hover_items_hover_effect_in == $effect)
										{
											$html .= 'selected';
										}
									$html .= '>'.$effect.'</option>';
									
								}
						
							$html .= '</select>';
							

							
							$html .= '<br /><br />Display Link ?<br />';
							$html .= '<select name="post_grid_hover_items_link_display">';
							
							$html .= '<option value="yes"';
							if($post_grid_hover_items_link_display == 'yes')
								{
									$html .= 'selected';
								}
							$html .= '>Yes</option>';							
							
							$html .= '<option value="no"';
							if($post_grid_hover_items_link_display == 'no')
								{
									$html .= 'selected';
								}
							$html .= '>No</option>';							
															
							$html .= '</select>';							
							
							
							$html .= '<br /><br />Display share button ?<br />';
							$html .= '<select name="post_grid_hover_items_share_display">';
							
							$html .= '<option value="yes"';
							if($post_grid_hover_items_share_display == 'yes')
								{
									$html .= 'selected';
								}
							$html .= '>Yes</option>';							
							
							$html .= '<option value="no"';
							if($post_grid_hover_items_share_display == 'no')
								{
									$html .= 'selected';
								}
							$html .= '>No</option>';							
															
							$html .= '</select>';							
																				

							$html .= '</div>';
						}
					
					
					
					
					
					
					
					else
						{
							$html .= '';
						
						}
					
					
					
					
					
					
						
					$html .= '</div>';									
					$html .= '</div>';
					
	
								
						}
					return $html;
				}



			
	public function settings_grid_items()
				{
					global $post;
									
					$html = '';
					$html .= '<div class="post-grid-builder">';	
					$html .= '<div id="canvas" class="canvas droppable" >';	
					$html .= '<p><b>Grid Layout</b></p>';
					$html .= '<p>Drag-drop items to re-order. multiple items not supported for each. for example you can\'t add two "Title" on layout.</p>';
					$html .= '<div class="items-container sortable" >';	
					$html .= $this->post_grid_settings_builder_saved_items();
					$html .= '</div></div>';
					
					$html .= '</div>';						
									
									
					return $html;
				}
	

		
	
	}
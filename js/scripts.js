
jQuery(document).ready(function($)
	{
		

		
		$(document).on('click', '.load-more .load', function()
			{	
				$(this).html('loading...');
				var postid = parseInt($(this).attr('postid'));
				var per_page = parseInt($(this).attr('per_page'));
				var offset = parseInt($(this).attr('offset'));	

			$.ajax(
				{
			type: 'POST',
			url:timeline_um_ajax.timeline_um_ajaxurl,
			data: {"action": "timeline_um_comments_by_postid", "postid":postid,"per_page":per_page,"offset":offset},
			success: function(data)
					{	
	
						$('.post-grid-container-'+postid).append(data);
						$('.comment-load-more-'+postid).attr('offset',(offset+per_page));


					
					}
				});
			
			
			
			
			
			
			
			
			
			})
		
		
		
		$(document).on('click', '.post_grid_content_source', function()
			{	
				var source = $(this).val();
				var source_id = $(this).attr("id");
				
				$(".content-source-box.active").removeClass("active");
				$(".content-source-box."+source_id).addClass("active");
				
			})
		
		
		
	
		
		
		
		
		jQuery(".post_grid_taxonomy").click(function()
			{
				


				var taxonomy = jQuery(this).val();
				
				jQuery(".post_grid_loading_taxonomy_category").css('display','block');

						jQuery.ajax(
							{
						type: 'POST',
						url: post_grid_ajax.post_grid_ajaxurl,
						data: {"action": "post_grid_get_taxonomy_category","taxonomy":taxonomy},
						success: function(data)
								{	
									jQuery(".post_grid_taxonomy_category").html(data);
									jQuery(".post_grid_loading_taxonomy_category").fadeOut('slow');
								}
							});

		
			})
		
	
 		

	});	








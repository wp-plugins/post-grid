jQuery(document).ready(function($)
	{


		$(document).on('click', '.post-grid-filter .filter', function()
			{
				$('.post-grid-filter .filter').removeClass('active');
				
				
				if($(this).hasClass('active'))
					{
						//$(this).removeClass('active');
					}
				else
					{
						$(this).addClass('active');
					}
				
			})




		$(document).on('click', '.load-more', function()
			{
				var paged = parseInt($(this).attr('paged'));
				var per_page = parseInt($(this).attr('per_page'));
				var grid_id = parseInt($(this).attr('grid_id'));
				var terms = $('.post-grid-filter .active').attr('terms-id');
				
				
				if(terms == null || terms == '')
					{
						terms = '';
					}
						
				$(this).addClass('loading');

				
			$.ajax(
				{
			type: 'POST',
			context: this,
			url:post_grid_ajax.post_grid_ajaxurl,
			data: {"action": "post_grid_ajax_items", "grid_id":grid_id,"per_page":per_page,"paged":paged,"terms":terms,},
			success: function(data)
					{	
						//$('.post-grid-items').append(data);
						
						var $grid = $('.post-grid-items').masonry({});				
						
						  // append items to grid
							$grid.append( data )
							// add and lay out newly appended items
							.masonry( 'appended', data );
							$grid.masonry( 'reloadItems' );
							$grid.masonry( 'layout' );
							
							$grid.css('margin','0 auto')
							
									
						$('.post-grid-items').css('margin','0 auto !important;');		
			
			
			
								
						$(this).attr('paged',(paged+1));
						
						if($(this).hasClass('loading'))
							{
								$(this).removeClass('loading');
							}
						
					}
				});
				
				
				
				
				
				
				
				
				
				
				//alert(per_page);
			})

		
		$(document).on('click', '.zoom', function()
			{
				
				src = $(this).parent().parent('.grid-single').find("img").attr('src');

				$('.popup-container').fadeIn();
				$('.popup-container .box').fadeIn();			
				
				$('.popup-container .box').html('<span class="close">X</span><img src="'+src+'">');			
				
				
				//alert(slide_imgs[current_post_id]);

			})

		
		$(document).on('click', '.popup-container .box .close', function()
			{
				

			$(this).parent().fadeOut();
			$(this).parent().parent().fadeOut();

			})		
		
		
		
		

	});	








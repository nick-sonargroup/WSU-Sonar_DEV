<?php get_header(); ?>

<?php the_post(); ?>

<!-- THE TYPICAL SECTION 
	
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
	            <h1><?php the_title() ?></h1>
	            <?php the_content() ?>
            </div>
        </div>
    </div>
</section>

-->

<!-- OES CONTENT BUILDER -->

<?php

	if( have_rows('content_section') ):
	
	    while ( have_rows('content_section') ) : the_row(); 
	    
	    
	    	// HEADER BANNER 
			
	    	if( get_row_layout() == 'header_banner' ):
				
				the_post();
	
				// GET IMAGE SIZE FROM UPLOADED IMAGE
	        	$banner_image = get_sub_field('banner_image');
				$banner_image_image_url = $banner_image['sizes']['decorative-image'];
	
			?>
				<header>
			        <div class="swiper-container swiper-container-horizontal">
			            <div class="swiper-slide d-flex align-items-end" style="background-image:url(<?php echo $banner_image_image_url; ?>); background-size: cover; background-position: top center;">
			               
			               <?php
				               
				               $do_we_need_a_call_out = get_sub_field('banner_do_you_need_a_call_out');
										
								if($do_we_need_a_call_out == 'yes'){ ?>
			               
					                <div class="caption-inner">
					                    <h1><?php the_sub_field('banner_call_out_title'); ?></h1>
					                    <p><?php the_sub_field('banner_call_out_subtitle'); ?></p>
					                    
					                    <!-- TYPE OF CONTENT TO SHOW -->
												
										<?php
										
											$the_type_of_content_to_show = get_sub_field('banner_type_of_content_to_show');
											
											// INTERNAL LINK BUTTON
											if($the_type_of_content_to_show == 'int_link_button'){
												
												echo '<a class="btn btn-secondary" href="'.get_sub_field('banner_internal_link').'">'.get_sub_field('banner_internal_link_button_text').'</a>';
												
											}

											// COPY
											
											if($the_type_of_content_to_show == 'copy'){												
												echo '<p>';
												echo get_sub_field('banner_extra_copy');
												echo '</p>';												
											}
											
										?>
					                    
					                </div>
					           
							<?php } ?>
			                
			                
			            </div>
			        </div>
			    </header>
	
			<?php
	
			// DECORATIVE STATIC IMAGE
	
	
	        elseif( get_row_layout() == 'decorative_static_image' ):
	        
	        	the_post();
	        
	        	?>
		        	
		        	<!-- IMAGE WIDTH -->
		        	
		        	<?php 
			        	
			        	// IMAGE SIZE (full width or not )
			        	$the_image_width = get_sub_field('image_size');
			        	
			        	// GET IMAGE SIZE FROM UPLOADED IMAGE
			        	$decorative_image = get_sub_field('upload_image');
						$decorative_image_url = $decorative_image['sizes']['decorative-image'];
						
						// IMAGE HEIGHT 
						$the_image_height = get_sub_field('image_height');
						
						// IMAGE BEHAVIOUR 
						$the_image_behaviour = get_sub_field('image_behaviour');
						
						// THE BACKGROUND COLOUR
						$the_background_color = get_sub_field('background_colour');									
			        	
			        	// EVAUATE FOR EDGE TO EDGE / FULL WIDTH IMAGE
			        	if ($the_image_width == 'edge_to_edge'){
				        	
				        	?>
				        	
				        		<section style="background-image: url(<?php echo $decorative_image_url; ?>);" class=" content_builder decorative_image <?php echo $the_background_color.' '.$the_image_height.' '.$the_image_behaviour; ?>  " >
					        							        		
					        		<!--  IMAGE HEIGHT -->
									<?php 
										
										$do_we_need_a_call_out = get_sub_field('do_you_need_a_call_out');
										
										if($do_we_need_a_call_out == 'yes'){ ?>
											
											<div class="floating-caption-left">
												
												<h4><?php the_sub_field('call_out_title'); ?></h4>
												<p><?php the_sub_field('call_out_subtitle'); ?></p>
												
												<!-- TYPE OF CONTENT TO SHOW -->
												
												<?php
												
													$the_type_of_content_to_show = get_sub_field('type_of_content_to_show');
													
													// INTERNAL LINK BUTTON
													if($the_type_of_content_to_show == 'int_link_button'){
														
														echo '<a class="btn btn-secondary" href="'.get_sub_field('internal_link').'">'.get_sub_field('internal_link_button_text').'</a>';
														
													}

													// EXTRENAL LINK BUTTON
													if($the_type_of_content_to_show == 'ext_link_button'){
														
														echo '<a class="btn btn-secondary" target="_blank" href="'.get_sub_field('external_link').'">'.get_sub_field('external_link_button_text').'</a>';
														
													}
													
													
													// COURSES OBJECT
													
													if($the_type_of_content_to_show == 'courses'){
														
														$post_objects = get_sub_field('list_courses');

														if( $post_objects ): ?>
														    
														    <select class="form-control course">
															    <?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
															        <?php setup_postdata($post); ?>
															        <option value="<?php the_permalink(); ?>"><?php the_title(); ?></option>
															    <?php endforeach; ?>
														    </select>
														    
														    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly 
														
														endif;
													
													}

													
													// COPY
													
													if($the_type_of_content_to_show == 'copy'){
														
														echo '<p>';
														echo get_sub_field('extra_copy');
														echo '</p>';
														
													}
													
												?>
												
											</div>
										
										<?php
												
										} 
									?>

					        		
					        		
						        	<div class="container">
									    
								        <div class="row" >
									        
								            <div class="col-sm-12" >
											
												
									           					            
								            </div>
				
								        </div>
								        
								    </div>
								    
								</section>
		
							<?php 
				        	
			        	} else if ($the_image_width == 'content_width'){
				        	
				        	?>
				        	
				        		<section class="content_builder decorative_image <?php echo $the_background_color.' '.$the_image_behaviour; ?> ">
					        	
						         <div class="container">
									    
								        <div class="row">
									        
								            <div class="col-sm-12">
												
												<div style="background-image: url(<?php echo $decorative_image_url; ?>);" class="<?php echo $the_image_height; ?> content_width_image"> 
												
												<!--  IMAGE HEIGHT -->
												<?php 
													
													$do_we_need_a_call_out = get_sub_field('do_you_need_a_call_out');
													
													if($do_we_need_a_call_out == 'yes'){ ?>
														
														<div class="call_out floating-caption-left">
															
															<h4><?php the_sub_field('call_out_title'); ?></h4>
															<p><?php the_sub_field('call_out_subtitle'); ?></p>
															
															<!-- TYPE OF CONTENT TO SHOW -->
															
															<?php
															
																$the_type_of_content_to_show = get_sub_field('type_of_content_to_show');
																
																// INTERNAL LINK BUTTON
																if($the_type_of_content_to_show == 'int_link_button'){
																	
																	echo '<a class="btn btn-secondary" href="'.get_sub_field('internal_link').'">'.get_sub_field('internal_link_button_text').'</a>';
																	
																}

																// EXTRENAL LINK BUTTON
																if($the_type_of_content_to_show == 'ext_link_button'){
																	
																	echo '<a class="btn btn-secondary" target="_blank" href="'.get_sub_field('external_link').'">'.get_sub_field('external_link_button_text').'</a>';
																	
																}
																
																
																// COURSES OBJECT
																
																if($the_type_of_content_to_show == 'courses'){
																	
																	$post_objects = get_sub_field('list_courses');
	
																	if( $post_objects ): ?>
																	    
																	    <select class="form-control course">
																		    <?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
																		        <?php setup_postdata($post); ?>
																		        <option value="<?php the_permalink(); ?>"><?php the_title(); ?></option>
																		    <?php endforeach; ?>
																	    </select>
																	    
																	    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly 
																	
																	endif;
																
																}

																
																// COPY
																
																if($the_type_of_content_to_show == 'copy'){
																	
																	echo '<p>';
																	echo get_sub_field('extra_copy');
																	echo '</p>';
																	
																}
																
															?>
															
														</div>
													
													<?php
															
													} 
												?>
																						
												<?php // echo '<img class="content_width" src="'.$decorative_image_url.'" />'; ?>
												
												</div>
									           					            
								            </div>
				
								        </div>
								        
								    </div>
								    
								</section>
	
					        	
					        <?php				        	
					        	
				        }
			        	
			        ?>
			 
							   	
	        	<?php
	
			// NEWS BLOCK	
	
	        elseif( get_row_layout() == 'news_block' ): 
	        
	        ?>
	        	<!-- NEWS TITLE -->
	        	
	        	<?php
					// WORK OUT COLUMNS
					$number_of_posts = get_sub_field('no_of_posts');
					
					// FOR BOOTSTRAP COLUMNS SIZES
					
					if($number_of_posts == 4){ $bootstrap_col_md = '3';}
					if($number_of_posts == 3){ $bootstrap_col_md = '4';}
					if($number_of_posts == 2){ $bootstrap_col_md = '6';}
					if($number_of_posts == 1){ $bootstrap_col_md = '6';}
					
					// FOR BACKGROUND COLOURS
					$the_news_background_color = get_sub_field('background_colour');		
					
					if($the_news_background_color=='image'){
						
						$the_news_background_color = '';
						
						// GET IMAGE SIZE FROM UPLOADED IMAGE
			        	$the_news_background_image = get_sub_field('background_image');
						$the_news_background_image_url = $the_news_background_image['sizes']['decorative-image'];
						
					}
				?>

	        	
	        	<section class="content_builder <?php echo $the_news_background_color; ?>" style="background-image:url(<?php echo $the_news_background_image_url; ?>); background-size: cover; background-position: center center;">
		        	
			        <div class="container">
			            <div class="row">
			                <div class="col text-center">
			                    <h1><?php the_sub_field('news_block_title'); ?></h1>
			                </div>
			            </div>
			        </div>			 
	        
					<!-- NEWS REEL -->
									
			        <div class="container section_padding">
				        
				        <div class="row my-flex-card">

					        <?php
						        
								global $post;
								$args = array( 
									'posts_per_page' => $number_of_posts, 
									'post_type' => array( 'post'),
									'orderby' => 'date',
									'order' => 'DESC',								
									'category_name' => 'news',
								);
								$myposts = get_posts( $args );
								foreach ($myposts as $post) : start_wp();
							
								// GET IMAGE SIZE
								$hero_image = get_field('article_hero_image');
								$hero_image_url = $hero_image['sizes']['standard-image'];
								
							?>
								        
						        <!-- A NEWS POST -->
						        
						        <?php

				                    if($number_of_posts == 1){  ?>
								
						                <div class="col-sm-6 col-md-<?php echo $bootstrap_col_md; ?>">
							                
						                    <div class="card grey">
							                    
							                    <img class="card-img-top img-fluid" src="<?php echo $hero_image_url; ?>" alt="" />
							                    							                    
						                    </div>
						                    
						                </div>	
						                
						                 <div class="col-sm-6 col-md-<?php echo $bootstrap_col_md; ?>">
							                
						                    <div class="card grey">
							                    							                    
						                        <div class="card-block">
						                            <h4><?php the_title(); ?></h4>
						                            <p><?php the_field('article_excerpt'); ?></p>
						                        </div>
							                    
						                    </div>
						                    
						                </div>	
						                
					                
					            <?php } else { ?>			
					                
					                
					                 <div class="col-sm-6 col-md-<?php echo $bootstrap_col_md; ?>">
						                 
					                    <div class="card grey">
						                    						                    
					                        <img class="card-img-top img-fluid" src="<?php echo $hero_image_url; ?>" alt="" />
					                        
					                        <div class="card-block">
					                            <h4><?php the_title(); ?></h4>
					                            <p><?php the_field('article_excerpt'); ?></p>
					                        </div>						                        
										
					                    </div>
					                    
					                </div>			
									
								<?php }	?>
												            
				            <?php endforeach; ?>	
							
							<?php rewind_posts(); ?>					
			            	
			            </div>	
			            		            
			        </div>
			        
			        <!-- NEWS BUTTON -->
			        
			        <?php
				        
				        $do_we_need_news_button = get_sub_field('do_we_need_a_link_button');
				       				        
				        if($do_we_need_news_button == 'yes'){
					       
					       ?>
					       
					       	<div class="container section_padding" >
							    <div class="row">
							        <div class="col text-center">
							            <a href="<?php the_sub_field('link_button_link'); ?>" class="btn btn-secondary" role="button"><?php the_sub_field('link_button_text'); ?></a>
							        </div>
							    </div>
							</div>
					       
					       <?php
					       
				        }
				        
				    ?>
			        
			    </section>
				
	        <?php	
	
	        endif;
	
	    endwhile;
	
	else :
	
		echo '<h1>This page has no content!</h1>';
	
	endif;

?>

<?php get_footer(); ?>
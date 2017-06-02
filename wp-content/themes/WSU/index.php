<?php get_header(); ?>

<?php the_post(); ?>    

	<!-- HEADER TITLE -->
	<div id="header_title_wrapper" style="background-color: <?php the_field('header_colour'); ?>">
		
		<div id="skip_to_content">
		
			<h1 class="content_container"><?php the_field('main_title'); ?></h1>
			
		</div>
		
	</div>
	
	
<?php get_footer(); ?>
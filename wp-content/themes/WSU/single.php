<?php get_header(); ?>

<?php the_post(); ?>  

	<!-- HEADER TITLE -->
	<div id="header_title_wrapper">
		
		<h1 class="content_container"><?php the_field('title'); ?></h1>

	</div>
	
	
<?php get_footer(); ?>
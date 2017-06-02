<!doctype html>
<html lang="en">
<head>

<meta charset="utf-8">

<title><?php wp_title(''); ?></title>
		
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

<!-- JQUERY -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- ALWAYS HARD CODE THE CSS ON GO LIVE -->
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/style.css" />

<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/favicon.ico" />

<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/custom_scripts.js"></script>

<!-- DEVICE ORIENTED -->
<meta name="viewport" content="user-scalable=no,initial-scale=1">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />

<?php wp_head(); ?>
 
</head> 

<body <?php body_class(); ?> >
	
		
	<!-- MOBILE VEIL -->
	
	<span aria-hidden="true" id="mobile_veil">This is the hover veil</span>
	
	<!-- MOBILE BUTTONS -->
	
	<a role="button" id="mobile_expand" class="mobile">Expand Menu</a>
	<a role="button" id="mobile_close" class="">Close Menu</a>
	
	<!-- MOBILE MENU -->
	
	<div id="mobile_menu" class="">		
		
		<!-- SEARCH FORM -->

		<form method="get" id="mobile_search_form" action="<?php bloginfo('url'); ?>">
			
			<input type="text" class="search_input"  name="s" id="sw"  placeholder="Search this website"/>
			<input type="submit" class="button" value="Search" />
		
		</form>
		
		<!-- MENU -->		
		
		<?php wp_nav_menu( 
					
			array( 
			
				'theme_location' => 'primary-nav',
				'menu_id' => 'mobile_primary_nav',
				'menu_class' => '',
				'container' => '',
			) 
			
		); ?>	
		
	</div>
	
	
		
	<!-- HEADER -->
	
	<div id="header_wrapper">
		
		<div class="content_container">
		
			<a id="logo" href="/"><img src="<?php the_field('odsc_logo', 'options'); ?>" alt="<?php the_field('odsc_logo_alt_text', 'options'); ?>" /></a>
	
			
	

		
		</div>

	</div>
	
	<!-- PRIMARY NAVIGATION -->
	
		<div id="primary_nav_wrapper">	
			
			<div id="navigation_social_wrapper" class="content_container">
			
				<?php wp_nav_menu( 
					
					array( 
					
						'theme_location' => 'primary-nav',
						'menu_id' => 'primary_nav',
						'menu_class' => '',
						'container' => '',
					) 
					
				); ?>		
			
				
		
			</div>
		
	</div>
	
	<div id="wrapper">
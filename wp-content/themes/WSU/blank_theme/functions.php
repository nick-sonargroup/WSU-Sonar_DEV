<?php
//
//
// =========================================================================
// LOAD SCRIPTS
// =========================================================================
//
//
// Only on front-end pages, NOT in admin area
if (!is_admin()) {
	//
	// Load CSS
	add_action('wp_enqueue_scripts', 'load_styles');
	function load_styles() {
		// Theme Styles
		wp_register_style('theme-styles', get_stylesheet_uri(), array(), null, 'all');
		wp_enqueue_style('theme-styles');
		// Swiper Styles
		wp_register_style('swiper-styles', '//cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.2/css/swiper.min.css', array(), '3.4.2', 'all');
		wp_enqueue_style('swiper-styles');
		// Google Web Fonts
		wp_register_style('google-fonts', 'https://fonts.googleapis.com/css?family=Lato:300,400,700,900|Source+Serif+Pro:400,600,700', array(), null, 'all');
		wp_enqueue_style('google-fonts');
		// Font Awesome
		wp_register_style('font-awesome', '//use.fontawesome.com/e26559f234.js', array(), null, 'all');
		wp_enqueue_style('font-awesome');
		// HTML5Shiv
		wp_enqueue_script( 'html5shiv', '//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js' );
		wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );
		// Respond
		wp_enqueue_script( 'respond', '//oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js' );
		wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );
	}
	//
	// Load Javascript
	add_action('wp_enqueue_scripts', 'load_scripts');
	function load_scripts() {
		// jQuery
		wp_deregister_script('jquery');
		//wp_register_script('jquery', get_template_directory_uri() . '/js/jquery-3.1.1.slim.min.js', array(), '3.1.1', false);
		wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js', array(), '3.2.1', false);
		wp_enqueue_script('jquery');
		// jQuery mobile
		wp_register_script('jquery-mobile', '//code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"', array(), '1.4.5', true);
		wp_enqueue_script('jquery-mobile');
		// Tether
		wp_register_script('tether', get_template_directory_uri() . '/js/tether.js', array('jquery'), null, true);
		wp_enqueue_script('tether');
		// Bootstrap
		wp_register_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), null, true);
		wp_enqueue_script('bootstrap');
		// Swiper
		wp_register_script('swiper', '//cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.2/js/swiper.min.js', array('jquery'), '3.4.2', true);
		wp_enqueue_script('swiper');
		// Classie
		wp_register_script('classie', get_template_directory_uri() . '/js/classie.js', array('jquery'), '1.0.1', true);
		wp_enqueue_script('classie');
		// Custom
		wp_register_script('custom', get_template_directory_uri() . '/js/custom.js', array('jquery', 'classie'), null, true);
		wp_enqueue_script('custom');
	}
	//
} // end if !is_admin
//
//
// =========================================================================
// WP LOGIN
// =========================================================================
//
//
// CHANGE LOGIN LOGO
//
function my_login_logo() {
?> 
    <style type="text/css"> 
	    body {
			background-image: url('<?php home_url() ?>/wp-content/uploads/sonar-logo.png') !important;
		    background-size: 180px auto !important;
		    background-repeat: no-repeat !important;
		}
        body.login {
            background: #9f2137;
            font-family: 'Roboto', Arial;
        }
        body.login div#login h1 a {
            background-image: url('<?php the_field('login_logo','options') ?>');
            width: 100%;
            background-size: 180px auto;
        }
        body.login div#login #login_error,
        body.login div#login #login_error a,
        body.login div#login .message {
            border-left: none;
            background: #ff5c5e;
            color: #ffffff;
        }
        body.login div#login form {
            background: #ff5c5e;
        }
        body.login div#login form p label {
            color: #ffffff;
        }
        body.login div#login form p.submit input#wp-submit {
            border-radius: 0;
            border: none;
            background: #9f2137;
            text-shadow: none;
            box-shadow: none;
        }
        body.login div#login p#backtoblog a,
        body.login div#login p#nav a {
            color: #ffffff;
        }
    </style>
<?php
} 
add_action( 'login_enqueue_scripts', 'my_login_logo' );
//
//
// LINK LOGO TO WEBSITE NOT WORDPRESS
//
function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );
//
//
// CHANGE ALT TEXT
//
function my_login_logo_url_title() {
    return 'Website Name';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );
//
//	
// =========================================================================
// GENERAL
// =========================================================================	
//
//
// REGISTER MENUS
//
function register_my_menus() {
  register_nav_menus(
    array(
      'primary' => __( 'Primary Menu', 'blank_theme' ),
      'sub' => __( 'Sub Menu', 'blank_theme' ),
      'footer' => __( 'Footer Menu', 'blank_theme' )
    )
  );
}
add_action( 'init', 'register_my_menus' );
//
//
// REGISTER CUSTOM NAVIGATION WALKER
//
require_once('bs4navwalker.php');
//
//
// SUPPORT THUMBNAILS
//
add_theme_support( 'post-thumbnails' );
//
//
// THUMBNAIL SIZES
//
add_image_size( 'blog-thumb', 375, 200, false );
add_image_size( 'standard-image', 840, 490, false );
add_filter( 'image_size_names_choose', 'my_custom_thumbnails' );

function my_custom_thumbnails( $sizes ) {
    return array_merge( $sizes, array(
        'blog-thumb' => __('Blog Thumb'),
        'standard-image' => __('Standard Image'),
    ) );
}
//
//
// FROM EMAIL
//
function res_fromemail($email) {
    $wpfrom = get_option('admin_email');
    return $wpfrom;
}
function res_fromname($email){
    $wpfrom = get_option('blogname');
    return $wpfrom;
}
add_filter('wp_mail_from', 'res_fromemail');
add_filter('wp_mail_from_name', 'res_fromname');
//
//
// ACF OPTIONS PAGE
//
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Website Info',
		'menu_title'	=> 'Website Info',
		'menu_slug' 	=> 'website-info',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}
//
//
// =========================================================================
// CUSTOM POSTS
// =========================================================================
//
// 
// COURSES
//
add_action( 'init', 'my_custom_post_course' );
function my_custom_post_course() {
	$labels = array(
		'name'               => _x( 'Course', 'post type general name' ),
		'singular_name'      => _x( 'Course', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'Course' ),
		'add_new_item'       => __( 'Add New Course' ),
		'edit_item'          => __( 'Edit Courses' ),
		'new_item'           => __( 'New Courses' ),
		'all_items'          => __( 'All Courses' ),
		'view_item'          => __( 'View Courses' ),
		'search_items'       => __( 'Search Courses' ),
		'not_found'          => __( 'No Courses found' ),
		'not_found_in_trash' => __( 'No Courses found in the Trash' ),
		'parent_item_colon'  => '',
		'menu_name'          => 'Course'
	);
	$args = array(
		'labels'        => $labels,
		'public'        => true,
		'hierarchical'	=> true,
		'show_in_nav_menus' => false,
		'supports'      => array( 'title', 'author'),
		'has_archive'   => true
	);
	register_post_type( 'course', $args );
}
add_action( 'init', 'my_custom_post_course' );
//
//
// 
// CALENDAR
//
add_action( 'init', 'my_custom_post_calendar' );
function my_custom_post_calendar() {
	$labels = array(
		'name'               => _x( 'Calendar', 'post type general name' ),
		'singular_name'      => _x( 'Calendar entry', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'Calendar entry' ),
		'add_new_item'       => __( 'Add New Calendar entry' ),
		'edit_item'          => __( 'Edit Entries' ),
		'new_item'           => __( 'New Calendar entry' ),
		'all_items'          => __( 'All Coursed' ),
		'view_item'          => __( 'View all entries' ),
		'search_items'       => __( 'Search entries' ),
		'not_found'          => __( 'No entries found' ),
		'not_found_in_trash' => __( 'No entries found in the Trash' ),
		'parent_item_colon'  => '',
		'menu_name'          => 'Calendar'
	);
	$args = array(
		'labels'        => $labels,
		'public'        => true,
		'hierarchical'	=> true,
		'show_in_nav_menus' => false,
		'supports'      => array( 'title', 'author'),
		'has_archive'   => true
	);
	register_post_type( 'calendar_entry', $args );
}
add_action( 'init', 'my_custom_post_calendar' );
//
//
// 
// FAQ
//
add_action( 'init', 'my_custom_post_faq' );
function my_custom_post_faq() {
	$labels = array(
		'name'               => _x( 'FAQ', 'post type general name' ),
		'singular_name'      => _x( 'FAQ', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'FAQ' ),
		'add_new_item'       => __( 'Add New FAQ' ),
		'edit_item'          => __( 'Edit FAQs' ),
		'new_item'           => __( 'New FAQ' ),
		'all_items'          => __( 'All FAQs' ),
		'view_item'          => __( 'View all FAQs' ),
		'search_items'       => __( 'Search FAQs' ),
		'not_found'          => __( 'No FAQs found' ),
		'not_found_in_trash' => __( 'No FAQs found in the Trash' ),
		'parent_item_colon'  => '',
		'menu_name'          => 'FAQ'
	);
	$args = array(
		'labels'        => $labels,
		'public'        => true,
		'hierarchical'	=> true,
		'show_in_nav_menus' => false,
		'supports'      => array( 'title', 'author'),
		'has_archive'   => true
	);
	register_post_type( 'faq', $args );
}
add_action( 'init', 'my_custom_post_faq' );
//
//
//
// 
// JOBS
//
add_action( 'init', 'my_custom_post_jobs' );
function my_custom_post_jobs() {
	$labels = array(
		'name'               => _x( 'Job', 'post type general name' ),
		'singular_name'      => _x( 'Job', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'Job' ),
		'add_new_item'       => __( 'Add New Job' ),
		'edit_item'          => __( 'Edit Jobs' ),
		'new_item'           => __( 'New Job' ),
		'all_items'          => __( 'All Jobs' ),
		'view_item'          => __( 'View all Jobs' ),
		'search_items'       => __( 'Search Jobs' ),
		'not_found'          => __( 'No Jobs found' ),
		'not_found_in_trash' => __( 'No Jobs found in the Trash' ),
		'parent_item_colon'  => '',
		'menu_name'          => 'Jobs'
	);
	$args = array(
		'labels'        => $labels,
		'public'        => true,
		'hierarchical'	=> true,
		'show_in_nav_menus' => false,
		'supports'      => array( 'title', 'author'),
		'has_archive'   => true
	);
	register_post_type( 'job', $args );
}
add_action( 'init', 'my_custom_post_jobs' );
//
//
//
// 
// BANNERS
//
add_action( 'init', 'my_custom_post_banner' );
function my_custom_post_banner() {
	$labels = array(
		'name'               => _x( 'Banner', 'post type general name' ),
		'singular_name'      => _x( 'Banner', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'Banner' ),
		'add_new_item'       => __( 'Add New Banner' ),
		'edit_item'          => __( 'Edit Banners' ),
		'new_item'           => __( 'New Banner' ),
		'all_items'          => __( 'All Banners' ),
		'view_item'          => __( 'View all Banners' ),
		'search_items'       => __( 'Search Banners' ),
		'not_found'          => __( 'No Banners found' ),
		'not_found_in_trash' => __( 'No Banners found in the Trash' ),
		'parent_item_colon'  => '',
		'menu_name'          => 'Banners'
	);
	$args = array(
		'labels'        => $labels,
		'public'        => true,
		'hierarchical'	=> true,
		'show_in_nav_menus' => false,
		'supports'      => array( 'title', 'author'),
		'has_archive'   => true
	);
	register_post_type( 'banner', $args );
}
add_action( 'init', 'my_custom_post_banner' );
//
//
//
// 
// TESTIMONIALS
//
add_action( 'init', 'my_custom_post_testimonial' );
function my_custom_post_testimonial() {
	$labels = array(
		'name'               => _x( 'Testimonial', 'post type general name' ),
		'singular_name'      => _x( 'Testimonial', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'Testimonial' ),
		'add_new_item'       => __( 'Add New Testimonial' ),
		'edit_item'          => __( 'Edit Testimonials' ),
		'new_item'           => __( 'New Testimonial' ),
		'all_items'          => __( 'All Testimonials' ),
		'view_item'          => __( 'View all Testimonials' ),
		'search_items'       => __( 'Search Testimonials' ),
		'not_found'          => __( 'No Testimonials found' ),
		'not_found_in_trash' => __( 'No Testimonials found in the Trash' ),
		'parent_item_colon'  => '',
		'menu_name'          => 'Testimonials'
	);
	$args = array(
		'labels'        => $labels,
		'public'        => true,
		'hierarchical'	=> true,
		'show_in_nav_menus' => false,
		'supports'      => array( 'title', 'author'),
		'has_archive'   => true
	);
	register_post_type( 'testimonial', $args );
}
add_action( 'init', 'my_custom_post_testimonial' );
//
//
// =========================================================================
// TAXONOMIES
// =========================================================================
//
//
// =========================================================================
// CLEAN UP
// =========================================================================
//
//
// REMOVE JUNK FROM HEADER
remove_action('wp_head', 'rsd_link'); // remove really simple discovery link
remove_action('wp_head', 'wp_generator'); // remove wordpress version
remove_action('wp_head', 'feed_links', 2); // remove rss feed links
remove_action('wp_head', 'feed_links_extra', 3); // removes all extra rss feed links
remove_action('wp_head', 'index_rel_link'); // remove link to index page
remove_action('wp_head', 'wlwmanifest_link'); // remove wlwmanifest.xml (needed to support windows live writer)
remove_action('wp_head', 'start_post_rel_link', 10, 0); // remove random post link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // remove parent post link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // remove the next and previous post links
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0 );
//
//
// REMOVE EMOJI FROM HEADER
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' ); 
//
//
// REMOVE INDIVIDUAL PAGES FOR IMAGES
function redirect_image_pages () {
    global $wp_query, $post;

    if ( is_attachment() ) {
        $post_parent = $post->post_parent;

        if ( $post_parent ) {
            wp_redirect( get_permalink($post->post_parent), 301 );
            exit;
        }

        $wp_query->set_404();

        return;
    }

    if ( is_author() || is_date() ) {
        $wp_query->set_404();
    }
}
add_action( 'template_redirect', 'redirect_image_pages' );
//
//
// =========================================================================
// SECURITY
// =========================================================================
//
//
// DISABLE VERSION INFO
function disable_version_info() {
    return '';
}
add_filter('the_generator', 'disable_version_info');
//
//    
?>
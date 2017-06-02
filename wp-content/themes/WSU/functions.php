<?php
//
// THEME FUNCTIONS  - WSU - Nick Kind & Amy Gustavsen, Sonar Group 170404
//
// FUNCTIONS BEGIN 
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
      'primary' => __( 'Primary Menu', 'wsu' ),
      'footer' => __( 'Footer Menu', 'wsu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );
//
//
// REGISTER CUSTOM NAVIGATION WALKER
//

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
//
//
// BETTER EXCERPT
//
function excerpt($limit) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
    } else {
    $excerpt = implode(" ",$excerpt);
    }	
    $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
    return $excerpt;
    }
     
    function content($limit) {
    $content = explode(' ', get_the_content(), $limit);
    if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'...';
    } else {
    $content = implode(" ",$content);
    }	
    $content = preg_replace('/\[.+\]/','', $content);
    $content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]&gt;', $content);
    return $content;
}
//
//
// PAGINATION
function ts_pager() {
    global $wp_query;

    $largeNum = 999999999; 

    $paginate_links = paginate_links( array(
        'base' => str_replace( $largeNum, '%#%', get_pagenum_link($largeNum) ),
        'current' => max( 1, get_query_var('paged') ),
        'total' => $wp_query->max_num_pages,
        'mid_size' => 5,
        'prev_text'          => __('Prev'),
		'next_text'          => __('Next')
    ) );

   
    if ( $paginate_links ) {
        echo '<div class="pagination">';
        echo $paginate_links;
        echo '</div>';
    }
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
//
// 
// SLIDER
//
add_action( 'init', 'my_custom_post_slider' );
function my_custom_post_slider() {
	$labels = array(
		'name'               => _x( 'Slide', 'post type general name' ),
		'singular_name'      => _x( 'Slide', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'Slide' ),
		'add_new_item'       => __( 'Add New Slide' ),
		'edit_item'          => __( 'Edit Slides' ),
		'new_item'           => __( 'New Slide' ),
		'all_items'          => __( 'All Slides' ),
		'view_item'          => __( 'View Slides' ),
		'search_items'       => __( 'Search Slides' ),
		'not_found'          => __( 'No Slides found' ),
		'not_found_in_trash' => __( 'No Slides found in the Trash' ),
		'parent_item_colon'  => '',
		'menu_name'          => 'Slider'
	);
	$args = array(
		'labels'        => $labels,
		'public'        => true,
		'hierarchical'	=> true,
		'show_in_nav_menus' => false,
		'supports'      => array( 'title', 'author'),
		'has_archive'   => true
	);
	register_post_type( 'slider', $args );
}
add_action( 'init', 'my_custom_post_slider' );
//
//
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
// DISABLE GRVITY FORMS ANCHOR
add_filter( 'gform_confirmation_anchor_1', '__return_false' );
//
//
//
//
// END FUNCTIONS
//
//
//
// =========================================================================
// CLEAN UP
// =========================================================================

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

// REMOVE EMOJI FROM HEADER
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' ); 

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

// =========================================================================
// SECURITY
// =========================================================================

// DISABLE VERSION INFO
function disable_version_info() {
    return '';
}
add_filter('the_generator', 'disable_version_info');
?>
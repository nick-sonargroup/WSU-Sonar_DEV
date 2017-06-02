<?php

/*
Plugin Name: Pop Admin
Plugin URI: http://www.thinksoda.com
Description: A simple plugin to help style the Admin screens of Wordpress, CSS knowledge needed!
Version: 1.1
Author: Nick Kind, Think Soda
Author URI: http://www.thinksoda.com
*/

//
// LOAD THE CSS FILE
//
function pop_admin_style() {
    	wp_register_style( 'pop_admin_style_css', plugins_url( '/style.css', __FILE__ ) );
    	wp_enqueue_style( 'pop_admin_style_css' );
}
add_action( 'admin_enqueue_scripts', 'pop_admin_style' );

//
// CHANGE THE FOOTER
//
function pop_admin_footer() {
    	// echo '<img src="' . plugins_url( 'images/wptutsplus-icon.png' , __FILE__ ) . '">';
	echo 'Customisation by <a href="http://www.sonargroup.com.au">Sonar Group</a>.';
}
add_filter( 'admin_footer_text', 'pop_admin_footer' );

//
// DASHBOARD WINDOW
//
add_action('wp_dashboard_setup', 'designed_by_thinksoda_dashboard');
function designed_by_thinksoda_dashboard() {
	global $wp_meta_boxes;
	wp_add_dashboard_widget('custom_help_widget', 'Designed and Integrated by Sonar Group', 'custom_dashboard_help');
}
function custom_dashboard_help() {
	echo '<div style="background-image:url('. plugins_url( 'sonar_logo.png' , __FILE__ ) . '); float: right; width: 164px; height: 100px;"></div>';
	echo '<p>&nbsp;</p>';
	echo '<p>www.sonargroup.com.au</p>';
	echo '<p>Thanks for using Sonar Group<br />';
	echo 'for support or any enquiries <a href="http://www.sonargroup.com.au" target="_blank">please click here</a>.</p>';
}

//
// LOGIN SCREEN
//
function pop_admin_login_css() {
	wp_enqueue_style( 'pop_admin_login_css', plugins_url( '/login.css', __FILE__ ), false );
}

// CHANGES LOGO PATH FROM WORDPRESS 
function pop_admin_login_url() {  
	return home_url(); 
}

// CHANGES LOGO ALT TEXT
function pop_admin_login_title() { 
	return get_option( 'blogname' ); 
}

// ONLY CALL AT LOGIN PAGE - otherwise we load everything in admin
add_action( 'login_enqueue_scripts', 'pop_admin_login_css', 10 );
add_filter( 'login_headerurl', 'pop_admin_login_url' );
add_filter( 'login_headertitle', 'pop_admin_login_title' );

//
// HEADER TIDY 
//
function pop_admin_header_tidy() {
	// category feeds
	// remove_action( 'wp_head', 'feed_links_extra', 3 );
	// post and comment feeds
	// remove_action( 'wp_head', 'feed_links', 2 );
	// EditURI link
	remove_action( 'wp_head', 'rsd_link' );
	// windows live writer
	remove_action( 'wp_head', 'wlwmanifest_link' );
	// index link
	remove_action( 'wp_head', 'index_rel_link' );
	// previous link
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
	// start link
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
	// links for adjacent posts
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
	// WP version
	remove_action( 'wp_head', 'wp_generator' );
} 

// 
// BETTER TITLE 
//
function pop_admin_wp_title( $title ) {
    // Do not filter for RSS feed / if SEO plugin installed
    if ( is_feed() || class_exists('All_in_One_SEO_Pack') || class_exists('HeadSpace_Plugin') || class_exists('Platinum_SEO_Pack') || class_exists('wpSEO') || defined('WPSEO_VERSION') )
        return $title;
    if ( is_front_page() ) {
        $title = get_bloginfo('name').' - '.get_bloginfo('description');
    }
    if ( is_front_page() && get_bloginfo('description') == '' ) {
        $title = get_bloginfo('name');
    }
    if ( !is_front_page() ) {
        $title .= ' - '.get_bloginfo('name');
    }
    return $title;
}
add_filter( 'wp_title', 'pop_admin_wp_title' );

//
// HIDES UPDATES FROM NON ADMINS
//
function ts_hide_update_notice_from_all_except_admin_users(){
	if (!current_user_can('update_core')) {        
		remove_action( 'admin_notices', 'update_nag', 3 );    
	}
}
add_action( 'admin_head', 'ts_hide_update_notice_from_all_except_admin_users', 1 );
//
// END 
//

?>
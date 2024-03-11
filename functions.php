<?php

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

function my_theme_enqueue_styles() {
 
    $parent_style = 'parent-style'; // This is 'twentyseventeen-style' for the Twenty Seventeen theme.
 
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}

/* Custom widget area constructor for listing highlighted posts. */ 

add_action( 'widgets_init', 'highlight_widget_init' );

function highlight_widget_init() {
	
	register_sidebar( array(
		'name' => 'Highlight Widget Area',
		'id' => 'highlight_widget_area',
		'before_widget' => '<aside class="see-more-content">',
		'after_widget' => '</asside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
}

/* Custom menu constructor for building the main site nav.*/

add_action( 'init', 'main_site_navigation_menu_register' );

function main_site_navigation_menu_register() {
	
	register_nav_menu( 'new-menu', __( 'Main Site Menu' ) );
	
}

/* Custom filter to change header based on time of day. */

add_filter( 'time_of_day', 'get_time_of_day' );

function get_time_of_day() {
	
	date_default_timezone_set( 'Australia/Perth' ); // UTC+08 timezone
	
	$hour = (int) date( 'H' );
	
	if ( $hour >= 6 && $hour < 12 ) {
		return 'morning';
	} elseif ( $hour == 12 || $hour > 12 && $hour < 18 ) {
		return 'afternoon';
	}
	
 	return 'evening';	
}

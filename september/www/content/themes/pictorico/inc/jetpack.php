<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Pictorico
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function pictorico_jetpack_setup() {
	//Infinite Scroll
	add_theme_support( 'infinite-scroll', array(
		'container'      => 'main',
		'footer'         => 'content',
		'footer_widgets' => array( 'sidebar-1', 'sidebar-2', 'sidebar-3', 'sidebar-4' ),
		'render'         => 'pictorico_infinite_scroll_render',
		'posts_per_page' => 8,
	) );

	//Featured Content
	add_theme_support( 'featured-content', array(
	    'filter'     => 'pictorico_get_featured_posts',
	    'max_posts'  => 10,
	    'post_types' => array( 'post', 'page', 'jetpack-portfolio' ),
	) );

	//This theme supports Jetpack Portfolios
	add_theme_support( 'jetpack-portfolio' );
}
add_action( 'after_setup_theme', 'pictorico_jetpack_setup' );

function pictorico_infinite_scroll_render() {
	while( have_posts() ) {
	    the_post();
	    get_template_part( 'content', 'home' );
	}
}

function pictorico_get_featured_posts() {
    return apply_filters( 'pictorico_get_featured_posts', array() );
}

function pictorico_has_featured_posts( $minimum = 1 ) {
    if ( is_paged() )
        return false;

    $minimum = absint( $minimum );
    $featured_posts = apply_filters( 'pictorico_get_featured_posts', array() );

    if ( ! is_array( $featured_posts ) )
        return false;

    if ( $minimum > count( $featured_posts ) )
        return false;

    return true;
}
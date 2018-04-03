<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package portfolia
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function portfolia_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'portfolia_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function portfolia_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'portfolia_pingback_header' );

/*--------------------------------------------------------------
 # Custom post types
 --------------------------------------------------------------*/
/*-------------------
 ## Remove Uneccessary post types
 ------------------*/
function custom_menu_page_removing() {
    remove_menu_page( 'edit.php?post_type=page' );    //Pages
    remove_menu_page( 'edit.php' );                   //Posts
    remove_menu_page( 'edit-comments.php' );          //Comments
}
add_action( 'admin_menu', 'custom_menu_page_removing' );

/*-------------------
 ## Experience
 ------------------*/
function create_post_experience() {
        register_post_type( 'experience',
            array(
                'labels'       => array(
                    'name'       => __( 'Experience' ),
                ),
                'public'       => true,
                'hierarchical' => true,
                'has_archive'  => true,
                'supports'     => array(
                    'title',
                    'editor',
                    'thumbnail',
                ), 
                'taxonomies'   => array(
                    'post_tag',
                    'category',
                )
            )
        );
        register_taxonomy_for_object_type( 'category', 'experience' );
        register_taxonomy_for_object_type( 'post_tag', 'experience' );
    }
    add_action( 'init', 'create_post_experience' );

/*--------------------------------------------------------------
 # Custom fields and meta boxes
 --------------------------------------------------------------*/
/*-------------------
 ## Start Date
 ------------------*/
function add_start_date_meta_box() {
    /*
    * Look here: https://www.taniarascia.com/wordpress-part-three-custom-fields-and-metaboxes/
    */
	add_meta_box(
		'start_date_meta_box', // $id
		'Start Date', // $title
		'show_start_date_meta_box', // $callback
		'experience', // $screen
		'normal', // $context
		'high' // $priority
	);
}
add_action( 'add_meta_boxes', 'add_start_date_meta_box' );

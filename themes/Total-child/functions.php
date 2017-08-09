<?php

function child_theme_enqueue_styles() {

    $parent_style = 'wpex-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/build/css/style.min.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
    wp_enqueue_script( 'slider', 
        get_stylesheet_directory_uri() . '/build/js/slider.min.js',
        array('jquery'), 
        false, true );

}
add_action( 'wp_enqueue_scripts', 'child_theme_enqueue_styles' );

/**
 * Get selected events by location taxonomy.
 *
 * @return WP_Query location in the taxonomy term if one was selected, else all.
 */
function get_locations_in_taxonomy_term() {
	return new WP_Query( array(
			'post_type'      => 'events',
			'posts_per_page' => 500, // max # of options in dropdown
			'tax_query'      => get_locations_in_taxonomy_term_tax_query(),
	) );
}

function get_locations_in_taxonomy_term_tax_query() {
	$selected_term = get_selected_location_dropdown_term();
	// If a term has been selected, use that in the taxonomy query.
	if ( $selected_term ) {
		return array(
			array(
				'taxonomy' => 'location',
				'field'    => 'term_id',
				'terms'    => $selected_term,
			),
		);
	}
	return array();
}

function get_selected_location_dropdown_term() {
	return isset( $_GET[ 'location' ] ) && $_GET[ 'location' ] ? sanitize_text_field( $_GET[ 'location' ] ) : '';
}


?>
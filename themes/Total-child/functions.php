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

function events_custom_taxonomy_dropdown( $taxonomy, $order = 'DESC', $limit = '-1', $name, $show_option_all = null, $show_option_none = null ) {
	$args = array(
		'order' => $order,
		'number' => $limit,
	);
	$terms = get_terms( $taxonomy, $args );
	$name = ( $name ) ? $name : $taxonomy;
	if ( $terms ) {
		printf( '<select name="location" class="location-category-select" onchange="submit();">', esc_attr( $name ) );
		if ( $show_option_all ) {
			printf( '<option value="0">%s</option>', esc_html( $show_option_all ) );
		}
		foreach ( $terms as $term ) {
			printf( '<option %s value="%s">%s</option>', ($term->slug == $_POST['location']) ? 'selected="selected"' : '', esc_attr( $term->slug ), esc_html( $term->name ) );
		}
		print( '</select>' );
	}
}

?>
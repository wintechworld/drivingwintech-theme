<?php
/**
 * TAXONOMIES
 *
 * @link  http://codex.wordpress.org/Function_Reference/register_taxonomy
 */

if ( ! function_exists( 'register_location_taxonomy_type' ) ) {

function register_location_taxonomy_type() {

	$labels = array(
		'name'                       => 'Locations',
		'singular_name'              => 'Location',
		'menu_name'                  => 'Event Location',
		'all_items'                  => 'All Locations',
		'parent_item'                => 'Parent Location Item',
		'parent_item_colon'          => 'Parent Location Item:',
		'new_item_name'              => 'New Location Name',
		'add_new_item'               => 'Add New Location',
		'edit_item'                  => 'Edit Location',
		'update_item'                => 'Update Location',
		'view_item'                  => 'View Location',
		'separate_items_with_commas' => 'Separate locations with commas',
		'add_or_remove_items'        => 'Add or remove locations',
		'choose_from_most_used'      => 'Choose from the most used',
		'popular_items'              => 'Popular Locations',
		'search_items'               => 'Search Locations',
		'not_found'                  => 'Not Found',
		'no_terms'                   => 'No Locations',
		'items_list'                 => 'Location list',
		'items_list_navigation'      => 'Location list navigation',
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'location', array( 'events' ), $args );

}
add_action( 'init', 'register_location_taxonomy_type', 0 );

}
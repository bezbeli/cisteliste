<?php
// Register Custom Post Type
function custom_post_types() {

	$labels = array(
		'name'                => _x( 'Municipalities', 'Post Type General Name', 'cisteliste' ),
		'singular_name'       => _x( 'Municipality', 'Post Type Singular Name', 'cisteliste' ),
		'menu_name'           => __( 'Municipalities', 'cisteliste' ),
		'parent_item_colon'   => __( 'Parent Municipality:', 'cisteliste' ),
		'all_items'           => __( 'All Municipalities', 'cisteliste' ),
		'view_item'           => __( 'View Municipality', 'cisteliste' ),
		'add_new_item'        => __( 'Add New Municipality', 'cisteliste' ),
		'add_new'             => __( 'Add New', 'cisteliste' ),
		'edit_item'           => __( 'Edit Municipality', 'cisteliste' ),
		'update_item'         => __( 'Update Municipality', 'cisteliste' ),
		'search_items'        => __( 'Search Municipalities', 'cisteliste' ),
		'not_found'           => __( 'Not found', 'cisteliste' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'cisteliste' ),
	);
	$args = array(
		'label'               => __( 'municipality_post_type', 'cisteliste' ),
		'description'         => __( 'Municipality Description', 'cisteliste' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'custom-fields', 'page-attributes', ),
		'taxonomies'          => array( 'category', 'post_tag' ),
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'municipalities', $args );

}

// Hook into the 'init' action
add_action( 'init', 'custom_post_types', 0 );
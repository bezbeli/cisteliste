<?php
// Register Custom Taxonomies
function custom_taxonomies() {

// Register Party names taxonomy
	$labels = array(
		'name'					=> _x( 'Party names', 'Taxonomy General Name',		'cisteliste' ),
		'singular_name'			=> _x( 'Party name', 'Taxonomy Singular Name',		'cisteliste' ),
		'menu_name'				=> __( 'Party name',						'cisteliste' ),
		'all_items'				=> __( 'All Party names',					'cisteliste' ),
		'parent_item'				=> __( 'Parent Item',						'cisteliste' ),
		'parent_item_colon'			=> __( 'Parent Item:',						'cisteliste' ),
		'new_item_name'			=> __( 'New Party Name',					'cisteliste' ),
		'add_new_item'			=> __( 'Add New Party name',					'cisteliste' ),
		'edit_item'				=> __( 'Edit Item',						'cisteliste' ),
		'update_item'				=> __( 'Update Item',						'cisteliste' ),
		'separate_items_with_commas'	=> __( 'Separate items with commas',				'cisteliste' ),
		'search_items'				=> __( 'Search Items',						'cisteliste' ),
		'add_or_remove_items'		=> __( 'Add or remove items',					'cisteliste' ),
		'choose_from_most_used'		=> __( 'Choose from the most used items',			'cisteliste' ),
		'not_found'				=> __( 'Not Found',						'cisteliste' ),
	);
	$args = array(
		'labels'					=> $labels,
		'hierarchical'				=> true,
		'public'					=> true,
		'show_ui'				=> true,
		'show_admin_column'			=> true,
		'show_in_nav_menus'			=> true,
		'show_tagcloud'			=> true,
	);
	register_taxonomy( 'party_name', array( 'candidates' ), $args );

// Register Election names taxonomy
	$labels = array(
		'name'					=> _x( 'Election names', 'Taxonomy General Name',		'cisteliste' ),
		'singular_name'			=> _x( 'Election name', 'Taxonomy Singular Name',		'cisteliste' ),
		'menu_name'				=> __( 'Election name',						'cisteliste' ),
		'all_items'				=> __( 'All Election names',					'cisteliste' ),
		'parent_item'				=> __( 'Parent Item',						'cisteliste' ),
		'parent_item_colon'			=> __( 'Parent Item:',						'cisteliste' ),
		'new_item_name'			=> __( 'New Election Name',					'cisteliste' ),
		'add_new_item'			=> __( 'Add New Election name',				'cisteliste' ),
		'edit_item'				=> __( 'Edit Item',						'cisteliste' ),
		'update_item'				=> __( 'Update Item',						'cisteliste' ),
		'separate_items_with_commas' 	=> __( 'Separate items with commas',				'cisteliste' ),
		'search_items'				=> __( 'Search Items',						'cisteliste' ),
		'add_or_remove_items'		=> __( 'Add or remove items',					'cisteliste' ),
		'choose_from_most_used'		=> __( 'Choose from the most used items',			'cisteliste' ),
		'not_found'				=> __( 'Not Found',						'cisteliste' ),
	);
	$args = array(
		'labels'					=> $labels,
		'hierarchical'				=> true,
		'public'					=> true,
		'show_ui'				=> true,
		'show_admin_column'			=> true,
		'show_in_nav_menus'			=> true,
		'show_tagcloud'			=> true,
	);
	register_taxonomy( 'election_name', array( 'candidates' ), $args );

// Register List number taxonomy
	$labels = array(
		'name'					=> _x( 'List numbers', 'Taxonomy General Name',		'cisteliste' ),
		'singular_name'			=> _x( 'List number', 'Taxonomy Singular Name',		'cisteliste' ),
		'menu_name'				=> __( 'List number',						'cisteliste' ),
		'all_items'				=> __( 'All List numbers',					'cisteliste' ),
		'parent_item'				=> __( 'Parent Item',						'cisteliste' ),
		'parent_item_colon'			=> __( 'Parent Item:',						'cisteliste' ),
		'new_item_name'			=> __( 'New List number',					'cisteliste' ),
		'add_new_item'			=> __( 'Add New List number',					'cisteliste' ),
		'edit_item'				=> __( 'Edit Item',						'cisteliste' ),
		'update_item'				=> __( 'Update Item',						'cisteliste' ),
		'separate_items_with_commas'	=> __( 'Separate items with commas',				'cisteliste' ),
		'search_items'				=> __( 'Search Items',						'cisteliste' ),
		'add_or_remove_items'		=> __( 'Add or remove items',					'cisteliste' ),
		'choose_from_most_used'		=> __( 'Choose from the most used items',			'cisteliste' ),
		'not_found'				=> __( 'Not Found',						'cisteliste' ),
	);
	$args = array(
		'labels'					=> $labels,
		'hierarchical'				=> true,
		'public'					=> true,
		'show_ui'				=> true,
		'show_admin_column'			=> true,
		'show_in_nav_menus'			=> true,
		'show_tagcloud'			=> true,
	);
	register_taxonomy( 'list_number', array( 'candidates' ), $args );
}

// Hook into the 'init' action
add_action( 'init', 'custom_taxonomies', 0 );

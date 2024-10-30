<?php

namespace cdzServicesManager;

/*
 *	cdzClass: Work Group
 */

class cdz_Service_Group {

	function __construct() {

		/*
		 *	Register taxonomy
		 */

		add_action( 'init', array( &$this, 'register_taxonomy' ) );

		/*
		 *	Add form fields remover
		 */

		add_action( 'cdz_service_group_add_form_fields', array( &$this, 'add_form_fields_remover' ), 10, 2 );

	}

	function register_taxonomy() {
	
		$labels = array(
			'name'							=>	__( 'Service Groups', 'cdz' ),
			'singular_name'					=>	__( 'Service Group', 'cdz' ),
			'menu_name'						=>	__( 'Groups', 'cdz' ),
			'all_items'						=>	__( 'All Service Groups', 'cdz' ),
			'edit_item'						=>	__( 'Edit Service Group', 'cdz' ),
			'view_item'						=>	__( 'View Service Group', 'cdz' ),
			'update_item'					=>	__( 'Update Service Group', 'cdz' ),
			'add_new_item'					=>	__( 'Add New Service Group', 'cdz' ),
			'new_item_name'					=>	__( 'New Service Group Name', 'cdz' ),
			'search_items'					=>	__( 'Search Service Groups', 'cdz' ),
			'popular_items'					=>	NULL,
			'separate_items_with_commas'	=>	__( 'Separate service groups with commas', 'cdz' ),
			'add_or_remove_items'			=>	__( 'Add or remove service groups', 'cdz' ),
			'choose_from_most_used'			=>	__( 'Choose from the most used service groups', 'cdz' ),
			'not_found'						=>	__( 'No service groups found.', 'cdz' ),
		);

		$args = array(
			'label'				=>	__( 'Group' ),
			'labels'			=>	$labels,
			'show_in_nav_menus'	=>	true,
			'hierarchical'		=>	true,
			'rewrite'			=>	array( 'slug' => 'service-group' ),
		);

		register_taxonomy( 'cdz_service_group',
			apply_filters( 'cdz_service_group_objects', array('cdz_service') ),
			apply_filters( 'cdz_service_group_args', $args )
		);

	}

	function add_form_fields_remover() {

		echo '<style>.form-field{display:none;}.form-field.form-required{display:block;}</style>';

	}

}
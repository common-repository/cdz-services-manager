<?php

namespace cdzServicesManager;

/*
 *	cdzClass: Service Category
 */

class cdz_Service_Category {

	function __construct() {

		/*
		 *	Register taxonomy
		 */

		add_action( 'init', array( &$this, 'register_taxonomy' ) );

		/*
		 *	Add form fields remover
		 */

		add_action( 'cdz_service_category_add_form_fields', array( &$this, 'add_form_fields_remover' ), 10, 2 );

	}

	function register_taxonomy() {
	
		$labels = array(
			'name'							=>	__( 'Service Categories', 'cdz' ),
			'singular_name'					=>	__( 'Service Category', 'cdz' ),
			'menu_name'						=>	__( 'Categories', 'cdz' ),
			'all_items'						=>	__( 'All Service Categories', 'cdz' ),
			'edit_item'						=>	__( 'Edit Service Category', 'cdz' ),
			'view_item'						=>	__( 'View Service Category', 'cdz' ),
			'update_item'					=>	__( 'Update Service Category', 'cdz' ),
			'add_new_item'					=>	__( 'Add New Service Category', 'cdz' ),
			'new_item_name'					=>	__( 'New Service Category Name', 'cdz' ),
			'search_items'					=>	__( 'Search Service Categories', 'cdz' ),
			'popular_items'					=>	NULL,
			'separate_items_with_commas'	=>	__( 'Separate service categories with commas', 'cdz' ),
			'add_or_remove_items'			=>	__( 'Add or remove service categories', 'cdz' ),
			'choose_from_most_used'			=>	__( 'Choose from the most used service categories', 'cdz' ),
			'not_found'						=>	__( 'No service categories found.', 'cdz' ),
		);

		$args = array(
			'label'				=>	__( 'Category' ),
			'labels'			=>	$labels,
			'show_in_nav_menus'	=>	true,
			'hierarchical'		=>	true,
			'rewrite'			=>	array( 'slug' => 'service-category' ),
		);

		register_taxonomy( 'cdz_service_category',
			apply_filters( 'cdz_service_category_objects', array('cdz_service') ),
			apply_filters( 'cdz_service_category_args', $args )
		);
		
	}

	function add_form_fields_remover() {

		echo '<style>.form-field{display:none;}.form-field.form-required{display:block;}</style>';

	}

}
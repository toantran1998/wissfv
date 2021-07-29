<?php

namespace NAXLYPLUGIN\Inc;


use NAXLYPLUGIN\Inc\Abstracts\Taxonomy;


class Taxonomies extends Taxonomy {


	public static function init() {

		$labels = array(
			'name'              => _x( 'Project Category', 'wpnaxly' ),
			'singular_name'     => _x( 'Project Category', 'wpnaxly' ),
			'search_items'      => __( 'Search Category', 'wpnaxly' ),
			'all_items'         => __( 'All Categories', 'wpnaxly' ),
			'parent_item'       => __( 'Parent Category', 'wpnaxly' ),
			'parent_item_colon' => __( 'Parent Category:', 'wpnaxly' ),
			'edit_item'         => __( 'Edit Category', 'wpnaxly' ),
			'update_item'       => __( 'Update Category', 'wpnaxly' ),
			'add_new_item'      => __( 'Add New Category', 'wpnaxly' ),
			'new_item_name'     => __( 'New Category Name', 'wpnaxly' ),
			'menu_name'         => __( 'Project Category', 'wpnaxly' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'project_cat' ),
		);

		register_taxonomy( 'project_cat', 'naxly_project', $args );
		
		//Services Taxonomy Start
		$labels = array(
			'name'              => _x( 'Service Category', 'wpnaxly' ),
			'singular_name'     => _x( 'Service Category', 'wpnaxly' ),
			'search_items'      => __( 'Search Category', 'wpnaxly' ),
			'all_items'         => __( 'All Categories', 'wpnaxly' ),
			'parent_item'       => __( 'Parent Category', 'wpnaxly' ),
			'parent_item_colon' => __( 'Parent Category:', 'wpnaxly' ),
			'edit_item'         => __( 'Edit Category', 'wpnaxly' ),
			'update_item'       => __( 'Update Category', 'wpnaxly' ),
			'add_new_item'      => __( 'Add New Category', 'wpnaxly' ),
			'new_item_name'     => __( 'New Category Name', 'wpnaxly' ),
			'menu_name'         => __( 'Service Category', 'wpnaxly' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'service_cat' ),
		);


		register_taxonomy( 'service_cat', 'naxly_service', $args );
		
		//Testimonials Taxonomy Start
		$labels = array(
			'name'              => _x( 'Testimonials Category', 'wpnaxly' ),
			'singular_name'     => _x( 'Testimonials Category', 'wpnaxly' ),
			'search_items'      => __( 'Search Category', 'wpnaxly' ),
			'all_items'         => __( 'All Categories', 'wpnaxly' ),
			'parent_item'       => __( 'Parent Category', 'wpnaxly' ),
			'parent_item_colon' => __( 'Parent Category:', 'wpnaxly' ),
			'edit_item'         => __( 'Edit Category', 'wpnaxly' ),
			'update_item'       => __( 'Update Category', 'wpnaxly' ),
			'add_new_item'      => __( 'Add New Category', 'wpnaxly' ),
			'new_item_name'     => __( 'New Category Name', 'wpnaxly' ),
			'menu_name'         => __( 'Testimonials Category', 'wpnaxly' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'testimonials_cat' ),
		);


		register_taxonomy( 'testimonials_cat', 'naxly_testimonials', $args );
		
		
		//Team Taxonomy Start
		$labels = array(
			'name'              => _x( 'Team Category', 'wpnaxly' ),
			'singular_name'     => _x( 'Team Category', 'wpnaxly' ),
			'search_items'      => __( 'Search Category', 'wpnaxly' ),
			'all_items'         => __( 'All Categories', 'wpnaxly' ),
			'parent_item'       => __( 'Parent Category', 'wpnaxly' ),
			'parent_item_colon' => __( 'Parent Category:', 'wpnaxly' ),
			'edit_item'         => __( 'Edit Category', 'wpnaxly' ),
			'update_item'       => __( 'Update Category', 'wpnaxly' ),
			'add_new_item'      => __( 'Add New Category', 'wpnaxly' ),
			'new_item_name'     => __( 'New Category Name', 'wpnaxly' ),
			'menu_name'         => __( 'Team Category', 'wpnaxly' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'team_cat' ),
		);


		register_taxonomy( 'team_cat', 'naxly_team', $args );
		
		//Faqs Taxonomy Start
		$labels = array(
			'name'              => _x( 'Faqs Category', 'wpnaxly' ),
			'singular_name'     => _x( 'Faq Category', 'wpnaxly' ),
			'search_items'      => __( 'Search Category', 'wpnaxly' ),
			'all_items'         => __( 'All Categories', 'wpnaxly' ),
			'parent_item'       => __( 'Parent Category', 'wpnaxly' ),
			'parent_item_colon' => __( 'Parent Category:', 'wpnaxly' ),
			'edit_item'         => __( 'Edit Category', 'wpnaxly' ),
			'update_item'       => __( 'Update Category', 'wpnaxly' ),
			'add_new_item'      => __( 'Add New Category', 'wpnaxly' ),
			'new_item_name'     => __( 'New Category Name', 'wpnaxly' ),
			'menu_name'         => __( 'Faq Category', 'wpnaxly' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'faqs_cat' ),
		);


		register_taxonomy( 'faqs_cat', 'naxly_faqs', $args );
	}
	
}

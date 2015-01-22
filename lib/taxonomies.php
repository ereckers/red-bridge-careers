<?php 
/**
 * Setup and Register Taxonomy
 *
 * @url http://codex.wordpress.org/Function_Reference/register_taxonomy
 *
 * @name Departments
 * @desc This is a taxonomy for Career Departments
 * @type Taxonomy, Not Heirarchical (like tags)
 * @var  rb415_departments
 * @slug departments
 */
$labels = array(
	'name' => __( 'Departments' ),
	'singular_name' => __( 'Department' ),
	'search_items' => __( 'Search Departments' ),
	'popular_items' => __( 'Popular Departments' ),
	'all_items' => __( 'All Departments' ),
	'parent_item' => null,
	'parent_item_colon' => null,
	'edit_item' => __('Edit Department'),
	'update_item' => __('Update Department'),
	'add_new_item' => __('Add New Department'),
	'new_item_name' => __('New Department'),
	'menu_name' => __('Departments')
);
$args = array(
	'hierarchical' => false,
	'labels' => $labels,
	'show_ui' => true,
	'query_var' => true,
	'rewrite' => array( 'slug' => 'departments' )
);
register_taxonomy( 'rb415_departments', array('rb415_careers'), $args );


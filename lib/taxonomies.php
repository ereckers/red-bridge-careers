<?php 
/**
 * Setup and Register Taxonomy
 *
 * @url http://codex.wordpress.org/Function_Reference/register_taxonomy
 *
 * @name Types
 * @desc This is a taxonomy for Career Types
 * @type Taxonomy, Not Heirarchical (like tags)
 * @var  career_types
 * @slug career-types
 */
$labels = array(
	'name' => __( 'Types' ),
	'singular_name' => __( 'Type' ),
	'search_items' => __( 'Search Types' ),
	'popular_items' => __( 'Popular Types' ),
	'all_items' => __( 'All Types' ),
	'parent_item' => null,
	'parent_item_colon' => null,
	'edit_item' => __('Edit Type'),
	'update_item' => __('Update Type'),
	'add_new_item' => __('Add New Type'),
	'new_item_name' => __('New Type'),
	'menu_name' => __('Types')
);
$args = array(
	'hierarchical' => false,
	'labels' => $labels,
	'show_ui' => true,
	'query_var' => true,
	'rewrite' => array( 'slug' => 'career-types' )
);
register_taxonomy( 'career_types', array('careers'), $args );


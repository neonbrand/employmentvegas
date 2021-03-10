<?php
/**
 * Post Types
 *
 * This file registers any custom post types
 *
 * @package      Core_Functionality
 * @since        1.0.0
 * @link         https://github.com/billerickson/Core-Functionality
 * @author       Bill Erickson <bill@billerickson.net>
 * @copyright    Copyright (c) 2011, Bill Erickson
 * @license      http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */



/**
 * Create Rotator post type
 * @since 1.0.0
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */

function be_register_service_post_type() {
	$labels = array(
		'name' => 'Services',
		'singular_name' => 'Service',
		'add_new' => 'Add New',
		'add_new_item' => 'Add New Service',
		'edit_item' => 'Edit Service',
		'new_item' => 'New Service',
		'view_item' => 'View Service',
		'search_items' => 'Search Services',
		'not_found' =>  'No services found',
		'not_found_in_trash' => 'No services found in trash',
		'parent_item_colon' => '',
		'menu_name' => 'Services'
	);

	$supports = array(
		'title',
		'editor',
		'author',
		'thumbnail',
		'excerpt',
		// 'trackbacks',
		// 'custom-fields',
		// 'comments',
		// 'revisions',
		'page-attributes',
		// 'post-formats',
		);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => true,
		'menu_icon' => 'dashicons-portfolio', //custom icons https://developer.wordpress.org/resource/dashicons/
		'capability_type' => 'post',
		'has_archive' => false,
		'hierarchical' => false, //For parent posts set true
		'menu_position' => null,
		'supports' => $supports
	);

	register_post_type( 'service', $args );
}
add_action( 'init', 'be_register_service_post_type' );

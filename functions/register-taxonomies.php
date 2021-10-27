<?php

function baw_register_my_taxes() {

	/**
	 * Taxonomy: Bereich
	 */

	$labels = [
		"name" => __( "Bereiche", "custom-post-type-ui" ),
		"singular_name" => __( "Bereich", "custom-post-type-ui" ),
		"menu_name" => __( "Bereiche", "custom-post-type-ui" ),
	];


	$args = [
		"label" => __( "Bereiche", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'bereich', 'with_front' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"rest_base" => "location",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => true,
		"show_in_graphql" => false,
	];
	register_taxonomy( "location", [ "angebot" ], $args );

	
}
add_action( 'init', 'baw_register_my_taxes' );



?>

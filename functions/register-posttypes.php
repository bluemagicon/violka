<?php

function baw_register_my_cpts() {

    /*
     * Post-Type: Angebote
     */

	$labels = [
		"name" => __( "Angebote", "baw" ),
		"singular_name" => __( "Angebot", "baw" ),
	];

	$args = [
		"label" => __( "Angebote", "baw" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => false,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "angebot", "with_front" => true ],
		"query_var" => true,
		"menu_position" => 20,
		"menu_icon" => "dashicons-food",
		"supports" => [ "title", "editor", "thumbnail", "excerpt" ],
		"show_in_graphql" => false,
	];

	register_post_type( "angebot", $args );
}

add_action( 'init', 'baw_register_my_cpts' );


?>

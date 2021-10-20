<?php

// ===============================================
// ===============================================
// Disable Custom Colors

//add_theme_support( 'disable-custom-colors' );


// ===============================================
// ===============================================
// Custom Palette

add_theme_support( 'editor-color-palette', array(
	array(
		'name'  => __( 'Primary', 'ea_genesis_child' ),
		'slug'  => 'primary',
		'color'	=> '#b31447',
	),
	array(
		'name'  => __( 'Dark', 'ea_genesis_child' ),
		'slug'  => 'dark',
		'color' => '#353535',
	),
	array(
		'name'	=> __( 'Medium', 'ea_genesis_child' ),
		'slug'	=> 'medium',
		'color'	=> '#988c7a',
	),
	array(
		'name'  => __( 'Light', 'ea_genesis_child' ),
		'slug'  => 'light',
		'color' => '#daa5ad',
	),
	array(
		'name'	=> __( 'White', 'ea_genesis_child' ),
		'slug'	=> 'white',
		'color'	=> '#fff',
	),
) );

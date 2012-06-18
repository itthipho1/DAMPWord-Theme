<?php

/******* FRONT-END SECTION *******/

/*	Enabling Custom Navigation Menus &
	register the names of our menus
	*/
register_nav_menus( array(
	'top_menu' => 'Top Level Menu',
	'left_menu' => 'Left Menu'
) );


/******* ADMIN SECTION *******/

/*	Load the "No Half Pixels" Theme Options Framework 
	*/
get_template_part('nhp', 'options');

/* Renaming some menus */
function edit_admin_menus() {
	global $menu;
	global $submenu;

	$menu[5][0] = 'News'; // Change Posts to Recipes
	$submenu['edit.php'][5][0] = 'All News';
}
add_action( 'admin_menu', 'edit_admin_menus' );

/* Register Custom Post Type */
function create_post_type() {
	register_post_type( 'damp_publication',
		array(
			'labels' => array(
				'name' => __( 'Publications' ),
				'singular_name' => __( 'Publication' )
			),
			'public' => true,
			'has_archive' => true,
			'menu_position' => 5,
			'menu_icon' => get_stylesheet_directory_uri() . '/admin/img/icons/publications_icon.png',
			'hierarchical' => true,
			'supports' => array( 'title', 'editor', 'revisions', 'author', 'excerpt', 'custom-fields', 'page-attributes' ),
			'rewrite' => array('slug' => 'publications')
		)
	);
}
add_action( 'init', 'create_post_type' );



/* Register Custom Taxonomy */
$labels = array(
    'name'                          => __( 'Actors', 'your-themes-text-domain' ),
    'singular_name'                 => __( 'Actor', 'your-themes-text-domain' ),
    'search_items'                  => __( 'Search Actors', 'your-themes-text-domain' ),
    'popular_items'                 => __( 'Popular Actors', 'your-themes-text-domain' ),
    'all_items'                     => __( 'All Actors', 'your-themes-text-domain' ),
    'parent_item'                   => __( 'Parent Actor', 'your-themes-text-domain' ),
    'edit_item'                     => __( 'Edit Actor', 'your-themes-text-domain' ),
    'update_item'                   => __( 'Update Actor', 'your-themes-text-domain' ),
    'add_new_item'                  => __( 'Add New Actor', 'your-themes-text-domain' ),
    'new_item_name'                 => __( 'New Actor', 'your-themes-text-domain' ),
    'separate_items_with_commas'    => __( 'Separate Actors with commas', 'your-themes-text-domain' ),
    'add_or_remove_items'           => __( 'Add or remove Actors', 'your-themes-text-domain' ),
    'choose_from_most_used'         => __( 'Choose from most used Actors', 'your-themes-text-domain' )
);

$args = array(
    'labels'                        => $labels,
    'public'                        => true,
    'show_in_nav_menus'             => true,
    'show_ui'                       => true,
    'hierarchical'                  => true,
    'query_var'                     => true
);

register_taxonomy( 'Fiscal Monitor', array('damp_publication'), $args );



?>
<?php
//
// add Site Options Menu
// --------------------------------------------------------------------
function home_page_menu() {
  add_menu_page( 'Site Options', 'Site Options', 'edit_posts', 'home-menu', null, '', 32 );
}
add_action('admin_menu', 'home_page_menu');
add_action('admin_menu', 'register_my_custom_submenu_page');
function register_my_custom_submenu_page() {
	add_submenu_page( 'home-menu', 'Add New Staff Member', 'Add New Staff Member', 'edit_posts',' post-new.php?post_type=staff');
	add_submenu_page( 'home-menu', 'Add New Module', 'Add New Module', 'manage_options',' post-new.php?post_type=component');	
}
/**
 * Add custom taxonomies
 *
 * Additional custom taxonomies can be defined here
 * http://codex.wordpress.org/Function_Reference/register_taxonomy
 */
//
// Programs
// --------------------------------------------------------------------
function add_custom_program_tax() {
	// Add new "Types" taxonomy to Programs
	register_taxonomy('program-type', 'program', array(
		// Hierarchical taxonomy (like categories)
		'hierarchical' => true,
		// This array of options controls the labels displayed in the WordPress Admin UI
		'labels' => array(
			'name' => _x( 'Program Types', 'Program Types' ),
			'singular_name' => _x( 'Program Type', 'Program Types' ),
			'search_items' =>  __( 'Search Program Types' ),
			'all_items' => __( 'All Program Types' ),
			'parent_item' => __( 'Parent Program Types' ),
			'parent_item_colon' => __( 'Parent Program Types:' ),
			'edit_item' => __( 'Edit Program Type' ),
			'update_item' => __( 'Update Program Type' ),
			'add_new_item' => __( 'Add New Program Type' ),
			'new_item_name' => __( 'New Program Type Name' ),
			'menu_name' => __( 'Program Types' ),
		),
		// Control the slugs used for this taxonomy
		'rewrite' => array(
			'slug' => 'program-type', // This controls the base slug that will display before each term
			'with_front' => false, // Don't display the category base before "/locations/"
			'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
		),
	));
}
add_action( 'init', 'add_custom_program_tax', 0 );
// Register Custom Post Type
function custom_program_type() {

	$labels = array(
		'name'                => _x( 'Programs', 'Post Type General Name', 'bonestheme' ),
		'singular_name'       => _x( 'Program', 'Post Type Singular Name', 'bonestheme' ),
		'menu_name'           => __( 'Program', 'bonestheme' ),
		'parent_item_colon'   => __( 'Parent Program:', 'bonestheme' ),
		'all_items'           => __( 'Programs', 'bonestheme' ),
		'view_item'           => __( 'View Program', 'bonestheme' ),
		'add_new_item'        => __( 'Add New Program', 'bonestheme' ),
		'add_new'             => __( 'Add New', 'bonestheme' ),
		'edit_item'           => __( 'Edit Program', 'bonestheme' ),
		'update_item'         => __( 'Update Program', 'bonestheme' ),
		'search_items'        => __( 'Search Programs', 'bonestheme' ),
		'not_found'           => __( 'Not found', 'bonestheme' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'bonestheme' ),
	);
	$rewrite = array(
		'slug'                => 'program',
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => true,
	);
	$args = array(
		'label'               => __( 'program', 'bonestheme' ),
		'description'         => __( 'Program pages for Summer College', 'bonestheme' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', ),
		'taxonomies'          => array( 'program-type' ),
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => false,
		'show_in_admin_bar'   => true,
		'menu_position'       => 21,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'rewrite'             => $rewrite,
		'capability_type'     => 'page',
	);
	register_post_type( 'program', $args );

}

// Hook into the 'init' action
add_action( 'init', 'custom_program_type', 0 );
//
// Staff
// --------------------------------------------------------------------
add_action('init', 'cptui_register_my_cpt_staff');
function cptui_register_my_cpt_staff() {
	register_post_type('staff', array(
		'label' => 'Staff',
		'description' => '',
		'public' => true,
		'publicly_queryable' => false,
		'show_ui' => true,
		'menu_position' => 1,
		'show_in_menu' => 'home-menu',
		'show_in_nav_menus' => false,
		'capability_type' => 'post',
		'map_meta_cap' => true,
		'hierarchical' => false,
		//'rewrite' => array('slug' => 'about-us/who-we-are/', 'with_front' => true),
		'query_var' => false,
		'exclude_from_search' => true,
		'menu_position' => '27',
		'supports' => array('title','editor','revisions','thumbnail'),
		'labels' => array (
			'name' => 'Staff',
			'singular_name' => 'Staff',
			'menu_name' => 'Staff',
			'add_new' => 'Add Staff',
			'add_new_item' => 'Add New Staff',
			'edit' => 'Edit',
			'edit_item' => 'Edit Staff',
			'new_item' => 'New Staff',
			'view' => 'View Staff',
			'view_item' => 'View Staff',
			'search_items' => 'Search Staff',
			'not_found' => 'No Staff Found',
			'not_found_in_trash' => 'No Staff Found in Trash',
			'parent' => 'Parent Staff',
		)
	));
}
//
// Stories
// --------------------------------------------------------------------
add_action('init', 'cptui_register_my_cpt_stories');
function cptui_register_my_cpt_stories() {
	register_post_type('stories', array(
		'label' => 'Stories',
		'description' => '',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'post',
		'show_in_nav_menus' => false,
		'map_meta_cap' => true,
		'hierarchical' => false,
		'rewrite' => array('slug' => 'stories', 'with_front' => true),
		'query_var' => true,
		'menu_position' => '22',
		'supports' => array('title','editor','excerpt','thumbnail', 'revisions'),
		'labels' => array (
			'name' => 'Stories',
			'singular_name' => 'Story',
			'menu_name' => 'Stories',
			'add_new' => 'Add Story',
			'add_new_item' => 'Add New Story',
			'edit' => 'Edit',
			'edit_item' => 'Edit Story',
			'new_item' => 'New Story',
			'view' => 'View Story',
			'view_item' => 'View Story',
			'search_items' => 'Search Stories',
			'not_found' => 'No Stories Found',
			'not_found_in_trash' => 'No Stories Found in Trash',
			'parent' => 'Parent Story',
		)
	));
}
//
// FAQs
// --------------------------------------------------------------------
add_action('init', 'cptui_register_my_cpt_faq');
function cptui_register_my_cpt_faq() {
	register_post_type('faq', array(
		'label' => 'FAQs',
		'description' => '',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'post',
		'show_in_nav_menus' => false,
		'map_meta_cap' => true,
		'hierarchical' => false,
		'rewrite' => array('slug' => 'faq', 'with_front' => true),
		'query_var' => true,
		'menu_position' => '24',
		'supports' => array('title','editor','revisions'),
		'labels' => array (
			'name' => 'FAQs',
			'singular_name' => 'FAQ',
			'menu_name' => 'FAQs',
			'add_new' => 'Add FAQ',
			'add_new_item' => 'Add New FAQ',
			'edit' => 'Edit',
			'edit_item' => 'Edit FAQ',
			'new_item' => 'New FAQ',
			'view' => 'View FAQ',
			'view_item' => 'View FAQ',
			'search_items' => 'Search FAQs',
			'not_found' => 'No FAQs Found',
			'not_found_in_trash' => 'No FAQs Found in Trash',
			'parent' => 'Parent FAQ',
		)
	));
}
//
// Components
// --------------------------------------------------------------------
add_action('init', 'cptui_register_my_cpt_component');
function cptui_register_my_cpt_component() {
	register_post_type('component', array(
		'label' => 'Modules',
		'description' => '',
		'public' => true,
		'show_ui' => true,
		'menu_position' => 3,
		'show_in_menu' => 'home-menu',
		'capability_type' => 'page',
		'show_in_nav_menus' => false,
		'map_meta_cap' => true,
		'hierarchical' => false,
		'rewrite' => array('slug' => 'component', 'with_front' => true),
		'query_var' => true,
		'exclude_from_search' => true,
		'menu_position' => '28',
		'supports' => array('title','editor','thumbnail'),
		'labels' => array (
			'name' => 'Modules',
			'singular_name' => 'Module',
			'menu_name' => 'Modules',
			'add_new' => 'Add Module',
			'add_new_item' => 'Add New Module',
			'edit' => 'Edit',
			'edit_item' => 'Edit Module',
			'new_item' => 'New Module',
			'view' => 'View Module',
			'view_item' => 'View Module',
			'search_items' => 'Search Modules',
			'not_found' => 'No Modules Found',
			'not_found_in_trash' => 'No Modules Found in Trash',
			'parent' => 'Parent Module',
		)
	));
}
//
// Slides
// --------------------------------------------------------------------
add_action('init', 'cptui_register_my_cpt_slide');
function cptui_register_my_cpt_slide() {
	register_post_type('slide', array(
		'label' => 'Slides',
		'description' => '',
		'public' => false,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'post',
		'show_in_nav_menus' => false,
		'map_meta_cap' => true,
		'hierarchical' => false,
		'rewrite' => array('slug' => 'slide', 'with_front' => true),
		'query_var' => false,
		'exclude_from_search' => true,
		'menu_position' => '23',
		'supports' => array('title','editor','revisions','thumbnail'),
		'labels' => array (
			'name' => 'Slides',
			'singular_name' => 'Slide',
			'menu_name' => 'Slides',
			'add_new' => 'Add Slide',
			'add_new_item' => 'Add New Slide',
			'edit' => 'Edit',
			'edit_item' => 'Edit Slide',
			'new_item' => 'New Slide',
			'view' => 'View Slide',
			'view_item' => 'View Slide',
			'search_items' => 'Search Slides',
			'not_found' => 'No Slides Found',
			'not_found_in_trash' => 'No Slides Found in Trash',
			'parent' => 'Parent Slide',
		)
	));
}
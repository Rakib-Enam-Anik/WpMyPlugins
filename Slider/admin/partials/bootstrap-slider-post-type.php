<?php
// Register Custom Post Type
function bootstrap_slider_post_type() {

	$labels = array(
		'name'                  => _x( 'Carousel Images', 'Post Type General Name', 'bootstrap-carousel-slider' ),
		'singular_name'         => _x( 'Carousel Image', 'Post Type Singular Name', 'bootstrap-carousel-slider' ),
		'menu_name'             => __( 'Carousel Images', 'bootstrap-carousel-slider' ),
		'name_admin_bar'        => __( 'Post Type', 'bootstrap-carousel-slider' ),
		'archives'              => __( 'Item Archives', 'bootstrap-carousel-slider' ),
		'attributes'            => __( 'Item Attributes', 'bootstrap-carousel-slider' ),
		'parent_item_colon'     => __( 'Parent Item:', 'bootstrap-carousel-slider' ),
		'all_items'             => __( 'All Items', 'bootstrap-carousel-slider' ),
		'add_new_item'          => __( 'Add New Carousel Image', 'bootstrap-carousel-slider' ),
		'add_new'               => __( 'Add New', 'bootstrap-carousel-slider' ),
		'new_item'              => __( 'New Carousel Image', 'bootstrap-carousel-slider' ),
		'edit_item'             => __( 'Edit Carousel Image', 'bootstrap-carousel-slider' ),
		'update_item'           => __( 'Update Item', 'bootstrap-carousel-slider' ),
		'view_item'             => __( 'View Carousel Image', 'bootstrap-carousel-slider' ),
		'view_items'            => __( 'View Items', 'bootstrap-carousel-slider' ),
		'search_items'          => __( 'Search Item', 'bootstrap-carousel-slider' ),
		'not_found'             => __( 'No Carousel Image', 'bootstrap-carousel-slider' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'bootstrap-carousel-slider' ),
		'featured_image'        => __( 'Featured Image', 'bootstrap-carousel-slider' ),
		'set_featured_image'    => __( 'Set featured image', 'bootstrap-carousel-slider' ),
		'remove_featured_image' => __( 'Remove featured image', 'bootstrap-carousel-slider' ),
		'use_featured_image'    => __( 'Use as featured image', 'bootstrap-carousel-slider' ),
		'insert_into_item'      => __( 'Insert into item', 'bootstrap-carousel-slider' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'bootstrap-carousel-slider' ),
		'items_list'            => __( 'Items list', 'bootstrap-carousel-slider' ),
		'items_list_navigation' => __( 'Items list navigation', 'bootstrap-carousel-slider' ),
		'filter_items_list'     => __( 'Filter items list', 'bootstrap-carousel-slider' ),
	);
	$args = array(
		'label'                 => __( 'Carousel Image', 'bootstrap-carousel-slider' ),
		'description'           => __( 'Post Type Description', 'bootstrap-carousel-slider' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'bootstrap_slider', $args );

}
add_action( 'init', 'bootstrap_slider_post_type', 0 );

//Create a taxonomy for the carousel post type

function bootstrap_slider_taxonomies(){
    $args = array('hierarchical' => true, 'label' => 'Carousel Categories');
    register_taxonomy('carousel_category', 'bootstrap_slider',$args);
}
add_action('init', 'bootstrap_slider_taxonomies',0);
<?php
function lcv_enqueue() {
	wp_enqueue_style( 'normalize', get_template_directory_uri() . '/css/normalize.css' );
	wp_enqueue_style( 'style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'lcv_enqueue' );
wp_register_script( 'main', get_template_directory_uri() . '/js/main.js', array( 'jquery' ) );
wp_register_script( 'transit', get_template_directory_uri() . '/js/transit.js' );
wp_register_script( 'carousel', get_template_directory_uri() . '/js/carousel.js' );
wp_register_script( 'imagesloaded', get_template_directory_uri() . '/js/imagesloaded.js' );
wp_enqueue_script( 'main' );
wp_enqueue_script( 'transit' );
wp_enqueue_script( 'carousel' );
wp_enqueue_script( 'imagesloaded' );
show_admin_bar( false );
add_theme_support( 'post-thumbnails', array( 'post', 'page', 'event', 'project' ) ); 
add_image_size( 'thumb', 500, 350, true );

function register_projects() {
  register_post_type( 'project',
    array(
      'labels' => array(
        'name' => __( 'Projects' ),
        'singular_name' => __( 'Project' )
      ),
      'menu_position' => 5,
      'menu_icon' => 'dashicons-admin-appearance',
      'public' => true,
      'has_archive' => true,
      'supports' => array('title', 'editor', 'thumbnail')
    )
  );
}
add_action( 'init', 'register_projects' );

function register_events() {
  register_post_type( 'event',
    array(
      'labels' => array(
        'name' => __( 'Events' ),
        'singular_name' => __( 'Event' )
      ),
      'menu_position' => 4,
      'menu_icon' => 'dashicons-calendar-alt',
      'public' => true,
      'has_archive' => true,
      'supports' => array('title', 'editor', 'thumbnail')
    )
  );
}
add_action( 'init', 'register_events' );

function remove_menu_items() {
    remove_menu_page( 'edit.php' );
    remove_menu_page( 'edit-comments.php' );
}
add_action( 'admin_menu', 'remove_menu_items' );

function get_upcoming_events() {
	$today = date('Ymd');
	$events_query = array(
		'post_type' => 'event',
		'posts_per_page' => -1,
		'orderby' => 'meta_value post_title',
		'order' => 'ASC',
		'post_status' => 'publish',
		'meta_query' => array(
			array( 'key' => 'date' ),
			array(
				'key' => 'date',
				'compare' => '>=',
				'value' => $today
			)
		)
	);
	$upcoming_events_query = new WP_Query( $events_query );
	$upcoming_events = $upcoming_events_query->posts;
	return $upcoming_events;
}

function get_projects() {
  $projects_query = array(
    'post_type' => 'project',
    'posts_per_page' => -1,
    'orderby' => 'post_date',
    'order' => 'ASC',
    'post_status' => 'publish'
  );
  $projects_query = new WP_Query( $projects_query );
  $projects = $projects_query->posts;
  return $projects;
}

flush_rewrite_rules( false );
?>
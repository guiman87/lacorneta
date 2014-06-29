<?php
/*********************
Enqueue the proper CSS
if you use Sass.
*********************/
function reverie_enqueue_style()
{
	// foundation stylesheet
	wp_register_style( 'reverie-foundation-stylesheet', get_template_directory_uri() . '/css/app.css', array(), '' );
	
	// Registering the datatables style
	wp_register_style('jquery-datatables', get_template_directory_uri() . '/js/DataTables-1.10.0/media/css/jquery.dataTables.css', false, null);

	// Register the main style
	wp_register_style( 'reverie-stylesheet', get_template_directory_uri() . '/css/style.css', array(), '', 'all' );
	 // register Google font
    wp_register_style('google-font', 'http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Lora:400,700|Droid+Sans+Mono');
    wp_register_style('google-font2', 'http://fonts.googleapis.com/css?family=Alegreya+Sans+SC:400,500,700,800,900');

	wp_enqueue_style( 'jquery-datatables');
	wp_enqueue_style( 'lightbox-style', get_template_directory_uri().'/js/fancybox/source/jquery.fancybox.css');
	wp_enqueue_style( 'reverie-foundation-stylesheet' );
	wp_enqueue_style( 'reverie-stylesheet' );
	    wp_enqueue_style( 'google-font' );
    wp_enqueue_style( 'google-font2' );
	
	
	
	
	// Register child theme style if using child theme
	if ( is_child_theme() ) {
	
		wp_register_style( 'reverie-child-stylesheet', get_stylesheet_directory_uri() . '/style.css', array(), '', 'all' );
		
		wp_enqueue_style( 'reverie-child-stylesheet' );
	}
}
add_action( 'wp_enqueue_scripts', 'reverie_enqueue_style' );
?>
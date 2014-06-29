<?php
/*
Author: Zhen Huang
URL: http://themefortress.com/

This place is much cleaner. Put your theme specific codes here,
anything else you may wan to use plugins to keep things tidy.

*/

/*
1. lib/clean.php
  - head cleanup
	- post and images related cleaning
*/
require_once('lib/clean.php'); // do all the cleaning and enqueue here

/*
2. lib/enqueue-style.php
    - enqueue Foundation and Reverie CSS
*/
require_once('lib/enqueue-style.php');

/*
3. lib/foundation.php
	- add pagination
*/
require_once('lib/foundation.php'); // load Foundation specific functions like top-bar
/*
4. lib/nav.php
	- custom walker for top-bar and related
*/
require_once('lib/nav.php'); // filter default wordpress menu classes and clean wp_nav_menu markup
/*



/**********************
Add theme supports
 **********************/
function reverie_theme_support() {
    // Add language supports.
    load_theme_textdomain('reverie', get_template_directory() . '/lang');

    // Add post thumbnail supports. http://codex.wordpress.org/Post_Thumbnails
    add_theme_support('post-thumbnails');
    // set_post_thumbnail_size(150, 150, false);
    add_image_size( 'archive-small', 300, 100, true );
    add_image_size( 'imagenesfull', 650, 540, false );
    add_image_size( 'imagen-single', 480, 400, false );
    add_image_size( 'sliderhome', 450, 238, true );
    add_image_size( 'contenidos', 465, 260, true );
    add_image_size( 'single-small', 340, 230, true );
    add_image_size( 'single-cornetazo', 550,99999, false );
    add_image_size( 'index-cornetazo', 210, 271, true );
    add_image_size( 'index-cornetazo-video', 210, 271, true );
    

    
    


    // rss thingy
    add_theme_support('automatic-feed-links');

    // Add post formats support. http://codex.wordpress.org/Post_Formats
    add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));

    // Add menu support. http://codex.wordpress.org/Function_Reference/register_nav_menus
    add_theme_support('menus');
    register_nav_menus(array(
        'primary' => __('Primary Navigation', 'reverie'),
        'additional' => __('Additional Navigation', 'reverie'),
        'utility' => __('Utility Navigation', 'reverie')
    ));

    // Add custom background support
    add_theme_support( 'custom-background',
        array(
            'default-image' => '',  // background image default
            'default-color' => '', // background color default (dont add the #)
            'wp-head-callback' => '_custom_background_cb',
            'admin-head-callback' => '',
            'admin-preview-callback' => ''
        )
    );
}
add_action('after_setup_theme', 'reverie_theme_support'); /* end Reverie theme support */

// create widget areas: sidebar, footer
$sidebars = array('Sidebar');
foreach ($sidebars as $sidebar) {
    register_sidebar(array('name'=> $sidebar,
    	'id' => 'Sidebar',
        'before_widget' => '<article id="%1$s" class="widget %2$s">',
        'after_widget' => '</article>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    ));
}
$sidebars = array('Footer');
foreach ($sidebars as $sidebar) {
    register_sidebar(array('name'=> $sidebar,
    	'id' => 'Footer',
        'before_widget' => '<div class="large-3 columns"><article id="%1$s" class="widget %2$s">',
        'after_widget' => '</article></div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    ));
}

$sidebars = array('Sidebar 1');
foreach ($sidebars as $sidebar) {
    register_sidebar(array('name'=> $sidebar,
    	'id' => 'derecha1',
        'before_widget' => '<article id="%1$s" class="widget %2$s">',
        'after_widget' => '</article>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    ));
}



// return entry meta information for posts, used by multiple loops.
if(!function_exists('reverie_entry_meta')) :
    function reverie_entry_meta() {
        echo '<span class="byline author">'. __('Escrito por', 'reverie') .' <a href="'. get_author_posts_url(get_the_author_meta('ID')) .'" rel="author" class="fn">'. get_the_author() .', </a></span>';
        echo '<time class="updated" datetime="'. get_the_time('c') .'" pubdate>'. get_the_time('F jS, Y') .'</time>';
    }
endif;

// return entry meta information for posts, used by multiple loops.
if(!function_exists('reverie_entry_meta_destacado')) :
    function reverie_entry_meta_destacado() {
        echo '<time class="updated" datetime="'. get_the_time('c') .'" pubdate>'. get_the_time('d/m') .'</time>';
        echo '<p class="byline vcard">'.get_the_category_list('--> ').'</p>';

    }
endif;


// return entry meta information for posts, used by multiple loops.
if(!function_exists('reverie_entry_meta_sinautor')) :
    function reverie_entry_meta_sinautor() {
        echo '<time class="updated" datetime="'. get_the_time('c') .'" pubdate>'. get_the_time('F jS, Y') .'</time>';

    }
endif;


if (WP_DEBUG && WP_DEBUG_DISPLAY) 
{
   ini_set('error_reporting', E_ALL & ~E_NOTICE);
}

    add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );

function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}


//EVENTS Manager

//INTERIOR
/**
* Add Custom Taxonomy Terms To The Post Class
*/

add_filter( 'post_class', 'wpse_2266_custom_taxonomy_post_class', 10, 3 );

if ( ! function_exists('wpse_2266_custom_taxonomy_post_class') ) {
    function wpse_2266_custom_taxonomy_post_class($classes, $class, $ID) {

        $taxonomies_args = array(
            'public' => true,
            '_builtin' => false,
        );

        $taxonomies = get_taxonomies( $taxonomies_args, 'names', 'and' );

        $terms = get_the_terms( (int) $ID, (array) $taxonomies );

        if ( ! empty( $terms ) ) {
            foreach ( (array) $terms as $order => $term ) {
                if ( ! in_array( $term->slug, $classes ) ) {
                    $classes[] = $term->slug;
                }
            }
        }

        $classes[] = 'clearfix';

        return $classes;
    }
}


/**
* Columnas administrables locations
*/

add_filter( 'manage_edit-location_columns', 'my_edit_location_columns' ) ;

function my_edit_location_columns( $columns ) {

	$columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => __( 'Nombre' ),
		'controla' => __( 'Controla' ),
		'web' => __( 'Web' ),
		'facebook' => __( 'Facebook' ),
		'twitter' => __( 'Twitter' ),
	);

	return $columns;
}

add_action( 'manage_location_posts_custom_column', 'my_manage_location_columns', 10, 2 );

function my_manage_location_columns( $column, $post_id ) {
	global $post;

	switch( $column ) {

		/* If displaying the 'duration' column. */
		case 'web' :

			/* Get the post meta. */
			$web = get_post_meta( $post_id, 'web', true );

			/* If no web is found, output a default message. */
			if ( empty( $web ) )
				echo __( '-' );

			/* If there is a web, append 'minutes' to the text string. */
			else
				printf( __( '<a href="%s" target="_blank"><img  src="http://www.lacorneta.com.uy/wp-content/themes/lacorneta/img/uw.png"></a>' ), $web );

			break;

		/* If displaying the 'Twitter' column. */
		case 'twitter' :

			/* Get the post meta. */
			$twitter = get_post_meta( $post_id, 'twitter', true );

			/* If no duration is found, output a default message. */
			if ( empty( $twitter ) )
				echo __( '-' );

			/* If there is a duration, append 'minutes' to the text string. */
			else
				printf( __( '<a href="%s" target="_blank"><img  src="http://www.lacorneta.com.uy/wp-content/themes/lacorneta/img/ut.png"></a>' ), $twitter );
		

			break;
		/* If displaying the 'Facebook' column. */
		case 'facebook' :

			/* Get the post meta. */
			$facebook = get_post_meta( $post_id, 'facebook', true );

			/* If no duration is found, output a default message. */
			if ( empty( $facebook ) )
				echo __( '-' );

			/* If there is a duration, append 'minutes' to the text string. */
			else
				printf( __( '<a href="%s" target="_blank"><img  src="http://www.lacorneta.com.uy/wp-content/themes/lacorneta/img/uf.png"></a>' ), $facebook );
		

			break;
			
			/* If displaying the 'genre' column. */
		case 'controla' :

			/* Get the genres for the post. */
			$terms = get_the_terms( $post_id, 'controladores' );

			/* If terms were found. */
			if ( !empty( $terms ) ) {

				$out = array();

				/* Loop through each term, linking to the 'edit posts' page for the specific term. */
				foreach ( $terms as $term ) {
					$out[] = sprintf( '<a href="%s">%s</a>',
						esc_url( add_query_arg( array( 'post_type' => $post->post_type, 'controladores' => $term->slug ), 'edit.php' ) ),
						esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'controladores', 'display' ) )
					);
				}

				/* Join the terms, separating them with a comma. */
				echo join( ', ', $out );
			}

			/* If no terms were found, output a default message. */
			else {
				_e( '-' );
			}

			break;

		/* Just break out of the switch statement for everything else. */
		default :
			break;
	}
}

add_filter( 'manage_edit-location_sortable_columns', 'my_sortable_location_column' );
function my_sortable_location_column( $columns ) {
    $columns['state'] = 'state';
 
    //To make a column 'un-sortable' remove it from the array
    //unset($columns['date']);
 
    return $columns;
}
add_action( 'pre_get_posts', 'my_state_orderby' );
function my_state_orderby( $query ) {
    if( ! is_admin() )
        return;
 
    $orderby = $query->get( 'orderby');
 
    if( 'state' == $orderby ) {
        $query->set('meta_key','_location_state');
        $query->set('orderby','meta_value');
    }
}


////////////////// Filtro por departamento /////
add_action( 'restrict_manage_posts', 'acs_admin_posts_filter_restrict_manage_posts' );
/**
 * First create the dropdown
 * make sure to change POST_TYPE to the name of your custom post type
 *
 * @author Ohad Raz
 *
 * @return void
 */
function acs_admin_posts_filter_restrict_manage_posts(){
    $type = 'location';
    if (isset($_GET['post_type'])) {
        $type = $_GET['post_type'];
    }
 
    //only add filter to post type you want
    if ('location' == $type){
        //change this to the list of values you want to show
        //in 'label' => 'value' format
        $values = array(
                        'Artigas' => 'Artigas',
                        'Canelones' => 'Canelones',
                        'Cerro Largo' => 'Cerro Largo',
                        'Colonia' => 'Colonia',
                        'Durazno' => 'Durazno',
                        'Flores' => 'Flores',
                        'Florida' => 'Florida',
                        'Lavalleja' => 'Lavalleja',
                        'Maldonado' => 'Maldonado',
                        'Montevideo' => 'Montevideo',
                        'Paysandu' => 'Paysandu',
                        'Río Negro' => 'Río Negro',
                        'Rivera' => 'Rivera',
                        'Maldonado' => 'Maldonado',
                        'Rocha' => 'Rocha',
                        'Salto' => 'Salto',
                        'San José' => 'San José',
                        'Soriano' => 'Soriano',
                        'Tacuarembó' => 'Tacuarembó',
                        'Treinta y Tres' => 'Treinta y Tres'
                        
        );
        ?>
        <select name="ADMIN_FILTER_FIELD_VALUE">
        <option value=""><?php _e('Departamento ', 'acs'); ?></option>
        <?php
            $current_v = isset($_GET['ADMIN_FILTER_FIELD_VALUE'])? $_GET['ADMIN_FILTER_FIELD_VALUE']:'';
            foreach ($values as $label => $value) {
                printf
                    (
                        '<option value="%s"%s>%s</option>',
                        $value,
                        $value == $current_v? ' selected="selected"':'',
                        $label
                    );
                }
        ?>
        </select>
        <?php
    }
}
 
 
add_filter( 'parse_query', 'acs_posts_filter' );
/**
 * if submitted filter by post meta
 *
 * make sure to change META_KEY to the actual meta key
 * and POST_TYPE to the name of your custom post type
 * @author Ohad Raz
 * @param  (wp_query object) $query
 *
 * @return Void
 */
function acs_posts_filter( $query ){
    global $pagenow;
    $type = 'post';
    if (isset($_GET['post_type'])) {
        $type = $_GET['post_type'];
    }
    if ( 'location' == $type && is_admin() && $pagenow=='edit.php' && isset($_GET['ADMIN_FILTER_FIELD_VALUE']) && $_GET['ADMIN_FILTER_FIELD_VALUE'] != '') {
        $query->query_vars['meta_key'] = '_location_state';
        $query->query_vars['meta_value'] = $_GET['ADMIN_FILTER_FIELD_VALUE'];
    }
}


////////////////// Taxonomy para Locations y Fuentes de info /////
add_action( 'init', 'register_taxonomy_controladores' );

function register_taxonomy_controladores() {

    $labels = array( 
        'name' => _x( 'Controladores', 'controladores' ),
        'singular_name' => _x( 'Controla', 'controladores' ),
        'search_items' => _x( 'Search Controladores', 'controladores' ),
        'popular_items' => _x( 'Popular Controladores', 'controladores' ),
        'all_items' => _x( 'All Controladores', 'controladores' ),
        'parent_item' => _x( 'Parent Controla', 'controladores' ),
        'parent_item_colon' => _x( 'Parent Controla:', 'controladores' ),
        'edit_item' => _x( 'Edit Controla', 'controladores' ),
        'update_item' => _x( 'Update Controla', 'controladores' ),
        'add_new_item' => _x( 'Add New Controla', 'controladores' ),
        'new_item_name' => _x( 'New Controla', 'controladores' ),
        'separate_items_with_commas' => _x( 'Separate controladores with commas', 'controladores' ),
        'add_or_remove_items' => _x( 'Add or remove Controladores', 'controladores' ),
        'choose_from_most_used' => _x( 'Choose from most used Controladores', 'controladores' ),
        'menu_name' => _x( 'Controladores', 'controladores' ),
    );

    $args = array( 
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_tagcloud' => true,
        'show_admin_column' => true,
        'hierarchical' => false,

        'rewrite' => true,
        'query_var' => true
    );

    register_taxonomy( 'controladores', array('location','fuente_info'), $args );
    }
   




////////////////// Taxonomy tipo Fuentes de info /////
add_action( 'init', 'register_taxonomy_tipofuente' );

function register_taxonomy_tipofuente() {

    $labels = array( 
        'name' => _x( 'Categoria', 'tipofuente' ),
        'singular_name' => _x( 'Categoria', 'tipofuente' ),
        'search_items' => _x( 'Buscar Categoria', 'tipofuente' ),
        'popular_items' => _x( 'Categorias populares', 'tipofuente' ),
        'all_items' => _x( 'Todas las categorias', 'tipofuente' ),
        'parent_item' => _x( 'Parent Categoria', 'tipofuente' ),
        'parent_item_colon' => _x( 'Parent Categoria:', 'tipofuente' ),
        'edit_item' => _x( 'Editar Categoria', 'tipofuente' ),
        'update_item' => _x( 'Actualizar categoria', 'tipofuente' ),
        'add_new_item' => _x( 'Agregar nueva categoria', 'tipofuente' ),
        'new_item_name' => _x( 'Nueva categoria', 'tipofuente' ),
        'separate_items_with_commas' => _x( 'Separar categorias con comas', 'tipofuente' ),
        'add_or_remove_items' => _x( 'Agregar o eliminar categoria', 'tipofuente' ),
        'choose_from_most_used' => _x( 'Seleccione de las categorias mas utilizadas', 'tipofuente' ),
        'menu_name' => _x( 'Categorias', 'tipofuente' ),
    );

    $args = array( 
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_tagcloud' => true,
        'show_admin_column' => true,
        'hierarchical' => false,

        'rewrite' => true,
        'query_var' => true
    );

    register_taxonomy( 'tipofuente', array('fuente_info'), $args );
}

////////////////// Fuentes de info custom post /////


add_action( 'init', 'register_cpt_fuente_info' );

function register_cpt_fuente_info() {

    $labels = array( 
        'name' => _x( 'Fuentes de Info', 'fuente_info' ),
        'singular_name' => _x( 'fuente', 'fuente_info' ),
        'add_new' => _x( 'Agregar nueva', 'fuente_info' ),
        'add_new_item' => _x( 'Agregar nueva fuente', 'fuente_info' ),
        'edit_item' => _x( 'Editar fuente', 'fuente_info' ),
        'new_item' => _x( 'Nueva fuente', 'fuente_info' ),
        'view_item' => _x( 'Ver fuente', 'fuente_info' ),
        'search_items' => _x( 'Buscar fuente de info', 'fuente_info' ),
        'not_found' => _x( 'No se han encontrado fuentes de info', 'fuente_info' ),
        'not_found_in_trash' => _x( 'No se han encontrado fuentes de info en la basura', 'fuente_info' ),
        'parent_item_colon' => _x( 'Parent fuente:', 'fuente_info' ),
        'menu_name' => _x( 'Fuentes de Info', 'fuente_info' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        'description' => 'Fuentes de Info',
        'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'page-attributes' ),
        'taxonomies' => array( 'tagfuentes' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        
        
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => true,
        'has_archive' => false,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'fuente_info', $args );
}


/**
* Columnas administrables fuentes info
*/


add_filter( 'manage_edit-fuente_info_columns', 'my_edit_fuenteinfo_columns' ) ;

function my_edit_fuenteinfo_columns( $columns ) {

	$columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => __( 'Nombre' ),
		'controla' => __( 'Controla' ),
		'web' => __( 'Web' ),
		'facebook' => __( 'Facebook' ),
		'twitter' => __( 'Twitter' ),	
	);

	return $columns;
}

add_action( 'manage_fuente_info_posts_custom_column', 'my_manage_fuenteinfo_columns', 10, 2 );

function my_manage_fuenteinfo_columns( $column, $post_id ) {
	global $post;

	switch( $column ) {

		/* If displaying the 'duration' column. */
		case 'web' :

			/* Get the post meta. */
			$web = get_post_meta( $post_id, 'web', true );

			/* If no web is found, output a default message. */
			if ( empty( $web ) )
				echo __( '-' );

			/* If there is a web, append 'minutes' to the text string. */
			else
				printf( __( '<a href="%s" target="_blank"><img  src="http://www.lacorneta.com.uy/wp-content/themes/lacorneta/img/uw.png"></a>' ), $web );

			break;


		/* If displaying the 'Date cheque' column. */
		case 'twitter' :

			/* Get the post meta. */
			$twitter = get_post_meta( $post_id, 'twitter', true );

			/* If no duration is found, output a default message. */
			if ( empty( $twitter ) )
				echo __( '-' );

			/* If there is a duration, append 'minutes' to the text string. */
			else
				printf( __( '<a href="%s" target="_blank"><img  src="http://www.lacorneta.com.uy/wp-content/themes/lacorneta/img/ut.png"></a>' ), $twitter );
		

			break;
		/* If displaying the 'Facebook' column. */
		case 'facebook' :

			/* Get the post meta. */
			$facebook = get_post_meta( $post_id, 'facebook', true );

			/* If no duration is found, output a default message. */
			if ( empty( $facebook ) )
				echo __( '-' );

			/* If there is a duration, append 'minutes' to the text string. */
			else
				printf( __( '<a href="%s" target="_blank"><img  src="http://www.lacorneta.com.uy/wp-content/themes/lacorneta/img/uf.png"></a>' ), $facebook );
		

			break;
			
			/* If displaying the 'genre' column. */
		case 'controla' :

			/* Get the genres for the post. */
			$terms = get_the_terms( $post_id, 'controladores' );

			/* If terms were found. */
			if ( !empty( $terms ) ) {

				$out = array();

				/* Loop through each term, linking to the 'edit posts' page for the specific term. */
				foreach ( $terms as $term ) {
					$out[] = sprintf( '<a href="%s">%s</a>',
						esc_url( add_query_arg( array( 'post_type' => $post->post_type, 'controladores' => $term->slug ), 'edit.php' ) ),
						esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'controladores', 'display' ) )
					);
				}

				/* Join the terms, separating them with a comma. */
				echo join( ', ', $out );
			}

			/* If no terms were found, output a default message. */
			else {
				_e( '-' );
			}

			break;

		/* Just break out of the switch statement for everything else. */
		default :
			break;
	}
}


function isMobilePhone() {
	$useragent=$_SERVER['HTTP_USER_AGENT'];
	if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
	return true; 
}


function my_em_own_taxonomy_register(){
    register_taxonomy_for_object_type('post_tag',EM_POST_TYPE_EVENT);
    register_taxonomy_for_object_type('post_tag',EM_POST_TYPE_LOCATION);
}
add_action('init','my_em_own_taxonomy_register',100);

// Admin Bar Customisation
function mytheme_admin_bar_render() {
global $wp_admin_bar;

// Add a new top level menu link
// Here we add a customer support URL link
 $filter_slider = 'http://www.lacorneta.com.uy/wp-admin/edit.php?s&post_status=all&post_type=event&action=-1&m=0&scope=all&event-categories=0&seo_filter&paged=1&mode=list&action2=-1&tag=slider';
 $wp_admin_bar->add_menu( array(
 'id' => 'customer_support',
 'title' => __('Slider'),
 'target' => ('_blank'),
 'href' => $filter_slider
 ));
 }
 add_action( 'wp_before_admin_bar_render', 'mytheme_admin_bar_render' );


// Admin Bar Customisation
function mytheme_admin_bar_render2() {
global $wp_admin_bar;

// Add a new top level menu link
// Here we add a customer support URL link
 $filter_fijos = 'http://www.lacorneta.com.uy/wp-admin/edit.php?s&post_status=all&post_type=location&tag=fijos';
 $wp_admin_bar->add_menu( array(
 'id' => 'fijos',
 'title' => __('Fijos'),
 'target' => ('_blank'),
 'href' => $filter_fijos
 ));
 }
 add_action( 'wp_before_admin_bar_render', 'mytheme_admin_bar_render2' );
?>




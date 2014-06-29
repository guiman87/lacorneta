<?php
/**
 * The default template for displaying the slider. 
 *
 * @subpackage Reverie
 * @since Reverie 4.0
 */
?>
    

	   <?php $image_id = get_post_thumbnail_id(); $image_url = wp_get_attachment_image_src($image_id,'sliderhome', true);?>
	    <article>
	    <li data-orbit-slide="headline-<?php echo $headnumber++;?>">
	    <a href="<?php the_permalink() ?>"><h1 class="title_slider"><?php the_title(); ?></h1></a>
	     <span class="locationevento"> <?php
	    $key_2_value = get_post_meta( get_the_ID(), '_location_id', true );
	    global $wpdb;
	    $location_n = $wpdb->get_row( "SELECT * FROM  wp_em_locations where location_id = $key_2_value;", ARRAY_A ); 
	    echo $location_n['location_name']; ?>
	    </span>
	    <span class="fechaeventoslide">	   <?php 
	      $key_1_value = get_post_meta( get_the_ID(), '_event_start_date', true );
	      // check if the custom field has a value
	      if( ! empty( $key_1_value ) ) {
		echo date('d/m', strtotime("$key_1_value"));
	      } ?> </span>
	    <a clas="tt" title="Post: <?php the_title(); ?>" href="<?php the_permalink() ?>"><img class="slide_img" src="<?php echo $image_url[0]; ?>"></img></a>
	    

	    
	    </li>
	    </article>
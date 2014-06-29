<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @subpackage Reverie
 * @since Reverie 4.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('index-card'); ?>>
	<header class="cornetahead">
		<h2><?php the_title(); ?></h2>
	</header>
	<div class="entry-content">
		<?php $image_id = get_post_thumbnail_id(); $image_url = wp_get_attachment_image_src($image_id,'single-cornetazo', true); $metavideo = get_post_meta(get_the_ID(), 'url_video', true); if( ! empty( $metavideo )) { the_post_thumbnail('single-cornetazo'); echo "<a class='video videocorneta' rel='cornetazos' href='" .$metavideo. "&autoplay=1'></a>";} else { echo "<a class='fancybox' href='".$image_url[0]."' rel='cornetazos'>"; the_post_thumbnail('single-cornetazo'); echo "</a>"; } ?>
	</div>
	<footer><span class="contcategory"><?php foreach((get_the_category()) as $category) { 
						      echo ( $category->cat_name != 'Cornetazos' ) ? $category->cat_name . ' ' : ''; 
						      }?>
						      </span><span class=""><?php echo date("d/m"); ?></span><?php the_excerpt(); ?></footer>
</article>
<?php
/*
This is the custom post type post template.
If you edit the post type name, you've got
to change the name of this template to
reflect that name change.

i.e. if your custom post type is called
register_post_type( 'bookmarks',
then your single template should be
single-bookmarks.php

*/
?>

<?php get_header(); ?>

			    <!-- Row for main content area -->
	<div class="small-12 large-8 columns" id="content" role="main">
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<?php global $post; $EM_Event = em_get_event($post->ID, 'post_id');?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">

								<header class="article-header">
								        <span class="fecha_single"><?php echo $EM_Event->output('#l #d'); ?></span><span class="location_single">en&nbsp;<a href="<?php echo $EM_Event->output('#_LOCATIONURL'); ?>"><?php echo $EM_Event->output('#_LOCATIONNAME'); ?></a></span>
									<h1 class="single-title event-post-type-title"><?php the_title(); ?></h1>
									<span class="hora_single"><?php echo $EM_Event->output('#_24HSTARTTIME'); ?>&nbsp;Horas</span>

								</header> <!-- end article header -->

								<section class="entry-content clearfix">
									<div id="descripcion_evento" class="clearfix">
									<?php  $imagesingle_url = $EM_Event->output('#_EVENTIMAGEURL');
									echo "<a class='fancybox' href='".$imagesingle_url."'>"; the_post_thumbnail('imagen-single'); echo "</a>"; ?>
									<?php echo $EM_Event->output('#_EVENTEXCERPT'); ?>
									
<?php echo $EM_Event->output('#_EVENTNOTES');?>
									</div>
									<div id="comollegar" class="clearfix"><h3>COMO LLEGAR<span class="direccion_single"><?php echo $EM_Event->output('#_LOCATIONADDRESS'); ?>,&nbsp<?php echo $EM_Event->output('#_LOCATIONREGION'); ?>,&nbsp<?php echo $EM_Event->output('#_LOCATIONTOWN'); ?></span></h3><div id="mapa" class="clearfix"><?php echo $EM_Event->output('#_LOCATIONMAP'); ?></div>
									</div>
								</section> <!-- end article section -->

								<footer class="article-header">
									
								</footer> <!-- end article footer -->

								<?php comments_template(); ?>

							</article> <!-- end article -->

							<?php endwhile; ?>

							<?php else : ?>

									<article id="post-not-found" class="hentry clearfix">
										<header class="article-header">
											<h1><?php _e("Oops, Post Not Found!", "bonestheme"); ?></h1>
										</header>
										<section class="entry-content">
											<p><?php _e("Uh Oh. Something is missing. Try double checking things.", "bonestheme"); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e("This is the error message in the single-custom_type.php template.", "bonestheme"); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</div> <!-- end #main -->

						<?php get_sidebar('derecha1'); ?>



<?php get_footer(); ?>
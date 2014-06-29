<?php get_header(); ?>

			    <!-- Row for main content area -->
	<div class="small-12 large-8 columns" id="content" role="main">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<?php global $post; $EM_Locations = em_get_event($post->ID, 'post_id');?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">

								<header class="article-header">
									<span class="barrio_single"><?php echo $EM_Locations->output('#_LOCATIONREGION'); ?>,</span><span class="ciudad_single"><?php echo $EM_Locations->output('#_LOCATIONSTATE'); ?></span>
									<h1 class="single-title location-post-type-title"><?php the_title(); ?></h1>
									<span class="address_single"><?php echo $EM_Locations->output('#_LOCATIONADDRESS'); ?></span>

								</header> <!-- end article header -->

								<section class="entry-content clearfix">
									<div id="descripcion_location" class="clearfix">
									<?php echo $EM_Locations->output('#_LOCATIONNOTES');?>
									</div>
									<div id="proximos_eventos">
									<h3 id="titulo_proximos"><?php comment_form_title( __('Proximos Eventos:'), __('Proximos Eventos:', 'reverie') ); ?></h3>
									<?php echo $EM_Locations->output('#_LOCATIONNEXTEVENTS');?></div>
									<div id="comollegar" class="clearfix"><h3>COMO LLEGAR<span class="direccion_single"><?php echo $EM_Locations->output('#_LOCATIONADDRESS'); ?>,&nbsp<?php echo $EM_Locations->output('#_LOCATIONREGION'); ?>,&nbsp<?php echo $EM_Locations->output('#_LOCATIONTOWN'); ?></span></h3><div id="mapa" class="clearfix"><?php echo $EM_Locations->output('#_LOCATIONMAP'); ?></div>
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

<?php
/*
Template Name: ENVIA TU EVENTO
*/
?>

<?php get_header(); ?>

<!-- Row for main content area -->
	<div class="small-12 large-8 columns" id="content" role="main">
	
		<section class="entry-content clearfix" itemprop="articleBody">
									<?php echo do_shortcode('[event_form]') ?>
							</section> <!-- end article section -->
	</div>
	<?php get_sidebar('derecha1'); ?>
		
<?php get_footer(); ?>
<aside id="sidebar" class="small-12 large-3 medium-3 columns">
	<h1 id="titulobusca" class="arcade titulo_principal">BUSCADOR BOLICHES</h1>
	<?php echo do_shortcode('[location_search_form  ajax=”1″]'); ?>
	<div <?php post_class('clearfix'); ?>>
	<?php dynamic_sidebar("Sidebar"); ?>
	</div>
</aside><!-- /#sidebar -->
<?php get_header(); ?>

<!-- Row for main content area -->
<div class="row">
	<?php if ( isMobilePhone() ) {
	 get_template_part( 'indexm', get_post_format() ); 
	 }else {
	 get_template_part( 'indexd', get_post_format() );
	 }?>
	 
	
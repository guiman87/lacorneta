<?php get_header(); ?>

<!-- Row for main content area -->

	
	<div id="mainleft" class="small-12 large-6 medium-6 columns">
	   <div id="hoy">
	   <?php echo do_shortcode('[events_list  scope="future" limit="70"][/events_list]') ?>
	      </div>
	<div id="contenidos" class="mascontenidos clearfix">
					<?php $my_query = new WP_Query('category_name=Destacados&posts_per_page=5');
					 if ($my_query->have_posts()) : ?>
					    <?php $count = 0; ?>
					    <h2 id="titulonoticias" class="arcade titulo_principal">DESTACADOS</h2>
					    <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
						    <?php $count++; ?>
						    <?php if ($count == 1) : ?>
						    <article class="hentry contprincipal">
						      <header class="entry-title">
						      <span class="contcategory"><?php foreach((get_the_category()) as $category) { 
						      echo ( $category->cat_name != 'Destacados' ) ? $category->cat_name . ' ' : ''; 
						      }?>
						      </span>	
						      <h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
						             </header>
						             <div class="entry-content">
						             <figure>
							     <a href="<?php the_permalink() ?>"><?php the_post_thumbnail('contenidos'); ?></a>
							     </figure>
							    <p><span class="fechacont"><?php the_date("d/m"); ?></span><?php echo substr(get_the_excerpt(), 0,200); ?>...</p>
							    </div>
							    </article>
							    <div class="row">

						    <?php else : ?>
						    <div class="small-12 large-6 medium-6 columns caja clearfix">
						    <article class="hentry contmas">
						    <header class="entry-title">
						    <span class="fechacont"><?php the_date("d/m"); ?></span><h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3></header>
						     <a href="<?php the_permalink() ?>"><?php the_post_thumbnail('contenidos'); ?></a>
						     <span class="caption simple-caption"><a href="<?php the_permalink() ?>"><p><?php echo substr(get_the_excerpt(), 0,115); ?>...</p></a></span> 
						      </article>
						    </div>
						    <?php endif; ?>
					    <?php endwhile; ?>
				    <?php else : ?>
					    <p>Sorry, no posts matched your criteria.</p>

				    <?php endif; ?>
				    </div>

					<a class="masnoticias" href="<?php echo site_url(); ?>/categoria/destacados/">+DESTACADOS</a>
					  </div>
					</div>
					
	   <div id="diapositivas" class="small-12 large-6 medium-6 columns clearfix">
	   <?php $my_query = new WP_Query(array(
		  'post_type' => array('event', 'post'),
		  'posts_per_page' => 8,
		  'tag_id' => 299
                    ));$headnumber = 1;?>
	      <ul class="example-orbit-content" data-orbit data-options="variable_height: false; slide_number: false; navigation_arrows:true; bullets: false; timer_speed: 3000;">
	      <?php while ($my_query->have_posts()) : $my_query->the_post();?>
	      <?php get_template_part( 'slider', get_post_format() ); ?>
			<?php endwhile; ?>
	      </ul>
	</div>
	
	<div id="cornetazos" class="small-12 large-3 medium-3 columns">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img  src="<?php echo get_template_directory_uri(); ?>/img/bola.gif"></a>
						<h2 id="titulocornetazos" class="arcade titulo_principal">CORNETAZOS</h2>
						<?php 
						$argumentos= array('posts_per_page' => 5,'category' => 132);
						?>
						  <ul>
							<?php $postslist = get_posts($argumentos); foreach ($postslist as $post) : setup_postdata($post); ?>
							<li>
							    <h3><a title="Post: <?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							     <?php $image_id = get_post_thumbnail_id(); $image_url = wp_get_attachment_image_src($image_id,'imagenesfull', true); $metavideo = get_post_meta(get_the_ID(), 'url_video', true); if( ! empty( $metavideo )) { the_post_thumbnail('index-cornetazo-video'); echo "<a class='video videocorneta' rel='cornetazos' href='" .$metavideo. "&autoplay=1'></a>";} else { echo "<a class='fancybox' href='".$image_url[0]."' rel='cornetazos'>"; the_post_thumbnail('index-cornetazo'); echo "</a>"; } ?>
						        </li>
							<?php endforeach; ?>
						  </ul>	
						  <a class="masnoticias" href="<?php echo site_url(); ?>/categoria/cornetazos/">+CORNETAZOS</a>
					</div>

	<?php get_sidebar(); ?>
<?php get_footer(); ?>
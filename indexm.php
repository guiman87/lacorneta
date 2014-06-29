<?php get_header(); ?>

<!-- Row for main content area -->

	
	<div id="mainleft" class="small-12 large-6 medium-6 columns">
	   <div id="hoy">
	   <!-- START HEADER -->
<table cellpadding="1" cellspacing="1" width="100%" id="proba" class="row-border tablaseventos hover">
    <thead>
        <tr>
            <th>FECHA</th>
            <th>HORA</th>
            <th>NOMBRE</th>
            <th>ZONA</th>
            <th>LUGAR</th>
            <th>TOWN</th>
            <th>STATE</th>
            <th>TIPO</th>
        </tr>
    </thead>
    <tbody>
     <?php echo do_shortcode('[events_list  scope="future" limit="50"]<!-- START SINGLE FORMAT -->
{is_current}
        <tr>      <td class=""><span>#_{d/m/Y} #l</span></td>
					<td style="padding-right: 1px;"><span class="hoytime">#H:#i </span><span style="font-size: 11px;" >AHORA!</span></td>
					<td style="padding-right: 1px;" class=""><a href="#_EVENTURL">#_EVENTNAME</a></td>
<td style="padding-right: 1px;" class="regiontabla">#_LOCATIONREGION</td>
					<td class=""><a class="link_location" href="#_LOCATIONURL">#_LOCATIONNAME<a></td>
<td class=""><span>#_LOCATIONTOWN</span></td>
<td class=""><span>#_LOCATIONSTATE</span></td>
<td class=""><span>#_#_EVENTCATEGORIES</span></td>
				      </tr>
{/is_current}
{is_future}
        <tr>      <td class=""><span>#_{d/m/Y} #l</span></td>
					<td style="padding-right: 1px;" class=""><span class="hoytime">#H:#i </span></td>
					<td style="padding-right: 1px;" class=""><a href="#_EVENTURL">#_EVENTNAME</a></td>
<td style="padding-right: 1px;" class="regiontabla">#_LOCATIONREGION</td>
					<td class=""><a class="link_location" href="#_LOCATIONURL">#_LOCATIONNAME<a></td>
<td class=""><span>#_LOCATIONTOWN</span></td>
<td class=""><span>#_LOCATIONSTATE</span></td>
<td class=""><span>#_#_EVENTCATEGORIES</span></td>
				      </tr>
{/is_future}
<!-- END SINGLE FORMAT -->
[/events_list]') ?>
<!-- START FOOTER -->
    </tbody>
</table>
<!-- END FOOTER -->
<!-- END HEADER -->
<h1 style="margin-top: 8px;" id="titulobusca" class="arcade titulo_principal">BUSCADOR BOLICHES</h1>
	<?php echo do_shortcode('[location_search_form  ajax=”1″]'); ?>
	      </div>
	<div id="cornetazos" class="small-12 columns">
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
						  <a class="masnoticias" href="<?php echo site_url(); ?>/category/cornetazos/">+CORNETAZOS</a>
					</div>

		
<?php get_footer(); ?>
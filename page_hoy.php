<?php
/*
Template Name: HOY
*/
?>

<?php get_header(); ?>

<!-- Row for main content area -->
	<div class="small-12 large-8 columns" id="content" role="main">
	
	<section class="entry-content clearfix" itemprop="articleBody">
										<div id="seviene_fiestaseventos" class="clearfix tablaseviene">
									<?php echo do_shortcode('[events_list scope="today"]{is_past} {/is_past}{is_current}<tr>
    <td ><span class="hoytime">#H:#i </span></td>
    <td ><span class=""><a href="#_EVENTURL">#_EVENTIMAGE</a></span></td>
					<td class=""><a href="#_EVENTURL">#_EVENTNAME</a></td>
<td class="regiontabla">#_LOCATIONREGION</td>
					<td class=""><a class="link_location" href="#_LOCATIONURL">#_LOCATIONNAME<a></td>
<td class=""><span>#_LOCATIONTOWN</span></td>
<td class=""><span>#_LOCATIONSTATE</span></td>
<td class=""><span>#_#_EVENTCATEGORIES</span></td>
				      </tr>{/is_current}
				      {is_future}<tr>
    <td ><span class="hoytime">#H:#i </span></td>
    <td ><span class=""><a href="#_EVENTURL">#_EVENTIMAGE</a></span></td>
					<td class=""><a href="#_EVENTURL">#_EVENTNAME</a></td>
<td class="regiontabla">#_LOCATIONREGION</td>
					<td class=""><a class="link_location" href="#_LOCATIONURL">#_LOCATIONNAME<a></td>
<td class=""><span>#_LOCATIONTOWN</span></td>
<td class=""><span>#_LOCATIONSTATE</span></td>
<td class=""><span>#_#_EVENTCATEGORIES</span></td>
				      </tr>{/is_future}[/events_list]') ?>
									
							</section> <!-- end article section -->
	</div>
	<?php get_sidebar(); ?>
		
<?php get_footer(); ?>
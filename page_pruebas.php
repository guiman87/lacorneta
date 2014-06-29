<?php
/*
Template Name: HOY NEW
*/
?>

<?php get_header(); ?>

<!-- Row for main content area -->
	<div class="small-12 large-9 columns" id="content" role="main">
	
	<section class="entry-content clearfix" itemprop="articleBody">
									<div id="seviene_fiestaseventoss" class="clearfix">
					<table cellpadding="5" cellspacing="0" width="100%" id="hoytable" class="row-border restotablas hover">
    <thead>
        <tr>
            <th>FECHA</th>
	    <th>               </th>
            <th>NOMBRE</th>
            <th>ZONA</th>
            <th>LUGAR</th>
            <th>TOWN</th>
            <th>STATE</th>
            <th>TIPO</th>
        </tr>
    </thead>
    <tbody><?php echo do_shortcode('[events_list  scope="today"]{is_past} {/is_past}{is_current}<tr  itemscope itemtype="http://schema.org/Event">
    <td ><span class="hoytime"><meta itemprop="startDate" content="#_{Y-m-d\TH:i:sO}">#H:#i </span><span style="font-size: 11px; display: bloack;" >AHORA!</span></td>
    <td ><span class=""><a href="#_EVENTURL">#_EVENTIMAGE{100,60}</a></span></td>
					<td class=""><a itemprop="url"  href="#_EVENTURL"><span itemprop="name">#_EVENTNAME</span></a></td>
<td itemprop="addressRegion"  class="regiontabla">#_LOCATIONREGION</td>
					<td itemprop="location" itemscope itemtype="http://schema.org/Place" itemprop="name" class=""><a class="link_location" itemprop="url"  href="#_LOCATIONURL"><span itemprop="name">#_LOCATIONNAME</span><a></td>
<td class=""><span>#_LOCATIONTOWN</span></td>
<td class=""><span>#_LOCATIONSTATE</span></td>
<td class=""><span>#_#_EVENTCATEGORIES</span></td>
				      </tr>{/is_current}
				      {is_future}<tr  itemscope itemtype="http://schema.org/Event">
    <td ><span class="hoytime"><meta itemprop="startDate" content="#_{Y-m-d\TH:i:sO}">#H:#i</span></td>
    <td ><span class=""><a href="#_EVENTURL">#_EVENTIMAGE{100,60}</a></span></td>
					<td class=""><a itemprop="url"  href="#_EVENTURL"><span itemprop="name">#_EVENTNAME</span></a></td>
<td itemprop="addressRegion"  class="regiontabla">#_LOCATIONREGION</td>
					<td itemprop="location" itemscope itemtype="http://schema.org/Place" itemprop="name" class=""><a class="link_location" itemprop="url"  href="#_LOCATIONURL"><span itemprop="name">#_LOCATIONNAME</span><a></td>
<td class=""><span>#_LOCATIONTOWN</span></td>
<td class=""><span>#_LOCATIONSTATE</span></td>
<td class=""><span>#_#_EVENTCATEGORIES</span></td>
				      </tr>{/is_future}[/events_list]') ?></tbody></table>

							</section> <!-- end article section -->
	</div>
	<?php get_sidebar(); ?>
		
<?php get_footer(); ?>
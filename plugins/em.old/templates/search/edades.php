<div class="em-search-edades em-search-field">
	<label>Publico(edades)</label>
	<?php 
		$selected = 0;
		EM_Object::ms_global_switch(); //in case in global tables mode of MultiSite, grabs main site categories, if not using MS Global, nothing happens
		wp_dropdown_categories(array( 'hide_empty' => 0, 'orderby' =>'name', 'name' => 'publico', 'hierarchical' => true, 'taxonomy' => publico, 'selected' => $selected, 'show_option_all' => 'Todas', 'class'=>'em-events-search-category'));
		EM_Object::ms_global_switch_back(); //if switched above, switch back
	?>
</div>
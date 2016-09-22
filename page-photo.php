<?php 
	/* 
	Template Name: Photo
	*/
	get_header();
?>
<?php 
	$categories = get_categories(
		array(
			'orderby' => 'name',
			'parent'  => 0
		)
	);
	$category_link_name = get_query_var('gallery');
	if ($catagory = array_key_search_value('category_nicename',$category_link_name,$categories)) :
		set_query_var('catGallery', $catagory);
		get_template_part('template/photo', 'albums');
	else :
		set_query_var('catGallery', $categories);
		get_template_part('template/photo', 'galleries');
	endif;
?>
<?php 
	get_footer();
?>
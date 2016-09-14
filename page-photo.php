<?php 
	/* 
	Template Name: Photo
	*/
	get_header();
?>
<div class="container-fluid page">
	<div class="container">
		<?php 
			$categories = get_categories(
				array(
					'orderby' => 'name',
					'parent'  => 0
				)
			);
			$category_link_id = 'gallery'; //category
			set_query_var('cat_link_id', $category_link_id);
			$category_link_name = $_GET[$category_link_id];
			if ($category_link_name && $catId = array_search($category_link_name, array_column($categories, 'category_nicename'))) {
				
				// $catObject = array_filter( $categories, function ($e) use($category_link_name) { return $e->category_nicename == $category_link_name; });
				// $catId = array_search($category_link_name, array_column($categories, 'category_nicename'),false)

				// print_r(array_shift(array_slice($catObject, 0, 1)));
				// print_r(array_shift(array_slice($categories, $catId, 1)));

				set_query_var('catGallery', array_shift(array_slice($categories, $catId, 1)));
				get_template_part(
					'template/photo',
					'album'
				);
			} else {
				set_query_var('catGallery', $categories);
				get_template_part(
					'template/photo',
					'category'
				);
			}
		?>
	</div>
</div>
<?php 
	get_footer();
?>
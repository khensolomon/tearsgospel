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
			// set_query_var('catGallery', $catId);
			// add_query_arg( 'key', 'value', 'http://example.com' );
			// $category_link_id = 'gallery'; //category
			$category_link_name = get_query_var('gallery');
			// set_query_var('cat_link_id', $category_link_id);
			// $category_link_name = get_query_var( 'gallery')
			// $abc = array_keys(array_column($categories, 'category_nicename'), $category_link_name);
			// $abc = array_search(array('category_nicename' => $category_link_name), $categories);
			function searchArrayKeyVal($sKey, $id, $sArray) {
			   foreach ($sArray as $key => $val) {
			       if ($val->{$sKey} == $id) {
			           return $val;
			       }
			   }
			   return false;
			}
			$catId = searchArrayKeyVal('category_nicename',$category_link_name,$categories);
			// print_r($catId);
			// $catId = array_search($category_link_name, array_column($categories, 'category_nicename'));
			if ($category_link_name && $catId) {
				
				// $catObject = array_filter( $categories, function ($e) use($category_link_name) { return $e->category_nicename == $category_link_name; });
				// $catId = array_search($category_link_name, array_column($categories, 'category_nicename'),false)

				// print_r(array_shift(array_slice($catObject, 0, 1)));
				// print_r(array_shift(array_slice($categories, $catId, 1)));

				// set_query_var('catGallery', array_shift(array_slice($categories, $catId, 1)));
				set_query_var('catGallery', $catId);
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
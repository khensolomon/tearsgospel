<div class="row">
	<div class="col-md-12 text-center">
		<h1><?php echo esc_html($catGallery->name); ?></h1>
		<p><?php echo esc_html($catGallery->description); ?></p>
	</div>
</div>
<?php 
$img_current_page = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
$img_query = new WP_Query(
	array(
		'cat' => $catGallery->term_id,
		'post_type'  => 'attachment',
		'post_mime_type' => 'image',
		'post_status' => 'published',
		'posts_per_page' => 30,
		'paged' => $img_current_page,
		'pagination'=> true
	)
);
if ($img_query->posts) :
	$img_total_page = count($img_query->posts);
	// $img_category_link = add_query_arg( array(
	// 		'category' => $catGallery->category_nicename
	// ), get_permalink() );
?>
<div class="row">
	<div class="col-md-12 col-sm-centered" id="galleries">
	<?php foreach ($img_query->posts as $image ) : ?>
		<div class="category text-center">
			<?php 
			// $attachment = get_post( $image->ID);
			// print_r($attachment);
			// echo wp_get_attachment_image($image->ID, 'large',array('class'=>'img-responsive center-block'));
			// return array(
			// 	'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
			// 	'caption' => $attachment->post_excerpt,
			// 	'description' => $attachment->post_content,
			// 	'href' => get_permalink( $attachment->ID ),
			// 	'src' => $attachment->guid,
			// 	'title' => $attachment->post_title
			// );
			// $attachment =  wp_get_attachment($image->ID);
			// print_r($attachment);
			// print_r($image);
			// echo wp_get_attachment_link($image->ID, false, true, false, 'My link text' ); 
			// echo wp_get_attachment_link($image->ID, '' , false, false, 'My link text' ); 
			// echo wp_get_attachment_image($image->ID, 'large',false,array('class'=>'img-responsive center-block'));
			?>
			<h3>
				<?php echo wp_get_attachment_link($image->ID, false, true, false, $image->post_title); ?>
			</h3>
			<?php echo wp_get_attachment_link($image->ID,'large',false, false,false,array('class'=>'img-responsive center-block')); ?>
		</div>
	<?php endforeach; ?>
	</div>
	<?php 
	$args = array(
		'base' => str_replace( 999, '%#%', esc_url( get_pagenum_link( 999 ) ) ),
		'format' => '?paged=%#%',
		'current' => max( 0, $img_current_page ),
		'total' => $img_query->max_num_pages,
		// 'base'               => '%_%',
		// 'format'             => '?paged=%#%',
		// 'total'              => 34,
		// 'current'            => 0,
		// 'show_all'           => false,
		// 'end_size'           => 1,
		// 'mid_size'           => 6,
		// 'prev_next'          => true,
		// 'prev_text'          => __('« Previous'),
		// 'next_text'          => __('Next »'),
		// 'type'               => 'plain',
		'type' => 'list'
		// 'add_args'           => false,
		// 'add_fragment'       => '',
		// 'before_page_number' => '',
		// 'after_page_number'  => ''
	);
	if ($args['total'] > 1) {
		printf( '<div class="col-md-12 text-center pagination">%1$s</div>',
				paginate_links( $args )
		);
	}
	?>
</div>
<?php endif; ?>
 
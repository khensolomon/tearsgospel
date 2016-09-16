<?php 
$img_current_page = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
$img_query = new WP_Query(
	array(
		'cat' => $catGallery->term_id,
		'post_type'  => 'attachment',
		'post_mime_type' => 'image',
		'post_status' => 'published',
		// 'showposts' => -1,
		'posts_per_page' => 37,
		'paged' => $img_current_page,
		'pagination'=> true
	)
);
?>
<div class="container-fluid page">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<h1><?php echo esc_html($catGallery->name); ?> <span class="badge progress-bar-info"><?php echo $img_query->found_posts; ?></span></h1>
				<p><?php echo esc_html($catGallery->description); ?></p>
			</div>
		</div>
	</div>
</div>
<?php
if ($img_query->posts) :
	// $img_total_post = $img_query->found_posts;
	// $img_total_page = count($img_query->posts);
	// $img_total_page = $img_query->post_count;
?>
<div class="container-fluid">
	<div class="containers">
		<div class="row">
			<div class="col-md-12 album" id="galleries">
				<?php foreach ($img_query->posts as $image ) : ?>
					<section>
						<figure>
							<a href="<?php echo wp_get_attachment_url($image->ID); ?>" title="<?php echo (!$image->post_content? $image->post_title : $image->post_content); ?>">
								<?php 
									// thumbnail, medium, large
									// $id, $size, $permalink, $icon, $text, $attr
									echo wp_get_attachment_image($image->ID, 'large',true, array('class'=>'img-responsive center-block'));
									// echo wp_get_attachment_link($image->ID,'large',false, false,false,array('class'=>'img-responsive center-block'));
									// echo wp_get_attachment_link($image->ID, false, false, false, 'image gose here',array('title'=>'oksikfe')); 
									// echo $img_query->post_count;
								?>
							</a>
						</figure>
						<h3>
							<?php echo wp_get_attachment_link($image->ID, false, true, false, $image->post_title); ?>
						</h3>
					</section>
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
				'mid_size'           => 1,
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
	</div>
</div>
<?php endif; ?>
 
<?php 
$img_current_page = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
$img_query = new WP_Query(
	array(
		'cat' => $catGallery->term_id,
		'post_type'  => 'attachment',
		'post_mime_type' => 'image',
		'post_status' => 'published',
		// 'showposts' => -1,
		'posts_per_page' => 36,
		'paged' => $img_current_page,
		'pagination'=> true
	)
);
?>
<div <?php post_class('container-fluid'); ?>>
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 text-center">
				<h1><?php echo esc_html($catGallery->name); ?> <span class="badge progress-bar-info"><?php echo $img_query->found_posts; ?></span></h1>
				<p>
					<?php 
						if ($catGallery->description == '') {
							echo esc_html($catGallery->name).' gallery contains '.$img_query->found_posts.'!';
						} else {
							echo esc_html($catGallery->description); 
						}
					?>
				</p>
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
<div class="albums container-fluid">
	<div class="containers">
		<div class="row">
			<div class="col-md-12">
				<div class="row display-all-flex text-center" id="arts">
					<?php foreach ($img_query->posts as $image ) : ?>
						<div class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
							<section>
								<h3>
									<?php echo wp_get_attachment_link($image->ID, false, true, false, $image->post_title); ?>
								</h3>
								<figure>
									<a href="<?php echo wp_get_attachment_url($image->ID); ?>" title="<?php echo (!$image->post_content? $image->post_title : $image->post_content); ?>">
										<?php 
											echo wp_get_attachment_image($image->ID, 'large',true, array('class'=>'img-responsive center-block'));
										?>
									</a>
								</figure>
							</section>
						</div>
					<?php endforeach; ?>
				</div>
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
				// 'type' => 'list'
				// 'add_args'           => false,
				// 'add_fragment'       => '',
				// 'before_page_number' => '',
				// 'after_page_number'  => ''
			);
			?>
			<?php if ($args['total'] > 1) : ?>
				<div class="col-md-12 text-center">
					<nav class="navigation pagination" role="navigation">
						<div class="nav-links">
							<?php echo paginate_links( $args ); ?>
						</div>
					</nav>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>
<?php endif; ?>
 
<?php
	while ( have_posts() ) : the_post();
		get_template_part(
			'template/photo'
		);
	endwhile;
?>
<div class="row">
	<div class="col-md-12 col-sm-centered" id="galleries">
	<?php foreach ($catGallery as $category ): ?>
		<?php 
		$img_query = new WP_Query(
			array(
				'cat' => $category->term_id,
				'post_type'  => 'attachment',
				'post_mime_type' => 'image',
				'post_status' => 'published', //published,inherit
				'posts_per_page' => - 1  //- 1
			)
		);
		if ($img_query->posts) :
			$img_total = count($img_query->posts);
			$img_category_link = add_query_arg( array(
					'gallery' => $category->category_nicename
			), get_permalink() );
			$image = array_shift($img_query->posts);
		?>
		<div class="category text-center"> 
			<h3>
				<a href="<?php echo $img_category_link; ?>"><?php echo esc_html($category->name ); ?></a>
			</h3>
			<?php
				printf( '<a href="%1$s">%2$s</a>',
						esc_url( $img_category_link),
						wp_get_attachment_image( $image->ID, 'thumnails',array('class' =>'img-responsive'))
				);
			?>
			<p class="description">
				<?php 
					if ($category->description == '') {
						echo esc_html($category->name).' gallery contains ';
					} else {
						echo esc_html($category->description ); 
					}
				?>
				<strong>
					<?php 
						printf(
							_n(
								'%1$s photo.', 
								'%1$s photos.', $img_total, 'lethil'
							),
							number_format_i18n( $img_total )
						);
					?>
				</strong>
			</p>
			<a class="hover" href="<?php echo $img_category_link; ?>"><?php echo esc_html($category->name ); ?></a>
		</div>
		<?php endif; ?>
	<?php endforeach; ?>
	</div>
</div>
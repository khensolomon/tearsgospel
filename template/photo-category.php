<div class="container-fluid page">
	<div class="container">
		<?php
			while ( have_posts() ) : the_post();
				// get_template_part(
				// 	'template/photo'
				// );
			endwhile;
		?>
	</div>
</div>
<div class="container-fluid">
	<div class="container">
		<?php $class = 'odd'; foreach ($catGallery as $category ): ?>
			<?php 
			$class = ($class == 'even' ? 'odd' : 'even');
			$img_query = new WP_Query(
				array(
					'cat' => $category->term_id,
					'post_type'  => 'attachment',
					'post_mime_type' => 'image',
					'post_status' => 'published', //published,inherit
					'posts_per_page' => 4 // -1
				)
			);
			if ($img_query->posts) :
				$img_category_link = add_query_arg( array(
						'gallery' => $category->category_nicename
				), get_permalink() );
				// $image = array_shift($img_query->posts);
			?>
			<div class="row display-table <?php echo $class; ?>">
				<div class="col-md-6 display-cell imgcategory">
					<?php
						// printf( '<a href="%1$s">%2$s</a>',
						// 		esc_url( $img_category_link), //thumbnail, medium, large
						// 		wp_get_attachment_image( $image->ID, 'thumbnail',false,array('class' =>'img-responsive'))
						// );
					?>
					<aside>
						<?php foreach ($img_query->posts as $image ) : ?>
							<?php 
								// thumbnail, medium, large
								// $id, $size, $permalink, $icon, $text, $attr
								echo wp_get_attachment_image($image->ID, 'thumbnail',true, array('class'=>'img-responsive center-block'));
								// echo wp_get_attachment_link($image->ID,'large',false, false,false,array('class'=>'img-responsive center-block'));
								// echo wp_get_attachment_link($image->ID, false, false, false, 'image gose here',array('title'=>'oksikfe')); 
								// echo $img_query->post_count;
							?>
						<?php endforeach; ?>
					</aside>
				</div> 
				<div class="col-md-6 display-cell">
					<h3>
						<a href="<?php echo $img_category_link; ?>"><?php echo esc_html($category->name ); ?></a>
					</h3>
					<p class="description">
						<?php 
							if ($category->description == '') {
								echo esc_html($category->name).' gallery contains ';
							} else {
								echo esc_html($category->description); 
							}
						?>
						<strong>
							<?php 
								printf(
									_n(
										'%1$s photo.', 
										'%1$s photos.', $img_query->found_posts, 'lethil'
									),
									number_format_i18n( $img_query->found_posts )
								);
							?>
						</strong>
					</p>
				</div> 
			</div>
			<?php endif; ?>
		<?php endforeach; ?>
	</div>
</div>
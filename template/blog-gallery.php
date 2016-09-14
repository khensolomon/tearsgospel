<article id="post-<?php the_ID(); ?>" <?php post_class('row text-center'); ?>>
	<header class="entry-header">
		<?php 
			the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); 
		?>
	</header>
	<?php the_post_thumbnail( 'large', array( 'class' => 'img-responsive center-block thumbnail-blog' )); ?>
	<div class="entry-content">
		<?php if ( is_search() ) : ?>
			<?php the_excerpt(); ?>
		<?php elseif(is_single() ) : ?>
			<?php the_content(); ?>
			<?php
				$images = get_children(
					array( 
					'post_parent' => the_ID(),
					'post_type' => 'attachment',
					'post_mime_type' => 'image',
					'orderby' => 'menu_order',
					'order' => 'ASC',
					'numberposts' => 999
					)
				);
				if ( $images ) :
					$total_images = count( $images );
					$image = array_shift( $images );
					$image_img_tag = wp_get_attachment_image($image->ID, 'thumbnail' );
			?>

			<figure class="gallery-thumb">
				asdf asd<a href="<?php the_permalink(); ?>"><?php echo $image_img_tag; ?></a>
			</figure><!-- .gallery-thumb -->

			<p><em><?php printf( _n( 'This gallery contains <a %1$s>%2$s photo</a>.', 'This gallery contains <a %1$s>%2$s photos</a>.', $total_images, 'twentyeleven' ),
					'href="' . esc_url( get_permalink() ) . '" title="' . sprintf( esc_attr__( 'Permalink to %s', 'twentyeleven' ), the_title_attribute( 'echo=0' ) ) . '" rel="bookmark"',
					number_format_i18n( $total_images )
				); ?></em></p>
			<?php endif; ?>
		<?php else : ?>
			<?php the_excerpt(); ?>
		<?php endif; ?>
	</div>
	<footer class="entry-footer">
		<?php 
			// lethil_posted_on();
		?>
	</footer>
</article>
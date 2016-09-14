<article id="post-<?php the_ID(); ?>" <?php post_class('row text-center'); ?>>
	<header class="entry-header">
		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
			<span class="sticky-post"><?php _e( 'Featured', 'lethil' ); ?></span>
		<?php endif; ?>
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
		<?php else : ?>
			<?php the_excerpt(); ?>
		<?php endif; ?>
	</div>
	<footer class="entry-footer">
		<?php 
			lethil_posted_on();
		?>
	</footer>
</article>
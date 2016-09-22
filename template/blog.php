<div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<h2><?php the_title( sprintf( '<a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a>' );?></h2>
		</header>
		<div class="entry-content">
			<?php the_excerpt(); ?> 
		</div>
		<footer class="entry-footer">
			<?php custom_meta_posted_on(); ?>
		</footer>
	</article>
</div>
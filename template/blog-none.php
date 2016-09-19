<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<article class="none">
		<header class="entry-header">
			<h2>Nothing Found</h2>
		</header>
		<div class="entry-content">
			<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

				<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'lethil' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

			<?php elseif ( is_search() ) : ?>

				<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'lethil' ); ?></p>
				<?php get_search_form(); ?>

			<?php else : ?>

				<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'lethil' ); ?></p>
				<?php get_search_form(); ?>

			<?php endif; ?>
		</div>
		<footer class="entry-footer">
			<hr />
		</footer>
	</article>
</div>
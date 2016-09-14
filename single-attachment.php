<?php
	get_header();
?>
<div class="container-fluid bg-white">
	<div class="container lethil">
		<div class="row">
			<?php while ( have_posts() ) : the_post(); ?>
					<div class="col-md-12 col-sm-centered">
						<?php get_template_part('template/blog', get_post_format()); ?>

						<nav class="navigation post-navigation" role="navigation">
							<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'twentyfourteen' ); ?></h1>
							<div class="nav-links">
								<?php
								if ( is_attachment() ) :
									previous_post_link( '%link', __( '<span class="meta-nav">Published In</span>%title', 'twentyfourteen' ) );
								else :
									previous_post_link( '%link', __( '<span class="meta-nav">Previous Post</span>%title', 'twentyfourteen' ) );
									next_post_link( '%link', __( '<span class="meta-nav">Next Post</span>%title', 'twentyfourteen' ) );
								endif;
								?>
							</div><!-- .nav-links -->
						</nav><!-- .navigation -->	
					<?php 
							// if ( comments_open() || get_comments_number() ): 
							// 	comments_template();
							// 	endif;
						?>
					</div>
					<?php if ( comments_open() || get_comments_number() ): ?>
						<div class="col-md-12">
							<code>post single attachment</code>
							<?php 
							comments_template();
							?>
						</div>
					<?php endif; ?>
			<?php endwhile; ?>
		</div>
	</div>
</div>
<?php 
	get_footer();
?>

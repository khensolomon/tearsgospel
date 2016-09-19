<?php
	get_header();
?>
<div id="l21" class="container-fluid">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<h1><?php the_title(); ?></h1>
				<div><?php custom_meta_posted_on(); ?></div>
			</div>
		</div>
	</div>
</div>
<?php while ( have_posts() ) : the_post(); ?>
	<?php get_template_part( 'template/post', get_post_format() ); ?>
<?php endwhile; ?>
<?php
	// custom_post_query(get_post_meta(get_the_ID()),'template/page',7);
?>
<div id="l24" class="container-fluid">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<nav class="navigation post-navigation" role="navigation">
					<div class="nav-links">
						<?php
							previous_post_link( '%link', '%title');
							next_post_link( '%link', '%title' );
						?>
					</div>
				</nav>
			</div>
			<?php if ( comments_open() || get_comments_number() ): ?>
				<div class="col-md-12">
					<?php comments_template(); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>
<?php 
	get_footer();
?>
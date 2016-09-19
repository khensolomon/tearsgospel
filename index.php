<?php
	get_header();
?>
<style>
</style>
<div id="l11" class="container-fluid">
	<div class="containers">
		<div class="row">
			<div class="<?php echo is_active_sidebar( 'sidebar' )?'col-md-9':'col-md-12'; ?>">
				<?php if ( have_posts() ) : ?>
					<main id="blog" class="row">
						<?php while ( have_posts() ) : the_post(); ?>
							<?php get_template_part( 'template/blog', get_post_format() ); ?>
						<?php endwhile; ?>
					</main>
				<?php else : ?>
					<main id="blogNone" class="row">
						<?php get_template_part( 'template/blog', 'none' ); ?>
					</main>
				<?php endif; ?>
			</div>
			<?php get_sidebar(); ?>
		</div>
		<?php if ( have_posts() ) :  ?>
			<div class="row">
				<div class="col-md-12 text-center">
					<?php 
					the_posts_pagination( array(
						'prev_text'          => 'Previous',
						'next_text'          => 'Next'
					) );
					?>
				</div>
			</div>
		<?php endif;  ?>
	</div>
</div>
<?php
	// custom_post_query(get_post_meta(get_the_ID()),'template/page',7);
?>
<?php 
	get_footer();
?>
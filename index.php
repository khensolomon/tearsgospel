<?php
	get_header();
?>
<div class="blog container-fluid">
	<div class="containers">
		<div class="row">
			<div class="<?php echo is_active_sidebar( 'sidebar' )?'col-md-9':'col-md-12'; ?>">
				<?php if ( have_posts() ) : ?>
					<main class="row display-md-flex">
						<?php while ( have_posts() ) : the_post(); ?>
							<?php get_template_part( 'template/blog', get_post_format() ); ?>
						<?php endwhile; ?>
					</main>
				<?php else : ?>
					<div class="row">
						<?php get_template_part( 'template/blog', 'none' ); ?>
					</div>
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
	get_footer();
?>
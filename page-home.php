<?php 
	/* 
	Template Name: Home
	*/
	get_header();
?>
<!-- <header class="container-fluid" style="background-image: url(<?php header_image(); ?>);width: 100%;">
	<div class="container">
		<div class="row banner text-center">
			<div class="col-md-12">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<?php bloginfo( 'name' ); ?>
				</a>
			</div>
			<?php if(get_bloginfo( 'description' )) : ?>
				<div class="col-md-12 description">
					<p>
						<?php bloginfo( 'description' ); ?>
					</p>
				</div>
			<?php endif; ?>
		</div>
	</div>
</header> -->
<div class="container-fluid page">
	<div class="container">
		<?php
			while ( have_posts() ) : the_post();
				get_template_part(
				'template/home'
				);
			endwhile;
		?>
	</div>
</div>
<?php
custom_post_query(get_post_meta(get_the_ID()),'template/page',7);
?>
<?php 
	get_footer();
?>
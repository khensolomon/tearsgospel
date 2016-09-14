<div class="container-fluid bg-white">
	<div class="container">
		<?php if ( (function_exists( 'has_post_thumbnail' )) && ( has_post_thumbnail() ) ) :?>
				<div class="col-md-7 col-sm-centered">
				<?php echo get_the_post_thumbnail( get_the_ID(), 'large',array('class' =>'img-responsive center-block')); ?>
				</div>
				<div class="col-md-5 col-sm-centered">
		<?php else: ?>
			<div class="col-md-12 text-center">
		<?php endif; ?>
			<h2><?php the_title(); ?></h2>
			<?php the_content(); ?>
		</div>
	</div>
</div>
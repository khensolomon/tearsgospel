<?php 
/**
 * Default Page, connected to lethil/page.php
 */
?>
<div <?php post_class('container-fluid'); ?>>
	<div class="container text-sm-center">
		<?php if ( (function_exists( 'has_post_thumbnail' )) && ( has_post_thumbnail() ) ) :?>
			<div class="col-md-7">
				<?php echo get_the_post_thumbnail( get_the_ID(), 'large',array('class' =>'img-responsive center-block')); ?>
			</div>
			<div class="col-md-5">
		<?php else: ?>
			<div class="col-md-12 text-center">
		<?php endif; ?>
			<h2><?php the_title(); ?></h2>
			<?php the_content(); ?>
		</div>
	</div>
</div>
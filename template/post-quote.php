<?php if ( (function_exists( 'has_post_thumbnail' )) && ( has_post_thumbnail() ) ) :?>
		<div class="post-quote jumbotron abg" style="background-image:url(<?php the_post_thumbnail_url(); ?>)">
			<?php 
			// echo get_the_post_thumbnail( get_the_ID(), 'large',array('class' =>'img-responsive'));
			 ?>
	<?php else: ?>
		<div class="post-quote jumbotron ubg">
	<?php endif; ?>
		<div class="container">
			<h2>
				<?php the_title(); ?>
			</h2>
			<div class="lead">
				<?php the_content(); ?>
			</div>
		</div>
</div>
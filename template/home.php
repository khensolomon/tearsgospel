<?php if ( (function_exists( 'has_post_thumbnail' )) && ( has_post_thumbnail() ) ) :?>
<?php else: ?>
<?php endif; ?>
<div class="row text-center">
	<div class="col-md-12">
		<h1><?php the_title(); ?></h1>
	</div>
	<div class="col-md-12 description">
		<?php the_content(); ?>
		<p class="blog-post-meta" style="display:none;"><?php the_date(); ?> by <a href="#"><?php the_author(); ?></a></p>
	</div>
</div>
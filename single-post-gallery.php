<?php
	get_header();
?>
<div class="container-fluid bg-white">
	<div class="container lethil">
		<div class="row">
			<?php while ( have_posts() ) : the_post(); ?>
					<div class="col-md-12 col-sm-centered">
						asdf
						<?php 
							get_template_part('template/blog', get_post_format());
						?>
					</div>
			<?php endwhile; ?>
		</div>
	</div>
</div>
<?php 
	get_footer();
?>

<?php 
	/* 
	Template Name: Video
	*/
	get_header();
?>
<div <?php post_class('container-fluid'); ?>>
	<div class="container">
		<?php
		while ( have_posts() ) : the_post();
			get_template_part('template/video');
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
		endwhile;
		?>
	</div>
</div>
<?php
	custom_post_query(get_post_meta(get_the_ID()),'template/verso',7);
?>
<?php 
	get_footer();
?>
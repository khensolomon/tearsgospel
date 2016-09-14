<?php 
	/* 
	Template Name: Video
	*/
	get_header();
?>
<div class="container-fluid page">
	<div class="container lethil">
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
	custom_post_query(
		array(
			'cat' => 13,
			'posts_per_page' => 5
		),
		'template/page'
	);
?>
<?php 
	get_footer();
?>
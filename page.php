<?php 
	get_header();
?>
<?php
	while ( have_posts() ) : the_post();
		get_template_part(
		'template/page',
		'default'
		);
	endwhile;
?>
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
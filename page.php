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
	custom_post_query(get_post_meta(get_the_ID()),'template/page',7);
?>
<?php 
	get_footer();
?>
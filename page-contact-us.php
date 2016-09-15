<?php 
	/* 
	Template Name: Contact
	*/
	get_header();
?>
<?php
	while ( have_posts() ) : the_post();
	 get_template_part('template/contact');
	endwhile;
?>
<?php 
	get_footer();
?>
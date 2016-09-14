<?php 
	/* 
	Template Name: Contact
	*/
	get_header();
?>
<div class="container-fluid bg-white">
	<div class="container lethil">
		<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part('template/contact'); ?>
		<?php endwhile; ?>
	</div>
</div>
<?php 
	get_footer();
?>
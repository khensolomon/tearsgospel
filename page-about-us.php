<?php 
	/* 
	Template Name: About
	*/
	get_header();
?>
<div class="container-fluid page">
	<div class="container">
		<?php
			while ( have_posts() ) : the_post();
				get_template_part(
				'template/about'
				);
			endwhile;
		?>
	</div>
</div>
<?php
	custom_post_query(
		array(
			'cat' => 2,
			'posts_per_page' => 12
		),
		'template/page'
	);
?>
<?php 
	get_footer();
?>
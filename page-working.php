<?php 
	/* 
	Template Name : 
	*/
	get_header();
?>
<div class="container-fluid bg-white">
	<div class="container lethil">
		<?php
			while ( have_posts() ) : the_post();
				get_template_part(
				'template/page',
				'??'
				);
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
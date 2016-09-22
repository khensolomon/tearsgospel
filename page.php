<?php 
/*
.page.container-fluid
	.post.container-fluid.verso-> ?
	verso, related
.blog.container-fluid
	.post.container-fluid -> ?
	single
	.category.container-fluid
	.tag.container-fluid
	.format.container-fluid
	
footer.container-fluid
*/
	get_header();
?>
<?php
	while ( have_posts() ) : the_post();
		get_template_part(
		'template/page'
		);
	endwhile;
?>
<?php
	custom_post_query(get_post_meta(get_the_ID()),'template/verso',7);
?>
<?php 
	get_footer();
?>
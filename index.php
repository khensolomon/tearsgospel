<?php
	get_header();
?>
<div class="container-fluid bg-white">
	<div class="container lethil col-sm-centered">
		<div class="row">
			<div class="col-md-8">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
						<?php 
						if ( have_posts() ) :
							while ( have_posts() ) : the_post();
								get_template_part( 'template/blog', get_post_format() );
							endwhile;
							the_posts_pagination( array(
								'prev_text'          => __( 'Previous page', 'lethil' ),
								'next_text'          => __( 'Next page', 'lethil' ),
								// 'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'lethil' ) . ' </span>',
							) );
						else :
							get_template_part( 'template/blog', 'none' );
						endif;
						?>
					</main>
				</div>
			</div>
			<div class="col-md-4">
				<?php 
					get_sidebar();
				?>
			</div>
		</div>
	</div>
</div>
<?php
	// custom_post_query(get_post_meta(get_the_ID()),'template/page',7);
?>
<?php 
	get_footer();
?>
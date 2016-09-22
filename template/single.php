<?php 
$images = get_children(
	array( 
		// 'cat' => $category->term_id,
		'post_parent' => get_the_ID(),
		'post_type' => 'attachment',
		'post_mime_type' => 'image',
		'orderby' => 'menu_order',
		'order' => 'ASC'
	)
);
$imagesTotal = count( $images );
// $imagesCulumn = ceil(12/$imagesTotal);
// $col_lg = ceil(12/$imagesTotal);
// $col_lg_offset = ceil(12/$col_lg);
$col_md = ceil(12/$imagesTotal);
// $col_md_offset = $col_md / 2;
// $col_md_offset = ceil($col_md*$col_md/$imagesTotal);
// $col_sm = ceil(12/$imagesTotal);
// $col_xs = ceil(12/$imagesTotal);
?>
<div <?php post_class('single container-fluid'); ?> style="background-image:url(<?php the_post_thumbnail_url(); ?>);">
	<div class="container">
		<div class="row">
			<div class="<?php echo is_active_sidebar( 'single' )?'col-md-9':'col-md-12'; ?>">
				<article id="post-<?php the_ID(); ?>">
					<?php the_content(); ?>
				</article>
			</div>
			<?php get_sidebar('single'); ?>
		</div>
	</div>
</div>
<?php if ($imagesTotal) : ?>
<div class="single container-fluid galleries-">
	<div class="containers">
		<div class="row display-all-flex">
			<?php foreach ($images as $image): ?>
				<div class="col-md-3">
					<?php echo wp_get_attachment_image( $image->ID, 'large',false,array('class' =>'img-responsive center-block')); ?>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>
<?php endif; ?>
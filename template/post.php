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
$imagesCulumn = ceil(12/$imagesTotal);
?>
<?php if ($imagesTotal) :?>
<div id="l22" class="container singleAttachment">
	<div class="row display-table">
		<?php foreach ($images as $image): ?>
			<div class="col-md-<?php echo $imagesCulumn;?> display-cell">
				<?php echo wp_get_attachment_image( $image->ID, 'large',false,array('class' =>'img-responsive img-attachment center-block')); ?>
			</div>
		<?php endforeach; ?>
	</div>
</div>
<?php endif; ?>
<div id="l23" <?php post_class('container-fluid'); ?> style="background-image:url(<?php the_post_thumbnail_url(); ?>);">
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
<?php 
/**
 * Default posts Page, connected to custom_post_query();
 * page-aside
 * page-audio
 * page-chat
 * page-gallery
 * page-image
 * page-link
 * page-quote
 * page-status
 * page-video
 */
?>
<?php 
$images = get_children(
	array( 
		'numberposts' => 2,
		'post_parent' => get_the_ID(),
		'post_type' => 'attachment',
		'post_mime_type' => 'image',
		// 'order' => 'ASC',
		// 'order'=> 'DESC',
		// 'orderby' => 'menu_order'
	)
);
$imagesTotal = count( $images );
$imagesCulumn = ceil(12/$imagesTotal);
// if ( (function_exists( 'has_post_thumbnail' )) && ( has_post_thumbnail() ) )
 // jumbotron abg
?>
<div <?php post_class('verso container-fluid'); ?> style="background-image:url(<?php the_post_thumbnail_url(); ?>);">
	<div class="container" id="post-<?php the_ID(); ?>">
	<?php if ($imagesTotal) :?>
		<div class="row display-md-flex text-sm-center">
			<div class="col-md-7 col-sm-7">
				<div class="row display-md-flex">
					<?php foreach ($images as $image): ?>
						<div class="col-md-<?php echo $imagesCulumn;?> col-sm-12">
							<?php echo wp_get_attachment_image( $image->ID, 'large',false,array('class' =>'img-responsive center-block')); ?>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
			<div class="col-md-5 col-sm-5">
				<h2><?php the_title(); ?></h2>
				<?php the_content(); ?>
			</div>
		</div>
	<?php else: ?>
		<div class="row">
			<div class="col-md-10 col-md-offset-1 text-center">
				<h2><?php the_title(); ?></h2>
				<?php the_content(); ?>
			</div>
		</div>
	<?php endif; ?>
	</div>
</div>
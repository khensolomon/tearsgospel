<?php 
$images = get_children(
	array( 
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
<?php if ( (function_exists( 'has_post_thumbnail' )) && ( has_post_thumbnail() ) ) :?>
	<div id="post-<?php the_ID(); ?>" <?php post_class('container-fluid jumbotron abg'); ?> style="background-image:url(<?php the_post_thumbnail_url(); ?>);">
<?php else: ?>
	<div id="post-<?php the_ID(); ?>" <?php post_class('container-fluid ubg'); ?>">
<?php endif; ?>
	<div class="container col-sm-centered">
	<?php if ($imagesTotal) :?>
		<div class="row display-table">
			<div class="col-md-5 col-sm-5 col-md-right display-cell">
				<h2><?php the_title(); ?></h2>
				<?php the_content(); ?>
			</div>
			<div class="col-md-7 col-sm-7 display-cell">
				<div class="row display-table">
					<?php foreach ($images as $image): ?>
						<div class="col-md-<?php echo $imagesCulumn;?> col-sm-12 display-cell">
						<?php echo wp_get_attachment_image( $image->ID, 'large',false,array('class' =>'img-responsive center-block')); ?>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
	</div>
	<?php else: ?>
		<div class="row">
			<div class="col-md-12 text-center">
				<h1><?php the_title(); ?></h1>
				<?php the_content(); ?>
			</div>
		</div>
	<?php endif; ?>
</div>
</div>

<div <?php post_class('container-fluid'); ?>>
	<div class="container">
    <div class="row text-center">
      <div class="col-md-12">
        <h1><?php the_title(); ?></h1>
        <?php the_post_thumbnail( 'medium', array( 'class' => 'img-responsive center-block thumbnail-blog' )); ?>
        <?php the_content(); ?>
        <?php 
        // if ( '' !== get_the_author_meta( 'description' ) ) { get_template_part( 'template/biography' ); }
        ?>
      </div>
    </div>
  </div>
</div>
<?php if ( comments_open() || get_comments_number() ): ?>
  <div class="container-fluid">
  	<div class="container">
      <div class="row text-center">
        <div class="col-md-12">
          <?php comments_template('/comments-contact.php'); ?>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>
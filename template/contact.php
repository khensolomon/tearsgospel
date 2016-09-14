<div class="row col-sm-centered">
  <div class="col-md-7 col-md-right">
    <h1><?php the_title(); ?></h1>
    <?php the_post_thumbnail( 'medium', array( 'class' => 'img-responsive center-block thumbnail-blog' )); ?>
    <?php the_content(); ?>
    <?php 
    // if ( '' !== get_the_author_meta( 'description' ) ) { get_template_part( 'template/biography' ); }
    ?>
  </div>
  <?php if ( comments_open() || get_comments_number() ): ?>
    <div class="col-md-5">
      <?php comments_template('/comments-contact.php'); ?>
    </div>
  <?php endif; ?>
</div>
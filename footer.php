<footer class="container-fluid">
  <div class="container">
    <hr class="featurette-divider" />
    <?php if ( is_active_sidebar( 'footer' )  ) : ?>
      <div class="row sidebar widget-area">
      	<?php dynamic_sidebar( 'footer' ); ?>
      </div>
    <?php endif; ?>
    <div class="row">
      <div class="col-md-12">
        <a class="scroll-to-top" href="#"><i class="glyphicon glyphicon-chevron-up"></i></a>
        <!-- <div class="pull-right scroll-to-top"><i class="glyphicon glyphicon-chevron-up">Back to top</i></div> -->
        &copy; <?php echo date("Y"); ?> <a class="copyright" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>.
        <?php
        wp_nav_menu(array(
          'menu'              => 'reference',
          'theme_location'    => 'reference',
          'container'         => false,
          'depth'             => 1,
          'menu_class'        => 'reference'
        ));
        ?>
      </div>
    </div>
    <div class="row">
      <?php 
        wp_nav_menu(array(
          'menu'              => 'social',
          'theme_location'    => 'social',
          'container'         => 'div',
          'container_class'   => 'col-md-12',
          'container_id'      => 'social',
          'menu_class'        => 'social',
          'link_before'       => '<i class="social_icon fa"><span>',
  				'link_after'        => '</span></i>'
        ));
      ?>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
<?php if ( is_active_sidebar( 'sidebar' )  ) : ?>
	<div class="col-sm-12 col-sm-offset-1 blog-sidebar">
	<aside id="secondary" class="sidebar widget-area" role="complementary">
		<?php dynamic_sidebar( 'sidebar' ); ?>
	</aside>
</div>
<?php endif; ?>

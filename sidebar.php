<?php if ( is_active_sidebar( 'sidebar' )  ) : ?>
<div class="col-md-3">
	<div class="blog-sidebar">
		<aside id="secondary" class="sidebar widget-area" role="complementary">
			<?php dynamic_sidebar( 'sidebar' ); ?>
		</aside>
	</div>
</div>
<?php endif; ?>

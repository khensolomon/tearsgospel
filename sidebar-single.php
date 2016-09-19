<?php if ( is_active_sidebar( 'single' )  ) : ?>
<div class="col-md-3">
	<div class="single-sidebar">
		this is sidebar single.....
		<aside id="secondary" class="sidebar widget-area" role="complementary">
			<?php dynamic_sidebar( 'single' ); ?>
		</aside>
	</div>
</div>
<?php endif; ?>

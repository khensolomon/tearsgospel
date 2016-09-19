<?php
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ): ?>
		<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
	<?php
		return;
	endif;
?>

<?php if ( have_comments() ) : ?>
	<h3><?php comments_number('No Responses', 'One Response', '% Responses' );?> to &#8220;<?php the_title(); ?>&#8221;</h3>

	<ul class="media-list">
	<?php
		// wp_list_comments();
		wp_list_comments(
			array(
		    'style' => 'ul',
		    'short_ping' => true,
		    'avatar_size' => 42,
		    'walker' => new WP_Bootstrap_Comments_Walker()
	    )
		);
	?>
	</ul>
	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>
 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->
	 <?php else : ?>
		<!-- If comments are closed. -->
		<p class="nocomments">Comments are closed.</p>
	<?php endif; ?>
<?php endif; ?>


<?php if ( comments_open() ) : ?>
	<div id="respond">
		<h3>
			<?php comment_form_title( 'Leave a Reply..', 'Leave a Reply to %s' ); ?>
		</h3>
		<div class="cancel-comment-reply">
			<small><?php cancel_comment_reply_link(); ?></small>
		</div>
		<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
			<p>You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>">logged in</a> to post a comment.</p>
			<?php else : ?>
			<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
				<?php if ( is_user_logged_in() ) : ?>
					<h3>
						<a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>
					</h3>
				<?php else : ?>
					<div class="input-group">
					  <label for="author" class="input-group-addon" id="sizing-addon-name">Name <sup><?php if ($req) echo '*'; ?></sup></label>
					  <input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" tabindex="1" class="form-control" placeholder="Name" aria-describedby="sizing-addon-name" <?php if ($req) echo "aria-required='true'"; ?>>
					</div>
					<div class="input-group">
					  <label for="email" class="input-group-addon" id="sizing-addon-email">Mail <sup><?php if ($req) echo '*'; ?></sup></label>
					  <input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" tabindex="2" class="form-control" placeholder="Email" aria-describedby="sizing-addon-email" <?php if ($req) echo "aria-required='true'"; ?>>
					</div>
					<div class="input-group">
					  <label for="url" class="input-group-addon" id="sizing-addon-url">Website</label>
					  <input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" tabindex="3" class="form-control" placeholder="Url" aria-describedby="sizing-addon-url">
					</div>
				<?php endif; ?>
					<div class="form-group">
					  <textarea class="form-control" rows="5" name="comment" id="comment" tabindex="4"></textarea>
					</div>
					<div class="input-group">
					  <input type="submit" class="btn btn-primary contact-submit" name="submit" id="submit" value="Comment" tabindex="6">
						<?php comment_id_fields(); ?>
					</div>
					<?php do_action('comment_form', $post->ID); ?>
			</form>
		<?php endif;?>
	</div>
<?php endif; // if you delete this the sky will fall on your head ?>



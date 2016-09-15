<?php
/**
 * Post list.
 * $query = array( 'cat' => 13,'posts_per_page' => 5 );
 * $template = 'template/home';
 * $slidecat = get_theme_mod( 'tearsgospel_featured_cat' );
 */
if ( ! function_exists( 'custom_post_query' ) ) :
	function custom_post_query($cat,$template,$posts_per_page=7)
	{
		if (is_array($cat['catid'])) {
			$query = array(
				'cat' => $cat['catid'][0],
				'posts_per_page' => $posts_per_page
			);
			$content = new WP_Query($query);
			if ($content->have_posts()) {
				while ($content->have_posts()) {
					$content->the_post(); 
					get_template_part($template, get_post_format() );
				}
				wp_reset_query();
			}
		}
	}
endif;
if ( ! function_exists( 'get_categories_select' ) ) :
	function get_categories_select()
	{
		$cats = array();
		$cats[0] = "All";
		foreach ( get_categories() as $categories => $category ) {
			$cats[$category->term_id] = $category->name;
		}
		return $cats;
	}
endif;
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
if ( ! function_exists( 'lethil_posted_on' ) ) :
	function lethil_posted_on()
	{
		if ( is_sticky() && is_home() && ! is_paged() ) {
			printf( '<span class="sticky-post">%s</span>', __( 'Featured', 'lethil' ) );
		}

		$format = get_post_format();
		if ( current_theme_supports( 'post-formats', $format ) ) {
			printf( '<div class="entry-format">%1$s<a href="%2$s">%3$s</a></div>',
				sprintf( '<span class="screen-reader-text">%s </span>'),
				esc_url( get_post_format_link( $format ) ),
				get_post_format_string( $format )
			);
		}

		// if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
		// 	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		// 
		// 	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		// 		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		// 	}
		// 
		// 	$time_string = sprintf( $time_string,
		// 		esc_attr( get_the_date( 'c' ) ),
		// 		get_the_date(),
		// 		esc_attr( get_the_modified_date( 'c' ) ),
		// 		get_the_modified_date()
		// 	);
		// 
		// 	printf( '<span class="posted-on"><span class="screen-reader-text">%1$s </span><a href="%2$s" rel="bookmark">%3$s</a></span>',
		// 		_x( 'Posted on', 'Used before publish date.', 'lethil' ),
		// 		esc_url( get_permalink() ),
		// 		$time_string
		// 	);
		// }

		if ( 'post' == get_post_type() ) {
			if ( is_singular() || is_multi_author() ) {
				printf( '<span class="byline"><span class="author vcard"><span class="screen-reader-text">%1$s </span><a class="url fn n" href="%2$s">%3$s</a></span></span>',
					_x( 'Author', 'Used before post author name.', 'lethil' ),
					esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
					get_the_author()
				);
			}

			$tags_list = get_the_tag_list( '', __( ', ', 'Used between list items, there is a space after the comma.', 'lethil' ) );
			if ( $tags_list ) {
				printf( '<div class="tags-links">%1$s</div>', $tags_list
				);
			}
		}

		// if ( is_attachment() && wp_attachment_is_image() ) {
		// 	// Retrieve attachment metadata.
		// 	$metadata = wp_get_attachment_metadata();
		// 
		// 	printf( '<span class="full-size-link"><span class="screen-reader-text">%1$s </span><a href="%2$s">%3$s &times; %4$s</a></span>',
		// 		_x( 'Full size', 'Used before full size attachment link.', 'lethil' ),
		// 		esc_url( wp_get_attachment_url() ),
		// 		$metadata['width'],
		// 		$metadata['height']
		// 	);
		// }

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<div class="comments-link">';
			/* translators: %s: post title */
			// comments_popup_link( sprintf( __( 'Leave a comment<span class="screen-reader-text"> on %s</span>', 'lethil' ), get_the_title() ) );
			comments_popup_link( '<span class="leave-reply">' . __( 'reply', 'lethil' ) . '</span>', __( '1 comment', 'comments number', 'lethil' ), __( '% comments', 'comments number', 'lethil' ) );
			echo '</div>';
		}
	}
endif;
?>

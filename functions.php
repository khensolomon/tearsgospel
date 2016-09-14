<?php
// TEMPLATEPATH
if ( ! function_exists( 'lethil_setup' ) ) :
function lethil_setup() {
	/**
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/lethil
	 * If you're building a theme based on Twenty Sixteen, use a find and replace
	 * to change 'lethil' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'lethil' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/**
	 * Enable support for custom logo.
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support('custom-logo', array(
		'height' => 50,
		'width' => 250,
		'flex-height' => true,
	));
	/**
	* Setup the WordPress core custom background feature.
	*/
  add_theme_support('custom-background', apply_filters( 'custom_background_args', array(
    'default-color' => 'FFFFFF',
    'default-image' => '',
  )));
	/**
	 * @link https://codex.wordpress.org/Custom_Headers
	 */
	add_theme_support('custom-header' );
	/**
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support('post-thumbnails' );
	set_post_thumbnail_size( 1200, 9999 );

	register_nav_menus(array(
		'primary' => __( 'Primary', 'lethil' ),
		'social'  => __( 'Social', 'lethil' ),
		'reference'  => __( 'Reference', 'lethil' )
	));

	/**
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support('html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/**
	 * Enable support for Post Formats.
	 * See: https://codex.wordpress.org/Post_Formats
	 */

	add_theme_support('post-formats', array(
		'aside',
		'audio',
		'chat',
		'gallery',
		'image',
		'link',
		'quote',
		'status',
		'video'
	) );
	// Indicate widget sidebars can use selective refresh in the Customizer.
	add_theme_support('customize-selective-refresh-widgets' );
}
endif; // lethil_setup
add_action('after_setup_theme', 'lethil_setup' );
/**
 * Registers a widget area.
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 * @since Lethil 1.0
 */
function lethil_widgets_init() {
	register_sidebar(array(
		'name'          => __( 'Blog', 'lethil' ),
		'id'            => 'sidebar',
		'description'   => __( 'Add widgets to blog sidebar.', 'lethil' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar(array(
		'name'          => __( 'Footer', 'lethil' ),
		'id'            => 'footer',
		'description'   => __( 'Appears in every single pages of the footer. responsive require 3 columns (3 widgets)!', 'lethil' ),
		'before_widget' => '<div id="%1$s" class="col-md-4 widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	// register_sidebar(array(
	// 	'name'          => __( 'Content Bottom 1', 'lethil' ),
	// 	'id'            => 'sidebar-2',
	// 	'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'lethil' ),
	// 	'before_widget' => '<section id="%1$s" class="widget %2$s">',
	// 	'after_widget'  => '</section>',
	// 	'before_title'  => '<h2 class="widget-title">',
	// 	'after_title'   => '</h2>',
	// ) );
	// 
	// register_sidebar(array(
	// 	'name'          => __( 'Content Bottom 2', 'lethil' ),
	// 	'id'            => 'sidebar-3',
	// 	'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'lethil' ),
	// 	'before_widget' => '<section id="%1$s" class="widget %2$s">',
	// 	'after_widget'  => '</section>',
	// 	'before_title'  => '<h2 class="widget-title">',
	// 	'after_title'   => '</h2>',
	// ) );
}
add_action('widgets_init', 'lethil_widgets_init' );

function lethil_styles() {
	// jQuery
	wp_enqueue_script('jquery');
	// Bootstrap
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.7' );
	// wp_enqueue_style('bootstrap_theme', get_template_directory_uri() . '/css/bootstrap-theme.min.css', array(), '3.3.7' );
	wp_enqueue_style('font_awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.6.3' );
	wp_enqueue_style('bootstrap_custom', get_template_directory_uri() . '/css/bootstrap.custom.css');
	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.3.7',true);
	wp_enqueue_script('bootstrap.custom', get_template_directory_uri() . '/js/bootstrap.custom.js', array(), '3.3.7',true);
	// Default style
	wp_enqueue_style( 'lethil', get_stylesheet_uri() );
	
	// Google fonts
	$google_forts = array(
		'family' => urlencode('Droid+Serif|Fira+Mono|Raleway')
	);
	wp_enqueue_style( 'google-fonts', add_query_arg( $google_forts,'https://fonts.googleapis.com/css'), array(), null );
	
	// HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
	// wp_enqueue_script( 'lethil-ie9', array('https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js','https://oss.maxcdn.com/respond/1.4.2/respond.min.js'), array( 'lethil-style' ), '20160816' );
	// wp_style_add_data( 'lethil-ie9', 'conditional', 'lt IE 9' );
}
add_action('wp_enqueue_scripts', 'lethil_styles' );
function wpdocs_excerpt_more( $more ) {
    return '<a href="'.get_the_permalink().'" class="read-more" rel="nofollow">...more!</a>';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );
/** 
* Register taxonomy for images
*/
function custom_register_taxonomy_for_images() {
    register_taxonomy_for_object_type( 'category', 'attachment' );
}
add_action( 'init', 'custom_register_taxonomy_for_images' );
/** 
* Add a category filter to images 
*/
function custom_add_image_category_filter() {
	 $screen = get_current_screen();
	 if ( 'upload' == $screen->id ) {
		wp_dropdown_categories(
			array( 'show_option_all' => __( 'View all categories', 'lethil' ), 'hide_empty' => false, 'hierarchical' => true, 'orderby' => 'name')
		);
	 }
}
add_action( 'restrict_manage_posts', 'custom_add_image_category_filter' );
/**
 * Utilities
 */
require get_template_directory() . '/require/utilities.php';
/**
 * Options
 */
// require get_template_directory() . '/options.php';
/**
 * Customizer additions.
 */
require get_template_directory() . '/require/customizer.php';
/**
 * Bootstrap Menu, Comment
 */
require get_template_directory() . '/require/wp_bootstrap_navwalker.php';
require get_template_directory() . '/require/wp-bootstrap-comments.php';
?>
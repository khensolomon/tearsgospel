<?php
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function custom_customize_registration( $wp_customize ) {
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'custom_customize_registration' );
/**
 * Options for WordPress Theme Customizer.
 */
function custom_customize_register( $wp_customize ) {
  /*
  $wp_customize->add_setting(
      'custom_link_color',
      array(
          'default'     => '#000000'
      )
  );
  $wp_customize->add_control(
      new WP_Customize_Color_Control(
          $wp_customize,
          'custom_link_color',
          array(
              'label'      => __( 'Link Color', 'lethil' ),
              'section'    => 'colors',
              'settings'   => 'custom_link_color'
          )
      )
  );
  */
  // Main option Settings Panel
  $wp_customize->add_panel('custom_options_panel', array(
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => __('Options', 'lethil'),
    'description' => __('Panel to update the theme options', 'lethil'),
    'priority' => 10
  ));

  // add "Content Options" section
  $wp_customize->add_section( 'custom_content_section' , array(
  'title'      => esc_html__( 'Content', 'lethil' ),
  'priority'   => 50,
  'panel' => 'custom_options_panel'
  ));
  
  // add "slider Posts" section
	$wp_customize->add_section( 'custom_slider_section' , array(
		'title'      => esc_html__( 'Slider', 'lethil' ),
		'priority'   => 60,
    'panel' => 'custom_options_panel'
	));
	$wp_customize->add_setting( 'custom_slider_category', array(
		'default' => 0,
		'transport'   => 'refresh',
    // 'sanitize_callback' => 'tearsgospel_sanitize_slidecat'
	));
	$wp_customize->add_control( 'custom_slider_category', array(
		'type' => 'select',
		'label' => 'Choose a category for slider',
		'choices' => get_categories_select(),
		'section' => 'custom_slider_section',
	));
  $wp_customize->add_control( 'custom_slider_featured', array(
		'type' => 'checkbox',
		'label' => 'Activate slider',
		'section' => 'custom_slider_section',
	) );
  /* Other Options */
  $wp_customize->add_section('custom_other_options', array(
      'title' => __('Other', 'lethil'),
      'priority' => 70,
      'panel' => 'custom_options_panel'
  ));
  $wp_customize->add_setting('custom_css', array(
      'default' => '',
      // 'sanitize_callback' => 'tearsgospel_sanitize_strip_slashes'
  ));
  $wp_customize->add_control('custom_css', array(
      'label' => __('Custom CSS', 'lethil'),
      'description' => sprintf(__('Additional CSS', 'lethil')),
      'section' => 'custom_other_options',
      'type' => 'textarea'
  ));
}
add_action( 'customize_register', 'custom_customize_register' );
/*
function custom_customize_register_color( $wp_customize ) {
 
    $wp_customize->add_setting(
        'custom_link_color',
        array(
            'default'     => '#000000'
        )
    );
  //   $wp_customize->add_setting(
  //      'custom_link_color',
  //      array(
  //          'default'     => '#000000',
  //          'transport'   => 'postMessage'
  //      )
  //  );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'custom_link_color',
            array(
                'label'      => __( 'Link Color', 'lethil' ),
                'section'    => 'colors',
                'settings'   => 'custom_link_color'
            )
        )
    );
}
add_action( 'customize_register', 'custom_customize_register_color' );
*/
/*
function custom_link_color_css() {
    ?>
    <style type="text/css">
        a { color: <?php echo get_theme_mod( 'custom_link_color' ); ?>; }
    </style>
    <?php
}
add_action( 'wp_head', 'custom_link_color_css' );
*/
?>
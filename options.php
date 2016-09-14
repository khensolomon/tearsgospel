<?php
$setting_Id = 'lethil_theme_options';
$setting_Default = array(
		'tabber_1' => 1,
		'tabber_2' => 2,
		'tabber_3' => 3,
		'tabber_4' => 4,
		'tabber_5' => 5,
		'tabber_6' => 6,
);

//add_action( 'after_setup_zo_theme', 'theme_options_add_page' );
//add_theme_support('theme_options_add_page','theme_options_add_page');
//add_theme_page(get_current_theme()." Options", "ZO Theme Setup", 'edit_themes', basename(__FILE__), 'lethil_theme_options');

add_option('ThemeSettingDefault', $setting_Default, '', 'yes');
add_action('admin_init', 'theme_options_init');
add_action('admin_menu', 'theme_options_add_page');
add_action('admin_init', 'lethil_theme_options_style');

function theme_options_init(){
	global $setting_Id, $setting_Default;
	register_setting($setting_Id, 'ThemeSettingDefault');
}
function zotheme_option_page_capability( $capability ) {
	return 'edit_theme_options';
}
add_filter( 'option_page_capability_zotheme_options', 'zotheme_option_page_capability' );
function theme_options_add_page() {
	//register_nav_menu( 'primary', __( 'Primary Menu', 'zotune' ) );
	//add_submenu_page('themes.php', __('ZO Theme Setup', 'lethil'), __('ZO Theme Setup', 'lethil'), 8, 'zo_theme_edit', 'lethil_theme_options');
	$theme_page = add_theme_page(
		__( 'ZO Theme Setup 1', 'lethil' ),   // Name of page
		__( 'ZO Theme Setup 2', 'lethil' ),   // Label in menu
		'edit_theme_options',               // Capability required
		'theme_options',                    // Menu slug, used to uniquely identify the page
		'lethil_theme_options' // Function that renders the options page
	);

	if ( ! $theme_page )
		return;	
	$help = '<h4>' . __( 'ZOTUNE DEVELOPER provide theme options for individual products.', 'twentyeleven' ) . '</h4>' .
			'<p>' . __( 'Remember to click "Save Changes" to save any changes you have made to the theme options.', 'zotune' ) . '</p>' .
			'<p><strong>' . __( 'For more information:', 'zotune' ) . '</strong></p>' .
			'<p class="zotune">' . __( '<a href="http://zotune.com/" target="_blank"><span>For more info.</span></a>', 'zotune' ) . '</p>';

	add_contextual_help( $theme_page, $help );	
}

function lethil_theme_options_style() {
	//$file_dir = get_template_directory_uri();
	// $file_dir = get_bloginfo('template_directory');
	// wp_enqueue_style("ZTOCss", "$file_dir/ini/theme-options.css", true, "1.0", "all");
	//wp_enqueue_script("ZTOScript", "$file_dir/functions/theme-options.js", false, "1.0");

}


/**
 * Create the options page
 */
function lethil_theme_options() {
	global $setting_Id, $setting_Default,$ThemeSettingShow;
	// if ( ! isset( $_REQUEST['settings-updated'] ) ) $_REQUEST['settings-updated'] = false;		
?>
<div class="wrap"> 	
    <div class="updated fade manage-menus">
			<p>
				<?php _e('Options saved', 'lethil' ); ?>
			</p>
		</div>
		<form method="post" action="options.php">
			<?php 
				settings_fields($setting_Id);
				$ThemeSettingShow = get_option('ThemeSettingDefault'); 
			?>
			<div class="postbox analyticsstat manage-menus">
				<h3><?php _e("Analytics/Stat Tracker Code", 'lethil'); ?></h3>
				<div class="inside">
					<p>
						<label><?php _e("Google Analytics?", 'lethil'); ?></label>
						<select name="ThemeSettingDefault[analytics]">
							<option value="Yes" 
								<?php selected('Yes', $ThemeSettingShow['analytics']); ?>>Yes</option>
							<option value="No" 
								<?php selected('No', $ThemeSettingShow['analytics']); ?>>No</option>
						</select>
					</p>
					<p>
						<label><?php _e("Enter your analytics/stat tracker code", 'lethil'); ?>:</label>
						<textarea name="ThemeSettingDefault[analytics_code]"><?php echo stripslashes($ThemeSettingShow['analytics_code']); ?></textarea>
					</p>
				</div>
			</div>
			<div class="postbox manage-menus">
				<input type="submit" class="button-primary" value="<?php _e('Save', 'lethil') ?>" />
				<input type="submit" class="button-highlighted" name="reset" value="<?php _e('Reset', 'lethil'); ?>" />
			</div>
		</form>
</div>
<?php } ?>
<?php
/**
 * Skins support: Main skin file for the skin 'Default'
 *
 * Setup skin-dependent fonts and colors, load scripts and styles,
 * and other operations that affect the appearance and behavior of the theme
 * when the skin is activated
 *
 * @package WordPress
 * @subpackage PLUMBING
 * @since PLUMBING 1.0.46
 */


// Theme init priorities:
// 3 - add/remove Theme Options elements
if ( ! function_exists( 'plumbing_skin_theme_setup3' ) ) {
	add_action( 'after_setup_theme', 'plumbing_skin_theme_setup3', 3 );
	function plumbing_skin_theme_setup3() {
		// ToDo: Add / Modify theme options, color schemes, required plugins, etc.
	}
}

// Filter to add in the required plugins list
if ( ! function_exists( 'plumbing_skin_tgmpa_required_plugins' ) ) {
	add_filter( 'plumbing_filter_tgmpa_required_plugins', 'plumbing_skin_tgmpa_required_plugins' );
	function plumbing_skin_tgmpa_required_plugins( $list = array() ) {
		// ToDo: Check if plugin is in the 'required_plugins' and add his parameters to the TGMPA-list
		//       Replace 'skin-specific-plugin-slug' to the real slug of the plugin
		if ( plumbing_storage_isset( 'required_plugins', 'skin-specific-plugin-slug' ) ) {
			$list[] = array(
				'name'     => plumbing_storage_get_array( 'required_plugins', 'skin-specific-plugin-slug', 'title' ),
				'slug'     => 'skin-specific-plugin-slug',
				'required' => false,
			);
		}
		return $list;
	}
}

// Enqueue skin-specific styles and scripts
// Priority 1150 - after plugins-specific (1100), but before child theme (1200)
if ( ! function_exists( 'plumbing_skin_frontend_scripts' ) ) {
	add_action( 'wp_enqueue_scripts', 'plumbing_skin_frontend_scripts', 1150 );
	function plumbing_skin_frontend_scripts() {
		$plumbing_url = plumbing_get_file_url( PLUMBING_SKIN_DIR . 'skin.css' );
		if ( '' != $plumbing_url ) {
			wp_enqueue_style( 'plumbing-skin-' . esc_attr( PLUMBING_SKIN_NAME ), $plumbing_url, array(), null );
		}
	}
}

// Enqueue skin-specific responsive styles
// Priority 2050 - after theme responsive 2000
if ( ! function_exists( 'plumbing_skin_styles_responsive' ) ) {
	add_action( 'wp_enqueue_scripts', 'plumbing_skin_styles_responsive', 2050 );
	function plumbing_skin_styles_responsive() {
		$plumbing_url = plumbing_get_file_url( PLUMBING_SKIN_DIR . 'skin-responsive.css' );
		if ( '' != $plumbing_url ) {
			wp_enqueue_style( 'plumbing-skin-' . esc_attr( PLUMBING_SKIN_NAME ) . '-responsive', $plumbing_url, array(), null );
		}
	}
}

// Set theme specific importer options
if ( ! function_exists( 'plumbing_skin_importer_set_options' ) ) {
	add_filter('trx_addons_filter_importer_options', 'plumbing_skin_importer_set_options', 9);
	function plumbing_skin_importer_set_options($options = array()) {
		if ( is_array( $options ) ) {
			$options['demo_type'] = 'skin_slug';
			$options['files']['skin_slug'] = $options['files']['default'];
			$options['files']['skin_slug']['title'] = esc_html__('Skin Title Demo', 'plumbing');
			$options['files']['skin_slug']['domain_demo'] = esc_url( plumbing_get_protocol() . '://skin_slug.theme_slug.themerex.net' );   // Demo-site domain
			unset($options['files']['default']);
		}
		return $options;
	}
}

// Add slin-specific colors and fonts to the custom CSS
require_once PLUMBING_THEME_DIR . PLUMBING_SKIN_DIR . 'skin-styles.php';

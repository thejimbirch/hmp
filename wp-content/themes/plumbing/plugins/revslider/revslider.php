<?php
/* Revolution Slider support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'plumbing_revslider_theme_setup9' ) ) {
	add_action( 'after_setup_theme', 'plumbing_revslider_theme_setup9', 9 );
	function plumbing_revslider_theme_setup9() {
		if ( is_admin() ) {
			add_filter( 'plumbing_filter_tgmpa_required_plugins', 'plumbing_revslider_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( ! function_exists( 'plumbing_revslider_tgmpa_required_plugins' ) ) {
	
	function plumbing_revslider_tgmpa_required_plugins( $list = array() ) {
		if ( plumbing_storage_isset( 'required_plugins', 'revslider' ) && plumbing_storage_get_array( 'required_plugins', 'revslider', 'install' ) !== false && plumbing_is_theme_activated() ) {
			$path = plumbing_get_plugin_source_path( 'plugins/revslider/revslider.zip' );
			if ( ! empty( $path ) || plumbing_get_theme_setting( 'tgmpa_upload' ) ) {
				$list[] = array(
					'name'     => plumbing_storage_get_array( 'required_plugins', 'revslider', 'title' ),
					'slug'     => 'revslider',
					'source'   => ! empty( $path ) ? $path : 'upload://revslider.zip',
					'version'  => '6.4.6',
					'required' => false,
				);
			}
		}
		return $list;
	}
}

// Check if RevSlider installed and activated
if ( ! function_exists( 'plumbing_exists_revslider' ) ) {
	function plumbing_exists_revslider() {
		return function_exists( 'rev_slider_shortcode' );
	}
}

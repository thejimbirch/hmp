<?php
/* WPBakery PageBuilder Extensions Bundle support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'plumbing_vc_extensions_theme_setup9' ) ) {
	add_action( 'after_setup_theme', 'plumbing_vc_extensions_theme_setup9', 9 );
	function plumbing_vc_extensions_theme_setup9() {
		if ( plumbing_exists_vc() && plumbing_exists_vc_extensions() ) {
			add_action( 'wp_enqueue_scripts', 'plumbing_vc_extensions_frontend_scripts', 1100 );
			add_filter( 'plumbing_filter_merge_styles', 'plumbing_vc_extensions_merge_styles' );
		}
		if ( is_admin() ) {
			add_filter( 'plumbing_filter_tgmpa_required_plugins', 'plumbing_vc_extensions_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( ! function_exists( 'plumbing_vc_extensions_tgmpa_required_plugins' ) ) {
	
	function plumbing_vc_extensions_tgmpa_required_plugins( $list = array() ) {
		if ( plumbing_storage_isset( 'required_plugins', 'vc-extensions-bundle' ) && plumbing_storage_get_array( 'required_plugins', 'vc-extensions-bundle', 'install' ) !== false && plumbing_is_theme_activated() ) {
			$path = plumbing_get_plugin_source_path( 'plugins/vc-extensions-bundle/vc-extensions-bundle.zip' );
			if ( ! empty( $path ) || plumbing_get_theme_setting( 'tgmpa_upload' ) ) {
				$list[] = array(
					'name'     => plumbing_storage_get_array( 'required_plugins', 'vc-extensions-bundle', 'title' ),
					'slug'     => 'vc-extensions-bundle',
					'source'   => ! empty( $path ) ? $path : 'upload://vc-extensions-bundle.zip',
					'version'  => '3.6.1',
					'required' => false,
				);
			}
		}
		return $list;
	}
}

// Check if VC Extensions installed and activated
if ( ! function_exists( 'plumbing_exists_vc_extensions' ) ) {
	function plumbing_exists_vc_extensions() {
		return class_exists( 'Vc_Manager' ) && class_exists( 'VC_Extensions_CQBundle' );
	}
}

// Enqueue styles for frontend
if ( ! function_exists( 'plumbing_vc_extensions_frontend_scripts' ) ) {
	
	function plumbing_vc_extensions_frontend_scripts() {
		if ( plumbing_is_on( plumbing_get_theme_option( 'debug_mode' ) ) ) {
			$plumbing_url = plumbing_get_file_url( 'plugins/vc-extensions-bundle/vc-extensions-bundle.css' );
			if ( '' != $plumbing_url ) {
				wp_enqueue_style( 'plumbing-vc-extensions-bundle', $plumbing_url, array(), null );
			}
		}
	}
}

// Merge custom styles
if ( ! function_exists( 'plumbing_vc_extensions_merge_styles' ) ) {
	
	function plumbing_vc_extensions_merge_styles( $list ) {
		$list[] = 'plugins/vc-extensions-bundle/vc-extensions-bundle.css';
		return $list;
	}
}


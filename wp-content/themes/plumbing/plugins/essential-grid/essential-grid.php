<?php
/* Essential Grid support functions
------------------------------------------------------------------------------- */


// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'plumbing_essential_grid_theme_setup9' ) ) {
	add_action( 'after_setup_theme', 'plumbing_essential_grid_theme_setup9', 9 );
	function plumbing_essential_grid_theme_setup9() {
		if ( plumbing_exists_essential_grid() ) {
			add_action( 'wp_enqueue_scripts', 'plumbing_essential_grid_frontend_scripts', 1100 );
			add_filter( 'plumbing_filter_merge_styles', 'plumbing_essential_grid_merge_styles' );
		}
		if ( is_admin() ) {
			add_filter( 'plumbing_filter_tgmpa_required_plugins', 'plumbing_essential_grid_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( ! function_exists( 'plumbing_essential_grid_tgmpa_required_plugins' ) ) {
	
	function plumbing_essential_grid_tgmpa_required_plugins( $list = array() ) {
		if ( plumbing_storage_isset( 'required_plugins', 'essential-grid' ) && plumbing_storage_get_array( 'required_plugins', 'essential-grid', 'install' ) !== false && plumbing_is_theme_activated() ) {
			$path = plumbing_get_plugin_source_path( 'plugins/essential-grid/essential-grid.zip' );
			if ( ! empty( $path ) || plumbing_get_theme_setting( 'tgmpa_upload' ) ) {
				$list[] = array(
					'name'     => plumbing_storage_get_array( 'required_plugins', 'essential-grid', 'title' ),
					'slug'     => 'essential-grid',
					'source'   => ! empty( $path ) ? $path : 'upload://essential-grid.zip',
					'version'  => '3.0.11',
					'required' => false,
				);
			}
		}
		return $list;
	}
}

// Check if plugin installed and activated
if ( ! function_exists( 'plumbing_exists_essential_grid' ) ) {
	function plumbing_exists_essential_grid() {
		return defined( 'EG_PLUGIN_PATH' );
	}
}

// Enqueue styles for frontend
if ( ! function_exists( 'plumbing_essential_grid_frontend_scripts' ) ) {
	
	function plumbing_essential_grid_frontend_scripts() {
		if ( plumbing_is_on( plumbing_get_theme_option( 'debug_mode' ) ) ) {
			$plumbing_url = plumbing_get_file_url( 'plugins/essential-grid/essential-grid.css' );
			if ( '' != $plumbing_url ) {
				wp_enqueue_style( 'plumbing-essential-grid', $plumbing_url, array(), null );
			}
		}
	}
}

// Merge custom styles
if ( ! function_exists( 'plumbing_essential_grid_merge_styles' ) ) {
	
	function plumbing_essential_grid_merge_styles( $list ) {
		$list[] = 'plugins/essential-grid/essential-grid.css';
		return $list;
	}
}


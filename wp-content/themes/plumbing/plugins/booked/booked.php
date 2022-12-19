<?php
/* Booked Appointments support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'plumbing_booked_theme_setup9' ) ) {
	add_action( 'after_setup_theme', 'plumbing_booked_theme_setup9', 9 );
	function plumbing_booked_theme_setup9() {
		if ( plumbing_exists_booked() ) {
			add_action( 'wp_enqueue_scripts', 'plumbing_booked_frontend_scripts', 1100 );
			add_filter( 'plumbing_filter_merge_styles', 'plumbing_booked_merge_styles' );
		}
		if ( is_admin() ) {
			add_filter( 'plumbing_filter_tgmpa_required_plugins', 'plumbing_booked_tgmpa_required_plugins' );
			add_filter( 'plumbing_filter_theme_plugins', 'plumbing_booked_theme_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( ! function_exists( 'plumbing_booked_tgmpa_required_plugins' ) ) {
	
	function plumbing_booked_tgmpa_required_plugins( $list = array() ) {
		if ( plumbing_storage_isset( 'required_plugins', 'booked' ) && plumbing_storage_get_array( 'required_plugins', 'booked', 'install' ) !== false && plumbing_is_theme_activated() ) {
			$path = plumbing_get_plugin_source_path( 'plugins/booked/booked.zip' );
			if ( ! empty( $path ) || plumbing_get_theme_setting( 'tgmpa_upload' ) ) {
				$list[] = array(
					'name'     => plumbing_storage_get_array( 'required_plugins', 'booked', 'title' ),
					'slug'     => 'booked',
					'source'   => ! empty( $path ) ? $path : 'upload://booked.zip',
					'version'  => '2.3',
					'required' => false,
				);
			}
			$path = plumbing_get_plugin_source_path( 'plugins/booked/booked-calendar-feeds.zip' );
			
		}
		return $list;
	}
}

// Filter theme-supported plugins list
if ( ! function_exists( 'plumbing_booked_theme_plugins' ) ) {
	
	function plumbing_booked_theme_plugins( $list = array() ) {
		if ( ! empty( $list['booked']['group'] ) ) {
			foreach ( $list as $k => $v ) {
				if ( substr( $k, 0, 6 ) == 'booked' ) {
					if ( empty( $v['group'] ) ) {
						$list[ $k ]['group'] = $list['booked']['group'];
					}
					if ( ! empty( $list['booked']['logo'] ) ) {
						$list[ $k ]['logo'] = strpos( $list['booked']['logo'], '//' ) !== false
												? $list['booked']['logo']
												: plumbing_get_file_url( "plugins/booked/{$list['booked']['logo']}" );
					}
				}
			}
		}
		return $list;
	}
}



// Check if plugin installed and activated
if ( ! function_exists( 'plumbing_exists_booked' ) ) {
	function plumbing_exists_booked() {
		return class_exists( 'booked_plugin' );
	}
}


// Enqueue styles for frontend
if ( ! function_exists( 'plumbing_booked_frontend_scripts' ) ) {
	
	function plumbing_booked_frontend_scripts() {
		if ( plumbing_is_on( plumbing_get_theme_option( 'debug_mode' ) ) ) {
			$plumbing_url = plumbing_get_file_url( 'plugins/booked/booked.css' );
			if ( '' != $plumbing_url ) {
				wp_enqueue_style( 'plumbing-booked', $plumbing_url, array(), null );
			}
		}
	}
}


// Merge custom styles
if ( ! function_exists( 'plumbing_booked_merge_styles' ) ) {
	
	function plumbing_booked_merge_styles( $list ) {
		$list[] = 'plugins/booked/booked.css';
		return $list;
	}
}


// Add plugin-specific colors and fonts to the custom CSS
if ( plumbing_exists_booked() ) {
	require_once PLUMBING_THEME_DIR . 'plugins/booked/booked-styles.php';
}

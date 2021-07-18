<?php
/* Mail Chimp support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'plumbing_mailchimp_theme_setup9' ) ) {
	add_action( 'after_setup_theme', 'plumbing_mailchimp_theme_setup9', 9 );
	function plumbing_mailchimp_theme_setup9() {
		if ( plumbing_exists_mailchimp() ) {
			add_action( 'wp_enqueue_scripts', 'plumbing_mailchimp_frontend_scripts', 1100 );
			add_filter( 'plumbing_filter_merge_styles', 'plumbing_mailchimp_merge_styles' );
		}
		if ( is_admin() ) {
			add_filter( 'plumbing_filter_tgmpa_required_plugins', 'plumbing_mailchimp_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( ! function_exists( 'plumbing_mailchimp_tgmpa_required_plugins' ) ) {
	
	function plumbing_mailchimp_tgmpa_required_plugins( $list = array() ) {
		if ( plumbing_storage_isset( 'required_plugins', 'mailchimp-for-wp' ) && plumbing_storage_get_array( 'required_plugins', 'mailchimp-for-wp', 'install' ) !== false ) {
			$list[] = array(
				'name'     => plumbing_storage_get_array( 'required_plugins', 'mailchimp-for-wp', 'title' ),
				'slug'     => 'mailchimp-for-wp',
				'required' => false,
			);
		}
		return $list;
	}
}

// Check if plugin installed and activated
if ( ! function_exists( 'plumbing_exists_mailchimp' ) ) {
	function plumbing_exists_mailchimp() {
		return function_exists( '__mc4wp_load_plugin' ) || defined( 'MC4WP_VERSION' );
	}
}



// Custom styles and scripts
//------------------------------------------------------------------------

// Enqueue styles for frontend
if ( ! function_exists( 'plumbing_mailchimp_frontend_scripts' ) ) {
	
	function plumbing_mailchimp_frontend_scripts() {
		if ( plumbing_is_on( plumbing_get_theme_option( 'debug_mode' ) ) ) {
			$plumbing_url = plumbing_get_file_url( 'plugins/mailchimp-for-wp/mailchimp-for-wp.css' );
			if ( '' != $plumbing_url ) {
				wp_enqueue_style( 'plumbing-mailchimp', $plumbing_url, array(), null );
			}
		}
	}
}

// Merge custom styles
if ( ! function_exists( 'plumbing_mailchimp_merge_styles' ) ) {
	
	function plumbing_mailchimp_merge_styles( $list ) {
		$list[] = 'plugins/mailchimp-for-wp/mailchimp-for-wp.css';
		return $list;
	}
}


// Add plugin-specific colors and fonts to the custom CSS
if ( plumbing_exists_mailchimp() ) {
	require_once PLUMBING_THEME_DIR . 'plugins/mailchimp-for-wp/mailchimp-for-wp-styles.php'; }


<?php
/* twenty20 support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'plumbing_twenty20_theme_setup9' ) ) {
	add_action( 'after_setup_theme', 'plumbing_twenty20_theme_setup9', 9 );
	function plumbing_twenty20_theme_setup9() {
		if ( is_admin() ) {
			add_filter( 'plumbing_filter_tgmpa_required_plugins', 'plumbing_twenty20_tgmpa_required_plugins' );
            remove_action('admin_footer','twenty20_popup_on_select');
            remove_action('admin_footer','twenty20_help_popup');
		}
	}
}

// Filter to add in the required plugins list
if ( ! function_exists( 'plumbing_twenty20_tgmpa_required_plugins' ) ) {
	
	function plumbing_twenty20_tgmpa_required_plugins( $list = array() ) {
		if ( plumbing_storage_isset( 'required_plugins', 'twenty20' ) ) {
			// twenty20 plugin
			$list[] = array(
				'name'     => plumbing_storage_get_array( 'required_plugins', 'twenty20', 'title' ),
				'slug'     => 'twenty20',
				'required' => false,
			);
		}
		return $list;
	}
}

// Check if twenty20 installed and activated
if ( ! function_exists( 'plumbing_exists_twenty20' ) ) {
	function plumbing_exists_twenty20() {
		return class_exists( 'ZB_T20_VER' );
	}
}

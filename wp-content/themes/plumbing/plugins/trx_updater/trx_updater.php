<?php
/* ThemeREX Updater support functions
------------------------------------------------------------------------------- */


// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'plumbing_trx_updater_theme_setup9' ) ) {
    add_action( 'after_setup_theme', 'plumbing_trx_updater_theme_setup9', 9 );
    function plumbing_trx_updater_theme_setup9() {
        if ( is_admin() ) {
            add_filter( 'plumbing_filter_tgmpa_required_plugins', 'plumbing_trx_updater_tgmpa_required_plugins', 8 );
        }
    }
}

// Filter to add in the required plugins list
// Priority 8 is used to add this plugin before all other plugins
if ( ! function_exists( 'plumbing_trx_updater_tgmpa_required_plugins' ) ) {
    
    function plumbing_trx_updater_tgmpa_required_plugins( $list = array() ) {
        if ( plumbing_storage_isset( 'required_plugins', 'trx_updater' ) && plumbing_storage_get_array( 'required_plugins', 'trx_updater', 'install' ) !== false && plumbing_is_theme_activated() ) {
            $path = plumbing_get_plugin_source_path( 'plugins/trx_updater/trx_updater.zip' );
            if ( ! empty( $path ) || plumbing_get_theme_setting( 'tgmpa_upload' ) ) {
                $list[] = array(
                    'name'     => plumbing_storage_get_array( 'required_plugins', 'trx_updater', 'title' ),
                    'slug'     => 'trx_updater',
                    'source'   => ! empty( $path ) ? $path : 'upload://trx_updater.zip',
                    'version'  => '1.5.5',
                    'required' => false,
                );
            }
        }
        return $list;
    }
}

// Check if plugin installed and activated
if ( ! function_exists( 'plumbing_exists_trx_updater' ) ) {
    function plumbing_exists_trx_updater() {
        return defined( 'TRX_UPDATER_VERSION' );
    }
}

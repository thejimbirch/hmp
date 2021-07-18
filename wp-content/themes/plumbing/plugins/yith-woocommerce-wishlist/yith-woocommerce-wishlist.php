<?php

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'plumbing_yith_wcwl_wishlist_theme_setup9' ) ) {
    add_action( 'after_setup_theme', 'plumbing_yith_wcwl_wishlist_theme_setup9', 9 );
    function plumbing_yith_wcwl_wishlist_theme_setup9() {
        if ( is_admin() ) {
            add_filter( 'plumbing_filter_tgmpa_required_plugins', 'plumbing_yith_wcwl_wishlist_tgmpa_required_plugins' );
        }
    }
}

// Filter to add in the required plugins list
if ( ! function_exists( 'plumbing_yith_wcwl_wishlist_tgmpa_required_plugins' ) ) {
    
    function plumbing_yith_wcwl_wishlist_tgmpa_required_plugins( $list = array() ) {
        if ( plumbing_storage_isset( 'required_plugins', 'yith-woocommerce-wishlist' ) && plumbing_storage_get_array( 'required_plugins', 'yith-woocommerce-wishlist', 'install' ) !== false ) {
            $list[] = array(
                'name'     => plumbing_storage_get_array( 'required_plugins', 'yith-woocommerce-wishlist', 'title' ),
                'slug'     => 'yith-woocommerce-wishlist',
                'required' => false,
            );
        }
        return $list;
    }
}

// Check if plugin installed and activated
if ( ! function_exists( 'plumbing_exists_yith_wcwl_wishlist' ) ) {
    function plumbing_exists_yith_wcwl_wishlist() {
        return class_exists( 'YITH_WCWL' );
    }
}

// Set plugin's specific importer options
if ( !function_exists( 'plumbing_yith_wcwl_wishlist_importer_set_options' ) ) {
    if (is_admin()) add_filter( 'trx_addons_filter_importer_options',    'plumbing_yith_wcwl_wishlist_importer_set_options' );
    function plumbing_yith_wcwl_wishlist_importer_set_options($options=array()) {
        if ( plumbing_exists_yith_wcwl_wishlist() && in_array('yith-woocommerce-wishlist', $options['required_plugins']) ) {
            $options['additional_options'][]    = 'yith_wcwl_%';
        }
        return $options;
    }
}

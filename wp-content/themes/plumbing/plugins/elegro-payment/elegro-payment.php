<?php
/* Elegro Crypto Payment support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'plumbing_elegro_payment_theme_setup9' ) ) {
    add_action( 'after_setup_theme', 'plumbing_elegro_payment_theme_setup9', 9 );
    function plumbing_elegro_payment_theme_setup9() {
        if ( plumbing_exists_elegro_payment() ) {
            add_filter( 'plumbing_filter_merge_styles', 'plumbing_elegro_payment_merge_styles' );
        }
        if ( is_admin() ) {
            add_filter( 'plumbing_filter_tgmpa_required_plugins', 'plumbing_elegro_payment_tgmpa_required_plugins' );
        }
    }
}

// Filter to add in the required plugins list
if ( ! function_exists( 'plumbing_elegro_payment_tgmpa_required_plugins' ) ) {

    function plumbing_elegro_payment_tgmpa_required_plugins( $list = array() ) {
        if ( plumbing_storage_isset( 'required_plugins', 'elegro-payment' ) && plumbing_storage_get_array( 'required_plugins', 'elegro-payment', 'install' ) !== false ) {
            // Elegro plugin
            $list[] = array(
                'name'     => plumbing_storage_get_array( 'required_plugins', 'elegro-payment', 'title' ),
                'slug'     => 'elegro-payment',
                'required' => false,
            );

        }
        return $list;
    }
}

// Check if this plugin installed and activated
if ( ! function_exists( 'plumbing_exists_elegro_payment' ) ) {
    function plumbing_exists_elegro_payment() {
        return class_exists( 'WC_Elegro_Payment' );
    }
}

// Merge custom styles
if ( ! function_exists( 'plumbing_elegro_payment_merge_styles' ) ) {
    function plumbing_elegro_payment_merge_styles( $list ) {
        $list[] = 'plugins/elegro-payment/_elegro-payment.scss';
        return $list;
    }
}
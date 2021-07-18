<?php
/* YITH WooCommerce Сompare support functions
------------------------------------------------------------------------------- */

// Check if plugin installed and activated
if ( ! function_exists( 'plumbing_exists_yith_woocommerce_compare' ) ) {
    function plumbing_exists_yith_woocommerce_compare() {
        return class_exists( 'YITH_WOOCOMPARE' );
    }
}

if (!function_exists('plumbing_yith_woocommerce_compare_theme_setup9')) {
	add_action('after_setup_theme', 'plumbing_yith_woocommerce_compare_theme_setup9', 9);
	function plumbing_yith_woocommerce_compare_theme_setup9() {
		if (is_admin()) {
			add_filter( 'plumbing_filter_tgmpa_required_plugins',		'plumbing_yith_woocommerce_compare_tgmpa_required_plugins' );
		}
	}
}


// Filter to add in the required plugins list
if ( !function_exists( 'plumbing_yith_woocommerce_compare_tgmpa_required_plugins' ) ) {
	function plumbing_yith_woocommerce_compare_tgmpa_required_plugins($list=array()) {
        if (plumbing_storage_isset('required_plugins', 'yith-woocommerce-compare')) {
			$list[] = array(
				'name' 		=> esc_html__('YITH WooCommerce Сompare', 'plumbing'),
				'slug' 		=> 'yith-woocommerce-compare',
				'required' 	=> false
			);

		}
		return $list;
	}
}

// Set plugin's specific importer options
if ( !function_exists( 'plumbing_yith_woocommerce_compare_importer_set_options' ) ) {
    if (is_admin()) add_filter( 'trx_addons_filter_importer_options',    'plumbing_yith_woocommerce_compare_importer_set_options' );
    function plumbing_yith_woocommerce_compare_importer_set_options($options=array()) {
        if ( plumbing_exists_yith_woocommerce_compare() && in_array('yith-woocommerce-compare', $options['required_plugins']) ) {
            $options['additional_options'][]    = 'yith_woocompare_%';
        }
        return $options;
    }
}
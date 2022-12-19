<?php
/**
 * Shortcode: Content container (Gutenberg support)
 *
 * @package WordPress
 * @subpackage ThemeREX Addons
 * @since v1.4.3
 */

// Don't load directly
if ( ! defined( 'TRX_ADDONS_VERSION' ) ) {
	die( '-1' );
}


// Gutenberg Block
//------------------------------------------------------

// Add scripts and styles for the editor
if ( ! function_exists( 'trx_addons_gutenberg_sc_title_editor_assets' ) ) {
	add_action( 'enqueue_block_editor_assets', 'trx_addons_gutenberg_sc_title_editor_assets' );
	function trx_addons_gutenberg_sc_title_editor_assets() {
		if ( trx_addons_exists_gutenberg() && trx_addons_get_setting( 'allow_gutenberg_blocks' ) ) {
			// Scripts
			wp_enqueue_script(
				'trx-addons-gutenberg-editor-block-title',
				trx_addons_get_file_url( TRX_ADDONS_PLUGIN_SHORTCODES . 'title/gutenberg/title.gutenberg-editor.js' ),
				array( 'wp-blocks', 'wp-editor', 'wp-i18n', 'wp-element', 'trx_addons-admin', 'trx_addons-utils', 'trx_addons-gutenberg-blocks' ),
				filemtime( trx_addons_get_file_dir( TRX_ADDONS_PLUGIN_SHORTCODES . 'title/gutenberg/title.gutenberg-editor.js' ) ),
				true
			);
		}
	}
}

// Block register
if ( ! function_exists( 'trx_addons_sc_title_add_in_gutenberg' ) ) {
	add_action( 'init', 'trx_addons_sc_title_add_in_gutenberg' );
	function trx_addons_sc_title_add_in_gutenberg() {
		if ( trx_addons_exists_gutenberg() && trx_addons_get_setting( 'allow_gutenberg_blocks' ) ) {
			register_block_type(
				'trx-addons/title', array(
					'attributes'      => array_merge(
						trx_addons_gutenberg_get_param_title(),
						trx_addons_gutenberg_get_param_button(),
						trx_addons_gutenberg_get_param_id()
					),
					'render_callback' => 'trx_addons_gutenberg_sc_title_render_block',
				)
			);
		}
	}
}

// Block render
if ( ! function_exists( 'trx_addons_gutenberg_sc_title_render_block' ) ) {
	function trx_addons_gutenberg_sc_title_render_block( $attributes = array() ) {
		return trx_addons_sc_title( $attributes );
	}
}

// Return list of allowed layouts
if ( ! function_exists( 'trx_addons_gutenberg_sc_title_get_layouts' ) ) {
	add_filter( 'trx_addons_filter_gutenberg_sc_layouts', 'trx_addons_gutenberg_sc_title_get_layouts', 10, 1 );
	function trx_addons_gutenberg_sc_title_get_layouts( $array = array() ) {
		$array['sc_title'] = apply_filters( 'trx_addons_sc_type', trx_addons_components_get_allowed_layouts( 'sc', 'title' ), 'trx_sc_title' );
		return $array;
	}
}


// Add shortcode's specific lists to the JS storage
if ( ! function_exists( 'trx_addons_sc_title_gutenberg_sc_params' ) ) {
	add_filter( 'trx_addons_filter_gutenberg_sc_params', 'trx_addons_sc_title_gutenberg_sc_params' );
	function trx_addons_sc_title_gutenberg_sc_params( $vars = array() ) {
		
		// Return list of the title tags
		$vars['sc_title_tags'] = trx_addons_get_list_sc_title_tags( '', true );

		return $vars;
	}
}

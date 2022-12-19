<?php
/**
 * The template to display default site header
 *
 * @package WordPress
 * @subpackage PLUMBING
 * @since PLUMBING 1.0
 */

$plumbing_header_css   = '';
$plumbing_header_image = get_header_image();
$plumbing_header_video = plumbing_get_header_video();
if ( ! empty( $plumbing_header_image ) && plumbing_trx_addons_featured_image_override( is_singular() || plumbing_storage_isset( 'blog_archive' ) || is_category() ) ) {
	$plumbing_header_image = plumbing_get_current_mode_image( $plumbing_header_image );
}

?><header class="top_panel top_panel_default
	<?php
	echo ! empty( $plumbing_header_image ) || ! empty( $plumbing_header_video ) ? ' with_bg_image' : ' without_bg_image';
	if ( '' != $plumbing_header_video ) {
		echo ' with_bg_video';
	}
	if ( '' != $plumbing_header_image ) {
		echo ' ' . esc_attr( plumbing_add_inline_css_class( 'background-image: url(' . esc_url( $plumbing_header_image ) . ');' ) );
	}
	if ( is_single() && has_post_thumbnail() ) {
		echo ' with_featured_image';
	}
	if ( plumbing_is_on( plumbing_get_theme_option( 'header_fullheight' ) ) ) {
		echo ' header_fullheight plumbing-full-height';
	}
	$plumbing_header_scheme = plumbing_get_theme_option( 'header_scheme' );
	if ( ! empty( $plumbing_header_scheme ) && ! plumbing_is_inherit( $plumbing_header_scheme  ) ) {
		echo ' scheme_' . esc_attr( $plumbing_header_scheme );
	}
	?>
">
	<?php

	// Background video
	if ( ! empty( $plumbing_header_video ) ) {
		get_template_part( apply_filters( 'plumbing_filter_get_template_part', 'templates/header-video' ) );
	}

	// Main menu
	if ( plumbing_get_theme_option( 'menu_style' ) == 'top' ) {
		get_template_part( apply_filters( 'plumbing_filter_get_template_part', 'templates/header-navi' ) );
	}

	// Mobile header
	if ( plumbing_is_on( plumbing_get_theme_option( 'header_mobile_enabled' ) ) ) {
		get_template_part( apply_filters( 'plumbing_filter_get_template_part', 'templates/header-mobile' ) );
	}

	if ( !is_single() || ( plumbing_get_theme_option( 'post_header_position' ) == 'default' && plumbing_get_theme_option( 'post_thumbnail_type' ) == 'default' ) ) {
		// Page title and breadcrumbs area
		get_template_part( apply_filters( 'plumbing_filter_get_template_part', 'templates/header-title' ) );

		// Display featured image in the header on the single posts
		// Comment next line to prevent show featured image in the header area
		// and display it in the post's content
		get_template_part( apply_filters( 'plumbing_filter_get_template_part', 'templates/header-single' ) );
	}

	// Header widgets area
	get_template_part( apply_filters( 'plumbing_filter_get_template_part', 'templates/header-widgets' ) );
	?>
</header>

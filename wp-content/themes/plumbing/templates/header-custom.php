<?php
/**
 * The template to display custom header from the ThemeREX Addons Layouts
 *
 * @package WordPress
 * @subpackage PLUMBING
 * @since PLUMBING 1.0.06
 */

$plumbing_header_css   = '';
$plumbing_header_image = get_header_image();
$plumbing_header_video = plumbing_get_header_video();
if ( ! empty( $plumbing_header_image ) && plumbing_trx_addons_featured_image_override( is_singular() || plumbing_storage_isset( 'blog_archive' ) || is_category() ) ) {
	$plumbing_header_image = plumbing_get_current_mode_image( $plumbing_header_image );
}

$plumbing_header_id = plumbing_get_custom_header_id();
$plumbing_header_meta = get_post_meta( $plumbing_header_id, 'trx_addons_options', true );
if ( ! empty( $plumbing_header_meta['margin'] ) ) {
	plumbing_add_inline_css( sprintf( '.page_content_wrap{padding-top:%s}', esc_attr( plumbing_prepare_css_value( $plumbing_header_meta['margin'] ) ) ) );
}

?><header class="top_panel top_panel_custom top_panel_custom_<?php echo esc_attr( $plumbing_header_id ); ?> top_panel_custom_<?php echo esc_attr( sanitize_title( get_the_title( $plumbing_header_id ) ) ); ?>
				<?php
				echo ! empty( $plumbing_header_image ) || ! empty( $plumbing_header_video )
					? ' with_bg_image'
					: ' without_bg_image';
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

	// Custom header's layout
	do_action( 'plumbing_action_show_layout', $plumbing_header_id );

	// Header widgets area
	get_template_part( apply_filters( 'plumbing_filter_get_template_part', 'templates/header-widgets' ) );

	?>
</header>

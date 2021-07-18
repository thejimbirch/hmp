<?php
/**
 * The template to display default site footer
 *
 * @package WordPress
 * @subpackage PLUMBING
 * @since PLUMBING 1.0.10
 */

$plumbing_footer_id = plumbing_get_custom_footer_id();
$plumbing_footer_meta = get_post_meta( $plumbing_footer_id, 'trx_addons_options', true );
if ( ! empty( $plumbing_footer_meta['margin'] ) ) {
	plumbing_add_inline_css( sprintf( '.page_content_wrap{padding-bottom:%s}', esc_attr( plumbing_prepare_css_value( $plumbing_footer_meta['margin'] ) ) ) );
}
?>
<footer class="footer_wrap footer_custom footer_custom_<?php echo esc_attr( $plumbing_footer_id ); ?> footer_custom_<?php echo esc_attr( sanitize_title( get_the_title( $plumbing_footer_id ) ) ); ?>
						<?php
						$plumbing_footer_scheme = plumbing_get_theme_option( 'footer_scheme' );
						if ( ! empty( $plumbing_footer_scheme ) && ! plumbing_is_inherit( $plumbing_footer_scheme  ) ) {
							echo ' scheme_' . esc_attr( $plumbing_footer_scheme );
						}
						?>
						">
	<?php
	// Custom footer's layout
	do_action( 'plumbing_action_show_layout', $plumbing_footer_id );
	?>
</footer><!-- /.footer_wrap -->

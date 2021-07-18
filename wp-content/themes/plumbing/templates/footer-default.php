<?php
/**
 * The template to display default site footer
 *
 * @package WordPress
 * @subpackage PLUMBING
 * @since PLUMBING 1.0.10
 */

?>
<footer class="footer_wrap footer_default
<?php
$plumbing_footer_scheme = plumbing_get_theme_option( 'footer_scheme' );
if ( ! empty( $plumbing_footer_scheme ) && ! plumbing_is_inherit( $plumbing_footer_scheme  ) ) {
	echo ' scheme_' . esc_attr( $plumbing_footer_scheme );
}
?>
				">
	<?php

	// Footer widgets area
	get_template_part( apply_filters( 'plumbing_filter_get_template_part', 'templates/footer-widgets' ) );

	// Logo
	get_template_part( apply_filters( 'plumbing_filter_get_template_part', 'templates/footer-logo' ) );

	// Socials
	get_template_part( apply_filters( 'plumbing_filter_get_template_part', 'templates/footer-socials' ) );

	// Menu
	get_template_part( apply_filters( 'plumbing_filter_get_template_part', 'templates/footer-menu' ) );

	// Copyright area
	get_template_part( apply_filters( 'plumbing_filter_get_template_part', 'templates/footer-copyright' ) );

	?>
</footer><!-- /.footer_wrap -->

<?php
/**
 * The template to display the site logo in the footer
 *
 * @package WordPress
 * @subpackage PLUMBING
 * @since PLUMBING 1.0.10
 */

// Logo
if ( plumbing_is_on( plumbing_get_theme_option( 'logo_in_footer' ) ) ) {
	$plumbing_logo_image = plumbing_get_logo_image( 'footer' );
	$plumbing_logo_text  = get_bloginfo( 'name' );
	if ( ! empty( $plumbing_logo_image['logo'] ) || ! empty( $plumbing_logo_text ) ) {
		?>
		<div class="footer_logo_wrap">
			<div class="footer_logo_inner">
				<?php
				if ( ! empty( $plumbing_logo_image['logo'] ) ) {
					$plumbing_attr = plumbing_getimagesize( $plumbing_logo_image['logo'] );
					echo '<a href="' . esc_url( home_url( '/' ) ) . '">'
							. '<img src="' . esc_url( $plumbing_logo_image['logo'] ) . '"'
								. ( ! empty( $plumbing_logo_image['logo_retina'] ) ? ' srcset="' . esc_url( $plumbing_logo_image['logo_retina'] ) . ' 2x"' : '' )
								. ' class="logo_footer_image"'
								. ' alt="' . esc_attr__( 'Site logo', 'plumbing' ) . '"'
								. ( ! empty( $plumbing_attr[3] ) ? ' ' . wp_kses_data( $plumbing_attr[3] ) : '' )
							. '>'
						. '</a>';
				} elseif ( ! empty( $plumbing_logo_text ) ) {
					echo '<h1 class="logo_footer_text">'
							. '<a href="' . esc_url( home_url( '/' ) ) . '">'
								. esc_html( $plumbing_logo_text )
							. '</a>'
						. '</h1>';
				}
				?>
			</div>
		</div>
		<?php
	}
}

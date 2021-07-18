<?php
/**
 * The template to display the logo or the site name and the slogan in the Header
 *
 * @package WordPress
 * @subpackage PLUMBING
 * @since PLUMBING 1.0
 */

$plumbing_args = get_query_var( 'plumbing_logo_args' );

// Site logo
$plumbing_logo_type   = isset( $plumbing_args['type'] ) ? $plumbing_args['type'] : '';
$plumbing_logo_image  = plumbing_get_logo_image( $plumbing_logo_type );
$plumbing_logo_text   = plumbing_is_on( plumbing_get_theme_option( 'logo_text' ) ) ? get_bloginfo( 'name' ) : '';
$plumbing_logo_slogan = get_bloginfo( 'description', 'display' );
if ( ! empty( $plumbing_logo_image['logo'] ) || ! empty( $plumbing_logo_text ) ) {
	?><a class="sc_layouts_logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
		<?php
		if ( ! empty( $plumbing_logo_image['logo'] ) ) {
			if ( empty( $plumbing_logo_type ) && function_exists( 'the_custom_logo' ) && (int) $plumbing_logo_image['logo'] > 0 ) {
				the_custom_logo();
			} else {
				$plumbing_attr = plumbing_getimagesize( $plumbing_logo_image['logo'] );
				echo '<img src="' . esc_url( $plumbing_logo_image['logo'] ) . '"'
						. ( ! empty( $plumbing_logo_image['logo_retina'] ) ? ' srcset="' . esc_url( $plumbing_logo_image['logo_retina'] ) . ' 2x"' : '' )
						. ' alt="' . esc_attr( $plumbing_logo_text ) . '"'
						. ( ! empty( $plumbing_attr[3] ) ? ' ' . wp_kses_data( $plumbing_attr[3] ) : '' )
						. '>';
			}
		} else {
			plumbing_show_layout( plumbing_prepare_macros( $plumbing_logo_text ), '<span class="logo_text">', '</span>' );
			plumbing_show_layout( plumbing_prepare_macros( $plumbing_logo_slogan ), '<span class="logo_slogan">', '</span>' );
		}
		?>
	</a>
	<?php
}

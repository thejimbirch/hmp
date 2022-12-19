<?php
/**
 * The template to display the socials in the footer
 *
 * @package WordPress
 * @subpackage PLUMBING
 * @since PLUMBING 1.0.10
 */


// Socials
if ( plumbing_is_on( plumbing_get_theme_option( 'socials_in_footer' ) ) ) {
	$plumbing_output = plumbing_get_socials_links();
	if ( '' != $plumbing_output ) {
		?>
		<div class="footer_socials_wrap socials_wrap">
			<div class="footer_socials_inner">
				<?php plumbing_show_layout( $plumbing_output ); ?>
			</div>
		</div>
		<?php
	}
}

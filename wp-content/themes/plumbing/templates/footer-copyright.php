<?php
/**
 * The template to display the copyright info in the footer
 *
 * @package WordPress
 * @subpackage PLUMBING
 * @since PLUMBING 1.0.10
 */

// Copyright area
?> 
<div class="footer_copyright_wrap
<?php
$plumbing_copyright_scheme = plumbing_get_theme_option( 'copyright_scheme' );
if ( ! empty( $plumbing_copyright_scheme ) && ! plumbing_is_inherit( $plumbing_copyright_scheme  ) ) {
	echo ' scheme_' . esc_attr( $plumbing_copyright_scheme );
}
?>
				">
	<div class="footer_copyright_inner">
		<div class="content_wrap">
			<div class="copyright_text">
			<?php
				$plumbing_copyright = plumbing_get_theme_option( 'copyright' );
			if ( ! empty( $plumbing_copyright ) ) {
				// Replace {{Y}} or {Y} with the current year
				$plumbing_copyright = str_replace( array( '{{Y}}', '{Y}' ), date( 'Y' ), $plumbing_copyright );
				// Replace {{...}} and ((...)) on the <i>...</i> and <b>...</b>
				$plumbing_copyright = plumbing_prepare_macros( $plumbing_copyright );
				// Display copyright
				echo wp_kses( nl2br( $plumbing_copyright ) , 'plumbing_kses_content' );
			}
			?>
			</div>
		</div>
	</div>
</div>

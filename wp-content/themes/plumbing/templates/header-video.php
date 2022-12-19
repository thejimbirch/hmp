<?php
/**
 * The template to display the background video in the header
 *
 * @package WordPress
 * @subpackage PLUMBING
 * @since PLUMBING 1.0.14
 */
$plumbing_header_video = plumbing_get_header_video();
$plumbing_embed_video  = '';
if ( ! empty( $plumbing_header_video ) && ! plumbing_is_from_uploads( $plumbing_header_video ) ) {
	if ( plumbing_is_youtube_url( $plumbing_header_video ) && preg_match( '/[=\/]([^=\/]*)$/', $plumbing_header_video, $matches ) && ! empty( $matches[1] ) ) {
		?><div id="background_video" data-youtube-code="<?php echo esc_attr( $matches[1] ); ?>"></div>
		<?php
	} else {
		?>
		<div id="background_video"><?php plumbing_show_layout( plumbing_get_embed_video( $plumbing_header_video ) ); ?></div>
		<?php
	}
}

<?php
/**
 * The template to display the featured image in the single post
 *
 * @package WordPress
 * @subpackage PLUMBING
 * @since PLUMBING 1.0
 */

if ( get_query_var( 'plumbing_header_image' ) == '' && plumbing_trx_addons_featured_image_override( is_singular() && has_post_thumbnail() && in_array( get_post_type(), array( 'post', 'page' ) ) ) ) {
	$plumbing_src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
	if ( ! empty( $plumbing_src[0] ) ) {
		plumbing_sc_layouts_showed( 'featured', true );
		?>
		<div class="sc_layouts_featured with_image without_content <?php echo esc_attr( plumbing_add_inline_css_class( 'background-image:url(' . esc_url( $plumbing_src[0] ) . ');' ) ); ?>"></div>
		<?php
	}
}

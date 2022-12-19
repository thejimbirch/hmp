<?php
/**
 * The custom template to display the content
 *
 * Used for index/archive/search.
 *
 * @package WordPress
 * @subpackage PLUMBING
 * @since PLUMBING 1.0.50
 */

$plumbing_template_args = get_query_var( 'plumbing_template_args' );
if ( is_array( $plumbing_template_args ) ) {
	$plumbing_columns    = empty( $plumbing_template_args['columns'] ) ? 2 : max( 1, $plumbing_template_args['columns'] );
	$plumbing_blog_style = array( $plumbing_template_args['type'], $plumbing_columns );
} else {
	$plumbing_blog_style = explode( '_', plumbing_get_theme_option( 'blog_style' ) );
	$plumbing_columns    = empty( $plumbing_blog_style[1] ) ? 2 : max( 1, $plumbing_blog_style[1] );
}
$plumbing_blog_id       = plumbing_get_custom_blog_id( join( '_', $plumbing_blog_style ) );
$plumbing_blog_style[0] = str_replace( 'blog-custom-', '', $plumbing_blog_style[0] );
$plumbing_expanded      = ! plumbing_sidebar_present() && plumbing_is_on( plumbing_get_theme_option( 'expand_content' ) );
$plumbing_animation     = plumbing_get_theme_option( 'blog_animation' );
$plumbing_components    = plumbing_array_get_keys_by_value( plumbing_get_theme_option( 'meta_parts' ) );

$plumbing_post_format   = get_post_format();
$plumbing_post_format   = empty( $plumbing_post_format ) ? 'standard' : str_replace( 'post-format-', '', $plumbing_post_format );

$plumbing_blog_meta     = plumbing_get_custom_layout_meta( $plumbing_blog_id );
$plumbing_custom_style  = ! empty( $plumbing_blog_meta['scripts_required'] ) ? $plumbing_blog_meta['scripts_required'] : 'none';

if ( ! empty( $plumbing_template_args['slider'] ) || $plumbing_columns > 1 || ! plumbing_is_off( $plumbing_custom_style ) ) {
	?><div class="
		<?php
		if ( ! empty( $plumbing_template_args['slider'] ) ) {
			echo 'slider-slide swiper-slide';
		} else {
			echo ( plumbing_is_off( $plumbing_custom_style ) ? 'column' : sprintf( '%1$s_item %1$s_item', $plumbing_custom_style ) ) . '-1_' . esc_attr( $plumbing_columns );
		}
		?>
	">
	<?php
}
?>
<article id="post-<?php the_ID(); ?>" data-post-id="<?php the_ID(); ?>"
	<?php
	post_class(
			'post_item post_format_' . esc_attr( $plumbing_post_format )
					. ' post_layout_custom post_layout_custom_' . esc_attr( $plumbing_columns )
					. ' post_layout_' . esc_attr( $plumbing_blog_style[0] )
					. ' post_layout_' . esc_attr( $plumbing_blog_style[0] ) . '_' . esc_attr( $plumbing_columns )
					. ( ! plumbing_is_off( $plumbing_custom_style )
						? ' post_layout_' . esc_attr( $plumbing_custom_style )
							. ' post_layout_' . esc_attr( $plumbing_custom_style ) . '_' . esc_attr( $plumbing_columns )
						: ''
						)
		);
	echo ( ! plumbing_is_off( $plumbing_animation ) && empty( $plumbing_template_args['slider'] ) ? ' data-animation="' . esc_attr( plumbing_get_animation_classes( $plumbing_animation ) ) . '"' : '' );
	?>
>
	<?php
	// Sticky label
	if ( is_sticky() && ! is_paged() ) {
		?>
		<span class="post_label label_sticky"></span>
		<?php
	}
	// Custom layout
	do_action( 'plumbing_action_show_layout', $plumbing_blog_id );
	?>
</article><?php
if ( ! empty( $plumbing_template_args['slider'] ) || $plumbing_columns > 1 || ! plumbing_is_off( $plumbing_custom_style ) ) {
	?></div><?php
	// Need opening PHP-tag above just after </div>, because <div> is a inline-block element (used as column)!
}

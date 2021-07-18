<?php
/**
 * The Portfolio template to display the content
 *
 * Used for index/archive/search.
 *
 * @package WordPress
 * @subpackage PLUMBING
 * @since PLUMBING 1.0
 */

$plumbing_template_args = get_query_var( 'plumbing_template_args' );
if ( is_array( $plumbing_template_args ) ) {
	$plumbing_columns    = empty( $plumbing_template_args['columns'] ) ? 2 : max( 1, $plumbing_template_args['columns'] );
	$plumbing_blog_style = array( $plumbing_template_args['type'], $plumbing_columns );
} else {
	$plumbing_blog_style = explode( '_', plumbing_get_theme_option( 'blog_style' ) );
	$plumbing_columns    = empty( $plumbing_blog_style[1] ) ? 2 : max( 1, $plumbing_blog_style[1] );
}
$plumbing_post_format = get_post_format();
$plumbing_post_format = empty( $plumbing_post_format ) ? 'standard' : str_replace( 'post-format-', '', $plumbing_post_format );
$plumbing_animation   = plumbing_get_theme_option( 'blog_animation' );

?><div class="
<?php
if ( ! empty( $plumbing_template_args['slider'] ) ) {
	echo ' slider-slide swiper-slide';
} else {
	echo 'masonry_item masonry_item-1_' . esc_attr( $plumbing_columns );
}
?>
"><article id="post-<?php the_ID(); ?>" 
	<?php
	post_class(
		'post_item post_format_' . esc_attr( $plumbing_post_format )
		. ' post_layout_portfolio'
		. ' post_layout_portfolio_' . esc_attr( $plumbing_columns )
		. ( is_sticky() && ! is_paged() ? ' sticky' : '' )
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

	$plumbing_image_hover = ! empty( $plumbing_template_args['hover'] ) && ! plumbing_is_inherit( $plumbing_template_args['hover'] )
								? $plumbing_template_args['hover']
								: plumbing_get_theme_option( 'image_hover' );
	// Featured image
	plumbing_show_post_featured(
		array(
			'hover'         => $plumbing_image_hover,
			'no_links'      => ! empty( $plumbing_template_args['no_links'] ),
			'thumb_size'    => plumbing_get_thumb_size(
				strpos( plumbing_get_theme_option( 'body_style' ), 'full' ) !== false || $plumbing_columns < 3
								? 'masonry-big'
				: 'masonry'
			),
			'show_no_image' => true,
			'class'         => 'dots' == $plumbing_image_hover ? 'hover_with_info' : '',
			'post_info'     => 'dots' == $plumbing_image_hover ? '<div class="post_info">' . esc_html( get_the_title() ) . '</div>' : '',
		)
	);
	?>
</article></div><?php
// Need opening PHP-tag above, because <article> is a inline-block element (used as column)!
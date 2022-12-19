<?php
/**
 * The Gallery template to display posts
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
$plumbing_image       = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );

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
		. ' post_layout_gallery'
		. ' post_layout_gallery_' . esc_attr( $plumbing_columns )
	);
	echo ( ! plumbing_is_off( $plumbing_animation ) && empty( $plumbing_template_args['slider'] ) ? ' data-animation="' . esc_attr( plumbing_get_animation_classes( $plumbing_animation ) ) . '"' : '' );
	?>
	data-size="
		<?php
		if ( ! empty( $plumbing_image[1] ) && ! empty( $plumbing_image[2] ) ) {
			echo intval( $plumbing_image[1] ) . 'x' . intval( $plumbing_image[2] );}
		?>
	"
	data-src="
		<?php
		if ( ! empty( $plumbing_image[0] ) ) {
			echo esc_url( $plumbing_image[0] );}
		?>
	"
>
<?php

	// Sticky label
if ( is_sticky() && ! is_paged() ) {
	?>
		<span class="post_label label_sticky"></span>
		<?php
}

	// Featured image
	$plumbing_image_hover = 'icon';  
if ( in_array( $plumbing_image_hover, array( 'icons', 'zoom' ) ) ) {
	$plumbing_image_hover = 'dots';
}
$plumbing_components = plumbing_array_get_keys_by_value( plumbing_get_theme_option( 'meta_parts' ) );
plumbing_show_post_featured(
	array(
		'hover'         => $plumbing_image_hover,
		'no_links'      => ! empty( $plumbing_template_args['no_links'] ),
		'thumb_size'    => plumbing_get_thumb_size( strpos( plumbing_get_theme_option( 'body_style' ), 'full' ) !== false || $plumbing_columns < 3 ? 'masonry-big' : 'masonry' ),
		'thumb_only'    => true,
		'show_no_image' => true,
		'post_info'     => '<div class="post_details">'
						. '<h2 class="post_title">'
							. ( empty( $plumbing_template_args['no_links'] )
								? '<a href="' . esc_url( get_permalink() ) . '">' . esc_html( get_the_title() ) . '</a>'
								: esc_html( get_the_title() )
								)
						. '</h2>'
						. '<div class="post_description">'
							. ( ! empty( $plumbing_components )
								? plumbing_show_post_meta(
									apply_filters(
										'plumbing_filter_post_meta_args', array(
											'components' => $plumbing_components,
											'seo'      => false,
											'echo'     => false,
										), $plumbing_blog_style[0], $plumbing_columns
									)
								)
								: ''
								)
							. ( empty( $plumbing_template_args['hide_excerpt'] )
								? '<div class="post_description_content">' . get_the_excerpt() . '</div>'
								: ''
								)
							. ( empty( $plumbing_template_args['no_links'] )
								? '<a href="' . esc_url( get_permalink() ) . '" class="theme_button post_readmore"><span class="post_readmore_label">' . esc_html__( 'Learn more', 'plumbing' ) . '</span></a>'
								: ''
								)
						. '</div>'
					. '</div>',
	)
);
?>
</article></div><?php
// Need opening PHP-tag above, because <article> is a inline-block element (used as column)!

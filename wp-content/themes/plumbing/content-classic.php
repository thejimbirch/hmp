<?php
/**
 * The Classic template to display the content
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
$plumbing_expanded   = ! plumbing_sidebar_present() && plumbing_is_on( plumbing_get_theme_option( 'expand_content' ) );
$plumbing_animation  = plumbing_get_theme_option( 'blog_animation' );
$plumbing_components = plumbing_array_get_keys_by_value( plumbing_get_theme_option( 'meta_parts' ) );

$plumbing_post_format = get_post_format();
$plumbing_post_format = empty( $plumbing_post_format ) ? 'standard' : str_replace( 'post-format-', '', $plumbing_post_format );

?><div class="
<?php
if ( ! empty( $plumbing_template_args['slider'] ) ) {
	echo ' slider-slide swiper-slide';
} else {
	echo ( 'classic' == $plumbing_blog_style[0] ? 'column' : 'masonry_item masonry_item' ) . '-1_' . esc_attr( $plumbing_columns );
}
?>
"><article id="post-<?php the_ID(); ?>" data-post-id="<?php the_ID(); ?>"
	<?php
	post_class(
		'post_item post_format_' . esc_attr( $plumbing_post_format )
				. ' post_layout_classic post_layout_classic_' . esc_attr( $plumbing_columns )
				. ' post_layout_' . esc_attr( $plumbing_blog_style[0] )
				. ' post_layout_' . esc_attr( $plumbing_blog_style[0] ) . '_' . esc_attr( $plumbing_columns )
	);
	echo ( ! plumbing_is_off( $plumbing_animation ) && empty( $plumbing_template_args['slider'] ) ? ' data-animation="' . esc_attr( plumbing_get_animation_classes( $plumbing_animation ) ) . '"' : '' );
	?>
>
	<?php

	// Featured image
	$plumbing_hover = ! empty( $plumbing_template_args['hover'] ) && ! plumbing_is_inherit( $plumbing_template_args['hover'] )
						? $plumbing_template_args['hover']
						: plumbing_get_theme_option( 'image_hover' );
	plumbing_show_post_featured(
		array(
			'thumb_size' => plumbing_get_thumb_size(
				'classic' == $plumbing_blog_style[0]
						? ( strpos( plumbing_get_theme_option( 'body_style' ), 'full' ) !== false
								? ( $plumbing_columns > 2 ? 'huge' : 'huge' )
								: ( $plumbing_columns > 2
									? ( $plumbing_expanded ? 'huge' : 'small' )
									: ( $plumbing_expanded ? 'huge' : 'huge' )
									)
							)
						: ( strpos( plumbing_get_theme_option( 'body_style' ), 'full' ) !== false
								? ( $plumbing_columns > 2 ? 'masonry-big' : 'full' )
								: ( $plumbing_columns <= 2 && $plumbing_expanded ? 'masonry-big' : 'masonry' )
							)
			),
			'hover'      => $plumbing_hover,
			'no_links'   => ! empty( $plumbing_template_args['no_links'] ),
		)
	);

	if ( ! in_array( $plumbing_post_format, array( 'link', 'aside', 'status', 'quote' ) ) ) {
		?>
		<div class="post_header entry-header">
			<?php
			do_action( 'plumbing_action_before_post_title' );

			// Post title
			if ( empty( $plumbing_template_args['no_links'] ) ) {
				the_title( sprintf( '<h4 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' );
			} else {
				the_title( '<h4 class="post_title entry-title">', '</h4>' );
			}
			?>
		</div><!-- .entry-header -->
		<?php
	}
	?>

	<div class="post_content entry-content">
		<?php
		if ( empty( $plumbing_template_args['hide_excerpt'] ) && ! empty( plumbing_get_theme_option( 'excerpt_length' ) ) && plumbing_get_theme_option( 'excerpt_length' ) > 0 ) {
			// Post content area
			plumbing_show_post_content( $plumbing_template_args, '<div class="post_content_inner">', '</div>' );
		}
		
		// Post meta
		if ( in_array( $plumbing_post_format, array( 'link', 'aside', 'status', 'quote' ) ) ) {
			if ( ! empty( $plumbing_components ) ) {
				plumbing_show_post_meta(
					apply_filters(
						'plumbing_filter_post_meta_args', array(
							'components' => $plumbing_components,
						), $plumbing_blog_style[0], $plumbing_columns
					)
				);
			}
		}

		if ( ! in_array( $plumbing_post_format, array( 'link', 'aside', 'status', 'quote' ) ) ) {
			?>
				<?php
				do_action( 'plumbing_action_before_post_meta' );
	
				// Post meta
				if ( ! empty( $plumbing_components ) && ! in_array( $plumbing_hover, array( 'border', 'pull', 'slide', 'fade' ) ) ) {
					plumbing_show_post_meta(
						apply_filters(
							'plumbing_filter_post_meta_args', array(
								'components' => $plumbing_components,
								'seo'        => false,
							), $plumbing_blog_style[0], $plumbing_columns
						)
					);
				}
	
				do_action( 'plumbing_action_after_post_meta' );
				?>
			<?php
		}
		
		// More button
		if ( empty( $plumbing_template_args['no_links'] ) && ! empty( $plumbing_template_args['more_text'] ) && ! in_array( $plumbing_post_format, array( 'link', 'aside', 'status', 'quote' ) ) ) {
			plumbing_show_post_more_link( $plumbing_template_args, '<p>', '</p>' );
		}
		?>
	</div><!-- .entry-content -->

</article></div><?php
// Need opening PHP-tag above, because <div> is a inline-block element (used as column)!

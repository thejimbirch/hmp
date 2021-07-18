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
	$plumbing_columns    = empty( $plumbing_template_args['columns'] ) ? 1 : max( 1, min( 3, $plumbing_template_args['columns'] ) );
	$plumbing_blog_style = array( $plumbing_template_args['type'], $plumbing_columns );
} else {
	$plumbing_blog_style = explode( '_', plumbing_get_theme_option( 'blog_style' ) );
	$plumbing_columns    = empty( $plumbing_blog_style[1] ) ? 1 : max( 1, min( 3, $plumbing_blog_style[1] ) );
}
$plumbing_expanded    = ! plumbing_sidebar_present() && plumbing_is_on( plumbing_get_theme_option( 'expand_content' ) );
$plumbing_post_format = get_post_format();
$plumbing_post_format = empty( $plumbing_post_format ) ? 'standard' : str_replace( 'post-format-', '', $plumbing_post_format );
$plumbing_animation   = plumbing_get_theme_option( 'blog_animation' );

?><article id="post-<?php the_ID(); ?>"	data-post-id="<?php the_ID(); ?>"
	<?php
	post_class(
		'post_item'
		. ' post_layout_chess'
		. ' post_layout_chess_' . esc_attr( $plumbing_columns )
		. ' post_format_' . esc_attr( $plumbing_post_format )
		. ( ! empty( $plumbing_template_args['slider'] ) ? ' slider-slide swiper-slide' : '' )
	);
	echo ( ! plumbing_is_off( $plumbing_animation ) && empty( $plumbing_template_args['slider'] ) ? ' data-animation="' . esc_attr( plumbing_get_animation_classes( $plumbing_animation ) ) . '"' : '' );
	?>
>

	<?php
	// Add anchor
	if ( 1 == $plumbing_columns && ! is_array( $plumbing_template_args ) && shortcode_exists( 'trx_sc_anchor' ) ) {
		echo do_shortcode( '[trx_sc_anchor id="post_' . esc_attr( get_the_ID() ) . '" title="' . the_title_attribute( array( 'echo' => false ) ) . '" icon="' . esc_attr( plumbing_get_post_icon() ) . '"]' );
	}

	// Sticky label
	if ( is_sticky() && ! is_paged() ) {
		?>
		<span class="post_label label_sticky"></span>
		<?php
	}

	// Featured image
	$plumbing_hover = ! empty( $plumbing_template_args['hover'] ) && ! plumbing_is_inherit( $plumbing_template_args['hover'] )
						? $plumbing_template_args['hover']
						: plumbing_get_theme_option( 'image_hover' );
	plumbing_show_post_featured(
		array(
			'class'         => 1 == $plumbing_columns && ! is_array( $plumbing_template_args ) ? 'plumbing-full-height' : '',
			'hover'         => $plumbing_hover,
			'no_links'      => ! empty( $plumbing_template_args['no_links'] ),
			'show_no_image' => true,
			'thumb_ratio'   => '1:1',
			'thumb_bg'      => true,
			'thumb_size'    => plumbing_get_thumb_size(
				strpos( plumbing_get_theme_option( 'body_style' ), 'full' ) !== false
										? ( 1 < $plumbing_columns ? 'huge' : 'original' )
										: ( 2 < $plumbing_columns ? 'big' : 'huge' )
			),
		)
	);

	?>
	<div class="post_inner"><div class="post_inner_content"><div class="post_header entry-header">
		<?php
			do_action( 'plumbing_action_before_post_title' );

			// Post title
			if ( empty( $plumbing_template_args['no_links'] ) ) {
				the_title( sprintf( '<h3 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );
			} else {
				the_title( '<h3 class="post_title entry-title">', '</h3>' );
			}

			do_action( 'plumbing_action_before_post_meta' );

			// Post meta
			$plumbing_components = plumbing_array_get_keys_by_value( plumbing_get_theme_option( 'meta_parts' ) );
			$plumbing_post_meta  = empty( $plumbing_components ) || in_array( $plumbing_hover, array( 'border', 'pull', 'slide', 'fade' ) )
										? ''
										: plumbing_show_post_meta(
											apply_filters(
												'plumbing_filter_post_meta_args', array(
													'components' => $plumbing_components,
													'seo'  => false,
													'echo' => false,
												), $plumbing_blog_style[0], $plumbing_columns
											)
										);
			plumbing_show_layout( $plumbing_post_meta );
			?>
		</div><!-- .entry-header -->

		<div class="post_content entry-content">
			<?php
			// Post content area
			if ( empty( $plumbing_template_args['hide_excerpt'] ) && ! empty( plumbing_get_theme_option( 'excerpt_length' ) ) && plumbing_get_theme_option( 'excerpt_length' ) > 0 ) {
				plumbing_show_post_content( $plumbing_template_args, '<div class="post_content_inner">', '</div>' );
			}
			// Post meta
			if ( in_array( $plumbing_post_format, array( 'link', 'aside', 'status', 'quote' ) ) ) {
				plumbing_show_layout( $plumbing_post_meta );
			}
			// More button
			if ( empty( $plumbing_template_args['no_links'] ) && ! in_array( $plumbing_post_format, array( 'link', 'aside', 'status', 'quote' ) ) ) {
				plumbing_show_post_more_link( $plumbing_template_args, '<p>', '</p>' );
			}
			?>
		</div><!-- .entry-content -->

	</div></div><!-- .post_inner -->

</article><?php
// Need opening PHP-tag above, because <article> is a inline-block element (used as column)!

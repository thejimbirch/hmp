<?php
/**
 * The default template to display the content
 *
 * Used for index/archive/search.
 *
 * @package WordPress
 * @subpackage PLUMBING
 * @since PLUMBING 1.0
 */

$plumbing_template_args = get_query_var( 'plumbing_template_args' );
if ( is_array( $plumbing_template_args ) ) {
	$plumbing_columns    = empty( $plumbing_template_args['columns'] ) ? 1 : max( 1, $plumbing_template_args['columns'] );
	$plumbing_blog_style = array( $plumbing_template_args['type'], $plumbing_columns );
	if ( ! empty( $plumbing_template_args['slider'] ) ) {
		?><div class="slider-slide swiper-slide">
		<?php
	} elseif ( $plumbing_columns > 1 ) {
		?>
		<div class="column-1_<?php echo esc_attr( $plumbing_columns ); ?>">
		<?php
	}
}
$plumbing_expanded    = ! plumbing_sidebar_present() && plumbing_is_on( plumbing_get_theme_option( 'expand_content' ) );
$plumbing_post_format = get_post_format();
$plumbing_post_format = empty( $plumbing_post_format ) ? 'standard' : str_replace( 'post-format-', '', $plumbing_post_format );
$plumbing_animation   = plumbing_get_theme_option( 'blog_animation' );
?>
<article id="post-<?php the_ID(); ?>" data-post-id="<?php the_ID(); ?>"
	<?php post_class( 'post_item post_layout_excerpt post_format_' . esc_attr( $plumbing_post_format ) ); ?>
	<?php echo ( ! plumbing_is_off( $plumbing_animation ) && empty( $plumbing_template_args['slider'] ) ? ' data-animation="' . esc_attr( plumbing_get_animation_classes( $plumbing_animation ) ) . '"' : '' ); ?>
>
	<?php

	// Change Audio Post Format
	$post_format = str_replace('post-format-', '', get_post_format());
	if ( $post_format == 'audio' ) {
		// Title and post meta
		if ( get_the_title() != '' ) {
			?>
			<div class="post_header entry-header">
				<?php
				do_action( 'plumbing_action_before_post_title' );

				// Post title
				if ( empty( $plumbing_template_args['no_links'] ) ) {
					the_title( sprintf( '<h3 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );
				} else {
					the_title( '<h3 class="post_title entry-title">', '</h3>' );
				}

				?>
			</div><!-- .post_header -->
			<?php
		}

		// Featured image
		$plumbing_hover = ! empty( $plumbing_template_args['hover'] ) && ! plumbing_is_inherit( $plumbing_template_args['hover'] )
						? $plumbing_template_args['hover']
						: plumbing_get_theme_option( 'image_hover' );
		plumbing_show_post_featured(
			array(
				'no_links'   => ! empty( $plumbing_template_args['no_links'] ),
				'hover'      => $plumbing_hover,
				'thumb_size' => plumbing_get_thumb_size( strpos( plumbing_get_theme_option( 'body_style' ), 'full' ) !== false ? 'full' : ( $plumbing_expanded ? 'huge' : 'big' ) ),
			)
		);

	}
	if ( $post_format != 'audio' ) {
		// Featured image
		$plumbing_hover = ! empty( $plumbing_template_args['hover'] ) && ! plumbing_is_inherit( $plumbing_template_args['hover'] )
							? $plumbing_template_args['hover']
							: plumbing_get_theme_option( 'image_hover' );
		plumbing_show_post_featured(
			array(
				'no_links'   => ! empty( $plumbing_template_args['no_links'] ),
				'hover'      => $plumbing_hover,
				'thumb_size' => plumbing_get_thumb_size( strpos( plumbing_get_theme_option( 'body_style' ), 'full' ) !== false ? 'full' : ( $plumbing_expanded ? 'huge' : 'big' ) ),
			)
		);

		// Title and post meta
		if ( get_the_title() != '' ) {
			?>
			<div class="post_header entry-header">
				<?php
				do_action( 'plumbing_action_before_post_title' );

				// Post title
				if ( empty( $plumbing_template_args['no_links'] ) ) {
					the_title( sprintf( '<h3 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );
				} else {
					the_title( '<h3 class="post_title entry-title">', '</h3>' );
				}

				?>
			</div><!-- .post_header -->
			<?php
		}
	}	

	// Post content
	if ( empty( $plumbing_template_args['hide_excerpt'] ) && ! empty( plumbing_get_theme_option( 'excerpt_length' ) ) && plumbing_get_theme_option( 'excerpt_length' ) > 0 ) {
		?>
		<div class="post_content entry-content">
			<?php
			if ( plumbing_get_theme_option( 'blog_content' ) == 'fullpost' && $post_format != 'audio' ) {
				// Post content area
				?>
				<div class="post_content_inner">
					<?php
					do_action( 'plumbing_action_before_full_post_content' );
					the_content( '' );
					do_action( 'plumbing_action_after_full_post_content' );
					?>
				</div>
				<?php
				// Inner pages
				wp_link_pages(
					array(
						'before'      => '<div class="page_links"><span class="page_links_title">' . esc_html__( 'Pages:', 'plumbing' ) . '</span>',
						'after'       => '</div>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
						'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'plumbing' ) . ' </span>%',
						'separator'   => '<span class="screen-reader-text">, </span>',
					)
				);
			} else {
				if ( $post_format != 'audio' ) {
					// Post content area
					plumbing_show_post_content( $plumbing_template_args, '<div class="post_content_inner">', '</div>' );
				}
				// Add wrap
				?>
				<div class="post_content_bottom">
				<?php
					if ( $post_format != 'audio' ) {
						// Add column
						?>
						<div class="post_content_bottom_col col_start">
						<?php
							// More button
							if ( empty( $plumbing_template_args['no_links'] ) && ! in_array( $plumbing_post_format, array( 'link', 'aside', 'status', 'quote' ) ) ) {
								plumbing_show_post_more_link( $plumbing_template_args, '<p>', '</p>' );
							}
						?>
						</div>
						<?php
					}
					// Add column
					?>
					<div class="post_content_bottom_col col_end">
					<?php
						do_action( 'plumbing_action_before_post_meta' );

						// Post meta
						$plumbing_components = plumbing_array_get_keys_by_value( plumbing_get_theme_option( 'meta_parts' ) );
						if ( ! empty( $plumbing_components ) && ! in_array( $plumbing_hover, array( 'border', 'pull', 'slide', 'fade' ) ) ) {
							plumbing_show_post_meta(
								apply_filters(
									'plumbing_filter_post_meta_args', array(
										'components' => $plumbing_components,
										'seo'        => false,
									), 'excerpt', 1
								)
							);
						}
					?>
					</div>
					<?php
					?>
				</div>
				<?php
			}
			?>
		</div><!-- .entry-content -->
		<?php
	}
	?>
</article>
<?php

if ( is_array( $plumbing_template_args ) ) {
	if ( ! empty( $plumbing_template_args['slider'] ) || $plumbing_columns > 1 ) {
		?>
		</div>
		<?php
	}
}

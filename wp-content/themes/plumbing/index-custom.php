<?php
/**
 * The template for homepage posts with custom style
 *
 * @package WordPress
 * @subpackage PLUMBING
 * @since PLUMBING 1.0.50
 */

plumbing_storage_set( 'blog_archive', true );

get_header();

if ( have_posts() ) {

	$plumbing_blog_style = plumbing_get_theme_option( 'blog_style' );
	$plumbing_parts      = explode( '_', $plumbing_blog_style );
	$plumbing_columns    = ! empty( $plumbing_parts[1] ) ? max( 1, min( 6, (int) $plumbing_parts[1] ) ) : 1;
	$plumbing_blog_id    = plumbing_get_custom_blog_id( $plumbing_blog_style );
	$plumbing_blog_meta  = plumbing_get_custom_layout_meta( $plumbing_blog_id );
	if ( ! empty( $plumbing_blog_meta['margin'] ) ) {
		plumbing_add_inline_css( sprintf( '.page_content_wrap{padding-top:%s}', esc_attr( plumbing_prepare_css_value( $plumbing_blog_meta['margin'] ) ) ) );
	}
	$plumbing_custom_style = ! empty( $plumbing_blog_meta['scripts_required'] ) ? $plumbing_blog_meta['scripts_required'] : 'none';

	plumbing_blog_archive_start();

	$plumbing_classes    = 'posts_container blog_custom_wrap' 
							. ( ! plumbing_is_off( $plumbing_custom_style )
								? sprintf( ' %s_wrap', $plumbing_custom_style )
								: ( $plumbing_columns > 1 
									? ' columns_wrap columns_padding_bottom' 
									: ''
									)
								);
	$plumbing_stickies   = is_home() ? get_option( 'sticky_posts' ) : false;
	$plumbing_sticky_out = plumbing_get_theme_option( 'sticky_style' ) == 'columns'
							&& is_array( $plumbing_stickies ) && count( $plumbing_stickies ) > 0 && get_query_var( 'paged' ) < 1;
	if ( $plumbing_sticky_out ) {
		?>
		<div class="sticky_wrap columns_wrap">
		<?php
	}
	if ( ! $plumbing_sticky_out ) {
		if ( plumbing_get_theme_option( 'first_post_large' ) && ! is_paged() && ! in_array( plumbing_get_theme_option( 'body_style' ), array( 'fullwide', 'fullscreen' ) ) ) {
			the_post();
			get_template_part( apply_filters( 'plumbing_filter_get_template_part', 'content', 'excerpt' ), 'excerpt' );
		}
		?>
		<div class="<?php echo esc_attr( $plumbing_classes ); ?>">
		<?php
	}
	while ( have_posts() ) {
		the_post();
		if ( $plumbing_sticky_out && ! is_sticky() ) {
			$plumbing_sticky_out = false;
			?>
			</div><div class="<?php echo esc_attr( $plumbing_classes ); ?>">
			<?php
		}
		$plumbing_part = $plumbing_sticky_out && is_sticky() ? 'sticky' : 'custom';
		get_template_part( apply_filters( 'plumbing_filter_get_template_part', 'content', $plumbing_part ), $plumbing_part );
	}
	?>
	</div>
	<?php

	plumbing_show_pagination();

	plumbing_blog_archive_end();

} else {

	if ( is_search() ) {
		get_template_part( apply_filters( 'plumbing_filter_get_template_part', 'content', 'none-search' ), 'none-search' );
	} else {
		get_template_part( apply_filters( 'plumbing_filter_get_template_part', 'content', 'none-archive' ), 'none-archive' );
	}
}

get_footer();

<?php
/**
 * The template for homepage posts with "Excerpt" style
 *
 * @package WordPress
 * @subpackage PLUMBING
 * @since PLUMBING 1.0
 */

plumbing_storage_set( 'blog_archive', true );

get_header();

if ( have_posts() ) {

	plumbing_blog_archive_start();

	?><div class="posts_container">
		<?php

		$plumbing_stickies   = is_home() ? get_option( 'sticky_posts' ) : false;
		$plumbing_sticky_out = plumbing_get_theme_option( 'sticky_style' ) == 'columns'
								&& is_array( $plumbing_stickies ) && count( $plumbing_stickies ) > 0 && get_query_var( 'paged' ) < 1;
		if ( $plumbing_sticky_out ) {
			?>
			<div class="sticky_wrap columns_wrap">
			<?php
		}
		while ( have_posts() ) {
			the_post();
			if ( $plumbing_sticky_out && ! is_sticky() ) {
				$plumbing_sticky_out = false;
				?>
				</div>
				<?php
			}
			$plumbing_part = $plumbing_sticky_out && is_sticky() ? 'sticky' : 'excerpt';
			get_template_part( apply_filters( 'plumbing_filter_get_template_part', 'content', $plumbing_part ), $plumbing_part );
		}
		if ( $plumbing_sticky_out ) {
			$plumbing_sticky_out = false;
			?>
			</div>
			<?php
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

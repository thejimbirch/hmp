<?php
/**
 * The template for homepage posts with "Portfolio" style
 *
 * @package WordPress
 * @subpackage PLUMBING
 * @since PLUMBING 1.0
 */

plumbing_storage_set( 'blog_archive', true );

get_header();

if ( have_posts() ) {

	plumbing_blog_archive_start();

	$plumbing_stickies   = is_home() ? get_option( 'sticky_posts' ) : false;
	$plumbing_sticky_out = plumbing_get_theme_option( 'sticky_style' ) == 'columns'
							&& is_array( $plumbing_stickies ) && count( $plumbing_stickies ) > 0 && get_query_var( 'paged' ) < 1;

	// Show filters
	$plumbing_cat          = plumbing_get_theme_option( 'parent_cat' );
	$plumbing_post_type    = plumbing_get_theme_option( 'post_type' );
	$plumbing_taxonomy     = plumbing_get_post_type_taxonomy( $plumbing_post_type );
	$plumbing_show_filters = plumbing_get_theme_option( 'show_filters' );
	$plumbing_tabs         = array();
	if ( ! plumbing_is_off( $plumbing_show_filters ) ) {
		$plumbing_args           = array(
			'type'         => $plumbing_post_type,
			'child_of'     => $plumbing_cat,
			'orderby'      => 'name',
			'order'        => 'ASC',
			'hide_empty'   => 1,
			'hierarchical' => 0,
			'taxonomy'     => $plumbing_taxonomy,
			'pad_counts'   => false,
		);
		$plumbing_portfolio_list = get_terms( $plumbing_args );
		if ( is_array( $plumbing_portfolio_list ) && count( $plumbing_portfolio_list ) > 0 ) {
			$plumbing_tabs[ $plumbing_cat ] = esc_html__( 'All', 'plumbing' );
			foreach ( $plumbing_portfolio_list as $plumbing_term ) {
				if ( isset( $plumbing_term->term_id ) ) {
					$plumbing_tabs[ $plumbing_term->term_id ] = $plumbing_term->name;
				}
			}
		}
	}
	if ( count( $plumbing_tabs ) > 0 ) {
		$plumbing_portfolio_filters_ajax   = true;
		$plumbing_portfolio_filters_active = $plumbing_cat;
		$plumbing_portfolio_filters_id     = 'portfolio_filters';
		?>
		<div class="portfolio_filters plumbing_tabs plumbing_tabs_ajax">
			<ul class="portfolio_titles plumbing_tabs_titles">
				<?php
				foreach ( $plumbing_tabs as $plumbing_id => $plumbing_title ) {
					?>
					<li><a href="<?php echo esc_url( plumbing_get_hash_link( sprintf( '#%s_%s_content', $plumbing_portfolio_filters_id, $plumbing_id ) ) ); ?>" data-tab="<?php echo esc_attr( $plumbing_id ); ?>"><?php echo esc_html( $plumbing_title ); ?></a></li>
					<?php
				}
				?>
			</ul>
			<?php
			$plumbing_ppp = plumbing_get_theme_option( 'posts_per_page' );
			if ( plumbing_is_inherit( $plumbing_ppp ) ) {
				$plumbing_ppp = '';
			}
			foreach ( $plumbing_tabs as $plumbing_id => $plumbing_title ) {
				$plumbing_portfolio_need_content = $plumbing_id == $plumbing_portfolio_filters_active || ! $plumbing_portfolio_filters_ajax;
				?>
				<div id="<?php echo esc_attr( sprintf( '%s_%s_content', $plumbing_portfolio_filters_id, $plumbing_id ) ); ?>"
					class="portfolio_content plumbing_tabs_content"
					data-blog-template="<?php echo esc_attr( plumbing_storage_get( 'blog_template' ) ); ?>"
					data-blog-style="<?php echo esc_attr( plumbing_get_theme_option( 'blog_style' ) ); ?>"
					data-posts-per-page="<?php echo esc_attr( $plumbing_ppp ); ?>"
					data-post-type="<?php echo esc_attr( $plumbing_post_type ); ?>"
					data-taxonomy="<?php echo esc_attr( $plumbing_taxonomy ); ?>"
					data-cat="<?php echo esc_attr( $plumbing_id ); ?>"
					data-parent-cat="<?php echo esc_attr( $plumbing_cat ); ?>"
					data-need-content="<?php echo ( false === $plumbing_portfolio_need_content ? 'true' : 'false' ); ?>"
				>
					<?php
					if ( $plumbing_portfolio_need_content ) {
						plumbing_show_portfolio_posts(
							array(
								'cat'        => $plumbing_id,
								'parent_cat' => $plumbing_cat,
								'taxonomy'   => $plumbing_taxonomy,
								'post_type'  => $plumbing_post_type,
								'page'       => 1,
								'sticky'     => $plumbing_sticky_out,
							)
						);
					}
					?>
				</div>
				<?php
			}
			?>
		</div>
		<?php
	} else {
		plumbing_show_portfolio_posts(
			array(
				'cat'        => $plumbing_cat,
				'parent_cat' => $plumbing_cat,
				'taxonomy'   => $plumbing_taxonomy,
				'post_type'  => $plumbing_post_type,
				'page'       => 1,
				'sticky'     => $plumbing_sticky_out,
			)
		);
	}

	plumbing_blog_archive_end();

} else {

	if ( is_search() ) {
		get_template_part( apply_filters( 'plumbing_filter_get_template_part', 'content', 'none-search' ), 'none-search' );
	} else {
		get_template_part( apply_filters( 'plumbing_filter_get_template_part', 'content', 'none-archive' ), 'none-archive' );
	}
}

get_footer();

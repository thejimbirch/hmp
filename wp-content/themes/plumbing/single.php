<?php
/**
 * The template to display single post
 *
 * @package WordPress
 * @subpackage PLUMBING
 * @since PLUMBING 1.0
 */

get_header();

while ( have_posts() ) {
	the_post();

	// Prepare theme-specific vars:

	// Full post loading
	$full_post_loading        = plumbing_get_value_gp( 'action' ) == 'full_post_loading';

	// Prev post loading
	$prev_post_loading        = plumbing_get_value_gp( 'action' ) == 'prev_post_loading';

	// Position of the related posts
	$plumbing_related_position = plumbing_get_theme_option( 'related_position' );

	// Type of the prev/next posts navigation
	$plumbing_posts_navigation = plumbing_get_theme_option( 'posts_navigation' );
	$plumbing_prev_post        = false;

	if ( 'scroll' == $plumbing_posts_navigation ) {
		$plumbing_prev_post = get_previous_post( true );         // Get post from same category
		if ( ! $plumbing_prev_post ) {
			$plumbing_prev_post = get_previous_post( false );    // Get post from any category
			if ( ! $plumbing_prev_post ) {
				$plumbing_posts_navigation = 'links';
			}
		}
	}

	// Override some theme options to display featured image, title and post meta in the dynamic loaded posts
	if ( $full_post_loading || ( $prev_post_loading && $plumbing_prev_post ) ) {
		plumbing_storage_set_array( 'options_meta', 'post_thumbnail_type', 'default' );
		if ( plumbing_get_theme_option( 'post_header_position' ) != 'below' ) {
			plumbing_storage_set_array( 'options_meta', 'post_header_position', 'above' );
		}
		plumbing_sc_layouts_showed( 'featured', false );
		plumbing_sc_layouts_showed( 'title', false );
		plumbing_sc_layouts_showed( 'postmeta', false );
	}

	// If related posts should be inside the content
	if ( strpos( $plumbing_related_position, 'inside' ) === 0 ) {
		ob_start();
	}

	// Display post's content
	get_template_part( apply_filters( 'plumbing_filter_get_template_part', 'content', get_post_format() ), get_post_format() );

	// If related posts should be inside the content
	if ( strpos( $plumbing_related_position, 'inside' ) === 0 ) {
		$plumbing_content = ob_get_contents();
		ob_end_clean();

		ob_start();
		do_action( 'plumbing_action_related_posts' );
		$plumbing_related_content = ob_get_contents();
		ob_end_clean();

		$plumbing_related_position_inside = max( 0, min( 9, plumbing_get_theme_option( 'related_position_inside' ) ) );
		if ( 0 == $plumbing_related_position_inside ) {
			$plumbing_related_position_inside = mt_rand( 1, 9 );
		}
		
		$plumbing_p_number = 0;
		$plumbing_related_inserted = false;
		for ( $i = 0; $i < strlen( $plumbing_content ) - 3; $i++ ) {
			if ( $plumbing_content[ $i ] == '<' && $plumbing_content[ $i + 1 ] == 'p' && in_array( $plumbing_content[ $i + 2 ], array( '>', ' ' ) ) ) {
				$plumbing_p_number++;
				if ( $plumbing_related_position_inside == $plumbing_p_number ) {
					$plumbing_related_inserted = true;
					$plumbing_content = ( $i > 0 ? substr( $plumbing_content, 0, $i ) : '' )
										. $plumbing_related_content
										. substr( $plumbing_content, $i );
				}
			}
		}
		if ( ! $plumbing_related_inserted ) {
			$plumbing_content .= $plumbing_related_content;
		}

		plumbing_show_layout( $plumbing_content );
	}

	// Author bio
	if ( plumbing_get_theme_option( 'show_author_info' ) == 1
		&& ! is_attachment()
		&& get_the_author_meta( 'description' )
		&& ( 'scroll' != $plumbing_posts_navigation || plumbing_get_theme_option( 'posts_navigation_scroll_hide_author' ) == 0 )
		&& ( ! $full_post_loading || plumbing_get_theme_option( 'open_full_post_hide_author' ) == 0 )
	) {
		do_action( 'plumbing_action_before_post_author' );
		get_template_part( apply_filters( 'plumbing_filter_get_template_part', 'templates/author-bio' ) );
		do_action( 'plumbing_action_after_post_author' );
	}

	// Previous/next post navigation.
	if ( 'links' == $plumbing_posts_navigation && ! $full_post_loading ) {
		do_action( 'plumbing_action_before_post_navigation' );
		?>
		<div class="nav-links-single<?php
			if ( ! plumbing_is_off( plumbing_get_theme_option( 'posts_navigation_fixed' ) ) ) {
				echo ' nav-links-fixed fixed';
			}
		?>">
			<?php
			the_post_navigation(
				array(
					'next_text' => '<span class="screen-reader-text">' . esc_html__( 'Next post:', 'plumbing' ) . '</span> '
						. '<span class="post_nav">' . esc_html__( 'Next', 'plumbing' ) . '</span>'
						. '<h5 class="post-title">%title</h5>'
						. '<span class="post_date">%date</span>',
					'prev_text' => '<span class="screen-reader-text">' . esc_html__( 'Previous post:', 'plumbing' ) . '</span> '
						. '<span class="post_nav">' . esc_html__( 'Prev', 'plumbing' ) . '</span>'
						. '<h5 class="post-title">%title</h5>'
						. '<span class="post_date">%date</span>',
				)
			);
			?>
		</div>
		<?php
		do_action( 'plumbing_action_after_post_navigation' );
	}

	// Related posts
	if ( 'below_content' == $plumbing_related_position
		&& ( 'scroll' != $plumbing_posts_navigation || plumbing_get_theme_option( 'posts_navigation_scroll_hide_related' ) == 0 )
		&& ( ! $full_post_loading || plumbing_get_theme_option( 'open_full_post_hide_related' ) == 0 )
	) {
		do_action( 'plumbing_action_related_posts' );
	}

	// If comments are open or we have at least one comment, load up the comment template.
	$plumbing_comments_number = get_comments_number();
	if ( comments_open() || $plumbing_comments_number > 0 ) {
		if ( ! $full_post_loading && ( 'scroll' != $plumbing_posts_navigation || plumbing_get_theme_option( 'posts_navigation_scroll_hide_comments' ) == 0 ) ) {
			do_action( 'plumbing_action_before_comments' );
			comments_template();
			do_action( 'plumbing_action_after_comments' );
		} else {
			?>
			<div class="show_comments_single">
				<a href="<?php comments_link(); ?>" class="theme_button show_comments_button">
					<?php
					if ( $plumbing_comments_number > 0 ) {
						echo sprintf( ($plumbing_comments_number === 1) ? esc_html__('Show comment', 'plumbing') :  esc_html__('Show comments ( %d )', 'plumbing'), $plumbing_comments_number );
					} else {
						esc_html_e( 'Leave a comment', 'plumbing' );
					}
					?>
				</a>
			</div>
			<?php
		}
	}

	if ( 'scroll' == $plumbing_posts_navigation && ! $full_post_loading ) {
		?>
		<div class="nav-links-single-scroll"
			data-post-id="<?php echo esc_attr( get_the_ID( $plumbing_prev_post ) ); ?>"
			data-post-link="<?php the_permalink( $plumbing_prev_post ); ?>"
			data-post-title="<?php the_title_attribute( array( 'post' => $plumbing_prev_post ) ); ?>">
		</div>
		<?php
	}
}

get_footer();

<?php
/**
 * The template to display the attachment
 *
 * @package WordPress
 * @subpackage PLUMBING
 * @since PLUMBING 1.0
 */


get_header();

while ( have_posts() ) {
	the_post();

	get_template_part( apply_filters( 'plumbing_filter_get_template_part', 'content', get_post_format() ), get_post_format() );

	// Parent post navigation.
	$plumbing_posts_navigation = plumbing_get_theme_option( 'posts_navigation' );
	if ( 'links' == $plumbing_posts_navigation ) {
		?>
		<div class="nav-links-single<?php
			if ( ! plumbing_is_off( plumbing_get_theme_option( 'posts_navigation_fixed' ) ) ) {
				echo ' nav-links-fixed fixed';
			}
		?>">
		<?php
		the_post_navigation(
			array(
				'prev_text' => '<span class="nav-arrow"></span>'
					. '<span class="meta-nav" aria-hidden="true">' . esc_html__( 'Published in', 'plumbing' ) . '</span> '
					. '<span class="screen-reader-text">' . esc_html__( 'Previous post:', 'plumbing' ) . '</span> '
					. '<h5 class="post-title">%title</h5>'
					. '<span class="post_date">%date</span>',
			)
		);
		?>
	</div>
	<?php
	}

	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}
}

get_footer();

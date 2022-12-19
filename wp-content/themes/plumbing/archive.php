<?php
/**
 * The template file to display taxonomies archive
 *
 * @package WordPress
 * @subpackage PLUMBING
 * @since PLUMBING 1.0.57
 */

// Redirect to the template page (if exists) for output current taxonomy
if ( is_category() || is_tag() || is_tax() ) {
	$plumbing_term = get_queried_object();
	global $wp_query;
	if ( ! empty( $plumbing_term->taxonomy ) && ! empty( $wp_query->posts[0]->post_type ) ) {
		$plumbing_taxonomy  = plumbing_get_post_type_taxonomy( $wp_query->posts[0]->post_type );
		if ( $plumbing_taxonomy == $plumbing_term->taxonomy ) {
			$plumbing_template_page_id = plumbing_get_template_page_id( array(
				'post_type'  => $wp_query->posts[0]->post_type,
				'parent_cat' => $plumbing_term->term_id
			) );
			if ( 0 < $plumbing_template_page_id ) {
				wp_safe_redirect( get_permalink( $plumbing_template_page_id ) );
				exit;
			}
		}
	}
}
// If template page is not exists - display default blog archive template
get_template_part( apply_filters( 'plumbing_filter_get_template_part', plumbing_blog_archive_get_template() ) );

<?php
/**
 * The template to display the page title and breadcrumbs
 *
 * @package WordPress
 * @subpackage PLUMBING
 * @since PLUMBING 1.0
 */

// Page (category, tag, archive, author) title

if ( plumbing_need_page_title() ) {
	plumbing_sc_layouts_showed( 'title', true );
	plumbing_sc_layouts_showed( 'postmeta', true );
	?>
	<div class="top_panel_title sc_layouts_row sc_layouts_row_type_normal">
		<div class="content_wrap">
			<div class="sc_layouts_column sc_layouts_column_align_center">
				<div class="sc_layouts_item">
					<div class="sc_layouts_title sc_align_center">
						<?php
						// Post meta on the single post
						if ( is_single() ) {
							?>
							<div class="sc_layouts_title_meta">
							<?php
								plumbing_show_post_meta(
									apply_filters(
										'plumbing_filter_post_meta_args', array(
											'components' => plumbing_array_get_keys_by_value( plumbing_get_theme_option( 'meta_parts' ) ),
											'counters'   => plumbing_array_get_keys_by_value( plumbing_get_theme_option( 'counters' ) ),
											'seo'        => plumbing_is_on( plumbing_get_theme_option( 'seo_snippets' ) ),
										), 'header', 1
									)
								);
							?>
							</div>
							<?php
						}

						// Blog/Post title
						?>
						<div class="sc_layouts_title_title">
							<?php
							$plumbing_blog_title           = plumbing_get_blog_title();
							$plumbing_blog_title_text      = '';
							$plumbing_blog_title_class     = '';
							$plumbing_blog_title_link      = '';
							$plumbing_blog_title_link_text = '';
							if ( is_array( $plumbing_blog_title ) ) {
								$plumbing_blog_title_text      = $plumbing_blog_title['text'];
								$plumbing_blog_title_class     = ! empty( $plumbing_blog_title['class'] ) ? ' ' . $plumbing_blog_title['class'] : '';
								$plumbing_blog_title_link      = ! empty( $plumbing_blog_title['link'] ) ? $plumbing_blog_title['link'] : '';
								$plumbing_blog_title_link_text = ! empty( $plumbing_blog_title['link_text'] ) ? $plumbing_blog_title['link_text'] : '';
							} else {
								$plumbing_blog_title_text = $plumbing_blog_title;
							}
							?>
							<h1 itemprop="headline" class="sc_layouts_title_caption<?php echo esc_attr( $plumbing_blog_title_class ); ?>">
								<?php
								$plumbing_top_icon = plumbing_get_term_image_small();
								if ( ! empty( $plumbing_top_icon ) ) {
									$plumbing_attr = plumbing_getimagesize( $plumbing_top_icon );
									?>
									<img src="<?php echo esc_url( $plumbing_top_icon ); ?>" alt="<?php esc_attr_e( 'Site icon', 'plumbing' ); ?>"
										<?php
										if ( ! empty( $plumbing_attr[3] ) ) {
											plumbing_show_layout( $plumbing_attr[3] );
										}
										?>
									>
									<?php
								}
								echo wp_kses_data( $plumbing_blog_title_text );
								?>
							</h1>
							<?php
							if ( ! empty( $plumbing_blog_title_link ) && ! empty( $plumbing_blog_title_link_text ) ) {
								?>
								<a href="<?php echo esc_url( $plumbing_blog_title_link ); ?>" class="theme_button theme_button_small sc_layouts_title_link"><?php echo esc_html( $plumbing_blog_title_link_text ); ?></a>
								<?php
							}

							// Category/Tag description
							if ( is_category() || is_tag() || is_tax() ) {
								the_archive_description( '<div class="sc_layouts_title_description">', '</div>' );
							}

							?>
						</div>
						<?php

						// Breadcrumbs
						?>
						<div class="sc_layouts_title_breadcrumbs">
							<?php
							do_action( 'plumbing_action_breadcrumbs' );
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
}

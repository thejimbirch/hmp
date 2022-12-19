<?php
/**
 * The template to display the team member's page
 *
 * @package WordPress
 * @subpackage ThemeREX Addons
 * @since v1.2
 */

global $TRX_ADDONS_STORAGE;

get_header();

while ( have_posts() ) { the_post();
	
	do_action('trx_addons_action_before_article', 'team.single');
	
	?><article id="post-<?php the_ID(); ?>" data-post-id="<?php the_ID(); ?>" <?php post_class( 'team_member_page itemscope' ); trx_addons_seo_snippets('', 'Article'); ?>><?php
	
		do_action('trx_addons_action_article_start', 'team.single');

		// Post header
		?><div class="team_member_header"><?php
		
			$meta = get_post_meta(get_the_ID(), 'trx_addons_options', true);

			// Image
			if ( !trx_addons_sc_layouts_showed('featured') && has_post_thumbnail() ) {
				?><div class="team_member_featured">
					<div class="team_member_avatar">
						<?php
						the_post_thumbnail(
											apply_filters('trx_addons_filter_thumb_size', trx_addons_get_thumb_size('masonry-big'), 'team-single'),
											trx_addons_seo_image_params(array(
																				'alt' => the_title_attribute( array( 'echo' => false ) )
																				))
											);
						?>
					</div>
				</div>
				<?php
			}
			
			// Title and Description
			?><div class="team_member_description"><?php
				if ( !trx_addons_sc_layouts_showed('title') ) {
					?><h2 class="team_member_title"><?php the_title(); ?></h2><?php
				}
				?>
				<h4 class="team_member_position"><?php echo esc_html($meta['subtitle']); ?></h4>
				<div class="team_member_details">
					<?php
					$post_box = trx_addons_post_box_get(get_post_type());
					foreach ($post_box as $k=>$v) {
						if (!empty($v['details']) && !empty($meta[$k])) {
							?><div class="team_member_details_<?php echo esc_attr($k); ?>">
								<span class="team_member_details_label"><?php
									echo esc_html($v['title']); ?>:
								</span><span class="team_member_details_value"><?php
									trx_addons_show_value($meta[$k], $v['type']);
								?></span>
							</div><?php
						}
					}
					?>
				</div>
				<?php
				if (!empty($meta['brief_info'])) {
					?>
					<div class="team_member_brief_info">
						<h5 class="team_member_brief_info_title"><?php esc_attr_e('Brief info', 'plumbing'); ?></h5>
						<div class="team_member_brief_info_text"><?php echo wpautop($meta['brief_info']); ?></div>
					</div>
					<?php
				}
				if (!empty($meta['socials'])) {
					?><div class="team_member_socials socials_wrap"><?php trx_addons_show_layout(trx_addons_get_socials_links_custom($meta['socials'])); ?></div><?php
				}
			?></div>
		</div><?php

		// Post content
		?><div class="team_member_content entry-content"<?php trx_addons_seo_snippets('articleBody'); ?>><?php
			the_content( );
		?></div><!-- .entry-content --><?php

		do_action('trx_addons_action_article_end', 'team.single');

	?></article><?php

	do_action('trx_addons_action_after_article', 'team.single');

	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}
}

get_footer();

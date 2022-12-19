<?php
/**
 * The Footer: widgets area, logo, footer menu and socials
 *
 * @package WordPress
 * @subpackage PLUMBING
 * @since PLUMBING 1.0
 */

							// Widgets area inside page content
							plumbing_create_widgets_area( 'widgets_below_content' );
							?>
						</div><!-- </.content> -->
					<?php

					// Show main sidebar
					get_sidebar();

					$plumbing_body_style = plumbing_get_theme_option( 'body_style' );
					?>
					</div><!-- </.content_wrap> -->
					<?php

					// Widgets area below page content and related posts below page content
					$plumbing_widgets_name = plumbing_get_theme_option( 'widgets_below_page' );
					$plumbing_show_widgets = ! plumbing_is_off( $plumbing_widgets_name ) && is_active_sidebar( $plumbing_widgets_name );
					$plumbing_show_related = is_single() && plumbing_get_theme_option( 'related_position' ) == 'below_page';
					if ( $plumbing_show_widgets || $plumbing_show_related ) {
						if ( 'fullscreen' != $plumbing_body_style ) {
							?>
							<div class="content_wrap">
							<?php
						}
						// Show related posts before footer
						if ( $plumbing_show_related ) {
							do_action( 'plumbing_action_related_posts' );
						}

						// Widgets area below page content
						if ( $plumbing_show_widgets ) {
							plumbing_create_widgets_area( 'widgets_below_page' );
						}
						if ( 'fullscreen' != $plumbing_body_style ) {
							?>
							</div><!-- </.content_wrap> -->
							<?php
						}
					}
					?>
			</div><!-- </.page_content_wrap> -->

			<?php
			// Single posts banner before footer
			if ( is_singular( 'post' ) ) {
				plumbing_show_post_banner('footer');
			}
			// Footer
			$plumbing_footer_type = plumbing_get_theme_option( 'footer_type' );
			if ( 'custom' == $plumbing_footer_type && ! plumbing_is_layouts_available() ) {
				$plumbing_footer_type = 'default';
			}
			get_template_part( apply_filters( 'plumbing_filter_get_template_part', "templates/footer-{$plumbing_footer_type}" ) );
			?>

		</div><!-- /.page_wrap -->

	</div><!-- /.body_wrap -->

	<?php wp_footer(); ?>

</body>
</html>
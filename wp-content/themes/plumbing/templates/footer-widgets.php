<?php
/**
 * The template to display the widgets area in the footer
 *
 * @package WordPress
 * @subpackage PLUMBING
 * @since PLUMBING 1.0.10
 */

// Footer sidebar
$plumbing_footer_name    = plumbing_get_theme_option( 'footer_widgets' );
$plumbing_footer_present = ! plumbing_is_off( $plumbing_footer_name ) && is_active_sidebar( $plumbing_footer_name );
if ( $plumbing_footer_present ) {
	plumbing_storage_set( 'current_sidebar', 'footer' );
	$plumbing_footer_wide = plumbing_get_theme_option( 'footer_wide' );
	ob_start();
	if ( is_active_sidebar( $plumbing_footer_name ) ) {
		dynamic_sidebar( $plumbing_footer_name );
	}
	$plumbing_out = trim( ob_get_contents() );
	ob_end_clean();
	if ( ! empty( $plumbing_out ) ) {
		$plumbing_out          = preg_replace( "/<\\/aside>[\r\n\s]*<aside/", '</aside><aside', $plumbing_out );
		$plumbing_need_columns = true;   //or check: strpos($plumbing_out, 'columns_wrap')===false;
		if ( $plumbing_need_columns ) {
			$plumbing_columns = max( 0, (int) plumbing_get_theme_option( 'footer_columns' ) );			
			if ( 0 == $plumbing_columns ) {
				$plumbing_columns = min( 4, max( 1, plumbing_tags_count( $plumbing_out, 'aside' ) ) );
			}
			if ( $plumbing_columns > 1 ) {
				$plumbing_out = preg_replace( '/<aside([^>]*)class="widget/', '<aside$1class="column-1_' . esc_attr( $plumbing_columns ) . ' widget', $plumbing_out );
			} else {
				$plumbing_need_columns = false;
			}
		}
		?>
		<div class="footer_widgets_wrap widget_area<?php echo ! empty( $plumbing_footer_wide ) ? ' footer_fullwidth' : ''; ?> sc_layouts_row sc_layouts_row_type_normal">
			<div class="footer_widgets_inner widget_area_inner">
				<?php
				if ( ! $plumbing_footer_wide ) {
					?>
					<div class="content_wrap">
					<?php
				}
				if ( $plumbing_need_columns ) {
					?>
					<div class="columns_wrap">
					<?php
				}
				do_action( 'plumbing_action_before_sidebar' );
				plumbing_show_layout( $plumbing_out );
				do_action( 'plumbing_action_after_sidebar' );
				if ( $plumbing_need_columns ) {
					?>
					</div><!-- /.columns_wrap -->
					<?php
				}
				if ( ! $plumbing_footer_wide ) {
					?>
					</div><!-- /.content_wrap -->
					<?php
				}
				?>
			</div><!-- /.footer_widgets_inner -->
		</div><!-- /.footer_widgets_wrap -->
		<?php
	}
}

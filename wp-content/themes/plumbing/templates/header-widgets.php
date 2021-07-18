<?php
/**
 * The template to display the widgets area in the header
 *
 * @package WordPress
 * @subpackage PLUMBING
 * @since PLUMBING 1.0
 */

// Header sidebar
$plumbing_header_name    = plumbing_get_theme_option( 'header_widgets' );
$plumbing_header_present = ! plumbing_is_off( $plumbing_header_name ) && is_active_sidebar( $plumbing_header_name );
if ( $plumbing_header_present ) {
	plumbing_storage_set( 'current_sidebar', 'header' );
	$plumbing_header_wide = plumbing_get_theme_option( 'header_wide' );
	ob_start();
	if ( is_active_sidebar( $plumbing_header_name ) ) {
		dynamic_sidebar( $plumbing_header_name );
	}
	$plumbing_widgets_output = ob_get_contents();
	ob_end_clean();
	if ( ! empty( $plumbing_widgets_output ) ) {
		$plumbing_widgets_output = preg_replace( "/<\/aside>[\r\n\s]*<aside/", '</aside><aside', $plumbing_widgets_output );
		$plumbing_need_columns   = strpos( $plumbing_widgets_output, 'columns_wrap' ) === false;
		if ( $plumbing_need_columns ) {
			$plumbing_columns = max( 0, (int) plumbing_get_theme_option( 'header_columns' ) );
			if ( 0 == $plumbing_columns ) {
				$plumbing_columns = min( 6, max( 1, plumbing_tags_count( $plumbing_widgets_output, 'aside' ) ) );
			}
			if ( $plumbing_columns > 1 ) {
				$plumbing_widgets_output = preg_replace( '/<aside([^>]*)class="widget/', '<aside$1class="column-1_' . esc_attr( $plumbing_columns ) . ' widget', $plumbing_widgets_output );
			} else {
				$plumbing_need_columns = false;
			}
		}
		?>
		<div class="header_widgets_wrap widget_area<?php echo ! empty( $plumbing_header_wide ) ? ' header_fullwidth' : ' header_boxed'; ?>">
			<div class="header_widgets_inner widget_area_inner">
				<?php
				if ( ! $plumbing_header_wide ) {
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
				plumbing_show_layout( $plumbing_widgets_output );
				do_action( 'plumbing_action_after_sidebar' );
				if ( $plumbing_need_columns ) {
					?>
					</div>	<!-- /.columns_wrap -->
					<?php
				}
				if ( ! $plumbing_header_wide ) {
					?>
					</div>	<!-- /.content_wrap -->
					<?php
				}
				?>
			</div>	<!-- /.header_widgets_inner -->
		</div>	<!-- /.header_widgets_wrap -->
		<?php
	}
}

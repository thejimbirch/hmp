<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package WordPress
 * @subpackage PLUMBING
 * @since PLUMBING 1.0
 */

if ( plumbing_sidebar_present() ) {
	ob_start();
	$plumbing_sidebar_name = plumbing_get_theme_option( 'sidebar_widgets' );
	plumbing_storage_set( 'current_sidebar', 'sidebar' );
	if ( is_active_sidebar( $plumbing_sidebar_name ) ) {
		dynamic_sidebar( $plumbing_sidebar_name );
	}
	$plumbing_out = trim( ob_get_contents() );
	ob_end_clean();
	if ( ! empty( $plumbing_out ) ) {
		$plumbing_sidebar_position    = plumbing_get_theme_option( 'sidebar_position' );
		$plumbing_sidebar_position_ss = plumbing_get_theme_option( 'sidebar_position_ss' );
		?>
		<div class="sidebar widget_area
			<?php
			echo ' ' . esc_attr( $plumbing_sidebar_position );
			echo ' sidebar_' . esc_attr( $plumbing_sidebar_position_ss );

			if ( 'float' == $plumbing_sidebar_position_ss ) {
				echo ' sidebar_float';
			}
			$plumbing_sidebar_scheme = plumbing_get_theme_option( 'sidebar_scheme' );
			if ( ! empty( $plumbing_sidebar_scheme ) && ! plumbing_is_inherit( $plumbing_sidebar_scheme ) ) {
				echo ' scheme_' . esc_attr( $plumbing_sidebar_scheme );
			}
			?>
		" role="complementary">
			<?php
			// Single posts banner before sidebar
			plumbing_show_post_banner( 'sidebar' );
			// Button to show/hide sidebar on mobile
			if ( in_array( $plumbing_sidebar_position_ss, array( 'above', 'float' ) ) ) {
				$plumbing_title = apply_filters( 'plumbing_filter_sidebar_control_title', 'float' == $plumbing_sidebar_position_ss ? esc_html__( 'Show Sidebar', 'plumbing' ) : '' );
				$plumbing_text  = apply_filters( 'plumbing_filter_sidebar_control_text', 'above' == $plumbing_sidebar_position_ss ? esc_html__( 'Show Sidebar', 'plumbing' ) : '' );
				?>
				<a href="#" class="sidebar_control" title="<?php echo esc_attr( $plumbing_title ); ?>"><?php echo esc_html( $plumbing_text ); ?></a>
				<?php
			}
			?>
			<div class="sidebar_inner">
				<?php
				do_action( 'plumbing_action_before_sidebar' );
				plumbing_show_layout( preg_replace( "/<\/aside>[\r\n\s]*<aside/", '</aside><aside', $plumbing_out ) );
				do_action( 'plumbing_action_after_sidebar' );
				?>
			</div><!-- /.sidebar_inner -->
		</div><!-- /.sidebar -->
		<div class="clearfix"></div>
		<?php
	}
}

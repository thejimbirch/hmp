<?php
/**
 * The template to show mobile menu
 *
 * @package WordPress
 * @subpackage PLUMBING
 * @since PLUMBING 1.0
 */
?>
<div class="menu_mobile_overlay"></div>
<div class="menu_mobile menu_mobile_<?php echo esc_attr( plumbing_get_theme_option( 'menu_mobile_fullscreen' ) > 0 ? 'fullscreen' : 'narrow' ); ?> scheme_dark">
	<div class="menu_mobile_inner">
		<a class="menu_mobile_close theme_button_close"><span class="theme_button_close_icon"></span></a>
		<?php

		// Logo
		set_query_var( 'plumbing_logo_args', array( 'type' => 'mobile' ) );
		get_template_part( apply_filters( 'plumbing_filter_get_template_part', 'templates/header-logo' ) );
		set_query_var( 'plumbing_logo_args', array() );

		// Mobile menu
		$plumbing_menu_mobile = plumbing_get_nav_menu( 'menu_mobile' );
		if ( empty( $plumbing_menu_mobile ) ) {
			$plumbing_menu_mobile = apply_filters( 'plumbing_filter_get_mobile_menu', '' );
			if ( empty( $plumbing_menu_mobile ) ) {
				$plumbing_menu_mobile = plumbing_get_nav_menu( 'menu_main' );
				if ( empty( $plumbing_menu_mobile ) ) {
					$plumbing_menu_mobile = plumbing_get_nav_menu();
				}
			}
		}
		if ( ! empty( $plumbing_menu_mobile ) ) {
			$plumbing_menu_mobile = str_replace(
				array( 'menu_main',   'id="menu-',        'sc_layouts_menu_nav', 'sc_layouts_menu ', 'sc_layouts_hide_on_mobile', 'hide_on_mobile' ),
				array( 'menu_mobile', 'id="menu_mobile-', '',                    ' ',                '',                          '' ),
				$plumbing_menu_mobile
			);
			if ( strpos( $plumbing_menu_mobile, '<nav ' ) === false ) {
				$plumbing_menu_mobile = sprintf( '<nav class="menu_mobile_nav_area" itemscope itemtype="//schema.org/SiteNavigationElement">%s</nav>', $plumbing_menu_mobile );
			}
			plumbing_show_layout( apply_filters( 'plumbing_filter_menu_mobile_layout', $plumbing_menu_mobile ) );
		}

		// Search field
		do_action(
			'plumbing_action_search',
			array(
				'style' => 'normal',
				'class' => 'search_mobile',
				'ajax'  => false
			)
		);

		// Social icons
		plumbing_show_layout( plumbing_get_socials_links(), '<div class="socials_mobile">', '</div>' );
		?>
	</div>
</div>

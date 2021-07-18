<?php
/**
 * The template to display Admin notices
 *
 * @package WordPress
 * @subpackage PLUMBING
 * @since PLUMBING 1.0.1
 */

$plumbing_theme_obj = wp_get_theme();
?>
<div class="plumbing_admin_notice plumbing_welcome_notice update-nag">
	<?php
	// Theme image
	$plumbing_theme_img = plumbing_get_file_url( 'screenshot.jpg' );
	if ( '' != $plumbing_theme_img ) {
		?>
		<div class="plumbing_notice_image"><img src="<?php echo esc_url( $plumbing_theme_img ); ?>" alt="<?php esc_attr_e( 'Theme screenshot', 'plumbing' ); ?>"></div>
		<?php
	}

	// Title
	?>
	<h3 class="plumbing_notice_title">
		<?php
		echo esc_html(
			sprintf(
				// Translators: Add theme name and version to the 'Welcome' message
				__( 'Welcome to %1$s v.%2$s', 'plumbing' ),
				$plumbing_theme_obj->name . ( PLUMBING_THEME_FREE ? ' ' . __( 'Free', 'plumbing' ) : '' ),
				$plumbing_theme_obj->version
			)
		);
		?>
	</h3>
	<?php

	// Description
	?>
	<div class="plumbing_notice_text">
		<p class="plumbing_notice_text_description">
			<?php
			echo str_replace( '. ', '.<br>', wp_kses_data( $plumbing_theme_obj->description ) );
			?>
		</p>
		<p class="plumbing_notice_text_info">
			<?php
			echo wp_kses_data( __( 'Attention! Plugin "ThemeREX Addons" is required! Please, install and activate it!', 'plumbing' ) );
			?>
		</p>
	</div>
	<?php

	// Buttons
	?>
	<div class="plumbing_notice_buttons">
		<?php
		// Link to the page 'About Theme'
		?>
		<a href="<?php echo esc_url( admin_url() . 'themes.php?page=plumbing_about' ); ?>" class="button button-primary"><i class="dashicons dashicons-nametag"></i> 
			<?php
			echo esc_html__( 'Install plugin "ThemeREX Addons"', 'plumbing' );
			?>
		</a>
		<?php		
		// Dismiss this notice
		?>
		<a href="#" class="plumbing_hide_notice"><i class="dashicons dashicons-dismiss"></i> <span class="plumbing_hide_notice_text"><?php esc_html_e( 'Dismiss', 'plumbing' ); ?></span></a>
	</div>
</div>

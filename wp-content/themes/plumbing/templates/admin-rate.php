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
<div class="plumbing_admin_notice plumbing_rate_notice update-nag">
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
	<h3 class="plumbing_notice_title"><a href="<?php echo esc_url( plumbing_storage_get( 'theme_rate_url' ) ); ?>" target="_blank">
		<?php
		echo esc_html(
			sprintf(
				// Translators: Add theme name and version to the 'Welcome' message
				__( 'Rate our theme "%s", please', 'plumbing' ),
				$plumbing_theme_obj->name . ( PLUMBING_THEME_FREE ? ' ' . __( 'Free', 'plumbing' ) : '' )
			)
		);
		?>
	</a></h3>
	<?php

	// Description
	?>
	<div class="plumbing_notice_text">
		<p><?php echo wp_kses_data( __( 'We are glad you chose our WP theme for your website. You have done well customizing your website and we hope that you have enjoyed working with our theme.', 'plumbing' ) ); ?></p>
		<p><?php echo wp_kses_data( __( 'It would be just awesome if you spend just a minute of your time to rate our theme or the customer service you have received from us.', 'plumbing' ) ); ?></p>
		<p class="plumbing_notice_text_info"><?php echo wp_kses_data( __( '* We love receiving your reviews! Every time you leave a review, our CEO Henry Rise gives $5 to homeless dog shelter! Save the planet with us!', 'plumbing' ) ); ?></p>
	</div>
	<?php

	// Buttons
	?>
	<div class="plumbing_notice_buttons">
		<?php
		// Link to the theme download page
		?>
		<a href="<?php echo esc_url( plumbing_storage_get( 'theme_rate_url' ) ); ?>" class="button button-primary" target="_blank"><i class="dashicons dashicons-star-filled"></i> 
			<?php
			// Translators: Add theme name
			echo esc_html( sprintf( __( 'Rate theme %s', 'plumbing' ), $plumbing_theme_obj->name ) );
			?>
		</a>
		<?php
		// Link to the theme support
		?>
		<a href="<?php echo esc_url( plumbing_storage_get( 'theme_support_url' ) ); ?>" class="button" target="_blank"><i class="dashicons dashicons-sos"></i> 
			<?php
			esc_html_e( 'Support', 'plumbing' );
			?>
		</a>
		<?php
		// Link to the theme documentation
		?>
		<a href="<?php echo esc_url( plumbing_storage_get( 'theme_doc_url' ) ); ?>" class="button" target="_blank"><i class="dashicons dashicons-book"></i> 
			<?php
			esc_html_e( 'Documentation', 'plumbing' );
			?>
		</a>
		<?php
		// Dismiss
		?>
		<a href="#" class="plumbing_hide_notice"><i class="dashicons dashicons-dismiss"></i> <span class="plumbing_hide_notice_text"><?php esc_html_e( 'Dismiss', 'plumbing' ); ?></span></a>
	</div>
</div>

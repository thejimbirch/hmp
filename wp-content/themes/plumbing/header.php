<?php
/**
 * The Header: Logo and main menu
 *
 * @package WordPress
 * @subpackage PLUMBING
 * @since PLUMBING 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js
									<?php
										// Class scheme_xxx need in the <html> as context for the <body>!
										echo ' scheme_' . esc_attr( plumbing_get_theme_option( 'color_scheme' ) );
									?>
										">
<head>
	<?php wp_head(); ?>
</head>

<body <?php	body_class(); ?>>
    <?php	wp_body_open(); ?>

	<?php do_action( 'plumbing_action_before_body' ); ?>

	<div class="body_wrap">

		<div class="page_wrap">
			<?php
			// Desktop header
			$plumbing_header_type = plumbing_get_theme_option( 'header_type' );
			if ( 'custom' == $plumbing_header_type && ! plumbing_is_layouts_available() ) {
				$plumbing_header_type = 'default';
			}
			get_template_part( apply_filters( 'plumbing_filter_get_template_part', "templates/header-{$plumbing_header_type}" ) );

			// Side menu
			if ( in_array( plumbing_get_theme_option( 'menu_style' ), array( 'left', 'right' ) ) ) {
				get_template_part( apply_filters( 'plumbing_filter_get_template_part', 'templates/header-navi-side' ) );
			}

			// Mobile menu
			get_template_part( apply_filters( 'plumbing_filter_get_template_part', 'templates/header-navi-mobile' ) );
			
			// Single posts banner after header
			plumbing_show_post_banner( 'header' );
			?>

			<div class="page_content_wrap">
				<?php
				// Single posts banner on the background
				if ( is_singular( 'post' ) || is_singular( 'attachment' ) ) {

					plumbing_show_post_banner( 'background' );

					$plumbing_post_thumbnail_type  = plumbing_get_theme_option( 'post_thumbnail_type' );
					$plumbing_post_header_position = plumbing_get_theme_option( 'post_header_position' );
					$plumbing_post_header_align    = plumbing_get_theme_option( 'post_header_align' );

					// Boxed post thumbnail
					if ( in_array( $plumbing_post_thumbnail_type, array( 'boxed', 'fullwidth') ) ) {
						ob_start();
						?>
						<div class="header_content_wrap header_align_<?php echo esc_attr( $plumbing_post_header_align ); ?>">
							<?php
							if ( 'boxed' === $plumbing_post_thumbnail_type ) {
								?>
								<div class="content_wrap">
								<?php
							}

							// Post title and meta
							if ( 'above' === $plumbing_post_header_position ) {
								plumbing_show_post_title_and_meta();
							}

							// Featured image
							plumbing_show_post_featured_image();

							// Post title and meta
							if ( in_array( $plumbing_post_header_position, array( 'under', 'on_thumb' ) ) ) {
								plumbing_show_post_title_and_meta();
							}

							if ( 'boxed' === $plumbing_post_thumbnail_type ) {
								?>
								</div>
								<?php
							}
							?>
						</div>
						<?php
						$plumbing_post_header = ob_get_contents();
						ob_end_clean();
						if ( strpos( $plumbing_post_header, 'post_featured' ) !== false || strpos( $plumbing_post_header, 'post_title' ) !== false ) {
							plumbing_show_layout( $plumbing_post_header );
						}
					}
				}

				// Widgets area above page content
				$plumbing_body_style   = plumbing_get_theme_option( 'body_style' );
				$plumbing_widgets_name = plumbing_get_theme_option( 'widgets_above_page' );
				$plumbing_show_widgets = ! plumbing_is_off( $plumbing_widgets_name ) && is_active_sidebar( $plumbing_widgets_name );
				if ( $plumbing_show_widgets ) {
					if ( 'fullscreen' != $plumbing_body_style ) {
						?>
						<div class="content_wrap">
							<?php
					}
					plumbing_create_widgets_area( 'widgets_above_page' );
					if ( 'fullscreen' != $plumbing_body_style ) {
						?>
						</div><!-- </.content_wrap> -->
						<?php
					}
				}

				// Content area
				?>
				<div class="content_wrap<?php echo 'fullscreen' == $plumbing_body_style ? '_fullscreen' : ''; ?>">

					<div class="content">
						<?php
						// Widgets area inside page content
						plumbing_create_widgets_area( 'widgets_above_content' );

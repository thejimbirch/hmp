<div class="front_page_section front_page_section_contacts<?php
	$plumbing_scheme = plumbing_get_theme_option( 'front_page_contacts_scheme' );
	if ( ! empty( $plumbing_scheme ) && ! plumbing_is_inherit( $plumbing_scheme ) ) {
		echo ' scheme_' . esc_attr( $plumbing_scheme );
	}
	echo ' front_page_section_paddings_' . esc_attr( plumbing_get_theme_option( 'front_page_contacts_paddings' ) );
?>"
		<?php
		$plumbing_css      = '';
		$plumbing_bg_image = plumbing_get_theme_option( 'front_page_contacts_bg_image' );
		if ( ! empty( $plumbing_bg_image ) ) {
			$plumbing_css .= 'background-image: url(' . esc_url( plumbing_get_attachment_url( $plumbing_bg_image ) ) . ');';
		}
		if ( ! empty( $plumbing_css ) ) {
			echo ' style="' . esc_attr( $plumbing_css ) . '"';
		}
		?>
>
<?php
	// Add anchor
	$plumbing_anchor_icon = plumbing_get_theme_option( 'front_page_contacts_anchor_icon' );
	$plumbing_anchor_text = plumbing_get_theme_option( 'front_page_contacts_anchor_text' );
if ( ( ! empty( $plumbing_anchor_icon ) || ! empty( $plumbing_anchor_text ) ) && shortcode_exists( 'trx_sc_anchor' ) ) {
	echo do_shortcode(
		'[trx_sc_anchor id="front_page_section_contacts"'
									. ( ! empty( $plumbing_anchor_icon ) ? ' icon="' . esc_attr( $plumbing_anchor_icon ) . '"' : '' )
									. ( ! empty( $plumbing_anchor_text ) ? ' title="' . esc_attr( $plumbing_anchor_text ) . '"' : '' )
									. ']'
	);
}
?>
	<div class="front_page_section_inner front_page_section_contacts_inner
	<?php
	if ( plumbing_get_theme_option( 'front_page_contacts_fullheight' ) ) {
		echo ' plumbing-full-height sc_layouts_flex sc_layouts_columns_middle';
	}
	?>
			"
			<?php
			$plumbing_css      = '';
			$plumbing_bg_mask  = plumbing_get_theme_option( 'front_page_contacts_bg_mask' );
			$plumbing_bg_color_type = plumbing_get_theme_option( 'front_page_contacts_bg_color_type' );
			if ( 'custom' == $plumbing_bg_color_type ) {
				$plumbing_bg_color = plumbing_get_theme_option( 'front_page_contacts_bg_color' );
			} elseif ( 'scheme_bg_color' == $plumbing_bg_color_type ) {
				$plumbing_bg_color = plumbing_get_scheme_color( 'bg_color', $plumbing_scheme );
			} else {
				$plumbing_bg_color = '';
			}
			if ( ! empty( $plumbing_bg_color ) && $plumbing_bg_mask > 0 ) {
				$plumbing_css .= 'background-color: ' . esc_attr(
					1 == $plumbing_bg_mask ? $plumbing_bg_color : plumbing_hex2rgba( $plumbing_bg_color, $plumbing_bg_mask )
				) . ';';
			}
			if ( ! empty( $plumbing_css ) ) {
				echo ' style="' . esc_attr( $plumbing_css ) . '"';
			}
			?>
	>
		<div class="front_page_section_content_wrap front_page_section_contacts_content_wrap content_wrap">
			<?php

			// Title and description
			$plumbing_caption     = plumbing_get_theme_option( 'front_page_contacts_caption' );
			$plumbing_description = plumbing_get_theme_option( 'front_page_contacts_description' );
			if ( ! empty( $plumbing_caption ) || ! empty( $plumbing_description ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				// Caption
				if ( ! empty( $plumbing_caption ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
					?>
					<h2 class="front_page_section_caption front_page_section_contacts_caption front_page_block_<?php echo ! empty( $plumbing_caption ) ? 'filled' : 'empty'; ?>">
					<?php
						echo wp_kses( $plumbing_caption, 'plumbing_kses_content' );
					?>
					</h2>
					<?php
				}

				// Description
				if ( ! empty( $plumbing_description ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
					?>
					<div class="front_page_section_description front_page_section_contacts_description front_page_block_<?php echo ! empty( $plumbing_description ) ? 'filled' : 'empty'; ?>">
					<?php
						echo wp_kses( wpautop( $plumbing_description ), 'plumbing_kses_content'  );
					?>
					</div>
					<?php
				}
			}

			// Content (text)
			$plumbing_content = plumbing_get_theme_option( 'front_page_contacts_content' );
			$plumbing_layout  = plumbing_get_theme_option( 'front_page_contacts_layout' );
			if ( 'columns' == $plumbing_layout && ( ! empty( $plumbing_content ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) ) {
				?>
				<div class="front_page_section_columns front_page_section_contacts_columns columns_wrap">
					<div class="column-1_3">
				<?php
			}

			if ( ( ! empty( $plumbing_content ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) ) {
				?>
				<div class="front_page_section_content front_page_section_contacts_content front_page_block_<?php echo ! empty( $plumbing_content ) ? 'filled' : 'empty'; ?>">
				<?php
					echo wp_kses( $plumbing_content, 'plumbing_kses_content'  );
				?>
				</div>
				<?php
			}

			if ( 'columns' == $plumbing_layout && ( ! empty( $plumbing_content ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) ) {
				?>
				</div><div class="column-2_3">
				<?php
			}

			// Shortcode output
			$plumbing_sc = plumbing_get_theme_option( 'front_page_contacts_shortcode' );
			if ( ! empty( $plumbing_sc ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				?>
				<div class="front_page_section_output front_page_section_contacts_output front_page_block_<?php echo ! empty( $plumbing_sc ) ? 'filled' : 'empty'; ?>">
				<?php
					plumbing_show_layout( do_shortcode( $plumbing_sc ) );
				?>
				</div>
				<?php
			}

			if ( 'columns' == $plumbing_layout && ( ! empty( $plumbing_content ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) ) {
				?>
				</div></div>
				<?php
			}
			?>

		</div>
	</div>
</div>

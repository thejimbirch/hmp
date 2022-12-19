<div class="front_page_section front_page_section_googlemap<?php
	$plumbing_scheme = plumbing_get_theme_option( 'front_page_googlemap_scheme' );
	if ( ! empty( $plumbing_scheme ) && ! plumbing_is_inherit( $plumbing_scheme ) ) {
		echo ' scheme_' . esc_attr( $plumbing_scheme );
	}
	echo ' front_page_section_paddings_' . esc_attr( plumbing_get_theme_option( 'front_page_googlemap_paddings' ) );
?>"
		<?php
		$plumbing_css      = '';
		$plumbing_bg_image = plumbing_get_theme_option( 'front_page_googlemap_bg_image' );
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
	$plumbing_anchor_icon = plumbing_get_theme_option( 'front_page_googlemap_anchor_icon' );
	$plumbing_anchor_text = plumbing_get_theme_option( 'front_page_googlemap_anchor_text' );
if ( ( ! empty( $plumbing_anchor_icon ) || ! empty( $plumbing_anchor_text ) ) && shortcode_exists( 'trx_sc_anchor' ) ) {
	echo do_shortcode(
		'[trx_sc_anchor id="front_page_section_googlemap"'
									. ( ! empty( $plumbing_anchor_icon ) ? ' icon="' . esc_attr( $plumbing_anchor_icon ) . '"' : '' )
									. ( ! empty( $plumbing_anchor_text ) ? ' title="' . esc_attr( $plumbing_anchor_text ) . '"' : '' )
									. ']'
	);
}
?>
	<div class="front_page_section_inner front_page_section_googlemap_inner
	<?php
	if ( plumbing_get_theme_option( 'front_page_googlemap_fullheight' ) ) {
		echo ' plumbing-full-height sc_layouts_flex sc_layouts_columns_middle';
	}
	?>
			"
			<?php
			$plumbing_css      = '';
			$plumbing_bg_mask  = plumbing_get_theme_option( 'front_page_googlemap_bg_mask' );
			$plumbing_bg_color_type = plumbing_get_theme_option( 'front_page_googlemap_bg_color_type' );
			if ( 'custom' == $plumbing_bg_color_type ) {
				$plumbing_bg_color = plumbing_get_theme_option( 'front_page_googlemap_bg_color' );
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
		<div class="front_page_section_content_wrap front_page_section_googlemap_content_wrap
		<?php
			$plumbing_layout = plumbing_get_theme_option( 'front_page_googlemap_layout' );
		if ( 'fullwidth' != $plumbing_layout ) {
			echo ' content_wrap';
		}
		?>
		">
			<?php
			// Content wrap with title and description
			$plumbing_caption     = plumbing_get_theme_option( 'front_page_googlemap_caption' );
			$plumbing_description = plumbing_get_theme_option( 'front_page_googlemap_description' );
			if ( ! empty( $plumbing_caption ) || ! empty( $plumbing_description ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				if ( 'fullwidth' == $plumbing_layout ) {
					?>
					<div class="content_wrap">
					<?php
				}
					// Caption
				if ( ! empty( $plumbing_caption ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
					?>
					<h2 class="front_page_section_caption front_page_section_googlemap_caption front_page_block_<?php echo ! empty( $plumbing_caption ) ? 'filled' : 'empty'; ?>">
					<?php
					echo wp_kses( $plumbing_caption, 'plumbing_kses_content'  );
					?>
					</h2>
					<?php
				}

					// Description (text)
				if ( ! empty( $plumbing_description ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
					?>
					<div class="front_page_section_description front_page_section_googlemap_description front_page_block_<?php echo ! empty( $plumbing_description ) ? 'filled' : 'empty'; ?>">
					<?php
					echo wp_kses( wpautop( $plumbing_description ), 'plumbing_kses_content'  );
					?>
					</div>
					<?php
				}
				if ( 'fullwidth' == $plumbing_layout ) {
					?>
					</div>
					<?php
				}
			}

			// Content (text)
			$plumbing_content = plumbing_get_theme_option( 'front_page_googlemap_content' );
			if ( ! empty( $plumbing_content ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				if ( 'columns' == $plumbing_layout ) {
					?>
					<div class="front_page_section_columns front_page_section_googlemap_columns columns_wrap">
						<div class="column-1_3">
					<?php
				} elseif ( 'fullwidth' == $plumbing_layout ) {
					?>
					<div class="content_wrap">
					<?php
				}

				?>
				<div class="front_page_section_content front_page_section_googlemap_content front_page_block_<?php echo ! empty( $plumbing_content ) ? 'filled' : 'empty'; ?>">
				<?php
					echo wp_kses( $plumbing_content, 'plumbing_kses_content'  );
				?>
				</div>
				<?php

				if ( 'columns' == $plumbing_layout ) {
					?>
					</div><div class="column-2_3">
					<?php
				} elseif ( 'fullwidth' == $plumbing_layout ) {
					?>
					</div>
					<?php
				}
			}

			// Widgets output
			?>
			<div class="front_page_section_output front_page_section_googlemap_output">
			<?php
			if ( is_active_sidebar( 'front_page_googlemap_widgets' ) ) {
				dynamic_sidebar( 'front_page_googlemap_widgets' );
			} elseif ( current_user_can( 'edit_theme_options' ) ) {
				if ( ! plumbing_exists_trx_addons() ) {
					plumbing_customizer_need_trx_addons_message();
				} else {
					plumbing_customizer_need_widgets_message( 'front_page_googlemap_caption', 'ThemeREX Addons - Google map' );
				}
			}
			?>
			</div>
			<?php

			if ( 'columns' == $plumbing_layout && ( ! empty( $plumbing_content ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) ) {
				?>
				</div></div>
				<?php
			}
			?>
		</div>
	</div>
</div>

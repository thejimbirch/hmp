<?php
/**
 * Skins support
 *
 * @package WordPress
 * @subpackage PLUMBING
 * @since PLUMBING 1.0.46
 */

if ( ! defined( 'PLUMBING_SKIN_NAME' ) ) {
	define( 'PLUMBING_SKIN_NAME', get_option( sprintf( 'theme_skin_%s', get_option( 'stylesheet' ) ), PLUMBING_DEFAULT_SKIN ) );
}
if ( ! defined( 'PLUMBING_SKIN_DIR' ) ) {
	define( 'PLUMBING_SKIN_DIR', 'skins/' . trailingslashit( PLUMBING_SKIN_NAME ) );
}

// Theme init priorities:
// Action 'after_setup_theme'
// 1 - register filters to add/remove lists items in the Theme Options
if ( ! function_exists( 'plumbing_skins_theme_setup1' ) ) {
	add_action( 'after_setup_theme', 'plumbing_skins_theme_setup1', 1 );
	function plumbing_skins_theme_setup1() {
		plumbing_storage_set(
			'skins', apply_filters(
				'plumbing_filter_skins_list', array(
					'default' => array(
						'title'       => esc_html__( 'Default', 'plumbing' ),
						'description' => '',
						'image'       => 'skin.jpg',
						'demo_url'    => '//trex3.dev.themerex.dnw/',
					),
					'honor' => array(
						'title'       => esc_html__( 'Honor', 'plumbing' ),
						'description' => '',
						'image'       => 'skin.jpg',
						'demo_url'    => '//trex3.dev.themerex.dnw/',
					),
				)
			)
		);
	}
}



// Add skins folder to the theme-specific file search
//------------------------------------------------------------

// Check if file exists in the skin folder and return its path or empty string if file is not found
if ( ! function_exists( 'plumbing_skins_get_file_dir' ) ) {
	function plumbing_skins_get_file_dir( $file, $skin = PLUMBING_SKIN_NAME, $return_url = false ) {
		$dir      = '';
		if ( PLUMBING_ALLOW_SKINS ) {
			$skin_dir = 'skins/' . trailingslashit( $skin );
			if ( PLUMBING_CHILD_DIR != PLUMBING_THEME_DIR && file_exists( PLUMBING_CHILD_DIR . ( $skin_dir ) . ( $file ) ) ) {
				$dir = ( $return_url ? PLUMBING_CHILD_URL : PLUMBING_CHILD_DIR ) . ( $skin_dir ) . plumbing_check_min_file( $file, PLUMBING_CHILD_DIR . ( $skin_dir ) );
			} elseif ( file_exists( PLUMBING_THEME_DIR . ( $skin_dir ) . ( $file ) ) ) {
				$dir = ( $return_url ? PLUMBING_THEME_URL : PLUMBING_THEME_DIR ) . ( $skin_dir ) . plumbing_check_min_file( $file, PLUMBING_THEME_DIR . ( $skin_dir ) );
			}
		}
		return $dir;
	}
}

// Check if file exists in the skin folder and return its url or empty string if file is not found
if ( ! function_exists( 'plumbing_skins_get_file_url' ) ) {
	function plumbing_skins_get_file_url( $file, $skin = PLUMBING_SKIN_NAME ) {
		return plumbing_skins_get_file_dir( $file, $skin, true );
	}
}


// Add skins folder to the theme-specific files search
if ( ! function_exists( 'plumbing_skins_get_theme_file_dir' ) ) {
	add_filter( 'plumbing_filter_get_theme_file_dir', 'plumbing_skins_get_theme_file_dir', 10, 3 );
	function plumbing_skins_get_theme_file_dir( $dir, $file, $return_url = false ) {
		return plumbing_skins_get_file_dir( $file, PLUMBING_SKIN_NAME, $return_url );
	}
}


// Check if folder exists in the current skin folder and return its path or empty string if the folder is not found
if ( ! function_exists( 'plumbing_skins_get_folder_dir' ) ) {
	function plumbing_skins_get_theme_folder_dir( $folder, $skin = PLUMBING_SKIN_NAME, $return_url = false ) {
		$dir      = '';
		if ( PLUMBING_ALLOW_SKINS ) {
			$skin_dir = 'skins/' . trailingslashit( $skin );
			if ( PLUMBING_CHILD_DIR != PLUMBING_THEME_DIR && is_dir( PLUMBING_CHILD_DIR . ( $skin_dir ) . ( $folder ) ) ) {
				$dir = ( $return_url ? PLUMBING_CHILD_URL : PLUMBING_CHILD_DIR ) . ( $skin_dir ) . ( $folder );
			} elseif ( is_dir( PLUMBING_THEME_DIR . ( $skin_dir ) . ( $folder ) ) ) {
				$dir = ( $return_url ? PLUMBING_THEME_URL : PLUMBING_THEME_DIR ) . ( $skin_dir ) . ( $folder );
			}
		}
		return $dir;
	}
}

// Check if folder exists in the skin folder and return its url or empty string if folder is not found
if ( ! function_exists( 'plumbing_skins_get_folder_url' ) ) {
	function plumbing_skins_get_folder_url( $folder, $skin = PLUMBING_SKIN_NAME ) {
		return plumbing_skins_get_folder_dir( $folder, $skin, true );
	}
}

// Add skins folder to the theme-specific folders search
if ( ! function_exists( 'plumbing_skins_get_theme_folder_dir' ) ) {
	add_filter( 'plumbing_filter_get_theme_folder_dir', 'plumbing_skins_get_theme_folder_dir', 10, 3 );
	function plumbing_skins_get_theme_folder_dir( $dir, $folder, $return_url = false ) {
		return plumbing_skins_get_folder_dir( $folder, PLUMBING_SKIN_NAME, $return_url );
	}
}


// Add skins folder to the get_template_part
if ( ! function_exists( 'plumbing_skins_get_template_part' ) ) {
	add_filter( 'plumbing_filter_get_template_part', 'plumbing_skins_get_template_part', 10, 2 );
	function plumbing_skins_get_template_part( $slug, $part = '' ) {
		if ( ! empty( $part ) ) {
			$part = "-{$part}";
		}
		if ( plumbing_skins_get_file_dir( "{$slug}{$part}.php" ) != '' ) {
			$slug = sprintf( 'skins/%s/%s', PLUMBING_SKIN_NAME, $slug );
		}
		return $slug;
	}
}



// Add tab with skins to the 'Theme Panel'
//------------------------------------------------------

// Add step 'Skins'
if ( ! function_exists( 'plumbing_skins_theme_panel_steps' ) ) {
	add_filter( 'trx_addons_filter_theme_panel_steps', 'plumbing_skins_theme_panel_steps' );
	function plumbing_skins_theme_panel_steps( $steps ) {
		if ( PLUMBING_ALLOW_SKINS ) {
			$steps = plumbing_array_merge( array( 'skins' => wp_kses_data( __( 'Select a skin for your website.', 'plumbing' ) ) ), $steps );
		}
		return $steps;
	}
}

// Add tab link 'Skins'
if ( ! function_exists( 'plumbing_skins_theme_panel_tabs' ) ) {
	add_filter( 'trx_addons_filter_theme_panel_tabs', 'plumbing_skins_theme_panel_tabs' );
	function plumbing_skins_theme_panel_tabs( $tabs ) {
		if ( PLUMBING_ALLOW_SKINS ) {
			plumbing_array_insert_after( $tabs, 'general', array( 'skins' => esc_html__( 'Skins', 'plumbing' ) ) );
		}
		return $tabs;
	}
}


// Display 'Skins' section in the Theme Panel
if ( ! function_exists( 'plumbing_skins_theme_panel_section' ) ) {
	add_action( 'trx_addons_action_theme_panel_section', 'plumbing_skins_theme_panel_section', 10, 2);
	function plumbing_skins_theme_panel_section( $tab_id, $theme_info ) {
		if ( 'skins' !== $tab_id ) return;
		?>
		<div id="trx_addons_theme_panel_section_<?php echo esc_attr($tab_id); ?>" class="trx_addons_tabs_section">

			<?php
			do_action('trx_addons_action_theme_panel_section_start', $tab_id, $theme_info);

			if ( trx_addons_is_theme_activated() ) {
				?>
				<div class="trx_addons_theme_panel_skins_selector">

					<?php do_action('trx_addons_action_theme_panel_before_section_title', $tab_id, $theme_info); ?>
		
					<h1 class="trx_addons_theme_panel_section_title">
						<?php esc_html_e( 'Skins', 'plumbing' ); ?>
					</h1>

					<?php do_action('trx_addons_action_theme_panel_after_section_title', $tab_id, $theme_info); ?>

					<div class="trx_addons_theme_panel_section_info">
						<p><?php echo wp_kses_data( __( 'Choose a skin for your website. Depending on which skin is selected, the list of plugins and demo data may change.', 'plumbing' ) ); ?></p>
						<p><?php echo wp_kses_data( __( '<b>Attention!</b> Each skin is customized individually and has its own options. You will be able to change the skin later, but you will have to re-configure it.', 'plumbing' ) ); ?></p>
					</div>

					<?php do_action('trx_addons_action_theme_panel_before_list_items', $tab_id, $theme_info); ?>
					
					<div class="trx_addons_theme_panel_skins_list">
						<?php
						$skins = plumbing_storage_get( 'skins' );
						foreach ( $skins as $skin => $data ) {
							
							?><div class="trx_addons_image_block">
								<div class="trx_addons_image_block_inner
								 	<?php 
									// Skin image
									$img = plumbing_skins_get_file_url( $data['image'], $skin );
									if ( '' != $img ) {
										echo plumbing_add_inline_css_class( 'background-image: url(' . esc_url( $img ) . ');' );
									}				 	
								 	?>">
								 	<?php
									// Link to choose skin
									if ( PLUMBING_SKIN_NAME == $skin ) {
										?>
										<span class="trx_addons_image_block_link button button-action trx_addons_image_block_link_active">
											<?php
											esc_html_e( 'Active skin', 'plumbing' );
											?>
										</span>
										<?php
									} else {
										?>
										<a href="#"
											class="trx_addons_image_block_link trx_addons_image_block_link_choose_skin button button-primary"
											data-skin="<?php echo esc_attr( $skin ); ?>">
												<?php
												esc_html_e( 'Choose skin', 'plumbing' );
												?>
										</a>
										<?php
									}
									// Link to demo site
									if ( ! empty( $data['demo_url'] ) ) {
										?>
										<a href="<?php echo esc_url( $data['demo_url'] ); ?>" class="trx_addons_image_block_link trx_addons_image_block_link_view_demo button" target="_blank">
											<?php
											esc_html_e( 'View demo', 'plumbing' );
											?>
										</a>
										<?php
									}
									?>
							 	</div>
								<?php
								// Skin title
								if ( ! empty( $data['title'] ) ) {
									?>
									<h3 class="trx_addons_image_block_title">
										<i class="dashicons dashicons-admin-appearance"></i>
										<?php echo esc_html( $data['title'] ); ?>
									</h3>
									<?php
								}
								// Skin description
								if ( ! empty( $data['description'] ) ) {
									?>
									<div class="trx_addons_image_block_description">
										<?php
										echo wp_kses( $data['description'], 'plumbing_kses_content'  );
										?>
									</div>
									<?php
								}
								?>
							</div><?php // No spaces allowed after this <div>, because it is an inline-block element
						}
						?>
					</div>

					<?php do_action('trx_addons_action_theme_panel_after_list_items', $tab_id, $theme_info); ?>

				</div>
				<?php
				do_action('trx_addons_action_theme_panel_after_section_data', $tab_id, $theme_info);
			} else {
				?>
				<div class="error"><p>
					<?php esc_html_e( 'Activate your theme in order to be able to change skins.', 'plumbing' ); ?>
				</p></div>
				<?php
			}

			do_action('trx_addons_action_theme_panel_section_end', $tab_id, $theme_info);
			?>
		</div>
		<?php
	}
}


// Load page-specific scripts and styles
if ( ! function_exists( 'plumbing_skins_about_enqueue_scripts' ) ) {
	add_action( 'admin_enqueue_scripts', 'plumbing_skins_about_enqueue_scripts' );
	function plumbing_skins_about_enqueue_scripts() {
		$screen = function_exists( 'get_current_screen' ) ? get_current_screen() : false;
		if ( ! empty( $screen->id ) && false !== strpos($screen->id, '_page_trx_addons_theme_panel') ) {
			wp_enqueue_script( 'plumbing-skins-admin', plumbing_get_file_url( 'skins/skins-admin.js' ), array( 'jquery' ), null, true );
		}
	}
}

// Add page-specific vars to the localize array
if ( ! function_exists( 'plumbing_skins_localize_script' ) ) {
	add_filter( 'plumbing_filter_localize_script_admin', 'plumbing_skins_localize_script' );
	function plumbing_skins_localize_script( $arr ) {
		$arr['msg_switch_skin_caption'] = esc_html__( "Attention!", 'plumbing' );
		$arr['msg_switch_skin']         = apply_filters( 'plumbing_filter_msg_switch_skin',
			'<p>'
			. esc_html__( "Some skins require installation of additional plugins.", 'plumbing' )
			. '</p><p>'
			. esc_html__( "Also, after selecting a new skin, your theme settings will be changed.", 'plumbing' )
			. '</p>'
		);
		$arr['msg_switch_skin_success'] = esc_html__( 'A new skin is selected. The page will be reloaded.', 'plumbing' );
		$arr['msg_switch_skin_success_caption'] = esc_html__( 'Skin is changed!', 'plumbing' );
		return $arr;
	}
}

// AJAX handler for the 'plumbing_switch_skin' action
if ( ! function_exists( 'plumbing_skins_ajax_switch_skin' ) ) {
	add_action( 'wp_ajax_plumbing_switch_skin', 'plumbing_skins_ajax_switch_skin' );
	function plumbing_skins_ajax_switch_skin() {

		if ( ! wp_verify_nonce( plumbing_get_value_gp( 'nonce' ), admin_url( 'admin-ajax.php' ) ) ) {
			wp_die();
		}

		$response = array( 'error' => '' );

		$skin  = plumbing_get_value_gp( 'skin' );
		$skins = plumbing_storage_get( 'skins' );

		if ( empty( $skin ) || ! isset( $skins[ $skin ] ) ) {
			// Translators: Add the skin's name to the message
			$response['error'] = sprintf( __( 'Can not switch to the skin %s', 'plumbing' ), $skin );
		} elseif ( PLUMBING_SKIN_NAME == $skin ) {
			// Translators: Add the skin's name to the message
			$response['error'] = sprintf( esc_html__( 'Skin %s is already active', 'plumbing' ), $skin );
		} else {
			// Get current theme slug
			$theme_slug = get_option( 'stylesheet' );
			// Get options from new skin
			$skin_mods = get_option( sprintf( 'theme_mods_%1$s_skin_%2$s', $theme_slug, $skin ), false );
			if ( ! $skin_mods ) {
				if ( file_exists( PLUMBING_THEME_DIR . 'skins/skins-options.php' ) ) {
					require_once PLUMBING_THEME_DIR . 'skins/skins-options.php';
					if ( isset( $skins_options[ $skin ] ) ) {
						$skin_mods = plumbing_unserialize( $skins_options[ $skin ]['options'] );
					}
				}
			}
			if ( false !== $skin_mods ) {
				// Save current options
				update_option( sprintf( 'theme_mods_%1$s_skin_%2$s', $theme_slug, PLUMBING_SKIN_NAME ), get_theme_mods() );
				// Replace theme mods with options from new skin
				plumbing_options_update( $skin_mods );
				// Replace current skin
				update_option( sprintf( 'theme_skin_%s', $theme_slug ), $skin );
			} else {
				$response['error'] = esc_html__( 'Options of the new skin are not found!', 'plumbing' );
			}
		}

		echo json_encode( $response );
		wp_die();
	}
}


// One-click import support
//------------------------------------------------------------------------

// Export custom layouts
if ( ! function_exists( 'plumbing_skins_importer_export' ) ) {
	if ( is_admin() ) {
		add_action( 'trx_addons_action_importer_export', 'plumbing_skins_importer_export', 10, 1 );
	}
	function plumbing_skins_importer_export( $importer ) {
		$skins  = plumbing_storage_get( 'skins' );
		$output = '';
		if ( is_array( $skins ) && count( $skins ) > 0 ) {
			$output     = '<?php'
						. "\n//" . esc_html__( 'Skins', 'plumbing' )
						. "\n\$skins_options = array(";
			$counter    = 0;
			$theme_mods = get_theme_mods();
			$theme_slug = get_option( 'stylesheet' );
			foreach ( $skins as $skin => $skin_data ) {
				$options = get_option( sprintf( 'theme_mods_%1$s_skin_%2$s', $theme_slug, $skin ), false );
				if ( false === $options ) {
					$options = $theme_mods;
				}
				$output .= ( $counter++ ? ',' : '' )
						. "\n\t\t'{$skin}' => array("
						. "\n\t\t\t\t'options' => " . '"' . str_replace( array( "\r", "\n" ), array( '\r', '\n' ), addslashes( serialize( apply_filters( 'plumbing_filter_export_skin_options', $options, $skin ) ) ) ) . '"'
						. "\n\t\t\t\t)";
			}
			$output .= "\n\t\t);"
					. "\n?>";
		}
		plumbing_fpc( $importer->export_file_dir( 'skins.txt' ), $output );
	}
}

// Display exported data in the fields
if ( ! function_exists( 'plumbing_skins_importer_export_fields' ) ) {
	if ( is_admin() ) {
		add_action( 'trx_addons_action_importer_export_fields', 'plumbing_skins_importer_export_fields', 12, 1 );
	}
	function plumbing_skins_importer_export_fields( $importer ) {
		$importer->show_exporter_fields(
			array(
				'slug'     => 'skins',
				'title'    => esc_html__( 'Skins', 'plumbing' ),
				'download' => 'skins-options.php',
			)
		);
	}
}


// Load file with current skin
$plumbing_skin_file = plumbing_skins_get_file_dir( 'skin.php' );
if ( '' != $plumbing_skin_file ) {
	require_once $plumbing_skin_file;
}

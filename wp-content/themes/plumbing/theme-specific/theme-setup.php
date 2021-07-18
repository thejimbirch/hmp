<?php
/**
 * Setup theme-specific fonts and colors
 *
 * @package WordPress
 * @subpackage PLUMBING
 * @since PLUMBING 1.0.22
 */

// If this theme is a free version of premium theme
if ( ! defined( 'PLUMBING_THEME_FREE' ) ) {
	define( 'PLUMBING_THEME_FREE', false );
}
if ( ! defined( 'PLUMBING_THEME_FREE_WP' ) ) {
	define( 'PLUMBING_THEME_FREE_WP', false );
}

// If this theme is a part of Envato Elements
if ( ! defined( 'PLUMBING_THEME_IN_ENVATO_ELEMENTS' ) ) {
	define( 'PLUMBING_THEME_IN_ENVATO_ELEMENTS', false );
}

// If this theme uses multiple skins
if ( ! defined( 'PLUMBING_ALLOW_SKINS' ) ) {
	define( 'PLUMBING_ALLOW_SKINS', false );
}
if ( ! defined( 'PLUMBING_DEFAULT_SKIN' ) ) {
	define( 'PLUMBING_DEFAULT_SKIN', 'default' );
}



// Theme storage
// Attention! Must be in the global namespace to compatibility with WP CLI
//-------------------------------------------------------------------------
$GLOBALS['PLUMBING_STORAGE'] = array(

	// Key validator: market[env|loc]-vendor[axiom|ancora|themerex]
	'theme_pro_key'      => 'env-themerex',

	// Generate Personal token from Envato to automatic upgrade theme
	'upgrade_token_url'  => 'https://build.envato.com/create-token/?default=t&purchase:download=t&purchase:list=t',

	// Theme-specific URLs (will be escaped in place of the output)
	'theme_demo_url'     => 'http://plumbing-repair.themerex.net/',
	'theme_doc_url'      => '//plumbing-repair.themerex.net/doc',
	
	'theme_rate_url'     => 'https://themeforest.net/download',

	'theme_custom_url' => '//themerex.net/offers/?utm_source=offers&utm_medium=click&utm_campaign=themedash',

	'theme_download_url' => 'https://themeforest.net/item/plumbing-repair-building-construction-theme/12285911',            // ThemeREX

	'theme_support_url'  => 'https://themerex.net/support/',                             // ThemeREX

	'theme_video_url'    => 'https://www.youtube.com/channel/UCnFisBimrK2aIE-hnY70kCA',  // ThemeREX

	'theme_privacy_url'  => 'https://themerex.net/privacy-policy/',                      // ThemeREX

	// Comma separated slugs of theme-specific categories (for get relevant news in the dashboard widget)
	// (i.e. 'children,kindergarten')
	'theme_categories'   => '',

	// Responsive resolutions
	// Parameters to create css media query: min, max
	'responsive'         => array(
		// By size
		'xxl'        => array( 'max' => 1679 ),
		'xl'         => array( 'max' => 1439 ),
		'lg'         => array( 'max' => 1279 ),
		'md_over'    => array( 'min' => 1024 ),
		'md'         => array( 'max' => 1023 ),
		'sm'         => array( 'max' => 767 ),
		'sm_wp'      => array( 'max' => 600 ),
		'xs'         => array( 'max' => 479 ),
		// By device
		'wide'       => array(
			'min' => 2160
		),
		'desktop'    => array(
			'min' => 1680,
			'max' => 2159,
		),
		'notebook'   => array(
			'min' => 1280,
			'max' => 1679,
		),
		'tablet'     => array(
			'min' => 768,
			'max' => 1279,
		),
		'not_mobile' => array(
			'min' => 768
		),
		'mobile'     => array(
			'max' => 767
		),
	),
);



// THEME-SUPPORTED PLUGINS
// If plugin not need - remove its settings from next array
//----------------------------------------------------------
$plumbing_theme_required_plugins_group = esc_html__( 'Core', 'plumbing' );
$plumbing_theme_required_plugins = array(
	// Section: "CORE" (required plugins)
	// DON'T COMMENT OR REMOVE NEXT LINES!
	'trx_addons'         => array(
								'title'       => esc_html__( 'ThemeREX Addons', 'plumbing' ),
								'description' => esc_html__( "Will allow you to install recommended plugins, demo content, and improve the theme's functionality overall with multiple theme options", 'plumbing' ),
								'required'    => true,
								'logo'        => 'logo.png',
								'group'       => $plumbing_theme_required_plugins_group,
							),
);

// Section: "PAGE BUILDERS"
$plumbing_theme_required_plugins_group = esc_html__( 'Page Builders', 'plumbing' );
$plumbing_theme_required_plugins['elementor'] = array(
	'title'       => esc_html__( 'Elementor', 'plumbing' ),
	'description' => esc_html__( "Is a beautiful PageBuilder, even the free version of which allows you to create great pages using a variety of modules.", 'plumbing' ),
	'required'    => false,
	'logo'        => 'logo.png',
	'group'       => $plumbing_theme_required_plugins_group,
);
$plumbing_theme_required_plugins['gutenberg'] = array(
	'title'       => esc_html__( 'Gutenberg', 'plumbing' ),
	'description' => esc_html__( "It's a posts editor coming in place of the classic TinyMCE. Can be installed and used in parallel with Elementor", 'plumbing' ),
	'required'    => false,
	'install'     => false,      // Do not offer installation of the plugin in the Theme Dashboard and TGMPA
	'logo'        => 'logo.png',
	'group'       => $plumbing_theme_required_plugins_group,
);
if ( ! PLUMBING_THEME_FREE ) {
	$plumbing_theme_required_plugins['js_composer']          = array(
		'title'       => esc_html__( 'WPBakery PageBuilder', 'plumbing' ),
		'description' => esc_html__( "Popular PageBuilder which allows you to create excellent pages", 'plumbing' ),
		'required'    => false,
		'install'     => false,      // Do not offer installation of the plugin in the Theme Dashboard and TGMPA
		'logo'        => 'logo.jpg',
		'group'       => $plumbing_theme_required_plugins_group,
	);
	$plumbing_theme_required_plugins['vc-extensions-bundle'] = array(
		'title'       => esc_html__( 'WPBakery PageBuilder extensions bundle', 'plumbing' ),
		'description' => esc_html__( "Many shortcodes for the WPBakery PageBuilder", 'plumbing' ),
		'required'    => false,
		'install'     => false,      // Do not offer installation of the plugin in the Theme Dashboard and TGMPA
		'logo'        => 'logo.png',
		'group'       => $plumbing_theme_required_plugins_group,
	);
}

// Section: "E-COMMERCE"
$plumbing_theme_required_plugins_group = esc_html__( 'E-Commerce', 'plumbing' );
$plumbing_theme_required_plugins['woocommerce']              = array(
	'title'       => esc_html__( 'WooCommerce', 'plumbing' ),
	'description' => esc_html__( "Connect the store to your website and start selling now", 'plumbing' ),
	'required'    => false,
	'logo'        => 'logo.png',
	'group'       => $plumbing_theme_required_plugins_group,
);
$plumbing_theme_required_plugins['yith-woocommerce-compare']              = array(
	'title'       => esc_html__( 'YITH WooCommerce Compare', 'plumbing' ),
	'required'    => false,
	'logo'        => 'logo.jpg',
	'group'       => $plumbing_theme_required_plugins_group,
);
$plumbing_theme_required_plugins['yith-woocommerce-wishlist']              = array(
	'title'       => esc_html__( 'YITH WooCommerce Wishlist', 'plumbing' ),
	'required'    => false,
	'logo'        => 'logo.jpg',
	'group'       => $plumbing_theme_required_plugins_group,
);
$plumbing_theme_required_plugins['elegro-payment']              = array(
    'title'       => esc_html__( 'Elegro Crypto Payment', 'plumbing' ),
    'description' => esc_html__( "Extends WooCommerce Payment Gateways with an elegro Crypto Payment", 'plumbing' ),
    'required'    => false,
    'logo'        => 'elegro-payment.png',
    'group'       => $plumbing_theme_required_plugins_group,
);

// Section: "SOCIALS & COMMUNITIES"
$plumbing_theme_required_plugins_group = esc_html__( 'Socials and Communities', 'plumbing' );
$plumbing_theme_required_plugins['mailchimp-for-wp'] = array(
	'title'       => esc_html__( 'MailChimp for WP', 'plumbing' ),
	'description' => esc_html__( "Allows visitors to subscribe to newsletters", 'plumbing' ),
	'required'    => false,
	'logo'        => 'logo.png',
	'group'       => $plumbing_theme_required_plugins_group,
);

// Section: "EVENTS & TIMELINES"
$plumbing_theme_required_plugins_group = esc_html__( 'Events and Appointments', 'plumbing' );
if ( ! PLUMBING_THEME_FREE ) {
	$plumbing_theme_required_plugins['booked']                 = array(
		'title'       => esc_html__( 'Booked Appointments', 'plumbing' ),
		'description' => '',
		'required'    => false,
		'logo'        => 'logo.png',
		'group'       => $plumbing_theme_required_plugins_group,
	);
}

// Section: "CONTENT"
$plumbing_theme_required_plugins_group = esc_html__( 'Content', 'plumbing' );
$plumbing_theme_required_plugins['contact-form-7'] = array(
	'title'       => esc_html__( 'Contact Form 7', 'plumbing' ),
	'description' => esc_html__( "CF7 allows you to create an unlimited number of contact forms", 'plumbing' ),
	'required'    => false,
	'logo'        => 'logo.jpg',
	'group'       => $plumbing_theme_required_plugins_group,
);
if ( ! PLUMBING_THEME_FREE ) {
	$plumbing_theme_required_plugins['essential-grid']             = array(
		'title'       => esc_html__( 'Essential Grid', 'plumbing' ),
		'description' => '',
		'required'    => false,
		'logo'        => 'logo.png',
		'group'       => $plumbing_theme_required_plugins_group,
	);
	$plumbing_theme_required_plugins['revslider']                  = array(
		'title'       => esc_html__( 'Revolution Slider', 'plumbing' ),
		'description' => '',
		'required'    => false,
		'logo'        => 'logo.png',
		'group'       => $plumbing_theme_required_plugins_group,
	);
}

// Section: "OTHER"
$plumbing_theme_required_plugins_group = esc_html__( 'Other', 'plumbing' );
$plumbing_theme_required_plugins['wp-gdpr-compliance'] = array(
    'title'       => esc_html__( 'WP GDPR Compliance', 'plumbing' ),
    'description' => esc_html__( "Allow visitors to decide for themselves what personal data they want to store on your site", 'plumbing' ),
    'required'    => false,
    'logo'        => 'logo.png',
    'group'       => $plumbing_theme_required_plugins_group,
);
$plumbing_theme_required_plugins['twenty20'] = array(
    'title'       => esc_html__( 'Twenty20 Image Before-After', 'plumbing' ),
    'description' => '',
    'required'    => false,
    'logo'        => 'logo.png',
    'group'       => $plumbing_theme_required_plugins_group,
);
if ( ! PLUMBING_THEME_FREE ) {
    $plumbing_theme_required_plugins['trx_updater'] = array(
        'title' => esc_html__('ThemeREX Updater', 'plumbing'),
        'description' => esc_html__("Update theme and theme-specific plugins from developer's upgrade server.", 'plumbing'),
        'required' => false,
        'logo' => 'trx_updater.png',
        'group' => $plumbing_theme_required_plugins_group,
    );
}
// Add plugins list to the global storage
$GLOBALS['PLUMBING_STORAGE']['required_plugins'] = $plumbing_theme_required_plugins;



// THEME-SPECIFIC BLOG LAYOUTS
//----------------------------------------------
$plumbing_theme_blog_styles = array(
	'excerpt' => array(
		'title'   => esc_html__( 'Standard', 'plumbing' ),
		'archive' => 'index-excerpt',
		'item'    => 'content-excerpt',
		'styles'  => 'excerpt',
	),
	'classic' => array(
		'title'   => esc_html__( 'Classic', 'plumbing' ),
		'archive' => 'index-classic',
		'item'    => 'content-classic',
		'columns' => array( 2, 3 ),
		'styles'  => 'classic',
	),
);
if ( ! PLUMBING_THEME_FREE ) {
	$plumbing_theme_blog_styles['masonry']   = array(
		'title'   => esc_html__( 'Masonry', 'plumbing' ),
		'archive' => 'index-classic',
		'item'    => 'content-classic',
		'columns' => array( 2, 3 ),
		'styles'  => 'masonry',
	);
	$plumbing_theme_blog_styles['portfolio'] = array(
		'title'   => esc_html__( 'Portfolio', 'plumbing' ),
		'archive' => 'index-portfolio',
		'item'    => 'content-portfolio',
		'columns' => array( 2, 3, 4 ),
		'styles'  => 'portfolio',
	);
	$plumbing_theme_blog_styles['gallery']   = array(
		'title'   => esc_html__( 'Gallery', 'plumbing' ),
		'archive' => 'index-portfolio',
		'item'    => 'content-portfolio-gallery',
		'columns' => array( 2, 3, 4 ),
		'styles'  => array( 'portfolio', 'gallery' ),
	);
	$plumbing_theme_blog_styles['chess']     = array(
		'title'   => esc_html__( 'Chess', 'plumbing' ),
		'archive' => 'index-chess',
		'item'    => 'content-chess',
		'columns' => array( 1, 2, 3 ),
		'styles'  => 'chess',
	);
}

// Add list of blog styles to the global storage
$GLOBALS['PLUMBING_STORAGE']['blog_styles'] = $plumbing_theme_blog_styles;


// Theme init priorities:
// Action 'after_setup_theme'
// 1 - register filters to add/remove lists items in the Theme Options
// 2 - create Theme Options
// 3 - add/remove Theme Options elements
// 5 - load Theme Options. Attention! After this step you can use only basic options (not overriden)
// 9 - register other filters (for installer, etc.)
//10 - standard Theme init procedures (not ordered)
// Action 'wp_loaded'
// 1 - detect override mode. Attention! Only after this step you can use overriden options (separate values for the shop, courses, etc.)

if ( ! function_exists( 'plumbing_customizer_theme_setup1' ) ) {
	add_action( 'after_setup_theme', 'plumbing_customizer_theme_setup1', 1 );
	function plumbing_customizer_theme_setup1() {

		// -----------------------------------------------------------------
		// -- ONLY FOR PROGRAMMERS, NOT FOR CUSTOMER
		// -- Internal theme settings
		// -----------------------------------------------------------------
		plumbing_storage_set(
			'settings', array(

				'duplicate_options'      => 'child',                    // none  - use separate options for the main and the child-theme
																		// child - duplicate theme options from the main theme to the child-theme only
																		// both  - sinchronize changes in the theme options between main and child themes

				'customize_refresh'      => 'auto',                     // Refresh method for preview area in the Appearance - Customize:
																		// auto - refresh preview area on change each field with Theme Options
																		// manual - refresh only obn press button 'Refresh' at the top of Customize frame

				'max_load_fonts'         => 5,                          // Max fonts number to load from Google fonts or from uploaded fonts

				'comment_after_name'     => true,                       // Place 'comment' field after the 'name' and 'email'

				'show_author_avatar'     => true,                       // Display author's avatar in the post meta

				'icons_selector'         => 'internal',                 // Icons selector in the shortcodes:
																		// internal - internal popup with plugin's or theme's icons list (fast and support images and svg)

				'icons_type'             => 'icons',                    // Type of icons (if 'icons_selector' is 'internal'):
																		// icons  - use font icons to present icons
																		// images - use images from theme's folder trx_addons/css/icons.png
																		// svg    - use svg from theme's folder trx_addons/css/icons.svg

				'socials_type'           => 'icons',                    // Type of socials icons (if 'icons_selector' is 'internal'):
																		// icons  - use font icons to present social networks
																		// images - use images from theme's folder trx_addons/css/icons.png
																		// svg    - use svg from theme's folder trx_addons/css/icons.svg

				'check_min_version'      => true,                       // Check if exists a .min version of .css and .js and return path to it
																		// instead the path to the original file
																		// (if debug_mode is off and modification time of the original file < time of the .min file)

				'autoselect_menu'        => false,                      // Show any menu if no menu selected in the location 'main_menu'
																		// (for example, the theme is just activated)

				'disable_jquery_ui'      => false,                      // Prevent loading custom jQuery UI libraries in the third-party plugins

				'use_mediaelements'      => true,                       // Load script "Media Elements" to play video and audio

				'tgmpa_upload'           => false,                      // Allow upload not pre-packaged plugins via TGMPA

				'allow_no_image'         => false,                      // Allow to use theme-specific image placeholder if no image present in the blog, related posts, post navigation, etc.

				'separate_schemes'       => true,                       // Save color schemes to the separate files __color_xxx.css (true) or append its to the __custom.css (false)

				'allow_fullscreen'       => false,                      // Allow cases 'fullscreen' and 'fullwide' for the body style in the Theme Options
																		// In the Page Options this styles are present always
																		// (can be removed if filter 'plumbing_filter_allow_fullscreen' return false)

				'attachments_navigation' => false,                      // Add arrows on the single attachment page to navigate to the prev/next attachment

				'gutenberg_safe_mode'    => array(),                    // 'vc', 'elementor' - Prevent simultaneous editing of posts for Gutenberg and other PageBuilders (VC, Elementor)

				'gutenberg_add_context'  => false,                      // Add context to the Gutenberg editor styles with our method (if true - use if any problem with editor styles) or use native Gutenberg way via add_editor_style() (if false - used by default)

				'allow_gutenberg_blocks' => true,                       // Allow our shortcodes and widgets as blocks in the Gutenberg (not ready yet - in the development now)

				'subtitle_above_title'   => true,                       // Put subtitle above the title in the shortcodes

				'add_hide_on_xxx'        => 'replace',                  // Add our breakpoints to the Responsive section of each element
																		// 'add' - add our breakpoints after Elementor's
																		// 'replace' - add our breakpoints instead Elementor's
																		// 'none' - don't add our breakpoints (using only Elementor's)
			)
		);

		// -----------------------------------------------------------------
		// -- Theme fonts (Google and/or custom fonts)
		// -----------------------------------------------------------------

		// Fonts to load when theme start
		// It can be Google fonts or uploaded fonts, placed in the folder /css/font-face/font-name inside the theme folder
		// Attention! Font's folder must have name equal to the font's name, with spaces replaced on the dash '-'
		
		plumbing_storage_set(
			'load_fonts', array(
				// Google font
				array(
					'name'   => 'Lato',
					'family' => 'sans-serif',
					'styles' => '300,400,700,900',     // Parameter 'style' used only for the Google fonts
				),
			)
		);

		// Characters subset for the Google fonts. Available values are: latin,latin-ext,cyrillic,cyrillic-ext,greek,greek-ext,vietnamese
		plumbing_storage_set( 'load_fonts_subset', 'latin,latin-ext' );

		// Settings of the main tags
		// Attention! Font name in the parameter 'font-family' will be enclosed in the quotes and no spaces after comma!
		
		
		

		plumbing_storage_set(
			'theme_fonts', array(
				'p'       => array(
					'title'           => esc_html__( 'Main text', 'plumbing' ),
					'description'     => esc_html__( 'Font settings of the main text of the site. Attention! For correct display of the site on mobile devices, use only units "rem", "em" or "ex"', 'plumbing' ),
					'font-family'     => '"Lato",sans-serif',
					'font-size'       => '1.142857rem',
					'font-weight'     => '400',
					'font-style'      => 'normal',
					'line-height'     => '1.63em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0',
					'margin-top'      => '0em',
					'margin-bottom'   => '1.6em',
				),
				'h1'      => array(
					'title'           => esc_html__( 'Heading 1', 'plumbing' ),
					'font-family'     => '"Lato",sans-serif',
					'font-size'       => '3.928571rem',
					'font-weight'     => '700',
					'font-style'      => 'normal',
					'line-height'     => '1.363636em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0',
					'margin-top'      => '1.35em',
					'margin-bottom'   => '0.62em',
				),
				'h2'      => array(
					'title'           => esc_html__( 'Heading 2', 'plumbing' ),
					'font-family'     => '"Lato",sans-serif',
					'font-size'       => '2.857142rem',
					'font-weight'     => '700',
					'font-style'      => 'normal',
					'line-height'     => '1.375em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0',
					'margin-top'      => '1.5em',
					'margin-bottom'   => '0.72em',
				),
				'h3'      => array(
					'title'           => esc_html__( 'Heading 3', 'plumbing' ),
					'font-family'     => '"Lato",sans-serif',
					'font-size'       => '2.142857rem',
					'font-weight'     => '700',
					'font-style'      => 'normal',
					'line-height'     => '1.4em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0',
					'margin-top'      => '1.7em',
					'margin-bottom'   => '0.7879em',
				),
				'h4'      => array(
					'title'           => esc_html__( 'Heading 4', 'plumbing' ),
					'font-family'     => '"Lato",sans-serif',
					'font-size'       => '1.714285rem',
					'font-weight'     => '700',
					'font-style'      => 'normal',
					'line-height'     => '1.416em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0',
					'margin-top'      => '1.9em',
					'margin-bottom'   => '0.65em',
				),
				'h5'      => array(
					'title'           => esc_html__( 'Heading 5', 'plumbing' ),
					'font-family'     => '"Lato",sans-serif',
					'font-size'       => '1.285714rem',
					'font-weight'     => '700',
					'font-style'      => 'normal',
					'line-height'     => '1.4444em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0',
					'margin-top'      => '2.6em',
					'margin-bottom'   => '0.85em',
				),
				'h6'      => array(
					'title'           => esc_html__( 'Heading 6', 'plumbing' ),
					'font-family'     => '"Lato",sans-serif',
					'font-size'       => '1.142857rem',
					'font-weight'     => '700',
					'font-style'      => 'normal',
					'line-height'     => '1.4375em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0',
					'margin-top'      => '2.2em',
					'margin-bottom'   => '0.6em',
				),
				'logo'    => array(
					'title'           => esc_html__( 'Logo text', 'plumbing' ),
					'description'     => esc_html__( 'Font settings of the text case of the logo', 'plumbing' ),
					'font-family'     => '"Lato",sans-serif',
					'font-size'       => '1.8em',
					'font-weight'     => '400',
					'font-style'      => 'normal',
					'line-height'     => '1.25em',
					'text-decoration' => 'none',
					'text-transform'  => 'uppercase',
					'letter-spacing'  => '1px',
				),
				'button'  => array(
					'title'           => esc_html__( 'Buttons', 'plumbing' ),
					'font-family'     => '"Lato",sans-serif',
					'font-size'       => '0.857142rem',
					'font-weight'     => '900',
					'font-style'      => 'normal',
					'line-height'     => 'normal',
					'text-decoration' => 'none',
					'text-transform'  => 'uppercase',
					'letter-spacing'  => '0',
				),
				'input'   => array(
					'title'           => esc_html__( 'Input fields', 'plumbing' ),
					'description'     => esc_html__( 'Font settings of the input fields, dropdowns and textareas', 'plumbing' ),
					'font-family'     => '"Lato",sans-serif',
					'font-size'       => '1.142857rem',
					'font-weight'     => '400',
					'font-style'      => 'normal',
					'line-height'     => 'normal', // Attention! Firefox don't allow line-height less then 1.5em in the select
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0',
				),
				'info'    => array(
					'title'           => esc_html__( 'Post meta', 'plumbing' ),
					'description'     => esc_html__( 'Font settings of the post meta: date, counters, share, etc.', 'plumbing' ),
					'font-family'     => 'inherit',
					'font-size'       => '1.142857rem',  // Old value '13px' don't allow using 'font zoom' in the custom blog items
					'font-weight'     => '400',
					'font-style'      => 'normal',
					'line-height'     => 'normal',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0',
					'margin-top'      => '',
					'margin-bottom'   => '',
				),
				'menu'    => array(
					'title'           => esc_html__( 'Main menu', 'plumbing' ),
					'description'     => esc_html__( 'Font settings of the main menu items', 'plumbing' ),
					'font-family'     => '"Lato",sans-serif',
					'font-size'       => '1rem',
					'font-weight'     => '900',
					'font-style'      => 'normal',
					'line-height'     => 'normal',
					'text-decoration' => 'none',
					'text-transform'  => 'uppercase',
					'letter-spacing'  => '0',
				),
				'submenu' => array(
					'title'           => esc_html__( 'Dropdown menu', 'plumbing' ),
					'description'     => esc_html__( 'Font settings of the dropdown menu items', 'plumbing' ),
					'font-family'     => '"Lato",sans-serif',
					'font-size'       => '0.928571rem',
					'font-weight'     => '600',
					'font-style'      => 'normal',
					'line-height'     => '1.5em',
					'text-decoration' => 'none',
					'text-transform'  => 'uppercase',
					'letter-spacing'  => '0',
				),
			)
		);

		// -----------------------------------------------------------------
		// -- Theme colors for customizer
		// -- Attention! Inner scheme must be last in the array below
		// -----------------------------------------------------------------
		plumbing_storage_set(
			'scheme_color_groups', array(
				'main'    => array(
					'title'       => esc_html__( 'Main', 'plumbing' ),
					'description' => esc_html__( 'Colors of the main content area', 'plumbing' ),
				),
				'alter'   => array(
					'title'       => esc_html__( 'Alter', 'plumbing' ),
					'description' => esc_html__( 'Colors of the alternative blocks (sidebars, etc.)', 'plumbing' ),
				),
				'extra'   => array(
					'title'       => esc_html__( 'Extra', 'plumbing' ),
					'description' => esc_html__( 'Colors of the extra blocks (dropdowns, price blocks, table headers, etc.)', 'plumbing' ),
				),
				'inverse' => array(
					'title'       => esc_html__( 'Inverse', 'plumbing' ),
					'description' => esc_html__( 'Colors of the inverse blocks - when link color used as background of the block (dropdowns, blockquotes, etc.)', 'plumbing' ),
				),
				'input'   => array(
					'title'       => esc_html__( 'Input', 'plumbing' ),
					'description' => esc_html__( 'Colors of the form fields (text field, textarea, select, etc.)', 'plumbing' ),
				),
			)
		);
		plumbing_storage_set(
			'scheme_color_names', array(
				'bg_color'    => array(
					'title'       => esc_html__( 'Background color', 'plumbing' ),
					'description' => esc_html__( 'Background color of this block in the normal state', 'plumbing' ),
				),
				'bg_hover'    => array(
					'title'       => esc_html__( 'Background hover', 'plumbing' ),
					'description' => esc_html__( 'Background color of this block in the hovered state', 'plumbing' ),
				),
				'bd_color'    => array(
					'title'       => esc_html__( 'Border color', 'plumbing' ),
					'description' => esc_html__( 'Border color of this block in the normal state', 'plumbing' ),
				),
				'bd_hover'    => array(
					'title'       => esc_html__( 'Border hover', 'plumbing' ),
					'description' => esc_html__( 'Border color of this block in the hovered state', 'plumbing' ),
				),
				'text'        => array(
					'title'       => esc_html__( 'Text', 'plumbing' ),
					'description' => esc_html__( 'Color of the plain text inside this block', 'plumbing' ),
				),
				'text_dark'   => array(
					'title'       => esc_html__( 'Text dark', 'plumbing' ),
					'description' => esc_html__( 'Color of the dark text (bold, header, etc.) inside this block', 'plumbing' ),
				),
				'text_light'  => array(
					'title'       => esc_html__( 'Text light', 'plumbing' ),
					'description' => esc_html__( 'Color of the light text (post meta, etc.) inside this block', 'plumbing' ),
				),
				'text_link'   => array(
					'title'       => esc_html__( 'Link', 'plumbing' ),
					'description' => esc_html__( 'Color of the links inside this block', 'plumbing' ),
				),
				'text_hover'  => array(
					'title'       => esc_html__( 'Link hover', 'plumbing' ),
					'description' => esc_html__( 'Color of the hovered state of links inside this block', 'plumbing' ),
				),
				'text_link2'  => array(
					'title'       => esc_html__( 'Link 2', 'plumbing' ),
					'description' => esc_html__( 'Color of the accented texts (areas) inside this block', 'plumbing' ),
				),
				'text_hover2' => array(
					'title'       => esc_html__( 'Link 2 hover', 'plumbing' ),
					'description' => esc_html__( 'Color of the hovered state of accented texts (areas) inside this block', 'plumbing' ),
				),
				'text_link3'  => array(
					'title'       => esc_html__( 'Link 3', 'plumbing' ),
					'description' => esc_html__( 'Color of the other accented texts (buttons) inside this block', 'plumbing' ),
				),
				'text_hover3' => array(
					'title'       => esc_html__( 'Link 3 hover', 'plumbing' ),
					'description' => esc_html__( 'Color of the hovered state of other accented texts (buttons) inside this block', 'plumbing' ),
				),
			)
		);
		$schemes = array(

			// Color scheme: 'default'
			'default' => array(
				'title'    => esc_html__( 'Default', 'plumbing' ),
				'internal' => true,
				'colors'   => array(

					// Whole block border and background
					'bg_color'         => '#ffffff',
					'bd_color'         => '#ebebeb',

					// Text and links colors
					'text'             => '#606060',
					'text_light'       => '#939393',
					'text_dark'        => '#292f34',
					'text_link'        => '#1bbde8',
					'text_hover'       => '#292f34',
					'text_link2'       => '#606060',
					'text_hover2'      => '#292f34',
					'text_link3'       => '#ffa900',
					'text_hover3'      => '#A8A7A7',

					// Alternative blocks (sidebar, tabs, alternative blocks, etc.)
					'alter_bg_color'   => '#f5f5f5',
					'alter_bg_hover'   => '#fcfcfc',
					'alter_bd_color'   => '#ebebeb',
					'alter_bd_hover'   => '#ffffff',
					'alter_text'       => '#606060',
					'alter_light'      => '#939393',
					'alter_dark'       => '#292f34',
					'alter_link'       => '#1bbde8',
					'alter_hover'      => '#292f34',
					'alter_link2'      => '#ffffff',
					'alter_hover2'     => '#ffffff',
					'alter_link3'      => '#ffffff',
					'alter_hover3'     => '#ffffff',

					// Extra blocks (submenu, tabs, color blocks, etc.)
					'extra_bg_color'   => '#3c414c',
					'extra_bg_hover'   => '#ffffff',
					'extra_bd_color'   => '#50545e',
					'extra_bd_hover'   => '#f5f5f5',
					'extra_text'       => '#50545e',
					'extra_light'      => '#939393',
					'extra_dark'       => '#ffffff',
					'extra_link'       => '#1bbde8',
					'extra_hover'      => '#ffffff',
					'extra_link2'      => '#3c414c',
					'extra_hover2'     => '#ffffff',
					'extra_link3'      => '#ffffff',
					'extra_hover3'     => '#ffffff',

					// Input fields (form's fields and textarea)
					'input_bg_color'   => '#f5f5f5',
					'input_bg_hover'   => '#f5f5f5',
					'input_bd_color'   => '#f5f5f5',
					'input_bd_hover'   => '#f5f5f5',
					'input_text'       => '#adafb2',
					'input_light'      => '#ffffff',
					'input_dark'       => '#292f34',

					// Inverse blocks (text and links on the 'text_link' background)
					'inverse_bd_color' => '#ffffff',
					'inverse_bd_hover' => '#ffffff',
					'inverse_text'     => '#ffffff',
					'inverse_light'    => '#ffffff',
					'inverse_dark'     => '#29313a',
					'inverse_link'     => '#ffffff',
					'inverse_hover'    => '#ffffff',
				),
			),
			// Color scheme: 'dark'
			'dark'    => array(
				'title'    => esc_html__( 'Dark', 'plumbing' ),
				'internal' => true,
				'colors'   => array(

					// Whole block border and background
					'bg_color'         => '#3c414c',
					'bd_color'         => '#4b505a',

					// Text and links colors
					'text'             => '#cecece',
					'text_light'       => '#828282',
					'text_dark'        => '#ffffff',
					'text_link'        => '#1bbde8',
					'text_hover'       => '#ffffff',
					'text_link2'       => '#606060',
					'text_hover2'      => '#292f34',
					'text_link3'       => '#ffa900',
					'text_hover3'      => '#A8A7A7',

					// Alternative blocks (sidebar, tabs, alternative blocks, etc.)
					'alter_bg_color'   => '#292c34',
					'alter_bg_hover'   => '#3c414c',
					'alter_bd_color'   => '#4b505a',
					'alter_bd_hover'   => '#ffffff',
					'alter_text'       => '#cecece',
					'alter_light'      => '#828282',
					'alter_dark'       => '#ffffff',
					'alter_link'       => '#1bbde8',
					'alter_hover'      => '#ffffff',
					'alter_link2'      => '#ffffff',
					'alter_hover2'     => '#ffffff',
					'alter_link3'      => '#ffffff',
					'alter_hover3'     => '#ffffff',

					// Extra blocks (submenu, tabs, color blocks, etc.)
					'extra_bg_color'   => '#ffffff',
					'extra_bg_hover'   => '#f3f5f7',
					'extra_bd_color'   => '#ebebeb',
					'extra_bd_hover'   => '#ffffff',
					'extra_text'       => '#cecece',
					'extra_light'      => '#828282',
					'extra_dark'       => '#4b505a',
					'extra_link'       => '#1bbde8',
					'extra_hover'      => '#ffffff',
					'extra_link2'      => '#3c414c',
					'extra_hover2'     => '#ffffff',
					'extra_link3'      => '#ffffff',
					'extra_hover3'     => '#ffffff',

					// Input fields (form's fields and textarea)
					'input_bg_color'   => '#ffffff',
					'input_bg_hover'   => '#ffffff',
					'input_bd_color'   => '#ffffff',
					'input_bd_hover'   => '#ffffff',
					'input_text'       => '#adafb2',
					'input_light'      => '#ffffff',
					'input_dark'       => '#4b505a',

					// Inverse blocks (text and links on the 'text_link' background)
					'inverse_bd_color' => '#ffffff',
					'inverse_bd_hover' => '#ffffff',
					'inverse_text'     => '#f4f4f4',
					'inverse_light'    => '#ffffff',
					'inverse_dark'     => '#4b505a',
					'inverse_link'     => '#ffffff',
					'inverse_hover'    => '#ffffff',
				),
			),
            // Color scheme: 'alter'
            'alter' => array(
                'title'    => esc_html__( 'Alter', 'plumbing' ),
                'internal' => true,
                'colors'   => array(

                    // Whole block border and background
                    'bg_color'         => '#f5f5f5',
                    'bd_color'         => '#ebebeb',

                    // Text and links colors
                    'text'             => '#606060',
                    'text_light'       => '#939393',
                    'text_dark'        => '#292f34',
                    'text_link'        => '#fdb640',//
                    'text_hover'       => '#292f34',
                    'text_link2'       => '#606060',
                    'text_hover2'      => '#292f34',
                    'text_link3'       => '#ffa900',
                    'text_hover3'      => '#A8A7A7',

                    // Alternative blocks (sidebar, tabs, alternative blocks, etc.)
                    'alter_bg_color'   => '#ffffff',
                    'alter_bg_hover'   => '#fcfcfc',
                    'alter_bd_color'   => '#ebebeb',
                    'alter_bd_hover'   => '#ffffff',
                    'alter_text'       => '#606060',
                    'alter_light'      => '#939393',
                    'alter_dark'       => '#292f34',
                    'alter_link'       => '#fdb640',//
                    'alter_hover'      => '#292f34',
                    'alter_link2'      => '#ffffff',
                    'alter_hover2'     => '#ffffff',
                    'alter_link3'      => '#ffffff',
                    'alter_hover3'     => '#ffffff',

                    // Extra blocks (submenu, tabs, color blocks, etc.)
                    'extra_bg_color'   => '#3c414c',
                    'extra_bg_hover'   => '#ffffff',
                    'extra_bd_color'   => '#50545e',
                    'extra_bd_hover'   => '#f5f5f5',
                    'extra_text'       => '#50545e',
                    'extra_light'      => '#939393',
                    'extra_dark'       => '#ffffff',
                    'extra_link'       => '#fdb640',//
                    'extra_hover'      => '#ffffff',
                    'extra_link2'      => '#3c414c',
                    'extra_hover2'     => '#ffffff',
                    'extra_link3'      => '#ffffff',
                    'extra_hover3'     => '#ffffff',

                    // Input fields (form's fields and textarea)
                    'input_bg_color'   => '#ffffff',
                    'input_bg_hover'   => '#ffffff',
                    'input_bd_color'   => '#ffffff',
                    'input_bd_hover'   => '#ffffff',
                    'input_text'       => '#adafb2',
                    'input_light'      => '#ffffff',
                    'input_dark'       => '#292f34',

                    // Inverse blocks (text and links on the 'text_link' background)
                    'inverse_bd_color' => '#ffffff',
                    'inverse_bd_hover' => '#ffffff',
                    'inverse_text'     => '#ffffff',
                    'inverse_light'    => '#ffffff',
                    'inverse_dark'     => '#29313a',
                    'inverse_link'     => '#ffffff',
                    'inverse_hover'    => '#ffffff',
                ),
            ),
            // Color scheme: 'alter dark'
            'alter_dark'    => array(
                'title'    => esc_html__( 'Alter Dark', 'plumbing' ),
                'internal' => true,
                'colors'   => array(

                    // Whole block border and background
                    'bg_color'         => '#3c414c',
                    'bd_color'         => '#4b505a',

                    // Text and links colors
                    'text'             => '#cecece',
                    'text_light'       => '#828282',
                    'text_dark'        => '#ffffff',
                    'text_link'        => '#fdb640',//
                    'text_hover'       => '#ffffff',
                    'text_link2'       => '#606060',
                    'text_hover2'      => '#292f34',
                    'text_link3'       => '#ffa900',
                    'text_hover3'      => '#A8A7A7',

                    // Alternative blocks (sidebar, tabs, alternative blocks, etc.)
                    'alter_bg_color'   => '#292c34',
                    'alter_bg_hover'   => '#3c414c',
                    'alter_bd_color'   => '#4b505a',
                    'alter_bd_hover'   => '#ffffff',
                    'alter_text'       => '#cecece',
                    'alter_light'      => '#828282',
                    'alter_dark'       => '#ffffff',
                    'alter_link'       => '#fdb640',//
                    'alter_hover'      => '#ffffff',
                    'alter_link2'      => '#ffffff',
                    'alter_hover2'     => '#ffffff',
                    'alter_link3'      => '#ffffff',
                    'alter_hover3'     => '#ffffff',

                    // Extra blocks (submenu, tabs, color blocks, etc.)
                    'extra_bg_color'   => '#ffffff',
                    'extra_bg_hover'   => '#f3f5f7',
                    'extra_bd_color'   => '#ebebeb',
                    'extra_bd_hover'   => '#ffffff',
                    'extra_text'       => '#cecece',
                    'extra_light'      => '#828282',
                    'extra_dark'       => '#4b505a',
                    'extra_link'       => '#fdb640',//
                    'extra_hover'      => '#ffffff',
                    'extra_link2'      => '#3c414c',
                    'extra_hover2'     => '#ffffff',
                    'extra_link3'      => '#ffffff',
                    'extra_hover3'     => '#ffffff',

                    // Input fields (form's fields and textarea)
                    'input_bg_color'   => '#ffffff',
                    'input_bg_hover'   => '#ffffff',
                    'input_bd_color'   => '#ffffff',
                    'input_bd_hover'   => '#ffffff',
                    'input_text'       => '#adafb2',
                    'input_light'      => '#ffffff',
                    'input_dark'       => '#4b505a',

                    // Inverse blocks (text and links on the 'text_link' background)
                    'inverse_bd_color' => '#ffffff',
                    'inverse_bd_hover' => '#ffffff',
                    'inverse_text'     => '#f4f4f4',
                    'inverse_light'    => '#ffffff',
                    'inverse_dark'     => '#4b505a',
                    'inverse_link'     => '#ffffff',
                    'inverse_hover'    => '#ffffff',
                ),
            ),
		);
		plumbing_storage_set( 'schemes', $schemes );
		plumbing_storage_set( 'schemes_original', $schemes );
		
		// Simple scheme editor: lists the colors to edit in the "Simple" mode.
		// For each color you can set the array of 'slave' colors and brightness factors that are used to generate new values,
		// when 'main' color is changed
		// Leave 'slave' arrays empty if your scheme does not have a color dependency
		plumbing_storage_set(
			'schemes_simple', array(
				'text_link'        => array(
					'alter_hover'      => 1,
					'extra_link'       => 1,
					'inverse_bd_color' => 0.85,
					'inverse_bd_hover' => 0.7,
				),
				'text_hover'       => array(
					'alter_link'  => 1,
					'extra_hover' => 1,
				),
				'text_link2'       => array(
					'alter_hover2' => 1,
					'extra_link2'  => 1,
				),
				'text_hover2'      => array(
					'alter_link2'  => 1,
					'extra_hover2' => 1,
				),
				'text_link3'       => array(
					'alter_hover3' => 1,
					'extra_link3'  => 1,
				),
				'text_hover3'      => array(
					'alter_link3'  => 1,
					'extra_hover3' => 1,
				),
				'alter_link'       => array(),
				'alter_hover'      => array(),
				'alter_link2'      => array(),
				'alter_hover2'     => array(),
				'alter_link3'      => array(),
				'alter_hover3'     => array(),
				'extra_link'       => array(),
				'extra_hover'      => array(),
				'extra_link2'      => array(),
				'extra_hover2'     => array(),
				'extra_link3'      => array(),
				'extra_hover3'     => array(),
				'inverse_bd_color' => array(),
				'inverse_bd_hover' => array(),
			)
		);

		// Additional colors for each scheme
		// Parameters:	'color' - name of the color from the scheme that should be used as source for the transformation
		//				'alpha' - to make color transparent (0.0 - 1.0)
		//				'hue', 'saturation', 'brightness' - inc/dec value for each color's component
		plumbing_storage_set(
			'scheme_colors_add', array(
				'bg_color_0'        => array(
					'color' => 'bg_color',
					'alpha' => 0,
				),
				'bg_color_02'       => array(
					'color' => 'bg_color',
					'alpha' => 0.2,
				),
				'bg_color_07'       => array(
					'color' => 'bg_color',
					'alpha' => 0.7,
				),
				'bg_color_08'       => array(
					'color' => 'bg_color',
					'alpha' => 0.8,
				),
				'bg_color_09'       => array(
					'color' => 'bg_color',
					'alpha' => 0.9,
				),
				'alter_bg_color_07' => array(
					'color' => 'alter_bg_color',
					'alpha' => 0.7,
				),
				'alter_bg_color_04' => array(
					'color' => 'alter_bg_color',
					'alpha' => 0.4,
				),
				'alter_bg_color_00' => array(
					'color' => 'alter_bg_color',
					'alpha' => 0,
				),
				'alter_bg_color_02' => array(
					'color' => 'alter_bg_color',
					'alpha' => 0.2,
				),
				'alter_bd_color_02' => array(
					'color' => 'alter_bd_color',
					'alpha' => 0.2,
				),
				'alter_link_02'     => array(
					'color' => 'alter_link',
					'alpha' => 0.2,
				),
				'alter_link_07'     => array(
					'color' => 'alter_link',
					'alpha' => 0.7,
				),
				'extra_bg_color_05' => array(
					'color' => 'extra_bg_color',
					'alpha' => 0.5,
				),
				'extra_bg_color_07' => array(
					'color' => 'extra_bg_color',
					'alpha' => 0.7,
				),
				'extra_link_02'     => array(
					'color' => 'extra_link',
					'alpha' => 0.2,
				),
				'extra_link_07'     => array(
					'color' => 'extra_link',
					'alpha' => 0.7,
				),
				'extra_dark_01'      => array(
					'color' => 'extra_dark',
					'alpha' => 0.1,
				),
				'text_dark_07'      => array(
					'color' => 'text_dark',
					'alpha' => 0.7,
				),
				'text_link_02'      => array(
					'color' => 'text_link',
					'alpha' => 0.2,
				),
				'text_link_07'      => array(
					'color' => 'text_link',
					'alpha' => 0.7,
				),
				'text_link_blend'   => array(
					'color'      => 'text_link',
					'hue'        => 2,
					'saturation' => -5,
					'brightness' => 5,
				),
				'alter_link_blend'  => array(
					'color'      => 'alter_link',
					'hue'        => 2,
					'saturation' => -5,
					'brightness' => 5,
				),
			)
		);

		// Parameters to set order of schemes in the css
		plumbing_storage_set(
			'schemes_sorted', array(
				'color_scheme',
				'header_scheme',
				'sidebar_scheme',
				'footer_scheme',
			)
		);

		// -----------------------------------------------------------------
		// -- Theme specific thumb sizes
		// -----------------------------------------------------------------
		plumbing_storage_set(
			'theme_thumbs', apply_filters(
				'plumbing_filter_add_thumb_sizes', array(
					// Width of the image is equal to the content area width (without sidebar)
					// Height is fixed
					'plumbing-thumb-huge'        => array(
						'size'  => array( 1170, 658, true ),
						'title' => esc_html__( 'Huge image', 'plumbing' ),
						'subst' => 'trx_addons-thumb-huge',
					),
					// Width of the image is equal to the content area width (with sidebar)
					// Height is fixed
					'plumbing-thumb-big'         => array(
						'size'  => array( 1500, 844, true ),
						'title' => esc_html__( 'Large image', 'plumbing' ),
						'subst' => 'trx_addons-thumb-big',
					),
					'plumbing-thumb-team'         => array(
						'size'  => array( 500, 500, true ),
						'title' => esc_html__( 'Team image', 'plumbing' ),
						'subst' => 'trx_addons-thumb-team',
					),

					// Width of the image is equal to the 1/3 of the content area width (without sidebar)
					// Height is fixed
					'plumbing-thumb-med'         => array(
						'size'  => array( 370, 208, true ),
						'title' => esc_html__( 'Medium image', 'plumbing' ),
						'subst' => 'trx_addons-thumb-medium',
					),
					'plumbing-thumb-service'         => array(
						'size'  => array( 712, 444, true ),
						'title' => esc_html__( 'Service image', 'plumbing' ),
						'subst' => 'trx_addons-thumb-service',
					),

					// Small square image (for avatars in comments, etc.)
					'plumbing-thumb-tiny'        => array(
						'size'  => array( 90, 90, true ),
						'title' => esc_html__( 'Small square avatar', 'plumbing' ),
						'subst' => 'trx_addons-thumb-tiny',
					),

					// Width of the image is equal to the content area width (with sidebar)
					// Height is proportional (only downscale, not crop)
					'plumbing-thumb-masonry-big' => array(
						'size'  => array( 760, 0, false ),     // Only downscale, not crop
						'title' => esc_html__( 'Masonry Large (scaled)', 'plumbing' ),
						'subst' => 'trx_addons-thumb-masonry-big',
					),

					// Width of the image is equal to the 1/3 of the full content area width (without sidebar)
					// Height is proportional (only downscale, not crop)
					'plumbing-thumb-masonry'     => array(
						'size'  => array( 370, 0, false ),     // Only downscale, not crop
						'title' => esc_html__( 'Masonry (scaled)', 'plumbing' ),
						'subst' => 'trx_addons-thumb-masonry',
					),
				)
			)
		);
	}
}




//------------------------------------------------------------------------
// One-click import support
//------------------------------------------------------------------------

// Set theme specific importer options
if ( ! function_exists( 'plumbing_importer_set_options' ) ) {
	add_filter( 'trx_addons_filter_importer_options', 'plumbing_importer_set_options', 9 );
	function plumbing_importer_set_options( $options = array() ) {
		if ( is_array( $options ) ) {
			// Save or not installer's messages to the log-file
			$options['debug'] = false;
			// Allow import/export functionality
			$options['allow_import'] = true;
			$options['allow_export'] = false;
			// Prepare demo data
			$options['demo_url'] = esc_url( plumbing_get_protocol() . '://demofiles.themerex.net/plumbing/' );
			// Required plugins
			$options['required_plugins'] = array_keys( plumbing_storage_get( 'required_plugins' ) );
			// Set number of thumbnails (usually 3 - 5) to regenerate at once when its imported (if demo data was zipped without cropped images)
			// Set 0 to prevent regenerate thumbnails (if demo data archive is already contain cropped images)
			$options['regenerate_thumbnails'] = 0;
			// Default demo
			$options['files']['default']['title']       = esc_html__( 'Plumbing Demo', 'plumbing' );
			$options['files']['default']['domain_dev']  = esc_url( plumbing_get_protocol() . '://plumbing-repair.themerex.net' );       // Developers domain
			$options['files']['default']['domain_demo'] = esc_url( plumbing_get_protocol() . '://plumbing-repair.themerex.net' );       // Demo-site domain
			// If theme need more demo - just copy 'default' and change required parameter
			
			
			
			
			// The array with theme-specific banners, displayed during demo-content import.
			// If array with banners is empty - the banners are uploaded directly from demo-content server.
			$options['banners'] = array();
		}
		return $options;
	}
}


//------------------------------------------------------------------------
// OCDI support
//------------------------------------------------------------------------

// Set theme specific OCDI options
if ( ! function_exists( 'plumbing_ocdi_set_options' ) ) {
	add_filter( 'trx_addons_filter_ocdi_options', 'plumbing_ocdi_set_options', 9 );
	function plumbing_ocdi_set_options( $options = array() ) {
		if ( is_array( $options ) ) {
			// Prepare demo data
			$options['demo_url'] = esc_url( plumbing_get_protocol() . '://demofiles.themerex.net/plumbing/' );
			// Required plugins
			$options['required_plugins'] = array_keys( plumbing_storage_get( 'required_plugins' ) );
			// Demo-site domain
			$options['files']['ocdi']['title']       = esc_html__( 'Plumbing OCDI Demo', 'plumbing' );
			$options['files']['ocdi']['domain_demo'] = esc_url( plumbing_get_protocol() . '://plumbing-repair.themerex.net' );
			// If theme need more demo - just copy 'default' and change required parameter
			
			
			
		}
		return $options;
	}
}


// -----------------------------------------------------------------
// -- Theme options for customizer
// -----------------------------------------------------------------
if ( ! function_exists( 'plumbing_create_theme_options' ) ) {

	function plumbing_create_theme_options() {

		// Message about options override.
		// Attention! Not need esc_html() here, because this message put in wp_kses_data() below
		$msg_override = esc_html__( 'Attention! Some of these options can be overridden in the following sections (Blog, Plugins settings, etc.) or in the settings of individual pages. If you changed such parameter and nothing happened on the page, this option may be overridden in the corresponding section or in the Page Options of this page. These options are marked with an asterisk (*) in the title.', 'plumbing' );

		// Color schemes number: if < 2 - hide fields with selectors
		$hide_schemes = count( plumbing_storage_get( 'schemes' ) ) < 2;

		plumbing_storage_set(

			'options', array(

				// 'Logo & Site Identity'
				//---------------------------------------------
				'title_tagline'                 => array(
					'title'    => esc_html__( 'Logo & Site Identity', 'plumbing' ),
					'desc'     => '',
					'priority' => 10,
					'type'     => 'section',
				),
				'logo_info'                     => array(
					'title'    => esc_html__( 'Logo Settings', 'plumbing' ),
					'desc'     => '',
					'priority' => 20,
					'qsetup'   => esc_html__( 'General', 'plumbing' ),
					'type'     => 'info',
				),
				'logo_text'                     => array(
					'title'    => esc_html__( 'Use Site Name as Logo', 'plumbing' ),
					'desc'     => wp_kses_data( __( 'Use the site title and tagline as a text logo if no image is selected', 'plumbing' ) ),
					'class'    => 'plumbing_column-1_2 plumbing_new_row',
					'priority' => 30,
					'std'      => 1,
					'qsetup'   => esc_html__( 'General', 'plumbing' ),
					'type'     => PLUMBING_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'logo_retina_enabled'           => array(
					'title'    => esc_html__( 'Allow retina display logo', 'plumbing' ),
					'desc'     => wp_kses_data( __( 'Show fields to select logo images for Retina display', 'plumbing' ) ),
					'class'    => 'plumbing_column-1_2',
					'priority' => 40,
					'refresh'  => false,
					'std'      => 0,
					'type'     => PLUMBING_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'logo_zoom'                     => array(
					'title'   => esc_html__( 'Logo zoom', 'plumbing' ),
					'desc'    => wp_kses(
									__( 'Zoom the logo (set 1 to leave original size).', 'plumbing' )
									. ' <br>'
									. __( 'Attention! For this parameter to affect images, their max-height should be specified in "em" instead of "px" when creating a header.', 'plumbing' )
									. ' <br>'
									. __( 'In this case maximum size of logo depends on the actual size of the picture.', 'plumbing' )
                                    , 'plumbing_kses_content' ),
					'std'     => 1,
					'min'     => 0.2,
					'max'     => 2,
					'step'    => 0.1,
					'refresh' => false,
					'type'    => PLUMBING_THEME_FREE ? 'hidden' : 'slider',
				),
				// Parameter 'logo' was replaced with standard WordPress 'custom_logo'
				'logo_retina'                   => array(
					'title'      => esc_html__( 'Logo for Retina', 'plumbing' ),
					'desc'       => wp_kses_data( __( 'Select or upload site logo used on Retina displays (if empty - use default logo from the field above)', 'plumbing' ) ),
					'class'      => 'plumbing_column-1_2',
					'priority'   => 70,
					'dependency' => array(
						'logo_retina_enabled' => array( 1 ),
					),
					'std'        => '',
					'type'       => PLUMBING_THEME_FREE ? 'hidden' : 'image',
				),
				'logo_mobile_header'            => array(
					'title' => esc_html__( 'Logo for the mobile header', 'plumbing' ),
					'desc'  => wp_kses_data( __( 'Select or upload site logo to display it in the mobile header (if enabled in the section "Header - Header mobile"', 'plumbing' ) ),
					'class' => 'plumbing_column-1_2 plumbing_new_row',
					'std'   => '',
					'type'  => 'image',
				),
				'logo_mobile_header_retina'     => array(
					'title'      => esc_html__( 'Logo for the mobile header on Retina', 'plumbing' ),
					'desc'       => wp_kses_data( __( 'Select or upload site logo used on Retina displays (if empty - use default logo from the field above)', 'plumbing' ) ),
					'class'      => 'plumbing_column-1_2',
					'dependency' => array(
						'logo_retina_enabled' => array( 1 ),
					),
					'std'        => '',
					'type'       => PLUMBING_THEME_FREE ? 'hidden' : 'image',
				),
				'logo_mobile'                   => array(
					'title' => esc_html__( 'Logo for the mobile menu', 'plumbing' ),
					'desc'  => wp_kses_data( __( 'Select or upload site logo to display it in the mobile menu', 'plumbing' ) ),
					'class' => 'plumbing_column-1_2 plumbing_new_row',
					'std'   => '',
					'type'  => 'image',
				),
				'logo_mobile_retina'            => array(
					'title'      => esc_html__( 'Logo mobile on Retina', 'plumbing' ),
					'desc'       => wp_kses_data( __( 'Select or upload site logo used on Retina displays (if empty - use default logo from the field above)', 'plumbing' ) ),
					'class'      => 'plumbing_column-1_2',
					'dependency' => array(
						'logo_retina_enabled' => array( 1 ),
					),
					'std'        => '',
					'type'       => PLUMBING_THEME_FREE ? 'hidden' : 'image',
				),



				// 'General settings'
				//---------------------------------------------
				'general'                       => array(
					'title'    => esc_html__( 'General', 'plumbing' ),
					'desc'     => wp_kses_data( $msg_override ),
					'priority' => 20,
					'type'     => 'section',
				),

				'general_layout_info'           => array(
					'title'  => esc_html__( 'Layout', 'plumbing' ),
					'desc'   => '',
					'qsetup' => esc_html__( 'General', 'plumbing' ),
					'type'   => 'info',
				),
				'body_style'                    => array(
					'title'    => esc_html__( 'Body style', 'plumbing' ),
					'desc'     => wp_kses_data( __( 'Select width of the body content', 'plumbing' ) ),
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Content', 'plumbing' ),
					),
					'qsetup'   => esc_html__( 'General', 'plumbing' ),
					'refresh'  => false,
					'std'      => 'wide',
					'options'  => plumbing_get_list_body_styles( false ),
					'type'     => 'select',
				),
				'page_width'                    => array(
					'title'      => esc_html__( 'Page width', 'plumbing' ),
					'desc'       => wp_kses_data( __( 'Total width of the site content and sidebar (in pixels). If empty - use default width', 'plumbing' ) ),
					'dependency' => array(
						'body_style' => array( 'boxed', 'wide' ),
					),
					'std'        => 1170,
					'min'        => 1000,
					'max'        => 1400,
					'step'       => 10,
					'refresh'    => false,
					'customizer' => 'page',               // SASS variable's name to preview changes 'on fly'
					'type'       => PLUMBING_THEME_FREE ? 'hidden' : 'slider',
				),
				'page_boxed_extra'             => array(
					'title'      => esc_html__( 'Boxed page extra spaces', 'plumbing' ),
					'desc'       => wp_kses_data( __( 'Width of the extra side space on boxed pages', 'plumbing' ) ),
					'dependency' => array(
						'body_style' => array( 'boxed' ),
					),
					'std'        => 60,
					'min'        => 0,
					'max'        => 300,
					'step'       => 10,
					'refresh'    => false,
					'customizer' => 'page_boxed_extra',   // SASS variable's name to preview changes 'on fly'
					'type'       => PLUMBING_THEME_FREE ? 'hidden' : 'slider',
				),
				'boxed_bg_image'                => array(
					'title'      => esc_html__( 'Boxed bg image', 'plumbing' ),
					'desc'       => wp_kses_data( __( 'Select or upload image, used as background in the boxed body', 'plumbing' ) ),
					'dependency' => array(
						'body_style' => array( 'boxed' ),
					),
					'override'   => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Content', 'plumbing' ),
					),
					'std'        => '',
					'qsetup'     => esc_html__( 'General', 'plumbing' ),
					
					'type'       => 'image',
				),
				'remove_margins'                => array(
					'title'    => esc_html__( 'Remove margins', 'plumbing' ),
					'desc'     => wp_kses_data( __( 'Remove margins above and below the content area', 'plumbing' ) ),
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Content', 'plumbing' ),
					),
					'refresh'  => false,
					'std'      => 0,
					'type'     => 'checkbox',
				),

				'general_sidebar_info'          => array(
					'title' => esc_html__( 'Sidebar', 'plumbing' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'sidebar_position'              => array(
					'title'    => esc_html__( 'Sidebar position', 'plumbing' ),
					'desc'     => wp_kses_data( __( 'Select position to show sidebar', 'plumbing' ) ),
					'override' => array(
						'mode'    => 'page',		// Override parameters for single posts moved to the 'sidebar_position_single'
						'section' => esc_html__( 'Widgets', 'plumbing' ),
					),
					'std'      => 'right',
					'qsetup'   => esc_html__( 'General', 'plumbing' ),
					'options'  => array(),
					'type'     => 'switch',
				),
				'sidebar_position_ss'       => array(
					'title'    => esc_html__( 'Sidebar position on the small screen', 'plumbing' ),
					'desc'     => wp_kses_data( __( "Select position to move sidebar (if it's not hidden) on the small screen - above or below the content", 'plumbing' ) ),
					'override' => array(
						'mode'    => 'page',		// Override parameters for single posts moved to the 'sidebar_position_ss_single'
						'section' => esc_html__( 'Widgets', 'plumbing' ),
					),
					'dependency' => array(
						'sidebar_position' => array( '^hide' ),
					),
					'std'      => 'below',
					'qsetup'   => esc_html__( 'General', 'plumbing' ),
					'options'  => array(),
					'type'     => 'switch',
				),
				'sidebar_widgets'               => array(
					'title'      => esc_html__( 'Sidebar widgets', 'plumbing' ),
					'desc'       => wp_kses_data( __( 'Select default widgets to show in the sidebar', 'plumbing' ) ),
					'override'   => array(
						'mode'    => 'page',		// Override parameters for single posts moved to the 'sidebar_widgets_single'
						'section' => esc_html__( 'Widgets', 'plumbing' ),
					),
					'dependency' => array(
						'sidebar_position' => array( '^hide' ),
					),
					'std'        => 'sidebar_widgets',
					'options'    => array(),
					'qsetup'     => esc_html__( 'General', 'plumbing' ),
					'type'       => 'select',
				),
				'sidebar_width'                 => array(
					'title'      => esc_html__( 'Sidebar width', 'plumbing' ),
					'desc'       => wp_kses_data( __( 'Width of the sidebar (in pixels). If empty - use default width', 'plumbing' ) ),
					'std'        => 370,
					'min'        => 150,
					'max'        => 500,
					'step'       => 10,
					'refresh'    => false,
					'customizer' => 'sidebar',      // SASS variable's name to preview changes 'on fly'
					'type'       => PLUMBING_THEME_FREE ? 'hidden' : 'slider',
				),
				'sidebar_gap'                   => array(
					'title'      => esc_html__( 'Sidebar gap', 'plumbing' ),
					'desc'       => wp_kses_data( __( 'Gap between content and sidebar (in pixels). If empty - use default gap', 'plumbing' ) ),
					'std'        => 50,
					'min'        => 0,
					'max'        => 100,
					'step'       => 1,
					'refresh'    => false,
					'customizer' => 'gap',          // SASS variable's name to preview changes 'on fly'
					'type'       => PLUMBING_THEME_FREE ? 'hidden' : 'slider',
				),
				'expand_content'                => array(
					'title'   => esc_html__( 'Expand content', 'plumbing' ),
					'desc'    => wp_kses_data( __( 'Expand the content width if the sidebar is hidden', 'plumbing' ) ),
					'refresh' => false,
					'override'   => array(
						'mode'    => 'page,post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Widgets', 'plumbing' ),
					),
					'std'     => 1,
					'type'    => 'checkbox',
				),
				
				'general_effects_info'          => array(
					'title' => esc_html__( 'Design & Effects', 'plumbing' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'border_radius'                 => array(
					'title'      => esc_html__( 'Border radius', 'plumbing' ),
					'desc'       => wp_kses_data( __( 'Specify the border radius of the form fields and buttons in pixels', 'plumbing' ) ),
					'std'        => '5',
					'min'        => 0,
					'max'        => 20,
					'step'       => 1,
					'refresh'    => false,
					'customizer' => 'rad',      // SASS name to preview changes 'on fly'
					'type'       => PLUMBING_THEME_FREE ? 'hidden' : 'slider',
				),

				'general_misc_info'             => array(
					'title' => esc_html__( 'Miscellaneous', 'plumbing' ),
					'desc'  => '',
					'type'  => PLUMBING_THEME_FREE ? 'hidden' : 'info',
				),
				'seo_snippets'                  => array(
					'title' => esc_html__( 'SEO snippets', 'plumbing' ),
					'desc'  => wp_kses_data( __( 'Add structured data markup to the single posts and pages', 'plumbing' ) ),
					'std'   => 0,
					'type'  => PLUMBING_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'privacy_text' => array(
					"title" => esc_html__("Text with Privacy Policy link", 'plumbing'),
					"desc"  => wp_kses_data( __("Specify text with Privacy Policy link for the checkbox 'I agree ...'", 'plumbing') ),
					"std"   => wp_kses( __( 'I agree that my submitted data is being collected and stored.', 'plumbing'), 'plumbing_kses_content'  ),
					"type"  => "text"
				),



				// 'Header'
				//---------------------------------------------
				'header'                        => array(
					'title'    => esc_html__( 'Header', 'plumbing' ),
					'desc'     => wp_kses_data( $msg_override ),
					'priority' => 30,
					'type'     => 'section',
				),

				'header_style_info'             => array(
					'title' => esc_html__( 'Header style', 'plumbing' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'header_type'                   => array(
					'title'    => esc_html__( 'Header style', 'plumbing' ),
					'desc'     => wp_kses_data( __( 'Choose whether to use the default header or header Layouts (available only if the ThemeREX Addons is activated)', 'plumbing' ) ),
					'override' => array(
						'mode'    => 'page,post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'plumbing' ),
					),
					'std'      => 'default',
					'options'  => plumbing_get_list_header_footer_types(),
					'type'     => PLUMBING_THEME_FREE || ! plumbing_exists_trx_addons() ? 'hidden' : 'switch',
				),
				'header_style'                  => array(
					'title'      => esc_html__( 'Select custom layout', 'plumbing' ),
					'desc'       => wp_kses( __( 'Select custom header from Layouts Builder', 'plumbing' ), 'plumbing_kses_content'  ),
					'override'   => array(
						'mode'    => 'page,post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'plumbing' ),
					),
					'dependency' => array(
						'header_type' => array( 'custom' ),
					),
					'std'        => 'header-custom-elementor-header-default',
					'options'    => array(),
					'type'       => 'select',
				),
				'header_position'               => array(
					'title'    => esc_html__( 'Header position', 'plumbing' ),
					'desc'     => wp_kses_data( __( 'Select position to display the site header', 'plumbing' ) ),
					'override' => array(
						'mode'    => 'page,post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'plumbing' ),
					),
					'std'      => 'default',
					'options'  => array(),
					'type'     => PLUMBING_THEME_FREE ? 'hidden' : 'switch',
				),
				'header_wide'                   => array(
					'title'      => esc_html__( 'Header fullwidth', 'plumbing' ),
					'desc'       => wp_kses_data( __( 'Do you want to stretch the header widgets area to the entire window width?', 'plumbing' ) ),
					'override'   => array(
						'mode'    => 'page,post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'plumbing' ),
					),
					'dependency' => array(
						'header_type' => array( 'default' ),
					),
					'std'        => 1,
					'type'       => PLUMBING_THEME_FREE ? 'hidden' : 'checkbox',
				),

				'menu_info'                     => array(
					'title' => esc_html__( 'Main menu', 'plumbing' ),
					'desc'  => wp_kses_data( __( 'Select main menu style, position and other parameters', 'plumbing' ) ),
					'type'  => PLUMBING_THEME_FREE ? 'hidden' : 'info',
				),
				'menu_style'                    => array(
					'title'    => esc_html__( 'Menu position', 'plumbing' ),
					'desc'     => wp_kses_data( __( 'Select position of the main menu', 'plumbing' ) ),
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'plumbing' ),
					),
					'std'      => 'top',
					'options'  => array(
						'top'   => esc_html__( 'Top', 'plumbing' ),
					),
					'type'     => PLUMBING_THEME_FREE || ! plumbing_exists_trx_addons() ? 'hidden' : 'switch',
				),
				'menu_side_stretch'             => array(
					'title'      => esc_html__( 'Stretch sidemenu', 'plumbing' ),
					'desc'       => wp_kses_data( __( 'Stretch sidemenu to window height (if menu items number >= 5)', 'plumbing' ) ),
					'override'   => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'plumbing' ),
					),
					'dependency' => array(
						'menu_style' => array( 'left', 'right' ),
					),
					'std'        => 0,
					'type'       => PLUMBING_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'menu_side_icons'               => array(
					'title'      => esc_html__( 'Iconed sidemenu', 'plumbing' ),
					'desc'       => wp_kses_data( __( 'Get icons from anchors and display it in the sidemenu or mark sidemenu items with simple dots', 'plumbing' ) ),
					'override'   => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'plumbing' ),
					),
					'dependency' => array(
						'menu_style' => array( 'left', 'right' ),
					),
					'std'        => 1,
					'type'       => PLUMBING_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'menu_mobile_fullscreen'        => array(
					'title' => esc_html__( 'Mobile menu fullscreen', 'plumbing' ),
					'desc'  => wp_kses_data( __( 'Display mobile and side menus on full screen (if checked) or slide narrow menu from the left or from the right side (if not checked)', 'plumbing' ) ),
					'std'   => 1,
					'type'  => PLUMBING_THEME_FREE ? 'hidden' : 'checkbox',
				),

				'header_mobile_info'            => array(
					'title'      => esc_html__( 'Mobile header', 'plumbing' ),
					'desc'       => wp_kses_data( __( 'Configure the mobile version of the header', 'plumbing' ) ),
					'priority'   => 500,
					'dependency' => array(
						'header_type' => array( 'default' ),
					),
					'type'       => PLUMBING_THEME_FREE ? 'hidden' : 'info',
				),
				'header_mobile_enabled'         => array(
					'title'      => esc_html__( 'Enable the mobile header', 'plumbing' ),
					'desc'       => wp_kses_data( __( 'Use the mobile version of the header (if checked) or relayout the current header on mobile devices', 'plumbing' ) ),
					'dependency' => array(
						'header_type' => array( 'default' ),
					),
					'std'        => 0,
					'type'       => PLUMBING_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'header_mobile_additional_info' => array(
					'title'      => esc_html__( 'Additional info', 'plumbing' ),
					'desc'       => wp_kses_data( __( 'Additional info to show at the top of the mobile header', 'plumbing' ) ),
					'std'        => '',
					'dependency' => array(
						'header_type'           => array( 'default' ),
						'header_mobile_enabled' => array( 1 ),
					),
					'refresh'    => false,
					'teeny'      => false,
					'rows'       => 20,
					'type'       => PLUMBING_THEME_FREE ? 'hidden' : 'text_editor',
				),
				'header_mobile_hide_info'       => array(
					'title'      => esc_html__( 'Hide additional info', 'plumbing' ),
					'std'        => 0,
					'dependency' => array(
						'header_type'           => array( 'default' ),
						'header_mobile_enabled' => array( 1 ),
					),
					'type'       => PLUMBING_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'header_mobile_hide_logo'       => array(
					'title'      => esc_html__( 'Hide logo', 'plumbing' ),
					'std'        => 0,
					'dependency' => array(
						'header_type'           => array( 'default' ),
						'header_mobile_enabled' => array( 1 ),
					),
					'type'       => PLUMBING_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'header_mobile_hide_login'      => array(
					'title'      => esc_html__( 'Hide login/logout', 'plumbing' ),
					'std'        => 0,
					'dependency' => array(
						'header_type'           => array( 'default' ),
						'header_mobile_enabled' => array( 1 ),
					),
					'type'       => PLUMBING_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'header_mobile_hide_search'     => array(
					'title'      => esc_html__( 'Hide search', 'plumbing' ),
					'std'        => 0,
					'dependency' => array(
						'header_type'           => array( 'default' ),
						'header_mobile_enabled' => array( 1 ),
					),
					'type'       => PLUMBING_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'header_mobile_hide_cart'       => array(
					'title'      => esc_html__( 'Hide cart', 'plumbing' ),
					'std'        => 0,
					'dependency' => array(
						'header_type'           => array( 'default' ),
						'header_mobile_enabled' => array( 1 ),
					),
					'type'       => PLUMBING_THEME_FREE ? 'hidden' : 'checkbox',
				),



				// 'Footer'
				//---------------------------------------------
				'footer'                        => array(
					'title'    => esc_html__( 'Footer', 'plumbing' ),
					'desc'     => wp_kses_data( $msg_override ),
					'priority' => 50,
					'type'     => 'section',
				),
				'footer_type'                   => array(
					'title'    => esc_html__( 'Footer style', 'plumbing' ),
					'desc'     => wp_kses_data( __( 'Choose whether to use the default footer or footer Layouts (available only if the ThemeREX Addons is activated)', 'plumbing' ) ),
					'override' => array(
						'mode'    => 'page,post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Footer', 'plumbing' ),
					),
					'std'      => 'default',
					'options'  => plumbing_get_list_header_footer_types(),
					'type'     => PLUMBING_THEME_FREE || ! plumbing_exists_trx_addons() ? 'hidden' : 'switch',
				),
				'footer_style'                  => array(
					'title'      => esc_html__( 'Select custom layout', 'plumbing' ),
					'desc'       => wp_kses( __( 'Select custom footer from Layouts Builder', 'plumbing' ), 'plumbing_kses_content'  ),
					'override'   => array(
						'mode'    => 'page,post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Footer', 'plumbing' ),
					),
					'dependency' => array(
						'footer_type' => array( 'custom' ),
					),
					'std'        => 'footer-custom-elementor-footer-default',
					'options'    => array(),
					'type'       => 'select',
				),
				'footer_widgets'                => array(
					'title'      => esc_html__( 'Footer widgets', 'plumbing' ),
					'desc'       => wp_kses_data( __( 'Select set of widgets to show in the footer', 'plumbing' ) ),
					'override'   => array(
						'mode'    => 'page,post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Footer', 'plumbing' ),
					),
					'dependency' => array(
						'footer_type' => array( 'default' ),
					),
					'std'        => 'footer_widgets',
					'options'    => array(),
					'type'       => 'select',
				),
				'footer_columns'                => array(
					'title'      => esc_html__( 'Footer columns', 'plumbing' ),
					'desc'       => wp_kses_data( __( 'Select number columns to show widgets in the footer. If 0 - autodetect by the widgets count', 'plumbing' ) ),
					'override'   => array(
						'mode'    => 'page,post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Footer', 'plumbing' ),
					),
					'dependency' => array(
						'footer_type'    => array( 'default' ),
						'footer_widgets' => array( '^hide' ),
					),
					'std'        => 0,
					'options'    => plumbing_get_list_range( 0, 6 ),
					'type'       => 'select',
				),
				'footer_wide'                   => array(
					'title'      => esc_html__( 'Footer fullwidth', 'plumbing' ),
					'desc'       => wp_kses_data( __( 'Do you want to stretch the footer to the entire window width?', 'plumbing' ) ),
					'override'   => array(
						'mode'    => 'page,post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Footer', 'plumbing' ),
					),
					'dependency' => array(
						'footer_type' => array( 'default' ),
					),
					'std'        => 0,
					'type'       => 'checkbox',
				),
				'logo_in_footer'                => array(
					'title'      => esc_html__( 'Show logo', 'plumbing' ),
					'desc'       => wp_kses_data( __( 'Show logo in the footer', 'plumbing' ) ),
					'refresh'    => false,
					'dependency' => array(
						'footer_type' => array( 'default' ),
					),
					'std'        => 0,
					'type'       => 'checkbox',
				),
				'logo_footer'                   => array(
					'title'      => esc_html__( 'Logo for footer', 'plumbing' ),
					'desc'       => wp_kses_data( __( 'Select or upload site logo to display it in the footer', 'plumbing' ) ),
					'dependency' => array(
						'footer_type'    => array( 'default' ),
						'logo_in_footer' => array( 1 ),
					),
					'std'        => '',
					'type'       => 'image',
				),
				'logo_footer_retina'            => array(
					'title'      => esc_html__( 'Logo for footer (Retina)', 'plumbing' ),
					'desc'       => wp_kses_data( __( 'Select or upload logo for the footer area used on Retina displays (if empty - use default logo from the field above)', 'plumbing' ) ),
					'dependency' => array(
						'footer_type'         => array( 'default' ),
						'logo_in_footer'      => array( 1 ),
						'logo_retina_enabled' => array( 1 ),
					),
					'std'        => '',
					'type'       => PLUMBING_THEME_FREE ? 'hidden' : 'image',
				),
				'socials_in_footer'             => array(
					'title'      => esc_html__( 'Show social icons', 'plumbing' ),
					'desc'       => wp_kses_data( __( 'Show social icons in the footer (under logo or footer widgets)', 'plumbing' ) ),
					'dependency' => array(
						'footer_type' => array( 'default' ),
					),
					'std'        => 0,
					'type'       => ! plumbing_exists_trx_addons() ? 'hidden' : 'checkbox',
				),
				'copyright'                     => array(
					'title'      => esc_html__( 'Copyright', 'plumbing' ),
					'desc'       => wp_kses_data( __( 'Copyright text in the footer. Use {Y} to insert current year and press "Enter" to create a new line', 'plumbing' ) ),
					'translate'  => true,
					'std'        => esc_html__( 'Copyright &copy; {Y} by ThemeREX. All rights reserved.', 'plumbing' ),
					'dependency' => array(
						'footer_type' => array( 'default' ),
					),
					'refresh'    => false,
					'type'       => 'textarea',
				),



				// 'Mobile version'
				//---------------------------------------------
				'mobile'                        => array(
					'title'    => esc_html__( 'Mobile', 'plumbing' ),
					'desc'     => wp_kses_data( $msg_override ),
					'priority' => 55,
					'type'     => 'section',
				),

				'mobile_header_info'            => array(
					'title' => esc_html__( 'Header on the mobile device', 'plumbing' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'header_type_mobile'            => array(
					'title'    => esc_html__( 'Header style', 'plumbing' ),
					'desc'     => wp_kses_data( __( 'Choose whether to use on mobile devices: the default header or header Layouts (available only if the ThemeREX Addons is activated)', 'plumbing' ) ),
					'std'      => 'inherit',
					'options'  => plumbing_get_list_header_footer_types( true ),
					'type'     => PLUMBING_THEME_FREE || ! plumbing_exists_trx_addons() ? 'hidden' : 'switch',
				),
				'header_style_mobile'           => array(
					'title'      => esc_html__( 'Select custom layout', 'plumbing' ),
					'desc'       => wp_kses( __( 'Select custom header from Layouts Builder', 'plumbing' ), 'plumbing_kses_content'  ),
					'dependency' => array(
						'header_type_mobile' => array( 'custom' ),
					),
					'std'        => 'inherit',
					'options'    => array(),
					'type'       => 'select',
				),
				'header_position_mobile'        => array(
					'title'    => esc_html__( 'Header position', 'plumbing' ),
					'desc'     => wp_kses_data( __( 'Select position to display the site header', 'plumbing' ) ),
					'std'      => 'inherit',
					'options'  => array(),
					'type'     => PLUMBING_THEME_FREE ? 'hidden' : 'switch',
				),

				'mobile_sidebar_info'           => array(
					'title' => esc_html__( 'Sidebar on the mobile device', 'plumbing' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'sidebar_position_mobile'       => array(
					'title'    => esc_html__( 'Sidebar position on mobile', 'plumbing' ),
					'desc'     => wp_kses_data( __( 'Select position to show sidebar on mobile devices', 'plumbing' ) ),
					'std'      => 'inherit',
					'options'  => array(),
					'type'     => 'switch',
				),
				'sidebar_widgets_mobile'        => array(
					'title'      => esc_html__( 'Sidebar widgets', 'plumbing' ),
					'desc'       => wp_kses_data( __( 'Select default widgets to show in the sidebar on mobile devices', 'plumbing' ) ),
					'dependency' => array(
						'sidebar_position_mobile' => array( '^hide' ),
					),
					'std'        => 'sidebar_widgets',
					'options'    => array(),
					'type'       => 'select',
				),
				'expand_content_mobile'         => array(
					'title'   => esc_html__( 'Expand content', 'plumbing' ),
					'desc'    => wp_kses_data( __( 'Expand the content width if the sidebar is hidden on mobile devices', 'plumbing' ) ),
					'refresh' => false,
					'dependency' => array(
						'sidebar_position_mobile' => array( 'hide', 'inherit' ),
					),
					'std'     => 'inherit',
					'options'  => plumbing_get_list_checkbox_values( true ),
					'type'     => PLUMBING_THEME_FREE ? 'hidden' : 'switch',
				),

				'mobile_footer_info'           => array(
					'title' => esc_html__( 'Footer on the mobile device', 'plumbing' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'footer_type_mobile'           => array(
					'title'    => esc_html__( 'Footer style', 'plumbing' ),
					'desc'     => wp_kses_data( __( 'Choose whether to use on mobile devices: the default footer or footer Layouts (available only if the ThemeREX Addons is activated)', 'plumbing' ) ),
					'std'      => 'inherit',
					'options'  => plumbing_get_list_header_footer_types(),
					'type'     => PLUMBING_THEME_FREE || ! plumbing_exists_trx_addons() ? 'hidden' : 'switch',
				),
				'footer_style_mobile'          => array(
					'title'      => esc_html__( 'Select custom layout', 'plumbing' ),
					'desc'       => wp_kses( __( 'Select custom footer from Layouts Builder', 'plumbing' ), 'plumbing_kses_content'  ),
					'dependency' => array(
						'footer_type_mobile' => array( 'custom' ),
					),
					'std'        => 'inherit',
					'options'    => array(),
					'type'       => 'select',
				),
				'footer_widgets_mobile'        => array(
					'title'      => esc_html__( 'Footer widgets', 'plumbing' ),
					'desc'       => wp_kses_data( __( 'Select set of widgets to show in the footer', 'plumbing' ) ),
					'dependency' => array(
						'footer_type_mobile' => array( 'default' ),
					),
					'std'        => 'footer_widgets',
					'options'    => array(),
					'type'       => 'select',
				),
				'footer_columns_mobile'        => array(
					'title'      => esc_html__( 'Footer columns', 'plumbing' ),
					'desc'       => wp_kses_data( __( 'Select number columns to show widgets in the footer. If 0 - autodetect by the widgets count', 'plumbing' ) ),
					'dependency' => array(
						'footer_type_mobile'    => array( 'default' ),
						'footer_widgets_mobile' => array( '^hide' ),
					),
					'std'        => 0,
					'options'    => plumbing_get_list_range( 0, 6 ),
					'type'       => 'select',
				),



				// 'Blog'
				//---------------------------------------------
				'blog'                          => array(
					'title'    => esc_html__( 'Blog', 'plumbing' ),
					'desc'     => wp_kses_data( __( 'Options of the the blog archive', 'plumbing' ) ),
					'priority' => 70,
					'type'     => 'panel',
				),


				// Blog - Posts page
				//---------------------------------------------
				'blog_general'                  => array(
					'title' => esc_html__( 'Posts page', 'plumbing' ),
					'desc'  => wp_kses_data( __( 'Style and components of the blog archive', 'plumbing' ) ),
					'type'  => 'section',
				),
				'blog_general_info'             => array(
					'title'  => esc_html__( 'Posts page settings', 'plumbing' ),
					'desc'   => '',
					'qsetup' => esc_html__( 'General', 'plumbing' ),
					'type'   => 'info',
				),
				'blog_style'                    => array(
					'title'      => esc_html__( 'Blog style', 'plumbing' ),
					'desc'       => '',
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'plumbing' ),
					),
					'dependency' => array(
						'compare' => 'or',
						'#page_template' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
					),
					'std'        => 'excerpt',
					'qsetup'     => esc_html__( 'General', 'plumbing' ),
					'options'    => array(),
					'type'       => 'select',
				),
				'first_post_large'              => array(
					'title'      => esc_html__( 'First post large', 'plumbing' ),
					'desc'       => wp_kses_data( __( 'Make your first post stand out by making it bigger', 'plumbing' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'plumbing' ),
					),
					'dependency' => array(
						'compare' => 'or',
						'#page_template' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
						'blog_style' => array( 'classic', 'masonry' ),
					),
					'std'        => 0,
					'type'       => 'checkbox',
				),
				'blog_content'                  => array(
					'title'      => esc_html__( 'Posts content', 'plumbing' ),
					'desc'       => wp_kses_data( __( 'Display either post excerpts or the full post content', 'plumbing' ) ),
					'std'        => 'excerpt',
					'dependency' => array(
						'blog_style' => array( 'excerpt' ),
					),
					'options'    => array(
						'excerpt'  => esc_html__( 'Excerpt', 'plumbing' ),
						'fullpost' => esc_html__( 'Full post', 'plumbing' ),
					),
					'type'       => 'switch',
				),
				'excerpt_length'                => array(
					'title'      => esc_html__( 'Excerpt length', 'plumbing' ),
					'desc'       => wp_kses_data( __( 'Length (in words) to generate excerpt from the post content. Attention! If the post excerpt is explicitly specified - it appears unchanged', 'plumbing' ) ),
					'dependency' => array(
						'blog_style'   => array( 'excerpt' ),
						'blog_content' => array( 'excerpt' ),
					),
					'std'        => 55,
					'type'       => 'text',
				),
				'blog_columns'                  => array(
					'title'   => esc_html__( 'Blog columns', 'plumbing' ),
					'desc'    => wp_kses_data( __( 'How many columns should be used in the blog archive (from 2 to 4)?', 'plumbing' ) ),
					'std'     => 2,
					'options' => plumbing_get_list_range( 2, 4 ),
					'type'    => 'hidden',      // This options is available and must be overriden only for some modes (for example, 'shop')
				),
				'post_type'                     => array(
					'title'      => esc_html__( 'Post type', 'plumbing' ),
					'desc'       => wp_kses_data( __( 'Select post type to show in the blog archive', 'plumbing' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'plumbing' ),
					),
					'dependency' => array(
						'compare' => 'or',
						'#page_template' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
					),
					'linked'     => 'parent_cat',
					'refresh'    => false,
					'hidden'     => true,
					'std'        => 'post',
					'options'    => array(),
					'type'       => 'select',
				),
				'parent_cat'                    => array(
					'title'      => esc_html__( 'Category to show', 'plumbing' ),
					'desc'       => wp_kses_data( __( 'Select category to show in the blog archive', 'plumbing' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'plumbing' ),
					),
					'dependency' => array(
						'compare' => 'or',
						'#page_template' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
					),
					'refresh'    => false,
					'hidden'     => true,
					'std'        => '0',
					'options'    => array(),
					'type'       => 'select',
				),
				'posts_per_page'                => array(
					'title'      => esc_html__( 'Posts per page', 'plumbing' ),
					'desc'       => wp_kses_data( __( 'How many posts will be displayed on this page', 'plumbing' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'plumbing' ),
					),
					'dependency' => array(
						'compare' => 'or',
						'#page_template' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
					),
					'hidden'     => true,
					'std'        => '',
					'type'       => 'text',
				),
				'blog_pagination'               => array(
					'title'      => esc_html__( 'Pagination style', 'plumbing' ),
					'desc'       => wp_kses_data( __( 'Show Older/Newest posts or Page numbers below the posts list', 'plumbing' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'plumbing' ),
					),
					'std'        => 'pages',
					'qsetup'     => esc_html__( 'General', 'plumbing' ),
					'dependency' => array(
						'compare' => 'or',
						'#page_template' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
					),
					'options'    => array(
						'pages'    => esc_html__( 'Page numbers', 'plumbing' ),
						'links'    => esc_html__( 'Older/Newest', 'plumbing' ),
						'more'     => esc_html__( 'Load more', 'plumbing' ),
						'infinite' => esc_html__( 'Infinite scroll', 'plumbing' ),
					),
					'type'       => 'select',
				),
				'blog_animation'                => array(
					'title'      => esc_html__( 'Animation for the posts', 'plumbing' ),
					'desc'       => wp_kses_data( __( 'Select animation to show posts in the blog. Attention! Do not use any animation on pages with the "wheel to the anchor" behaviour (like a "Chess 2 columns")!', 'plumbing' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'plumbing' ),
					),
					'dependency' => array(
						'compare' => 'or',
						'#page_template' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
					),
					'std'        => 'fadeInUpSmall',
					'options'    => array(),
					'type'       => PLUMBING_THEME_FREE ? 'hidden' : 'select',
				),
				'show_filters'                  => array(
					'title'      => esc_html__( 'Show filters', 'plumbing' ),
					'desc'       => wp_kses_data( __( 'Show categories as tabs to filter posts', 'plumbing' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'plumbing' ),
					),
					'dependency' => array(
						'compare' => 'or',
						'#page_template' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
						'blog_style'     => array( 'portfolio', 'gallery' ),
					),
					'hidden'     => true,
					'std'        => 0,
					'type'       => PLUMBING_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'open_full_post_in_blog'        => array(
					'title'      => esc_html__( 'Open full post in blog', 'plumbing' ),
					'desc'       => wp_kses_data( __( 'Allow to open the full version of the post directly in the blog feed. Attention! Applies only to 1 column layouts!', 'plumbing' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'plumbing' ),
					),
					'std'        => 0,
					'type'       => 'checkbox',
				),
				'open_full_post_hide_author'    => array(
					'title'      => esc_html__( 'Hide author bio', 'plumbing' ),
					'desc'       => wp_kses_data( __( "Hide author bio after post content when open the full version of the post directly in the blog feed.", 'plumbing' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'plumbing' ),
					),
					'dependency' => array(
						'open_full_post_in_blog' => array( 1 ),
					),
					'std'        => 1,
					'type'       => PLUMBING_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'open_full_post_hide_related'   => array(
					'title'      => esc_html__( 'Hide related posts', 'plumbing' ),
					'desc'       => wp_kses_data( __( "Hide related posts after post content when open the full version of the post directly in the blog feed.", 'plumbing' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'plumbing' ),
					),
					'dependency' => array(
						'open_full_post_in_blog' => array( 1 ),
					),
					'std'        => 1,
					'type'       => PLUMBING_THEME_FREE ? 'hidden' : 'checkbox',
				),

				'blog_header_info'              => array(
					'title' => esc_html__( 'Header', 'plumbing' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'header_type_blog'              => array(
					'title'    => esc_html__( 'Header style', 'plumbing' ),
					'desc'     => wp_kses_data( __( 'Choose whether to use the default header or header Layouts (available only if the ThemeREX Addons is activated)', 'plumbing' ) ),
					'std'      => 'inherit',
					'options'  => plumbing_get_list_header_footer_types( true ),
					'type'     => PLUMBING_THEME_FREE || ! plumbing_exists_trx_addons() ? 'hidden' : 'switch',
				),
				'header_style_blog'             => array(
					'title'      => esc_html__( 'Select custom layout', 'plumbing' ),
					'desc'       => wp_kses( __( 'Select custom header from Layouts Builder', 'plumbing' ), 'plumbing_kses_content'  ),
					'dependency' => array(
						'header_type_blog' => array( 'custom' ),
					),
					'std'        => 'inherit',
					'options'    => array(),
					'type'       => 'select',
				),
				'header_position_blog'          => array(
					'title'    => esc_html__( 'Header position', 'plumbing' ),
					'desc'     => wp_kses_data( __( 'Select position to display the site header', 'plumbing' ) ),
					'std'      => 'inherit',
					'options'  => array(),
					'type'     => PLUMBING_THEME_FREE ? 'hidden' : 'switch',
				),
				'header_fullheight_blog'        => array(
					'title'    => esc_html__( 'Header fullheight', 'plumbing' ),
					'desc'     => wp_kses_data( __( 'Enlarge header area to fill whole screen. Used only if header have a background image', 'plumbing' ) ),
					'std'      => 'inherit',
					'options'  => plumbing_get_list_checkbox_values( true ),
					'type'     => PLUMBING_THEME_FREE ? 'hidden' : 'switch',
				),
				'header_wide_blog'              => array(
					'title'      => esc_html__( 'Header fullwidth', 'plumbing' ),
					'desc'       => wp_kses_data( __( 'Do you want to stretch the header widgets area to the entire window width?', 'plumbing' ) ),
					'dependency' => array(
						'header_type_blog' => array( 'default' ),
					),
					'std'      => 'inherit',
					'options'  => plumbing_get_list_checkbox_values( true ),
					'type'     => PLUMBING_THEME_FREE ? 'hidden' : 'switch',
				),

				'blog_sidebar_info'             => array(
					'title' => esc_html__( 'Sidebar', 'plumbing' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'sidebar_position_blog'         => array(
					'title'   => esc_html__( 'Sidebar position', 'plumbing' ),
					'desc'    => wp_kses_data( __( 'Select position to show sidebar', 'plumbing' ) ),
					'std'     => 'right',
					'options' => array(),
					'qsetup'     => esc_html__( 'General', 'plumbing' ),
					'type'    => 'switch',
				),
				'sidebar_position_ss_blog'  => array(
					'title'    => esc_html__( 'Sidebar position on the small screen', 'plumbing' ),
					'desc'     => wp_kses_data( __( 'Select position to move sidebar on the small screen - above or below the content', 'plumbing' ) ),
					'dependency' => array(
						'sidebar_position_blog' => array( '^hide' ),
					),
					'std'      => 'inherit',
					'qsetup'   => esc_html__( 'General', 'plumbing' ),
					'options'  => array(),
					'type'     => 'switch',
				),
				'sidebar_widgets_blog'          => array(
					'title'      => esc_html__( 'Sidebar widgets', 'plumbing' ),
					'desc'       => wp_kses_data( __( 'Select default widgets to show in the sidebar', 'plumbing' ) ),
					'dependency' => array(
						'sidebar_position_blog' => array( '^hide' ),
					),
					'std'        => 'sidebar_widgets',
					'options'    => array(),
					'qsetup'     => esc_html__( 'General', 'plumbing' ),
					'type'       => 'select',
				),
				'expand_content_blog'           => array(
					'title'   => esc_html__( 'Expand content', 'plumbing' ),
					'desc'    => wp_kses_data( __( 'Expand the content width if the sidebar is hidden', 'plumbing' ) ),
					'refresh' => false,
					'std'     => 'inherit',
					'options'  => plumbing_get_list_checkbox_values( true ),
					'type'     => PLUMBING_THEME_FREE ? 'hidden' : 'switch',
				),
				
				'blog_advanced_info'            => array(
					'title' => esc_html__( 'Advanced settings', 'plumbing' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'no_image'                      => array(
					'title' => esc_html__( 'Image placeholder', 'plumbing' ),
					'desc'  => wp_kses_data( __( 'Select or upload an image used as placeholder for posts without a featured image', 'plumbing' ) ),
					'std'   => '',
					'type'  => 'image',
				),
				'time_diff_before'              => array(
					'title' => esc_html__( 'Easy Readable Date Format', 'plumbing' ),
					'desc'  => wp_kses_data( __( "For how many days to show the easy-readable date format (e.g. '3 days ago') instead of the standard publication date", 'plumbing' ) ),
					'std'   => 5,
					'type'  => 'text',
				),
				'sticky_style'                  => array(
					'title'   => esc_html__( 'Sticky posts style', 'plumbing' ),
					'desc'    => wp_kses_data( __( 'Select style of the sticky posts output', 'plumbing' ) ),
					'std'     => 'inherit',
					'options' => array(
						'inherit' => esc_html__( 'Decorated posts', 'plumbing' ),
					),
					'type'    => PLUMBING_THEME_FREE ? 'hidden' : 'select',
				),
				'meta_parts'                    => array(
					'title'      => esc_html__( 'Post meta', 'plumbing' ),
					'desc'       => wp_kses_data( __( "If your blog page is created using the 'Blog archive' page template, set up the 'Post Meta' settings in the 'Theme Options' section of that page. Post counters and Share Links are available only if plugin ThemeREX Addons is active", 'plumbing' ) )
								. '<br>'
								. wp_kses_data( __( '<b>Tip:</b> Drag items to change their order.', 'plumbing' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'plumbing' ),
					),
					'dependency' => array(
						'compare' => 'or',
						'#page_template' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
					),
					'dir'        => 'vertical',
					'sortable'   => true,
					'std'        => 'categories=0|date=1|views=0|comments=1|likes=1|author=0|share=0|edit=0',
					'options'    => plumbing_get_list_meta_parts(),
					'type'       => PLUMBING_THEME_FREE ? 'hidden' : 'checklist',
				),


				// Blog - Single posts
				//---------------------------------------------
				'blog_single'                   => array(
					'title' => esc_html__( 'Single posts', 'plumbing' ),
					'desc'  => wp_kses_data( __( 'Settings of the single post', 'plumbing' ) ),
					'type'  => 'section',
				),

				'blog_single_header_info'       => array(
					'title' => esc_html__( 'Header', 'plumbing' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'header_type_single'            => array(
					'title'    => esc_html__( 'Header style', 'plumbing' ),
					'desc'     => wp_kses_data( __( 'Choose whether to use the default header or header Layouts (available only if the ThemeREX Addons is activated)', 'plumbing' ) ),
					'std'      => 'inherit',
					'options'  => plumbing_get_list_header_footer_types( true ),
					'type'     => PLUMBING_THEME_FREE || ! plumbing_exists_trx_addons() ? 'hidden' : 'switch',
				),
				'header_style_single'           => array(
					'title'      => esc_html__( 'Select custom layout', 'plumbing' ),
					'desc'       => wp_kses( __( 'Select custom header from Layouts Builder', 'plumbing' ), 'plumbing_kses_content' ),
					'dependency' => array(
						'header_type_single' => array( 'custom' ),
					),
					'std'        => 'inherit',
					'options'    => array(),
					'type'       => 'select',
				),
				'header_position_single'        => array(
					'title'    => esc_html__( 'Header position', 'plumbing' ),
					'desc'     => wp_kses_data( __( 'Select position to display the site header', 'plumbing' ) ),
					'std'      => 'inherit',
					'options'  => array(),
					'type'     => PLUMBING_THEME_FREE ? 'hidden' : 'switch',
				),
				'header_fullheight_single'      => array(
					'title'    => esc_html__( 'Header fullheight', 'plumbing' ),
					'desc'     => wp_kses_data( __( 'Enlarge header area to fill whole screen. Used only if header have a background image', 'plumbing' ) ),
					'std'      => 'inherit',
					'options'  => plumbing_get_list_checkbox_values( true ),
					'type'     => PLUMBING_THEME_FREE ? 'hidden' : 'switch',
				),
				'header_wide_single'            => array(
					'title'      => esc_html__( 'Header fullwidth', 'plumbing' ),
					'desc'       => wp_kses_data( __( 'Do you want to stretch the header widgets area to the entire window width?', 'plumbing' ) ),
					'dependency' => array(
						'header_type_single' => array( 'default' ),
					),
					'std'      => 'inherit',
					'options'  => plumbing_get_list_checkbox_values( true ),
					'type'     => PLUMBING_THEME_FREE ? 'hidden' : 'switch',
				),

				'blog_single_sidebar_info'      => array(
					'title' => esc_html__( 'Sidebar', 'plumbing' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'sidebar_position_single'       => array(
					'title'   => esc_html__( 'Sidebar position', 'plumbing' ),
					'desc'    => wp_kses_data( __( 'Select position to show sidebar on the single posts', 'plumbing' ) ),
					'std'     => 'right',
					'override'   => array(
						'mode'    => 'post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Widgets', 'plumbing' ),
					),
					'options' => array(),
					'type'    => 'switch',
				),
				'sidebar_position_ss_single'=> array(
					'title'    => esc_html__( 'Sidebar position on the small screen', 'plumbing' ),
					'desc'     => wp_kses_data( __( 'Select position to move sidebar on the single posts on the small screen - above or below the content', 'plumbing' ) ),
					'override' => array(
						'mode'    => 'post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Widgets', 'plumbing' ),
					),
					'dependency' => array(
						'sidebar_position_single' => array( '^hide' ),
					),
					'std'      => 'below',
					'options'  => array(),
					'type'     => 'switch',
				),
				'sidebar_widgets_single'        => array(
					'title'      => esc_html__( 'Sidebar widgets', 'plumbing' ),
					'desc'       => wp_kses_data( __( 'Select default widgets to show in the sidebar on the single posts', 'plumbing' ) ),
					'override'   => array(
						'mode'    => 'post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Widgets', 'plumbing' ),
					),
					'dependency' => array(
						'sidebar_position_single' => array( '^hide' ),
					),
					'std'        => 'sidebar_widgets',
					'options'    => array(),
					'type'       => 'select',
				),
				'expand_content_single'           => array(
					'title'   => esc_html__( 'Expand content', 'plumbing' ),
					'desc'    => wp_kses_data( __( 'Expand the content width on the single posts if the sidebar is hidden', 'plumbing' ) ),
					'refresh' => false,
					'std'     => 'inherit',
					'options'  => plumbing_get_list_checkbox_values( true ),
					'type'     => PLUMBING_THEME_FREE ? 'hidden' : 'switch',
				),

				'blog_single_title_info'      => array(
					'title' => esc_html__( 'Featured image and title', 'plumbing' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'hide_featured_on_single'       => array(
					'title'    => esc_html__( 'Hide featured image on the single post', 'plumbing' ),
					'desc'     => wp_kses_data( __( "Hide featured image on the single post's pages", 'plumbing' ) ),
					'override' => array(
						'mode'    => 'page,post',
						'section' => esc_html__( 'Content', 'plumbing' ),
					),
					'std'      => 0,
					'type'     => 'checkbox',
				),
				'post_thumbnail_type'      => array(
					'title'      => esc_html__( 'Type of post thumbnail', 'plumbing' ),
					'desc'       => wp_kses_data( __( "Select type of post thumbnail on the single post's pages", 'plumbing' ) ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'plumbing' ),
					),
					'dependency' => array(
						'hide_featured_on_single' => array( 'is_empty', 0 ),
					),
					'std'        => 'default',
					'options'    => array(
						'fullwidth'   => esc_html__( 'Fullwidth', 'plumbing' ),
						'boxed'       => esc_html__( 'Boxed', 'plumbing' ),
						'default'     => esc_html__( 'Default', 'plumbing' ),
					),
					'type'       => PLUMBING_THEME_FREE ? 'hidden' : 'select',
				),
				'post_header_position'          => array(
					'title'      => esc_html__( 'Post header position', 'plumbing' ),
					'desc'       => wp_kses_data( __( "Select post header position on the single post's pages", 'plumbing' ) ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'plumbing' ),
					),
					'dependency' => array(
						'hide_featured_on_single' => array( 'is_empty', 0 )
					),
					'std'        => 'under',
					'options'    => array(
						'above'      => esc_html__( 'Above the post thumbnail', 'plumbing' ),
						'under'      => esc_html__( 'Under the post thumbnail', 'plumbing' ),
						'default'    => esc_html__( 'Default', 'plumbing' ),
					),
					'type'       => PLUMBING_THEME_FREE ? 'hidden' : 'select',
				),
				'post_header_align'             => array(
					'title'      => esc_html__( 'Align of the post header', 'plumbing' ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'plumbing' ),
					),
					'dependency' => array(
						'post_header_position' => array( 'on_thumb' ),
					),
					'std'        => 'mc',
					'options'    => array(
						'ts' => esc_html__('Top Stick Out', 'plumbing'),
						'tl' => esc_html__('Top Left', 'plumbing'),
						'tc' => esc_html__('Top Center', 'plumbing'),
						'tr' => esc_html__('Top Right', 'plumbing'),
						'ml' => esc_html__('Middle Left', 'plumbing'),
						'mc' => esc_html__('Middle Center', 'plumbing'),
						'mr' => esc_html__('Middle Right', 'plumbing'),
						'bl' => esc_html__('Bottom Left', 'plumbing'),
						'bc' => esc_html__('Bottom Center', 'plumbing'),
						'br' => esc_html__('Bottom Right', 'plumbing'),
						'bs' => esc_html__('Bottom Stick Out', 'plumbing'),
					),
					'type'       => PLUMBING_THEME_FREE ? 'hidden' : 'select',
				),
				'post_subtitle'                 => array(
					'title' => esc_html__( 'Post subtitle', 'plumbing' ),
					'desc'  => wp_kses_data( __( "Specify post subtitle to display it under the post title.", 'plumbing' ) ),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'plumbing' ),
					),
					'std'   => '',
					'hidden' => true,
					'type'  => 'text',
				),
				'show_post_meta'                => array(
					'title' => esc_html__( 'Show post meta', 'plumbing' ),
					'desc'  => wp_kses_data( __( "Display block with post's meta: date, categories, counters, etc.", 'plumbing' ) ),
					'std'   => 1,
					'type'  => 'checkbox',
				),
				'meta_parts_single'             => array(
					'title'      => esc_html__( 'Post meta', 'plumbing' ),
					'desc'       => wp_kses_data( __( 'Meta parts for single posts. Post counters and Share Links are available only if plugin ThemeREX Addons is active', 'plumbing' ) )
								. '<br>'
								. wp_kses_data( __( '<b>Tip:</b> Drag items to change their order.', 'plumbing' ) ),
					'dependency' => array(
						'show_post_meta' => array( 1 ),
					),
					'dir'        => 'vertical',
					'sortable'   => true,
					'std'        => 'categories=0|date=1|views=0|comments=1|likes=1|author=0|share=0|edit=0',
					'options'    => plumbing_get_list_meta_parts(),
					'type'       => PLUMBING_THEME_FREE ? 'hidden' : 'checklist',
				),
				'show_share_links'              => array(
					'title' => esc_html__( 'Show share links', 'plumbing' ),
					'desc'  => wp_kses_data( __( 'Display share links on the single post', 'plumbing' ) ),
					'std'   => 0,
					'type'  => ! plumbing_exists_trx_addons() ? 'hidden' : 'checkbox',
				),
				'show_author_info'              => array(
					'title' => esc_html__( 'Show author info', 'plumbing' ),
					'desc'  => wp_kses_data( __( "Display block with information about post's author", 'plumbing' ) ),
					'std'   => 1,
					'type'  => 'checkbox',
				),

				'blog_single_related_info'      => array(
					'title' => esc_html__( 'Related posts', 'plumbing' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'show_related_posts'            => array(
					'title'    => esc_html__( 'Show related posts', 'plumbing' ),
					'desc'     => wp_kses_data( __( "Show section 'Related posts' on the single post's pages", 'plumbing' ) ),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'plumbing' ),
					),
					'std'      => 1,
					'type'     => 'checkbox',
				),
				'related_style'                 => array(
					'title'      => esc_html__( 'Related posts style', 'plumbing' ),
					'desc'       => wp_kses_data( __( 'Select style of the related posts output', 'plumbing' ) ),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'plumbing' ),
					),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
					),
					'std'        => 'classic',
					'options'    => array(
						'classic' => esc_html__( 'Classic', 'plumbing' ),
					),
					'type'       => PLUMBING_THEME_FREE ? 'hidden' : 'switch',
				),
				'related_position'              => array(
					'title'      => esc_html__( 'Related posts position', 'plumbing' ),
					'desc'       => wp_kses_data( __( 'Select position to display the related posts', 'plumbing' ) ),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'plumbing' ),
					),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
					),
					'std'        => 'below_content',
					'options'    => array (
						'inside'        => esc_html__( 'Inside the content (fullwidth)', 'plumbing' ),
						'inside_left'   => esc_html__( 'At left side of the content', 'plumbing' ),
						'inside_right'  => esc_html__( 'At right side of the content', 'plumbing' ),
						'below_content' => esc_html__( 'After the content', 'plumbing' ),
						'below_page'    => esc_html__( 'After the content & sidebar', 'plumbing' ),
					),
					'type'       => PLUMBING_THEME_FREE ? 'hidden' : 'select',
				),
				'related_position_inside'       => array(
					'title'      => esc_html__( 'Before # paragraph', 'plumbing' ),
					'desc'       => wp_kses_data( __( 'Before what paragraph should related posts appear? If 0 - randomly.', 'plumbing' ) ),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'plumbing' ),
					),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
						'related_position' => array( 'inside', 'inside_left', 'inside_right' ),
					),
					'std'        => 2,
					'options'    => plumbing_get_list_range( 0, 9 ),
					'type'       => PLUMBING_THEME_FREE ? 'hidden' : 'select',
				),
				'related_posts'                 => array(
					'title'      => esc_html__( 'Related posts', 'plumbing' ),
					'desc'       => wp_kses_data( __( 'How many related posts should be displayed in the single post? If 0 - no related posts are shown.', 'plumbing' ) ),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'plumbing' ),
					),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
					),
					'std'        => 2,
					'min'        => 1,
					'max'        => 9,
					'type'       => PLUMBING_THEME_FREE ? 'hidden' : 'slider',
				),
				'related_columns'               => array(
					'title'      => esc_html__( 'Related columns', 'plumbing' ),
					'desc'       => wp_kses_data( __( 'How many columns should be used to output related posts in the single page?', 'plumbing' ) ),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'plumbing' ),
					),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
						'related_position' => array( 'inside', 'below_content', 'below_page' ),
					),
					'std'        => 2,
					'options'    => plumbing_get_list_range( 1, 6 ),
					'type'       => PLUMBING_THEME_FREE ? 'hidden' : 'switch',
				),
				'related_slider'                => array(
					'title'      => esc_html__( 'Use slider layout', 'plumbing' ),
					'desc'       => wp_kses_data( __( 'Use slider layout in case related posts count is more than columns count', 'plumbing' ) ),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'plumbing' ),
					),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
					),
					'std'        => 0,
					'type'       => PLUMBING_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'related_slider_controls'       => array(
					'title'      => esc_html__( 'Slider controls', 'plumbing' ),
					'desc'       => wp_kses_data( __( 'Show arrows in the slider', 'plumbing' ) ),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'plumbing' ),
					),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
						'related_slider' => array( 1 ),
					),
					'std'        => 'none',
					'options'    => array(
						'none'    => esc_html__('None', 'plumbing'),
						'side'    => esc_html__('Side', 'plumbing'),
						'outside' => esc_html__('Outside', 'plumbing'),
						'top'     => esc_html__('Top', 'plumbing'),
						'bottom'  => esc_html__('Bottom', 'plumbing')
					),
					'type'       => PLUMBING_THEME_FREE ? 'hidden' : 'select',
				),
				'related_slider_pagination'       => array(
					'title'      => esc_html__( 'Slider pagination', 'plumbing' ),
					'desc'       => wp_kses_data( __( 'Show bullets after the slider', 'plumbing' ) ),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'plumbing' ),
					),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
						'related_slider' => array( 1 ),
					),
					'std'        => 'bottom',
					'options'    => array(
						'none'    => esc_html__('None', 'plumbing'),
						'bottom'  => esc_html__('Bottom', 'plumbing')
					),
					'type'       => PLUMBING_THEME_FREE ? 'hidden' : 'switch',
				),
				'related_slider_space'          => array(
					'title'      => esc_html__( 'Space', 'plumbing' ),
					'desc'       => wp_kses_data( __( 'Space between slides', 'plumbing' ) ),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'plumbing' ),
					),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
						'related_slider' => array( 1 ),
					),
					'std'        => 30,
					'type'       => PLUMBING_THEME_FREE ? 'hidden' : 'text',
				),
				'posts_navigation_info'      => array(
					'title' => esc_html__( 'Posts navigation', 'plumbing' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'posts_navigation'           => array(
					'title'   => esc_html__( 'Show posts navigation', 'plumbing' ),
					'desc'    => wp_kses_data( __( "Show posts navigation on the single post's pages", 'plumbing' ) ),
					'std'     => 'links',
					'options' => array(
						'none'   => esc_html__('None', 'plumbing'),
						'links'  => esc_html__('Prev/Next links', 'plumbing'),
					),
					'type'    => PLUMBING_THEME_FREE ? 'hidden' : 'switch',
				),
				'blog_end'                      => array(
					'type' => 'panel_end',
				),



				// 'Colors'
				//---------------------------------------------
				'panel_colors'                  => array(
					'title'    => esc_html__( 'Colors', 'plumbing' ),
					'desc'     => '',
					'priority' => 300,
					'type'     => 'section',
				),

				'color_schemes_info'            => array(
					'title'  => esc_html__( 'Color schemes', 'plumbing' ),
					'desc'   => wp_kses_data( __( 'Color schemes for various parts of the site. "Inherit" means that this block is used the Site color scheme (the first parameter)', 'plumbing' ) ),
					'hidden' => $hide_schemes,
					'type'   => 'info',
				),
				'color_scheme'                  => array(
					'title'    => esc_html__( 'Site Color Scheme', 'plumbing' ),
					'desc'     => '',
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Colors', 'plumbing' ),
					),
					'std'      => 'default',
					'options'  => array(),
					'refresh'  => false,
					'type'     => $hide_schemes ? 'hidden' : 'switch',
				),
				'header_scheme'                 => array(
					'title'    => esc_html__( 'Header Color Scheme', 'plumbing' ),
					'desc'     => '',
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Colors', 'plumbing' ),
					),
					'std'      => 'inherit',
					'options'  => array(),
					'refresh'  => false,
					'type'     => $hide_schemes ? 'hidden' : 'switch',
				),
				'sidebar_scheme'                => array(
					'title'    => esc_html__( 'Sidebar Color Scheme', 'plumbing' ),
					'desc'     => '',
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Colors', 'plumbing' ),
					),
					'std'      => 'inherit',
					'options'  => array(),
					'refresh'  => false,
					'type'     => $hide_schemes ? 'hidden' : 'switch',
				),
				'footer_scheme'                 => array(
					'title'    => esc_html__( 'Footer Color Scheme', 'plumbing' ),
					'desc'     => '',
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Colors', 'plumbing' ),
					),
					'std'      => 'dark',
					'options'  => array(),
					'refresh'  => false,
					'type'     => $hide_schemes ? 'hidden' : 'switch',
				),

				'color_scheme_editor_info'      => array(
					'title' => esc_html__( 'Color scheme editor', 'plumbing' ),
					'desc'  => wp_kses_data( __( 'Select color scheme to modify. Attention! Only those sections in the site will be changed which this scheme was assigned to', 'plumbing' ) ),
					'type'  => 'info',
				),
				'scheme_storage'                => array(
					'title'       => esc_html__( 'Color scheme editor', 'plumbing' ),
					'desc'        => '',
					'std'         => '$plumbing_get_scheme_storage',
					'refresh'     => false,
					'colorpicker' => 'tiny',
					'type'        => 'scheme_editor',
				),

				// Internal options.
				// Attention! Don't change any options in the section below!
				// Use huge priority to call render this elements after all options!
				'reset_options'                 => array(
					'title'    => '',
					'desc'     => '',
					'std'      => '0',
					'priority' => 10000,
					'type'     => 'hidden',
				),

				'last_option'                   => array(     // Need to manually call action to include Tiny MCE scripts
					'title' => '',
					'desc'  => '',
					'std'   => 1,
					'type'  => 'hidden',
				),

			)
		);



		// Prepare panel 'Fonts'
		// -------------------------------------------------------------
		$fonts = array(

			// 'Fonts'
			//---------------------------------------------
			'fonts'             => array(
				'title'    => esc_html__( 'Typography', 'plumbing' ),
				'desc'     => '',
				'priority' => 200,
				'type'     => 'panel',
			),

			// Fonts - Load_fonts
			'load_fonts'        => array(
				'title' => esc_html__( 'Load fonts', 'plumbing' ),
				'desc'  => wp_kses_data( __( 'Specify fonts to load when theme start. You can use them in the base theme elements: headers, text, menu, links, input fields, etc.', 'plumbing' ) )
						. '<br>'
						. wp_kses_data( __( 'Attention! Press "Refresh" button to reload preview area after the all fonts are changed', 'plumbing' ) ),
				'type'  => 'section',
			),
			'load_fonts_subset' => array(
				'title'   => esc_html__( 'Google fonts subsets', 'plumbing' ),
				'desc'    => wp_kses_data( __( 'Specify comma separated list of the subsets which will be load from Google fonts', 'plumbing' ) )
						. '<br>'
						. wp_kses_data( __( 'Available subsets are: latin,latin-ext,cyrillic,cyrillic-ext,greek,greek-ext,vietnamese', 'plumbing' ) ),
				'class'   => 'plumbing_column-1_3 plumbing_new_row',
				'refresh' => false,
				'std'     => '$plumbing_get_load_fonts_subset',
				'type'    => 'text',
			),
		);

		for ( $i = 1; $i <= plumbing_get_theme_setting( 'max_load_fonts' ); $i++ ) {
			if ( plumbing_get_value_gp( 'page' ) != 'theme_options' ) {
				$fonts[ "load_fonts-{$i}-info" ] = array(
					// Translators: Add font's number - 'Font 1', 'Font 2', etc
					'title' => esc_html( sprintf( __( 'Font %s', 'plumbing' ), $i ) ),
					'desc'  => '',
					'type'  => 'info',
				);
			}
			$fonts[ "load_fonts-{$i}-name" ]   = array(
				'title'   => esc_html__( 'Font name', 'plumbing' ),
				'desc'    => '',
				'class'   => 'plumbing_column-1_3 plumbing_new_row',
				'refresh' => false,
				'std'     => '$plumbing_get_load_fonts_option',
				'type'    => 'text',
			);
			$fonts[ "load_fonts-{$i}-family" ] = array(
				'title'   => esc_html__( 'Font family', 'plumbing' ),
				'desc'    => 1 == $i
							? wp_kses_data( __( 'Select font family to use it if font above is not available', 'plumbing' ) )
							: '',
				'class'   => 'plumbing_column-1_3',
				'refresh' => false,
				'std'     => '$plumbing_get_load_fonts_option',
				'options' => array(
					'inherit'    => esc_html__( 'Inherit', 'plumbing' ),
					'serif'      => esc_html__( 'serif', 'plumbing' ),
					'sans-serif' => esc_html__( 'sans-serif', 'plumbing' ),
					'monospace'  => esc_html__( 'monospace', 'plumbing' ),
					'cursive'    => esc_html__( 'cursive', 'plumbing' ),
					'fantasy'    => esc_html__( 'fantasy', 'plumbing' ),
				),
				'type'    => 'select',
			);
			$fonts[ "load_fonts-{$i}-styles" ] = array(
				'title'   => esc_html__( 'Font styles', 'plumbing' ),
				'desc'    => 1 == $i
							? wp_kses_data( __( 'Font styles used only for the Google fonts. This is a comma separated list of the font weight and styles. For example: 400,400italic,700', 'plumbing' ) )
								. '<br>'
								. wp_kses_data( __( 'Attention! Each weight and style increase download size! Specify only used weights and styles.', 'plumbing' ) )
							: '',
				'class'   => 'plumbing_column-1_3',
				'refresh' => false,
				'std'     => '$plumbing_get_load_fonts_option',
				'type'    => 'text',
			);
		}
		$fonts['load_fonts_end'] = array(
			'type' => 'section_end',
		);

		// Fonts - H1..6, P, Info, Menu, etc.
		$theme_fonts = plumbing_get_theme_fonts();
		foreach ( $theme_fonts as $tag => $v ) {
			$fonts[ "{$tag}_section" ] = array(
				'title' => ! empty( $v['title'] )
								? $v['title']
								// Translators: Add tag's name to make title 'H1 settings', 'P settings', etc.
								: esc_html( sprintf( __( '%s settings', 'plumbing' ), $tag ) ),
				'desc'  => ! empty( $v['description'] )
								? $v['description']
								// Translators: Add tag's name to make description
								: wp_kses( sprintf( __( 'Font settings of the "%s" tag.', 'plumbing' ), $tag ), 'plumbing_kses_content'  ),
				'type'  => 'section',
			);

			foreach ( $v as $css_prop => $css_value ) {
				if ( in_array( $css_prop, array( 'title', 'description' ) ) ) {
					continue;
				}
				$options    = '';
				$type       = 'text';
				$load_order = 1;
				$title      = ucfirst( str_replace( '-', ' ', $css_prop ) );
				if ( 'font-family' == $css_prop ) {
					$type       = 'select';
					$options    = array();
					$load_order = 2;        // Load this option's value after all options are loaded (use option 'load_fonts' to build fonts list)
				} elseif ( 'font-weight' == $css_prop ) {
					$type    = 'select';
					$options = array(
						'inherit' => esc_html__( 'Inherit', 'plumbing' ),
						'100'     => esc_html__( '100 (Light)', 'plumbing' ),
						'200'     => esc_html__( '200 (Light)', 'plumbing' ),
						'300'     => esc_html__( '300 (Thin)', 'plumbing' ),
						'400'     => esc_html__( '400 (Normal)', 'plumbing' ),
						'500'     => esc_html__( '500 (Semibold)', 'plumbing' ),
						'600'     => esc_html__( '600 (Semibold)', 'plumbing' ),
						'700'     => esc_html__( '700 (Bold)', 'plumbing' ),
						'800'     => esc_html__( '800 (Black)', 'plumbing' ),
						'900'     => esc_html__( '900 (Black)', 'plumbing' ),
					);
				} elseif ( 'font-style' == $css_prop ) {
					$type    = 'select';
					$options = array(
						'inherit' => esc_html__( 'Inherit', 'plumbing' ),
						'normal'  => esc_html__( 'Normal', 'plumbing' ),
						'italic'  => esc_html__( 'Italic', 'plumbing' ),
					);
				} elseif ( 'text-decoration' == $css_prop ) {
					$type    = 'select';
					$options = array(
						'inherit'      => esc_html__( 'Inherit', 'plumbing' ),
						'none'         => esc_html__( 'None', 'plumbing' ),
						'underline'    => esc_html__( 'Underline', 'plumbing' ),
						'overline'     => esc_html__( 'Overline', 'plumbing' ),
						'line-through' => esc_html__( 'Line-through', 'plumbing' ),
					);
				} elseif ( 'text-transform' == $css_prop ) {
					$type    = 'select';
					$options = array(
						'inherit'    => esc_html__( 'Inherit', 'plumbing' ),
						'none'       => esc_html__( 'None', 'plumbing' ),
						'uppercase'  => esc_html__( 'Uppercase', 'plumbing' ),
						'lowercase'  => esc_html__( 'Lowercase', 'plumbing' ),
						'capitalize' => esc_html__( 'Capitalize', 'plumbing' ),
					);
				}
				$fonts[ "{$tag}_{$css_prop}" ] = array(
					'title'      => $title,
					'desc'       => '',
					'class'      => 'plumbing_column-1_5',
					'refresh'    => false,
					'load_order' => $load_order,
					'std'        => '$plumbing_get_theme_fonts_option',
					'options'    => $options,
					'type'       => $type,
				);
			}

			$fonts[ "{$tag}_section_end" ] = array(
				'type' => 'section_end',
			);
		}

		$fonts['fonts_end'] = array(
			'type' => 'panel_end',
		);

		// Add fonts parameters to Theme Options
		plumbing_storage_set_array_before( 'options', 'panel_colors', $fonts );

		// Add Header Video if WP version < 4.7
		// -----------------------------------------------------
		if ( ! function_exists( 'get_header_video_url' ) ) {
			plumbing_storage_set_array_after(
				'options', 'header_image_override', 'header_video', array(
					'title'    => esc_html__( 'Header video', 'plumbing' ),
					'desc'     => wp_kses_data( __( 'Select video to use it as background for the header', 'plumbing' ) ),
					'override' => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Header', 'plumbing' ),
					),
					'std'      => '',
					'type'     => 'video',
				)
			);
		}

		// Add option 'logo' if WP version < 4.5
		// or 'custom_logo' if current page is not 'Customize'
		// ------------------------------------------------------
		if ( ! function_exists( 'the_custom_logo' ) || ! plumbing_check_url( 'customize.php' ) ) {
			plumbing_storage_set_array_before(
				'options', 'logo_retina', function_exists( 'the_custom_logo' ) ? 'custom_logo' : 'logo', array(
					'title'    => esc_html__( 'Logo', 'plumbing' ),
					'desc'     => wp_kses_data( __( 'Select or upload the site logo', 'plumbing' ) ),
					'class'    => 'plumbing_column-1_2 plumbing_new_row',
					'priority' => 60,
					'std'      => '',
					'qsetup'   => esc_html__( 'General', 'plumbing' ),
					'type'     => 'image',
				)
			);
		}

	}
}


// Returns a list of options that can be overridden for CPT
if ( ! function_exists( 'plumbing_options_get_list_cpt_options' ) ) {
	function plumbing_options_get_list_cpt_options( $cpt, $title = '' ) {
		if ( empty( $title ) ) {
			$title = ucfirst( $cpt );
		}
		return array(
			"content_info_{$cpt}"           => array(
				'title' => esc_html__( 'Content', 'plumbing' ),
				'desc'  => '',
				'type'  => 'info',
			),
			"body_style_{$cpt}"             => array(
				'title'    => esc_html__( 'Body style', 'plumbing' ),
				'desc'     => wp_kses_data( __( 'Select width of the body content', 'plumbing' ) ),
				'std'      => 'inherit',
				'options'  => plumbing_get_list_body_styles( true ),
				'type'     => 'select',
			),
			"boxed_bg_image_{$cpt}"         => array(
				'title'      => esc_html__( 'Boxed bg image', 'plumbing' ),
				'desc'       => wp_kses_data( __( 'Select or upload image, used as background in the boxed body', 'plumbing' ) ),
				'dependency' => array(
					"body_style_{$cpt}" => array( 'boxed' ),
				),
				'std'        => 'inherit',
				'type'       => 'image',
			),
			"header_info_{$cpt}"            => array(
				'title' => esc_html__( 'Header', 'plumbing' ),
				'desc'  => '',
				'type'  => 'info',
			),
			"header_type_{$cpt}"            => array(
				'title'   => esc_html__( 'Header style', 'plumbing' ),
				'desc'    => wp_kses_data( __( 'Choose whether to use the default header or header Layouts (available only if the ThemeREX Addons is activated)', 'plumbing' ) ),
				'std'     => 'inherit',
				'options' => plumbing_get_list_header_footer_types( true ),
				'type'    => PLUMBING_THEME_FREE ? 'hidden' : 'switch',
			),
			"header_style_{$cpt}"           => array(
				'title'      => esc_html__( 'Select custom layout', 'plumbing' ),
				// Translators: Add CPT name to the description
				'desc'       => wp_kses_data( sprintf( __( 'Select custom layout to display the site header on the %s pages', 'plumbing' ), $title ) ),
				'dependency' => array(
					"header_type_{$cpt}" => array( 'custom' ),
				),
				'std'        => 'inherit',
				'options'    => array(),
				'type'       => PLUMBING_THEME_FREE ? 'hidden' : 'select',
			),
			"header_position_{$cpt}"        => array(
				'title'   => esc_html__( 'Header position', 'plumbing' ),
				// Translators: Add CPT name to the description
				'desc'    => wp_kses_data( sprintf( __( 'Select position to display the site header on the %s pages', 'plumbing' ), $title ) ),
				'std'     => 'inherit',
				'options' => array(),
				'type'    => PLUMBING_THEME_FREE ? 'hidden' : 'switch',
			),

			"sidebar_info_{$cpt}"           => array(
				'title' => esc_html__( 'Sidebar', 'plumbing' ),
				'desc'  => '',
				'type'  => 'info',
			),
			"sidebar_position_{$cpt}"       => array(
				'title'   => sprintf( __( 'Sidebar position on the %s list', 'plumbing' ), $title ),
				// Translators: Add CPT name to the description
				'desc'    => wp_kses_data( sprintf( __( 'Select position to show sidebar on the %s list', 'plumbing' ), $title ) ),
				'std'     => 'left',
				'options' => array(),
				'type'    => 'switch',
			),
			"sidebar_position_ss_{$cpt}"=> array(
				'title'    => sprintf( __( 'Sidebar position on the %s list on the small screen', 'plumbing' ), $title ),
				'desc'     => wp_kses_data( __( 'Select position to move sidebar on the small screen - above or below the content', 'plumbing' ) ),
				'std'      => 'below',
				'dependency' => array(
					"sidebar_position_{$cpt}" => array( '^hide' ),
				),
				'options'  => array(),
				'type'     => 'switch',
			),
			"sidebar_widgets_{$cpt}"        => array(
				'title'      => sprintf( esc_html__( 'Sidebar widgets on the %s list', 'plumbing' ), $title ),
				// Translators: Add CPT name to the description
				'desc'       => wp_kses_data( sprintf( __( 'Select sidebar to show on the %s list', 'plumbing' ), $title ) ),
				'dependency' => array(
					"sidebar_position_{$cpt}" => array( '^hide' ),
				),
				'std'        => 'hide',
				'options'    => array(),
				'type'       => 'select',
			),
			"sidebar_position_single_{$cpt}"       => array(
				'title'   => sprintf( __( 'Sidebar position on the single post', 'plumbing' ), $title ),
				// Translators: Add CPT name to the description
				'desc'    => wp_kses_data( sprintf( __( 'Select position to show sidebar on the single posts of the %s', 'plumbing' ), $title ) ),
				'std'     => 'left',
				'options' => array(),
				'type'    => 'switch',
			),
			"sidebar_position_ss_single_{$cpt}"=> array(
				'title'    => esc_html__( 'Sidebar position on the single post on the small screen', 'plumbing' ),
				'desc'     => wp_kses_data( __( 'Select position to move sidebar on the small screen - above or below the content', 'plumbing' ) ),
				'dependency' => array(
					"sidebar_position_single_{$cpt}" => array( '^hide' ),
				),
				'std'      => 'below',
				'options'  => array(),
				'type'     => 'switch',
			),
			"sidebar_widgets_single_{$cpt}"        => array(
				'title'      => sprintf( esc_html__( 'Sidebar widgets on the single post', 'plumbing' ), $title ),
				// Translators: Add CPT name to the description
				'desc'       => wp_kses_data( sprintf( __( 'Select widgets to show in the sidebar on the single posts of the %s', 'plumbing' ), $title ) ),
				'dependency' => array(
					"sidebar_position_single_{$cpt}" => array( '^hide' ),
				),
				'std'        => 'hide',
				'options'    => array(),
				'type'       => 'select',
			),
			"expand_content_{$cpt}"         => array(
				'title'   => esc_html__( 'Expand content', 'plumbing' ),
				'desc'    => wp_kses_data( __( 'Expand the content width if the sidebar is hidden', 'plumbing' ) ),
				'refresh' => false,
				'std'     => 'inherit',
				'options'  => plumbing_get_list_checkbox_values( true ),
				'type'     => PLUMBING_THEME_FREE ? 'hidden' : 'switch',
			),
			"expand_content_single_{$cpt}"         => array(
				'title'   => esc_html__( 'Expand content on the single post', 'plumbing' ),
				'desc'    => wp_kses_data( __( 'Expand the content width on the single post if the sidebar is hidden', 'plumbing' ) ),
				'refresh' => false,
				'std'     => 'inherit',
				'options'  => plumbing_get_list_checkbox_values( true ),
				'type'     => PLUMBING_THEME_FREE ? 'hidden' : 'switch',
			),

			"footer_info_{$cpt}"            => array(
				'title' => esc_html__( 'Footer', 'plumbing' ),
				'desc'  => '',
				'type'  => 'info',
			),
			"footer_type_{$cpt}"            => array(
				'title'   => esc_html__( 'Footer style', 'plumbing' ),
				'desc'    => wp_kses_data( __( 'Choose whether to use the default footer or footer Layouts (available only if the ThemeREX Addons is activated)', 'plumbing' ) ),
				'std'     => 'inherit',
				'options' => plumbing_get_list_header_footer_types( true ),
				'type'    => PLUMBING_THEME_FREE ? 'hidden' : 'switch',
			),
			"footer_style_{$cpt}"           => array(
				'title'      => esc_html__( 'Select custom layout', 'plumbing' ),
				'desc'       => wp_kses_data( __( 'Select custom layout to display the site footer', 'plumbing' ) ),
				'std'        => 'inherit',
				'dependency' => array(
					"footer_type_{$cpt}" => array( 'custom' ),
				),
				'options'    => array(),
				'type'       => PLUMBING_THEME_FREE ? 'hidden' : 'select',
			),
			"footer_widgets_{$cpt}"         => array(
				'title'      => esc_html__( 'Footer widgets', 'plumbing' ),
				'desc'       => wp_kses_data( __( 'Select set of widgets to show in the footer', 'plumbing' ) ),
				'dependency' => array(
					"footer_type_{$cpt}" => array( 'default' ),
				),
				'std'        => 'footer_widgets',
				'options'    => array(),
				'type'       => 'select',
			),
			"footer_columns_{$cpt}"         => array(
				'title'      => esc_html__( 'Footer columns', 'plumbing' ),
				'desc'       => wp_kses_data( __( 'Select number columns to show widgets in the footer. If 0 - autodetect by the widgets count', 'plumbing' ) ),
				'dependency' => array(
					"footer_type_{$cpt}"    => array( 'default' ),
					"footer_widgets_{$cpt}" => array( '^hide' ),
				),
				'std'        => 0,
				'options'    => plumbing_get_list_range( 0, 6 ),
				'type'       => 'select',
			),
			"footer_wide_{$cpt}"            => array(
				'title'      => esc_html__( 'Footer fullwidth', 'plumbing' ),
				'desc'       => wp_kses_data( __( 'Do you want to stretch the footer to the entire window width?', 'plumbing' ) ),
				'dependency' => array(
					"footer_type_{$cpt}" => array( 'default' ),
				),
				'std'        => 0,
				'type'       => 'checkbox',
			),

		);
	}
}


// Return lists with choises when its need in the admin mode
if ( ! function_exists( 'plumbing_options_get_list_choises' ) ) {
	add_filter( 'plumbing_filter_options_get_list_choises', 'plumbing_options_get_list_choises', 10, 2 );
	function plumbing_options_get_list_choises( $list, $id ) {
		if ( is_array( $list ) && count( $list ) == 0 ) {
			if ( strpos( $id, 'header_style' ) === 0 ) {
				$list = plumbing_get_list_header_styles( strpos( $id, 'header_style_' ) === 0 );
			} elseif ( strpos( $id, 'header_position' ) === 0 ) {
				$list = plumbing_get_list_header_positions( strpos( $id, 'header_position_' ) === 0 );
			} elseif ( strpos( $id, 'header_widgets' ) === 0 ) {
				$list = plumbing_get_list_sidebars( strpos( $id, 'header_widgets_' ) === 0, true );
			} elseif ( strpos( $id, '_scheme' ) > 0 ) {
				$list = plumbing_get_list_schemes( 'color_scheme' != $id );
			} elseif ( strpos( $id, 'sidebar_widgets' ) === 0 ) {
				$list = plumbing_get_list_sidebars( 'sidebar_widgets_single' != $id && ( strpos( $id, 'sidebar_widgets_' ) === 0 || strpos( $id, 'sidebar_widgets_single_' ) === 0 ), true );
			} elseif ( strpos( $id, 'sidebar_position_ss' ) === 0 ) {
				$list = plumbing_get_list_sidebars_positions_ss( strpos( $id, 'sidebar_position_ss_' ) === 0 );
			} elseif ( strpos( $id, 'sidebar_position' ) === 0 ) {
				$list = plumbing_get_list_sidebars_positions( strpos( $id, 'sidebar_position_' ) === 0 );
			} elseif ( strpos( $id, 'widgets_above_page' ) === 0 ) {
				$list = plumbing_get_list_sidebars( strpos( $id, 'widgets_above_page_' ) === 0, true );
			} elseif ( strpos( $id, 'widgets_above_content' ) === 0 ) {
				$list = plumbing_get_list_sidebars( strpos( $id, 'widgets_above_content_' ) === 0, true );
			} elseif ( strpos( $id, 'widgets_below_page' ) === 0 ) {
				$list = plumbing_get_list_sidebars( strpos( $id, 'widgets_below_page_' ) === 0, true );
			} elseif ( strpos( $id, 'widgets_below_content' ) === 0 ) {
				$list = plumbing_get_list_sidebars( strpos( $id, 'widgets_below_content_' ) === 0, true );
			} elseif ( strpos( $id, 'footer_style' ) === 0 ) {
				$list = plumbing_get_list_footer_styles( strpos( $id, 'footer_style_' ) === 0 );
			} elseif ( strpos( $id, 'footer_widgets' ) === 0 ) {
				$list = plumbing_get_list_sidebars( strpos( $id, 'footer_widgets_' ) === 0, true );
			} elseif ( strpos( $id, 'blog_style' ) === 0 ) {
				$list = plumbing_get_list_blog_styles( strpos( $id, 'blog_style_' ) === 0 );
			} elseif ( strpos( $id, 'post_type' ) === 0 ) {
				$list = plumbing_get_list_posts_types();
			} elseif ( strpos( $id, 'parent_cat' ) === 0 ) {
				$list = plumbing_array_merge( array( 0 => esc_html__( '- Select category -', 'plumbing' ) ), plumbing_get_list_categories() );
			} elseif ( strpos( $id, 'blog_animation' ) === 0 ) {
				$list = plumbing_get_list_animations_in();
			} elseif ( 'color_scheme_editor' == $id ) {
				$list = plumbing_get_list_schemes();
			} elseif ( strpos( $id, '_font-family' ) > 0 ) {
				$list = plumbing_get_list_load_fonts( true );
			}
		}
		return $list;
	}
}

<?php
// Add plugin-specific colors and fonts to the custom CSS
if ( ! function_exists( 'plumbing_mailchimp_get_css' ) ) {
	add_filter( 'plumbing_filter_get_css', 'plumbing_mailchimp_get_css', 10, 2 );
	function plumbing_mailchimp_get_css( $css, $args ) {

		if ( isset( $css['fonts'] ) && isset( $args['fonts'] ) ) {
			$fonts         = $args['fonts'];
			$css['fonts'] .= <<<CSS
form.mc4wp-form .mc4wp-form-fields input[type="email"] {
	{$fonts['input_font-family']}
	{$fonts['input_font-weight']}
	{$fonts['input_font-style']}
	{$fonts['input_line-height']}
	{$fonts['input_text-decoration']}
	{$fonts['input_text-transform']}
	{$fonts['input_letter-spacing']}
}
form.mc4wp-form .mc4wp-form-fields input[type="submit"] {
	{$fonts['button_font-family']}
	{$fonts['button_font-size']}
	{$fonts['button_font-weight']}
	{$fonts['button_font-style']}
	{$fonts['button_line-height']}
	{$fonts['button_text-decoration']}
	{$fonts['button_text-transform']}
	{$fonts['button_letter-spacing']}
}

CSS;
		}

		if ( isset( $css['vars'] ) && isset( $args['vars'] ) ) {
			$vars = $args['vars'];

			$css['vars'] .= <<<CSS

form.mc4wp-form .mc4wp-form-fields input[type="email"],
form.mc4wp-form .mc4wp-form-fields input[type="submit"] {
	-webkit-border-radius: {$vars['rad']};
	    -ms-border-radius: {$vars['rad']};
			border-radius: {$vars['rad']};
}

CSS;
		}

		if ( isset( $css['colors'] ) && isset( $args['colors'] ) ) {
			$colors         = $args['colors'];
			$css['colors'] .= <<<CSS

form.mc4wp-form .mc4wp-alert {
	background-color: {$colors['text_link']};
	border-color: {$colors['text_hover']};
	color: {$colors['inverse_text']};
}
form.mc4wp-form .mc4wp-alert a {
	color: {$colors['inverse_link']} !important;	
}
form.mc4wp-form .mc4wp-alert a:hover {
	color: {$colors['inverse_link']} !important;	
}
form.mc4wp-form input[type="checkbox"] + .wpcf7-list-item-label {
	color: {$colors['text']};
}
form.mc4wp-form .wpcf7-list-item-label:before {
	color: {$colors['text_hover2']};
}
.footer_wrap form.mc4wp-form input[type="submit"][disabled] {
	background: {$colors['inverse_link']} !important;
	border-color: {$colors['inverse_link']} !important;
	color: {$colors['text_hover2']} !important;
}

CSS;
		}

		return $css;
	}
}


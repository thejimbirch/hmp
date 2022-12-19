<?php
// Add plugin-specific colors and fonts to the custom CSS
if ( ! function_exists( 'plumbing_booked_get_css' ) ) {
	add_filter( 'plumbing_filter_get_css', 'plumbing_booked_get_css', 10, 2 );
	function plumbing_booked_get_css( $css, $args ) {

		if ( isset( $css['fonts'] ) && isset( $args['fonts'] ) ) {
			$fonts         = $args['fonts'];
			$css['fonts'] .= <<<CSS

.booked-calendar-wrap .booked-appt-list .timeslot .timeslot-people button,
body #booked-profile-page input[type="submit"],
body #booked-profile-page button,
body .booked-list-view input[type="submit"],
body .booked-list-view button,
body table.booked-calendar input[type="submit"],
body table.booked-calendar button,
body .booked-modal input[type="submit"],
body .booked-modal button {
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

		if ( isset( $css['colors'] ) && isset( $args['colors'] ) ) {
			$colors         = $args['colors'];
			$css['colors'] .= <<<CSS

/* Form fields */
#booked-page-form {
	color: {$colors['text']};
	border-color: {$colors['bd_color']};
}

#booked-profile-page .booked-profile-header {
	background-color: {$colors['bg_color']} !important;
	border-color: transparent !important;
	color: {$colors['text']};
}
#booked-profile-page .booked-user h3 {
	color: {$colors['text_dark']};
}
#booked-profile-page .booked-profile-header .booked-logout-button:hover {
	color: {$colors['text_link']};
}

#booked-profile-page .booked-tabs {
	border-color: {$colors['alter_bd_color']} !important;
}

.booked-modal .bm-window p.booked-title-bar {
	color: {$colors['extra_dark']} !important;
	background-color: {$colors['text_dark']} !important;
}
body .booked-modal .bm-window a.close:hover i {
	color: {$colors['text_link']};
}
.booked-modal .bm-window .close i {
	color: {$colors['extra_dark']};
}
.booked-modal .bm-window .booked-scrollable {
	color: {$colors['extra_text']};
	background-color: {$colors['alter_bg_color']} !important;
}
.booked-modal .bm-window .booked-scrollable em {
	color: {$colors['extra_link']};
}
.booked-modal .bm-window #customerChoices {
	background-color: {$colors['extra_bg_hover']};
	border-color: {$colors['extra_bd_hover']};
}
.booked-form .booked-appointments {
	color: {$colors['alter_text']};
	background-color: {$colors['alter_bg_hover']} !important;	
}
.booked-modal .bm-window p.appointment-title {
	color: {$colors['alter_dark']};	
}

/* Profile page and tabs */
.booked-calendarSwitcher.calendar,
.booked-calendarSwitcher.calendar select,
#booked-profile-page .booked-tabs {
	background-color: {$colors['alter_bg_color']} !important;
}
#booked-profile-page .booked-tabs li a {
	background-color: {$colors['extra_bg_color']};
	color: {$colors['extra_dark']};
}
#booked-profile-page .booked-tabs li a i {
	color: {$colors['extra_dark']};
}
#booked-profile-page .booked-tabs li.active a,
#booked-profile-page .booked-tabs li.active a:hover,
#booked-profile-page .booked-tabs li a:hover {
	color: {$colors['extra_dark']} !important;
	background-color: {$colors['text_link']} !important;
}
#booked-profile-page .booked-tab-content {
	background-color: {$colors['bg_color']};
	border-color: {$colors['alter_bd_color']};
}

/* Calendar */
table.booked-calendar thead tr {
	background-color: {$colors['extra_bg_color']} !important;
}
table.booked-calendar thead tr th {
	color: {$colors['extra_dark']} !important;
	border-color: {$colors['alter_bd_color']} !important;
}
table.booked-calendar thead th i {
	color: {$colors['extra_dark']} !important;
}
table.booked-calendar thead th .monthName a {
	color: {$colors['extra_dark']};
}
table.booked-calendar thead th .monthName a:hover {
	color: {$colors['text_dark']};
}
body table.booked-calendar thead th a:hover i {
	color: {$colors['text_dark']}!important;
}
body .booked-calendar-wrap.small table.booked-calendar td.today .date {
	background: transparent;
}
body .booked-calendar-wrap.small table.booked-calendar td.today .date .number {
	color: {$colors['extra_dark']}!important;
	background-color: {$colors['extra_bg_color']};
}
table.booked-calendar tbody tr td {
	color: {$colors['alter_text']} !important;
	border-color: {$colors['alter_bd_color']} !important;
}
table.booked-calendar tbody tr td:hover {
	color: {$colors['alter_dark']} !important;
}
table.booked-calendar tbody td.today .date span {
	border-color: {$colors['alter_link']};
}
table.booked-calendar tbody td.today:hover .date span {
	background-color: {$colors['alter_hover']} !important;
	color: {$colors['inverse_link']} !important;
}
body table.booked-calendar td.prev-month .date span {
	color: {$colors['text_light']};
	background-color: {$colors['alter_bg_color']};
}
body .booked-calendar-wrap.small table.booked-calendar td .date .number {
	color: {$colors['text_light']};
	background-color: {$colors['alter_bg_color']};
}
body .booked-calendar-wrap.small table.booked-calendar td.next-month .date.tooltipster .number {
	color: {$colors['text_light']};
}
body .booked-calendar-wrap.small table.booked-calendar td .date.tooltipster .number {
	color: {$colors['text_dark']};
}
body table.booked-calendar td.prev-date:hover .date span {
	color: {$colors['text_light']}!important;
}
body table.booked-calendar td:hover .date.tooltipster span {
	color: {$colors['extra_dark']}!important;
	background-color: {$colors['extra_bg_color']}!important;
}
body table.booked-calendar tr.days th {
	color: {$colors['text_hover2']}!important;
}

.booked-calendar-wrap .booked-appt-list h2 {
	color: {$colors['text_dark']};
}
.booked-calendar-wrap .booked-appt-list .timeslot {
	border-color: {$colors['alter_bd_color']};	
}
.booked-calendar-wrap .booked-appt-list .timeslot:hover {
	background-color: {$colors['alter_bg_hover']};	
}
.booked-calendar-wrap .booked-appt-list .timeslot .timeslot-title {
	color: {$colors['text_link']};
}
.booked-calendar-wrap .booked-appt-list .timeslot .timeslot-time {
	color: {$colors['text_dark']};
}
.booked-calendar-wrap .booked-appt-list .timeslot .spots-available {
	color: {$colors['text']};
}
body .booked-calendar-wrap.small table.booked-calendar tr.week td.active .date,
body table.booked-calendar tr.entryBlock {
	background: {$colors['alter_bg_color']}!important;
}
body .booked-modal button.cancel {
	color: {$colors['text_dark']};
	border-color: {$colors['text_dark']};
}
body .booked-modal button.cancel:hover {
	color: {$colors['extra_dark']}!important;
	border-color: {$colors['text_dark']}!important;
	background-color: {$colors['text_dark']}!important;
}
body .booked-calendar-wrap.small table.booked-calendar tr.week td.active .date .number {
	color: {$colors['text_dark']};
}
body .booked-calendar-wrap.small table.booked-calendar tr.week td.active.today .date .number {
	color: {$colors['text_dark']}!important;
}
body #booked-profile-page .booked-profile-header .booked-logout-button {
	color: {$colors['text_dark']};
}
body #booked-profile-page .booked-profile-header .booked-logout-button:hover {
	color: {$colors['text_link']};
}

/* Calendar in slider */
.booked-calendar-wrap.large table.booked-calendar thead tr th {
    background-color: {$colors['text_link']}!important;
    color: {$colors['inverse_link']}!important;
    border-color: {$colors['text_link']}!important;
}
.booked-calendar-wrap.large table.booked-calendar tbody tr td .date {
    background-color: {$colors['alter_bg_color']}!important;
    color: {$colors['alter_light']}!important;
}
.booked-calendar-wrap.large table.booked-calendar tbody tr td.prev-month:not(.today) .date,
.booked-calendar-wrap.large table.booked-calendar tbody tr td.prev-date:not(.today) .date  {
    background-color: {$colors['alter_bg_color']}!important;
}
.booked-calendar-wrap.large table.booked-calendar tbody tr td .date  {
    background-color: {$colors['bg_color']}!important;
}
body table.booked-calendar td:hover .date.tooltipster span,
table.booked-calendar tbody td.today .date span,
.booked-calendar-wrap.large table.booked-calendar tbody tr td.prev-date.today .date  {
    background-color: {$colors['text_link']} !important;
    color: {$colors['inverse_link']}!important;
}
.booked-calendar-wrap.large table.booked-calendar tbody tr td.prev-date.today .date .number {
    color: {$colors['inverse_link']}!important;
    background-color: transparent !important;
}
.booked-calendar-wrap.large table.booked-calendar td.next-month .date span,
.booked-calendar-wrap.large table.booked-calendar td.prev-month .date span {
    color: {$colors['alter_light']} ;
}
body .booked-calendar-wrap .booked-appt-list .timeslot .timeslot-people button:not([disabled]) .spots-available {
    color: {$colors['inverse_link']}!important;
}
body .booked-calendar-wrap .booked-appt-list .timeslot .timeslot-people button:not([disabled]) {
    background-color: {$colors['text_link']}!important;
    color: {$colors['inverse_link']}!important;
    border-color: {$colors['text_link']}!important;
}
body .booked-calendar-wrap .booked-appt-list .timeslot .timeslot-people button:not([disabled]):hover {
    background-color: {$colors['text_dark']}!important;
    color: {$colors['extra_dark']}!important;
    border-color: {$colors['text_dark']}!important;
}

body .booked-modal input[type="submit"].button:not(:disabled):hover {
    background-color: {$colors['text_link']} !important;
    color: {$colors['inverse_link']};
    border-color: {$colors['text_link']} !important;
}

CSS;
		}

		return $css;
	}
}


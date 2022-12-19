/* global jQuery:false */
/* global PLUMBING_STORAGE:false */

jQuery( window ).on( 'load',function() {
	"use strict";
	plumbing_gutenberg_first_init();
	// Create the observer to reinit visual editor after switch from code editor to visual editor
	var plumbing_observers = {};
	if (typeof window.MutationObserver !== 'undefined') {
		plumbing_create_observer('check_visual_editor', jQuery('.block-editor').eq(0), function(mutationsList) {
			var gutenberg_editor = jQuery('.edit-post-visual-editor:not(.plumbing_inited)').eq(0);
			if (gutenberg_editor.length > 0) plumbing_gutenberg_first_init();
		});
	}

	function plumbing_gutenberg_first_init() {
		var gutenberg_editor = jQuery( '.edit-post-visual-editor:not(.plumbing_inited)' ).eq( 0 );
		if ( 0 == gutenberg_editor.length ) {
			return;
		}
		jQuery( '.editor-block-list__layout' ).addClass( 'scheme_' + PLUMBING_STORAGE['color_scheme'] );
		gutenberg_editor.addClass( 'sidebar_position_' + PLUMBING_STORAGE['sidebar_position'] );
		if ( PLUMBING_STORAGE['expand_content'] > 0 ) {
			gutenberg_editor.addClass( 'expand_content' );
		}
		if ( PLUMBING_STORAGE['sidebar_position'] == 'left' ) {
			gutenberg_editor.prepend( '<div class="editor-post-sidebar-holder"></div>' );
		} else if ( PLUMBING_STORAGE['sidebar_position'] == 'right' ) {
			gutenberg_editor.append( '<div class="editor-post-sidebar-holder"></div>' );
		}

		gutenberg_editor.addClass('plumbing_inited');
	}

	// Create mutations observer
	function plumbing_create_observer(id, obj, callback) {
		if (typeof window.MutationObserver !== 'undefined' && obj.length > 0) {
			if (typeof plumbing_observers[id] == 'undefined') {
				plumbing_observers[id] = new MutationObserver(callback);
				plumbing_observers[id].observe(obj.get(0), { attributes: false, childList: true, subtree: true });
			}
			return true;
		}
		return false;
	}
} );

<?php
/**
 * Child-Theme functions and definitions
 */

function plumbing_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'plumbing_enqueue_styles' );
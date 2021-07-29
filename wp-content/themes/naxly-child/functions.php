<?php
/**
 * Theme functions and definitions.
 */
function naxly_child_enqueue_styles() {

    if ( SCRIPT_DEBUG ) {
        wp_enqueue_style( 'naxly-style' , get_template_directory_uri() . '/style.css' );
    } else {
        wp_enqueue_style( 'naxly-minified-style' , get_template_directory_uri() . '/style.min.css' );
    }

    wp_enqueue_style( 'naxly-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( 'naxly-style' ),
        wp_get_theme()->get('Version')
    );
}

add_action(  'wp_enqueue_scripts', 'naxly_child_enqueue_styles' );
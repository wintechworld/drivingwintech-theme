<?php

function child_theme_enqueue_styles() {

    $parent_style = 'wpex-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/build/css/style.min.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
    wp_enqueue_script( 'slider', 
        get_stylesheet_directory_uri() . '/build/js/slider.min.js',
        array('jquery'), 
        false, true );

}
add_action( 'wp_enqueue_scripts', 'child_theme_enqueue_styles' );

?>
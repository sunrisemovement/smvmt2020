<?php

/**
 * Enqueue twentytwenty theme styles
 */
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}

/**
 * Setup Advanced Custom Fields
 * To udpate ACF, replace includes/acf with the latest version of the plugin
 */

// Define path and URL to the ACF plugin.
define( 'SMVMT2020_ACF_PATH', get_stylesheet_directory() . '/includes/acf/' );
define( 'SMVMT2020_ACF_URL', get_stylesheet_directory_uri() . '/includes/acf/' );

// Include the ACF plugin.
include_once( SMVMT2020_ACF_PATH . 'acf.php' );

// Customize the url setting to fix incorrect asset URLs.
add_filter('acf/settings/url', 'smvmt2020_acf_settings_url');
function smvmt2020_acf_settings_url( $url ) {
    return SMVMT2020_ACF_URL;
}

// (Optional) Hide the ACF admin menu item.
add_filter('acf/settings/show_admin', 'smvmt2020_acf_settings_show_admin');
function smvmt2020_acf_settings_show_admin( $show_admin ) {
    return true;
}
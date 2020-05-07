<?php

/**
 * Enqueue twentytwenty theme styles
 */
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}

/**
 * Enqeue custom admin assets
 */
add_action( 'admin_enqueue_scripts', 'enqueue_admin_assets' );

function enqueue_admin_assets() {
    wp_enqueue_script( 'smvmt2020-admin-script', get_stylesheet_directory_uri().'/assets/js/admin-script.js', ['jquery'] );
   wp_enqueue_style( 'smvmt2020-admin-style', get_stylesheet_directory_uri().'/assets/css/admin-style.css' );
}

/**
 * Add Body class if top spacing is disabled
 */
add_filter( 'body_class', 'smvmt2020_add_body_class' );

function smvmt2020_add_body_class ( $classes ) {

    $append = [];
    if ( get_field('disable_title') && get_field('disable_top_spacing') ) {
        array_push( $append, 'smvmt2020--top-spacing-disabled' );
    }

    if ( get_field('use_transparent_header') ) {
        array_push( $append, 'smvmt2020--transparent-header-enabled' );
    }
    
    return array_merge( $classes, $append );
}

/**
 * Add dynamic inline styling
 */
function smvmt2020_dynamic_css() {

    if ( get_field('use_transparent_header') ) {
        $color = get_field('header_font_color');
        $dynamic_css = "
            .site-title a,
            .site-description,
            .primary-menu > li > a,
            .toggle-inner,
            .toggle-text {
                color: {$color}!important;
            }
            .header-footer-group .header-inner .toggle-wrapper::before {
                background-color: {$color}!important;
                opacity: 0.5;
            }
        ";
        wp_add_inline_style( 'parent-style', $dynamic_css );
    }

}
add_action( 'wp_enqueue_scripts', 'smvmt2020_dynamic_css' );

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

/**
 * Setup local ACF fields and groups
 */

function smvmt2020_acf_add_local_field_groups() {
	include_once( get_stylesheet_directory() . '/includes/fields/fields.php' );
}

add_action('acf/init', 'smvmt2020_acf_add_local_field_groups');
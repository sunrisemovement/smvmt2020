<?php

/**
 * Enqueue twentytwenty theme styles
 */
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

function enqueue_parent_styles() {
   wp_enqueue_style(
       'parent-style',
        get_template_directory_uri().'/style.css',
        ['smvmt2020-google-fonts']
    );
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
 * Add Google fonts
 */
function smvmt2020_add_google_fonts() {
    wp_enqueue_style(
        'smvmt2020-google-fonts',
        'https://fonts.googleapis.com/css2?family=Source+Serif+Pro:wght@600;700&display=swap',
        false
    );
    wp_enqueue_style(
        'smvmt2020-google-fonts-2',
        'https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;700;900&display=swap',
        false
    );
}
     
add_action( 'wp_enqueue_scripts', 'smvmt2020_add_google_fonts' );

/**
 * Add dynamic inline styling
 */
function smvmt2020_dynamic_css() {

    if ( get_field('use_transparent_header') ) {
        $dynamic_css = "";
        if ( get_field('header_font_color') ) {
            $color = get_field('header_font_color');
            $text_color = smvmt2020_get_highlight_text_color( $color );
            $submenu_bg = $text_color === '#FFFFFF' ? $color : $text_color;
            $submenu_border = $text_color === '#FFFFFF' ? smvmt2020_shift_color($color, 60) : $color;
            $submenu_text = $text_color === '#FFFFFF' ? $text_color : $color;
            $dynamic_css = $dynamic_css . "
                .site-title a,
                .site-description,
                body:not(.overlay-header) .primary-menu li:not(.smvmt2020-highlight) a,
                body:not(.overlay-header) .primary-menu li a,
                body:not(.overlay-header) .toggle-inner .toggle-text {
                    text-transform: uppercase;
                    font-weight: 700;
                }
                .site-title a,
                .site-description,
                body:not(.overlay-header) .primary-menu > li:not(.smvmt2020-highlight) > a,
                body:not(.overlay-header) .toggle-inner .toggle-text {
                    color: {$color}!important;
                }
                body:not(.overlay-header) .sub-menu a {
                    color: {$submenu_text}!important;
                }
                .header-footer-group .header-inner .toggle-wrapper::before {
                    background-color: {$color}!important;
                    opacity: 0.5;
                }
                body:not(.overlay-header) .primary-menu > .smvmt2020-highlight {
                    background: {$color}!important;
                }
                body:not(.overlay-header) .primary-menu > .smvmt2020-highlight a {
                    color: {$text_color}!important;
                }
                body:not(.overlay-header) .primary-menu ul {
                    border-radius: 0px;
                    background-color: {$submenu_bg}!important;
                    color: {$submenu_text}!important;
                }
                body:not(.overlay-header) .primary-menu > li > ul {
                    border-top: 3px {$submenu_border} solid!important;
                }
                body:not(.overlay-header) .primary-menu > li > ul:after {
                    border-bottom-color: {$submenu_border}!important;
                }
                body:not(.overlay-header) .primary-menu > li > ul > li > ul {
                    border-right: 3px {$submenu_border} solid!important;
                }
                body:not(.overlay-header) .primary-menu > li > ul > li > ul:after {
                    border-left-color: {$submenu_border}!important;
                }
                .footer-nav-widgets-wrapper, #site-footer, .menu-modal, .menu-modal-inner, .search-modal-inner, .archive-header, .singular .entry-header, .singular .featured-media:before, .wp-block-pullquote:before {
                    background-color: rgb(51,52,46)!important;
                }
            ";
        } else {
            $dynamic_css = $dynamic_css . "
                body:not(.overlay-header) .primary-menu ul {
                    border-radius: 0px;
                    background-color: rgb(51,52,46)!important;
                    color: #ffde16!important;
                }
                body:not(.overlay-header) .primary-menu > li > ul:after {
                    border-bottom-color: #ffde16!important;
                }
                .footer-nav-widgets-wrapper, #site-footer, .menu-modal, .menu-modal-inner, .search-modal-inner, .archive-header, .singular .entry-header, .singular .featured-media:before, .wp-block-pullquote:before {
                    background-color: rgb(51,52,46)!important;
                }
            ";
        }
        wp_add_inline_style( 'parent-style', $dynamic_css );
    } else {
        $dynamic_css = "
            body:not(.overlay-header) .primary-menu > li > a,
            body:not(.overlay-header) .primary-menu > li > .icon,
            .modal-menu a,
            .footer-menu a,
            .footer-widgets a,
            #site-footer .wp-block-button.is-style-outline,
            .wp-block-pullquote:before,
            .singular:not(.overlay-header) .entry-header a,
            .archive-header a,
            .header-footer-group .color-accent,
            .header-footer-group .color-accent-hover:hover {
                color: #ffde16!important;
            }
            body:not(.overlay-header) .primary-menu > .smvmt2020-highlight a {
                color: rgb(51,52,46)!important;
            }
            body:not(.overlay-header) .primary-menu ul {
                border-radius: 0px;
                background-color: rgb(51,52,46)!important;
                color: #ffde16!important;
            }
            body:not(.overlay-header) .primary-menu > li > ul:after {
                border-bottom-color: #ffde16!important;
            }
            #site-header, .footer-nav-widgets-wrapper, #site-footer, .menu-modal, .menu-modal-inner, .search-modal-inner, .archive-header, .singular .entry-header, .singular .featured-media:before, .wp-block-pullquote:before {
                background-color: rgb(51,52,46)!important;
            }
        ";
        wp_add_inline_style( 'parent-style', $dynamic_css );
    }

}
add_action( 'wp_enqueue_scripts', 'smvmt2020_dynamic_css' );

function smvmt2020_get_highlight_text_color ($bg){
    $bg = trim($bg, '#');
    $r = hexdec(substr($bg,0,2));
    $g = hexdec(substr($bg,2,2));
    $b = hexdec(substr($bg,4,2));

    $squared_contrast = (
        $r * $r * .299 +
        $g * $g * .587 +
        $b * $b * .114
    );

    if($squared_contrast > pow(130, 2)){
        return 'rgb(51,52,46)';
    }else{
        return '#FFFFFF';
    }
}

function smvmt2020_shift_color ($color, $shift){
    $color = trim($color, '#');
    $r = hexdec(substr($color,0,2)) + $shift < 255 ? hexdec(substr($color,0,2)) + $shift : 255;
    $g = hexdec(substr($color,2,2)) + $shift < 255 ? hexdec(substr($color,2,2)) + $shift : 255;
    $b = hexdec(substr($color,4,2)) + $shift < 255 ? hexdec(substr($color,4,2)) + $shift : 255;
    return sprintf("#%02x%02x%02x", $r, $g, $b);
}

/**
 * Setup Advanced Custom Fields
 * To udpate ACF, replace inc/acf with the latest version of the plugin
 */

// Define path and URL to the ACF plugin.
define( 'SMVMT2020_ACF_PATH', get_stylesheet_directory() . '/inc/acf/' );
define( 'SMVMT2020_ACF_URL', get_stylesheet_directory_uri() . '/inc/acf/' );

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
	include_once( get_stylesheet_directory() . '/inc/fields/fields.php' );
}

add_action('acf/init', 'smvmt2020_acf_add_local_field_groups');
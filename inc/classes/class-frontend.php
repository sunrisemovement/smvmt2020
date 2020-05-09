<?php

namespace smvmt2020;

use smvmt2020\Utils;

class Frontend {
    public function init () {
        $this->loadAssets();
        $this->setupBodyClass();
    }

    protected function setupBodyClass () {
        add_filter( 'body_class', [$this, 'filterBodyClass'] );
    }

    public function filterBodyClass ( $classes ) {

        $append = [];
        if ( get_field('disable_top_spacing') ) {
            array_push( $append, 'smvmt2020--top-spacing-disabled' );
        }
    
        if ( get_field('use_transparent_header') ) {
            array_push( $append, 'smvmt2020--transparent-header-enabled' );
        }
        
        return array_merge( $classes, $append );
    }

    protected function loadAssets () {
        add_action( 'wp_enqueue_scripts', [$this, 'loadParentStyles'] );
        add_action( 'wp_enqueue_scripts', [$this, 'loadGoogleFonts'] );
        add_action( 'wp_enqueue_scripts', [$this, 'loadDynamicCss'] );
    }

    public function loadParentStyles () {
        wp_enqueue_style(
            'parent-style',
            get_template_directory_uri().'/style.css',
            ['smvmt2020-source-serif-pro', 'smvmt2020-source-sans-pro']
        );
    }

    public function loadGoogleFonts () {
        wp_enqueue_style(
            'smvmt2020-source-serif-pro',
            'https://fonts.googleapis.com/css2?family=Source+Serif+Pro:wght@600;700&display=swap',
            false
        );
        wp_enqueue_style(
            'smvmt2020-source-sans-pro',
            'https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;700;900&display=swap',
            false
        );
    }

    public function loadDynamicCss () {
        if ( get_field('use_transparent_header') ) {
            include_once( get_stylesheet_directory() . '/inc/classes/class-utils.php' );
            $dynamic_css = "";
            if ( get_field('header_font_color') ) {
                $color = get_field('header_font_color');
                $text_color = Utils::getTextColor( $color );
                $submenu_bg = $text_color === '#FFFFFF' ? $color : $text_color;
                $submenu_border = $text_color === '#FFFFFF' ? Utils::shiftColor($color, 60) : $color;
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
}
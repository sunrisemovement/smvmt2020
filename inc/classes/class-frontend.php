<?php

namespace smvmt2020;

use smvmt2020\Utils;

class Frontend {
    public function init () {
        $this->loadAssets();
        $this->setupSiteLogo();
        $this->setupBodyClass();
    }

    protected function setupSiteLogo () {
        add_filter('twentytwenty_site_logo_args', [$this, 'filterSiteLogo']);
    }

    public function filterSiteLogo ( $args ) {
        $args['title'] = '
            <a href="%1$s">
                <svg version="1.1" id="Layer_2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                viewBox="0 0 411.3 665.89" style="enable-background:new 0 0 411.3 665.89;" xml:space="preserve">
                    <path d="M393.46,0H205.65H17.84H0v17.84v107.22v165.48v95.9v71.7v1.39v6.24l1.96,1.87c0.04,0.08,0.09,0.15,0.13,0.23
                        c0.23,0.44,0.52,0.84,0.79,1.25c0.26,0.41,0.49,0.82,0.79,1.21c0.34,0.45,0.74,0.85,1.13,1.26c0.27,0.29,0.5,0.61,0.78,0.88
                        l191.58,181.4c0.01,0.01,0.01,0.01,0.02,0.01l12.58,12L224.55,651l181.54-182.2c0.62-0.63,1.14-1.33,1.66-2.04l3.54-3.56v-7.25
                        v-0.11v-53.91v-111.4V125.05V17.84V0H393.46z M35.68,251.04V142.89h62.69h60.05l-44.95,39.59c0,0,0,0,0,0l-74.66,65.8L35.68,251.04z
                            M312.93,142.89h62.69v108.15l-3.13-2.76l-74.66-65.8c0,0,0,0,0,0l-44.95-39.59H312.93z M375.62,298.59v89.8L274.08,209.46
                        l-0.39-0.69l98.49,86.78L375.62,298.59z M225.96,463.93l-1.69-231.79v0l-0.2-26.95l-0.09-11.68l29.6,52.16l117.56,207.31L226.94,598
                        L225.96,463.93z M188.3,191.74l2.7,369.49l0.27,37.73L40.66,455.26l127.59-228.18L188.3,191.74z M375.62,35.68v71.54H329.5
                        c-0.22-1.53-0.57-3.02-0.85-4.53c-0.25-1.38-0.48-2.77-0.77-4.14c-0.6-2.78-1.34-5.52-2.12-8.23c-0.28-0.95-0.49-1.93-0.79-2.88
                        c-1.14-3.6-2.44-7.14-3.89-10.59c-0.37-0.89-0.82-1.74-1.22-2.62c-1.15-2.56-2.34-5.09-3.65-7.56c-0.64-1.21-1.34-2.38-2.02-3.57
                        c-1.19-2.08-2.43-4.14-3.74-6.14c-0.79-1.21-1.61-2.41-2.44-3.59c-1.36-1.94-2.78-3.82-4.25-5.67c-0.87-1.09-1.72-2.19-2.62-3.26
                        c-1.68-1.99-3.45-3.89-5.24-5.77c-0.78-0.81-1.52-1.67-2.32-2.46c-0.18-0.17-0.33-0.37-0.51-0.54H375.62z M214.27,36.11
                        c0.93,0.09,1.83,0.25,2.75,0.37c1.9,0.24,3.79,0.5,5.65,0.86c1.06,0.21,2.1,0.47,3.15,0.71c1.68,0.39,3.36,0.81,5,1.29
                        c1.07,0.31,2.13,0.66,3.18,1.01c1.58,0.53,3.15,1.1,4.69,1.72c1.03,0.41,2.05,0.83,3.06,1.28c1.55,0.69,3.06,1.43,4.56,2.2
                        c0.93,0.48,1.87,0.94,2.79,1.45c1.59,0.89,3.14,1.85,4.67,2.84c0.75,0.48,1.53,0.93,2.27,1.44c2.11,1.45,4.16,2.98,6.14,4.59
                        c0.11,0.09,0.24,0.17,0.35,0.26c2.08,1.72,4.08,3.55,6,5.45c0.6,0.6,1.16,1.24,1.75,1.86c1.28,1.34,2.54,2.69,3.74,4.11
                        c0.66,0.78,1.28,1.6,1.92,2.41c1.04,1.33,2.07,2.67,3.03,4.05c0.62,0.89,1.21,1.79,1.8,2.7c0.9,1.39,1.76,2.8,2.58,4.24
                        c0.54,0.94,1.07,1.89,1.57,2.86c0.78,1.5,1.51,3.03,2.21,4.58c0.43,0.95,0.87,1.9,1.27,2.87c0.7,1.71,1.32,3.46,1.92,5.22
                        c0.29,0.85,0.62,1.69,0.88,2.56c0.75,2.45,1.39,4.94,1.93,7.47c0.04,0.2,0.11,0.4,0.15,0.61c0.01,0.03,0.01,0.07,0.02,0.1h-87.65
                        H118c0.01-0.03,0.01-0.07,0.02-0.1c0.04-0.2,0.11-0.4,0.15-0.61c0.54-2.53,1.18-5.02,1.93-7.47c0.27-0.87,0.59-1.71,0.88-2.57
                        c0.6-1.76,1.21-3.5,1.91-5.21c0.4-0.98,0.85-1.93,1.28-2.88c0.7-1.54,1.42-3.07,2.2-4.56c0.51-0.97,1.04-1.92,1.58-2.87
                        c0.82-1.43,1.68-2.84,2.57-4.23c0.59-0.91,1.18-1.82,1.81-2.71c0.97-1.38,1.99-2.72,3.03-4.04c0.64-0.81,1.26-1.63,1.92-2.42
                        c1.19-1.41,2.45-2.76,3.72-4.09c0.59-0.62,1.16-1.28,1.77-1.88c1.92-1.9,3.91-3.72,5.99-5.44c0.14-0.12,0.3-0.22,0.44-0.33
                        c1.95-1.59,3.97-3.1,6.05-4.52c0.75-0.51,1.54-0.97,2.31-1.46c1.52-0.97,3.04-1.93,4.62-2.81c0.92-0.52,1.87-0.98,2.82-1.47
                        c1.49-0.76,2.99-1.5,4.53-2.18c1.02-0.45,2.05-0.87,3.08-1.29c1.54-0.61,3.1-1.18,4.67-1.71c1.06-0.36,2.12-0.7,3.2-1.02
                        c1.64-0.48,3.31-0.9,4.99-1.29c1.05-0.24,2.09-0.5,3.16-0.71c1.86-0.36,3.75-0.62,5.64-0.86c0.92-0.12,1.83-0.28,2.76-0.37
                        c2.84-0.27,5.71-0.44,8.62-0.44S211.43,35.84,214.27,36.11z M35.68,35.68h82.55c-0.18,0.17-0.34,0.37-0.51,0.54
                        c-0.8,0.79-1.54,1.64-2.31,2.45c-1.8,1.88-3.57,3.79-5.25,5.78c-0.9,1.06-1.75,2.16-2.62,3.26c-1.47,1.85-2.89,3.74-4.25,5.68
                        c-0.83,1.18-1.64,2.37-2.43,3.58c-1.31,2.01-2.55,4.06-3.74,6.15c-0.68,1.19-1.38,2.35-2.02,3.56c-1.31,2.47-2.5,5-3.65,7.56
                        c-0.39,0.88-0.84,1.73-1.22,2.62c-1.45,3.46-2.75,6.99-3.89,10.59c-0.3,0.94-0.52,1.92-0.79,2.88c-0.79,2.71-1.52,5.45-2.12,8.23
                        c-0.3,1.37-0.52,2.75-0.77,4.14c-0.27,1.51-0.63,3-0.85,4.53H35.68V35.68z M35.68,298.59l2.39-2.1l99.55-87.71l-0.07,0.13
                        l-0.37,0.66L51.18,363.35l-15.5,27.73v-4.64V298.59z"/>
                </svg>
                %2$s
            </a>';

        return $args;

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
                    .site-title svg {
                        fill: {$color}!important;
                    }
                    body:not(.overlay-header) .sub-menu a {
                        color: {$submenu_text}!important;
                    }
                    .header-footer-group .header-inner .toggle-wrapper::before {
                        background-color: {$color}!important;
                        opacity: 0.5;
                    }
                    body:not(.overlay-header) .primary-menu .smvmt2020-highlight {
                        background: {$submenu_border}!important;
                    }
                    body:not(.overlay-header) .primary-menu .smvmt2020-highlight > a,
                    body:not(.overlay-header) .primary-menu .smvmt2020-highlight > a:hover,
                    body:not(.overlay-header) .primary-menu > li > ul .smvmt2020-highlight > a,
                    body:not(.overlay-header) .primary-menu > li > ul .smvmt2020-highlight > a:hover {
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
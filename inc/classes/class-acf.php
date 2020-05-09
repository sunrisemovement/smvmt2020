<?php

namespace smvmt2020;

class ACF {
    public function init () {
        $this->setupACF();
        $this->setupHooks();
    }

    protected function setupACF () {
        include_once( get_stylesheet_directory() . '/inc/acf/acf.php' );
    }

    protected function setupHooks () {
        add_filter('acf/settings/url', [$this, 'getSettingsUrl']);
        add_filter('acf/settings/show_admin', [$this, 'getShowAdmin']);
        add_action('acf/init', [$this, 'setupFields']);
    }

    public function getSettingsUrl ( $url ) {
        return get_stylesheet_directory_uri() . '/inc/acf/';
    }

    public function getShowAdmin () {
        return false;
    }

    public function setupFields () {
        include_once( get_stylesheet_directory() . '/inc/fields/fields.php' );
    }
}
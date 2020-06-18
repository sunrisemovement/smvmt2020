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
        add_filter('_wp_post_revision_fields', [$this, 'addFieldDebugPreview']);
        add_action( 'edit_form_after_title', [$this, 'addInputDebugPreview']);
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

    public function addFieldDebugPreview($fields){
        $fields["debug_preview"] = "debug_preview";
        return $fields;
    }

    public function addInputDebugPreview() {
        echo '<input type="hidden" name="debug_preview" value="debug_preview">';
    }
}
<?php

namespace smvmt2020;

class Admin {

    public function init () {
        $this->loadAssets();
    }

    protected function loadAssets () {
        add_action( 'enqueue_block_assets', [$this, 'loadEditorAssets'] );
    }

    public function loadEditorAssets () {
        wp_enqueue_script( 'smvmt2020-admin-script', get_stylesheet_directory_uri().'/assets/js/admin-script.js', ['jquery'] );
        wp_enqueue_style( 'smvmt2020-admin-style', get_stylesheet_directory_uri().'/assets/css/admin-style.css' );
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
}
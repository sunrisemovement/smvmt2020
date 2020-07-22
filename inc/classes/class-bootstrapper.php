<?php

namespace smvmt2020;

use smvmt2020\ACF;
use smvmt2020\Admin;
use smvmt2020\Frontend;
use smvmt2020\CPT;

class Bootstrapper {

    public function init () {
        $this->setupACF();
        $this->setupCustomPostType();

        if ( is_admin() ) {
            $this->setupAdmin();
        } else {
            $this->setupFrontend();
        }

        add_action( 'after_setup_theme', [$this, 'twentynineteen_child_setup'], 100 );
    }

    protected function setupAdmin () {
        include_once( get_stylesheet_directory() . '/inc/classes/class-admin.php' );
        (new Admin)->init();
    }

    protected function setupFrontend () {
        include_once( get_stylesheet_directory() . '/inc/classes/class-frontend.php' );
        (new Frontend)->init();
    }

    protected function setupACF () {
        include_once( get_stylesheet_directory() . '/inc/classes/class-acf.php' );
        (new ACF)->init();
    }

    protected function setupCustomPostType () {
        include_once( get_stylesheet_directory() . '/inc/classes/class-cpt.php' );
        (new CPT)->init();
    }


    function twentynineteen_child_setup() {
        // Editor color palette.
        add_theme_support(
            'editor-color-palette',
            array(
                array(
                    'name' => esc_html__( 'Gold', 'smvmt2020' ),
                    'slug' => 'sunrise-gold',
                    'color' => '#ffde16'
                ),
                array(
                    'name' => esc_html__( 'Green', 'smvmt2020' ),
                    'slug' => 'sunrise-green',
                    'color' => '#33342E'
                ),
                array(
                    'name' => esc_html__( 'Grey', 'smvmt2020' ),
                    'slug' => 'sunrise-grey',
                    'color' => '#222'
                ),
                array(
                    'name' => esc_html__( 'Eggshell', 'smvmt2020' ),
                    'slug' => 'sunrise-eggshell',
                    'color' => '#ffefea'
                )
            )
        );
    }
}

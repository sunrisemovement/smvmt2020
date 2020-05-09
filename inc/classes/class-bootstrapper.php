<?php

namespace smvmt2020;

use smvmt2020\ACF;
use smvmt2020\Admin;
use smvmt2020\Frontend;

class Bootstrapper {

    public function init () {
        $this->setupACF();
        
        if ( is_admin() ) {
            $this->setupAdmin();
        } else {
            $this->setupFrontend();
        }
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

}
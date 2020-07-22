<?php


namespace smvmt2020;

use smvmt2020\Bootstrapper;

include_once( get_stylesheet_directory() . '/inc/classes/class-bootstrapper.php' );

(new Bootstrapper)->init();


// Uses Jetpack to require 2fa + wordpress.com login

add_filter( 'jetpack_sso_require_two_step', '__return_true' );

// Uses Jetpack to disable default wordpress.org login form

add_filter( 'jetpack_remove_login_form', '__return_true' );

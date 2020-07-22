<?php

namespace smvmt2020;

class CPT {

    public function init () {
    //  $this->campaign_post_type();
    //  $this->CPTaction();
    }

    public function CPTaction() {

      //  add_action( 'init', array( $this, 'campaign_post_type' ));

    }

    function campaign_post_type() {

      $name = 'Campaigns';
      $singular_name = 'Campaigns';
      register_post_type(
          'rg_' . strtolower( $name ),
          array(
              'labels' => array(
                  'name'               => _x( $name, 'post type general name' ),
                  'singular_name'      => _x( $singular_name, 'post type singular name'),
                  'menu_name'          => _x( $name, 'admin menu' ),
                  'name_admin_bar'     => _x( $singular_name, 'add new on admin bar' ),
                  'add_new'            => _x( 'Add New', strtolower( $name ) ),
                  'add_new_item'       => __( 'Add New ' . $singular_name ),
                  'new_item'           => __( 'New ' . $singular_name ),
                  'edit_item'          => __( 'Edit ' . $singular_name ),
                  'view_item'          => __( 'View ' . $singular_name ),
                  'all_items'          => __( 'All ' . $name ),
                  'search_items'       => __( 'Search ' . $name ),
                  'parent_item_colon'  => __( 'Parent :' . $name ),
                  'not_found'          => __( 'No ' . strtolower( $name ) . ' found.'),
                  'not_found_in_trash' => __( 'No ' . strtolower( $name ) . ' found in Trash.' )
              ),
              'public'             => true,
              'hierarchical'       => false,
              'archive'            => true,
              'rewrite'            => array( 'slug' => $name ),
              'menu_icon'          => 'dashicons-carrot'
          )
      );

  }

}

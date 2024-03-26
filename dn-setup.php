<?php
/**
 * @package Aqualunae Display Name Profiles
 * @version 1.0
 */
/*
Plugin Name: Aqualunae Display Name Profiles
Description: Enables user profile pages, hover widgets to link to them, and recommended posts.
Author: Tristan Remple
Version: 1.0
Author URI: https://aqualunae.ca/
*/

function dn_activate() {
    // Perform and registrations etc.
}
register_activation_hook( __FILE__, 'dn_activate' );

function dn_deactivate() {
    // Perform cleanup
    remove_shortcode('dn');
}
register_deactivation_hook( __FILE__, 'dn_deactivate' );
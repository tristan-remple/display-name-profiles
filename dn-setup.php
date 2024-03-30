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
}
register_deactivation_hook( __FILE__, 'dn_deactivate' );

function dn_enqueue() {
    wp_enqueue_style('dn_style', "/wp-content/plugins/display-name-profiles/dn-style.css");
    wp_enqueue_script('dn_script', "/wp-content/plugins/display-name-profiles/dn-hover.js", array(), false,
        array( 'strategy' => 'defer'));
}

add_action('wp_enqueue_scripts', 'dn_enqueue');

include("dn-links.php");
include("dn-features.php");

// * Enable this if you'd like the author page to be part of the plugin instead of the theme
// function author_template($page_template) {
//     if (is_author()) {
//         $page_template = __DIR__ . '/dn-author.php';
//     }
//     return $page_template;
// }

// add_filter('template_include', 'author_template');
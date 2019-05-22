<?php

/**
 * Plugin Name:       Custom URL Rewrites
 * Version:           1.0.0
 * Author:            Vital
 * Author URI:        http://vital.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

if ( !defined('WPINC') ) die;


function vtl_url_rewrite_activate() {
    vtl_url_rewrite_rules();
    flush_rewrite_rules();
}

function vtl_url_rewrite_deactivate() {
    flush_rewrite_rules();
}

function vtl_url_rewrite_rules() {

    add_rewrite_rule('widgets/([^/]*)/?$', 'index.php?page_id=1892&widget_type=$matches[1]', 'top');

    add_rewrite_tag('%widget_type%', '([^&]+)');

}


// Register activation function
register_activation_hook(__FILE__, 'vtl_url_rewrite_activate');

// Register deactivation function
register_deactivation_hook(__FILE__, 'vtl_url_rewrite_deactivate');

// Add rewrite rules on init incase other plugin flushes rules
add_action('init', 'vtl_url_rewrite_rules');

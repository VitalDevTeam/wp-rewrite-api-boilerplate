<?php

/**
 * Plugin Name: Custom URL Rewrites
 * Plugin URI:  https://github.com/vitaldevteam/
 * Description: Creates custom URL rewrites using the WordPress Rewrite API
 * Version:     1.0.0
 * Author:      Vital
 * Author URI:  http://vtldesign.com/
 * License:     GPL2
 */

if ( ! defined( 'WPINC' ) ) {
    die;
}

/*   Plugin activation
    --------------------------------------------------------------------------  */

function vtl_url_rewrite_activate() {

    vtl_url_rewrite_rules();
    flush_rewrite_rules();

}


/*   Plugin deactivation
    --------------------------------------------------------------------------  */

function vtl_url_rewrite_deactivate() {

    flush_rewrite_rules();

}


/*   Register rewrites
    --------------------------------------------------------------------------  */

function vtl_url_rewrite_rules() {

    add_rewrite_rule('^nutrition/([^/]*)/([^/]*)/?', 'index.php?page_id=42&food=$matches[1]&variety=$matches[2]', 'top');

    add_rewrite_tag('%food%', '([^&]+)');
    add_rewrite_tag('%variety%', '([^&]+)');
}


register_activation_hook(__FILE__, 'vtl_url_rewrite_activate');
register_deactivation_hook(__FILE__, 'vtl_url_rewrite_deactivate');
add_action('init', 'vtl_url_rewrite_rules', 10, 0);
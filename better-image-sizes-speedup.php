<?php
/**
 * Better Image Sizes Speedup
 *
 * @package     Better Image Sizes
 * @author      Badabingbreda
 * @license     GPL-2.0+
 *
 * @wordpress-plugin
 * Plugin Name: Better Image Sizes Speedup
 * Plugin URI:  https://www.badabing.nl
 * Description: Speedup Better Image Sizes by disabled unwanted plugins
 * Version:     1.0.0
 * Author:      Badabingbreda
 * Author URI:  https://www.badabing.nl
 * Text Domain: textdomain
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

$request_uri = parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH );

$is_image_handler_php = strpos( $request_uri, 'bis-images' );

//error_log( $_SERVER['REQUEST_URI'] );
if( $is_image_handler_php == 1 ){

    // remove all plugins from loading
    add_filter( 'option_active_plugins', function( $plugins ){

        global $request_uri;

        $myplugin = "better-image-sizes/better-image-sizes.php";

        $plugins = array_filter( $plugins , function( $v ) use ( $myplugin ) { return $myplugin == $v; } );

        return $plugins;

    } , 100, 1 );
}

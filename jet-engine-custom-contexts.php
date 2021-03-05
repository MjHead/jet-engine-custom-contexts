<?php
/**
 * Plugin Name: Jet Engine Custom Contexts for Taxonomies
 * Plugin URI:  https://crocoblock.com/
 * Description: Add custom context for current taxonomies
 * Version:     1.0.0
 * Author:      Crocoblock
 * Author URI:  https://crocoblock.com/
 * License:     GPL-3.0+
 * License URI: http://www.gnu.org/licenses/gpl-3.0.txt
 * Domain Path: /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die();
}

add_action( 'plugins_loaded', function() {

	define( 'JE_CC_VERSION', '1.0.0' );

	define( 'JE_CC__FILE__', __FILE__ );
	define( 'JE_CC_PATH', plugin_dir_path( JE_CC__FILE__ ) );
	define( 'JE_CC_URL', plugins_url( '/', JE_CC__FILE__ ) );

	require JE_CC_PATH . 'includes/plugin.php';
	
} );

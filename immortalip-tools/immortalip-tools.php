<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.toptal.com/resume/andrew-schultz
 * @since             1.0.0
 * @package           Immortalip_Tools
 *
 * @wordpress-plugin
 * Plugin Name:       IMMORTALIP Tools
 * Plugin URI:        https://www.toptal.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Andrew Schultz
 * Author URI:        https://www.toptal.com/resume/andrew-schultz
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       immortalip-tools
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-immortalip-tools-activator.php
 */
function activate_immortalip_tools() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-immortalip-tools-activator.php';
	Immortalip_Tools_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-immortalip-tools-deactivator.php
 */
function deactivate_immortalip_tools() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-immortalip-tools-deactivator.php';
	Immortalip_Tools_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_immortalip_tools' );
register_deactivation_hook( __FILE__, 'deactivate_immortalip_tools' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-immortalip-tools.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_immortalip_tools() {

	$plugin = new Immortalip_Tools();
	$plugin->run();

}
run_immortalip_tools();

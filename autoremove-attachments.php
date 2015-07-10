<?php
/**
 * Plugin Name: Autoremove Attachments
 * Plugin URI: https://wordpress.org/plugins/autoremove-attachments
 * Description: Autoremove Attachments helps you keep your media library clean by deleting all media files attached to a post when that post gets removed from your website.
 * Version: 1.0.0
 * Author: Polygon Themes
 * Author URI: https://polygonthemes.com
 * Text Domain: autoremove-attachments
 * Domain Path: /languages/
 * License: GNU General Public License version 3.0
 */





/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @since      1.0.0
 * @package    Autoremove_Attachments
 */





/**
 * Abort if this file is called directly.
 */
if ( ! defined( 'WPINC' ) ) {
	die;
}





/**
 * Define plugin constants.
 */
define( 'AUTOREMOVE_ATTACHMENTS_VERSION', '1.0.0' );                      // Current plugin version
define( 'AUTOREMOVE_ATTACHMENTS_MAIN_FILE', __FILE__ );                   // Path to main plugin file
define( 'AUTOREMOVE_ATTACHMENTS_DIR_PATH', plugin_dir_path( __FILE__ ) ); // Path to plugin directory
define( 'AUTOREMOVE_ATTACHMENTS_DIR_URL', plugin_dir_url( __FILE__ ) );   // URL to plugin directory





/**
 * Code that runs during plugin activation.
 */
function activate_autoremove_attachments() {
	require_once( AUTOREMOVE_ATTACHMENTS_DIR_PATH . 'includes/class-autoremove-attachments-activator.php' );
	Autoremove_Attachments_Activator::activate();
}





/**
 * Code that runs during plugin deactivation.
 */
function deactivate_autoremove_attachments() {
	require_once( AUTOREMOVE_ATTACHMENTS_DIR_PATH . 'includes/class-autoremove-attachments-deactivator.php' );
	Autoremove_Attachments_Deactivator::deactivate();
}





/**
 * Register activation and deactivation hooks.
 */
register_activation_hook( AUTOREMOVE_ATTACHMENTS_MAIN_FILE, 'activate_autoremove_attachments' );
register_deactivation_hook( AUTOREMOVE_ATTACHMENTS_MAIN_FILE, 'deactivate_autoremove_attachments' );





/**
 * Load and execute plugin.
 *
 * Begin execution of the plugin if the server is not running an outdated version of PHP
 * or display a warning otherwise.
 *
 * @since    1.0.0
 */
function run_autoremove_attachments() {
	require_once( AUTOREMOVE_ATTACHMENTS_DIR_PATH . 'includes/class-autoremove-attachments-update-php.php' );
	$php = new Autoremove_Attachments_Update_PHP();

	if ( $php->check() ) {
		require_once( AUTOREMOVE_ATTACHMENTS_DIR_PATH . 'includes/class-autoremove-attachments.php' );
		$plugin = new Autoremove_Attachments();
		$plugin->run();
	}
}
run_autoremove_attachments();

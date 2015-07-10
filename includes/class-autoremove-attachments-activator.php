<?php

/**
 * The file that contains the class fired during plugin activation
 *
 * @since      1.0.0
 * @package    Autoremove_Attachments
 */





/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin activation.
 *
 * @since    1.0.0
 */
class Autoremove_Attachments_Activator {

	/**
	 * Do stuff on plugin activation.
	 *
	 * Create the plugin options, set their defaults and create any required database tables
	 * on the first plugin activation.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		// Create plugin options if not available
		if ( ! get_option( 'autoremove_attachments' ) ) {
			$autoremove_attachments = array(
				'plugin-version'       => AUTOREMOVE_ATTACHMENTS_VERSION,
				'last-updated-version' => AUTOREMOVE_ATTACHMENTS_VERSION,
			);

			add_option( 'autoremove_attachments', $autoremove_attachments );
		}



		// Get option values 
		$autoremove_attachments = get_option( 'autoremove_attachments' );



		// Set option values on every plugin activation
		// $autoremove_attachments['key-id'] = 'value';



		// Update option values
		update_option( 'autoremove_attachments', $autoremove_attachments );
	}

}
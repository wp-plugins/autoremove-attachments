<?php

/**
 * The file that contains the class for internationalization
 *
 * @since      1.0.0
 * @package    Autoremove_Attachments
 */





/**
 * Define the internationalization functionality.
 *
 * Load and define the internationalization files making the plugin it ready for
 * translation.
 *
 * @since    1.0.0
 */
class Autoremove_Attachments_i18n {

	/**
	 * The unique identifier of the plugin.
	 *
	 * @since     1.0.0
	 * @access    protected
	 * @var       string
	 */
	private $plugin_name;



	/**
	 * The active plugin text-domain.
	 *
	 * @since     1.0.0
	 * @access    protected
	 * @var       string
	 */
	private $domain;





	/**
	 * Initialize the class and set its properties.
	 *
	 * Make the plugin name from the main plugin class available for the current class
	 * and define the plugin domain (slug).
	 *
	 * @since    1.0.0
	 * @param    string    $plugin_name    The unique identifier of the plugin.
	 */
	public function __construct( $plugin_name ) {
		$this->plugin_name = $plugin_name;
		$this->domain      = $plugin_name;
	}





	/**
	 * Load plugin text-domain.
	 *
	 * Load the plugin text-domain for translation from:
	 *
	 * - Global languages folder: wp-content/languages/plugins/autoremove-attachments/autoremove-attachments-en_US.mo
	 * - Local languages folder: wp-content/plugins/autoremove-attachments/languages/autoremove-attachments-en_US.mo
	 *
	 * If no files are found in the global languages folder the plugin uses the files available in the
	 * local folder.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {
		$locale = apply_filters( 'locale', get_locale(), $this->domain );

		// Load textdomain from the global languages folder
		load_textdomain( $this->domain, trailingslashit( WP_LANG_DIR ) . 'plugins/' . $this->plugin_name . '/' . $this->plugin_name . '-' . $locale . '.mo' );

		// Load textdomain from the local languages folder
		load_plugin_textdomain( $this->domain, false, plugin_basename( AUTOREMOVE_ATTACHMENTS_DIR_PATH ) . '/languages/' );
	}

}
<?php

/**
 * The file that contains the class for the admin functionality
 *
 * @since      1.0.0
 * @package    Autoremove_Attachments
 */





/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name and version, removes file attachments and migrate options
 * on plugin updates.
 *
 * @since    1.0.0
 */
class Autoremove_Attachments_Admin {

	/**
	 * The unique identifier of the plugin.
	 *
	 * @since     1.0.0
	 * @access    protected
	 * @var       string
	 */
	private $plugin_name;



	/**
	 * The current version of the plugin.
	 *
	 * @since     1.0.0
	 * @access    protected
	 * @var       string
	 */
	private $version;





	/**
	 * Initialize the class and set its properties.
	 *
	 * Make the plugin name and the plugin version from the main plugin class available
	 * for the current class.
	 *
	 * @since    1.0.0
	 * @param    string    $plugin_name    The unique identifier of the plugin.
	 * @param    string    $version        The current version of the plugin.
	 */
	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version     = $version;
	}





	/**
	 * Remove attachments.
	 *
	 * Get the list of attachments for the post we are about to delete and remove them.
	 *
	 * @since    1.0.0
	 * @param    int      $post_id    ID of the curent post.
	 */
	public function remove_attachments( $post_id ) {
		if ( $post_id ) {
			$args = array (
				'post_type'   => 'attachment',
				'post_parent' => $post_id,
				'post_status' => 'any',
				'nopaging'    => true,
			);
			$query = new WP_Query( $args );

			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post();

					wp_delete_attachment( $query->post->ID, true );
				}
			}

			wp_reset_postdata();
		}
	}





	/**
	 * Migrate and update options on plugin updates.
	 *
	 * Compare the current plugin version with the one stored in the options table
	 * and migrate recursively if needed after a plugin update. The migration code for each
	 * version is stored in individual files and it's triggered only if the 'last-updated-version'
	 * parameter is older than versions where changes have been made.
	 *
	 * @since    1.0.0
	 */
	public function maybe_update() {
		$autoremove_attachments = get_option( 'autoremove_attachments' );

		if ( version_compare( $this->version, $autoremove_attachments['plugin-version'] ) > 0 ) {
			/*
			// Migrate options to version 1.1.0
			if ( version_compare( $autoremove_attachments['last-updated-version'], '1.1.0' ) < 0 ) {
				require_once( AUTOREMOVE_ATTACHMENTS_DIR_PATH . 'includes/general/partials/migrate-to-version-1.1.0.php' );
				$autoremove_attachments['last-updated-version'] = '1.1.0';
			}

			// Migrate options to version 1.2.0
			if ( version_compare( $autoremove_attachments['last-updated-version'], '1.2.0' ) < 0 ) {
				require_once( AUTOREMOVE_ATTACHMENTS_DIR_PATH . 'includes/general/partials/migrate-to-version-1.2.0.php' );
				$autoremove_attachments['last-updated-version'] = '1.2.0';
			}
			*/



			// Update plugin version
			$autoremove_attachments['plugin-version'] = $this->version;

			// Update plugin options
			update_option( 'autoremove_attachments', $autoremove_attachments );
		}
	}

}

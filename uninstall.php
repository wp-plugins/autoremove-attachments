<?php

/**
 * Remove all options on uninstall
 *
 * @since      1.0.0
 * @package    Autoremove_Attachments
 */





/**
 * Exit if uninstall not called from WordPress.
 */
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}





/**
 * Remove plugin options.
 */
delete_option( 'autoremove_attachments' );

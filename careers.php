<?php
/*
Plugin Name: Red Bridge Careers
Plugin URI: https://github.com/ereckers/red-bridge-careers
Description: Create, manage, and list job openings and positions for your website's careers and jobs sections.
Version: 1.0.0
Author: Ed Reckers (Red Bridge Internet)
Author URI: http://www.redbridgenet.com
License: GPL2

----------------------------------------------------------------------------

A special thanks to all past and present clients requesting this component.

----------------------------------------------------------------------------

Copyright (c) 2015 Red Bridge Internet. (email : ed@redbridgenet.com)

This plugin, like WordPress, is licensed under the GPL.
Use it to make something cool, have fun, and share what you've learned with others.
*/

class RedBridgeCareersPlugin {

	// to store a reference to the plugin, allows other plugins to remove actions
	static $instance;

	/**
	 * Constructor, entry point of the plugin
	 */
	function __construct() {
		self::$instance = $this;
		add_action( 'init', array( $this, 'init' ) );
	}

	/**
	 * Initialization, Hooks, and localization
	 */
	function init() {

		self::settings();

		require_once( plugin_dir_path( __FILE__ ) . "/lib/post-type.php" );
		//require_once( plugin_dir_path( __FILE__ ) . "/lib/taxonomies.php" );
		require_once( plugin_dir_path( __FILE__ ) . "/lib/shortcode-list-careers.php" );

		// TODO: set order above our combined css
		add_action( 'wp_enqueue_scripts', array( $this, 'rb415_enqueue_scripts' ) );

	}

	/**
	 * Setup the plugin WP settings and options
	 */
	function settings() {
		// Create array of default settings
		$this->defaultsettings = array(
			'version' => '1.0.1',
			'plugin_prefix' => 'rb415',
			'cpt_prefix' => 'rb415',
			'tax_prefix' => 'rb415',
			'custom_selector' => 'pre'
		);

		// Create the settings array by merging the user's settings and the defaults
		$usersettings = (array) get_option('rb415_careers_settings');
		$this->settings = wp_parse_args( $usersettings, $this->defaultsettings );
	}

	/**
	 * Enqueue scripts and styles
	 */
	function rb415_enqueue_scripts() {
		wp_enqueue_style( 'rb415', plugins_url( '/assets/css/careers.css' , __FILE__ ), array(), $this->settings['version'] );
	}

}

$rb415_careers_plugin = new RedBridgeCareersPlugin;

/*
 * Load WordPress options Setting screen
 */
/*
if ( is_admin() ) {
    require_once( 'settings.php' );
}
*/

/*
 * TODO
 *
 * activate permalinks on activation and or first publish
 */

?>

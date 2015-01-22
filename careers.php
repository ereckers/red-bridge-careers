<?php
/*
Plugin Name: Red Bridge Careers
Plugin URI: https://github.com/ereckers/red-bridge-careers
Description: Create, manage, and list job openings and positions for your website's Careers and Jobs sections.
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

class RedBridgeCareersPluginInit {

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
		/*
		add_action( 'wp_enqueue_scripts', array( $this, 'highlightjs_fwp_enqueue_scripts' ) );
		add_action( 'wp_head', array( $this, 'highlightjs_fwp_insert_script' ) );
		self::settings();
		 */
	}

	/**
	 * Setup the plugin WP settings and options
	 */
	function settings() {
		// Create array of default settings
		$this->defaultsettings = array(
			'color_scheme'    => 'default.css',
			'custom_selector' => 'pre'
		);

		// Create the settings array by merging the user's settings and the defaults
		/*
		$usersettings = (array) get_option('highlightjs_fwp_settings');
		$this->settings = wp_parse_args( $usersettings, $this->defaultsettings );
		*/
	}

	/**
	 * Enqueue highlight.js Script and Style site-wide.
	 */
	function highlightjs_fwp_enqueue_scripts() {
		wp_enqueue_style( 'highlightjs', plugins_url( '/highlight/styles/'.$this->settings['color_scheme'], __FILE__ ), array(), '1.0.1' );
		wp_enqueue_script( 'highlightjs', plugins_url( '/highlight/highlight.pack.js' , __FILE__ ), array(), '1.0.1', 'true' );
	}

	/**
	 * Hook highlight.js highlighting to the page load event 
	 */
	function highlightjs_fwp_insert_script() {
		if ( $this->settings['custom_selector'] != "" ) { 
			include_once( plugin_dir_path( __FILE__ ) . "/templates/initialize-custom.php" );
		} else {
			include_once( plugin_dir_path( __FILE__ ) . "/templates/initialize.php" );
		}
	}

}

$red_bridge_careers_plugin_init = new RedBridgeCareersPluginInit;

/*
 * Load WordPress options Setting screen
 */
/*
if ( is_admin() ) {
    require_once( 'settings.php' );
}
*/

?>

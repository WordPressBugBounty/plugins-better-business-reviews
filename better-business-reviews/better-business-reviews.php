<?php
/**
* Plugin Name: Better Business Reviews.
* Description: Display your business reviews.
* Version: 1.0.0
* Author: Better Business Reviews
* Author URI: #
* License: GPLv2 or later
* Text Domain: better-business-reviews
* Domain Path: /languages
*/

// Exit if accessed directly
if ( ! defined('ABSPATH') ) {
	exit;
}

add_action( 'init', 'brtpmj_init_plugin', 1 );
if (!function_exists('brtpmj_init_plugin')) {
	function brtpmj_init_plugin(){
		
		define ( 'BRTPMJ_PLUGIN_DIR', plugin_dir_path(__FILE__ ) );
		define ( 'BRTPMJ_PLUGIN_VER', '1.0.0' );
		
		global $brtpmj_plugin_url;
		$brtpmj_plugin_url = plugin_dir_url( __FILE__ );

		add_action( 'wp_enqueue_scripts', 'brtpmj_styles_scripts' );
		
		if( is_admin() ){
			include(plugin_dir_path(__FILE__ ) . 'admin/settings.php');
		}
	
	}
}

if (!function_exists('brtpmj_styles_scripts')) {
	function brtpmj_styles_scripts(){
		wp_register_style(
			'brtpmj-style',
			plugin_dir_url( __FILE__ ) . 'css/style.css',
			[],
			BRTPMJ_PLUGIN_VER
		);
		wp_register_style(
			'brtpmj-grid-style',
			plugin_dir_url( __FILE__ ) . 'css/grid.css',
			[],
			BRTPMJ_PLUGIN_VER
		);
		wp_register_style(
			'brtpmj-carousel-style',
			plugin_dir_url( __FILE__ ) . 'css/carousel.css',
			[],
			BRTPMJ_PLUGIN_VER
		);
		wp_register_script(
			'brtpmj-carousel-script',
			plugins_url('js/carousel.js',__FILE__ ),
			array('jquery'),
			BRTPMJ_PLUGIN_VER
		);
	}
}

if(is_admin()){
	// Plugin Configuration Page
	add_action( 'plugins_loaded', 'brtpmj_set_admin_menu' );
	if (!function_exists('brtpmj_set_admin_menu')) {
		function brtpmj_set_admin_menu(){
			add_action('admin_menu', 'brtpmj_admin_config', 999);
		}
	}
	
	if (!function_exists('brtpmj_admin_config')) {
		function brtpmj_admin_config() {
			add_menu_page('Better Reviews', 'Better Reviews', 'manage_options', 'brtpmj-free', 'brtpmj_config_callback', 'dashicons-empty');
			add_submenu_page('brtpmj-free', 'Settings', 'Settings', 'manage_options', 'brtpmj-free', 'brtpmj_config_callback', 1);
		}
	}
}

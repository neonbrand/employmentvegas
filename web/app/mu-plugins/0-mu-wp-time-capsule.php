<?php

/*
Plugin Name: WP Time Capsule
Plugin URI: https://wptimecapsule.com
Description: WP Time Capsule is an incremental automated backup plugin that backups up your website to Dropbox, Google Drive and Amazon S3 on a daily basis.
Author: Revmakx
Author URI: http://www.revmakx.com
*/

if (!function_exists('untrailingslashit') || !defined('WP_PLUGIN_DIR')) {
	// WordPress is probably not bootstrapped.
	exit;
}

if (file_exists(untrailingslashit(WP_PLUGIN_DIR).'/wp-time-capsule/wp-time-capsule.php')) {
	if (in_array('wp-time-capsule/wp-time-capsule.php', (array) get_option('active_plugins')) ||
		(function_exists('get_site_option') && array_key_exists('wp-time-capsule/wp-time-capsule.php', (array) get_site_option('active_sitewide_plugins')))) {
		$GLOBALS['wptc_is_mu'] = true;
		include_once untrailingslashit(WP_PLUGIN_DIR).'/wp-time-capsule/wp-time-capsule.php';
	}
}

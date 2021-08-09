<?php
/**
 * Configuration overrides for WP_ENV === 'development'
 */

use Roots\WPConfig\Config;

Config::define('SAVEQUERIES', true);
Config::define('WP_DEBUG_DISPLAY', true);
Config::define('WP_DISABLE_FATAL_ERROR_HANDLER', true);
Config::define('SCRIPT_DEBUG', true);


Config::define( 'WPS_DEBUG', true );
Config::define( 'WPS_DEBUG_SCRIPTS', true );
Config::define( 'WPS_DEBUG_STYLES', true );
Config::define( 'WPS_DEBUG_DOM', true );

ini_set('display_errors', '1');

// Enable plugin and theme updates and installation from the admin
Config::define('DISALLOW_FILE_MODS', false);

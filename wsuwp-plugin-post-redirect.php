<?php
/*
Plugin Name: WSUWP Post Redirect
Version: 1.0.1
Description: Allow post to be redirected.
Author: washingtonstateuniversity, Danial Bleile
Author URI: https://github.com/washingtonstateuniversity/
Plugin URI: https://github.com/wsuwebteam/wsuwp-plugin-post-redirect
Text Domain: wsuwp-plugin-post-redirect
Requires at least: 4.7
Tested up to: 5.2.0
Requires PHP: 7.0
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

require_once __DIR__ . '/includes/include-plugin.php';

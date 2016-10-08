<?php
/**
 * Plugin Name:     Don't Stage Me Bro!
 * Plugin URI:      https://fewerthanthree.com
 * Description:     Add a notice to the WP Engine staging site tool to let others know whether or not it's cool to overwrite an existing staging site
 * Version:         0.1.1
 * Author:          Josh Mallard
 * Author URI:      https://fewerthanthree.com
 * License:         GPL-2.0+
 * Text Domain:     lc-stage-me
 *
 * @package     dont-stage-me-bro
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// No need to do anything if we're not on WP Engine hosting.
if ( ! defined( 'WPE_APIKEY' ) )
	return;

if ( ! defined( 'LC_DONT_STAGE_ME_BASE' ) ) {
	define( 'LC_DONT_STAGE_ME_BASE', plugin_dir_url( __FILE__ ) );
}

require_once( 'template-tags/general.php' );
require_once( 'includes/main.php' );

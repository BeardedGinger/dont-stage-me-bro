<?php
/**
 * General functions used throughout the plugins.
 *
 * @since       0.1.0
 * @package     dont-stage-me-bro
 * @subpackage  dont-stage-me-bro/template-tags
 * @author      Josh Mallard <josh@limecuda.com>
 */

if ( ! function_exists( 'lc_is_staging_screen' ) ) {
	/**
	 * Conditional to check if we're on the staging screen within the
	 * WP Engine settings
	 *
	 * @since     0.1.0
	 */
	function lc_is_staging_screen() {

		if ( isset( $_GET['page'] ) && 'wpengine-staging' === $_GET['page'] ) {
			return true;
		} else {
			return false;
		}

	}
}

<?php
/**
 * The main class for our plugin.
 *
 * @since       0.1.0
 * @package     dont-stage-me-bro
 * @subpackage  dont-stage-me-bro/includes
 * @author      Josh Mallard <josh@limecuda.com>
 */

namespace LC_Dont_Stage_Me;

class Main {

	/**
	 * The constructor for this class.
	 *
	 * @since     0.1.0
	 */
	public function __construct() {

		$this->load_files();

		if ( lc_is_staging_screen() ) {
			add_action( 'admin_notices', array( Notice\Notice::instance(), 'output_notice' ) );
		}

		add_action( 'wp_ajax_save_staging_status', array( $this, 'save_option' ) );

	}

	/**
	 * Get the files that we'll need for our plugins
	 *
	 * @since     0.1.0
	 */
	private function load_files() {

		require_once( 'assets.php' );
		require_once( 'notice.php' );

	}

	/**
	 * Update the staging setting based on ajax response.
	 *
	 * @since     0.1.0
	 */
	public function save_option() {

		check_ajax_referer( 'lc_stage_me_nonce', 'nonce' );

		$value = $_POST['value'];

		update_option( 'lc_stage_me_status', $value );

		die();

	}
}

new Main();
